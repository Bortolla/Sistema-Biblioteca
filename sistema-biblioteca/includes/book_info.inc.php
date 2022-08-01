<?php
    #IF THE KEY livro DOESNT EXIST IN $_GET->
    #->THE USER IS REDIRECTED TO THE INDEX PAGE
    if (!isset($_GET['livro'])){
        header('Location: index.php');
    }
    #IF THE KEY livro EXISTS IN $_GET, IT IS->
    #->CHECKED IN THE DATABASE IF THE ID SENT->
    #->THROUGH $_GET['livro'] EXISTS IN THE DB
    else{
        $book_id = $_GET['livro'];

        #GETTING THE AMOUNT OF BOOKS IN THE DATABASE
        $sql = "SELECT * FROM livros WHERE id=?";
        $stmt = mysqli_stmt_init($__db_connect);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $book_id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        
        #IF THE ID DOES NOT EXIST, THE ADMIN IS REDIRECTED->
        #->TO THE INDEX PAGE
        if (!$row){
            header('Location: index.php');
        }
        #IF THE ID EXISTS, THE BOOK INFO IS GOTTEN->
        #->TO BE SHOWN IN THE HTML
        else{
            $book_title = $row['titulo'];
            $book_author = $row['autor'];
            $book_pages = $row['paginas'];
            $book_genre = $row['categoria'];
            $book_description = $row['descricao'];
            $book_copies = $row['exemplares'];
            $book_borrowed = $row['retirados'];
            $book_img_type = $row['imagemtipo'];

            #SETTING THE IMAGE PATH OF THE BOOK
            if ($book_img_type){
                $img_path = "../imagens/" . $book_id . 
                                '.' . $book_img_type;
            }
            else{
                $img_path = "../imagens/book.jpg";
            }

            if (isset($_GET['lendsuc']) and $_GET['lendsuc'] == 1){
                $lending_success = "Livro emprestado com sucesso";
            }
            elseif (isset($_GET['retsuc']) and $_GET['retsuc'] == 1){
                $lending_success = "Livro devolvido com sucesso";
            }
            
            if ($book_borrowed > 0){
                $sql = "SELECT * FROM account_info WHERE book1=? 
                        or book2=? or book3=?";
                $stmt = mysqli_stmt_init($__db_connect);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt, 'sss', $book_id, $book_id, $book_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
            }
            #IF NO OPTION IS CHOSEN AN ERROR IS SENT
            if (isset($_POST['student_email']) && !(isset($_POST['choice']))){
                $lending_returning_error = '*Selecione uma opcao';
            }

            #THE CASE WHEN THE OPTION IS TO LEND A BOOK
            elseif (isset($_POST['student_email']) && $_POST['choice'] == 'borrow'){
                $student_email = clean_data($_POST['student_email']);
                if (!($student_info = get_student_info($__db_connect, 
                    $student_email))){
                    $lending_returning_error = '*Usuario nao encontrado';
                }
                elseif (!($book_copies > $book_borrowed)){
                    $lending_returning_error = '*Nao ha exemplares disponiveis';
                }
                elseif ($student_info['pending']){
                    $lending_returning_error = '*O usuario possui devolucoes atrasadas';
                }
                elseif ($student_info['book1'] and $student_info['book2'] and 
                        $student_info['book3']){
                    $lending_returning_error = '*O usuario ja possui 3 livros retirados';
                }
                elseif (in_array($book_id, array($student_info['book1'], 
                        $student_info['book2'], $student_info['book3']))){
                    $lending_returning_error = '*O usuario ja esta com o livro';
                }
                else{
                    $student_can_borrow = TRUE;
                    $student_name = $student_info['firstname'];
                    $student_lastname = $student_info['lastname'];
                    $student_id = $student_info['id'];
                }
            }

            #THE CASE WHEN THE OPTION IS TO RETURN A BOOK
            elseif (isset($_POST['student_email']) && $_POST['choice'] == 'return'){
                $student_email = clean_data($_POST['student_email']);
                if (!($student_info = get_student_info($__db_connect, 
                    $student_email))){
                    $lending_returning_error = '*Usuario nao encontrado';
                }
                elseif ($book_borrowed == 0){
                    $lending_returning_error = '*Nao ha exemplares retirados desse livro';
                }
                elseif (!(in_array($book_id, array($student_info['book1'], 
                        $student_info['book2'], $student_info['book3'],)))){
                    $lending_returning_error = '*O usuario informado nao retirou esse livro';
                }
                else{
                    $student_can_return = TRUE;
                    $student_name = $student_info['firstname'];
                    $student_lastname = $student_info['lastname'];
                    $student_id = $student_info['id'];
                }
            }

            #THIS BLOCK IS FOR WHEN THERE IS A CONFIRMATION->
            #->TO LEND THE BOOK
            elseif ((isset($_POST['lending_confirmed']))){
                $student_email = $_POST['lending_confirmed'];
                
                $student_info = get_student_info($__db_connect, $student_email);

                if (!$student_info['book1']){
                    $sql_update_student = "UPDATE account_info SET book1=?,time1=? WHERE email=?";
                }
                elseif (!$student_info['book2']){
                    $sql_update_student = "UPDATE account_info SET book2=?,time2=? WHERE email=?";
                }
                elseif (!$student_info['book3']){
                    $sql_update_student = "UPDATE account_info SET book3=?,time3=? WHERE email=?";
                }

                $book_borrowed = $book_borrowed + 1;
                $sql_update_book = "UPDATE livros SET retirados=? WHERE id=?";
                $stmt = mysqli_stmt_init($__db_connect);
                mysqli_stmt_prepare($stmt, $sql_update_book);
                mysqli_stmt_bind_param($stmt, "ii", $book_borrowed, $book_id);
                if (mysqli_stmt_execute($stmt)){
                    $now = time();
                    $stmt = mysqli_stmt_init($__db_connect);
                    mysqli_stmt_prepare($stmt, $sql_update_student);
                    mysqli_stmt_bind_param($stmt, "sis", $book_id, $now, $student_email);
                    if(mysqli_stmt_execute($stmt)){
                        header("Location: " . $_SERVER['PHP_SELF'] . '?livro=' . $book_id . '&lendsuc=1');
                    }
                    else{
                        $lending_returning_error = "*Erro ao concluir a aplicacao. Tente novamente.";
                    }
                }
                else{
                    $lending_returning_error = "*Erro ao concluir a aplicacao. Tente novamente.";
                }
                
            }

            #THIS BLOCK IS FOR WHEN THERE IS A CONFIRMATION->
            #->TO RETURN THE BOOK
            elseif (isset($_POST['returning_confirmed'])){
                $student_email = $_POST['returning_confirmed'];

                $student_info = get_student_info($__db_connect, $student_email);

                if ($student_info['book1'] == $book_id){
                    $sql_update_student = "UPDATE account_info SET book1=?,time1=? WHERE email=?";
                }
                elseif ($student_info['book2'] == $book_id){
                    $sql_update_student = "UPDATE account_info SET book2=?,time2=? WHERE email=?";
                }
                elseif ($student_info['book3'] == $book_id){
                    $sql_update_student = "UPDATE account_info SET book3=?,time3=? WHERE email=?";
                }

                $book_borrowed = $book_borrowed - 1;
                $sql_update_book = "UPDATE livros SET retirados=? WHERE id=?";
                $stmt = mysqli_stmt_init($__db_connect);
                mysqli_stmt_prepare($stmt, $sql_update_book);
                mysqli_stmt_bind_param($stmt, "ii", $book_borrowed, $book_id);
                if (mysqli_stmt_execute($stmt)){
                    $zero = 0;
                    $null = NULL;
                    $stmt = mysqli_stmt_init($__db_connect);
                    mysqli_stmt_prepare($stmt, $sql_update_student);
                    mysqli_stmt_bind_param($stmt, "sis", $null, $zero, $student_email);
                    if(mysqli_stmt_execute($stmt)){
                        header("Location: " . $_SERVER['PHP_SELF'] . '?livro=' . $book_id . '&retsuc=1');
                    }
                    else{
                        $lending_returning_error = "*Erro ao concluir a aplicacao. Tente novamente.";
                    }
                }
                else{
                    $lending_returning_error = "*Erro ao concluir a aplicacao. Tente novamente.";
                }
            }

        }
    }

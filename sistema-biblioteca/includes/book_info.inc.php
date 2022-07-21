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
        #IF THE ID EXISTS, THE BOOK INFO IS GOTTEN
        else{
            $book_title = $row['titulo'];
            $book_author = $row['autor'];
            $book_pages = $row['paginas'];
            $book_genre = $row['categoria'];
            $book_description = $row['descricao'];
            $book_copies = $row['exemplares'];
            $book_borrowed = $row['retirados'];
            $book_img_type = $row['imagemtipo'];

            if ($book_img_type){
                $img_path = "../imagens/" . $book_id . 
                                '.' . $book_img_type;
            }
            else{
                $img_path = "../imagens/book.jpg";
            }

            if (isset($_POST['student_email'])){
                if (!($book_copies > $book_borrowed)){
                    $lending_error = '*Nao ha exemplares disponiveis';
                }
                
            }

        }
    }

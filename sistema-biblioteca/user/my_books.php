<?php include '../includes/db_connection.inc.php'; ?> <!-- CONNECTION TO DATABASE-->
<?php include '../includes/session.inc.php'; ?> <!-- STARTS A SESSION-->
<?php include '../includes/functions.inc.php'; ?> <!-- PHP FUNCTIONS -->
<?php include '../includes/check_if_user.inc.php'; ?> <!-- CHECKS IF WHO IS ACCESSING THIS FILE IS user-->
<?php include '../includes/logout.inc.php'; ?> <!-- LOGOUT SCRIPT -->
<?php include '../includes/show_users_books.inc.php'; ?> <!-- THIS PAGE'S SCRIPT -->

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <link rel="shortcut icon" type="image/png" href="../imagens/favicon.png">
        <link rel="stylesheet" href="../css/inicio.css"> 
        <title>Inicio</title>
    </head>

    <body>
        <section class="space"></section>

        <?php include '../includes/user_menu.inc.php'; ?> <!-- USER'S MENU -->
        
        <section class="content">
            <div>
                Livros Comigo
                <br>
                <?php 
                if (isset($no_books_to_show)){
                    echo $no_books_to_show;
                }
               
                elseif (isset($books_to_show)) {
                    echo "<books>";

                        echo "<linha>";

                            foreach ($my_books as $book_id){
                                
                                $sql = "SELECT * FROM livros WHERE id='$book_id'";
                                $result = mysqli_query($__db_connect, $sql);
                                $sql_row = mysqli_fetch_array($result);

                                if ($sql_row){
                                    echo "<a href='livro.php?livro=" . $sql_row['id'] . "'>";
                                    echo "<book>";
                                        if($sql_row['imagemtipo']){
                                            #IF THE imagemtipo FIELD IS NOT EMPTY, IT MEANS->
                                            #->THAT THERE IS AN IMAGE FOR THE BOOK, AND THE->
                                            #->IMAGE'S NAME IS THE BOOK ID PLUS THE IMAGE TYPE
                                            echo "<img src='../imagens/" . $sql_row['id'] . 
                                                    '.' . $sql_row['imagemtipo'] . "'" . ">";
                                        }
                                        else{
                                            #IF THERE IS NOTHING IN THE FIELD imagemtipo->
                                            #IT MEANS THAT THE BOOK HAS NO IMAGE, SO A ->
                                            #DEFAULT IMAGE IS SHOWN
                                            echo "<img src='../imagens/book.jpg'>"; 
                                        }
                                        echo "<book-description>";

                                            echo "<book-title>";
                                                echo $sql_row['titulo'];
                                            echo "</book-title>";

                                            echo "<book-info>";
                                                echo $sql_row['autor'];
                                            echo "<book-info>";

                                        echo "</book-description>";

                                    echo "</book>";
                                    echo "</a>";
                                }
                        echo "</linha>";
                    }
                    echo "</books>";
                }
                ?>
              
            </div>
            
        </section>
    </body>
</html>

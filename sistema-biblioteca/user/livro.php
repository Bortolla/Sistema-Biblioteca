<?php include '../includes/db_connection.inc.php'; ?> <!-- CONNECTION TO DATABASE-->
<?php include '../includes/session.inc.php'; ?> <!-- STARTS A SESSION-->
<?php include '../includes/functions.inc.php'; ?> <!-- PHP FUNCTIONS -->
<?php include '../includes/check_if_user.inc.php'; ?> <!-- CHECKS IF WHO IS ACCESSING THIS FILE IS user-->
<?php include '../includes/logout.inc.php'; ?> <!-- LOGOUT SCRIPT -->
<?php include '../includes/book_info.inc.php'; ?> <!-- THIS PAGE'S SCRIPT -->

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Livro</title>
        <link rel="stylesheet" href="../css/livro.css">
    </head>
    <body>
        <section class="space"></section>
        <div class="menu-mobile">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <?php include '../includes/user_menu.inc.php'; ?> <!-- USER'S MENU -->
        
        <div class="infolivro">
            <?php
                #BOOK INFO
                echo "<h1 class='titulo'>$book_title</h1>";
                echo "<div class='ladinho'><img src='$img_path' width='240px' height='340px'>";
                echo "<div class='informacoes_livro'> <p class='conteudo'><span class='bold'>
                        Descricao: </span>$book_description</p>";
                echo "<p class='conteudo'><span class='bold'>Autor:</span> $book_author</p>";
                echo "<p class='conteudo'><span class='bold'>Paginas:</span> $book_pages</p>";
                echo "<p class='conteudo'><span class='bold'>Categoria:</span> $book_genre</p>";
                echo "<p class='conteudo'><span class='bold'>Exemplares:</span> $book_copies</p>";
                echo "<p class='conteudo'><span class='bold'>Disponível:</span> $available</p></div></div>";
            ?>
        </div>
        <script src="../js/menumobile.js"></script> 
    </body>
</html>
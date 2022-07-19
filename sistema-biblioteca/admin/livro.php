<?php include '../includes/db_connection.inc.php'; ?> <!-- CONNECTION TO DATABASE-->
<?php include '../includes/session.inc.php'; ?> <!-- STARTS A SESSION-->
<?php include '../includes/functions.inc.php'; ?> <!-- PHP FUNCTIONS -->
<?php include '../includes/check_if_admin.inc.php'; ?> <!-- CHECKS IF WHO IS ACCESSING THIS FILE IS admin-->
<?php include '../includes/logout.inc.php'; ?> <!-- LOGOUT SCRIPT -->
<?php include '../includes/book_info.inc.php'; ?> <!-- THIS PAGE'S SCRIPT -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
</head>
<body>
    <?php
        if (isset($img_path)){echo "<img src='$img_path' width='120px' height='170px'>";}
        if (isset($book_title)){echo "<p>Titulo: $book_title</p>";}
        if (isset($book_author)){echo "<p>Autor: $book_author</p>";}
        if (isset($book_pages)){echo "<p>Paginas: $book_pages</p>";}
        if (isset($book_genre)){echo "<p>Categoria: $book_genre</p>";}
        if (isset($book_copies)){echo "<p>Exemplares: $book_copies</p>";}
        if (isset($book_borrowed)){echo "<p>Emprestados: $book_borrowed</p>";}
        if (isset($book_description)){echo "<p>Descricao: $book_description</p>";}
    ?>
        <p>Retirado por: XXXXXXX Em:XXXXX Data devolucao: XXXXX Atrasado:Sim/Nao</p>
</body>
</html>
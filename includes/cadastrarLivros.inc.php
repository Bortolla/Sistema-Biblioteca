<?php

require_once('db_connection.inc.php');

if (isset($_POST['save'])) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $numPaginas = $_POST['paginas'];
    $numExemplares = $_POST['exemplares'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $conn->query(
            "INSERT INTO livros (titulo, autor, paginas, exemplares, categoria, descricao) VALUES ('$titulo', '$autor', '$numPaginas', '$numExemplares', '$categoria', '$descricao')"
        );
}
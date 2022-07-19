<?php

require_once('db_connection.inc.php');

if (isset($_POST['submit'])) {
    // capturando os dados do livro
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $numPaginas = $_POST['paginas'];
    $numExemplares = $_POST['exemplares'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    // inserindo os dados no banco de dados
    $__db_connect->query(
            "INSERT INTO livros (titulo, autor, paginas, exemplares, categoria, descricao) VALUES ('$titulo', '$autor', '$numPaginas', '$numExemplares', '$categoria', '$descricao')");

    // ===== Insercao da imagem na pasta /imagens =====
    // nome do arquivo, juntamente com sua extensao
    $arquivoNome = basename($_FILES["arquivoUpload"]["name"]);

    // uploads/arquivo.extensao
    $arquivoCaminho = "../imagens/" . $arquivoNome;

    // separando o nome do arquivo de sua extensao
    $arquivoExtensao = explode('.', $arquivoNome);
    // pegando o ultimo  valor apos o ponto e em minusculo
    $arquivoExtensao = strtolower(end($arquivoExtensao)); 

    // nome de temporario do arquivo ao realizar o upload ao servidor
    $arquivoCaminhoTemporario = $_FILES["arquivoUpload"]["tmp_name"];

    // verificando se o botao foi pressionado, e se o arquivo movido
    if (isset($_POST['submit']) && 
        move_uploaded_file($arquivoCaminhoTemporario, $arquivoCaminho)) {
        
        echo "Upload realizado com sucesso.";

    } else {

        echo "Falha no upload.";

    }
} 
// else, botão submit não apertado
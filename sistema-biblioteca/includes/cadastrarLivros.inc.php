<?php

require_once('db_connection.inc.php');

if (isset($_POST['submit'])) {
    // Definindo variaveis
    $titulo = Null;
    $autor = Null;
    $numPaginas = Null;
    $numExemplares = Null;
    $categoria = Null;
    $descricao = Null;
    $arquivoNome = Null;
    $arquivoCaminho = Null;
    $arquivoExtensao = Null;
    $arquivoCaminhoTemporario = Null;

    // capturando os dados do livro
    $titulo = $_POST['titulo']; // titulo = nome do livro
    $autor = $_POST['autor'];
    $numPaginas = $_POST['paginas'];
    $numExemplares = $_POST['exemplares'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    // inserindo os dados no banco de dados
    $__db_connect->query(
            "INSERT INTO livros (titulo, autor, paginas, exemplares, categoria, descricao, imagemtipo, retirados) VALUES ('$titulo', '$autor', '$numPaginas', '$numExemplares', '$categoria', '$descricao', 'jpg', 0)");

    // ===== Insercao da imagem na pasta /imagens =====
    // nome do arquivo, juntamente com sua extensao

    $sqlTESTE = 
            ("SELECT id FROM livros WHERE titulo='$titulo'");
    $result = mysqli_query($__db_connect, $sqlTESTE); 
    
    while ($row = mysqli_fetch_array($result)) {
        $teste = $row['id'];
    }

    // echo $teste;

    $arquivoNome = basename($_FILES["arquivoUpload"]["name"]);

    // separando o nome do arquivo de sua extensao
    $arquivoExtensao = explode('.', $arquivoNome);

    // pegando somente o nome do arquivo
    $nomeAtual = $arquivoExtensao[0];

    // pegando o ultimo  valor apos o ponto e em minusculo
    $arquivoExtensao = strtolower(end($arquivoExtensao)); 

    // if (in_array($arquivoExtensao, array('jpg', 'jpeg', 'png'))) {
    //     echo '<br>';
    //     echo $arquivoExtensao;
    //     echo '<br>';
    //     echo $nomeAtual;
    //     echo '<br>';
    //     echo 'FOI CARAI';
    // } else {
    //     echo 'aqui tmb, seu vacilão';
    // }

    // nome de temporario do arquivo ao realizar o upload ao servidor
    $arquivoCaminhoTemporario = $_FILES["arquivoUpload"]["tmp_name"];
    
    // arquivo novo nome
    $novoNomeArq = $teste.'.'.$arquivoExtensao; 

    // uploads/arquivo.extensao
    $arquivoCaminho = "../imagens/" . $novoNomeArq;

    // verificando se o botao foi pressionado, e se o arquivo movido
    if (isset($_POST['submit']) && 
        move_uploaded_file($arquivoCaminhoTemporario, $arquivoCaminho)) {
        
        echo "Upload realizado com sucesso.";

    } else {

        echo "Você não fez o upload da imagem.<br>Ou, houve uma falha no upload da imagem.";

    }
} 
// else, botão submit não apertado
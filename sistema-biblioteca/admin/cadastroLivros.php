<?php 
    // conexao com banco de dados
    require_once('../includes/db_connection.inc.php');
    
    // sessao 
    require_once('../includes/session.inc.php');
    
    require_once('../includes/cadastrarLivros.inc.php');
?> 

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livros</title>
    <link rel="stylesheet" href="../css/cadastroLivros.css">
</head>

<body>

    <?php
        // no lugar de Christie colocar $_POST["autor"]
        // e tmb tirar autor, e colocar nome do livro

        // $sqlTESTE = ("SELECT id FROM livros WHERE autor='Christie';");
        // $result = mysqli_query($__db_connect, $sqlTESTE); 
        // //$ids = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // while ($row = mysqli_fetch_array($result)) {
        //     $teste = $row['id'];
        //     //print_r($row['id'][0]);
        // }

        // mysqli_free_result($result);
        
        // echo $teste;

        // mysqli_close($__db_connect);
    ?>

    <form action="../includes/cadastrarLivros.inc.php" method="POST" enctype="multipart/form-data">

        <input type="text" name="titulo" value="" placeholder="Título do livro" />
        
        <input type="text" name="autor" value="" placeholder="Nome do autor"/>
        
        <input type="text" name="paginas" value="" placeholder="Número de páginas"/>
        
        <input type="text" name="exemplares" value="" placeholder="Número de exemplares"/>
        
        <input type="text" name="categoria" value="" placeholder="Categoria do livro"/>
        
        <label for="descricao">
            Descrição do livro
        </label>
        <input name="descricao" value="" />

        <!-- Input para a imagem do livro -->
        <input type="file" name="arquivoUpload">

        <button type="submit" name="submit">
            Cadastrar Livro
        </button>

    </form>
</body>

</html>
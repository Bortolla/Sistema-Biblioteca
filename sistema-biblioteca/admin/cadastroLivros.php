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
    <form action="../includes/cadastrarLivros.inc.php" method="POST">

        <input type="text" name="titulo" value="" placeholder="Título do livro" />
        
        <input type="text" name="autor" value="" placeholder="Nome do autor"/>
        
        <input type="text" name="paginas" value="" placeholder="Número de páginas"/>
        
        <input type="text" name="exemplares" value="" placeholder="Número de exemplares"/>
        
        <input type="text" name="categoria" value="" placeholder="Categoria do livro"/>
        
        <label for="descricao">Descrição do livro</label>
        <input name="descricao" value="" />

        <button type="submit" name="save">Save</button>

    </form>
</body>

</html>
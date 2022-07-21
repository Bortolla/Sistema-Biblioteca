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
    <section class="space"></section>
        <section class="menu">
            <menu-user-image>
                <img src="imagens/user.png">
            </menu-user-image>
            <menu-user-name>
                Nome do usuário
                <menu-user-acess>
                    Administrador <br>
                    <?php
                        
                    ?>
                <menu-user-acess>
            </menu-user-name>
            
            <menu-item>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?logout=1';?>">Encerrar Sessao</a>
            </menu-item>
            <menu-item>
                <a href="index.php">Início</a>
            </menu-item>
            <menu-item>
                <a href="./cadastrar.php">Cadastrar Aluno</a>
            </menu-item>
            <menu-item>
                <a href="./cadastroLivros.php">Cadastrar Livro</a>
            </menu-item>
            <menu-item>
                Item X
            </menu-item>
            <menu-item>
                Item X
            </menu-item>
        </section>
    <section id="content">
        <form action="../includes/cadastrarLivros.inc.php" method="POST" enctype="multipart/form-data">

            <line>
            <input type="text" name="titulo" value="" placeholder="Título do livro" class="half-size"/>
            
            <input type="text" name="autor" value="" placeholder="Nome do autor" class="half-size"/>
            </line>
            
            <line>
            <input type="text" name="paginas" value="" placeholder="Número de páginas" class="half-size"/>
            
            <input type="text" name="exemplares" value="" placeholder="Número de exemplares" class="half-size"/>
            </line>

            <select name="categoria" value="" placeholder="Categoria do livro">
                <option value="None" selected="true" disabled="disabled" id="disabled-option">Selecione uma categoria</option>
                <option value="Ação">Ação</option>
                <option value="Terror">Terror</option>
                <option value="Educação">Educação</option>
                <option value="Aventura">Aventura</option>
            </select>

            
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
    </section>
</body>

</html>
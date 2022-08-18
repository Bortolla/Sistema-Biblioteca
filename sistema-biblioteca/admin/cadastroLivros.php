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

    <div class="menu-mobile">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    
    <?php include '../includes/admin_menu.inc.php'; ?> <!-- ADMIN'S MENU -->
    
    <section id="content">
        <h1 class="cadastro-titulo">Cadastro de Livros</h1>
        <form action="../includes/cadastrarLivros.inc.php" method="POST" enctype="multipart/form-data">
            <line>
                <inputLabel>
                    <label for="titulo"> Nome do livro: </label>
                    <input type="text" name="titulo" value="" placeholder="" class="half-size"/>
                </inputLabel>
                
                <inputLabel>
                    <label for="autor"> Nome do autor: </label>
                    <input type="text" name="autor" value="" placeholder="" class="half-size"/>
                </inputLabel>
            
            </line>
            
            <line>
                <inputLabel>
                    <label for="paginas"> Número de páginas </label>
                    <input type="text" name="paginas" value="" placeholder="" class="half-size"/>
                </inputLabel>

                <inputLabel>
                    <label for="exemplares"> Número de exemplares </label>
                    <input type="text" name="exemplares" value="" placeholder="" class="half-size"/>
                </inputLabel>
            </line>

            <inputLabel>
                <label for="categoria"> Categoria </label>
                <select name="categoria" value="">
                    <option value="None" selected="true" disabled="disabled" id="disabled-option"> </option>
                    <option value="Ação">Ação</option>
                    <option value="Terror">Terror</option>
                    <option value="Educação">Educação</option>
                    <option value="Aventura">Aventura</option>
                </select>
            </inputLabel>
            
            <inputLabel>
                <label for="descricao"> Descrição do livro </label>
                <input name="descricao" value="" />
            </inputLabel>

            <!-- Input para a imagem do livro -->
            <inputLabel>
                <label for="arquivoUpload"> Imagem</label>
                <box id="upload">
                    <input type="file" name="arquivoUpload" style="width: 100%; height: 100%; opacity: 0;">
                </box>
            </inputLabel>

            <button class="submit-btn" type="submit" name="submit">
                Cadastrar Livro
            </button>

        </form>
    </section>
    <script src="../js/menumobile.js"></script>
</body>

</html>
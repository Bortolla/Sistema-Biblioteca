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
        <link rel="stylesheet" href="../css/livro.css">
    </head>
    <body>
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
        <div class="infolivro">
            <?php
                if (isset($book_title)){echo "<h1 class='titulo'>$book_title</h1>";}
                if (isset($img_path)){echo "<div class='ladinho'><img src='$img_path' width='240px' height='340px'>";}
                if (isset($book_description)){echo "<div class='informacoes_livro'> <p class='conteudo'><span class='bold'>Descricao: </span>$book_description</p>";}
                if (isset($book_author)){echo "<p class='conteudo'><span class='bold'>Autor:</span> $book_author</p>";}
                if (isset($book_pages)){echo "<p class='conteudo'><span class='bold'>Paginas:</span> $book_pages</p>";}
                if (isset($book_genre)){echo "<p class='conteudo'><span class='bold'>Categoria:</span> $book_genre</p>";}
                if (isset($book_copies)){echo "<p class='conteudo'><span class='bold'>Exemplares:</span> $book_copies</p>";}
                if (isset($book_borrowed)){echo "<p class='conteudo'><span class='bold'>Emprestados:</span> $book_borrowed</p></div></div>";}
            ?>
            <p class='conteudovar'><span class='bold'>Retirado por:</span> XXXXXXX <span class='bold'>Em:</span>XXXXX <span class='bold'>Data devolucao:</span> XXXXX <span class='bold'>Atrasado:</span> Sim/Nao</p>

            <form action="<?php echo $_SERVER['PHP_SELF'].'?livro=' . $book_id;?>" method="post">
            
            <input type="email" name="student_email" id="">
            <input type="submit" value="Enviar">
            </form>
            <div><?php if(isset($lending_error)){echo $lending_error;}?></div>
            <?php print_r($_POST); ?>
        </div>

    </body>
</html>

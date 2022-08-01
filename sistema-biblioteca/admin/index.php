<?php include '../includes/db_connection.inc.php'; ?> <!-- CONNECTION TO DATABASE-->
<?php include '../includes/session.inc.php'; ?> <!-- STARTS A SESSION-->
<?php include '../includes/functions.inc.php'; ?> <!-- PHP FUNCTIONS -->
<?php include '../includes/check_if_admin.inc.php'; ?> <!-- CHECKS IF WHO IS ACCESSING THIS FILE IS admin-->
<?php include '../includes/logout.inc.php'; ?> <!-- LOGOUT SCRIPT -->
<?php include '../includes/show_books_part_1.inc.php'; ?> <!-- THIS PAGE'S SCRIPT -->

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <link rel="shortcut icon" type="image/png" href="./imagens/favicon.png">
        <link rel="stylesheet" href="../css/inicio.css"> 
        <title>Inicio</title>
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
            <menu-item >
                <a id="logout" href="<?php echo $_SERVER['PHP_SELF'].'?logout=1';?>"><b>Encerrar Sessao</b></a>
            </menu-item>
        </section>
        <section class="content">
            <div id="search-section">
                <form>
                    <input type="text" placeholder="Digite aqui o nome da organização" id="input"><input type="submit" id="search" value="&nbsp;">
                </form>
            </div>

            <?php include '../includes/show_books_part_2.inc.php'; ?>
            
        </section>
    </body>
</html>

<?php include '../includes/db_connection.inc.php'; ?> <!-- CONNECTION TO DATABASE-->
<?php include '../includes/session.inc.php'; ?> <!-- STARTS A SESSION-->
<?php include '../includes/functions.inc.php'; ?> <!-- PHP FUNCTIONS -->
<?php include '../includes/check_if_user.inc.php'; ?> <!-- CHECKS IF WHO IS ACCESSING THIS FILE IS user-->
<?php include '../includes/logout.inc.php'; ?> <!-- LOGOUT SCRIPT -->
<?php include '../includes/show_books_part_1.inc.php'; ?> <!-- THIS PAGE'S SCRIPT -->

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <link rel="shortcut icon" type="image/png" href="../imagens/favicon.png">
        <link rel="stylesheet" href="../css/inicio.css"> 
        <title>Inicio</title>
    </head>

    <body>
        <section class="space"></section>
        
        <?php include '../includes/user_menu.inc.php'; ?> <!-- USER'S MENU -->
        
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

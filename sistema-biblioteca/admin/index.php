<?php include '../includes/db_connection.inc.php' ?> <!-- CONNECTION TO DATABASE-->
<?php include '../includes/session.inc.php' ?> <!-- STARTS A SESSION-->
<?php include '../includes/functions.inc.php' ?> <!-- PHP FUNCTIONS -->
<?php include '../includes/check_if_admin.inc.php' ?> <!-- CHECKS IF WHO IS ACCESSING THIS FILE IS admin-->
<?php include '../includes/logout.inc.php' ?> <!-- LOGOUT SCRIPT -->


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ACESSO DE ADMIN</h1>
    <a href="<?php echo $_SERVER['PHP_SELF'].'?logout=1';?>">SAIR</a>
</body>
</html>

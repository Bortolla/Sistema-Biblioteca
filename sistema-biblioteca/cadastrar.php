<?php 
    $path = 'includes/db_connection.inc.php';
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> <!-- CONNECTION TO DATABASE-->

<?php 
    $path = 'includes/session.inc.php';
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> <!-- STARTS A SESSION -->

<?php 
    $path = 'includes/functions.inc.php';
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> <!-- PHP FUNCTIONS -->

<?php 
    $path = 'includes/cadastrar.inc.php';
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> <!-- THIS PAGE'S CODE -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>

<body id="tela_cadastro">
    <div class="menulateral">
    </div>
    <div class="form">

        <h1 class="cadastro-titulo">Cadastro de Alunos</h1>
        <div><?php echo $connection_error;?></div> <!-- Div que mostra se nao foi possivel se
                                                    conectar ao servidor -->
        <form class="form-cadastro" action="cadastrar.php" method="post"> <!-- Formulario de cadastro para acessar o sistema -->
            <div class="firstname container">
                <label for="firstname">Nome:</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo $_firstname;?>"><br>
                <div><?php echo $error_firstname;?></div>
            </div>
            <div class="lastname container">
                <label for="lastname">Sobrenome:</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $_lastname;?>"><br>
                <div><?php echo $error_lastname;?></div>
            </div>
            <div class="email container">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $_email;?>"><br>
                <div><?php echo $error_email;?></div>
            </div>
            <div class="phone container">
                <label for="phone">Telefone:</label>
                <input type="tel" name="phone" id="phone" value="<?php echo $_phone;?>"><br>
                <div><?php echo $error_phone;?></div>
            </div>
            <div class="class container">
                <label for="class">Turma:</label>
                <input type="text" name="class" id="class" value="<?php echo $_class;?>"><br>
                <div><?php echo $error_class;?></div>
            </div>
            <div class="registro container">
                <label for="id">Registro do Aluno:</label>
                <input type="text" name="id" id="id" value="<?php echo $_id;?>"><br>
                <div><?php echo $error_id;?></div>
            </div>
            <div class="password container">
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password"><br>
                <div><?php echo $error_password;?></div>
            </div>
            <input class="submit-btn"type="submit" value="Enviar">
        
        </form>
            <div><?php echo $apllication_successful;?></div> <!-- Div em que aparecera
                                                            mensagem de sucesso ao enviar -->
            <div><?php echo $application_failed;?></div> <!-- Div em que aparecera
                                                        mensagem de erro ao enviar -->
        
    </div>
</body>
</html>
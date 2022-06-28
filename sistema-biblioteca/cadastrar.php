<?php include 'includes/db_connection.inc.php' ?>
<?php include 'includes/functions.inc.php' ?>
<?php include 'includes/cadastrar.inc.php' ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<body>

    <div><?php echo $connection_error;?></div> <!-- Div que mostra se nao foi possivel se 
                                                conectar ao servidor -->

    <form action="cadastrar.php" method="post"> <!-- Formulario de cadastro para acessar o sistema -->

        <label for="firstname">Nome:</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $_firstname;?>"><br>
        <div><?php echo $error_firstname;?></div>

        <label for="lastname">Sobrenome:</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $_lastname;?>"><br>
        <div><?php echo $error_lastname;?></div>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $_email;?>"><br>
        <div><?php echo $error_email;?></div>

        <label for="phone">Telefone:</label>
        <input type="tel" name="phone" id="phone" value="<?php echo $_phone;?>"><br>
        <div><?php echo $error_phone;?></div>

        <label for="class">Turma:</label>
        <input type="text" name="class" id="class" value="<?php echo $_class;?>"><br>
        <div><?php echo $error_class;?></div>

        <label for="id">Registro do Aluno:</label>
        <input type="text" name="id" id="id" value="<?php echo $_id;?>"><br>
        <div><?php echo $error_id;?></div>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password"><br>
        <div><?php echo $error_password;?></div>

        <input type="submit" value="Enviar">
        
    </form>

        <div><?php echo $apllication_successful;?></div> <!-- Div em que aparecera 
                                                        mensagem de sucesso ao enviar -->

        <div><?php echo $application_failed;?></div> <!-- Div em que aparecera 
                                                    mensagem de erro ao enviar -->
    
</body>
</html>
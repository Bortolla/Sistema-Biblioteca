<?php include 'db_connection.php' ?>
<?php include 'functions.php' ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            #variables getting the values from the form
            $_firstname = clean_data($_POST['firstname']);
            $_lastname = clean_data($_POST['lastname']);
            $_email = clean_data($_POST['email']);
            $_phone = clean_data($_POST['phone']);
            $_class = clean_data($_POST['class']);
            $_id = clean_data($_POST['id']);
            $_password = clean_data($_POST['password']);
            
            #variables to show if the application 
            #was successful or if an error occurred
            $application_failed = NULL;
            $apllication_successful = NULL;


            #this block is validating the firstname input
            if (empty($_firstname)){
                $error_firstname = '*Campo obrigatorio';
            }
            elseif (!preg_match('/^[a-zA-Z ]+$/', $_firstname)){
                $error_firstname = '*O nome deve ser 
                composto por letras';
            }
            elseif (strlen($_firstname) > 18){
                $error_firstname = '*Tamanho muito longo';
            }
            
            #this block is validating the lastname input
            elseif (empty($_lastname)){
                $error_lastname = '*Campo obrigatorio';
            }
            elseif (!preg_match('/^[a-zA-Z ]+$/', $_lastname)){
                $error_lastname = '*O nome deve ser 
                composto por letras';
            }
            elseif (strlen($_lastname) > 56){
                $error_lastname = '*Tamanho muito longo';
            }

            #this block is validating the email input
            elseif (empty($_email)){
                $error_email = '*Campo obrigatorio';
            }
            elseif (!filter_var($_email, FILTER_VALIDATE_EMAIL)){
                $error_email = '*O email informado nao e valido';
            }
            elseif (email_exists($__db_connect, $_email)){
                $error_email = '*O email informado ja esta 
                sendo utilizado';
            }
            elseif (strlen($_email) > 56){
                $error_email = '*Tamanho muito longo';
            }
            

            #this block is validating the phone input
            elseif (empty($_phone)){
                $error_phone = '*Campo obrigatorio';
            }
            elseif (!preg_match('/^[0-9]?[0-9]{10}$/', $_phone)){
                $error_phone = '*O telefone/celular informado 
                e invalido';
            }

            #this block is validating the class input
            elseif (empty($_class)){
                $error_class = '*Campo obrigatorio';
            }
            elseif (strlen($_class) > 20){
                $error_class = '*Tamanho muito longo';
            }

            #this block is validating the id input
            elseif (empty($_id)){
                $error_id = '*Campo obrigatorio';
            }
            elseif (!preg_match('/^[0-9]+$/', $_id)){
                $error_id = '*O registro do aluno deve 
                conter apenas numeros';
            }
            elseif (id_exists($__db_connect, $_id)){
                $error_id = '*O registro informado 
                ja esta sendo utilizado';
            }
            elseif (strlen($_id) > 20){
                $error_id = '*Tamanho muito longo';
            }

            #this block is validating the password input
            elseif (strlen($_password) < 8){
                $error_password = '*A senha 
                deve conter pelo menos 8 digitos';
            }
            elseif (strlen($_password) > 55){
                $error_password = '*Tamanho muito longo';
            }

            else{
                $sql = "INSERT INTO account_info (firstname, lastname, 
                class, phone, email, id, password) VALUES (?,?,?,?,?,?,?)"; #Template of the request with placeholders 
                                                                            #that will receive values later on

                $stmt = mysqli_stmt_init($__db_connect); #Creates a prepared statement
                mysqli_stmt_prepare($stmt, $sql); #Prepares the statement, checks if everything is right
                mysqli_stmt_bind_param($stmt, 'sssssss', $_firstname, 
                $_lastname, $_class, $_phone, $_email, $_id, $_password); #insert the variables into the statement

                if (!mysqli_stmt_execute($stmt)){
                    $application_failed = "Erro ao enviar os dados. Tente novamente.";
                }
                else{
                    $apllication_successful = "Cadastro criado com sucesso.";

                    $_firstname = NULL;
                    $_lastname = NULL;
                    $_email = NULL;
                    $_phone = NULL;
                    $_class = NULL;
                    $_id = NULL;
                    $_password = NULL;
                }

            }

            
        }
        
    ?>

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
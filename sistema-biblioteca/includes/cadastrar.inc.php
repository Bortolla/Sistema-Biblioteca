<?php
    #CHECKING IF THE USER TRYING TO ACCESS THE SIGN ->
    #->UP PAGE IS ALREADY LOGGED. IF SO, IT REDIRECTS ->
    #->THEM TO THE INDEX OF THEIR PATH
    if ($_SESSION['logged']){
        if ($_SESSION['type'] == 'user'){
            header('Location: user/index.php');
        }
        elseif ($_SESSION['type'] == 'admin'){
            header('Location: admin/index.php');
        }
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
        #variables getting the values from the form
        $_firstname = clean_data($_POST['firstname']);
        $_lastname = clean_data($_POST['lastname']);
        $_email = clean_data($_POST['email']);
        $_phone = clean_data($_POST['phone']);
        $_class = clean_data($_POST['class']);
        $_id = clean_data($_POST['id']);
        $_password = clean_data($_POST['password']);
        $_type = 'user';
        
        #variables to show if the application ->
        #->was successful or if an error occurred
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
            class, phone, email, id, password, type) VALUES (?,?,?,?,?,?,?,?)"; #Template of the request with placeholders ->
                                                                        #->that will receive values later on

            $stmt = mysqli_stmt_init($__db_connect); #Creates a prepared statement
            mysqli_stmt_prepare($stmt, $sql); #Prepares the statement, checks if everything is right
            mysqli_stmt_bind_param($stmt, 'ssssssss', $_firstname, 
            $_lastname, $_class, $_phone, $_email, $_id, $_password, $_type); #insert the variables into the statement

            if (!mysqli_stmt_execute($stmt)){
                $application_failed = "Erro ao enviar os dados. Tente novamente.";
            }
            else{
                $apllication_successful = "Cadastro criado com sucesso.";

                #IF THE OPERATION IS SUCCESSFULL, THE VARIABLES ARE CLEANED UP ->
                #->SO THERE IS NOTHING IN THE INPUT BOXES
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
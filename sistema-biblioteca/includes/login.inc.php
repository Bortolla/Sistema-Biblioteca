<?php
    #CHECKING IF THE USER TRYING TO ACCESS THE LOGIN ->
    #->PAGE IS ALREADY LOGGED. IF SO, IT REDIRECTS ->
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
        $_email = clean_data($_POST['email']);
        $_password = clean_data($_POST['password']);

        #IF THE EMAIL IS BIGGER THAN THE MAXIMUM ACCEPTED OR DOESN'T EXIST
        if (strlen($_email) > 56 or !email_exists($__db_connect, $_email)){ 
            $login_error = "*Usuario e/ou senha incorreto(s)";
        }
        #IF THE PASSWORD IS BIGGER THAN THE MAXIMUM ACCEPTED
        elseif (strlen($_password) > 55){
            $login_error = "*Usuario e/ou senha incorreto(s)";
        }
        #CHECKS IF THE PASSWORD MATHCES WITH THE EMAIL
        else{
            #IF EMAIL AND PASSWORD DON'T MATCH THE FUNCTION CHECK_LOGIN ->
            #->RETURNED FALSE TO THE VARIABLE $TYPE
            if (!$type = check_login($__db_connect, $_email, $_password)){ 
                $login_error = "*Usuario e/ou senha incorreto(s)";
            }
            #ELSE MEANS THEY MATCH, AND THE FUNCTION CHECK_LOGIN RETURNED ->
            #->THE TYPE OF THE ACCOUNT(ADMIN OR USER), THEN THE USER IS LOGGED IN
            else{
                $_SESSION['email'] = $_email;
                $_SESSION['logged'] = True;
                $_SESSION['type'] = $type;
                
                if ($type == 'user'){
                    header('Location: user/index.php'); #REDIRECTS TO THE USER'S PATH IF THE ACCOUNT'S TYPE IS USER
                }
                elseif ($type == 'admin'){
                    header('Location: admin/index.php'); #REDIRECTS TO THE ADMIN'S PATH IF THE ACCOUNT'S TYPE IS ADMIN
                }
            }

        }
    }

?>

<?php
    if ($_SESSION['logged']){
        if ($_SESSION['type'] == 'user'){
            header('Location: estudante/index.php');
        }
        elseif ($_SESSION['type'] == 'admin'){
            header('Location: admin/index.php');
        }
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_email = clean_data($_POST['email']);
        $_password = clean_data($_POST['password']);

        if (strlen($_email) > 56 or !email_exists($__db_connect, $_email)){
            $login_error = "*Usuario e/ou senha incorreto(s)";
        }
        elseif (strlen($_password) > 55){
            $login_error = "*Usuario e/ou senha incorreto(s)";
        }
        else{
            if (!$type = check_login($__db_connect, $_email, $_password)){
                $login_error = "*Usuario e/ou senha incorreto(s)";
            }
            else{
                $_SESSION['email'] = $_email;
                $_SESSION['logged'] = True;
                $_SESSION['type'] = $type;
                
                if ($type == 'user'){
                    header('Location: estudante/index.php');
                }
                elseif ($type == 'admin'){
                    header('Location: admin/index.php');
                }
            }

        }
    }

?>

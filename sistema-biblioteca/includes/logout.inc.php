<?php
    #CHECKS IF THE "logout" URL PARAMETER EXISTS AND IF ITS VALUE ->
    #->IS 1, LOGS OUT THE USER. THE LOG OUT LINKS OF THE SYSTEM ARE ->
    #->SUPPOSED TO SEND AN URL PARAMETER "logout" WITH VALUE = 1, ->
    #->SO THE USER IS LOGGED OUT AND REDIRECTED TO THE LOGIN PAGE.
    #THIS FILE SHOULD BE INCLUDED IN EVERY FILE THAT HAS AN OPTION TO LOGOUT
    if (isset($_GET['logout'])){
        if ($_GET['logout'] == '1'){
            $_SESSION['logged'] = False;
            $_SESSION['email'] = False;
            $_SESSION['type'] = False;

            header('Location: ../index.php');
        }
    }

?>
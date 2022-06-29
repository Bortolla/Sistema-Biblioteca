<!-- THIS CODE'S PURPOSE IS TO REDIRECT OUT OF THE USER FILES 
    ANYBODY THAT ISN'S LOGGED IN WITH AN user type ACCOUNT-->
<!-- THIS FILE SHOULD BE INCLUDED IN EVERY FILE IN THE user PATH -->
<?php
    if ($_SESSION['type'] != 'user' or !$_SESSION['logged']){
        header('Location: ../index.php');
    }
?>

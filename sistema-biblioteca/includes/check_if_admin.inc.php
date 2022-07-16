<!-- THIS CODE'S PURPOSE IS TO REDIRECT OUT OF THE ADMIN FILES 
    ANYBODY THAT ISN'S LOGGED IN WITH AN admin type ACCOUNT-->
<!-- THIS FILE SHOULD BE INCLUDED IN EVERY FILE IN THE admin PATH -->
<?php
    if ($_SESSION['type'] != 'admin' or !$_SESSION['logged']){
        header('Location: ../index.php');
    }


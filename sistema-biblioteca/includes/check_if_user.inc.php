<?php
    if ($_SESSION['type'] != 'user' or !$_SESSION['logged']){
        header('Location: ../index.php');
    }
?>

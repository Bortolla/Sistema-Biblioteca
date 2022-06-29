<?php
    if ($_SESSION['type'] != 'admin' or !$_SESSION['logged']){
        header('Location: ../index.php');
    }

?>
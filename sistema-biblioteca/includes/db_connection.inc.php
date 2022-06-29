<?php
    $__db_connect = mysqli_connect('localhost', 'root', 'root', 'library_system', '3306');

    if (mysqli_connect_errno()){
        $connection_error = "Nao foi possivel se conectar 
        ao servidor. Tente novamente mais tarde.";
        
        #IF THERE IS AN ERROR CONNECTING TO THE DATABASE, 
        #IT EXITS THE SCRIPT AND LEAVES AN ERROR MESSAGE
        exit($connection_error); 
                                
    }
?>
<?php
    try { 
        // conexao do Lucas
        $__db_connect = mysqli_connect('localhost', 'root', 'root', 'library_system', '3306');
    }

    catch(Exception $e){
        // conexao do Vitor
        $__db_connect = mysqli_connect
        ('localhost', 'root', '', 'library_system');      

        // se nao funcionar, mostrar o erro
        if (mysqli_connect_errno()){
            $connection_error = "Nao foi possivel se conectar 
            ao servidor. Tente novamente mais tarde.";
            exit($connection_error);        
        }
    }

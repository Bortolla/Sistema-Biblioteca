<?php

    # Function to clean the data that comes from an input   
    function clean_data($data){ 
            $clean_data = trim($data);
            $clean_data = htmlspecialchars($clean_data);

            return $clean_data;
    }

    function email_exists($__db_connect, $email){
        $sql = "SELECT email FROM account_info WHERE email=?";
        $stmt = mysqli_stmt_init($__db_connect);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row){
            return True;
        }
        else{
            return False;
        }
    }

    function id_exists($__db_connect, $id){
        $sql = "SELECT id FROM account_info WHERE id=?";
        $stmt = mysqli_stmt_init($__db_connect);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row){
            return True;
        }
        else{
            return False;
        }
    }
       

?>
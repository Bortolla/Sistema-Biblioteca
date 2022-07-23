<?php

    #FUNCTION TO CLEAN THE DATA THAT COMES FROM AN INPUT
    function clean_data($data){ 
            $clean_data = trim($data);
            $clean_data = htmlspecialchars($clean_data);

            return $clean_data;
    }

    #CHECKS IF AN EMAIL EXISTS IN THE DATA BASE;
    #UTILIZES PREPARED STATEMENTS TO MAKE THE MYSQLI REQUEST.
    #THE PARAMETERS ARE THE DB CONNECTION AND THE EMAIL
    function email_exists($server_connection, $email){
        $sql = "SELECT email FROM account_info WHERE email=?";
        $stmt = mysqli_stmt_init($server_connection);
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

    #CHECKS IF AN ID EXISTS IN THE DATA BASE;
    #UTILIZES PREPARED STATEMENTS TO MAKE THE MYSQLI REQUEST.
    #THE PARAMETERS ARE THE DB CONNECTION AND THE EMAIL.
    function id_exists($server_connection, $id){
        $sql = "SELECT id FROM account_info WHERE id=?";
        $stmt = mysqli_stmt_init($server_connection);
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

    #CHECKS IF THERE IS AN ACCOUNT WITH THE INFORMED EMAIL AND PASSWORD AND ->
    #->IF THERE IS, IT MEANS THAT THE LOGIN INFORMATION WAS CORRECT AND IT RETURNS ->
    #->THE TYPE OF THE ACCOUNT TO BE PUT IN THE $_SESSION VARIABLE.
    #IF NO MATCH IS FOUND, IT RETURNS FALSE.
    #UTILIZES PREPARED STATEMENTS TO MAKE THE MYSQLI REQUEST.
    #PARAMETERS ARE THE DB CONNECTION, EMAIL AND PASSWORD.
    function check_login($server_connection, $email, $password){
        $sql = "SELECT type FROM account_info WHERE email=? and password=?";
        $stmt = mysqli_stmt_init($server_connection);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if (!$row){
            return False;
        }
        else{
            return $row['type'];
        }
    }

    function get_student_info($server_connection, $student_email){
        $sql = "SELECT * FROM account_info WHERE email=?";
        $stmt = mysqli_stmt_init($server_connection);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $student_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row){
            return $row;
        }
        else{
            return False;
        }
    }

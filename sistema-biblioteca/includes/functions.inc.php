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
        $sql = "SELECT firstname, type FROM account_info WHERE email=? and password=?";
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
            return $row;
        }
    }

    #FUNCTION THAT RETURNS THE INFORMATION OF AN USER->
    #->OR RETURNS FALSE IF THE USER DOES NOT EXIST
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

    function returnDate($server_connection, $book_id, $student_email) {
        $sql = "SELECT * FROM account_info WHERE email=?";
        $stmt = mysqli_stmt_init($server_connection);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $student_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            $returnData = array();
            $returnData['borrowed_date'] = false;
            $returnData['return_date'] = false;
            $returnData['pending'] = false;
            return $returnData;
        }
        elseif ($row['book1'] == $book_id) {
            $borrowed_date = $row['time1'];
            $return_time = $row['time1'] + 604800;
        }
        elseif($row['book2'] == $book_id) {
            $borrowed_date = $row['time2'];
            $return_time = $row['time2'] + 604800;
        }
        elseif($row['book3'] == $book_id) {
            $borrowed_date = $row['time3'];
            $return_time = $row['time3'] + 604800;
        }
        else {
            $returnData = array();
            $returnData['borrowed_date'] = false;
            $returnData['return_date'] = false;
            $returnData['pending'] = false;
            return $returnData;
        }

        if (date('w', $return_time) == 6) {
            $return_time = $return_time + 172800;
        }
        elseif (date('w', $return_time) == 7) {
            $return_time = $return_time + 86400;
        }

        if (time() > $return_time) {
            $pending = 'Sim';
        }
        else {
            $pending = 'Não';
        }
        $returnData = array();
        $returnData['borrowed_date'] = date("d/m/Y", $borrowed_date);
        $returnData['return_date'] = date("d/m/Y", $return_time);
        $returnData['pending'] = $pending;

        return $returnData;
    }

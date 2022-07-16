<?php
    $sql = 'SELECT * FROM livros';
    $result = mysqli_query($__db_connect, $sql);
    $number_of_rows = mysqli_num_rows($result);

    $items_per_page = 12;
    
    $number_of_pages = ceil($number_of_rows / $items_per_page);
    
    if(!isset($_GET['page'])){
        $current_page = 1;
    }
    else{
        $current_page = $_GET['page'];
    }

    $this_page_first_result = ($current_page - 1) * $items_per_page;

    $sql = "SELECT * FROM livros LIMIT " . $this_page_first_result . "," . $items_per_page;
    $result = mysqli_query($__db_connect, $sql);


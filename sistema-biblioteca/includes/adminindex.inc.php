<?php
    #GETTING THE AMOUNT OF BOOKS IN THE DATABASE
    $sql = 'SELECT * FROM livros';
    $result = mysqli_query($__db_connect, $sql);
    $number_of_rows = mysqli_num_rows($result);

    #THIS VARIABLE SETS HOW MANY ITEMS SHOULD BE SHOWN PER PAGE
    $items_per_page = 12;
    
    #THE NUMBER OF PAGES WILL BE THE AMOUNT OF BOOKS DIVIDED ->
    #->BY THE AMOUNT OF ITEMS TO BE SHOWN PER PAGE
    $number_of_pages = ceil($number_of_rows / $items_per_page);
    
    #IF THERE IS NO PAGE VALUE BEING SENT THROUGH->
    #->THE SUPERGLOBAL GET, THE CURRENT PAGE VALUE->
    #->IS SET TO 1; ELSE, THE CURRENT PAGE VALUE->
    #->BECOMES THE VALUE SENT THROUGH THE GET METHOD
    if(!isset($_GET['page'])){
        $current_page = 1;
    }
    else{
        $current_page = $_GET['page'];
    }

    #THIS VARIABLE SETS THE FIRST ITEM THAT SHOULD->
    #BE SHOWN IN THE CURRENT PAGE.
    $this_page_first_result = ($current_page - 1) * $items_per_page;

    #FROM THE FIRST ITEM THAT SHOULD BE SHOWN IN THE->
    #->CURRENT PAGE TO THE AMOUNT OF ITEMS THAT SHOULD->
    #->BE SHOWN PER PAGE, THE ITEMS ARE REQUESTED FROM->
    #->THE DATABASE
    $sql = "SELECT * FROM livros LIMIT " . $this_page_first_result . "," . $items_per_page;
    $result = mysqli_query($__db_connect, $sql);

<?php
    $email = $_SESSION['email'];
    $sql = "SELECT book1, time1, book2, time2, book3, time3 FROM account_info WHERE email=?";
    $stmt = mysqli_stmt_init($__db_connect);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $all_books_fields = mysqli_fetch_assoc($result);

    $my_books = array();
    ($all_books_fields['book1'] != null ? $my_books[] = $all_books_fields['book1'] : false);
    ($all_books_fields['book2'] != null ? $my_books[] = $all_books_fields['book2'] : false);
    ($all_books_fields['book3'] != null ? $my_books[] = $all_books_fields['book3'] : false);
    
    if (!$my_books) {
        $no_books_to_show = 'Você não possui livros emprestados <br> <img src="../imagens/logos.png"/>';
    }
    else {
        $books_to_show = true;
    }
    
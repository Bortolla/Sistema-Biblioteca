<?php
    #THE NUMBER OF ITEM ROWS WILL BE THE AMOUNT OF ITEMS->
    #TO BE SHOWN PER PAGE DIVIDED BY 3, BECAUSE EACH ROW->
    #WILL HAVE 3 ITEMS
    $number_of_book_rows = $items_per_page / 3;

    echo "<books>";

        for($row = 1; $row <= $number_of_book_rows; $row++){

            echo "<linha>";

                for($book = 1; $book <= 3; $book++){
                    #IN EACH ITERATION, A DIFFERENT BOOK INFO IS->
                    #->GOTTEN FROM THE VARIABLE RESULT, WHICH HOLDS->
                    #->THE INFO OF THE BOOKS THAT WERE REQUESTED
                    $sql_row = mysqli_fetch_array($result);

                    if ($sql_row){
                        echo "<a href='livro.php?livro=" . $sql_row['id'] . "'>";
                        echo "<book>";
                            if($sql_row['imagemtipo']){
                                #IF THE imagemtipo FIELD IS NOT EMPTY, IT MEANS->
                                #->THAT THERE IS AN IMAGE FOR THE BOOK, AND THE->
                                #->IMAGE'S NAME IS THE BOOK ID PLUS THE IMAGE TYPE
                                echo "<img src='../imagens/" . $sql_row['id'] . 
                                        '.' . $sql_row['imagemtipo'] . "'" . ">";
                            }
                            else{
                                #IF THERE IS NOTHING IN THE FIELD imagemtipo->
                                #IT MEANS THAT THE BOOK HAS NO IMAGE, SO A ->
                                #DEFAULT IMAGE IS SHOWN
                                echo "<img src='../imagens/book.jpg'>"; 
                            }
                            echo "<book-description>";

                                echo "<book-title>";
                                    echo $sql_row['titulo'];
                                echo "</book-title>";

                                echo "<book-info>";
                                    echo $sql_row['autor'];
                                echo "<book-info>";

                            echo "</book-description>";

                        echo "</book>";
                        echo "</a>";
                    }
                }

            echo "</linha>";

        }

    echo "</books>";


    for($page=1; $page <= $number_of_pages; $page++){
        echo "<a href=" . $_SERVER['PHP_SELF'].'?page=' . 
                $page . ">" . " " . $page . "</a>";
    }
          
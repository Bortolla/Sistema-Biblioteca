<?php include '../includes/db_connection.inc.php'; ?> <!-- CONNECTION TO DATABASE-->
<?php include '../includes/session.inc.php'; ?> <!-- STARTS A SESSION-->
<?php include '../includes/functions.inc.php'; ?> <!-- PHP FUNCTIONS -->
<?php include '../includes/check_if_admin.inc.php'; ?> <!-- CHECKS IF WHO IS ACCESSING THIS FILE IS admin-->
<?php include '../includes/logout.inc.php'; ?> <!-- LOGOUT SCRIPT -->
<?php include '../includes/adminindex.inc.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <link rel="shortcut icon" type="image/png" href="./imagens/favicon.png">
        <link rel="stylesheet" href="../css/inicio.css"> 
        <title>Inicio</title>
    </head>

    <body>
        <section class="space"></section>
        <section class="menu">
            <menu-user-image>
                <img src="imagens/user.png">
            </menu-user-image>
            <menu-user-name>
                Nome do usuário
                <menu-user-acess>
                    Administrador <br>
                    <?php
                        
                    ?>
                <menu-user-acess>
            </menu-user-name>
            
            <menu-item>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?logout=1';?>">Encerrar Sessao</a>
            </menu-item>
            <menu-item>
                Item X
            </menu-item>
            <menu-item>
                Item X
            </menu-item>
            <menu-item>
                Item X
            </menu-item>
            <menu-item>
                Item X
            </menu-item>
            <menu-item>
                Item X
            </menu-item>
        </section>
        <section class="content">
            <div id="search-section">
                <form>
                    <input type="text" placeholder="Digite aqui o nome da organização" id="input"><input type="submit" id="search" value="&nbsp;">
                </form>
            </div>

            <?php
                $number_of_book_rows = $items_per_page / 3;

                echo "<books>";
                    for($row = 1; $row <= $number_of_book_rows; $row++){
                        echo "<linha>";
                            for($book = 1; $book <= 3; $book++){
                                $sql_row = mysqli_fetch_array($result);
                                if ($sql_row){
                                    echo "<book>";
                                        if($sql_row['imagemtipo']){
                                            echo "<img src='../imagens/" . $sql_row['id'] . '.' . $sql_row['imagemtipo'] . "'" . ">";
                                        }
                                        else{
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
                                }
                            }
                        echo "</linha>";
                    }
                echo "</books>";

            ?>

            <?php
                for($page=1; $page <= $number_of_pages; $page++){
                    echo "<a href=" . $_SERVER['PHP_SELF'].'?page=' . $page . ">" . " " . $page . "</a>";
                }
            ?>
        </section>
    </body>
</html>

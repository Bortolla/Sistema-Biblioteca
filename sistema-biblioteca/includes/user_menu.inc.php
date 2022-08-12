<section class="menu">
<menu-user-image>
    <img src="../imagens/user.png">
</menu-user-image>
<menu-user-name>

    <menu-user-acess>
        Usuário: 
        <?php if (isset($_SESSION['firstname'])){echo $_SESSION['firstname'];} ?> <br>
    <menu-user-acess>
</menu-user-name>
<menu-item>
    <a href="index.php">Todos os livros</a>
</menu-item>
<menu-item>
    <a href="my_books.php">Livros Comigo</a>
</menu-item>

<menu-item >
    <a id="logout" href="<?php echo $_SERVER['PHP_SELF'].'?logout=1';?>"><b>Encerrar Sessao</b></a>
</menu-item>
</section>
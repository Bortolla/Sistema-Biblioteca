<section class="menu">
<div class="menu-mobile-close">
        <div class="line1"></div>
        <div class="line2"></div>
    </div>
    <menu-user-image>
        <img src="../imagens/user.png">
    </menu-user-image>
    <menu-user-name>
        Usuário:
        <menu-user-acess>
            Administrador <br>
            <?php
                
            ?>
        <menu-user-acess>
    </menu-user-name>
    <menu-item>
        <a href="index.php">Início</a>
    </menu-item>
    <menu-item>
        <a href="./cadastrar.php">Cadastrar Aluno</a>
    </menu-item>
    <menu-item>
        <a href="./cadastroLivros.php">Cadastrar Livro</a>
    </menu-item>
    <menu-item >
        <a id="logout" href="<?php echo $_SERVER['PHP_SELF'].'?logout=1';?>"><b>Encerrar Sessao</b></a>
    </menu-item>
</section>
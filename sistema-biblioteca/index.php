<?php 
    $path = 'includes/db_connection.inc.php';
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> <!-- CONNECTION TO DATABASE-->

<?php 
    $path = 'includes/session.inc.php';
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> <!-- STARTS A SESSION -->

<?php 
    $path = 'includes/functions.inc.php';
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> <!-- PHP FUNCTIONS -->

<?php 
    $path = 'includes/login.inc.php';
    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> <!-- THIS PAGE'S CODE -->


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <link rel="shortcut icon" type="image/png" href="./imagens/favicon.png">
        <link rel="stylesheet" href="css/estilos.css">
        <title>Login</title>
    </head>

    <body>
        <header></header>

        <main id="flex-container">
            <div id="coluna-esquerda"></div>

            <div id="coluna-direita">
                <div id="login">
                    <h1 id="login-title">Entrar no Sistema</h1>
                    <form action="index.php" method="post"> 
                        <div id="usuario-container">
                            <label for="usuario">Email</label>
                            <input type="text" placeholder="Digite seu email" name="email" id="usuario">
                        </div>
                        
                        <div id="senha-container">
                            <label for="senha">Senha</label>
                            <input type="text" placeholder="Digite sua senha" name="password" id="senha" class="input-grupo">
                            <br>
                            <div><?php echo $login_error; ?></div>
                            <br>
                        </div>

                        <button type="submit" id="login-btn">
                            Entrar
                        </button>
                    </form>
                </div>
            </div>
        </main>

        <footer></footer>

    </body>

    
</html>
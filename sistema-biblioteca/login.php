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
                            <label for="usuario">Usuário</label>
                            <input type="text" placeholder="Digite seu nome de usuário" name="username" id="usuario">
                            <span class="msg-erro">Usuário incorreto! Tente novamente.</span>
                            <br>
                        </div>
                        
                        <div id="senha-container">
                            <label for="senha">Senha</label>
                            <input type="text" placeholder="Digite sua senha" name="password" id="senha" class="input-grupo">
                            <span class="msg-erro">Senha incorreta! Tente novamente.</span>
                            <br>
                        </div>

                        <button type="button" id="login-btn">
                            Entrar
                        </button>
                    </form>
                </div>
            </div>
        </main>

        <footer></footer>

    </body>

    
</html>
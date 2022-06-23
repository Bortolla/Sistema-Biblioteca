// Dados corretos para o login.
const nomeCorreto = "admin_biblio";
const senhaCorreta = "biblioteca123";

// Capturando elementos com o DOM.
const nomeInput = document.getElementsByTagName('input')[0];
const senhaInput = document.getElementsByTagName('input')[1];
const btnEntrar = document.getElementById('login-btn');
const msgErro = document.getElementsByClassName('msg-erro');

function validarDados() {
    if (nomeInput.value !== nomeCorreto) {
        nomeValor = false; // diferente do correto
        nomeInput.style.borderBottom = '2px solid var(--msgerror)'; 
        msgErro[0].style.opacity = '1';
    } else { 
        nomeValor = true; // igual o correto
    }
    
    if (senhaInput.value !== senhaCorreta) {
        senhaValor = false; // diferente do correto
        senhaInput.style.borderBottom = '2px solid var(--msgerror)';
        msgErro[1].style.opacity = '1';
    } else {
        senhaValor = true; // igual o correto
    }
}

// Chamando a funcao validarDados toda vez que o botao for clicado
btnEntrar.addEventListener("click", validarDados);

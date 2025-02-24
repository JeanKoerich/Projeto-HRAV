// Arquivo: timer.js

// Define o tempo para redirecionamento em milissegundos (5 segundos)
var tempoRestante = 5;

// Função para atualizar o timer na tela
function atualizarTimer() {
    var timerElemento = document.getElementById("timer");
    timerElemento.innerHTML = tempoRestante + " segundos";

    // Decrementa o tempo
    if (tempoRestante > 0) {
        tempoRestante--;
    } else {
        // Quando o timer chegar a 0, redireciona para a página inicial
        window.location.href = "index.php";
    }
}

// Atualiza o timer a cada 1 segundo
setInterval(atualizarTimer, 1000);
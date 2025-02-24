<?php
// Inclui o arquivo de conexão com o banco de dados
include '../src/database.php';

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera as respostas, feedback e id da pergunta enviados pelo formulário
    $resposta = $_POST['resposta'] ?? null;
    $feedback = $_POST['feedback'] ?? null;
    $pergunta_id = $_POST['pergunta_id'] ?? null;

    // Inicia a sessão para verificar qual dispositivo foi selecionado
    session_start();
    if (isset($_SESSION['dispositivo'])) {
        $dispositivo = $_SESSION['dispositivo'];
    } else {
        // Mensagem de Erro
        echo "Erro: Dispositivo não selecionado.";
        exit();
    }

    // Verifica se os dados necessários foram recebidos e são válidos
    if (!empty($pergunta_id) && $resposta !== null && is_numeric($resposta)) {
        // Consulta o banco de dados para pegar o ID do dispositivo com base no nome
        $query_dispositivo = "SELECT id FROM dispositivos WHERE nome = '" . pg_escape_string($dispositivo) . "'";
        $result_dispositivo = pg_query($conn, $query_dispositivo);

        // Verifica se o dispositivo foi encontrado no banco de dados
        if ($result_dispositivo && pg_num_rows($result_dispositivo) > 0) {
            // Pega o ID do dispositivo encontrado
            $dispositivo_id = pg_fetch_result($result_dispositivo, 0, 'id');

            // Insere a resposta no banco de dados com o ID da pergunta, resposta, feedback e ID do dispositivo
            $query = "INSERT INTO respostas (pergunta_id, valor, feedback, dispositivo_id) 
                    VALUES ($pergunta_id, $resposta, '" . pg_escape_string($feedback) . "', $dispositivo_id)";
            $result = pg_query($conn, $query);

            // Verifica se a inserção foi bem-sucedida
            if ($result) {
                // Redireciona o usuário para a página de agradecimento após o envio
                header('Location: agradecimento.php');
                exit();
            } else {
                // Caso a inserção falhe, exibe um erro
                echo "Erro ao enviar avaliação: " . pg_last_error($conn);
            }
        } else {
            // Se o dispositivo não for encontrado no banco, exibe um erro
            echo "Erro: Dispositivo não encontrado no banco de dados.";
        }
    } else {
        // Se algum dado necessário estiver faltando ou inválido, exibe um erro
        echo "Por favor, responda todas as perguntas corretamente.";
    }
}
?>
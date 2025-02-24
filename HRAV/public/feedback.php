<!-- Arquivo: feedback.php -->
<!--Página de Feedback dos clientes -->

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação do Hospital Regional Alto Vale - Feedback</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Logo do Hospital -->
    <img src="../img/logo.png" alt="Logo do Hospital Regional Alto Vale"
        style="display: block; margin: 0 auto; width: 150px;">

    <h1>Avaliação do Hospital Regional Alto Vale</h1>

    <?php
    // Recupera as respostas e IDs das perguntas enviadas pelo formulário anterior
    $respostas = $_POST['respostas'] ?? [];
    $pergunta_id = $_POST['pergunta_id'][0] ?? null;
    ?>

    <!-- Formulário para feedback adicional -->
    <form method="POST" action="enviar.php">
        <div class="pergunta">
            <p>Feedback adicional (opcional):</p>
            <textarea name="feedback" placeholder="Deixe seu comentário..." maxlength="1000"></textarea>
        </div>  

        <!-- Campo para enviar os dados -->
        <input type="hidden" name="resposta" value="<?= $respostas[$pergunta_id] ?? '' ?>">
        <input type="hidden" name="pergunta_id" value="<?= $pergunta_id ?>">

        <!-- Botão de Confirmação para o Envio dos dados -->
        <div class="container">
            <button type="submit">Confirmar Respostas</button>
        </div>    </form>

    <!-- Rodapé com texto informando o anonimato -->
    <footer>
        <p>Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</p>
    </footer>
</body>

</html>
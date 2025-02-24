<!-- Arquivo: index.php -->
<!--Página Principal - Formulário de Avaliação-->

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação do Hospital Regional Alto Vale - Pergunta</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Logo do Hospital -->
    <img src="../img/logo.png" alt="Logo do Hospital Regional Alto Vale"
        style="display: block; margin: 0 auto; width: 150px;">

    <h1>Avaliação do Hospital Regional Alto Vale</h1>

    <?php

    // Captura o dispositivo selecionado na tela inicial
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dispositivo'])) {
        $_SESSION['dispositivo'] = $_POST['dispositivo'];
    }

    // Verifica se o dispositivo foi selecionado; caso contrário, redireciona
    if (!isset($_SESSION['dispositivo'])) {
        header('Location: dispositivo.php');
        exit();
    }

    // Dispositivo atual (opcional: exibir no cabeçalho)
    $dispositivo = $_SESSION['dispositivo'];


    //Inclui a conexão com o banco de dados
    include '../src/database.php';

    //Consulta a busca na tabela perguntas 
    $query = "SELECT * FROM perguntas LIMIT 1";
    $result = pg_query($conn, $query);
    ?>

    <!-- Formulário de avaliação-->
    <form method="POST" action="feedback.php">
        <?php
        //Exibe as perguntas na página
        while ($row = pg_fetch_assoc($result)): ?>
            <div class="pergunta">
                <!-- Exibe o texto das perguntas -->
                <p><?= $row['texto'] ?></p>
                <div class="escala">

                    <!-- Exibe  as opções de respostas em escala de 0 a 10 (0 = insatisfeito e 10 = satisfeito) -->
                    <?php for ($i = 0; $i <= 10; $i++): ?>
                        <input type="radio" id="resposta_<?= $row['id'] ?>_<?= $i ?>"
                            name="respostas[<?= $row['id'] ?>]" value="<?= $i ?>" required>
                        <label for="resposta_<?= $row['id'] ?>_<?= $i ?>"><?= $i ?></label>
                    <?php endfor; ?>
                </div>
                <!-- Campo para enviar os dados -->
                <input type="hidden" name="pergunta_id[]" value="<?= $row['id'] ?>">
            </div>
        <?php endwhile; ?>

        <!-- Botão de Confirmação -->
        <div class="container">
            <button type="submit">Confirmar Respostas</button>
        </div>
    </form>

    <!-- Rodapé com texto informando o anonimato -->
    <footer>
        <p>Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</p>
    </footer>
</body>

</html>
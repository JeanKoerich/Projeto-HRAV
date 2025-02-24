<!-- Arquivo: dashboard.php -->
<!-- Arquivo Dashboard criado somente para visualização das respostas -->

<?php
// Inclui a conexão com o banco de dados
include '../src/database.php';

// Consulta para obter as respostas, dispositivos e perguntas
$query = "
    SELECT r.id, r.valor, r.feedback, r.data_avaliacao, d.nome AS dispositivo, p.texto AS pergunta
    FROM respostas r
    JOIN dispositivos d ON r.dispositivo_id = d.id
    JOIN perguntas p ON r.pergunta_id = p.id
    ORDER BY r.data_avaliacao DESC
";
$result = pg_query($conn, $query);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    echo "Erro ao recuperar dados: " . pg_last_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Visualizar Respostas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Logo do Hospital -->
    <img src="../img/logo.png" alt="Logo do Hospital Regional Alto Vale" style="display: block; margin: 0 auto; width: 150px;">

    <h1>Dashboard - Visualização de Respostas</h1>

    <!-- Tabela de respostas -->
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dispositivo</th>
                <th>Pergunta</th>
                <th>Resposta</th>
                <th>Feedback</th>
                <th>Data da Avaliação</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['dispositivo'] ?></td>
                    <td><?= $row['pergunta'] ?></td>
                    <td><?= $row['valor'] ?></td>
                    <td><?= $row['feedback'] ? $row['feedback'] : 'N/A' ?></td>
                    <td><?= $row['data_avaliacao'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>    

    <!-- Rodapé -->
    <footer>
        <p>Dashboard Administrativo - Avaliações do Hospital Regional Alto Vale</p>
    </footer>

</body>

</html>

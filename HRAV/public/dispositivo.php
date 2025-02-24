<!-- Arquivo: dispositivo.php -->
<!--Página de seleção de dispositivos -->

<?php
// Inclui a conexão com o banco de dados
include '../src/database.php';

// Consulta para buscar todos os dispositivos cadastrados no banco de dados
$query = "SELECT id, nome FROM dispositivos";
$result = pg_query($conn, $query);

// Verifica se algum dispositivo foi encontrado
if (!$result) {
    echo "Erro ao recuperar dispositivos: " . pg_last_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar Dispositivo</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="centralizado">
    <!-- Logo do Hospital -->
    <img src="../img/logo.png" alt="Logo do Hospital Regional Alto Vale"
        style="display: block; margin: 0 auto; width: 150px;">

    <h1>Selecione o Dispositivo</h1>
    <p>Escolha o dispositivo que está sendo utilizado para responder à avaliação:</p>

    <!-- Formulário para selecionar o dispositivo -->
    <form method="POST" action="index.php">
        <div class="container">
            <?php
            // Exibe os dispositivos
            while ($row = pg_fetch_assoc($result)) {
                echo '<button type="submit" name="dispositivo" value="' . $row['nome'] . '">';
                echo $row['nome'];
                echo '</button>';
            }
            ?>
        </div>
    </form>

    <!-- Rodapé -->
    <footer>
        <p>Sua escolha é anônima e será usada apenas para fins estatísticos.</p>
    </footer>
</body>

</html>

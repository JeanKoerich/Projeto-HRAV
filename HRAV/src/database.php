<!-- Arquivo: database.php -->

<?php

/** Estabelece a conexão com o banco de dados PostgreSQL.
 * @return resource|false*/
function connectDatabase() {
    // Configurações do banco de dados
    $host = "localhost";
    $port = "5000";
    $dbname = "HRAV";
    $user = "postgres";
    $password = "123456";

    // Tenta estabelecer a conexão com o banco de dados
    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    // Verifica se houve erro na conexão
    if (!$conn) {
        // Lança uma exceção com a mensagem de erro
        throw new Exception("Erro na conexão com o banco de dados: " . pg_last_error());
    }

    return $conn;
}

try {
    // Estabelece a conexão
    $conn = connectDatabase();
} catch (Exception $e) {
    // Exibe a mensagem de erro
    die($e->getMessage());
}

return $conn;
?>
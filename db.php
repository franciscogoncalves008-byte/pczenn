<?php
$servidor = getenv('DB_HOST') ?: 'localhost';
$utilizador = getenv('DB_USER') ?: 'root';
$password   = getenv('DB_PASS') ?: '';
$base_dados = getenv('DB_NAME') ?: 'pczen';
$porta      = (int)(getenv('DB_PORT') ?: 3306);

$conn = new mysqli($servidor, $utilizador, $password, $base_dados, $porta);

if ($conn->connect_error) {
    die('Erro de ligação à base de dados: ' . $conn->connect_error);
}

$conn->set_charset('utf8mb4');
?>

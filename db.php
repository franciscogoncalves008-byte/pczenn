<?php
/*
 * db.php — Ligação à base de dados
 *
 * Este ficheiro é incluído em todas as páginas PHP que precisam
 * de aceder à base de dados MySQL.
 * Basta escrever:  require 'db.php';
 * e a variável $conn fica disponível para fazer consultas.
 */

// Cria a ligação ao MySQL com os dados do servidor
// new mysqli(servidor, utilizador, password, nome_da_base_de_dados, porta)
$conn = new mysqli('localhost', 'root', '', 'pczen', 3306);

// Define o conjunto de caracteres para suportar acentos e caracteres especiais
$conn->set_charset('utf8mb4');
?>

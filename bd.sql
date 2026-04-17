<?php

$conn = new mysqli(
    "HOST_DA_DB",
    "USER_DA_DB",
    "PASSWORD_DA_DB",
    "NOME_DA_DB"
);

if ($conn->connect_error) {
    die("Erro de ligação: " . $conn->connect_error);
}
?>

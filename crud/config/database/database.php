<?php
// Configurações de conexão
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "isael"; // Substitua pelo nome real do seu banco

// Criar conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

<?php
require_once '../config/database/database.php'; // conexão com o banco

// Verifica se o método é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe e limpa os dados do formulário
    $nome = trim($_POST['nome']);
    $partido = trim($_POST['partido']);
    $votos = intval($_POST['votos']);
    $data_eleicao = $_POST['data_eleicao'];


    echo $nome;
    echo $partido;
    echo $votos;
    echo $data_eleicao;

    // Validação básica (pode melhorar depois)
    if (empty($nome) || empty($partido)  || empty($data_eleicao)) {
        die('Por favor, preencha todos os campos.');
    }

    // Prepare a query para evitar SQL Injection (usando prepared statements)
    $stmt = $conn->prepare("INSERT INTO candidatos (nome, partido, numero_votos, data_eleicao) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $nome, $partido, $votos, $data_eleicao);

    if ($stmt->execute()) {
        // Redireciona de volta para a página principal após salvar
        header('Location: ../index.php'); // substitua por seu arquivo principal
        exit();
    } else {
        echo "Erro ao salvar candidato: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Método inválido.";
}
?>

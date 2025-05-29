<?php
require_once '../config/database/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = intval($_POST['id']);
  $nome = $_POST['nome'];
  $partido = $_POST['partido'];
  $votos = intval($_POST['votos']);
  $data = $_POST['data_eleicao'];

  $stmt = $conn->prepare("UPDATE candidatos SET nome=?, partido=?, numero_votos=?, data_eleicao=? WHERE id=?");
  $stmt->bind_param("ssisi", $nome, $partido, $votos, $data, $id);
  $stmt->execute();
}

header("Location: /index.php");
exit;
?>

<?php
require_once '../config/database/database.php';

if (!isset($_GET['id'])) {
  header("Location: /index.php");
  exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM candidatos WHERE id = $id");
$candidato = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Editar Candidato</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Editar Candidato</h2>
    <form method="POST" action="/actions/salvar_edicao.php" class="space-y-4">
      <input type="hidden" name="id" value="<?= $candidato['id'] ?>" />
      <input type="text" name="nome" value="<?= $candidato['nome'] ?>" class="w-full border px-3 py-2 rounded" required />
      <input type="text" name="partido" value="<?= $candidato['partido'] ?>" class="w-full border px-3 py-2 rounded" required />
      <input type="number" name="votos" value="<?= $candidato['votos'] ?>" class="w-full border px-3 py-2 rounded" required />
      <input type="date" name="data_eleicao" value="<?= $candidato['data_eleicao'] ?>" class="w-full border px-3 py-2 rounded" required />
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Salvar Alterações</button>
    </form>
  </div>
</body>
</html>

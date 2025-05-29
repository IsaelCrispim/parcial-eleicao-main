<?php
require_once './config/database/database.php';

// Se o usuário clicou em votar, recebe o ID e incrementa votos
if (isset($_GET['votar_id'])) {
    $id = intval($_GET['votar_id']);
    $stmt = $conn->prepare("UPDATE candidatos SET numero_votos = numero_votos + 1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Redireciona para evitar múltiplos votos por refresh
    header("Location: votacao.php");
    exit;
}

$candidatos = $conn->query("SELECT * FROM candidatos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Votação</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">

  <div class="container mx-auto p-4">

    <h1 class="text-3xl font-bold mb-4">Votação</h1>

    <!-- Botão para voltar ao índice -->
    <a href="/index.php" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 mb-6 inline-block">
      Voltar
    </a>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <?php while ($c = $candidatos->fetch_assoc()): ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRS_nxitB3fKqirz4-y8qTRYiOYQKq5NkVv4qT_PNj-n1atgprnPnd3bxkzwseuGwtwWqE&usqp=CAU" alt="Candidato" class="w-full h-48 object-cover" />
          <div class="p-4">
            <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($c['nome']) ?></h2>
            <p class="text-gray-700 mb-1">Partido: <?= htmlspecialchars($c['partido']) ?></p>
            <p class="text-gray-700 mb-1">Votos: <?= $c['numero_votos'] ?></p>
            <p class="text-gray-700 mb-4">Data da Eleição: <?= date("d/m/Y", strtotime($c['data_eleicao'])) ?></p>

            <!-- Botão votar -->
            <a href="?votar_id=<?= $c['id'] ?>" 
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 block text-center">
               Votar
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

</body>
</html>

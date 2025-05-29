<?php
require_once './config/database/database.php'; // conexão com o banco
$candidatos = $conn->query("SELECT * FROM candidatos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lista de Candidatos</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">

  <div class="container mx-auto p-4">

    <h1 class="text-3xl font-bold mb-4">Lista de Candidatos</h1>

    <!-- Botão para acessar a página de votação -->
<a href="/votacao.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-6 inline-block">
  Votação
</a>


    <!-- Botão para abrir o modal -->
    <button id="openModalBtn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6">
      Adicionar Candidato
    </button>

    <button id="openModalBtn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6">
      Votação
    </button>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <?php while ($c = $candidatos->fetch_assoc()): ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRS_nxitB3fKqirz4-y8qTRYiOYQKq5NkVv4qT_PNj-n1atgprnPnd3bxkzwseuGwtwWqE&usqp=CAU" alt="Candidato" class="w-full h-48 object-cover" />
          <div class="p-4">
            <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($c['nome']) ?></h2>
            <p class="text-gray-700 mb-1">Partido: <?= htmlspecialchars($c['partido']) ?></p>
            <p class="text-gray-700 mb-1">Votos: <?= $c['numero_votos'] ?></p>
            <p class="text-gray-700 mb-4">Data da Eleição: <?= date("d/m/Y", strtotime($c['data_eleicao'])) ?></p>

            <div class="flex justify-between">
              <a href="/actions/editar_candidato.php?id=<?= $c['id'] ?>" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                Editar
              </a>
              <a href="/actions/remover_candidato.php?id=<?= $c['id'] ?>" onclick="return confirm('Tem certeza que deseja remover?')" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                Remover
              </a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <!-- Modal para adicionar candidato -->
  <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6 w-96 relative">
      <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-600 hover:text-gray-900 font-bold text-xl">&times;</button>
      <h2 class="text-2xl mb-4 font-bold">Adicionar Candidato</h2>
      <form method="POST" action="/actions/adicionar_candidato.php" class="space-y-4">
        <input
          type="text"
          name="nome"
          placeholder="Nome"
          required
          class="w-full border border-gray-300 rounded px-3 py-2"
        />
        <input
          type="text"
          name="partido"
          placeholder="Partido"
          required
          class="w-full border border-gray-300 rounded px-3 py-2"
        />
        <input
          type="number"
          name="votos"
          placeholder="Votos"
          required
          class="w-full border border-gray-300 rounded px-3 py-2"
        />
        <input
          type="date"
          name="data_eleicao"
          placeholder="Data da Eleição"
          required
          class="w-full border border-gray-300 rounded px-3 py-2"
        />
        <button
          type="submit"
          class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700"
        >
          Salvar
        </button>
      </form>
    </div>
  </div>

  <script>
    const modal = document.getElementById("modal");
    const openBtn = document.getElementById("openModalBtn");
    const closeBtn = document.getElementById("closeModalBtn");

    openBtn.addEventListener("click", () => modal.classList.remove("hidden"));
    closeBtn.addEventListener("click", () => modal.classList.add("hidden"));
    modal.addEventListener("click", (e) => {
      if (e.target === modal) modal.classList.add("hidden");
    });
  </script>

</body>
</html>


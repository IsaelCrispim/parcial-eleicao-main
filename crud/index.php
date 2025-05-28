<?php
require_once './config/database/database.php'; // conexão com o banco

// Se quiser, pode puxar a lista de candidatos aqui e exibir dinamicamente.
// Por enquanto, deixei estático conforme seu exemplo.
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lista de Candidatos</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">

  <div class="container mx-auto p-4">

    <h1 class="text-3xl font-bold mb-4">Lista de Candidatos</h1>

    <!-- Botão para abrir o modal -->
    <button id="openModalBtn" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6">
      Adicionar Candidato
    </button>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <!-- Candidato 1 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="https://via.placeholder.com/150" alt="Candidato 1" class="w-full h-48 object-cover" />
        <div class="p-4">
          <h2 class="text-xl font-bold mb-2">Nome do Candidato 1</h2>
          <p class="text-gray-700 mb-1">Partido: Partido 1</p>
          <p class="text-gray-700 mb-1">Votos: 5000</p>
          <p class="text-gray-700 mb-4">Data da Eleição: 01/01/2024</p>
        </div>
      </div>
      <!-- Candidato 2 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="https://via.placeholder.com/150" alt="Candidato 2" class="w-full h-48 object-cover" />
        <div class="p-4">
          <h2 class="text-xl font-bold mb-2">Nome do Candidato 2</h2>
          <p class="text-gray-700 mb-1">Partido: Partido 2</p>
          <p class="text-gray-700 mb-1">Votos: 3000</p>
          <p class="text-gray-700 mb-4">Data da Eleição: 01/01/2024</p>
        </div>
      </div>
      <!-- Candidato 3 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="https://via.placeholder.com/150" alt="Candidato 3" class="w-full h-48 object-cover" />
        <div class="p-4">
          <h2 class="text-xl font-bold mb-2">Nome do Candidato 3</h2>
          <p class="text-gray-700 mb-1">Partido: Partido 3</p>
          <p class="text-gray-700 mb-1">Votos: 7000</p>
          <p class="text-gray-700 mb-4">Data da Eleição: 01/01/2024</p>
        </div>
      </div>
      <!-- Candidato 4 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="https://via.placeholder.com/150" alt="Candidato 4" class="w-full h-48 object-cover" />
        <div class="p-4">
          <h2 class="text-xl font-bold mb-2">Nome do Candidato 4</h2>
          <p class="text-gray-700 mb-1">Partido: Partido 4</p>
          <p class="text-gray-700 mb-1">Votos: 4500</p>
          <p class="text-gray-700 mb-4">Data da Eleição: 01/01/2024</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal (começa escondido) -->
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

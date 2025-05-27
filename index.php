<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Candidatos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">    
<div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Lista de Candidatos</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Candidato 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/150" alt="Candidato 1" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Nome do Candidato 1</h2>
                    <p class="text-gray-700 mb-1">Partido: Partido 1</p>
                    <p class="text-gray-700 mb-1">Votos: 5000</p>
                    <p class="text-gray-700 mb-4">Data da Eleição: 01/01/2024</p>
                </div>
            </div>
            <!-- Candidato 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/150" alt="Candidato 2" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Nome do Candidato 2</h2>
                    <p class="text-gray-700 mb-1">Partido: Partido 2</p>
                    <p class="text-gray-700 mb-1">Votos: 3000</p>
                    <p class="text-gray-700 mb-4">Data da Eleição: 01/01/2024</p>
                </div>
            </div>
            <!-- Candidato 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/150" alt="Candidato 3" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Nome do Candidato 3</h2>
                    <p class="text-gray-700 mb-1">Partido: Partido 3</p>
                    <p class="text-gray-700 mb-1">Votos: 7000</p>
                    <p class="text-gray-700 mb-4">Data da Eleição: 01/01/2024</p>
                </div>
            </div>
            <!-- Candidato 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/150" alt="Candidato 4" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Nome do Candidato 4</h2>
                    <p class="text-gray-700 mb-1">Partido: Partido 4</p>
                    <p class="text-gray-700 mb-1">Votos: 4500</p>
                    <p class="text-gray-700 mb-4">Data da Eleição: 01/01/2024</p>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
require_once 'config/database/database.php';

// Agora você pode usar $conn para fazer consultas

echo "Conexão estabelecida com sucesso!";
?>

</html>
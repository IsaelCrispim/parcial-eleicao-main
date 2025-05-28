<?php
include_once("../config/database/database.php");    

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se o id existe no banco de dados
    $sql = "SELECT * FROM contatos WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Deleta o contato
        $sql_delete = "DELETE FROM contatos WHERE id = ?";
        $stmt_delete = $con->prepare($sql_delete);
        $stmt_delete->bind_param("i", $id);
        $stmt_delete->execute();

        // Redireciona de volta para a página principal com mensagem de sucesso
        header("Location: ../index.php?mensagem=Contato removido com sucesso!");
        exit();
    } else {
        // Caso o contato não exista
        header("Location: ../index.php?mensagem=Contato não encontrado!");
        exit();
    }
} else {
    // Caso o id não seja passado
    header("Location: ../index.php?mensagem=ID do contato não especificado!");
    exit();
}
?>
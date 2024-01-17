<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Execute a consulta SQL para obter os dados do usuário
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Verifique se há pelo menos uma linha retornada
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        } else {
            echo json_encode(['error' => 'Usuário não encontrado']);
        }
    } else {
        echo json_encode(['error' => 'Erro na execução da consulta']);
    }
} else {
    echo json_encode(['error' => 'ID do usuário não fornecido']);
}
?>

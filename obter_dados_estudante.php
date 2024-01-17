<?php
// Incluir a conexão com o banco de dados


// buscar_dados_usuario.php

// ... (código para conectar ao banco de dados e recuperar dados)

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'Usuário não encontrado']);
}
?>

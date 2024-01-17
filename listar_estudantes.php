<?php
// Incluir a conexão com o banco de dados
include 'conexao.php';

// Consultar os dados dos estudantes
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['sobrenome']}</td>
                <td>{$row['sexo']}</td>
                <td>{$row['numfilhos']}</td>
                <td>{$row['nascimento']}</td>
                <td>{$row['email']}</td>
                <td>{$row['cpf']}</td>
                <td>
                <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#editStudentModal' onclick='editarEstudante(" . $row['id'] . ")'>Editar</button>
                    <a href='deletar.php?id={$row['id']}' class='btn btn-danger'>Deletar</a>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='9'>Nenhum estudante encontrado.</td></tr>";
}

$conn->close();
?>
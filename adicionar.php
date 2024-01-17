<?php
include 'conexao.php';

if(isset($_POST['insertdata'])) {
    // Obter dados do formulário e inserir no banco de dados
    $primeiro_nome = $_POST['primeiro_nome'];
    $sobrenome = $_POST['sobrenome'];
    $sexo = $_POST['sexo'];
    $num_filhos = $_POST['Nº_defilhos'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['E_mail'];
    $cpf = $_POST['cpf'];

    $sql = "INSERT INTO users(`nome`, `sobrenome`, `sexo`, `numfilhos`, `nascimento`, `email`, `cpf`) VALUES ('$primeiro_nome', '$sobrenome', '$sexo', '$num_filhos', '$data_nascimento', '$email', '$cpf')";
echo $sql; // Adicione esta linha para imprimir a instrução SQL
$result = mysqli_query($conn, $sql);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
    // Redirecionar para index.php após a inserção
}
?>

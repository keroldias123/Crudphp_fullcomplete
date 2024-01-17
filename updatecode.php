
<?php
include 'conexao.php';

if(isset($_POST['bntupdate'])) {
    // Obter dados do formulário e inserir no banco de dados
    $id = $_POST['id'];
    $primeiro_nome = $_POST['primeiro_nome'];
    $sobrenome = $_POST['sobrenome'];
    $sexo = $_POST['sexo'];
    $num_filhos = $_POST['N_defilhos'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['E_mail'];
    $cpf = $_POST['cpf'];

    // Atualizar os dados no banco de dados
    $sql = "UPDATE users SET 
            nome = '$primeiro_nome',
            sobrenome = '$sobrenome',
            sexo = '$sexo',
            numfilhos = $num_filhos,
            nascimento = '$data_nascimento',
            email = '$email',
            cpf = '$cpf'
            WHERE id = $id";
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
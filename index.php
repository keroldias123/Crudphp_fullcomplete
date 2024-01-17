<?php include("conexao.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Adicione os meta tags, links CSS, e scripts JS aqui -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


        <!-- Modal -->
        <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="adicionar.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Primeiro nome </label>
                            <input type="text" name="primeiro_nome" class="form-control" placeholder="Enter First Name">
                        </div>

                        <div class="form-group">
                            <label> Sobrenome </label>
                            <input type="text" name="sobrenome" class="form-control" placeholder="Enter Last Name">
                        </div>

                        <div class="form-group">
                            <label> Sexo </label>
                            <select name="sexo" id="">
                                <option>Masculino</option>
                                <option>Femenino</option>
                            </select>
                           </div>
                           
                        <div class="form-group">
                            <label> Numero de filhos </label>
                            <input type="number" name="Nº_defilhos" class="form-control" placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label> data nascimento </label>
                            <input type="date" name="data_nascimento" class="form-control" placeholder="Enter Course">
                        </div>
                        <div class="form-group">
                            <label> E-mail </label>
                            <input type="text" name="E_mail" class="form-control" placeholder="Enter Course">
                        </div>
                        <div class="form-group">
                            <label> CPF </label>
                            <input type="text" name="cpf" class="form-control" placeholder="Enter Course">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

     

                     

    <div class="container mt-5">
        <button class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">Add Student</button>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Sex</th>
                    <th>Number of Children</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
    <!-- Modal code here<php include 'listar_estudantes.php'; ?>-->

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
                            <button class='btn btn-primary btn-sm' onclick='openEditModal(" . $row['id'] . ")'>Editar</button>
                                <a href='deletar.php?id={$row['id']}' class='btn btn-danger'>Deletar</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Nenhum estudante encontrado.</td></tr>";
            }

            $conn->close();
            ?>

            </tbody>
        </table>
    </div>

    
<!-- Modal de Edição -->
<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Estudante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editStudentForm"  action="updatecode.php" method="post">
                    <input type="hidden" id="editStudentId" name="id">
                    <div class="form-group">
                        <label for="editFirstName">Primeiro Nome</label>
                        <input type="text" class="form-control"  id="editFirstName" name="primeiro_nome" placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label for="editLastName">Sobrenome</label>
                        <input type="text" class="form-control" id="editLastName" name="sobrenome" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label for="editSexo">Sexo</label>
                        <select class="form-control" id="editSexo" name="sexo">
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editNumFilhos">Número de Filhos</label>
                        <input type="number" class="form-control" id="editNumFilhos" name="N_defilhos" placeholder="Enter Number of Children">
                    </div>
                    <div class="form-group">
                        <label for="editDataNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="editDataNascimento" name="data_nascimento" placeholder="Enter Date of Birth">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">E-mail</label>
                        <input type="text" class="form-control" id="editEmail" name="E_mail" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="editCPF">CPF</label>
                        <input type="text" class="form-control" id="editCPF" name="cpf" placeholder="Enter CPF">
                    </div>
                    <button type="submit" name="bntupdate" class="btn btn-primary">Salvar Alterações</button>
                </form>
            </div>
        </div>
    </div>
</div>
    

       <!-- Modal code here -->

       <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
    <script>
    function openEditModal(id) {
        // Use AJAX para buscar os dados do usuário do servidor
        $.ajax({
            url: 'buscar_dados_usuario.php',
            method: 'GET',
            data: { id: id },
            dataType: 'json', // Especifica o tipo de dado que espera receber
            success: function (dados) {
                console.log(dados); // Verifique os dados recebidos do servidor

                // Preencha o formulário com os dados recebidos
                $('#editStudentId').val(parseInt(dados.id));
                $('#editFirstName').val(dados.nome);
                $('#editLastName').val(dados.sobrenome);
                $('#editSexo').val(dados.sexo);
                $('#editNumFilhos').val(dados.numfilhos);
                $('#editDataNascimento').val(dados.nascimento);
                $('#editEmail').val(dados.email);
                $('#editCPF').val(dados.cpf);

                // Abra o modal de edição
                $('#editStudentModal').modal('show');
            },
            error: function () {
                alert('Erro ao buscar dados do usuário.');
            }
        });
    }

   
</script>


</body>
</html>

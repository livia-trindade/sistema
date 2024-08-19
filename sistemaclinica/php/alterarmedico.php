<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Médico</title>
</head>
<body>
<div class="navbar">
        <img src="../imagens/logo.png" class="logo">
        <ul>
            <li><a href="index.php">Início</a></li>
            <li><a href="agenda.php">Agendar consulta</a></li>
            <li><a href="cadastromedico.php">Cadastro de médicos</a></li>
            <li><a href="cadastropaciente.php">Cadastro de pacientes</a></li>
        </ul>
    </div>

    <?php
    require_once("conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $crm = $_POST['crm'];
    $especialidade = $_POST['especialidade'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $dias_atendimento = $_POST['dias_atendimento'];
    $horarios_atendimento = $_POST['horarios_atendimento'];
    $consultorio = $_POST['consultorio'];

        $sql = "UPDATE medico
                SET nome = '$nome', 
                crm = '$crm',
                especialidade = '$especialidade',
                telefone = '$telefone',
                email = '$email',
                endereco = '$endereco',
                dias_atendimento = '$dias_atendimento',
                horarios_atendimento = '$horarios_atendimento',
                consultorio = '$consultorio'
                  WHERE id = '$id';";
        $sqlcombanco = $conexao->prepare($sql);


        if ($sqlcombanco->execute()) {
            echo "<h3>Ok!</h3> <h3> O médico $nome foi alterado com sucesso! </h3> ";
        }
     else {
        echo "<h3>Erro!</h3>";
    }
    ?>
  <button class="button"><a href="listamedico.php">Voltar à Lista de Médicos</a></button>


    
</body>
</html>
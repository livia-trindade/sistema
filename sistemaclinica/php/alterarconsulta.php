<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Consulta</title>
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
    $id_medico = $_POST['id_medico'];
    $id_paciente = $_POST['id_paciente'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $procedimento = $_POST['procedimento'];
    $observacoes = $_POST['observacoes'];
    $status = $_POST['status'];

    $sql = "UPDATE consulta
            SET id_medico = '$id_medico',
                id_paciente = '$id_paciente',
                data = '$data',
                horario = '$horario',
                procedimento = '$procedimento',
                observacoes = '$observacoes',
                status = '$status'
            WHERE id = '$id';";
    $sqlcombanco = $conexao->prepare($sql);

    if ($sqlcombanco->execute()) {
        echo "<h3>Ok!</h3> <h3> A consulta foi alterada com sucesso! </h3> ";
    } else {
        echo "<h3>Erro!</h3>";
    }
    ?>
  <button class="button"><a href="listaconsultas.php">Voltar à Lista de Consultas</a></button>

</body>
</html>

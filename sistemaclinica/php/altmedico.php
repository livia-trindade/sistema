<?php

    require_once('conexao.php');
   
    $id = $_POST['id'];
    $sql = "SELECT * FROM medico WHERE id = :id";
    $retorno = $conexao->prepare($sql);
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);
    $retorno->execute();
    $array_retorno = $retorno->fetch();

    $nome = $array_retorno['nome'];
    $crm = $array_retorno['crm'];
    $especialidade = $array_retorno['especialidade'];
    $telefone = $array_retorno['telefone'];
    $email = $array_retorno['email'];
    $endereco = $array_retorno['endereco'];
    $dias_atendimento = $array_retorno['dias_atendimento'];
    $horarios_atendimento = $array_retorno['horarios_atendimento'];
    $consultorio = $array_retorno['consultorio'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <h3>Alterar Cadastro Médico</h3>
<form class="alterar" method="POST" action="alterarMedico.php">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="text" name="nome" value="<?php echo $nome ?>" required>
    <input type="text" name="crm" value="<?php echo $crm ?>" required>
    <input type="text" name="especialidade" value="<?php echo $especialidade ?>" required>
    <input type="tel" name="telefone" value="<?php echo $telefone ?>" required>
    <input type="email" name="email" value="<?php echo $email ?>" required>
    <input type="text" name="endereco" value="<?php echo $endereco ?>" required>
    <input type="text" name="dias_atendimento" value="<?php echo $dias_atendimento ?>" required>
    <input type="text" name="horarios_atendimento" value="<?php echo $horarios_atendimento ?>" required>
    <input type="text" name="consultorio" value="<?php echo $consultorio ?>" required>

   
    
    <input type="submit" name="update" value="Alterar">
</form>

</body>
</html>
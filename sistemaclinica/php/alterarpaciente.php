<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    
    <title>Alterar Paciente</title>
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

    $nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];
$estadocivil = $_POST['estadocivil'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$nacionalidade = $_POST['nacionalidade'];
$naturalidade = $_POST['naturalidade'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$convenio = $_POST['convenio'];
$condicoesmedicas = $_POST['condicoesmedicas'];
$medicacoes = $_POST['medicacoes'];
$historico = $_POST['historico'];
$emergencia = $_POST['emergencia'];
$tiposanguineo = $_POST['tiposanguineo'];


        $sql = "UPDATE paciente
                SET nome = '$nome',
nascimento = '$nascimento',
sexo = '$sexo',
estadocivil = '$estadocivil',
rg = '$rg',
cpf = '$cpf',
nacionalidade = '$nacionalidade',
naturalidade = '$naturalidade',
endereco = '$endereco',
telefone = '$telefone',
email = '$email',
convenio = '$convenio',
condicoesmedicas = '$condicoesmedicas',
medicacoes = '$medicacoes',
historico = '$historico',
emergencia = '$emergencia',
tiposanguineo = '$tiposanguineo'

                  WHERE id = '$id';";
        $sqlcombanco = $conexao->prepare($sql);


        if ($sqlcombanco->execute()) {
            echo "<h3>Ok!</h3> <h3> O paciente $nome foi alterado com sucesso! </h3> ";
        }
     else {
        echo "<h3>Erro!</h3>";
    }
    ?>
  <button class="button"><a href="listapaciente.php">Voltar à Lista de Pacientes</a></button>


    
</body>
</html>
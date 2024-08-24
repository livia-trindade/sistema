<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Médico</title>
</head>
<body>
<aside class="sidebar">
    <div class="menu">
        <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a><br><br><br><br>
        <a href="criaconsulta.php" class="menu-item"><img src="../imagens/calendario.svg" class="logo" width="35px"></a><br><br><br><br> 
        <a href="cadastropac.php" class="menu-item"><img src="../imagens/pessoaadd.svg" class="logo" width="35px"></a><br><br><br><br>
        <a href="cadastromedico.php" class="menu-item"><img src="../imagens/doctoradd.svg" class="logo" width="35px"></a>
    </div>
</aside>

<?php
require_once("conexao.php");

$id = $_POST['id'] ?? null;
$nome = $_POST['nome'] ?? null;
$crm = $_POST['crm'] ?? null;
$especialidade = $_POST['especialidade'] ?? null;
$telefone = $_POST['telefone'] ?? null;
$email = $_POST['email'] ?? null;
$endereco = $_POST['endereco'] ?? null;


$dias_atendimento = isset($_POST['dias_atendimento']) ? implode(',', $_POST['dias_atendimento']) : '';


$consultorio = $_POST['consultorio'] ?? null;


$sql = "UPDATE medico
        SET nome = :nome,
            crm = :crm,
            especialidade = :especialidade,
            telefone = :telefone,
            email = :email,
            endereco = :endereco,
            dias_atendimento = :dias_atendimento,
            consultorio = :consultorio
        WHERE id = :id";
$sqlcombanco = $conexao->prepare($sql);


$sqlcombanco->bindParam(':nome', $nome);
$sqlcombanco->bindParam(':crm', $crm);
$sqlcombanco->bindParam(':especialidade', $especialidade);
$sqlcombanco->bindParam(':telefone', $telefone);
$sqlcombanco->bindParam(':email', $email);
$sqlcombanco->bindParam(':endereco', $endereco);
$sqlcombanco->bindParam(':dias_atendimento', $dias_atendimento);
$sqlcombanco->bindParam(':consultorio', $consultorio);
$sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT);

if ($sqlcombanco->execute()) {
    echo "<h3>Ok!</h3> <h3> O médico $nome foi alterado com sucesso! </h3>";
} else {
    echo "<h3>Erro ao alterar o médico.</h3>";
}
?>

<button class="button"><a href="listamedico.php">Voltar à Lista de Médicos</a></button>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Paciente</title>
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

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    try {
        // Excluindo as consultas associadas ao paciente
        $sql = "DELETE FROM consulta WHERE id_paciente = :id_paciente";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id_paciente', $id);
        $stmt->execute();

        // Agora excluindo o paciente
        $sql = "DELETE FROM paciente WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "<h3>Paciente excluído com sucesso!</h3>";
    } catch (PDOException $e) {
        echo "<h3>Erro!</h3> Não foi possível excluir o Paciente. Detalhes: " . $e->getMessage();
    }
} else {
    echo "<h3>Erro!</h3> ID do paciente não foi informado.";
}
?>

<button class="button"><a href="listapaciente.php">Voltar</a></button>

</body>
</html>

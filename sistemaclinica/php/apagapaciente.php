<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="..css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Paciente</title>
</head>
<body>
<?php
    require_once("conexao.php");

    $id = $_POST['id'];

    $sql = "DELETE FROM paciente WHERE id = :id";
    $sqlcombanco = $conexao->prepare($sql);
    $sqlcombanco->bindParam(':id', $id, PDO::PARAM_INT);

    if ($sqlcombanco->execute()) {
        echo "<h3>Paciente excluído com sucesso!</h3>";
    } else {
        echo "<h3>Erro!</h3> Não foi possível excluir o Paciente.";
    }
    ?>
    <button class="button"><a href="listapaciente.php">Voltar</a></button>
</body>
</html>
<?php
require_once("conexao.php");


if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT numero, telefone, endereco FROM consultorio WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Verifica se o consultório foi encontrado
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $numero = $row['numero'];
        $telefone = $row['telefone'];
        $endereco = $row['endereco'];
    } else {
        echo "Consultório não encontrado!";
        exit;
    }
} else {
    echo "ID do consultório não foi passado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Consultório</title>
</head>
<body>

<aside class="sidebar">
        <div class="menu">
                <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a> <br>
                <br> <br> <br>
                <a href="criaconsulta.php" class="menu-item"><img src="../imagens/calendario.svg" class="logo" width="35px"></a>
                <br> <br> <br> <br> 
                <a href="cadastropac.php" class="menu-item"><img src="../imagens/pessoaadd.svg" class="logo"
                        width="35px"></a> 
                        <br> <br> <br> <br>
                <a href="cadastromedico.php" class="menu-item"><img src="../imagens/doctoradd.svg" class="logo"
                        width="35px"></a> 
                         <br> <br> <br> <br>
                <a href="cadastroconvenio.php" class="menu-item"><img src="../imagens/convenio.svg" class="logo"
                        width="35px"></a>  
                        <br> <br> <br> <br>
                <a href="cadastroconsultorio.php" class="menu-item"><img src="../imagens/hospital.svg" class="logo"
                        width="35px"></a>
            </div>
        </aside>

<h3>Alterar Consultório</h3>
<form class="alterar" method="POST" action="alterarconsultorio.php">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="number" name="numero" value="<?php echo $numero ?>" required>
    <input type="tel" name="telefone" value="<?php echo $telefone ?>">
    <input type="text" name="endereco" value="<?php echo $endereco ?>">
    <input type="submit" name="update" value="Alterar">
</form>

</body>
</html>

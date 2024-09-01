<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Convênio</title>
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

<h3>Alterar Cadastro de Convênio</h3>

<?php
require_once("conexao.php");


if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM convenio WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome = $row['nome'];
        $descricao = $row['descricao'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $site = $row['site'];
    } else {
        echo "Convênio não encontrado!";
        exit;
    }
} else {
    echo "ERRO!";
    exit;
}
?>

<form class="alterar" method="POST" action="alterarconvenio.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
    <textarea name="descricao" required><?php echo htmlspecialchars($descricao); ?></textarea>
    <input type="tel" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>">
    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <input type="url" name="site" value="<?php echo htmlspecialchars($site); ?>">

    <input type="submit" name="update" value="Alterar">
</form>

</body>
</html>

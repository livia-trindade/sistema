<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Convênio</title>
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

<h3>Alterar Cadastro de Convênio</h3>
<form class="alterar" method="POST" action="alterarConvenio.php">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="text" name="nome" value="<?php echo $nome ?>" required>
    <textarea name="descricao" required><?php echo $descricao ?></textarea>
    <input type="tel" name="telefone" value="<?php echo $telefone ?>">
    <input type="email" name="email" value="<?php echo $email ?>">
    <input type="url" name="site" value="<?php echo $site ?>">

    <input type="submit" name="update" value="Alterar">
</form>

</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Convênio</title>
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

<h3>Cadastro de Convênio</h3>
<form class="cadastro" method="POST" action="crudconvenio.php">
    <input type="text" name="nome" placeholder="Nome do Convênio" required>
    <textarea name="descricao" placeholder="Descrição do Convênio"></textarea>
    <input type="tel" name="telefone" placeholder="Telefone">
    <input type="email" name="email" placeholder="E-mail">
    <input type="url" name="site" placeholder="Site">
    <input type="submit" value="Cadastrar Convênio">
</form>

</body>
</html>

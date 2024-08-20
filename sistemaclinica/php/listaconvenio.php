<?php 
require_once('conexao.php');
$retorno = $conexao->prepare('SELECT * FROM convenio');
$retorno->execute();
?>   

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Lista de Convênios</title>
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

<h3>Lista de Convênios</h3>
<table> 
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Site</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($retorno->fetchAll() as $value) { ?>
            <tr>
                <td><?php echo $value['nome'] ?></td>
                <td><?php echo $value['descricao'] ?></td>
                <td><?php echo $value['telefone'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['site'] ?></td>
                <td>
                    <form method="POST" action="altconvenio.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Alterar</button>
                    </form>
                </td> 
                <td>
                    <form method="POST" action="apagaconvenio.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Excluir</button>
                    </form>
                </td> 
            </tr>
        <?php } ?> 
    </tbody>
</table>
</body>
</html>

<?php 
require_once('conexao.php');
$retorno = $conexao->prepare('SELECT * FROM medico');
$retorno->execute();
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Lista de Médicos</title>
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

<h3>Lista de Médicos</h3>
<table> 
    <thead>
        <tr>
            <th>Nome</th>
            <th>CRM</th>
            <th>Especialidade</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Endereço</th>
            <th>Dias de Atendimento</th>
            <th>Horários de Atendimento</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($retorno->fetchAll() as $value) { ?>
            <tr>

                <td><?php echo $value['nome'] ?></td> 
                <td><?php echo $value['crm'] ?></td> 
                <td><?php echo $value['especialidade'] ?></td> 
                <td><?php echo $value['telefone'] ?></td> 
                <td><?php echo $value['email'] ?></td> 
                <td><?php echo $value['endereco'] ?></td> 
                <td><?php echo $value['dias_atendimento'] ?></td> 
                <td><?php echo $value['horarios_atendimento'] ?></td> 
                <td>
                    <form method="POST" action="altmedico.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Alterar</button>
                    </form>
                </td> 
                <td>
                    <form method="POST" action="apagamedico.php">
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
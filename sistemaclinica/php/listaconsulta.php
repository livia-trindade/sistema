<?php 
require_once('conexao.php');
$retorno = $conexao->prepare('SELECT consulta.*, medico.nome AS nome_medico, paciente.nome AS nome_paciente FROM consulta 
                              JOIN medico ON consulta.id_medico = medico.id 
                              JOIN paciente ON consulta.id_paciente = paciente.id');
$retorno->execute();
?>   

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Lista de Consultas</title>
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

<h3>Lista de Consultas</h3>
<table> 
    <thead>
        <tr>
            <th>Médico</th>
            <th>Paciente</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Procedimento</th>
            <th>Status</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($retorno->fetchAll() as $value) { ?>
            <tr>
                <td><?php echo $value['nome_medico'] ?></td> 
                <td><?php echo $value['nome_paciente'] ?></td> 
                <td><?php echo $value['data'] ?></td> 
                <td><?php echo $value['horario'] ?></td> 
                <td><?php echo $value['procedimento'] ?></td> 
                <td><?php echo $value['status'] ?></td> 
                <td>
                    <form method="POST" action="altconsulta.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Alterar</button>
                    </form>
                </td> 
                <td>
                    <form method="POST" action="apagaconsulta.php">
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

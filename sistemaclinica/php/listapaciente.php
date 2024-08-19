<?php 
require_once('conexao.php');
$retorno = $conexao->prepare('SELECT * FROM paciente');
$retorno->execute();
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Lista de Pacientes</title>
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

    <h3>Lista de Pacientes</h3>
    <table> 
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nascimento</th>
                <th>Sexo</th>
                <th>Estado Civil</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Nacionalidade</th>
                <th>Naturalidade</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Convênio</th>
                <th>Condições Médicas</th>
                <th>Medicações</th>
                <th>Histórico</th>
                <th>Alergias</th>
                <th>Emergência</th>
                <th>Tipo Sanguíneo</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($retorno->fetchAll() as $value) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($value['nome']); ?></td> 
                    <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($value['nascimento']))); ?></td> 
                    <td><?php echo htmlspecialchars($value['sexo']); ?></td> 
                    <td><?php echo htmlspecialchars($value['estadocivil']); ?></td> 
                    <td><?php echo htmlspecialchars($value['rg']); ?></td> 
                    <td><?php echo htmlspecialchars($value['cpf']); ?></td> 
                    <td><?php echo htmlspecialchars($value['nacionalidade']); ?></td> 
                    <td><?php echo htmlspecialchars($value['naturalidade']); ?></td> 
                    <td><?php echo htmlspecialchars($value['endereco']); ?></td> 
                    <td><?php echo htmlspecialchars($value['telefone']); ?></td> 
                    <td><?php echo htmlspecialchars($value['email']); ?></td> 
                    <td><?php echo htmlspecialchars($value['convenio']); ?></td> 
                    <td><?php echo htmlspecialchars($value['condicoesmedicas']); ?></td> 
                    <td><?php echo htmlspecialchars($value['medicacoes']); ?></td> 
                    <td><?php echo htmlspecialchars($value['historico']); ?></td> 
                    <td><?php echo htmlspecialchars($value['alergias']); ?></td> 
                    <td><?php echo htmlspecialchars($value['emergencia']); ?></td> 
                    <td><?php echo htmlspecialchars($value['tiposanguineo']); ?></td>

                    <td>
                        <form method="POST" action="altpaciente.php">
                            <input name="id" type="hidden" value="<?php echo htmlspecialchars($value['id']); ?>"/>
                            <button class="button" type="submit">Alterar</button>
                        </form>
                    </td> 
                    <td>
                        <form method="POST" action="apagapaciente.php">
                            <input name="id" type="hidden" value="<?php echo htmlspecialchars($value['id']); ?>"/>
                            <button class="button" type="submit">Excluir</button>
                        </form>
                    </td> 
                </tr>
            <?php } ?> 
        </tbody>
    </table>
</body>
</html>

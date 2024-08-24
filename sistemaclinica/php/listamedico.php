<?php 
require_once('conexao.php');

// Atualização da consulta SQL para incluir `horario_inicio` e `horario_fim`
$sql = 'SELECT medico.*, 
               GROUP_CONCAT(DISTINCT horarios_atendimento.dia SEPARATOR ", ") as dias,
               GROUP_CONCAT(DISTINCT CONCAT(horarios_atendimento.horario_inicio, "-", horarios_atendimento.horario_fim) SEPARATOR ", ") as horarios 
        FROM medico 
        LEFT JOIN horarios_atendimento ON medico.id = horarios_atendimento.medico_id
        GROUP BY medico.id';

$retorno = $conexao->prepare($sql);
$retorno->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Lista de Médicos</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body, html {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            background-image: linear-gradient(to left, #007BB7, #A1CCE8, #469FD5, #004F8C, #B3E5FC);
            background-size: 500% 100%;
            animation: degrade-animado 10s infinite alternate;
            padding: 20px;
        }

        @keyframes degrade-animado {
            0% { background-position-x: 0%; }
            100% { background-position-x: 100%; }
        }

        .sidebar {
            padding: 20px;
            width: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .sidebar .menu-item {
            text-decoration: none;
            background-color: rgba(0, 0, 0, 0.0);
            font-size: 24px;
            color: #fff;
            transition: all 0.3s ease;
        }

        .sidebar .menu-item:hover {
            border-radius: 50% 20% 50% 20%;
            padding: 20px;
            display: inline-block;
            box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.4);
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 10px 0px 0px 10px;
            height: auto;
        }

        .listamedico {
            flex: 1;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.4);
        }

        .listamedico h2 {
            font-size: 24px;
            color: #004F8C;
            text-align: center;
            margin-bottom: 20px;
        }

        .medico-card {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            margin-bottom: 10px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .medico-info {
            flex: 1;
            padding-right: 20px;
        }

        .medico-info h3 {
            margin: 0;
            font-size: 20px;
            color: #004F8C;
        }

        .medico-info p {
            margin: 5px 0;
            color: #555;
        }

        .medico-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .medico-actions button {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007BB7;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .medico-actions button:hover {
            background-color: #005f8a;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
            padding: 10px;
        }

        .dropdown-content select {
            width: 100%;
            border: none;
            background-color: #fff;
            padding: 5px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    <script>
        function confirmarExclusao(nome) {
            return confirm('ATENÇÃO: AO EXCLUIR OS REGISTROS DO MÉDICO, VOCÊ TAMBÉM EXCLUIRÁ TODAS AS CONSULTAS RELACIONADAS A ELE. Deseja mesmo excluir os registros do médico ' + nome + '?');
        }
    </script>
</head>
<body>
    <aside class="sidebar">
        <div class="menu">
            <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a>
            <a href="criaconsulta.php" class="menu-item"><img src="../imagens/calendario.svg" class="logo" width="35px"></a>
            <a href="cadastropac.php" class="menu-item"><img src="../imagens/pessoaadd.svg" class="logo" width="35px"></a>
            <a href="cadastromedico.php" class="menu-item"><img src="../imagens/doctoradd.svg" class="logo" width="35px"></a>
        </div>
    </aside>

    <div class="main-content">
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
                    <th>Consultório</th>
                    <th>Atendimento</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($retorno->fetchAll() as $value) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($value['nome']); ?></td> 
                    <td><?php echo htmlspecialchars($value['crm']); ?></td> 
                    <td><?php echo htmlspecialchars($value['especialidade']); ?></td> 
                    <td><?php echo htmlspecialchars($value['telefone']); ?></td> 
                    <td><?php echo htmlspecialchars($value['email']); ?></td> 
                    <td><?php echo htmlspecialchars($value['endereco']); ?></td> 
                    <td><?php echo htmlspecialchars($value['consultorio']); ?></td> 
                    <td>
                        <div class="dropdown">
                            <button class="dropbtn">Ver Atendimento</button>
                            <div class="dropdown-content">
                                <strong>Dias:</strong>
                                <select disabled>
                                    <?php foreach(explode(',', $value['dias']) as $dia) { ?>
                                        <option><?php echo htmlspecialchars(trim($dia)); ?></option>
                                    <?php } ?>
                                </select>
                                <strong>Horários:</strong>
                                <select disabled>
                                    <?php foreach(explode(',', $value['horarios']) as $horario) { ?>
                                        <option><?php echo htmlspecialchars(trim($horario)); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </td> 
                    <td>
                        <form method="POST" action="altmedico.php">
                            <input name="id" type="hidden" value="<?php echo htmlspecialchars($value['id']); ?>"/>
                            <button class="button" type="submit">Alterar</button>
                        </form>
                    </td> 
                    <td>
                        <form method="POST" action="apagamedico.php" onsubmit="return confirmarExclusao('<?php echo htmlspecialchars($value['nome']); ?>')">
                            <input name="id" type="hidden" value="<?php echo htmlspecialchars($value['id']); ?>"/>
                            <button class="button" type="submit">Excluir</button>
                        </form>
                    </td> 
                </tr>
            <?php } ?> 
            </tbody>
        </table>
    </div>
</body>
</html>

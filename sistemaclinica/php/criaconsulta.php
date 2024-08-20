<?php
require_once('conexao.php');

$medicos = $conexao->prepare('SELECT id, nome FROM medico');
$medicos->execute();

$pacientes = $conexao->prepare('SELECT id, nome FROM paciente');
$pacientes->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Agendar Consulta</title>
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

    <h3>Agendar Consulta</h3>
    <form action="crudconsulta.php" method="POST">
        <div class="form-group">
            <label for="id_medico">Médico</label>
            <select id="id_medico" name="id_medico" required>
                <option value="" disabled selected>Selecione o médico</option>
                <?php
                require_once('conexao.php');
                $retornoMedico = $conexao->prepare('SELECT id, nome FROM medico');
                $retornoMedico->execute();
                foreach($retornoMedico->fetchAll() as $medico) {
                    echo "<option value='{$medico['id']}'>{$medico['nome']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_paciente">Paciente</label>
            <select id="id_paciente" name="id_paciente" required>
                <option value="" disabled selected>Selecione o paciente</option>
                <?php
            
                $retornoPaciente = $conexao->prepare('SELECT id, nome FROM paciente');
                $retornoPaciente->execute();
                foreach($retornoPaciente->fetchAll() as $paciente) {
                    echo "<option value='{$paciente['id']}'>{$paciente['nome']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" id="data" name="data" required>
        </div>

        <div class="form-group">
            <label for="horario">Horário</label>
            <input type="time" id="horario" name="horario" required>
        </div>

        <div class="form-group">
            <label for="procedimento">Procedimento*</label>
            <input type="text" id="procedimento" name="procedimento" required>
        </div>

        <input type="hidden" name="status" value="agendada">
        
        <button type="submit">Agendar</button>
    </form>
</body>
</html>

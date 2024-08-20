<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Consulta</title>
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

<h3>Alterar Consulta</h3>

<form class="alterar" method="POST" action="alterarconsulta.php">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    
    <label for="id_medico">Médico</label>
    <select id="id_medico" name="id_medico" required>
        <?php
        require_once('conexao.php');
        $retornoMedico = $conexao->prepare('SELECT id, nome FROM medico');
        $retornoMedico->execute();
        foreach($retornoMedico->fetchAll() as $medico) {
            $selected = ($medico['id'] == $id_medico) ? "selected" : "";
            echo "<option value='{$medico['id']}' $selected>{$medico['nome']}</option>";
        }
        ?>
    </select>

    <label for="id_paciente">Paciente</label>
    <select id="id_paciente" name="id_paciente" required>
        <?php
        $retornoPaciente = $conexao->prepare('SELECT id, nome FROM paciente');
        $retornoPaciente->execute();
        foreach($retornoPaciente->fetchAll() as $paciente) {
            $selected = ($paciente['id'] == $id_paciente) ? "selected" : "";
            echo "<option value='{$paciente['id']}' $selected>{$paciente['nome']}</option>";
        }
        ?>
    </select>

    <label for="data">Data</label>
    <input type="date" name="data" value="<?php echo $data ?>" required>

    <label for="horario">Horário</label>
    <input type="time" name="horario" value="<?php echo $horario ?>" required>

    <label for="procedimento">Procedimento</label>
    <input type="text" name="procedimento" value="<?php echo $procedimento ?>" required>

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="agendada" <?php echo ($status == 'agendada') ? 'selected' : '' ?>>Agendada</option>
        <option value="finalizada" <?php echo ($status == 'finalizada') ? 'selected' : '' ?>>Finalizada</option>
        <option value="desmarcada" <?php echo ($status == 'desmarcada') ? 'selected' : '' ?>>Desmarcada</option>
        <option value="cancelada" <?php echo ($status == 'cancelada') ? 'selected' : '' ?>>Cancelada</option>
    </select>

    <input type="submit" name="update" value="Alterar">
</form>

</body>
</html>

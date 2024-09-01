<?php
require_once('conexao.php');

$medicos = $conexao->prepare('SELECT id, nome FROM medico');
$medicos->execute();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Agendar Consulta</title>
 
</head>
<body>
<div class="container">
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

<main class="main-contentinicio">
<h3>Agendar Consulta</h3>
<form action="crudconsulta.php" method="POST">
    <div class="form-group">
        <label for="id_medico">Médico</label>
        <select id="id_medico" name="id_medico" required onchange="fetchHorarios(this.value)">
            <option value="" disabled selected>Selecione o médico</option>
            <?php
            foreach ($medicos->fetchAll() as $medico) {
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
            $pacientes = $conexao->prepare('SELECT id, nome FROM paciente');
            $pacientes->execute();
            foreach ($pacientes->fetchAll() as $paciente) {
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
        <select id="horario" name="horario" required>
            <option value="" disabled selected>Selecione o horário</option>
        </select>
    </div>

    <div class="form-group">
        <label for="procedimento">Procedimento*</label>
        <input type="text" id="procedimento" name="procedimento" required>
    </div>

    <input type="hidden" name="status" value="agendada">
    
    <button type="submit">Agendar</button>
</form>
</div>
</main>
</body>
</html>

<script>
        function fetchHorarios(medicoId) {
            const data = document.getElementById('data').value;
            if (medicoId === "" || data === "") {
                document.getElementById("horario").innerHTML = "<option value=''>Selecione um horário</option>";
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open("GET", `get_horarios.php?id_medico=${medicoId}&data=${data}`, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("horario").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        // Chame a função fetchHorarios quando a data ou o médico for selecionado
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('id_medico').addEventListener('change', function() {
                fetchHorarios(this.value);
            });

            document.getElementById('data').addEventListener('change', function() {
                const medicoId = document.getElementById('id_medico').value;
                fetchHorarios(medicoId);
            });
        });
    </script>
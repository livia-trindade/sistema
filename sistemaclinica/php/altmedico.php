<?php
require_once('conexao.php');

// Verifica se foi enviado um ID válido
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    
    // Busca os dados do médico pelo ID
    $sql = "SELECT * FROM medico WHERE id = :id";
    $retorno = $conexao->prepare($sql);
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);
    $retorno->execute();
    $array_retorno = $retorno->fetch();

    // Se o médico foi encontrado, preenche os valores
    if ($array_retorno) {
        $nome = $array_retorno['nome'];
        $crm = $array_retorno['crm'];
        $especialidade = $array_retorno['especialidade'];
        $telefone = $array_retorno['telefone'];
        $email = $array_retorno['email'];
        $endereco = $array_retorno['endereco'];
        $dias_atendimento = $array_retorno['dias_atendimento'];
        $consultorio_medico = $array_retorno['consultorio'];  // Renomeado para claridade

        // Busca os horários de atendimento associados ao médico
        $sql_horarios = "SELECT dia, horario_inicio, horario_fim FROM horarios_atendimento WHERE medico_id = :id";
        $retorno_horarios = $conexao->prepare($sql_horarios);
        $retorno_horarios->bindParam(':id', $id, PDO::PARAM_INT);
        $retorno_horarios->execute();
        $horarios = $retorno_horarios->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Médico não encontrado.";
        exit;
    }
} else {
    echo "ID inválido.";
    exit;
}
?>

<?php
// Conexão com o banco de dados MySQL
$conn = new mysqli("localhost", "root", "", "clinica");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Busca a lista de consultórios
$sql = "SELECT numero FROM consultorio";
$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

$consultorios = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $consultorios[] = $row['numero'];
    }
} else {
    echo "Nenhum consultório encontrado.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Médico</title>
</head>
<body>

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

<h3>Alterar Cadastro Médico</h3>
<form class="alterar" method="POST" action="alterarMedico.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
    
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
    
    <label for="crm">CRM:</label>
    <input type="text" id="crm" name="crm" value="<?php echo htmlspecialchars($crm); ?>" required>
    
    <label for="especialidade">Especialidade:</label>
    <input type="text" id="especialidade" name="especialidade" value="<?php echo htmlspecialchars($especialidade); ?>" required>
    
    <label for="telefone">Telefone:</label>
    <input type="tel" id="telefone" name="telefone" value="<?php echo htmlspecialchars($telefone); ?>" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
    
    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name="endereco" value="<?php echo htmlspecialchars($endereco); ?>" required>
    
    <div class="form-group full-width">
        <label for="dias-atendimento">Dias de Atendimento*</label><br>
        <input type="checkbox" id="segunda" name="dias-atendimento[]" value="segunda" <?php echo in_array('segunda', explode(',', $dias_atendimento)) ? 'checked' : ''; ?>> Segunda<br>
        <input type="checkbox" id="terca" name="dias-atendimento[]" value="terca" <?php echo in_array('terca', explode(',', $dias_atendimento)) ? 'checked' : ''; ?>> Terça<br>
        <input type="checkbox" id="quarta" name="dias-atendimento[]" value="quarta" <?php echo in_array('quarta', explode(',', $dias_atendimento)) ? 'checked' : ''; ?>> Quarta<br>
        <input type="checkbox" id="quinta" name="dias-atendimento[]" value="quinta" <?php echo in_array('quinta', explode(',', $dias_atendimento)) ? 'checked' : ''; ?>> Quinta<br>
        <input type="checkbox" id="sexta" name="dias-atendimento[]" value="sexta" <?php echo in_array('sexta', explode(',', $dias_atendimento)) ? 'checked' : ''; ?>> Sexta<br>
        <input type="checkbox" id="sabado" name="dias-atendimento[]" value="sabado" <?php echo in_array('sabado', explode(',', $dias_atendimento)) ? 'checked' : ''; ?>> Sábado<br>
    </div>
    
    <div class="form-group full-width">
        <label for="consultorio">Consultório</label>
        <select id="consultorio" name="consultorio" required>
            <option value="" disabled selected>Selecione um consultório</option>
            <?php foreach ($consultorios as $consultorio): ?>
                <option value="<?php echo htmlspecialchars($consultorio); ?>" <?php echo ($consultorio == $consultorio_medico) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($consultorio); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <h4>Horários de Atendimento</h4>
    <?php foreach ($horarios as $index => $horario): ?>
        <div>
            <label for="dia<?php echo $index; ?>">Dia da Semana:</label>
            <input type="text" id="dia<?php echo $index; ?>" name="horarios[<?php echo $index; ?>][dia]" value="<?php echo htmlspecialchars($horario['dia']); ?>" required>
            
            <label for="horario_inicio<?php echo $index; ?>">Horário Início:</label>
            <input type="text" id="horario_inicio<?php echo $index; ?>" name="horarios[<?php echo $index; ?>][horario_inicio]" value="<?php echo htmlspecialchars($horario['horario_inicio']); ?>" required>
            
            <label for="horario_fim<?php echo $index; ?>">Horário Fim:</label>
            <input type="text" id="horario_fim<?php echo $index; ?>" name="horarios[<?php echo $index; ?>][horario_fim]" value="<?php echo htmlspecialchars($horario['horario_fim']); ?>" required>
        </div>
    <?php endforeach; ?>

    <button type="button" id="addHorario">Adicionar Horário</button>

    <input type="submit" name="update" value="Alterar">
</form>

<script>
    document.getElementById('addHorario').addEventListener('click', function() {
        let index = document.querySelectorAll('input[name^="horarios"]').length / 3;
        let container = document.createElement('div');
        
        container.innerHTML = `
            <label for="dia${index}">Dia da Semana:</label>
            <input type="text" id="dia${index}" name="horarios[${index}][dia]" required>
            
            <label for="horario_inicio${index}">Horário Início:</label>
            <input type="text" id="horario_inicio${index}" name="horarios[${index}][horario_inicio]" required>
            
            <label for="horario_fim${index}">Horário Fim:</label>
            <input type="text" id="horario_fim${index}" name="horarios[${index}][horario_fim]" required>
        `;
        
        document.querySelector('form.alterar').insertBefore(container, document.getElementById('addHorario'));
    });
</script>

</body>
</html>

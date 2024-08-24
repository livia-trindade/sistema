<?php
require_once("conexao.php");

$medico_id = $_GET['medico_id'] ?? null;

// Verifica se o médico_id foi fornecido
if ($medico_id === null) {
    die("Médico não especificado.");
}

// Recupera os dias de atendimento do banco de dados
$sql = "SELECT DISTINCT dia FROM horarios_atendimento WHERE medico_id = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$medico_id]);
$dias_atendimento = $stmt->fetchAll(PDO::FETCH_COLUMN);

if ($dias_atendimento === false) {
    $dias_atendimento = [];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script>
        function addHorario(dia) {
            var container = document.getElementById('container_' + dia);
            var newHorario = document.createElement('div');
            newHorario.className = 'horario';
            newHorario.innerHTML = `
                <input type="time" name="horarios[${dia}][inicio][]" required>
                <span>até</span>
                <input type="time" name="horarios[${dia}][fim][]" required>
                <button type="button" onclick="removeHorario(this)">Remover</button>
            `;
            container.appendChild(newHorario);
        }

        function removeHorario(element) {
            element.parentNode.remove();
        }
    </script>
    <title>Horários de Atendimento</title>
    <style>
        /* Estilos omitidos para brevidade */
    </style>
</head>

<body>
    <div class="container">
        <div class="main-content">
            <h1>Horários de Atendimento do Médico</h1>
            <form action="crudhorarios.php" method="POST">
                <input type="hidden" name="medico_id" value="<?php echo htmlspecialchars($medico_id); ?>">

                <?php if (!empty($dias_atendimento)): ?>
                    <?php foreach ($dias_atendimento as $dia): ?>
                        <div class="form-group">
                            <label for="horario_<?php echo htmlspecialchars($dia); ?>"><?php echo ucfirst(htmlspecialchars($dia)); ?>:</label>
                            <div id="container_<?php echo htmlspecialchars($dia); ?>">
                                <div class="horario">
                                    <input type="time" name="horarios[<?php echo htmlspecialchars($dia); ?>][inicio][]" required>
                                    <span>até</span>
                                    <input type="time" name="horarios[<?php echo htmlspecialchars($dia); ?>][fim][]" required>
                                </div>
                            </div>
                            <button type="button" onclick="addHorario('<?php echo htmlspecialchars($dia); ?>')">Adicionar Horário</button>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Não há dias de atendimento registrados para este médico.</p>
                <?php endif; ?>

                <button type="submit">Salvar Horários</button>
            </form>
        </div>
    </div>
</body>

</html>

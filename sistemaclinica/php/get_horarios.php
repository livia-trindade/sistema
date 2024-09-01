<?php
require_once("conexao.php");

$id_medico = $_GET['id_medico'];
$data = $_GET['data']; 

$sql = "SELECT horario_inicio, horario_fim FROM horarios_atendimento WHERE medico_id = :id_medico";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id_medico', $id_medico);
$stmt->execute();
$horarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql_ocupados = "SELECT horario FROM consulta WHERE id_medico = :id_medico AND data = :data";
$stmt_ocupados = $conexao->prepare($sql_ocupados);
$stmt_ocupados->bindParam(':id_medico', $id_medico);
$stmt_ocupados->bindParam(':data', $data);
$stmt_ocupados->execute();
$horarios_ocupados = $stmt_ocupados->fetchAll(PDO::FETCH_COLUMN, 0);

function quebrarHorarios($horario_inicio, $horario_fim) {
    $horarios = [];
    $inicio = strtotime($horario_inicio);
    $fim = strtotime($horario_fim);
    while ($inicio <= $fim) {
        $horarios[] = date('H:i', $inicio);
        $inicio = strtotime('+1 hour', $inicio);
    }
    return $horarios;
}

$horarios_disponiveis = [];
foreach ($horarios as $horario) {
    $horas = quebrarHorarios($horario['horario_inicio'], $horario['horario_fim']);
    foreach ($horas as $hora) {
        if (!in_array($hora, $horarios_ocupados)) {
            $horarios_disponiveis[] = $hora;
        }
    }
}

foreach ($horarios_disponiveis as $horario) {
    echo "<option value='$horario'>$horario</option>";
}
?>

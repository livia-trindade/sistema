<?php
require_once('conexao.php');

if (isset($_GET['id_medico'])) {
    $id_medico = $_GET['id_medico'];


    $query = $conexao->prepare("SELECT horario FROM horarios_atendimento WHERE medico_id = :id_medico");
    $query->bindParam(':id_medico', $id_medico, PDO::PARAM_INT);
    $query->execute();
    $horarios = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($horarios) {
        foreach ($horarios as $horario) {
            echo "<option value='{$horario['horario']}'>{$horario['horario']}</option>";
        }
    } else {
        echo "<option value=''>Nenhum horário disponível</option>";
    }
} else {
    echo "<option value=''>Selecione um médico primeiro</option>";
}
?>

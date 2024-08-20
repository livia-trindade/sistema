
<?php
require_once("conexao.php");

$id_medico = $_POST['id_medico'];
$id_paciente = $_POST['id_paciente'];
$data = $_POST['data'];
$horario = $_POST['horario'];
$procedimento = $_POST['procedimento'];
$status = $_POST['status'];  

$sql = "INSERT INTO consulta (id_medico, id_paciente, data, horario, procedimento, status) 
        VALUES ('$id_medico', '$id_paciente', '$data', '$horario', '$procedimento', '$status')";

$sqlcombanco = $conexao->prepare($sql);

if ($sqlcombanco->execute()) {
    echo "<div class='success-message'>";
    echo "<h3>Ok, a consulta foi agendada com sucesso!</h3>";
    echo "<a href='listaconsulta.php' class='success-button'>Visualizar lista de consultas</a>";
    echo "</div>";
} else {
    echo "<div class='error-message'>";
    echo "<h3>Erro: Não foi possível agendar a consulta. Por favor, tente novamente.</h3>";
    echo "</div>";
}
?>


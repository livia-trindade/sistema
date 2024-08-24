<?php
require_once('conexao.php');

// Recebe o ID do médico a ser excluído
$id = $_POST['id'];

// Primeiro, exclua os horários de atendimento associados ao médico
$sql = 'DELETE FROM horarios_atendimento WHERE medico_id = ?';
$cmd = $conexao->prepare($sql);
$cmd->execute([$id]);

// Agora, exclua o médico
$sql = 'DELETE FROM medico WHERE id = ?';
$cmd = $conexao->prepare($sql);
$cmd->execute([$id]);

// Redirecione ou mostre uma mensagem de sucesso
header('Location: listamedico.php');
exit();
?>

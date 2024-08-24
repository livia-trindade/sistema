<?php
require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medico_id = $_POST['medico_id'];
    $horarios = $_POST['horarios']; // Esse deve ser um array

    try {
        $conexao->beginTransaction();

        // Primeiro, remove os horários existentes para o médico
        $stmtDelete = $conexao->prepare("DELETE FROM horarios_atendimento WHERE medico_id = ?");
        $stmtDelete->execute([$medico_id]);

        // Verifica se $horarios é um array
        if (is_array($horarios)) {
            // Insere os novos horários
            $stmtInsert = $conexao->prepare("INSERT INTO horarios_atendimento (medico_id, dia, horario_inicio, horario_fim) VALUES (?, ?, ?, ?)");

            foreach ($horarios as $dia => $horas) {
                // Verifica se $horas é um array
                if (is_array($horas) && isset($horas['inicio']) && isset($horas['fim'])) {
                    foreach ($horas['inicio'] as $index => $inicio) {
                        // Verifica se $horas['inicio'][$index] e $horas['fim'][$index] existem
                        $fim = $horas['fim'][$index] ?? null;
                        if ($fim) {
                            $stmtInsert->execute([$medico_id, $dia, $inicio, $fim]);
                        } else {
                            throw new Exception("Horário de fim não encontrado para o início $inicio.");
                        }
                    }
                } else {
                    throw new Exception("Dados de horários para o dia $dia são inválidos.");
                }
            }
        } else {
            throw new Exception("Dados de horários inválidos.");
        }

        $conexao->commit();

        echo "<h1>Horários de Atendimento Salvos com Sucesso!</h1>";
        echo "<a href='listamedico.php'>Visualizar lista de médicos</a>";
    } catch (Exception $e) {
        $conexao->rollBack();
        echo "<h3>Erro ao salvar os horários de atendimento:</h3> " . htmlspecialchars($e->getMessage());
    }
}
?>

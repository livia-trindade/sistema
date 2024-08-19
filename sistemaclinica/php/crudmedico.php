<?php
require_once("conexao.php");

$nome = $_POST['nome'];
    $crm = $_POST['crm'];
    $especialidade = $_POST['especialidade'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $dias_atendimento = $_POST['dias-atendimento'];
    $horarios_atendimento = $_POST['horarios-atendimento'];
    $consultorio = $_POST['consultorio'];

    $sql = "INSERT INTO medico (nome, crm, especialidade, telefone, email, endereco, dias_atendimento, horarios_atendimento, consultorio) VALUES ('$nome', '$crm', '$especialidade', '$telefone', '$email', '$endereco', '$dias_atendimento', '$horarios_atendimento', '$consultorio')";

    $sqlcombanco = $conexao->prepare($sql);

    if ($sqlcombanco->execute()) {
        echo "<div class='success-message'>";
        echo "<h3>Ok, o usuário $nome foi incluído com sucesso!</h3>";
        echo "<a href='listamedico.php' class='success-button'>Visualizar lista de usuários</a>";
        echo "</div>";
    }
else {
    echo "<div class='error-message'>";
    echo "<h3>Erro: As senhas não coincidem.</h3>";
    echo "</div>";
}
?>
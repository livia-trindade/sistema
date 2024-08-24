<?php
require_once("conexao.php");

$numero = $_POST['numero'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];

$sql = "INSERT INTO consultorio (numero, telefone, endereco) 
        VALUES ('$numero', '$telefone', '$endereco')";

$sqlcombanco = $conexao->prepare($sql);

if ($sqlcombanco->execute()) {
    echo "<div class='success-message'>";
    echo "<h3>Ok, o consultório $numero foi cadastrado com sucesso!</h3>";
    echo "<a href='listaconsultorio.php' class='success-button'>Visualizar lista de consultórios</a>";
    echo "</div>";
} else {
    echo "<div class='error-message'>";
    echo "<h3>Erro: Não foi possível cadastrar o consultório. Por favor, tente novamente.</h3>";
    echo "</div>";
}
?>

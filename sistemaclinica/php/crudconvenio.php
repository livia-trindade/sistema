<?php
require_once("conexao.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$site = $_POST['site'];

$sql = "INSERT INTO convenio (nome, descricao, telefone, email, site) 
        VALUES ('$nome', '$descricao', '$telefone', '$email', '$site')";

$sqlcombanco = $conexao->prepare($sql);

if ($sqlcombanco->execute()) {
    echo "<div class='success-message'>";
    echo "<h3>Ok, o convênio $nome foi cadastrado com sucesso!</h3>";
    echo "<a href='listaconvenio.php' class='success-button'>Visualizar lista de convênios</a>";
    echo "</div>";
} else {
    echo "<div class='error-message'>";
    echo "<h3>Erro: Não foi possível cadastrar o convênio. Por favor, tente novamente.</h3>";
    echo "</div>";
}
?>


<?php
require_once("conexao.php");

$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];
$estadocivil = $_POST['estadocivil']; 
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$nacionalidade = $_POST['nacionalidade'];
$naturalidade = $_POST['naturalidade'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$condicoesmedicas = $_POST['condicoes-medicas'];
$medicacoes = $_POST['medicacoes'];
$historico = $_POST['historico-cirurgias'];
$alergias = $_POST['alergias'];
$emergencia = $_POST['contato-emergencia'];
$tiposanguineo = $_POST['tipo-sanguineo'];


$sql = "INSERT INTO paciente (nome, nascimento, sexo, estadocivil, rg, cpf, nacionalidade, naturalidade, endereco, telefone, email, condicoesmedicas, medicacoes, historico, emergencia, tiposanguineo) 
VALUES ('$nome', '$nascimento', '$sexo', '$estadocivil', '$rg', '$cpf', '$nacionalidade', '$naturalidade', '$endereco', '$telefone', '$email', '$condicoesmedicas', '$medicacoes', '$historico', '$emergencia', '$tiposanguineo')";


$sqlcombanco = $conexao->prepare($sql);


if ($sqlcombanco->execute()) {
    echo "<div class='success-message'>";
    echo "<h3>Ok, o paciente $nome foi incluído com sucesso!</h3>";
    echo "<a href='listapaciente.php' class='success-button'>Visualizar lista de usuários</a>";
    echo "</div>";
} else {
    echo "<div class='error-message'>";
    echo "<h3>Erro: Não foi possível incluir o paciente. Por favor, tente novamente.</h3>";
    echo "</div>";
}
?>


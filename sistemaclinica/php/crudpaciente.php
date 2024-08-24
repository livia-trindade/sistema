<?php
require_once("conexao.php");

// Recebendo os dados do formulário
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
$convenio = $_POST['tipo-paciente'];

try {
    // Preparando a consulta SQL
    $sql = "INSERT INTO paciente (nome, nascimento, sexo, estadocivil, rg, cpf, nacionalidade, naturalidade, endereco, telefone, email, convenio, condicoesmedicas, medicacoes, historico, alergias, emergencia, tiposanguineo) 
            VALUES (:nome, :nascimento, :sexo, :estadocivil, :rg, :cpf, :nacionalidade, :naturalidade, :endereco, :telefone, :email, :convenio, :condicoesmedicas, :medicacoes, :historico, :alergias, :emergencia, :tiposanguineo)";
    
    // Preparando a declaração
    $stmt = $conexao->prepare($sql);

    // Vinculando os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':nascimento', $nascimento);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':estadocivil', $estadocivil);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':nacionalidade', $nacionalidade);
    $stmt->bindParam(':naturalidade', $naturalidade);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':convenio', $convenio);
    $stmt->bindParam(':condicoesmedicas', $condicoesmedicas);
    $stmt->bindParam(':medicacoes', $medicacoes);
    $stmt->bindParam(':historico', $historico);
    $stmt->bindParam(':alergias', $alergias);
    $stmt->bindParam(':emergencia', $emergencia);
    $stmt->bindParam(':tiposanguineo', $tiposanguineo);

    // Executando a declaração
    if ($stmt->execute()) {
        echo "<div class='success-message'>";
        echo "<h3>Ok, o paciente $nome foi incluído com sucesso!</h3>";
        echo "<a href='listapaciente.php' class='success-button'>Visualizar lista de usuários</a>";
        echo "</div>";
    } else {
        echo "<div class='error-message'>";
        echo "<h3>Erro: Não foi possível incluir o paciente. Por favor, tente novamente.</h3>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "<div class='error-message'>";
    echo "<h3>Erro: " . $e->getMessage() . "</h3>";
    echo "</div>";
}
?>

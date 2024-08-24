<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Paciente</title>
</head>
<body>
<aside class="sidebar">
    <div class="menu">
        <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a><br><br><br><br>
        <a href="criaconsulta.php" class="menu-item"><img src="../imagens/calendario.svg" class="logo" width="35px"></a><br><br><br><br>
        <a href="cadastropac.php" class="menu-item"><img src="../imagens/pessoaadd.svg" class="logo" width="35px"></a><br><br><br><br>
        <a href="cadastromedico.php" class="menu-item"><img src="../imagens/doctoradd.svg" class="logo" width="35px"></a>
    </div>
</aside>

<?php
require_once("conexao.php");

// Verifica se o ID do paciente foi enviado pela requisição
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    // Recebendo os dados do formulário
    $nome = $_POST['nome'] ?? null;
    $nascimento = $_POST['nascimento'] ?? null;
    $sexo = $_POST['sexo'] ?? null;
    $estadocivil = $_POST['estadocivil'] ?? null;
    $rg = $_POST['rg'] ?? null;
    $cpf = $_POST['cpf'] ?? null;
    $nacionalidade = $_POST['nacionalidade'] ?? null;
    $naturalidade = $_POST['naturalidade'] ?? null;
    $endereco = $_POST['endereco'] ?? null;
    $telefone = $_POST['telefone'] ?? null;
    $email = $_POST['email'] ?? null;
    $convenio = $_POST['convenio'] ?? null;
    $condicoesmedicas = $_POST['condicoesmedicas'] ?? null;
    $medicacoes = $_POST['medicacoes'] ?? null;
    $historico = $_POST['historico'] ?? null;
    $emergencia = $_POST['emergencia'] ?? null;
    $tiposanguineo = $_POST['tiposanguineo'] ?? null;

    try {
        // Preparando a consulta SQL
        $sql = "UPDATE paciente SET 
                    nome = :nome,
                    nascimento = :nascimento,
                    sexo = :sexo,
                    estadocivil = :estadocivil,
                    rg = :rg,
                    cpf = :cpf,
                    nacionalidade = :nacionalidade,
                    naturalidade = :naturalidade,
                    endereco = :endereco,
                    telefone = :telefone,
                    email = :email,
                    convenio = :convenio,
                    condicoesmedicas = :condicoesmedicas,
                    medicacoes = :medicacoes,
                    historico = :historico,
                    emergencia = :emergencia,
                    tiposanguineo = :tiposanguineo
                WHERE id = :id";
        
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
        $stmt->bindParam(':emergencia', $emergencia);
        $stmt->bindParam(':tiposanguineo', $tiposanguineo);
        $stmt->bindParam(':id', $id);

        // Executando a declaração
        if ($stmt->execute()) {
            echo "<h3>Ok!</h3> <h3> O paciente $nome foi alterado com sucesso! </h3>";
        } else {
            echo "<h3>Erro!</h3>";
        }
    } catch (PDOException $e) {
        echo "<h3>Erro: " . $e->getMessage() . "</h3>";
    }
} else {
    echo "<h3>Erro: ID do paciente não foi informado.</h3>";
}
?>

<button class="button"><a href="listapaciente.php">Voltar à Lista de Pacientes</a></button>

</body>
</html>

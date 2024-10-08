<?php

    require_once('conexao.php');
   
    $id = $_POST['id'];
    $sql = "SELECT * FROM paciente WHERE id = :id";
    $retorno = $conexao->prepare($sql);
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);
    $retorno->execute();
    $array_retorno = $retorno->fetch();

    $nome = $array_retorno['nome'];
    $nascimento = $array_retorno['nascimento'];
    $sexo = $array_retorno['sexo'];
    $estadocivil = $array_retorno['estadocivil'];
    $rg = $array_retorno['rg'];
    $cpf = $array_retorno['cpf'];
    $nacionalidade = $array_retorno['nacionalidade'];
    $naturalidade = $array_retorno['naturalidade'];
    $endereco = $array_retorno['endereco'];
    $telefone = $array_retorno['telefone'];
    $email = $array_retorno['email'];
    $convenio = $array_retorno['convenio'];
    $condicoesmedicas = $array_retorno['condicoesmedicas'];
    $medicacoes = $array_retorno['medicacoes'];
    $historico = $array_retorno['historico'];
    $emergencia = $array_retorno['emergencia'];
    $tiposanguineo = $array_retorno['tiposanguineo'];
    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Paciente</title>

</head>
<body>

<aside class="sidebar">
        <div class="menu">
                <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a> <br>
                <br> <br> <br>
                <a href="criaconsulta.php" class="menu-item"><img src="../imagens/calendario.svg" class="logo" width="35px"></a>
                <br> <br> <br> <br> 
                <a href="cadastropac.php" class="menu-item"><img src="../imagens/pessoaadd.svg" class="logo"
                        width="35px"></a> 
                        <br> <br> <br> <br>
                <a href="cadastromedico.php" class="menu-item"><img src="../imagens/doctoradd.svg" class="logo"
                        width="35px"></a> 
                         <br> <br> <br> <br>
                <a href="cadastroconvenio.php" class="menu-item"><img src="../imagens/convenio.svg" class="logo"
                        width="35px"></a>  
                        <br> <br> <br> <br>
                <a href="cadastroconsultorio.php" class="menu-item"><img src="../imagens/hospital.svg" class="logo"
                        width="35px"></a>
            </div>
        </aside>

    <h3>Alterar Paciente</h3>
<form class="alterar" method="POST" action="alterarpaciente.php">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="text" name="nome" value="<?php echo $nome ?>" required>
<input type="date" name="nascimento" value="<?php echo $nascimento ?>" required>
<input type="text" name="sexo" value="<?php echo $sexo ?>" required>
<input type="text" name="estadocivil" value="<?php echo $estadocivil ?>" required>
<input type="text" name="rg" value="<?php echo $rg ?>" required>
<input type="text" name="cpf" value="<?php echo $cpf ?>" required>
<input type="text" name="nacionalidade" value="<?php echo $nacionalidade ?>" required>
<input type="text" name="naturalidade" value="<?php echo $naturalidade ?>" required>
<input type="text" name="endereco" value="<?php echo $endereco ?>" required>
<input type="tel" name="telefone" value="<?php echo $telefone ?>" required>
<input type="email" name="email" value="<?php echo $email ?>" required>
<input type="text" name="convenio" value="<?php echo $convenio ?>" required>
<input type="text" name="condicoes-medicas" value="<?php echo $condicoesmedicas ?>" required>
<input type="text" name="medicacoes" value="<?php echo $medicacoes ?>" required>
<input type="text" name="historico" value="<?php echo $historico ?>" required>
<input type="text" name="emergencia" value="<?php echo $emergencia ?>" required>
<input type="text" name="tipo-sanguineo" value="<?php echo $tiposanguineo ?>" required>


   
    
    <input type="submit" name="update" value="Alterar">
</form>

</body>
</html>
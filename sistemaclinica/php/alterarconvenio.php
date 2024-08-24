<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Convênio</title>
</head>
<body>
<aside class="sidebar">
        <div class="menu">
                <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a> <br>
                <br> <br> <br>
                <a href="criaconsulta.php" class="menu-item"><img src="../imagens/calendario.svg" class="logo" width="35px"></a>
                <br> <br> <br> <br> 
                <a href="cadastropac.php" class="menu-item"><img src="../imagens/pessoaadd.svg" class="logo"
                        width="35px"></a> <br> <br> <br> <br>
                <a href="cadastromedico.php" class="menu-item"><img src="../imagens/doctoradd.svg" class="logo"
                        width="35px"></a>

            </div>
        </aside>
    <?php
    require_once("conexao.php");

    $id = $_POST['id'];
   
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $site = $_POST['site'];

    $sql = "UPDATE convenio
            SET id = '$id',
               
                nome = '$nome',
                descricao= '$descricao',
                telefone = '$telefone',
                email = '$email'
                'site' = '$site'
            WHERE id = '$id';";
    $sqlcombanco = $conexao->prepare($sql);

    if ($sqlcombanco->execute()) {
        echo "<h3>Ok!</h3> <h3> Convênio alterado com sucesso! </h3> ";
    } else {
        echo "<h3>Erro!</h3>";
    }
    ?>
  <button class="button"><a href="listaconvenio.php">Voltar à Lista de Consultórios</a></button>

</body>
</html>

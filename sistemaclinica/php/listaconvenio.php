<?php 
require_once('conexao.php');
$retorno = $conexao->prepare('SELECT * FROM convenio');
$retorno->execute();
?>   

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script>
        function confirmarExclusao(nome) {
            return confirm(' Deseja mesmo excluir os registros do convênio ' + nome + '?');
        }
    </script>
    <title>Lista de Convênios</title>
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

<h3>Lista de Convênios</h3>
<table> 
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Site</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($retorno->fetchAll() as $value) { ?>
            <tr>
                <td><?php echo $value['nome'] ?></td>
                <td><?php echo $value['descricao'] ?></td>
                <td><?php echo $value['telefone'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php echo $value['site'] ?></td>
                <td>
                    <form method="POST" action="altconvenio.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Alterar</button>
                    </form>
                </td> 
                <td>
                <form method="POST" action="apagaconvenio.php" onsubmit="return confirmarExclusao('<?php echo $value['nome']; ?>')">
    <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
    <button class="button" type="submit">Excluir</button>
</form>

            </td> 
            </tr>
        <?php } ?> 
    </tbody>
</table>
</body>
</html>

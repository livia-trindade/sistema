<?php 
require_once('conexao.php');
$retorno = $conexao->prepare('SELECT * FROM consultorio');
$retorno->execute();
?>   

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script>
        function confirmarExclusao(numero) {
            return confirm(' Deseja mesmo excluir os registros do consultório ' + numero + '?');
        }
    </script>
    <title>Lista de Consultórios</title>
</head>
<body>
    <div class="container">
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

        <main class="main-content-cad">

<h3>Lista de Consultórios</h3>
<table> 
    <thead>
        <tr>
            <th>Número</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($retorno->fetchAll() as $value) { ?>
            <tr>
                <td><?php echo $value['numero'] ?></td>
                <td><?php echo $value['telefone'] ?></td>
                <td><?php echo $value['endereco'] ?></td>
                <td>
                    <form method="POST" action="altconsultorio.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Alterar</button>
                    </form>
                </td> 
                <td>
                <form method="POST" action="apagaconsultorio.php" onsubmit="return confirmarExclusao('<?php echo $value['numero']; ?>')">
    <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
    <button class="button" type="submit">Excluir</button>
</form>

            </td> 
            </tr>
        <?php } ?> 
    </tbody>
</table>
    </div>
        </main>
</body>
</html>

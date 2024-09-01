<?php 
require_once('conexao.php');

$retorno = $conexao->prepare('SELECT consulta.*, medico.nome AS nome_medico, paciente.nome AS nome_paciente FROM consulta 
                              JOIN medico ON consulta.id_medico = medico.id 
                              JOIN paciente ON consulta.id_paciente = paciente.id');

if (!$retorno->execute()) {
    echo "Erro na consulta: " . $retorno->errorInfo()[2];
    exit;
}
?>   

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Lista de Consultas</title>
</head>
<body>
    <div class="container">
    <aside class="sidebar">
        <div class="menu">
            <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a> <br>
            <br> <br> <br>
            <a href="criaconsulta.php" class="menu-item"><img src="../imagens/calendario.svg" class="logo" width="35px"></a>
            <br> <br> <br> <br> 
            <a href="cadastropac.php" class="menu-item"><img src="../imagens/pessoaadd.svg" class="logo" width="35px"></a> 
            <br> <br> <br> <br>
            <a href="cadastromedico.php" class="menu-item"><img src="../imagens/doctoradd.svg" class="logo" width="35px"></a> 
            <br> <br> <br> <br>
            <a href="cadastroconvenio.php" class="menu-item"><img src="../imagens/convenio.svg" class="logo" width="35px"></a>  
            <br> <br> <br> <br>
            <a href="cadastroconsultorio.php" class="menu-item"><img src="../imagens/hospital.svg" class="logo" width="35px"></a>
        </div>
    </aside>

    <main class="main-content-cad">
        <h3>Lista de Consultas</h3>
        <table> 
            <thead>
                <tr>
                    <th>Médico</th>
                    <th>Paciente</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Procedimento</th>
                    <th>Status</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $consultas = $retorno->fetchAll();
                if (count($consultas) > 0) {
                    foreach($consultas as $value) { ?>
                        <tr>
                            <td><?php echo $value['nome_medico']; ?></td> 
                            <td><?php echo $value['nome_paciente']; ?></td> 
                            <td><?php echo $value['data']; ?></td> 
                            <td><?php echo $value['horario']; ?></td> 
                            <td><?php echo $value['procedimento']; ?></td> 
                            <td>
                                <form method="POST" action="alterastatus.php">
                                    <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                                    <select name="status" onchange="this.form.submit()" class="<?php echo ($value['status'] == 'agendada') ? 'status-agendada' : 
                                                                  ($value['status'] == 'confirmada' ? 'status-confirmada' : 
                                                                  ($value['status'] == 'finalizada' ? 'status-finalizada' : 
                                                                  ($value['status'] == 'remarcada' ? 'status-remarcada' : 'status-cancelada'))); ?>">
                                        <option value="agendada" <?php if($value['status'] == 'agendada') echo 'selected'; ?>>Agendada</option>
                                        <option value="confirmada" <?php if($value['status'] == 'confirmada') echo 'selected'; ?>>Confirmada</option>
                                        <option value="finalizada" <?php if($value['status'] == 'finalizada') echo 'selected'; ?>>Finalizada</option>
                                        <option value="remarcada" <?php if($value['status'] == 'remarcada') echo 'selected'; ?>>Remarcada</option>
                                        <option value="cancelada" <?php if($value['status'] == 'cancelada') echo 'selected'; ?>>Cancelada</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="altconsulta.php">
                                    <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                                    <button class="button" type="submit">Alterar</button>
                                </form>
                            </td> 
                            <td>
                                <form method="POST" action="apagaconsulta.php">
                                    <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                                    <button class="button" type="submit">Excluir</button>
                                </form>
                            </td> 
                        </tr>
                    <?php }
                } else {
                    echo "<tr><td colspan='8'>Nenhuma consulta encontrada.</td></tr>";
                }
                ?> 
            </tbody>
        </table>
    </main>

    </div>
</body>
</html>

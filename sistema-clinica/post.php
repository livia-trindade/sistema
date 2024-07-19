<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="navbar">
                <img src="logo.png" class="logo">
                <ul>
                    <li><a href="index.php">Ínicio</a></li>
                    <li><a href="#">Agendar consulta</a></li>
                    <li><a href="#">Cadastro de médicos</a></li>
                    <li><a href="cadastropaciente.php">Cadastro de pacientes</a></li>
                </ul>

 </div>

 <h2>Lista de Pacientes</h2>

<div class="tabela">
<table>
  <tr>
    <th>Nome Completo</th>
    <th>Email</th>
    <th>CPF</th>
    <th>Data de Nascimento</th>
    <th>Rua</th>
    <th>Bairro</th>
    <th>Número</th>
    <th>Estado</th>
    <th>CEP</th>
  </tr>

  <tr>
    <td> <?php echo $_POST['nome']; ?> </td>
    <td> <?php echo $_POST['email']; ?> </td>
    <td> <?php echo $_POST['cpf']; ?></td>
    <td> <?php echo $_POST['nascimento']; ?></td>
    <td> <?php echo $_POST['rua']; ?></td>
    <td> <?php echo $_POST['bairro']; ?></td>
    <td> <?php echo $_POST['num']; ?></td>
    <td> <?php echo $_POST['estado']; ?></td>
    <td> <?php echo $_POST['cep']; ?></td>
  </tr>

</table>
</div>
    
</body>
</html>
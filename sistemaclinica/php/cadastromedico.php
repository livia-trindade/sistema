<?php
$conn = new mysqli("localhost", "root", "", "clinica");


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$sql = "SELECT numero FROM consultorio";
$result = $conn->query($sql);


$consultorio = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $consultorio[] = $row['numero'];
    }
}

$mensagem = "";


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Página inicial</title>
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
            <header class="header-cad">
                <h1>Cadastro de Médico</h1>
            </header>

            <div class="formulario">
                <form action="crudmedico.php" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome Completo*</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="crm">CRM*</label>
                        <input type="text" id="crm" name="crm" required>
                    </div>
                    <div class="form-group">
                        <label for="especialidade">Especialidade*</label>
                        <input type="text" id="especialidade" name="especialidade" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone*</label>
                        <input type="tel" id="telefone" name="telefone" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="endereco">Endereço Completo*</label>
                        <input type="text" id="endereco" name="endereco" required>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="dias-atendimento">Dias de Atendimento*</label><br>
                        <input type="checkbox" id="segunda" name="dias-atendimento[]" value="segunda"> Segunda<br>
                        <input type="checkbox" id="terca" name="dias-atendimento[]" value="terca"> Terça<br>
                        <input type="checkbox" id="quarta" name="dias-atendimento[]" value="quarta"> Quarta<br>
                        <input type="checkbox" id="quinta" name="dias-atendimento[]" value="quinta"> Quinta<br>
                        <input type="checkbox" id="sexta" name="dias-atendimento[]" value="sexta"> Sexta<br>
                        <input type="checkbox" id="sabado" name="dias-atendimento[]" value="sabado"> Sábado<br>
                    </div>


                    <div class="form-group full-width">
            <label for="consultorio">Consultório</label>
            <select id="consultorio" name="consultorio" required>
                <option value="" disabled selected>Selecione um consultório</option>
                <?php foreach ($consultorio as $consultorio): ?>
                    <option value="<?php echo $consultorio; ?>"><?php echo $consultorio; ?></option>
                <?php endforeach; ?>

            </select>
        </div>

               
                    <div class="form-group full-width">
                        <button type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>

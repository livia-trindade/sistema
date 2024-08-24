<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');

body,
html {
    margin: 0;
    padding: 0;
    font-family: "Poppins", sans-serif;
    background-color: #f5f5f5;
}

.container {
    display: flex;
    background-image: linear-gradient(to left, #007BB7, #A1CCE8, #469FD5, #004F8C, #B3E5FC);
    background-size: 500% 100%;
    animation: degrade-animado 10s infinite alternate;
    padding: 20px;
}

@keyframes degrade-animado {
    0% {
        background-position-x: 0%;
    }
    100% {
        background-position-x: 100%;
    }
}

.sidebar {
    padding: 20px;
    width: 60px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

.sidebar .menu-item {
    text-decoration: none;
    background-color: rgba(0, 0, 0, 0.0);
    font-size: 24px;
    color: #fff;
    transition: all 0.3s ease;
}

.sidebar .menu-item:hover {
    border-radius: 50% 20% 50% 20%;
    padding: 20px;
    display: inline-block;
    box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.4);
}

.main-content {
    flex: 1;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 10px 0px 0px 10px;
}

.crudmedico {
    flex: 1;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.4);
}

.crudmedico h2 {
    font-size: 24px;
    color: #004F8C;
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    background-color: #f7f7f7;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #004F8C;
    outline: none;
}

.form-actions {
    text-align: center;
}

.form-actions button {
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #007BB7;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-actions button:hover {
    background-color: #005f8a;
}

</style>
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

$nome = $_POST['nome'] ?? '';
$crm = $_POST['crm'] ?? '';
$especialidade = $_POST['especialidade'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$email = $_POST['email'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$dias_atendimento = $_POST['dias-atendimento'] ?? [];
$consultorio = $_POST['consultorio'] ?? '';

// Inserir o médico na tabela `medico`
$sql = "INSERT INTO medico (nome, crm, especialidade, telefone, email, endereco, consultorio) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->execute([$nome, $crm, $especialidade, $telefone, $email, $endereco, $consultorio]);

$medico_id = $conexao->lastInsertId(); 

// Inserir os dias de atendimento na tabela `horarios_atendimento`
if (!empty($dias_atendimento)) {
    $sql = "INSERT INTO horarios_atendimento (medico_id, dia) VALUES (?, ?)";
    $stmt = $conexao->prepare($sql);
    foreach ($dias_atendimento as $dia) {
        $stmt->execute([$medico_id, $dia]);
    }
}

echo "<div class='success-message'>";
echo "<h3>Ok, o médico $nome foi incluído com sucesso!</h3>";
echo "<a href='horariosatendimento.php?medico_id=$medico_id' class='success-button'>Cadastre os Horários de Atendimento</a>";
echo "</div>";
?>



    
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" <link
        rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Página inicial</title>
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="menu">
                <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a> <br>
                <br> <br> <br>
                <a href="perfil.php" class="menu-item"><img src="../imagens/calendario.svg" class="logo"
                        width="35px"></a>
                <br> <br> <br> <br>
                <a href="cadastropac.php" class="menu-item"><img src="../imagens/pessoaadd.svg" class="logo"
                        width="35px"></a> <br> <br> <br> <br>
                <a href="cadastromedico.php" class="menu-item"><img src="../imagens/doctoradd.svg" class="logo"
                        width="35px"></a>
            </div>
        </aside>

        <main class="main-content-cad">
            
        <header class="header-cad">
                <h1>Cadastro de Medico</h1>
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
                        <label for="dias-atendimento">Dias de Atendimento*</label>
                        <input type="text" id="dias-atendimento" name="dias-atendimento"
                            placeholder="Ex: Segunda a Sexta" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="horarios-atendimento">Horários de Atendimento*</label>
                        <input type="text" id="horarios-atendimento" name="horarios-atendimento"
                            placeholder="Ex: 8h às 18h" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="consultorio">Consultório*</label>
                        <input type="text" id="consultorio" name="consultorio" placeholder="Ex: Consultório 101"
                            required>
                    </div>
                    <div class="form-group full-width">
                        <button type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </main>


</body>

</html>
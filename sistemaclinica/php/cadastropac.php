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
    <di class="container">
        <aside class="sidebar">
            <div class="menu">
                <a href="index.php" class="menu-item"><img src="../imagens/home.svg" class="logo" width="35px"></a> <br>
                <br> <br> <br>
                <a href="perfil.php" class="menu-item"><img src="../imagens/doctor.svg" class="logo" width="35px"></a>
                <br> <br> <br> <br>
                <a href="cadastropac.php" class="menu-item"><img src="../imagens/pessoaadd.svg" class="logo"
                        width="35px"></a> <br> <br> <br> <br>
                <a href="cadastromedico.php" class="menu-item"><img src="../imagens/doctoradd.svg" class="logo"
                        width="35px"></a>
            </div>
        </aside>

        <main class="main-content-cad">


                <h1>Cadastro de Pacientes</h1>
                <form action="crudpaciente.php" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome Completo*</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="nascimento">Data de Nascimento*</label>
                        <input type="date" id="nascimento" name="nascimento" required>
                    </div>
                    <div class="form-group">
                        <label for="sexo">Sexo*</label>
                        <select id="sexo" name="sexo" required>
                            <option value="" disabled selected>Selecione o sexo</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estadocivil">Estado Civil*</label>
                        <select id="estadocivil" name="estadocivil" required>
                            <option value="" disabled selected>Selecione seu estado civil</option>
                            <option value="solteiro">Solteiro(a)</option>
                            <option value="casado">Casado(a)</option>
                            <option value="divorciado">Divorciado(a)</option>
                            <option value="viuvo">Viúvo(a)</option>
                            <option value="separado">Separado(a)</option>
                            <option value="uniao-estavel">União Estável</option>
                            <option value="companheiro">Companheiro(a)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rg">RG*</label>
                        <input type="text" id="rg" name="rg" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF*</label>
                        <input type="text" id="cpf" name="cpf" required>
                    </div>
                    <div class="form-group">
                        <label for="nacionalidade">Nacionalidade*</label>
                        <input type="text" id="nacionalidade" name="nacionalidade" required>
                    </div>
                    <div class="form-group">
                        <label for="naturalidade">Naturalidade*</label>
                        <input type="text" id="naturalidade" name="naturalidade" required>
                    </div>
                    <div class="form-group full-width">
                        <label for="endereco">Endereço Completo*</label>
                        <input type="text" id="endereco" name="endereco" required>
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
                        <label>Possui Convênio?*</label>
                        <div class="options">
                            <div>
                                <input type="radio" id="convenio" name="tipo-paciente" value="convenio"
                                    required>
                                <label for="convenio">Sim</label>
                            </div>
                            <div>
                                <input type="radio" id="nao-possui-convenio" name="tipo-paciente"
                                    value="nao-possui-convenio" required>
                                <label for="nao-possui-convenio">Não</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="numerocarteira">Número da Carteirinha</label>
                        <input type="text" id="numerocarteira" name="numerocarteira">
                    </div>
                 
                    <div class="form-group">
                        <label for="condicoes-medicas">Condições Médicas Atuais</label>
                        <textarea id="condicoes-medicas" name="condicoes-medicas" rows="4"
                            placeholder="Informe condições como diabetes, hipertensão, etc."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="medicacoes">Medicações em Uso</label>
                        <textarea id="medicacoes" name="medicacoes" rows="4"
                            placeholder="Informe as medicações, dosagens e frequência"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="historico-cirurgias">Histórico de Cirurgias</label>
                        <textarea id="historico-cirurgias" name="historico-cirurgias" rows="4"
                            placeholder="Informe cirurgias anteriores e datas"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="alergias">Alergias</label>
                        <textarea id="alergias" name="alergias" rows="4"
                            placeholder="Informe alergias alimentares, medicamentosas, etc."></textarea>
                    </div>
                   
                    <div class="form-group">
                        <label for="contato-emergencia">Contato de Emergência*</label>
                        <input type="text" id="contato-emergencia" name="contato-emergencia" required
                            placeholder="Nome, telefone e relação com o paciente">
                    </div>
                    <div class="form-group">
                        <label for="tipo-sanguineo">Tipo Sanguíneo*</label>
                        <select id="tipo-sanguineo" name="tipo-sanguineo" required>
                            <option value="" disabled selected>Selecione o tipo sanguíneo</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    
                   
                        <button type="submit">Cadastrar</button>
                    
                </form>
        </main>


</body>

</html>
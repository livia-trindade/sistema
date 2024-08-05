<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de médicos</title>
</head>

<body>
    <div class="navbar">
        <img src="logo.png" class="logo">
        <ul>
            <li><a href="index.php">Ínicio</a></li>
            <li><a href="agenda.php">Agendar consulta</a></li>
            <li><a href="cadastropaciente.php">Cadastro de médicos</a></li>
            <li><a href="cadastropaciente.php">Cadastro de pacientes</a></li>
        </ul>

    </div>

    <h2>Cadastro de Médicos</h2>

    <div class="formulario">


        <form action="postmed.php" method="post">
            <h3>Dados pessoais:</h3><br>
            <p id="g"> Nome Completo: <br> <input type="text" name="nome" /> </p>
            <p id="g"> Email: <br> <input type="text" name="email" /> </p>
            <p> CPF: <br> <input type="number" name="cpf" /> </p>
            <p id="nasc"> Data de nascimento: <br> <input type="date" name="nascimento" /> </p>
            <p> Gênero: <br>
                <input type="radio" id="masc" name="genero" value="MASC">
                <label for="masc">MASCULINO</label><br>
                <input type="radio" id="fem" name="genero" value="FEM">
                <label for="fem">FEMININO</label><br> <br> <br>

            <h3>Endereço:</h3><br>
            <p id="g"> Rua: <br> <input type="text" name="rua" /> </p>
            <p id="g"> Bairro: <br> <input type="text" name="bairro" /> </p>
            <p> Número: <br> <input type="number" name="num" /> </p>
            <label for="estado">Estado: </label>
            <select id="estado" name="estado">
                <option value="RN">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
            <p id="cep"> CEP: <br> <input type="number" name="cep" /> </p>

            <h3>Dados profissionais:</h3><br>
            <p id="g"> CRM: <br> <input type="text" name="crm" /> </p>
            <p id="g"> RQE: <br> <input type="text" name="rqe" /> </p>
            <p id="g"> Especialização: <br> </>

                <input type="checkbox" id="alergologia-imunologia" name="especialidade"
                    value="Alergologia e Imunologia">
                <label for="alergologia-imunologia">Alergologia e Imunologia</label><br>

                <input type="checkbox" id="anestesiologia" name="especialidade" value="Anestesiologia">
                <label for="anestesiologia">Anestesiologia</label><br>

                <input type="checkbox" id="angiologia" name="especialidade" value="Angiologia">
                <label for="angiologia">Angiologia</label><br>

                <input type="checkbox" id="cardiologia" name="especialidade" value="Cardiologia">
                <label for="cardiologia">Cardiologia</label><br>

                <input type="checkbox" id="cirurgia-cardiovascular" name="especialidade"
                    value="Cirurgia Cardiovascular">
                <label for="cirurgia-cardiovascular">Cirurgia Cardiovascular</label><br>

                <input type="checkbox" id="cirurgia-da-mao" name="especialidade" value="Cirurgia da Mão">
                <label for="cirurgia-da-mao">Cirurgia da Mão</label><br>

                <input type="checkbox" id="cirurgia-cabeca-pescoco" name="especialidade"
                    value="Cirurgia de Cabeça e Pescoço">
                <label for="cirurgia-cabeca-pescoco">Cirurgia de Cabeça e Pescoço</label><br>

                <input type="checkbox" id="cirurgia-aparelho-digestivo" name="especialidade"
                    value="Cirurgia do Aparelho Digestivo">
                <label for="cirurgia-aparelho-digestivo">Cirurgia do Aparelho Digestivo</label><br>

                <input type="checkbox" id="cirurgia-geral" name="especialidade" value="Cirurgia Geral">
                <label for="cirurgia-geral">Cirurgia Geral</label><br>

                <input type="checkbox" id="cirurgia-oncologica" name="especialidade" value="Cirurgia Oncológica">
                <label for="cirurgia-oncologica">Cirurgia Oncológica</label><br>

                <input type="checkbox" id="cirurgia-pediatrica" name="especialidade" value="Cirurgia Pediátrica">
                <label for="cirurgia-pediatrica">Cirurgia Pediátrica</label><br>

                <input type="checkbox" id="cirurgia-plastica" name="especialidade" value="Cirurgia Plástica">
                <label for="cirurgia-plastica">Cirurgia Plástica</label><br>

                <input type="checkbox" id="cirurgia-toracica" name="especialidade" value="Cirurgia Torácica">
                <label for="cirurgia-toracica">Cirurgia Torácica</label><br>

                <input type="checkbox" id="cirurgia-vascular" name="especialidade" value="Cirurgia Vascular">
                <label for="cirurgia-vascular">Cirurgia Vascular</label><br>

                <input type="checkbox" id="clinica-medica" name="especialidade" value="Clínica Médica">
                <label for="clinica-medica">Clínica Médica (Medicina Interna)</label><br>

                <input type="checkbox" id="coloproctologia" name="especialidade" value="Coloproctologia">
                <label for="coloproctologia">Coloproctologia</label><br>

                <input type="checkbox" id="dermatologia" name="especialidade" value="Dermatologia">
                <label for="dermatologia">Dermatologia</label><br>

                <input type="checkbox" id="endocrinologia" name="especialidade" value="Endocrinologia e Metabologia">
                <label for="endocrinologia">Endocrinologia e Metabologia</label><br>

                <input type="checkbox" id="endoscopia" name="especialidade" value="Endoscopia">
                <label for="endoscopia">Endoscopia</label><br>

                <input type="checkbox" id="gastroenterologia" name="especialidade" value="Gastroenterologia">
                <label for="gastroenterologia">Gastroenterologia</label><br>

                <input type="checkbox" id="genetica-medica" name="especialidade" value="Genética Médica">
                <label for="genetica-medica">Genética Médica</label><br>

                <input type="checkbox" id="geriatria" name="especialidade" value="Geriatria">
                <label for="geriatria">Geriatria</label><br>

                <input type="checkbox" id="ginecologia-obstetricia" name="especialidade"
                    value="Ginecologia e Obstetrícia">
                <label for="ginecologia-obstetricia">Ginecologia e Obstetrícia</label><br>

                <input type="checkbox" id="hematologia-hemoterapia" name="especialidade"
                    value="Hematologia e Hemoterapia">
                <label for="hematologia-hemoterapia">Hematologia e Hemoterapia</label><br>

                <input type="checkbox" id="hepatologia" name="especialidade" value="Hepatologia">
                <label for="hepatologia">Hepatologia</label><br>

                <input type="checkbox" id="homeopatia" name="especialidade" value="Homeopatia">
                <label for="homeopatia">Homeopatia</label><br>

                <input type="checkbox" id="infectologia" name="especialidade" value="Infectologia">
                <label for="infectologia">Infectologia</label><br>

                <input type="checkbox" id="mastologia" name="especialidade" value="Mastologia">
                <label for="mastologia">Mastologia</label><br>

                <input type="checkbox" id="medicina-familia" name="especialidade"
                    value="Medicina de Família e Comunidade">
                <label for="medicina-familia">Medicina de Família e Comunidade</label><br>

                <input type="checkbox" id="medicina-emergencia" name="especialidade" value="Medicina de Emergência">
                <label for="medicina-emergencia">Medicina de Emergência</label><br>

                <input type="checkbox" id="medicina-trabalho" name="especialidade" value="Medicina do Trabalho">
                <label for="medicina-trabalho">Medicina do Trabalho</label><br>

                <input type="checkbox" id="medicina-trafego" name="especialidade" value="Medicina do Tráfego">
                <label for="medicina-trafego">Medicina do Tráfego</label><br>

                <input type="checkbox" id="medicina-esportiva" name="especialidade" value="Medicina Esportiva">
                <label for="medicina-esportiva">Medicina Esportiva</label><br>

                <input type="checkbox" id="medicina-fisica-reabilitacao" name="especialidade"
                    value="Medicina Física e Reabilitação">
                <label for="medicina-fisica-reabilitacao">Medicina Física e Reabilitação</label><br>

                <input type="checkbox" id="medicina-intensiva" name="especialidade" value="Medicina Intensiva">
                <label for="medicina-intensiva">Medicina Intensiva</label><br>

                <input type="checkbox" id="medicina-legal" name="especialidade" value="Medicina Legal e Perícia Médica">
                <label for="medicina-legal">Medicina Legal e Perícia Médica</label><br>

                <input type="checkbox" id="medicina-nuclear" name="especialidade" value="Medicina Nuclear">
                <label for="medicina-nuclear">Medicina Nuclear</label><br>

                <input type="checkbox" id="medicina-preventiva" name="especialidade"
                    value="Medicina Preventiva e Social">
                <label for="medicina-preventiva">Medicina Preventiva e Social</label><br>

                <input type="checkbox" id="nefrologia" name="especialidade" value="Nefrologia">
                <label for="nefrologia">Nefrologia</label><br>

                <input type="checkbox" id="neurocirurgia" name="especialidade" value="Neurocirurgia">
                <label for="neurocirurgia">Neurocirurgia</label><br>

                <input type="checkbox" id="neurologia" name="especialidade" value="Neurologia">
                <label for="neurologia">Neurologia</label><br>

                <input type="checkbox" id="nutrologia" name="especialidade" value="Nutrologia">
                <label for="nutrologia">Nutrologia</label><br>

                <input id="button" type="submit" value="Cadastrar Médico">

        </form>
    </div>



</body>

</html>
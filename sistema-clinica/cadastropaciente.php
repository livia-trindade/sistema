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
                    <li><a href="#">Agendar consulta</a></li>
                    <li><a href="#">Cadastro de médicos</a></li>
                    <li><a href="cadastropaciente.php">Cadastro de pacientes</a></li>
                </ul>

 </div>

 <h2>Cadastro de Pacientes</h2>

<div class="formulario">


<form action="post.php" method="post"> 
    <h3>Dados pessoais:</h3><br>
       <p id="g"> Nome Completo: <br> <input type="text" name="nome"/> </p> 
       <p id="g"> Email: <br> <input type="text" name="email"/> </p> 
       <p> CPF: <br> <input type="number" name="cpf"/> </p>
       <p id="nasc" > Data de nascimento: <br> <input type="date" name="nascimento"/> </p>
       <p> Gênero: <br> 
         <input type="radio" id="masc" name="genero" value="MASC">
         <label for="masc">MASCULINO</label><br>
         <input type="radio" id="fem" name="genero" value="FEM">
         <label for="fem">FEMININO</label><br> <br> <br>

    <h3>Endereço:</h3><br>
       <p id="g"> Rua: <br> <input type="text" name="rua"/> </p>
       <p id="g"> Bairro: <br> <input type="text" name="bairro"/> </p>
       <p> Número: <br> <input type="number" name="num"/> </p>
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
       <p id="cep"> CEP: <br> <input type="number" name="cep"/> </p>

    <input id="button" type="submit" value="Cadastrar Paciente" >

</form>
</div>


    
</body>
</html>
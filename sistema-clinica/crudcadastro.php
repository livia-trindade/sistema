<?php
require_once("conexao.php");
?>
   <tr>
       <td>
        <?php
        $nome= $_POST['nome'];
        $email= $_POST['email'];
        $data_nascimento= $_POST['data_nascimento'];
        $telefone= $_POST['telefone'];
        $senha= $_POST['senha'];
        echo $nome;
        echo $email;
        echo $data_nascimento;
        echo $telefone;
        echo $senha;
       ?>
       </td>
       <td>
      

       </td>
     </tr>


<?php
        $nome= $_POST['nome'];
        $email= $_POST['email'];
        $data_nascimento= $_POST['data_nascimento'];
        $telefone= $_POST['telefone'];
        $senha= $_POST['senha'];

    $sql= "INSERT INTO usuario (nome, email, nascimento, telefone, senha) VALUES ('$nome', '$email', '$data_nascimento', '$telefone', '$senha')";

    $sqlcombanco= $conexao->prepare ($sql);

    if($sqlcombanco-> execute())
    {
        echo"<strong>Ok!</strong> O usuário $nome foi incluido com suceso";
    }

?>
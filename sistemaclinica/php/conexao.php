<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DBNAME', 'clinica');


try{
    $conexao=new pdo('mysql:host='.HOST.';dbname='. DBNAME, USUARIO,SENHA);
}catch(PODException $e){
    echo "Erro: Conexão com barra de dados nao 
    foi realizada com sucesso. Erro gerado" . $e->getMessage();
}

?>
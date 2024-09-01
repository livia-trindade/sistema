<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $query = "UPDATE consulta SET status = :status WHERE id = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
        header('Location: listaconsulta.php');
        exit();
    } else {

        echo "Erro ao atualizar o status. Tente novamente.";
    }
}
?>

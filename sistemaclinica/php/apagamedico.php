<?php
require_once('conexao.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $consultaSql = 'SELECT COUNT(*) as total FROM consulta WHERE id_medico = :id';
    $stmt = $conexao->prepare($consultaSql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado['total'] > 0) {
   
        echo "<script>
                alert('Não é possível excluir o médico porque ele tem consultas associadas.');
                window.location.href = 'listamedico.php'; 
              </script>";
    } else {
 
        $deleteSql = 'DELETE FROM medico WHERE id = :id';
        $stmt = $conexao->prepare($deleteSql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Médico excluído com sucesso.');
                    window.location.href = 'listamedico.php'; 
                  </script>";
        } else {
            echo "<script>
                    alert('Erro ao excluir o médico.');
                    window.location.href = 'listamedico.php'; 
                  </script>";
        }
    }
} else {

    header('Location: listamedicos.php');
}
?>

<?php
include 'conexao.php';

try {
    $sql = "DELETE FROM pedidos";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Todos os pedidos foram excluídos com sucesso!'); window.location.href='lista_pedidos.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir pedidos: " . $conn->error . "'); window.history.back();</script>";
    }
} catch (Exception $e) {
    echo "<script>alert('Erro: " . $e->getMessage() . "'); window.history.back();</script>";
}
?>

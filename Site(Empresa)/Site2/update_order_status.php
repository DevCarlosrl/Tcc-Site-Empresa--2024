<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'conexao.php'; // Inclui a conexão com MySQLi

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    echo "<script>alert('Você precisa estar logado para atualizar um pedido.'); window.location.href = 'login.php';</script>";
    exit();
}

// Verifica se o formulário foi submetido corretamente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
    $pedido_id = $_POST['id'];
    $novo_status = $_POST['status'];
    $usuario_id = $_SESSION['usuario_id'];
    $nivel_usuario = $_SESSION['nivel'];

    try {
        // Verifica se o usuário é administrador
        if ($nivel_usuario === 'adm') {
            // Se for administrador, pode atualizar qualquer pedido
            $sql_update = "UPDATE pedidos SET situacao = ? WHERE id = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("si", $novo_status, $pedido_id);

            if ($stmt_update->execute()) {
                echo "<script>alert('Status do pedido atualizado com sucesso.'); window.location.href = 'pedidos.php';</script>";
            } else {
                echo "<script>alert('Erro ao atualizar o status do pedido.'); window.location.href = 'pedidos.php';</script>";
            }
        } else {
            // Se não for administrador, verifica se o pedido pertence ao usuário
            $sql = "SELECT * FROM pedidos WHERE id = ? AND usuario_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $pedido_id, $usuario_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Se o pedido pertence ao usuário, permite a atualização
            if ($result && $result->num_rows > 0) {
                $sql_update = "UPDATE pedidos SET situacao = ? WHERE id = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("si", $novo_status, $pedido_id);

                if ($stmt_update->execute()) {
                    echo "<script>alert('Status do pedido atualizado com sucesso.'); window.location.href = 'pedidos.php';</script>";
                } else {
                    echo "<script>alert('Erro ao atualizar o status do pedido.'); window.location.href = 'pedidos.php';</script>";
                }
            } else {
                echo "<script>alert('Você não tem permissão para atualizar este pedido.'); window.location.href = 'pedidos.php';</script>";
            }
        }
    } catch (Exception $e) {
        echo "Erro ao atualizar o status do pedido: " . $e->getMessage();
    }

    // Fecha o statement e a conexão
    if (isset($stmt)) {
        $stmt->close();
    }
    if (isset($stmt_update)) {
        $stmt_update->close();
    }
    $conn->close();
} else {
    echo "<script>alert('Requisição inválida.'); window.location.href = 'pedidos.php';</script>";
}
?>

<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página de login com um parâmetro para redirecionamento após o login
    header("Location: login.php?redirect=processa_pedido.php");
    exit();
}

// Exibir informações da sessão para debug
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// Verifica se a sessão está ativa e se o pacote foi selecionado
if (isset($_POST['pacote_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $pacote_id = $_POST['pacote_id'];
    $data_pedido = date('Y-m-d H:i:s');

    // Exibe informações de debug (apenas para teste, remova em produção)
    echo "Usuário ID: " . $usuario_id . "<br>";
    echo "Pacote ID: " . $pacote_id . "<br>";

    // Inserir pedido no banco de dados
    $sql = "INSERT INTO pedidos (usuario_id, pacote_id, data_pedido) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação: " . $conn->error);
    }

    $stmt->bind_param("iis", $usuario_id, $pacote_id, $data_pedido);

    if ($stmt->execute()) {
        // Exibir uma mensagem de sucesso e um link para a página inicial
        echo "<script>
                alert('Pedido realizado com sucesso!');
                window.location.href = 'index.php';
              </script>";
        exit();
    } else {
        echo "Erro ao realizar o pedido: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Dados do pedido inválidos.";
}

$conn->close();
?>

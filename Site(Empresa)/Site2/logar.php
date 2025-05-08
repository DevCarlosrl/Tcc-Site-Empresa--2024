<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "Livro";

// Criar conexão
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Inicia a sessão
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha_post = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        if (password_verify($senha_post, $usuario['senha'])) {
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['usuario_id'] = $usuario['id']; // Ajuste para armazenar o ID do usuário
            $_SESSION['nivel'] = $usuario['nivel'];

            // Redireciona conforme o nível ou página de origem
            if (isset($_GET['redirect'])) {
                header("Location: " . $_GET['redirect']);
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "Senha inválida";
        }
    } else {
        echo "Nenhum usuário encontrado com esse email";
    }

    $stmt->close();
}

$conn->close();
?>
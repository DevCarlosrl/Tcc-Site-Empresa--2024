<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "livro";

// Cria conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Diretório para salvar a imagem
    $uploadDir = "upload/";
    $uploadFile = $uploadDir . basename($_FILES["foto"]["name"]);
    $fotoperfil = "";

    // Faz o upload da imagem
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadFile)) {
        $fotoperfil = $uploadFile;
    } else {
        echo "Erro ao enviar a imagem!";
        exit;
    }

    // Recebe os dados do formulário
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $endereco = $_POST["endereco"];
    $cep = $_POST["cep"];
    $cpf = $_POST["cpf"];
    $idade = $_POST["idade"];

    // Prepara a declaração SQL
    $stmt = $conn->prepare(
        "INSERT INTO editarcliente (nome, telefone, endereco, cep, cpf, idade, fotoperfil) VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("sssssis", $nome, $telefone, $endereco, $cep, $cpf, $idade, $fotoperfil);

    // Executa a declaração
    if ($stmt->execute()) {
        // Redireciona para index.php após o sucesso
        header("Location: index.php");
        exit(); // Garante que o script seja interrompido após o redirecionamento
    } else {
        echo "Erro ao atualizar o perfil: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>



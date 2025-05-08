<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "livro";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
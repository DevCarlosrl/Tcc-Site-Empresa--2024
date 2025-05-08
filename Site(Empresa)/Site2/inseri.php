<?php

include("conexao.php");
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);


$result_usuario = "INSERT INTO cadastro (nome,email,senha,telefone,cpf,endereco ) VALUES ('$nome', '$email', '$senha', '$telefone', '$cpf', '$endereco')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if ($conn->query($sql) === TRUE) {
	// Armazena o nome do usuário na sessão
    $_SESSION['nome'] = $nome;
	
	header("Location: painelcadastro.php");
}else{
	
	header("Location: index.php");
}

?>
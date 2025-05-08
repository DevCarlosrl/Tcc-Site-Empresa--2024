

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil do Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f4f4f4;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        input {
            display: block;
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<center><h2>Editar Perfil</h2></center>

<form action="capturarperfil.php" method="POST" enctype="multipart/form-data">
    <label>Foto de Perfil:</label>
    <input type="file" name="foto" required>

    <label>Nome:</label>
    <input type="text" name="nome" required>

    <label>Telefone:</label>
    <input type="text" name="telefone" required>

    <label>Endereço:</label>
    <input type="text" name="endereco" required>

    <label>CEP:</label>
    <input type="text" name="cep" required>

    <label>CPF:</label>
    <input type="text" name="cpf" required>

    <label>Idade:</label>
    <input type="number" name="idade" min="0" required>

    <input type="submit" value="Atualizar Perfil">
</form>

</body>
</html>

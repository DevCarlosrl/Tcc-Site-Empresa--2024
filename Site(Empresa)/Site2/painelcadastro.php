<?php
include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Cadastro</title>
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      width: 100vw;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: rgba(0, 0, 0, 0.1);
    }

    .container {
      width: 90%;
      height: 80%;
      border-radius: 10px;
      background: white;
      overflow: hidden;
    }

    .header {
      min-height: 70px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 12px;
      background-color: rgba(57, 57, 226, 0.1);
    }

    .header span {
      font-weight: 900;
      font-size: 20px;
    }

    #print-button {
      font-size: 16px;
      padding: 8px;
      border-radius: 5px;
      border: none;
      color: white;
      background-color: rgb(57, 57, 226);
      cursor: pointer;
    }

    .divTable {
      padding: 10px;
      overflow: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background-color: #f1f1f1;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      font-weight: bold;
    }

    tbody tr:hover {
      background-color: rgba(0, 0, 0, 0.05);
    }

    .acao {
      text-align: center;
      width: 100px;
    }

    /* Estilo adicional para a tabela */
    td {
      max-width: 150px; /* Limitar a largura das células */
      overflow: hidden; /* Ocultar texto que excede o limite */
      text-overflow: ellipsis; /* Exibir reticências para texto longo */
      white-space: nowrap; /* Não quebrar texto */
    }

    .back-button {
      position: relative;
      margin: 10px;
    }

    .back-button img {
      width: 20px;
      height: 20px;
    }

    .back-button:hover {
      opacity: 0.5;
    }

    /* Estilo para o formulário de filtragem */
    .filter-form {
      display: flex;
      gap: 20px; /* Espaçamento entre os campos */
      margin: 20px;
    }

    .filter-form label {
      display: flex;
      flex-direction: column;
      font-weight: 500; /* Adicionando a mesma fonte para os labels */
    }

    .filter-form input {
      margin-top: 5px;
      padding: 8px; /* Espaçamento interno */
      border: 1px solid #ddd; /* Borda do input */
      border-radius: 5px; /* Arredondando as bordas */
      font-family: 'Poppins', sans-serif; /* Usando a mesma fonte */
    }

    .filter-form button {
      padding: 10px 15px; /* Tamanho do botão */
      border: none; /* Sem borda */
      border-radius: 5px; /* Arredondando as bordas */
      background-color: rgb(57, 57, 226); /* Cor de fundo */
      color: white; /* Cor do texto */
      font-family: 'Poppins', sans-serif; /* Usando a mesma fonte */
      cursor: pointer; /* Mudando o cursor */
      transition: background-color 0.3s; /* Transição suave */
    }

    .filter-form button:hover {
      background-color: rgba(57, 57, 226, 0.8); /* Efeito hover */
    }

  </style>
</head>

<body>
  <div class="back-button">
    <a href="perfil.php" title="Voltar para a página perfil"><img src="https://cdn-icons-png.flaticon.com/512/66/66822.png" alt="Voltar para a página perfil"></a>
  </div>

  <div class="container">
    <div class="header">
      <span>Clientes Cadastrados</span>
      <button onclick="window.print()" id="print-button">Imprimir Relatório</button>
    </div>

    <form method="GET" class="filter-form">
      <label for="filtro_id">Filtrar por ID:</label>
      <input type="number" id="filtro_id" name="filtro_id" required>

      <label for="filtro_data">Filtrar por Data de Cadastro:</label>
      <input type="date" id="filtro_data" name="filtro_data">

      <button type="submit">Filtrar</button>
    </form>

    <div class="divTable">
      <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Nível</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Data de Cadastro</th> <!-- New Column -->
            <th class="acao">Editar</th>
            <th class="acao">Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Conexão com o banco de dados
          include "conexao.php";

          // Verifica se um ID de filtro ou data de filtro foi enviado
          $filtro_id = isset($_GET['filtro_id']) ? intval($_GET['filtro_id']) : null;
          $filtro_data = isset($_GET['filtro_data']) ? $_GET['filtro_data'] : null;

          // Consulta para buscar os dados necessários
          $result_usuarios = "SELECT * FROM usuarios WHERE 1=1"; // Inicia com uma condição verdadeira

          if ($filtro_id) {
            $result_usuarios .= " AND id = $filtro_id"; // Adiciona filtro por ID
          }

          if ($filtro_data) {
            $result_usuarios .= " AND DATE(data_cadastro) = '$filtro_data'"; // Adiciona filtro por data
          }

          $result_usuarios .= " ORDER BY nome ASC"; // Ordena os resultados

          $resultado_usuarios = mysqli_query($conn, $result_usuarios);

          if (mysqli_num_rows($resultado_usuarios) > 0) {
            while ($linha = mysqli_fetch_assoc($resultado_usuarios)) {
              echo "<tr>";
              echo "<td>" . $linha['id'] . "</td>";
              echo "<td>" . $linha['nome'] . "</td>";
              echo "<td>" . $linha['nivel'] . "</td>";
              echo "<td>" . $linha['email'] . "</td>";
              echo "<td>" . $linha['senha'] . "</td>";
              echo "<td>" . date('d/m/Y', strtotime($linha['data_cadastro'])) . "</td>"; // Format and display registration date
              echo "<td class='acao'><a href='editarusuario.php?id=" . $linha['id'] . "' class='btn btn-primary btn-sm'>Editar</a></td>";
              echo "<td class='acao'><a href='excluir.php?id=" . $linha['id'] . "' class='btn btn-danger btn-sm'>Excluir</a></td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='8'>Nenhum registro encontrado.</td></tr>"; // Updated colspan to 8
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>




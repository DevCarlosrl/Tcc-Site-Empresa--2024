<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'conexao.php'; // Inclui a conexão com MySQLi
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <style>
        /* CSS atualizado para melhor visualização */
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
            background-color: rgba(0, 0, 0, 0.05);
        }

        .container {
            width: 95%;
            max-width: 1200px;
            height: auto;
            max-height: 90%;
            border-radius: 10px;
            background: white;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
            background-color: rgba(57, 57, 226, 0.2);
            color: #333;
        }

        .header span {
            font-weight: 900;
            font-size: 22px;
        }

        #print-button, #back-button {
            font-size: 14px;
            padding: 8px 12px;
            border-radius: 5px;
            border: none;
            color: white;
            background-color: rgb(57, 57, 226);
            cursor: pointer;
            margin-left: 8px;
            transition: background-color 0.3s;
        }

        #print-button:hover, #back-button:hover {
            background-color: rgba(57, 57, 226, 0.8);
        }

        .divTable {
            padding: 16px;
            overflow: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        thead {
            background-color: #3C91E6;
            color: white;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .acao {
            text-align: center;
            width: 200px;
        }

        td {
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .acao select, .acao button {
            margin: 4px 0;
        }

        .acao button {
            background-color: #3C91E6;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 4px 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .acao button:hover {
            background-color: #2A6EB5;
        }

        .acao button.remove {
            background-color: #DB504A;
        }

        .acao button.remove:hover {
            background-color: #B43D36;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <span>Lista de Pedidos</span>
        <div>
            <button id="print-button" onclick="printOrders()">Imprimir Lista de Pedidos</button>
            <button id="back-button" onclick="history.back()">Voltar</button>
        </div>
    </div>

    <div class="divTable">
        <table>
            <thead>
                <tr>
                    <th>ID do Pedido</th>
                    <th>Cliente</th>
                    <th>Tipo de Pedido</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th class="acao">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // Ajuste a consulta SQL para pegar informações dos pedidos e seus clientes
                    $sql = "SELECT pedidos.id, usuarios.nome AS cliente, pedidos.pacote_id, pedidos.data_pedido AS data, pedidos.situacao AS status 
                            FROM pedidos 
                            JOIN usuarios ON pedidos.usuario_id = usuarios.id";
                    $result = $conn->query($sql);

                    // Verificar se a consulta foi bem-sucedida
                    if (!$result) {
                        echo "<tr><td colspan='6'>Erro ao executar a consulta: " . $conn->error . "</td></tr>";
                    } elseif ($result->num_rows > 0) {
                        while ($pedido = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$pedido['id']}</td>
                                    <td>{$pedido['cliente']}</td>
                                    <td>{$pedido['pacote_id']}</td>
                                    <td>" . date('d/m/Y', strtotime($pedido['data'])) . "</td>
                                    <td>{$pedido['status']}</td>
                                    <td class='acao'>
                                        <form action='update_order_status.php' method='POST' style='display: inline-block;'>
                                            <input type='hidden' name='id' value='{$pedido['id']}'>
                                            <select name='status'>
                                                <option value='Pendente' " . ($pedido['status'] === 'Pendente' ? 'selected' : '') . ">Pendente</option>
                                                <option value='Processando' " . ($pedido['status'] === 'Processando' ? 'selected' : '') . ">Processando</option>
                                                <option value='Concluído' " . ($pedido['status'] === 'Concluído' ? 'selected' : '') . ">Concluído</option>
                                            </select>
                                            <button type='submit'>Atualizar</button>
                                        </form>
                                        <form action='delete_order.php' method='POST' style='display: inline-block;'>
                                            <input type='hidden' name='id' value='{$pedido['id']}'>
                                            <button type='submit' class='remove' onclick='return confirm(\"Tem certeza que deseja remover este pedido?\")'>Remover</button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Nenhum pedido encontrado</td></tr>";
                    }
                } catch (Exception $e) {
                    echo "<tr><td colspan='6'>Erro ao buscar pedidos: " . $e->getMessage() . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function printOrders() {
        const printContents = document.querySelector('.divTable').innerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        window.location.reload();
    }
</script>

</body>
</html>

<?php
session_start();

if (isset($_GET['carregar'])) {
    if (empty($_SESSION['carrinho'])) {
        echo '<p>Carrinho vazio!</p>';
    } else {
        $total = 0;

        echo "<ul>";
        foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
            echo "<li>Produto ID: $produto_id | Quantidade: $quantidade</li>";
            $total += $quantidade; // Soma total de itens
        }
        echo "</ul>";

        echo "<p><strong>Total de produtos:</strong> $total</p>";

        echo '<a href="index.php"><button class="btn-voltar">Voltar à Página Principal</button></a>';
        echo '<button class="btn-finalizar" onclick="finalizarCompra()">Finalizar Compra</button>';
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        #carrinho {
            margin-top: 20px;
            padding: 10px;
            background: white;
            border-radius: 10px;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        button {
            background-color: #1e3a8a;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        button:hover {
            background-color: #2563eb;
        }
        .btn-voltar {
            background-color: #6c757d;
        }
        .btn-voltar:hover {
            background-color: #5a6268;
        }
        .btn-finalizar {
            background-color: #28a745;
        }
        .btn-finalizar:hover {
            background-color: #218838;
        }
    </style>
    <script>
        function carregarCarrinho() {
            fetch("carrinho.php?carregar=1")
                .then(response => response.text())
                .then(data => document.getElementById("carrinho").innerHTML = data);
        }

        function finalizarCompra() {
            window.location.href = "checkout.php"; // Redireciona para o checkout
        }

        window.onload = carregarCarrinho;
    </script>
</head>
<body>

<h1>Carrinho de Compras</h1>
<div id="carrinho"></div>

</body>
</html>

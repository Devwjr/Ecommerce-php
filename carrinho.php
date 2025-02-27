<?php
session_start();

// Lista de produtos disponíveis
$produtos = [
    1 => ['nome' => 'Notebook XYZ, com 8GB de RAM e 512GB de SSD', 'preco' => 2499.00],
    2 => ['nome' => 'Monitor LED 24", resolução Full HD', 'preco' => 899.00],
    3 => ['nome' => 'Teclado mecânico RGB, com switches Cherry MX', 'preco' => 399.00],
    4 => ['nome' => 'Mouse gamer com 16.000 DPI e iluminação RGB', 'preco' => 249.00],
    5 => ['nome' => 'Fones de ouvido com cancelamento de ruído e microfone', 'preco' => 599.00],
    6 => ['nome' => 'Gabinete ATX com ventilação otimizada e RGB', 'preco' => 299.00],
    7 => ['nome' => 'Fonte de alimentação 600W, 80+ Bronze', 'preco' => 299.00],
    8 => ['nome' => 'Placa de vídeo', 'preco' => 999.00],
    9 => ['nome' => 'Placa mãe', 'preco' => 569.00],
];

// Inicia o carrinho na sessão, se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Adicionar produto ao carrinho
if (isset($_GET['adicionar']) && isset($produtos[$_GET['adicionar']])) {
    $produto_id = $_GET['adicionar'];

    if (isset($_SESSION['carrinho'][$produto_id])) {
        $_SESSION['carrinho'][$produto_id]['quantidade'] += 1;
    } else {
        $_SESSION['carrinho'][$produto_id] = [
            'nome' => $produtos[$produto_id]['nome'],
            'preco' => $produtos[$produto_id]['preco'],
            'quantidade' => 1
        ];
    }

    header("Location: carrinho.php");
    exit;
}

// Excluir item do carrinho
if (isset($_GET['remover']) && isset($_SESSION['carrinho'][$_GET['remover']])) {
    unset($_SESSION['carrinho'][$_GET['remover']]);
    header("Location: carrinho.php");
    exit;
}

// Deletar todos os itens do carrinho
if (isset($_GET['deletar_tudo'])) {
    $_SESSION['carrinho'] = [];
    header("Location: carrinho.php");
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
        table {
            width: 70%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #1e3a8a;
            color: white;
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
        .btn-deletar {
            background-color: red;
        }
        .btn-deletar:hover {
            background-color: darkred;
        }
        .delete-item {
            color: red;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h1>Carrinho de Compras</h1>

<h2>Produtos disponíveis:</h2>
<table>
    <tr>
        <th>Produto</th>
        <th>Preço</th>
        <th>Ação</th>
    </tr>
    <?php foreach ($produtos as $id => $produto): ?>
        <tr>
            <td><?= $produto['nome']; ?></td>
            <td>R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></td>
            <td><a href="carrinho.php?adicionar=<?= $id; ?>"><button>Adicionar ao Carrinho</button></a></td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Seu carrinho:</h2>
<?php if (empty($_SESSION['carrinho'])): ?>
    <p>Carrinho vazio!</p>
<?php else: ?>
    <table>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
            <th>Ação</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['carrinho'] as $id => $produto):
            $subtotal = $produto['preco'] * $produto['quantidade'];
            $total += $subtotal;
        ?>
            <tr>
                <td><?= $produto['nome']; ?></td>
                <td>R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></td>
                <td><?= $produto['quantidade']; ?></td>
                <td>R$ <?= number_format($subtotal, 2, ',', '.'); ?></td>
                <td><a href="carrinho.php?remover=<?= $id; ?>" class="delete-item">❌</a></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><strong>Total:</strong></td>
            <td><strong>R$ <?= number_format($total, 2, ',', '.'); ?></strong></td>
            <td></td>
        </tr>
    </table>
    <br>
    <button class="btn-finalizar" onclick="window.location.href='checkout.php'">Finalizar Compra</button>
    <a href="carrinho.php?deletar_tudo"><button class="btn-deletar">Esvaziar Carrinho</button></a>
<?php endif; ?>

<br>
<a href="index.php"><button class="btn-voltar">Voltar à Página Inicial</button></a>

</body>
</html>

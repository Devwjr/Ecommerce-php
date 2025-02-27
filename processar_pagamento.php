<?php
session_start();
if (empty($_SESSION['carrinho'])) {
    header("Location: index.php");
    exit;
}

// Aqui você pode integrar com um sistema de pagamento real (PagSeguro, Mercado Pago, etc.)
// Por enquanto, só vamos "simular" o pagamento:

unset($_SESSION['carrinho']); // Limpa o carrinho

echo "<h1>Pagamento realizado com sucesso! ✅</h1>";
echo "<a href='index.php'>Voltar para a loja</a>";
?>

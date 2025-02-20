<?php
session_start();
$chave_acesso = "SUA_ACCESS_TOKEN";


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['token_pagamento'])) {
    $token_pagamento = $_POST['token_pagamento'];

    // Dados da compra
    $dados_pagamento = [
        "transaction_amount" => 100.00,  
        "token" => $token_pagamento,
        "description" => "Compra no Ecommerce",
        "installments" => 1,  
        "payment_method_id" => "visa", 
        "payer" => [
            "email" => "cliente@email.com"
        ]
    ];

    
    $requisicao = curl_init();
    curl_setopt($requisicao, CURLOPT_URL, "https://api.mercadopago.com/v1/payments");
    curl_setopt($requisicao, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $chave_acesso,
        "Content-Type: application/json"
    ]);
    curl_setopt($requisicao, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($requisicao, CURLOPT_POST, true);
    curl_setopt($requisicao, CURLOPT_POSTFIELDS, json_encode($dados_pagamento));

    
    $resposta = curl_exec($requisicao);
    curl_close($requisicao);

    
    $resultado = json_decode($resposta, true);

    // Verifica se o pagamento foi aprovado
    if (isset($resultado['status']) && $resultado['status'] == "approved") {
        echo "<h2>✅ Pagamento aprovado!</h2>";
    } else {
        echo "<h2>❌ Erro no pagamento:</h2>";
        echo "<p>" . ($resultado['status_detail'] ?? 'Erro desconhecido') . "</p>";
    }
} else {
    echo "<h2>❌ Erro: Nenhum token recebido!</h2>";
}
?>

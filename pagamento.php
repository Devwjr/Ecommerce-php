<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - Mercado Pago</title>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>

<h2>Pagamento via Mercado Pago</h2>

<form id="formularioPagamento" action="checkout.php" method="POST">
    <input type="text" id="numeroCartao" placeholder="Número do Cartão" required><br>
    <input type="text" id="mesExpiracao" placeholder="Mês Expiração (MM)" required><br>
    <input type="text" id="anoExpiracao" placeholder="Ano Expiração (AAAA)" required><br>
    <input type="text" id="codigoSeguranca" placeholder="CVC" required><br>
    <input type="text" id="nomeCartao" placeholder="Nome no Cartão" required><br>
    <input type="text" id="cpfCliente" placeholder="CPF" required><br>
    <input type="hidden" name="token_pagamento" id="tokenPagamento">
    <button type="button" id="botaoPagar">Pagar</button>
</form>

<script>
    const mercadoPago = new MercadoPago("minha chave ");

    document.getElementById("botaoPagar").addEventListener("click", async (evento) => {
        evento.preventDefault(); 

        const numeroCartao = document.getElementById("numeroCartao").value;
        const mesExpiracao = document.getElementById("mesExpiracao").value;
        const anoExpiracao = document.getElementById("anoExpiracao").value;
        const codigoSeguranca = document.getElementById("codigoSeguranca").value;
        const nomeCartao = document.getElementById("nomeCartao").value;
        const tipoIdentificacao = "CPF";
        const cpfCliente = document.getElementById("cpfCliente").value;

        try {
            const { id: token } = await mercadoPago.fields.createCardToken({
                cardNumber: numeroCartao,
                expirationMonth: mesExpiracao,
                expirationYear: anoExpiracao,
                securityCode: codigoSeguranca,
                cardholderName: nomeCartao,
                identificationType: tipoIdentificacao,
                identificationNumber: cpfCliente,
            });

            document.getElementById("tokenPagamento").value = token;
            document.getElementById("formularioPagamento").submit();
        } catch (erro) {
            alert("Erro ao gerar token de pagamento!");
            console.error(erro);
        }
    });
</script>

</body>
</html>

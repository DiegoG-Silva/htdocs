<?php
session_start();
$erro_pagamento = "";
$erro_entrega = "";
$erro_validacao = 0;

// Verificando se o usuário passou pelas etapas anteriores
if (!isset($_SESSION["nome"]) || !isset($_SESSION["skin_campeao"])) {
    header("Location: etapa%201.php");
    exit;
}

if (isset($_POST["botao"])) {
    $_SESSION["pagamento"] = $_POST["pagamento"] ?? '';
    $_SESSION["entrega"]   = $_POST["entrega"] ?? '';

    // VALIDAÇÃO: Pagamento é obrigatório
    if (empty($_SESSION["pagamento"])) {
        $erro_pagamento = "<span style='color:red'>Selecione uma forma de pagamento.</span>";
        $erro_validacao++;
    }

    // VALIDAÇÃO: Entrega é obrigatória
    if (empty($_SESSION["entrega"])) {
        $erro_entrega = "<span style='color:red'>Selecione uma forma de entrega.</span>";
        $erro_validacao++;
    }

    if ($erro_validacao == 0) {
        header("Location: recebe.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Etapa 3 - Pagamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Etapa 3 - Pagamento</h1>
    <form action="etapa%203.php" method="post">
        
        <h2>Forma de Pagamento:</h2>
        <select name="pagamento">
            <option value="">Selecione</option>
            <option value="1" <?= (($_SESSION["pagamento"] ?? '') == '1') ? 'selected' : '' ?>>Cartão de Crédito</option>
            <option value="2" <?= (($_SESSION["pagamento"] ?? '') == '2') ? 'selected' : '' ?>>Cartão de Débito</option>
            <option value="3" <?= (($_SESSION["pagamento"] ?? '') == '3') ? 'selected' : '' ?>>PIX</option>
            <option value="4" <?= (($_SESSION["pagamento"] ?? '') == '4') ? 'selected' : '' ?>>PicPay</option>
            <option value="5" <?= (($_SESSION["pagamento"] ?? '') == '5') ? 'selected' : '' ?>>Boleto</option>
        </select>
        <?= $erro_pagamento ?>

        <h2>Forma de Entrega:</h2>
        <div>
            <input type="radio" name="entrega" value="1" id="entrega-chave" <?= (($_SESSION["entrega"] ?? '') == '1') ? 'checked' : '' ?>>
            <label for="entrega-chave" class="inline">Chave - R$5.00</label><br/>

            <input type="radio" name="entrega" value="2" id="entrega-presente" <?= (($_SESSION["entrega"] ?? '') == '2') ? 'checked' : '' ?>>
            <label for="entrega-presente" class="inline">Presente - R$7.00</label><br/>

            <input type="radio" name="entrega" value="3" id="entrega-rp" <?= (($_SESSION["entrega"] ?? '') == '3') ? 'checked' : '' ?>>
            <label for="entrega-rp" class="inline">RP - R$10.00</label>
        </div>
        <?= $erro_entrega ?>

        <div class="botoes">
            <a href="etapa%202.php" class="botao">Voltar</a>
            <input type="submit" value="Finalizar Pedido" name="botao">
        </div>
    </form>
</div>
</body>
</html>
<?php
$nome           = $_POST['nome'] ?? '';
$cpf            = $_POST['cpf'] ?? '';
$email          = $_POST['email'] ?? '';
$riotid         = $_POST['riotid'] ?? '';
$campeao        = $_POST['campeao'] ?? '';
$novidades      = $_POST['novidades'] ?? '';

$skin_campeao   = $_POST['skin_campeao'] ?? '';
$skin_sentinela = $_POST['skin_sentinela'] ?? '';
$emotes         = $_POST['emotes'] ?? [];
$eternos        = $_POST['eternos'] ?? '';
$serieeternos   = $_POST['serieeternos'] ?? ''; 
$icone          = $_POST['icone'] ?? '';
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
    <form action="recebe.php" method="post">
        <input type="hidden" name="nome" value="<?= htmlspecialchars($nome) ?>">
        <input type="hidden" name="cpf" value="<?= htmlspecialchars($cpf) ?>">
        <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
        <input type="hidden" name="riotid" value="<?= htmlspecialchars($riotid) ?>">
        <input type="hidden" name="campeao" value="<?= htmlspecialchars($campeao) ?>">
        <input type="hidden" name="novidades" value="<?= htmlspecialchars($novidades) ?>">

        <input type="hidden" name="skin_campeao" value="<?= htmlspecialchars($skin_campeao) ?>">
        <input type="hidden" name="skin_sentinela" value="<?= htmlspecialchars($skin_sentinela) ?>">
        <?php foreach ($emotes as $emote): ?>
            <input type="hidden" name="emotes[]" value="<?= htmlspecialchars($emote) ?>">
        <?php endforeach; ?>
        <input type="hidden" name="eternos" value="<?= htmlspecialchars($eternos) ?>">
        <input type="hidden" name="serieeternos" value="<?= htmlspecialchars($serieeternos) ?>"> <input type="hidden" name="icone" value="<?= htmlspecialchars($icone) ?>">


        <label>Forma de pagamento:</label>
        <select name="pagamento" required>
            <option value="">Selecione</option>
            <option value="1">Cartão de Crédito</option>
            <option value="2">Cartão de Débito</option>
            <option value="3">PIX</option>
            <option value="4">PicPay</option>
            <option value="5">Boleto</option>
        </select>

        <label>Forma de entrega & taxa:</label>
        <select name="entrega" required>
            <option value="">Selecione</option>
            <option value="1">Chave - R$5.00</option>
            <option value="2">Presente - R$7.00</option>
            <option value="3">RP - R$10.00</option>
        </select>

        <div class="botoes">
            <input type="submit" value="Finalizar Pedido">
        </div>
    </form>
</div>
</body>
</html>
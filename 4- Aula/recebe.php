<?php
// sim, eu transformei tudo aqui, acho q fica mais organizado e é menos variavel pra passar pra frente
//  Dados da etapa 1
$nome       = $_POST['nome'] ?? '';
$cpf        = $_POST['cpf'] ?? '';
$email      = $_POST['email'] ?? '';
$riotid     = $_POST['riotid'] ?? '';
$campeao    = $_POST['campeao'] ?? '';
$novidades  = $_POST['novidades'] === '1' ? 'Sim' : 'Não';

//  Dados da etapa 2
$skin_campeao   = $_POST['skin_campeao'] ?? '';
$skin_sentinela = $_POST['skin_sentinela'] ?? '';
$emotes         = $_POST['emotes'] ?? [];
$eternos        = $_POST['eternos'] ?? '';
$eternos_serie_id = $_POST['serieeternos'] ?? '';
$icone          = $_POST['icone'] ?? '';


//  Dados da etapa 3
$pagamento = $_POST['pagamento'] ?? '';
$entrega   = $_POST['entrega'] ?? '';

//  Conversões
if ($skin_campeao === '1') {
    $skin_campeao_nome  = 'Ahri Lenda imortalizada';
    $skin_campeao_preco = 50.00;
} else if ($skin_campeao === '2') {
    $skin_campeao_nome  = 'Irelia Florescer espiritual';
    $skin_campeao_preco = 45.00;
} else if ($skin_campeao === '3') {
    $skin_campeao_nome  = 'Kindred Florescer Espiritual';
    $skin_campeao_preco = 60.00;
} else {
    $skin_campeao_nome = '';
    $skin_campeao_preco = 0;
}

if ($skin_sentinela === '1') {
    $skin_sentinela_nome  = 'Sentinela Neon';
    $skin_sentinela_preco = 15.00;
} else if ($skin_sentinela === '2') {
    $skin_sentinela_nome  = 'Sentinela Dragão';
    $skin_sentinela_preco = 20.00;
} else {
    $skin_sentinela_nome = '';
    $skin_sentinela_preco = 0;
}

$emote = $_POST['emote'] ?? '';

if ($emote === '1') {
    $emote_nome  = 'Emote GG';
    $emote_preco = 5.00;
} else if ($emote === '2') {
    $emote_nome  = 'Emote Dança';
    $emote_preco = 5.00;
} else {
    $emote_nome = '';
    $emote_preco = 0;
}


if ($eternos === '1') {
    $eternos_nome  = 'Yasuo';
    $eternos_preco = 25.00;
} else if ($eternos === '2') {
    $eternos_nome  = 'Darius';
    $eternos_preco = 30.00;
} 
else if ($eternos === '3') {
    $eternos_nome  = 'Lee sin';
    $eternos_preco = 28.00;
} else {
    $eternos_nome = '';
    $eternos_preco = 0;
}

$eternos_serie = '';
if ($eternos_serie_id === '1') {
    $eternos_serie = 'Series 1';
}
else if ($eternos_serie_id === '2') {
    $eternos_serie = 'Series 2';
}

if ($icone === '1') {
    $icone_nome  = 'Poro feliz';
    $icone_preco = 5.00;
} else if ($icone === '2') {
    $icone_nome  = 'Poro triste';
    $icone_preco = 7.00;
} else if ($icone === '3') {
    $icone_nome  = 'Poro puto';
    $icone_preco = 15.00;
} else {
    $icone_nome = '';
    $icone_preco = 0;
}

if ($pagamento === '1') {
    $pagamento_nome = 'Cartão de Crédito';
} else if ($pagamento === '2') {
    $pagamento_nome = 'Cartão de Débito';
} else if ($pagamento === '3') {
    $pagamento_nome = 'PIX';
} else if ($pagamento === '4') {
    $pagamento_nome = 'PicPay';
} else if ($pagamento === '5') {
    $pagamento_nome = 'Boleto';
} else {
    $pagamento_nome = '';
}

$entrega_taxa = 0;
if ($entrega === '1') {
    $entrega_nome = 'Chave';
    $entrega_taxa = 5.00;
} else if ($entrega === '2') {
    $entrega_nome = 'Presente';
    $entrega_taxa = 7.00;
} else if ($entrega === '3') {
    $entrega_nome = 'RP';
    $entrega_taxa = 10.00;
} else {
    $entrega_nome = '';
}

//  Total
$total = $skin_campeao_preco + $skin_sentinela_preco + $eternos_preco + $emote_preco + $icone_preco + $entrega_taxa;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resumo do Pedido - Vendedor</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Resumo do Pedido - Vendedor</h1>

    <div class="resumo-section">
        <h2>Dados do Cliente</h2>
        <p class="resumo-item"><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
        <p class="resumo-item"><strong>CPF:</strong> <?= htmlspecialchars($cpf) ?></p>
        <p class="resumo-item"><strong>E-mail:</strong> <?= htmlspecialchars($email) ?></p>
        <p class="resumo-item"><strong>Riot ID:</strong> <?= htmlspecialchars($riotid) ?></p>
        <p class="resumo-item"><strong>Campeão preferido:</strong> <?= htmlspecialchars($campeao) ?></p>
        <p class="resumo-item"><strong>Receber novidades:</strong> <?= $novidades ?></p>
    </div>

    <div class="resumo-section">
        <h2>Produtos Escolhidos</h2>
        <?php if ($skin_campeao_nome): ?>
            <p class="resumo-item"><strong>Skin de Campeão:</strong> <?= $skin_campeao_nome ?> - R$<?= number_format($skin_campeao_preco, 2, ',', '.') ?></p>
        <?php endif; ?>
        <?php if ($skin_sentinela_nome): ?>
            <p class="resumo-item"><strong>Skin de Sentinela:</strong> <?= $skin_sentinela_nome ?> - R$<?= number_format($skin_sentinela_preco, 2, ',', '.') ?></p>
        <?php endif; ?>
        <?php if ($emote_nome): ?>
            <p class="resumo-item"><strong>Emote:</strong> <?= $emote_nome ?> - R$<?= number_format($emote_preco, 2, ',', '.') ?></p>
        <?php endif; ?>
        <?php if ($eternos_nome): ?>
            <p class="resumo-item"><strong>Eternos:</strong> <?= $eternos_nome ?> (<?= $eternos_serie ?>) - R$<?= number_format($eternos_preco, 2, ',', '.') ?></p>
        <?php endif; ?>
        <?php if ($icone_nome): ?>
            <p class="resumo-item"><strong>Ícone:</strong> <?= $icone_nome ?> - R$<?= number_format($icone_preco, 2, ',', '.') ?></p>
        <?php endif; ?>
        <?php if ($entrega_taxa > 0): ?>
            <p class="resumo-item"><strong>Taxa de Entrega:</strong> <?= $entrega_nome ?> - R$<?= number_format($entrega_taxa, 2, ',', '.') ?></p>
        <?php endif; ?>
    </div>

    <div class="resumo-section">
        <h2>Pagamento</h2>
        <p class="resumo-item"><strong>Forma de pagamento:</strong> <?= $pagamento_nome ?></p>
        <p class="resumo-item"><strong>Forma de entrega:</strong> <?= $entrega_nome ?></p>
    </div>

    <div class="resumo-section">
        <h2>Total do Pedido</h2>
        <p class="resumo-item"><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></p>
    </div>

    <div class="botoes">
        <a href="index.php" class="botao">Voltar ao Início</a>
    </div>
</div>
</body>
</html>
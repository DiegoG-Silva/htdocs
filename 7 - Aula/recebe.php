<?php
session_start();
// Se não houver dados na sessão, redireciona para o início
if (!isset($_SESSION["nome"])) {
    header("Location: index.php");
    exit;
}

// Limpa todas as variáveis de sessão no final para uma nova compra
$nome = $_SESSION["nome"] ?? '';
$cpf = $_SESSION["cpf"] ?? '';
$email = $_SESSION["email"] ?? '';
$riotid = $_SESSION["riotid"] ?? '';
$campeao = $_SESSION["campeao"] ?? '';
$novidades = ($_SESSION["novidades"] ?? '') === '1' ? 'Sim' : 'Não';
$telefone = $_SESSION["telefone"] ?? '';
$sexo = $_SESSION["sexo"] ?? '';
// Os campos data_nasc e endereco foram removidos

$skin_campeao_id = $_SESSION["skin_campeao"] ?? '';
$skin_sentinela_id = $_SESSION["skin_sentinela"] ?? '';
$emote_id = $_SESSION["emote"] ?? '';
$eternos_id = $_SESSION["eternos"] ?? '';
$serie_eternos_id = $_SESSION["serieeternos"] ?? '';
$icone_id = $_SESSION["icone"] ?? '';

$pagamento_id = $_SESSION["pagamento"] ?? '';
$entrega_id = $_SESSION["entrega"] ?? '';

// Conversões
$skin_campeao_nome = '';
$skin_campeao_preco = 0;
if ($skin_campeao_id === '1') {
    $skin_campeao_nome = 'Ahri Lenda imortalizada';
    $skin_campeao_preco = 50.00;
} elseif ($skin_campeao_id === '2') {
    $skin_campeao_nome = 'Irelia Florescer espiritual';
    $skin_campeao_preco = 45.00;
} elseif ($skin_campeao_id === '3') {
    $skin_campeao_nome = 'Kindred Florescer Espiritual';
    $skin_campeao_preco = 60.00;
}

$skin_sentinela_nome = '';
$skin_sentinela_preco = 0;
if ($skin_sentinela_id === '1') {
    $skin_sentinela_nome = 'Sentinela Neon';
    $skin_sentinela_preco = 15.00;
} elseif ($skin_sentinela_id === '2') {
    $skin_sentinela_nome = 'Sentinela Dragão';
    $skin_sentinela_preco = 20.00;
}

$emote_nome = '';
$emote_preco = 0;
if ($emote_id === '1') {
    $emote_nome = 'Emote GG';
    $emote_preco = 5.00;
} elseif ($emote_id === '2') {
    $emote_nome = 'Emote Dança';
    $emote_preco = 5.00;
}

$eternos_nome = '';
$eternos_preco = 0;
if ($eternos_id === '1') {
    $eternos_nome = 'Yasuo';
    $eternos_preco = 25.00;
} elseif ($eternos_id === '2') {
    $eternos_nome = 'Darius';
    $eternos_preco = 30.00;
} elseif ($eternos_id === '3') {
    $eternos_nome = 'Lee sin';
    $eternos_preco = 28.00;
}

$eternos_serie_nome = '';
if ($serie_eternos_id === '1') {
    $eternos_serie_nome = 'Série 1';
} elseif ($serie_eternos_id === '2') {
    $eternos_serie_nome = 'Série 2';
}

$icone_nome = '';
$icone_preco = 0;
if ($icone_id === '1') {
    $icone_nome = 'Poro feliz';
    $icone_preco = 5.00;
} elseif ($icone_id === '2') {
    $icone_nome = 'Poro triste';
    $icone_preco = 7.00;
} elseif ($icone_id === '3') {
    $icone_nome = 'Poro puto';
    $icone_preco = 15.00;
}

$pagamento_nome = '';
if ($pagamento_id === '1') {
    $pagamento_nome = 'Cartão de Crédito';
} elseif ($pagamento_id === '2') {
    $pagamento_nome = 'Cartão de Débito';
} elseif ($pagamento_id === '3') {
    $pagamento_nome = 'PIX';
} elseif ($pagamento_id === '4') {
    $pagamento_nome = 'PicPay';
} elseif ($pagamento_id === '5') {
    $pagamento_nome = 'Boleto';
}

$entrega_nome = '';
$entrega_taxa = 0;
if ($entrega_id === '1') {
    $entrega_nome = 'Chave';
    $entrega_taxa = 5.00;
} elseif ($entrega_id === '2') {
    $entrega_nome = 'Presente';
    $entrega_taxa = 7.00;
} elseif ($entrega_id === '3') {
    $entrega_nome = 'RP';
    $entrega_taxa = 10.00;
}

// Total
$total = $skin_campeao_preco + $skin_sentinela_preco + $emote_preco + $eternos_preco + $icone_preco + $entrega_taxa;
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
            <p class="resumo-item"><strong>Telefone:</strong> <?= htmlspecialchars($telefone) ?></p>
            <p class="resumo-item"><strong>Sexo:</strong> <?= htmlspecialchars($sexo) ?></p>
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
                <p class="resumo-item"><strong>Eternos:</strong> <?= $eternos_nome ?> (<?= $eternos_serie_nome ?>) - R$<?= number_format($eternos_preco, 2, ',', '.') ?></p>
            <?php endif; ?>
            <?php if ($icone_nome): ?>
                <p class="resumo-item"><strong>Ícone:</strong> <?= $icone_nome ?> - R$<?= number_format($icone_preco, 2, ',', '.') ?></p>
            <?php endif; ?>
            <p class="resumo-item"><strong>Forma de pagamento:</strong> <?= $pagamento_nome ?></p>
            <p class="resumo-item"><strong>Forma de entrega:</strong> <?= $entrega_nome ?> - R$<?= number_format($entrega_taxa, 2, ',', '.') ?></p>
        </div>

        <div class="resumo-section">
            <h2>Total do Pedido</h2>
            <p class="resumo-item"><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></p>
        </div>

        <div class="botoes">
            <a href="index.php" class="botao">Nova Venda</a>
        </div>
    </div>
</body>
</html>
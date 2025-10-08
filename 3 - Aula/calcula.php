<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Resultado do Pedido</title>
	<link rel="stylesheet" href="style.css">	
</head>
<body>
	<div class="container">
		<h1>Resumo do Pedido</h1>
	<div class="dados">
<?php   
// Dados do formulário
$nome = $_POST['nome'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$cep = $_POST['cep'] ?? '';
$cidade = $_POST['cidade'] ?? '';
$uf = $_POST['UF'] ?? '';
$sexo = $_POST['sexo'] ?? '';
$riot_id = $_POST['riotid'] ?? '';
$email_conta = $_POST['email_conta'] ?? '';
$champ = $_POST['champ'] ?? '';
$total_geral = 0;

// Processando as notificações
$notificacoes = "Não";
if (isset($_POST['notificacoes'])) {
    $notificacoes_array = $_POST['notificacoes'];
    $notificacoes_list = [];
    if (in_array('novas', $notificacoes_array)) {
        $notificacoes_list[] = 'Novas skins';
    }
    if (in_array('descontos', $notificacoes_array)) {
        $notificacoes_list[] = 'Descontos';
    }
    $notificacoes = implode(', ', $notificacoes_list);
}

// Mapeamento do sexo
$sexo_display = 'Não informado';
if ($sexo == '1') {
    $sexo_display = 'Masculino';
} elseif ($sexo == '2') {
    $sexo_display = 'Feminino';
}

// Mapeamento da forma de pagamento
$pagamento_display = 'Não informado';
$cod_pagamento = $_POST['pgmnt'] ?? '';
if ($cod_pagamento == '1') {
    $pagamento_display = 'Cartão de Crédito';
} elseif ($cod_pagamento == '2') {
    $pagamento_display = 'PicPay';
} elseif ($cod_pagamento == '3') {
    $pagamento_display = 'PIX';
} elseif ($cod_pagamento == '4') {
    $pagamento_display = 'Boleto';
}

echo "<h1>Resumo do Pedido</h1>";
echo "<div class='dados'>";
echo "<h2>Informações do Cliente</h2>";
echo "<p><strong>Nome:</strong> $nome</p>";
echo "<p><strong>CPF:</strong> $cpf</p>";
echo "<p><strong>Endereço:</strong> $endereco</p>";
echo "<p><strong>CEP:</strong> $cep</p>";
echo "<p><strong>Cidade/UF:</strong> $cidade/$uf</p>";
echo "<p><strong>Sexo:</strong> $sexo_display</p>";
echo "<p><strong>Campeão preferido:</strong> $champ</p>";
echo "<p><strong>Receber notificações:</strong> $notificacoes</p>";
echo "<p><strong>Riot ID:</strong> $riot_id</p>";
echo "<p><strong>Email da conta:</strong> $email_conta</p>";
echo "<p><strong>Forma de Pagamento:</strong> $pagamento_display</p>";

echo "<hr>";
echo "<h2>Itens do Pedido</h2>";

// Processamento da Skin de Campeão
$cod_skin = $_POST['codskin'] ?? 0;
$qtd_skin = $_POST['qtdskin'] ?? 0;
$nome_skin = '';
$preco_skin = 0;
if ($cod_skin == 1) {
    $nome_skin = 'Yasuo Emissário';
    $preco_skin = 70.00;
} elseif ($cod_skin == 2) {
    $nome_skin = 'Lux Cosmos Negro';
    $preco_skin = 64.00;
} elseif ($cod_skin == 3) {
    $nome_skin = 'Tristana bombeira';
    $preco_skin = 32.00;
} elseif ($cod_skin == 4) {
    $nome_skin = 'Jhin Velho Oeste';
    $preco_skin = 44.00;
}
if ($nome_skin != '' && $qtd_skin > 0) {
    $subtotal_skin = $preco_skin * $qtd_skin;
    $total_geral += $subtotal_skin;
    $preco_skin = "R$ " . number_format($preco_skin, 2, ',', '.');
    $subtotal_skin = "R$ " . number_format($subtotal_skin, 2, ',', '.');
    echo "<p><strong>Skin:</strong> $nome_skin</p>";
    echo "<p>- Quantidade: $qtd_skin</p>";
    echo "<p>- Preço Unitário: $preco_skin</p>";
    echo "<p>- Subtotal: $subtotal_skin</p>";
    echo "<br>";
}

// Processamento da Skin de Sentinela
$cod_sentinela = $_POST['codsent'] ?? 0;
$qtd_sentinela = $_POST['qtdsent'] ?? 0;
$nome_sentinela = '';
$preco_sentinela = 0;
if ($cod_sentinela == 2) {
    $nome_sentinela = 'Poro fantasma';
    $preco_sentinela = 10.00;
} elseif ($cod_sentinela == 3) {
    $nome_sentinela = 'Draven Dourado';
    $preco_sentinela = 16.00;
} elseif ($cod_sentinela == 4) {
    $nome_sentinela = 'Star Guardian';
    $preco_sentinela = 12.00;
} elseif ($cod_sentinela == 5) {
    $nome_sentinela = 'Projeto';
    $preco_sentinela = 8.00;
}
if ($nome_sentinela != '' && $qtd_sentinela > 0) {
    $subtotal_sentinela = $preco_sentinela * $qtd_sentinela;
    $total_geral += $subtotal_sentinela;
    $preco_sentinela = "R$ " . number_format($preco_sentinela, 2, ',', '.');
    $subtotal_sentinela = "R$ " . number_format($subtotal_sentinela, 2, ',', '.');
    echo "<p><strong>Sentinela:</strong> $nome_sentinela</p>";
    echo "<p>- Quantidade: $qtd_sentinela</p>";
    echo "<p>- Preço Unitário: $preco_sentinela</p>";
    echo "<p>- Subtotal: $subtotal_sentinela</p>";
    echo "<br>";
}

// Processamento dos Emotes
$cod_emote = $_POST['codemote'] ?? 0;
$qtd_emote = $_POST['qtdemote'] ?? 0;
$nome_emote = '';
$preco_emote = 0;
if ($cod_emote == 2) {
    $nome_emote = 'Joinha';
    $preco_emote = 100.00;
} elseif ($cod_emote == 3) {
    $nome_emote = 'Pinguin dab';
    $preco_emote = 67.00;
} elseif ($cod_emote == 4) {
    $nome_emote = 'Circo';
    $preco_emote = 85.00;
}
if ($nome_emote != '' && $qtd_emote > 0) {
    $subtotal_emote = $preco_emote * $qtd_emote;
    $total_geral += $subtotal_emote;
    $preco_emote = "R$ " . number_format($preco_emote, 2, ',', '.');
    $subtotal_emote = "R$ " . number_format($subtotal_emote, 2, ',', '.');
    echo "<p><strong>Emote:</strong> $nome_emote</p>";
    echo "<p>- Quantidade: $qtd_emote</p>";
    echo "<p>- Preço Unitário: $preco_emote</p>";
    echo "<p>- Subtotal: $subtotal_emote</p>";
    echo "<br>";
}

// Processamento dos Eternos
$cod_eterno = $_POST['codeterno'] ?? 0;
$serie_eterno = $_POST['serieeterno'] ?? 0;
$nome_eterno = '';
$preco_eterno = 0;
if ($cod_eterno == 2) {
    $nome_eterno = 'Yasuo';
    $preco_eterno = 7.00;
} elseif ($cod_eterno == 3) {
    $nome_eterno = 'LeBlanc';
    $preco_eterno = 8.00;
} elseif ($cod_eterno == 4) {
    $nome_eterno = 'Jhin';
    $preco_eterno = 4.00;
}
if ($nome_eterno != '' && $serie_eterno > 0) {
    $subtotal_eterno = $preco_eterno * $serie_eterno;
    $total_geral += $subtotal_eterno;
    $preco_eterno = "R$ " . number_format($preco_eterno, 2, ',', '.');
    $subtotal_eterno = "R$ " . number_format($subtotal_eterno, 2, ',', '.');
    echo "<p><strong>Eterno:</strong> $nome_eterno (Série $serie_eterno)</p>";
    echo "<p>- Quantidade: $serie_eterno</p>";
    echo "<p>- Preço Unitário: $preco_eterno</p>";
    echo "<p>- Subtotal: $subtotal_eterno</p>";
    echo "<br>";
}

// Verificando se algum item foi adicionado
    $total_geral_formatado = "R$ " . number_format($total_geral, 2, ',', '.');
    echo "<h3>Valor a pagar: $total_geral_formatado</h3>";
?>
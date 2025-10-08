<?php
    session_start();
 
    $total_compra = 0;
 
    // recebendo dados - etapa 1
    $nome     = $_SESSION["nome"] ?? 'Não informado';
    $email    = $_SESSION["email"] ?? 'Não informado';
    $sexo     = $_SESSION["sexo"] ?? 'Não informado';
    $cpf      = $_SESSION["cpf"] ?? 'Não informado';
    $telefone = $_SESSION["telefone"] ?? 'Não informado';
    $cidade   = $_SESSION["cidade"] ?? 'Não informado';
    $estado   = $_SESSION["estado"] ?? 'Não informado';
    $endereco = $_SESSION["endereco"] ?? 'Não informado';
    $cep      = $_SESSION["cep"] ?? 'Não informado';
 
    if ($sexo == 1){
        $sexo = "Masculino";
    } elseif ($sexo == 2){
        $sexo = "Feminino";    
    } else {
		$sexo = "Não informado";
	}

    // recebendo dados - etapa 2
    $livro1 = $_SESSION["livro1"] ?? '';
    $qtdade1 = $_SESSION["qtdade1"] ?? 0;
    $preco1 = 0;
    $nome_livro1 = "";
    
    switch ($livro1) {
        case "1": $nome_livro1 = "Ciência da Computação"; $preco1 = 399.00; break;
        case "2": $nome_livro1 = "Medicina"; $preco1 = 499.00; break;
        case "3": $nome_livro1 = "Direito"; $preco1 = 349.00; break;
        case "4": $nome_livro1 = "Engenharia Civil"; $preco1 = 249.00; break;
        default: $nome_livro1 = "Nenhum Livro Educacional"; $preco1 = 0; break;
    }
    $total_compra += $preco1 * $qtdade1;

    $livro2 = $_SESSION["livro2"] ?? '';
    $qtdade2 = $_SESSION["qtdade2"] ?? 0;
    $preco2 = 0;
    $nome_livro2 = "";

    switch ($livro2) {
        case "1": $nome_livro2 = "Nenhum Quadrinho"; $preco2 = 0; break;
        case "2": $nome_livro2 = "Batman: A Piada Mortal"; $preco2 = 399.00; break;
        case "3": $nome_livro2 = "Sandman"; $preco2 = 349.00; break;
        case "4": $nome_livro2 = "Watchmen"; $preco2 = 249.00; break;
        case "5": $nome_livro2 = "Akira"; $preco2 = 299.00; break;
    }
    $total_compra += $preco2 * $qtdade2;
    
    $livro3_ids = $_SESSION["livro3"] ?? [];
    $qtdade3 = $_SESSION["qtdade3"] ?? 0;
    $preco3 = 0;
    $nome_livro3 = [];
    
    if (is_array($livro3_ids)) {
        if (in_array("1", $livro3_ids)) {
            $nome_livro3[] = "Nenhum Livro de Fantasia";
        } else {
            foreach($livro3_ids as $id) {
                switch($id) {
                    case "2": $nome_livro3[] = "Senhor dos Anéis (BOX)"; $preco3 += 900.00; break;
                    case "3": $nome_livro3[] = "O Hobbit"; $preco3 += 200.00; break;
                    case "4": $nome_livro3[] = "Harry Potter (BOX)"; $preco3 += 700.00; break;
                    case "5": $nome_livro3[] = "As Crônicas de Nárnia"; $preco3 += 199.00; break;
                }
            }
        }
    }
    $total_compra += $preco3 * $qtdade3;
    
    // Recebendo dados - etapa 3
    $pagamento_id = $_SESSION["pagamento"] ?? '';
    $entrega_id = $_SESSION["entrega"] ?? '';
    
    $pagamento_nome = '';
    $valor_acrescimo_desconto = 0;
    
    switch($pagamento_id) {
        case '1': $pagamento_nome = 'Cartão de Crédito'; break;
        case '2': $pagamento_nome = 'Cartão de Débito'; break;
        case '3': $pagamento_nome = 'PIX'; break;
        case '4': $pagamento_nome = 'PicPay'; break;
        case '5': $pagamento_nome = 'Boleto'; break;
        default: $pagamento_nome = 'Não informado'; break;
    }

    $entrega_nome = '';
    $valor_frete = 0;
    
    switch($entrega_id) {
        case '1': $entrega_nome = 'Física'; $valor_frete = 0.00; break;
        case '2': $entrega_nome = 'Normal'; $valor_frete = 7.00; break;
        case '3': $entrega_nome = 'Expressa'; $valor_frete = 10.00; break;
        default: $entrega_nome = 'Não informado'; break;
    }

    $valor_final = ($total_compra + $valor_frete);
 
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Livraria</title>
</head>
<body>
    <div class="container">
        <h2> Confirmação do Pedido </h2>
 
        <div class="section">
            <h3> Dados do Cliente </h3>
            <p>Nome: <?= htmlspecialchars($nome) ?></p>
            <p>E-mail: <?= htmlspecialchars($email) ?></p>
            <p>CPF: <?= htmlspecialchars($cpf) ?></p>
            <p>Telefone: <?= htmlspecialchars($telefone) ?></p>
            <p>Sexo: <?= htmlspecialchars($sexo) ?></p>
            <p>Endereço: <?= htmlspecialchars($endereco) ?> - <?= htmlspecialchars($cidade) ?> / <?= htmlspecialchars($estado) ?></p>
            <p>CEP: <?= htmlspecialchars($cep) ?></p>
        </div>
 
        <div class="section">
            <h3> Itens do Pedido </h3>
            <p>Livro Educacional: <?= htmlspecialchars($nome_livro1) ?> | Quantidade: <?= htmlspecialchars($qtdade1) ?> | Preço Unitário: R$ <?= number_format($preco1, 2, ',', '.') ?></p>
            <p>Quadrinhos: <?= htmlspecialchars($nome_livro2) ?> | Quantidade: <?= htmlspecialchars($qtdade2) ?> | Preço Unitário: R$ <?= number_format($preco2, 2, ',', '.') ?></p>
            <p>Livros Fantasia: <?= implode(', ', array_map('htmlspecialchars', $nome_livro3)) ?> | Quantidade: <?= htmlspecialchars($qtdade3) ?> | Preço Total: R$ <?= number_format($preco3 * $qtdade3, 2, ',', '.') ?></p>
            <p>Subtotal da Compra: R$ <?= number_format($total_compra, 2, ',', '.') ?></p>
        </div>
 
        <div class="section">
            <h3> Pagamento e Entrega </h3>
            <p>Forma de Pagamento: <?= htmlspecialchars($pagamento_nome) ?></p>
            <p>Forma de Entrega: <?= htmlspecialchars($entrega_nome) ?></p>
            <p>Valor do Frete: R$ <?= number_format($valor_frete, 2, ',', '.') ?></p>
            <p><strong>Valor Final da Compra: R$ <?= number_format($valor_final, 2, ',', '.') ?></strong></p>
        </div>
 
        <a href="index.php" class="botao">Nova Venda</a>    
</body>
</html>
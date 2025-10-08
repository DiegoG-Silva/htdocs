<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Venda</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
<div class="container">
    <h1>Registro de Venda</h1>
    <form action="gravavenda.php" method="post">
        
        <h2>Dados da Transação</h2>
        
        <label>ID da Venda:</label>
        <input type="text" name="id_venda" required> 

        <label>ID do Cliente:</label>
        <input type="text" name="id_cliente" required> 

        <label>Data da Venda:</label>
        <input type="text" name="data_venda" required> 

        <label>Forma de Pagamento:</label>
        <select name="forma_pagamento" required>
            <option value="">Selecione</option>
            <option value="Cartao">Cartão de Crédito/Débito</option>
            <option value="Pix">PIX</option>
            <option value="Boleto">Boleto</option>
        </select>

        <h2>Dados do Produto e Valores</h2>

        <label>ID do Produto:</label>
        <input type="text" name="id_produto" required> 

        <label>Quantidade:</label>
        <input type="number" name="quantidade" min="1" required>

        <label>Preço Unitário (R$):</label>
        <input type="number" name="preco_unitario" step="0.01" min="0" required>
        
        <h2>Dados de Entrega</h2>

        <label>Endereço de Entrega Completo:</label>
        <textarea name="endereco_entrega" rows="3" required></textarea>

        <label>Forma de Entrega:</label>
        <select name="forma_entrega" required>
            <option value="">Selecione</option>
            <option value="Correios">Correios (PAC/SEDEX)</option>
            <option value="Transportadora">Transportadora</option>
            <option value="Retirada">Retirada na Loja</option>
        </select>

        <div class="botoes">
            <a href="../index.php" class="botao">Voltar</a>
            <input type="submit" value="Registrar Venda" name="botao">
        </div>
    </form>
</div>
</body>
</html>
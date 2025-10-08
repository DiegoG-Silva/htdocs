<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Etapa 2 - Cadastro de Novo Produto</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
<div class="container">
    <h1>Cadastro de Novo Produto</h1>
    <form action="gravapro.php" method="post">
        
        <label>ID do Produto:</label>
        <input type="text" name="id_produto" required> 

        <label>Nome do Produto:</label>
        <input type="text" name="nome_produto" required> 

        <label>Descrição:</label>
        <textarea name="descricao" rows="4" required></textarea>

        <label>Marca/Fabricante:</label>
        <input type="text" name="marca" required> 

        <label>Preço (R$):</label>
        <input type="number" name="preco" step="0.01" min="0" required>

        <label>Quantidade em Estoque:</label>
        <input type="number" name="estoque" min="0" required>

        <label>Detalhes (Cor/Tamanho/Peso):</label>
        <input type="text" name="detalhes">
        
        <div class="botoes">
            <a href="../index.php" class="botao">Voltar</a>
            <input type="submit" value="Cadastrar Produto" name="botao">
        </div>
    </form>
</div>
</body>
</html>
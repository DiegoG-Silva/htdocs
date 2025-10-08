<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="POST" action="calcula.php">
    <fieldset style="width: 50%">	
		<h1>Skin verse</h1>
        <h2>Informações do cliente</h2>
        <label for="Nome">Cliente:</label>
        <input type="text" id="nome" name="nome" maxlength="40"  size="30" required><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" size="15" required
        placeholder= "Ex: 000.000.000-00"><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" size="40" maxlength="60" 
        required placeholder= "Ex: Rua Duque de Caxias, 265"><br><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" maxlength="9" size="10" minlength="9" 
        required placeholder= "Ex: 00000-00"><br><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade"  size="20" maxlength="15"><br><br>

        <label for="UF">UF:</label>
        <input type="text" id="UF" name="UF"  size="1" maxlength="2" minlength="2">
        <br><br>

        <label for="masculino" style="display:inline-block; margin-right:15px;">Masculino</label>
        <input type="radio" id="masculino" name="sexo" value="masculino" required>
        <label for="feminino" style="display:inline-block;">Feminino</label>
        <input type="radio" id="feminino" name="sexo" value="feminino" required>



        <label for="novas-skins">Receber notificações sobre novas skins:</label>
        <input type="checkbox" id="novas-skins" name="notificacoes" checked><br>

        <label for="descontos">Receber notificações sobre descontos da empresa:</label>
        <input type="checkbox" id="descontos" name="notificacoes" 
        checked><br><br>


        <label for="skin">Campeão Preferido:</label>
        <input type="text" id="champ" name="champ" size="20" ><br><br>
    </fieldset>
        
            <h2> Informações do pedido </h2>
            <label for="produto">Informe a skin desejada:</label>
            <input type="text" id="produto" name="produto" size="20" maxlength="40" />

		<br/><br/>
    	<label for="preco">Preço da skin: (R$):</label>
    	<input type="text" id="preco" name="preco" size="5" step="0.01" min="0" 
           placeholder="Ex: 20.00" required><br><br>

    	<label for="qtd">Quantidade desejada:  </label>
    	<input type="text" id="qtd" name="qtd" size="2" min="1" 
           placeholder="Ex: 3" required><br><br>
		
            <h2>Tudo certinho?</h2>
            <div style="text-align: center;">
            <input type="submit" value="Enviar formulário"  style="margin-right: 10px;">  
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Apagar tudo"> 
            </div>
	</form>
</body>
</html>
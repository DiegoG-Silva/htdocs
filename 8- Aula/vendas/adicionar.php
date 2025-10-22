<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adicionar.php">
		Data da Venda (AAAA-MM-DD): <input type="text" name="data_venda" maxlength="10" placeholder="ex: 2025-01-31">
		<br/><br/>
		ID do Cliente: <input type="text" name="idcli" maxlength="11" placeholder="digite o ID do cliente">	
		<br/><br/>	
		Produto: <input type="text" name="produto" maxlength="50" placeholder="digite o nome do produto">
		<br/><br/>	
		Quantidade: <input type="text" name="quantidade" maxlength="11" placeholder="digite a quantidade">
		<br/><br/>	
		Valor Total: <input type="text" name="valortotal" maxlength="10" placeholder="digite o valor total">
		<br/><br/>		
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	$data_venda=htmlentities($_POST["data_venda"]);	
	$idcli=htmlentities($_POST["idcli"]);
	$produto=htmlentities($_POST["produto"]);
	$quantidade=htmlentities($_POST["quantidade"]);
	$valortotal=htmlentities($_POST["valortotal"]);

	// gravando dados
	$mysqli->query("insert into vendas values('', '$data_venda', '$idcli', '$produto', '$quantidade', '$valortotal')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>
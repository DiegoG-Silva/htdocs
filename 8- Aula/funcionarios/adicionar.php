<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adicionar.php">
		Equipamento: <input type="text" name="equipamento" maxlength="60" placeholder="digite o equipamento">
		<br/><br/>
		Localização: <input type="text" name="localizacao" maxlength="50" placeholder="digite a localização">	
		<br/><br/>	
		Custo: <input type="decimal" name="custo" maxlength="11" placeholder="digite o custo">
		<br/><br/>	
		Marca/Modelo: <input type="text" name="marcamodelo" maxlength="20" placeholder="digite a marca/modelo">
		<br/><br/>			
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	//$nome=$_POST["nome"];
	$equipamento=htmlentities($_POST["equipamento"]);	
	$localizacao=htmlentities($_POST["localizacao"]);
	$custo=htmlentities($_POST["custo"]);
	$marcamodelo=htmlentities($_POST["marcamodelo"]);

	// gravando dados
	$mysqli->query("insert into clientes values('', '$equipamento', '$localizacao', '$custo', '$marcamodelo')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>
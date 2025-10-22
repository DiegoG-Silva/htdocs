<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adicionar.php">
		Cultura: <input type="text" name="cultura" maxlength="60" placeholder="digite a cultura">
		<br/><br/>
		Variedade: <input type="text" name="variedade" maxlength="60" placeholder="digite a variedade">	
		<br/><br/>	
		Ciclo: <input type="text" name="ciclo" maxlength="20" placeholder="digite o ciclo">
		<br/><br/>	
		Colheita: <input type="text" name="colheita" maxlength="20" placeholder="digite a colheita">
		<br/><br/>			
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	//$nome=$_POST["nome"];
	$cultura=htmlentities($_POST["cultura"]);	
	$variedade=htmlentities($_POST["variedade"]);
	$ciclo=htmlentities($_POST["ciclo"]);
	$colheita=htmlentities($_POST["colheita"]);

	// gravando dados
	$mysqli->query("insert into clientes values('', '$cultura', '$variedade', '$ciclo', '$colheita')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>
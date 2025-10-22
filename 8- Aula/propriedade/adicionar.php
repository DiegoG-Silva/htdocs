<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adicionar.php">
		Nome da Propriedade: <input type="text" name="propriedade" maxlength="60" placeholder="digite a propriedade">
		<br/><br/>
		Proprietário: <input type="text" name="proprietario" maxlength="60" placeholder="digite o proprietário">	
		<br/><br/>	
		Área (ha): <input type="text" name="area" maxlength="6" placeholder="digite a área">
		<br/><br/>	
		Colheita Prevista: <input type="text" name="colheita" maxlength="60" placeholder="digite a colheita">
		<br/><br/>		
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	$propriedade=htmlentities($_POST["propriedade"]);	
	$proprietario=htmlentities($_POST["proprietario"]);
	$area=htmlentities($_POST["area"]);
	$colheita=htmlentities($_POST["colheita"]);

	// gravando dados
	$mysqli->query("insert into propriedade values('', '$propriedade', '$proprietario', '$area', '$colheita')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>
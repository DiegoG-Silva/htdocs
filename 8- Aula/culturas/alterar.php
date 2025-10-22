<?php 
	require("conecta.php");
	$cpfcli="";
	$nomecli=""; 
	// GET - leitura - parametro idcli passado pela url
	if(isset($_GET["alterar"])){
		$idcultura = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from cultura where idcultura = '$idcultura'");
		$tabela=$query->fetch_assoc();
		$cultura=$tabela["cultura"];		
		$variedade=$tabela["variedade"];
		$ciclo=$tabela["ciclo"];
		$colheita=$tabela["colheita"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="alterar.php">
		<input type="hidden" name="idcultura" value="<?php echo $idcultura ?>">
		cultura: <input type="text" name="cultura" value="<?php echo $cultura ?>">
		<br/><br/>			
		variedade: <input type="text" name="variedade" value="<?php echo $variedade ?>">
		<br/><br/>			
		ciclo: <input type="text" name="ciclo" value="<?php echo $ciclo ?>">
		<br/><br/>			
		colheita: <input type="text" name="colheita" value="<?php echo $colheita ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="index.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idcultura   = htmlentities($_POST["idcultura"]);
		$cultura  = htmlentities($_POST["cultura"]);
		$variedade = htmlentities($_POST["variedade"]);
		$ciclo = htmlentities($_POST["ciclo"]);
		$colheita = htmlentities($_POST["colheita"]);


		$mysqli->query("update culturas set cultura = '$cultura', variedade='$variedade', ciclo='$ciclo', colheita='$colheita' where idcultura = '$idcultura'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>
<?php 
	require("../conecta.php"); // Presumindo que 'conecta.php' está um nível acima da pasta atual
	$idprop="";
	$propriedade=""; 
	$proprietario="";
	$area="";
	$colheita="";

	// GET - leitura - parametro idprop passado pela url
	if(isset($_GET["alterar"])){
		$idprop = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from propriedade where idprop = '$idprop'");
		$tabela=$query->fetch_assoc();
		$propriedade=$tabela["propriedade"];		
		$proprietario=$tabela["proprietario"];
		$area=$tabela["area"];
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
		<input type="hidden" name="idprop" value="<?php echo $idprop ?>">
		Propriedade: <input type="text" name="propriedade" value="<?php echo $propriedade ?>">
		<br/><br/>			
		Proprietário: <input type="text" name="proprietario" value="<?php echo $proprietario ?>">
		<br/><br/>			
		Área: <input type="text" name="area" value="<?php echo $area ?>">
		<br/><br/>			
		Colheita: <input type="text" name="colheita" value="<?php echo $colheita ?>">
		<br/><br/>			
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="index.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		require("../conecta.php"); // Presumindo que 'conecta.php' está um nível acima da pasta atual
		$idprop = htmlentities($_POST["idprop"]);
		$propriedade   = htmlentities($_POST["propriedade"]);
		$proprietario = htmlentities($_POST["proprietario"]);
		$area     = htmlentities($_POST["area"]);
		$colheita  = htmlentities($_POST["colheita"]);

		$mysqli->query("update propriedade set propriedade = '$propriedade', proprietario='$proprietario', area='$area', colheita='$colheita' where idprop = '$idprop'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>
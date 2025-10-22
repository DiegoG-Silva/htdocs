<?php 
	require("conecta.php");
	$cpfcli="";
	$nomecli=""; 
	// GET - leitura - parametro idcli passado pela url
	if(isset($_GET["alterar"])){
		$idequipe = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from cultura where idequipe = '$idequipe'");
		$tabela=$query->fetch_assoc();
		$equipamento=$tabela["equipamento"];		
		$localizacao=$tabela["localizacao"];
		$custo=$tabela["custo"];
		$marcamodelo=$tabela["marcamodelo"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="alterar.php">
		<input type="hidden" name="idequipe" value="<?php echo $idequipe ?>">
		equipamento: <input type="text" name="equipamento" value="<?php echo $equipamento ?>">
		<br/><br/>			
		localização: <input type="text" name="localizacao" value="<?php echo $localizacao ?>">
		<br/><br/>			
		custo: <input type="decimal" name="custo" value="<?php echo $custo ?>">
		<br/><br/>			
		marca/modelo: <input type="text" name="marcamodelo" value="<?php echo $marcamodelo ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="index.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idequipe   = htmlentities($_POST["idequipe"]);
		$equipamento  = htmlentities($_POST["equipamento"]);
		$localizacao = htmlentities($_POST["localizacao"]);
		$custo = htmlentities($_POST["custo"]);
		$marcamodelo = htmlentities($_POST["marcamodelo"]);

		$mysqli->query("update equipamentos set equipamento = '$equipamento', localizacao='$localizacao', custo='$custo', marcamodelo='$marcamodelo' where idequipe = '$idequipe'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>
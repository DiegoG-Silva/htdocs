<?php 
	require("../conecta.php"); // Presumindo que 'conecta.php' está um nível acima da pasta atual
	$idfunc="";
	$nome=""; 
	$cargo="";
	$salario="";

	// GET - leitura - parametro idfunc passado pela url
	if(isset($_GET["alterar"])){
		$idfunc = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from funcionarios where idfunc = '$idfunc'");
		$tabela=$query->fetch_assoc();
		$nome=$tabela["nome"];		
		$cargo=$tabela["cargo"];
		$salario=$tabela["salario"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="alterar.php">
		<input type="hidden" name="idfunc" value="<?php echo $idfunc ?>">
		Nome: <input type="text" name="nome" value="<?php echo $nome ?>">
		<br/><br/>			
		Cargo: <input type="text" name="cargo" value="<?php echo $cargo ?>">
		<br/><br/>			
		Salário: <input type="text" name="salario" value="<?php echo $salario ?>">
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
		$idfunc = htmlentities($_POST["idfunc"]);
		$nome   = htmlentities($_POST["nome"]);
		$cargo  = htmlentities($_POST["cargo"]);
		$salario= htmlentities($_POST["salario"]);

		$mysqli->query("update funcionarios set nome = '$nome', cargo='$cargo', salario='$salario' where idfunc = '$idfunc'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>
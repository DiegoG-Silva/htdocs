<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adicionar.php">
		Nome do funcionário: <input type="text" name="nome" maxlength="50" placeholder="digite o nome">
		<br/><br/>
		Cargo do funcionário: <input type="text" name="cargo" maxlength="30" placeholder="digite o cargo">	
		<br/><br/>	
		Salário: <input type="text" name="salario" maxlength="10" placeholder="digite o salário">
		<br/><br/>		
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	// O arquivo 'conecta.php' deve estar no mesmo nível ou no caminho correto
	require("../conecta.php"); // Presumindo que 'conecta.php' está um nível acima da pasta atual

	$nome=htmlentities($_POST["nome"]);
	$cargo=htmlentities($_POST["cargo"]);	
	$salario=htmlentities($_POST["salario"]);

	// gravando dados
	$mysqli->query("insert into funcionarios values('', '$nome', '$cargo', '$salario')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	// GET - leitura - parametro idfunc passado pela url
	if(isset($_GET["excluir"])){

		$idfunc = htmlentities($_GET["excluir"]);
		require("../conecta.php"); // Presumindo que 'conecta.php' está um nível acima da pasta atual
		$mysqli->query("delete from funcionarios where idfunc = '$idfunc'");
		echo $mysqli->error;
		if ($mysqli->error==""){
			echo "Excluido com Sucesso<br />";
			echo "<a href='index.php'>Voltar</a>";
		}
	}
	?>
</body>
</html>
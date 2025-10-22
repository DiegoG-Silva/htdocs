<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesquisar.php">
		Nome da Propriedade: <input type="text" name="propriedade" maxlength="60" placeholder="digite a propriedade">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("../conecta.php"); // Presumindo que 'conecta.php' está um nível acima da pasta atual
		$propriedade=htmlentities($_POST["propriedade"]);

			// pesquisando dados
		$query = $mysqli->query("select * from propriedade where propriedade like '%$propriedade%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='600'>
		<tr>
		<th>ID</th>
		<th>Propriedade</th>
		<th>Proprietário</th>
		<th>Área</th>
		<th>Colheita</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idprop]</td>
			<td align='center'>$tabela[propriedade]</td>
			<td align='center'>$tabela[proprietario]</td>
			<td align='center'>$tabela[area]</td>
			<td align='center'>$tabela[colheita]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='index.php'> Voltar</a>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesquisar.php">
		Nome do Cliente: <input type="text" name="cultura" maxlength="40" placeholder="digite o nome da cultura">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("conecta.php");
		$cultura=htmlentities($_POST["cultura"]);

			// pesquisando dados
		$query = $mysqli->query("select * from cultura where cultura like '%$cultura%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
			<th>Id</th>
			<th>Cultura</th>
			<th>Variedade</th>
			<th>Ciclo</th>
			<th>Colheita</th>
			<th>Ação</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr>
				<td align='center'>$tabela[idcultura]</td>
				<td align='center'>$tabela[cultura]</td>
				<td align='center'>$tabela[variedade]</td>
				<td align='center'>$tabela[ciclo]</td>
				<td align='center'>$tabela[colheita]</td>
				<td width='120'>
			";
		}
		echo "</table>";
	}
	?>
	<a href='index.php'> Voltar</a>
</body>
</html>
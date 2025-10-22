<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesquisar.php">
		Equipamento: <input type="text" name="equipamento" maxlength="60" placeholder="digite o nome do equipamento">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("conecta.php");
		$equipamento=htmlentities($_POST["equipamentos"]);

			// pesquisando dados
		$query = $mysqli->query("select * from equipamentos where equipamento like '%$equipamento%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
			<th>Id</th>
			<th>Equipamento</th>
			<th>Localização</th>
			<th>Custo</th>
			<th>Marca/Modelo</th>
			<th>Ação</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idequipe]</td>
			<td align='center'>$tabela[equipamento]</td>
			<td align='center'>$tabela[localizacao]</td>
			<td align='center'>$tabela[custo]</td>
			<td align='center'>$tabela[marcamodelo]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='index.php'> Voltar</a>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesquisar.php">
		Nome do Produto: <input type="text" name="produto" maxlength="50" placeholder="digite o nome do produto">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("../conecta.php"); // Presumindo que 'conecta.php' está um nível acima da pasta atual
		$produto=htmlentities($_POST["produto"]);

			// pesquisando dados
		$query = $mysqli->query("select * from vendas where produto like '%$produto%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='600'>
		<tr>
		<th>ID Venda</th>
		<th>Data</th>
		<th>ID Cliente</th>
		<th>Produto</th>
		<th>Qtd</th>
		<th>Valor Total</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idvenda]</td>
			<td align='center'>$tabela[data_venda]</td>
			<td align='center'>$tabela[idcli]</td>
			<td align='center'>$tabela[produto]</td>
			<td align='center'>$tabela[quantidade]</td>
			<td align='center'>$tabela[valortotal]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='index.php'> Voltar</a>
</body>
</html>
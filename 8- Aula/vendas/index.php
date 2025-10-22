<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Registro de Vendas</h2>
	<a href="adicionar.php"><button>Adicionar</button></a>
	<a href="pesquisar.php"><button>Pesquisar</button></a>
	<br />
	<table border="1" width="900">
		<tr>
			<th>Id Venda</th>
			<th>Data</th>
			<th>ID Cliente</th>
			<th>Produto</th>
			<th>Qtd</th>
			<th>Valor Total</th>
			<th>Ação</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("../conecta.php"); // Presumindo que 'conecta.php' está um nível acima da pasta atual
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from vendas");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idvenda]</td>
				<td align='center'>$tabela[data_venda]</td>
				<td align='center'>$tabela[idcli]</td>
				<td align='center'>$tabela[produto]</td>
				<td align='center'>$tabela[quantidade]</td>
				<td align='center'>$tabela[valortotal]</td>
				<td width='120'>
					<a href='excluir.php?excluir=$tabela[idvenda]'>[excluir]</a>
					<a href='alterar.php?alterar=$tabela[idvenda]'>[alterar]</a>
				</td>
				</tr>
			";}
		?>
	</table>
</body>
</html>
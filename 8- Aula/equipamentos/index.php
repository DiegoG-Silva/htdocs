<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Cadastro de Equipamentos</h2>
	<a href="adicionar.php"><button>Adicionar</button></a>
	<a href="pesquisar.php"><button>Pesquisar</button></a>
	<br />
	<table border="1" width="600">
		<tr>
			<th>Id</th>
			<th>Equipamento</th>
			<th>Localização</th>
			<th>Custo</th>
			<th>Marca/Modelo</th>
			<th>Ação</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("conecta.php");
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from cultura");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idcultura]</td>
				<td align='center'>$tabela[cultura]</td>
				<td align='center'>$tabela[variedade]</td>
				<td align='center'>$tabela[ciclo]</td>
				<td align='center'>$tabela[colheita]</td>
				<td width='120'><a href='excluir.php?excluir=$tabela[idcultura]'>[excluir]</a>
				<a href='alterar.php?alterar=$tabela[idcultura]'>[alterar]</a></td>
				</tr>
			";}
		?>
	</table>
</body>
</html>
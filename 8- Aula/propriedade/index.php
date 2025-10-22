<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Cadastro de Propriedades</h2>
	<a href="adicionar.php"><button>Adicionar</button></a>
	<a href="pesquisar.php"><button>Pesquisar</button></a>
	<br />
	<table border="1" width="800">
		<tr>
			<th>Id</th>
			<th>Propriedade</th>
			<th>Proprietário</th>
			<th>Área</th>
			<th>Colheita</th>
			<th>Ação</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("../conecta.php"); // Presumindo que 'conecta.php' está um nível acima da pasta atual
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from propriedade");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idprop]</td>
				<td align='center'>$tabela[propriedade]</td>
				<td align='center'>$tabela[proprietario]</td>
				<td align='center'>$tabela[area]</td>
				<td align='center'>$tabela[colheita]</td>
				<td width='120'>
					<a href='excluir.php?excluir=$tabela[idprop]'>[excluir]</a>
					<a href='alterar.php?alterar=$tabela[idprop]'>[alterar]</a>
				</td>
				</tr>
			";}
		?>
	</table>
</body>
</html>
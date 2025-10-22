<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adicionar.php">
		Nome do cliente: <input type="text" name="nome" maxlength="50" placeholder="digite o nome">
		<br/><br/>
		CPF/CNPJ do cliente: <input type="text" name="cpf_cnpj" maxlength="20" placeholder="digite o cpf/cnpj">	
		<br/><br/>	
		Telefone: <input type="text" name="telefone" maxlength="20" placeholder="digite o telefone">
		<br/><br/>	
		EMail: <input type="text" name="email" maxlength="50" placeholder="digite o email">
		<br/><br/>	
		Cidade: <input type="text" name="cidade" maxlength="30" placeholder="digite a cidade">
		<br/><br/>		
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	//$nome=$_POST["nome"];
	$cpf_cnpj=htmlentities($_POST["cpf_cnpj"]);	
	$nome=htmlentities($_POST["nome"]);
	$telefone=htmlentities($_POST["telefone"]);
	$email=htmlentities($_POST["email"]);
	$cidade=htmlentities($_POST["cidade"]);

	// gravando dados
	$mysqli->query("insert into clientes values('', '$cpf_cnpj', '$nome', '$telefone', '$email', '$cidade')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='index.php'> Voltar</a>";
	}

}
?>
<?php 
	require("conecta.php");
	$cpfcli="";
	$nomecli=""; 
	// GET - leitura - parametro idcli passado pela url
	if(isset($_GET["alterar"])){
		$idcli = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from clientes where idcli = '$idcli'");
		$tabela=$query->fetch_assoc();
		$cpf_cnpj=$tabela["cpf_cnpj"];		
		$nome=$tabela["nome"];
		$telefone=$tabela["telefone"];
		$email=$tabela["email"];
		$cidade=$tabela["cidade"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="alterar.php">
		<input type="hidden" name="idcli" value="<?php echo $idcli ?>">
		cpf: <input type="text" name="cpf_cnpj" value="<?php echo $cpf_cnpj ?>">
		<br/><br/>			
		nome: <input type="text" name="nome" value="<?php echo $nome ?>">
		<br/><br/>			
		telefone: <input type="text" name="telefone" value="<?php echo $telefone ?>">
		<br/><br/>			
		email: <input type="text" name="email" value="<?php echo $email ?>">
		<br/><br/>			
		cidade: <input type="text" name="cidade" value="<?php echo $cidade ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="index.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idcli   = htmlentities($_POST["idcli"]);
		$cpfcli  = htmlentities($_POST["cpfcli"]);
		$nomecli = htmlentities($_POST["nomecli"]);

		$mysqli->query("update clientes set cpf_cnpj = '$cpf_cnpj', nome='$nome', telefone='$telefone', email='$email', cidade='$cidade' where idcli = '$idcli'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>
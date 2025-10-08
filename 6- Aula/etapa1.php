<?php
session_start();
$erro_nome = "";
$erro_sexo = "";
$erro_cpf = "";
$erro_cep = "";
$erro_endereco = "";
$erro_cidade = "";
$erro_estado = "";
$erro_telefone = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {
	$_SESSION["nome"]  = $_POST["nome"];
	$_SESSION["cpf"] = $_POST["cpf"];
	$_SESSION["cep"] = $_POST["cep"];
	$_SESSION["endereco"] = $_POST["endereco"];
	$_SESSION["cidade"] = $_POST["cidade"];
	$_SESSION["estado"] = $_POST["estado"];
	$_SESSION["telefone"] = $_POST["telefone"];
	
	if ($_SESSION["nome"] == "") {
		$erro_nome = "<span style='color:red'>Preencha o nome</span>";
		$erro_validacao ++;
	} 

	if (isset($_POST["sexo"])) {
		$_SESSION["sexo"] = $_POST["sexo"];
	} else {
		$erro_validacao++;
		$erro_sexo = '<span style="color:red">Selecione uma das opções</span>';
	}
		
	if ($_SESSION["cpf"] == "") {
		$erro_cpf = "<span style='color:red'>Preencha o  CPF</span>";
		$erro_validacao ++;
	}
		
	if ($_SESSION["cep"] == "") {
		$erro_cep = "<span style='color:red'>Coloque o seu Cep</span>";
		$erro_validacao ++;
	}

	if ($_SESSION["endereco"] == "") {
		$erro_endereco = "<span style='color:red'>Informe seu Endereço </span>";
		$erro_validacao ++;
	}

	if ($_SESSION["cidade"] == "") {
		$erro_cidade = "<span style='color:red'>Informe sua Cidade </span>";
		$erro_validacao ++;
	}

	if ($_SESSION["estado"] == "") {
		$erro_estado = "<span style='color:red'>Informe o seu Estado</span>";
		$erro_validacao ++;
	}

	if ($_SESSION["telefone"] == "") {
		$erro_telefone = "<span style='color:red'>Informe o seu Telefone/Celular</span>";
		$erro_validacao ++;
	}

	if ($erro_validacao == 0) {
		Header("location:etapa2.php");
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> 📖 Livraria 📖</title>
</head>
<body>
<div class="container">
	<h2>📖 Cadastro da Livraria 📖</h2>
	<form method="POST" action="etapa1.php" class="signup-form">
		Nome:  <input type="text" name="nome" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["nome"])) echo $_SESSION["nome"] ?>">
		<?php echo $erro_nome ?> 
		<br/><br/>

		Email: <input type="text" name="email" placeholder="jorginho@gmail.com" size="60" maxlength="50" 
		value="<?php if (isset($_SESSION["email"])) echo $_SESSION["email"] ?>">
		<br/><br/>

		Telefone:  <input type="text" name="telefone" placeholder="(00)90000-0000" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["telefone"])) echo $_SESSION["telefone"] ?>">
		<?php echo $erro_telefone ?> 
		<br/><br/>

		Cpf:  <input type="text" name="cpf" placeholder="000.000.000-00" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["cpf"])) echo $_SESSION["cpf"] ?>">
		<?php echo $erro_cpf ?> 
		<br/><br/>

		Cidade:  <input type="text" name="cidade" placeholder="Bauru" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["cidade"])) echo $_SESSION["cidade"] ?>">
		<?php echo $erro_cidade ?> 
		<br/><br/>

		Estado:  <input type="text" name="estado" placeholder="Sp" size="60" maxlength="50" minlength="2"
		value="<?php if (isset($_SESSION["estado"])) echo $_SESSION["estado"] ?>">
		<?php echo $erro_estado ?> 
		<br/><br/>

		Endereço:  <input type="text" name="endereco" placeholder="Rua Jorginho" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["endereco"])) echo $_SESSION["endereco"] ?>">
		<?php echo $erro_endereco ?> 
		<br/><br/>

		Cep:  <input type="text" name="cep" placeholder="00000-00" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["cep"])) echo $_SESSION["cep"] ?>">
		<?php echo $erro_cep ?> 
		<br/><br/>

		Sexo:
		<br/>
		<input type="radio" name="sexo" value="1" <?php if ((isset($_SESSION["sexo"])) AND ($_SESSION["sexo"] == "1")) echo 'checked="true"' ?> >Masculino 
		<input type="radio" name="sexo" value="2" <?php if ((isset($_SESSION["sexo"])) AND ($_SESSION["sexo"] == "2")) echo 'checked="true"' ?> >Feminino
		<?php echo $erro_sexo ?> 
		<br/><br/>
		 
		<input type="submit" value="Prosseguir" name="botao">
	</form>
	<br/>
	<a href="../index.php"><button>Voltar</button></a>
</div>
</body>
</html>
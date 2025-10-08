<?php
session_start();
$erro_livro1 = "";
$erro_livro2 = "";
$erro_livro3 = "";
$erro_quantidade1 = "";
$erro_quantidade2 = "";
$erro_quantidade3 = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {
	$_SESSION["livro1"]  = $_POST["livro1"] ?? '';
	$_SESSION["qtdade1"] = $_POST["qtdade1"] ?? '';
	$_SESSION["qtdade2"] = $_POST["qtdade2"] ?? '';
	$_SESSION["qtdade3"] = $_POST["qtdade3"] ?? '';
	
	if (isset($_POST["livro2"])) {
		$_SESSION["livro2"] = $_POST["livro2"];
	} else {
		$erro_validacao++;
		$erro_livro2 = '<span style="color:red">Selecione uma Escolha/Livro</span>';
	}

	if (isset($_POST["livro3"])) {
		$_SESSION["livro3"] = $_POST["livro3"];
	} else {
		// Se nenhum livro de fantasia for selecionado, use um valor padrão
		$_SESSION["livro3"] = ['1']; 
	}
	
	// Qtd Livro 1
	if ($_SESSION["qtdade1"] < 1) {
		$erro_quantidade1 = "<span style='color:red'>Preencher Quantidade</span>";
		$erro_validacao ++;
	} elseif ($_SESSION["qtdade1"] > 4) {
		$erro_quantidade1 = "<span style='color:red'>Limite de Venda excedido</span>";
		$erro_validacao ++;
	}

	// Qtd Produto 2
	if ($_SESSION["qtdade2"] < 1 && $_SESSION["livro2"] != "1") {
		$erro_quantidade2 = "<span style='color:red'>Preencher Quantidade</span>";
		$erro_validacao ++;
	} elseif ($_SESSION["qtdade2"] > 4) {
		$erro_quantidade2 = "<span style='color:red'>Limite de Venda excedido</span>";
		$erro_validacao ++;
	}

	// Qtd Produto 3
	if ($_SESSION["qtdade3"] < 1 && !in_array('1', $_SESSION["livro3"])) {
		$erro_quantidade3 = "<span style='color:red'>Preencher Quantidade</span>";
		$erro_validacao ++;
	} elseif ($_SESSION["qtdade3"] > 2) {
		$erro_quantidade3 = "<span style='color:red'>Limite de Venda excedido</span>";
		$erro_validacao ++;
	}

	// Se 'Nenhum Produto' for selecionado, desconsidera as outras opções
	if (in_array("1", $_SESSION["livro3"]) && count($_SESSION["livro3"]) > 1) {
		$_SESSION["livro3"] = ["1"];
	}

	if ($erro_validacao == 0) {
		Header("location:etapa3.php");
		exit;
	}
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> 📖 Livraria 📖 </title>
</head>
<body>
	<div class="container">
	<h2> 📖 Compra dos Livros 📖 </h2>
	<form method="POST" action="etapa2.php">
		<h2>Livros Educacional:</h2>
		<select name="livro1">
		<option value=""> Nenhum Livro</option>
			<option value="1" <?php if((isset($_SESSION["livro1"])) AND ($_SESSION["livro1"] == "1")) echo 'selected' ?>> Ciência Da Computação - R$ 399,00 </option> 
			<option value="2" <?php if((isset($_SESSION["livro1"])) AND ($_SESSION["livro1"] == "2")) echo 'selected' ?>> Medicina -  R$ 499,00 </option> 
			<option value="3" <?php if((isset($_SESSION["livro1"])) AND ($_SESSION["livro1"] == "3")) echo 'selected' ?>> Direito - R$ 349,00 </option>
			<option value="4" <?php if((isset($_SESSION["livro1"])) AND ($_SESSION["livro1"] == "4")) echo 'selected' ?>> Engenharia Civil - R$ 249,00 </option>
		</select>
		<?php echo $erro_livro1 ?>
		<br/>
		Quantidade: 
		<input type="text" name="qtdade1" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["qtdade1"])) echo $_SESSION["qtdade1"] ?>" />
		<?php echo $erro_quantidade1 ?>

		<br/><br/>

		<h2>Quadrinhos:</h2>
		<input type="radio" name="livro2" value="1" <?php if ((isset($_SESSION["livro2"])) AND ($_SESSION["livro2"] == "1")) echo 'checked' ?> >Nenhum Quadrinho <br/>
		<input type="radio" name="livro2" value="2" <?php if ((isset($_SESSION["livro2"])) AND ($_SESSION["livro2"] == "2")) echo 'checked' ?> >Batman: A Piada Mortal - R$ 399,00 <br/>
		<input type="radio" name="livro2" value="3" <?php if ((isset($_SESSION["livro2"])) AND ($_SESSION["livro2"] == "3")) echo 'checked' ?> >Sandman - R$ 349,00 <br/>
		<input type="radio" name="livro2" value="4" <?php if ((isset($_SESSION["livro2"])) AND ($_SESSION["livro2"] == "4")) echo 'checked' ?> >Watchmen - R$ 249,00 <br/>
		<input type="radio" name="livro2" value="5" <?php if ((isset($_SESSION["livro2"])) AND ($_SESSION["livro2"] == "5")) echo 'checked' ?> >Akira - R$ 299,00 <br/>
		<?php echo $erro_livro2 ?> 

		<br/>
		Quantidade: 
		<input type="text" name="qtdade2" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["qtdade2"])) echo $_SESSION["qtdade2"] ?>" />
		<?php echo $erro_quantidade2 ?>
		
		<br/><br/>

		<h2>Livros Fantasia:</h2>
		<input type="checkbox" name="livro3[]" value="1" <?php if ((isset($_SESSION["livro3"])) AND in_array("1", $_SESSION["livro3"])) echo 'checked' ?> >Nenhum Produto <br/>
		<input type="checkbox" name="livro3[]" value="2" <?php if ((isset($_SESSION["livro3"])) AND in_array("2", $_SESSION["livro3"])) echo 'checked' ?> >Senhor dos Anéis (BOX) - R$ 900,00 <br/>
		<input type="checkbox" name="livro3[]" value="3" <?php if ((isset($_SESSION["livro3"])) AND in_array("3", $_SESSION["livro3"])) echo 'checked' ?> >O Hobbit - R$ 200,00 <br/>
		<input type="checkbox" name="livro3[]" value="4" <?php if ((isset($_SESSION["livro3"])) AND in_array("4", $_SESSION["livro3"])) echo 'checked' ?> >Harry Potter (BOX) - R$ 700,00 <br/>
		<input type="checkbox" name="livro3[]" value="5" <?php if ((isset($_SESSION["livro3"])) AND in_array("5", $_SESSION["livro3"])) echo 'checked' ?> >As Crônicas de Nárnia - R$ 199,00 <br/>
		<?php echo $erro_livro3 ?> 

		<br/>
		Quantidade: 
		<input type="text" name="qtdade3" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["qtdade3"])) echo $_SESSION["qtdade3"] ?>" />
		<?php echo $erro_quantidade3 ?>

		<br/> <br/>

		<input type="submit" value="Prosseguir" name="botao"> <br/> <br/>
	</form>
	<a href="etapa1.php"><button>Voltar</button></a>
</div>
</body>
</html>
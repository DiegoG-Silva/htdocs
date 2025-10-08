<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Resultado do Pedido</title>
	<link rel="stylesheet" href="style.css">	
</head>
<body>
	<div class="container">
		<h1>Resumo do Pedido</h1>
	<div class="dados">
<?php
	//Dados
	//Char's
		$nome        = htmlspecialchars($_POST["nome"] ?? '');
		$cpf         = htmlspecialchars($_POST["cpf"] ?? '');
		$endereco    = htmlspecialchars($_POST["endereco"] ?? '');
		$cep         = htmlspecialchars($_POST["cep"] ?? '');
		$cidade      = htmlspecialchars($_POST["cidade"] ?? '');
		$uf          = htmlspecialchars($_POST["UF"] ?? '');
		$sexo        = htmlspecialchars($_POST["sexo"] ?? '');
		$notificacoes = isset($_POST["notificacoes"]) ? "Sim" : "Não";
		$champ       = htmlspecialchars($_POST["champ"] ?? '');
		$produto     = htmlspecialchars($_POST["produto"] ?? '');
		$preco       = $_POST["preco"] ?? 0;
		$quantidade  = $_POST["qtd"] ?? 0;
		$total       = 0;

	//Numericos
		$preco       = floatval($preco);
		$quantidade  = intval($quantidade);
		$total       = $preco * $quantidade;

	//Transformando pro formato do real
		$preco       = "R$ " . number_format($preco, 2, ',', '.');
		$total       = "R$ " . number_format($total, 2, ',', '.');

	//Daods
		echo "Mostrando Dados <br/>";
		echo "Nome: $nome <br/>";
		echo "CPF: $cpf <br/>";
		echo "Endereço: $endereco <br/>";
		echo "CEP: $cep <br/>";
		echo "Cidade: $cidade <br/>";
		echo "UF: $uf <br/>";
		echo "Sexo: $sexo <br/>";
		echo "Receber notificações: $notificacoes <br/>";
		echo "Campeão preferido: $champ <br/>";
		echo "Produto: $produto <br/>";
		echo "Preço: $preco <br/>";
		echo "Quantidade: $quantidade <br/>";
		echo "Valor a pagar: $total";
	?>
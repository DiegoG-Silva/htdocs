<?php
	$produto = $_POST["produto"];
	$preco = $_POST["preco"];
	$quantidade = $_POST["quantidade"]; // NOVO: Recebe a quantidade

	require("conecta.php");

	// ATUALIZADO: Adiciona a coluna e valor da quantidade
	$mysqli->query("INSERT INTO produtos (produto, preco, quantidade) VALUES ('$produto', '$preco', '$quantidade')");
	echo $mysqli->error;

	header("Location: gerenciar_produtos.php");
?>
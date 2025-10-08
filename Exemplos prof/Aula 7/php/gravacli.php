<?php
	$cpf  =$_POST["cpf"];
	$nome =$_POST["nome"];

	echo "Dados do Cliente <br/>";
	echo "CPF:	$cpf <br/>";
	echo "Nome: $nome <br/>";

	// INSERINDO OS DADOS NO BANCO
	// conectando bando de dados com o formulário
	require("conecta_banco.php");

	// gravando dados
	$mysqli->query("INSERT INTO cadcli VALUES ('$cpf','$nome')");
	echo $mysqli->error;
?>				
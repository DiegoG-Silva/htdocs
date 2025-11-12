<?php
	// 1. Receber os dados do formulário
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];

	// 2. Incluir a conexão com o banco de dados
	require("conecta.php");

	// 3. Inserir os dados na *nova* tabela 'clientes'
	// É uma boa prática usar 'Prepared Statements' para segurança, 
	// mas vamos manter o teu padrão por enquanto.
	$mysqli->query("INSERT INTO clientes (nome, email, telefone) VALUES ('$nome','$email','$telefone')");
	
	echo $mysqli->error;

	// 4. Redirecionar de volta para a página de clientes
	header("Location: gerenciar_clientes.php");
?>
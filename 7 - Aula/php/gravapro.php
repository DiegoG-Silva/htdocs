<?php
// --- 1. RECEBENDO E TRATANDO OS DADOS ---

$id_produto     = $_POST["id_produto"] ?? ''; 
$nome_produto   = $_POST["nome_produto"] ?? '';
$descricao      = $_POST["descricao"] ?? '';
$marca          = $_POST["marca"] ?? '';
$preco          = $_POST["preco"] ?? 0.00; 
$estoque        = $_POST["estoque"] ?? 0;  
$detalhes       = $_POST["detalhes"] ?? '';


// --- 2. CONECÇÃO E INSERÇÃO ---

// Conectando banco de dados
require("conecta_banco.php");

// Grava dados na tabela
$mysqli->query("INSERT INTO produtos_estoque (
                id_produto, nome, descricao, marca, preco, estoque, detalhes
            ) VALUES (
                '$id_produto', '$nome_produto', '$descricao', '$marca', '$preco', '$estoque', '$detalhes'
            )");
            header("Location: ../index.php?status=cadastro_ok");
            exit(); // É importante usar exit() após o header()
?>
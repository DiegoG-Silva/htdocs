<?php
// --- 1. RECEBENDO E TRATANDO OS DADOS---

// Dados Principais
$id_venda           = $_POST["id_venda"] ?? ''; 
$id_cliente         = $_POST["id_cliente"] ?? ''; 
$data_venda         = $_POST["data_venda"] ?? ''; 
$forma_pagamento    = $_POST["forma_pagamento"] ?? '';
$endereco_entrega   = $_POST["endereco_entrega"] ?? '';
$forma_entrega      = $_POST["forma_entrega"] ?? '';

// Dados do Produto e Valores
$id_produto         = $_POST["id_produto"] ?? '';
// Forçando a conversão para número 
$quantidade         = (int)($_POST["quantidade"] ?? 0);
$preco_unitario     = (float)($_POST["preco_unitario"] ?? 0.00); 

// --- 2. CÁLCULOS AUTOMÁTICOS ---

$subtotal           = $quantidade * $preco_unitario;

$valor_total        = $subtotal;


// --- 3. CONEXÃO E INSERÇÃO---

// Conectando banco de dados
require("conecta_banco.php");

// Grava dados na tabela
$mysqli->query("INSERT INTO vendas (
                id_venda, id_cliente, data_venda, 
                endereco_entrega, forma_entrega, forma_pagamento, 
                id_produto, quantidade, preco_unitario, 
                subtotal, valor_total
            ) VALUES (
                '$id_venda', '$id_cliente', '$data_venda', 
                '$endereco_entrega', '$forma_entrega', '$forma_pagamento', 
                '$id_produto', '$quantidade', '$preco_unitario', 
                '$subtotal', '$valor_total'
            )");
            header("Location: ../index.php?status=cadastro_ok");
            exit(); // É importante usar exit() após o header()
?>
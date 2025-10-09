<?php
// --- 1. RECEBENDO E TRATANDO OS DADOS ---

//ID do cliente
$id_cliente     = $_POST["id_cliente"] ?? ''; 

// Campos já existentes no site anterior
$nome           = $_POST["nome"] ?? '';
$cpf            = $_POST["cpf"] ?? '';
$email          = $_POST["email"] ?? '';
$riotid         = $_POST["riotid"] ?? '';
$campeao        = $_POST["campeao"] ?? '';
$telefone       = $_POST["telefone"] ?? '';
$sexo           = $_POST["sexo"] ?? '';
$data_nasc      = $_POST["data_nasc"] ?? '';
$pais           = $_POST["pais"] ?? '';
$plataforma     = $_POST["plataforma"] ?? '';

// Campos de Endereço
$endereco       = $_POST["endereco"] ?? '';
$bairro         = $_POST["bairro"] ?? '';
$complemento    = $_POST["complemento"] ?? ''; 
$cidade         = $_POST["cidade"] ?? '';
$estado         = $_POST["estado"] ?? '';
$cep            = $_POST["cep"] ?? '';

$novidades      = isset($_POST["novidades"]) ? 1 : 0; 


// --- 2. CONECÇÃO E INSERÇÃO ---
    // Conectando banco de dados
    require("conecta_banco.php");

    // Grava dados na tabela
    $mysqli->query("INSERT INTO cadcli (
                id_cliente, nome, cpf, email, telefone, sexo, data_nasc, 
                riotid, campeao, pais, plataforma, novidades,
                endereco, bairro, complemento, cidade, estado, cep
            ) VALUES (
                '$id_cliente', '$nome', '$cpf', '$email', '$telefone', '$sexo', '$data_nasc', 
                '$riotid', '$campeao', '$pais', '$plataforma', '$novidades',
                '$endereco', '$bairro', '$complemento', '$cidade', '$estado', '$cep'
            )");
            header("Location: ../index.php?status=cadastro_ok");
            exit(); // É importante usar exit() após o header()
?>
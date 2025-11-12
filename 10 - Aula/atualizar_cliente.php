<?php
    require("conecta.php");

    $idcliente = $_POST["idcliente"];
    $nome_novo = $_POST["nome"];
    $email_novo = $_POST["email"];
    $telefone_novo = $_POST["telefone"];

    $mysqli->query("UPDATE clientes SET nome='$nome_novo', email='$email_novo', telefone='$telefone_novo' WHERE idcliente='$idcliente'");
    
    echo $mysqli->error;
    header("Location: gerenciar_clientes.php");
?>
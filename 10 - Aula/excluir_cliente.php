<?php
    require("conecta.php");

    $idcliente = $_GET["id"];

    $mysqli->query("DELETE FROM clientes WHERE idcliente='$idcliente'");
    
    echo $mysqli->error;
    header("Location: gerenciar_clientes.php");
?>
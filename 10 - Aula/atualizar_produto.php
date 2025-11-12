<?php
    require("conecta.php");

    $idprod = $_POST["idprod"];
    $produto_novo = $_POST["produto"];
    $preco_novo = $_POST["preco"];
    $quantidade_nova = $_POST["quantidade"]; // NOVO: Recebe a quantidade

    // Comando SQL de ATUALIZAÇÃO (Update)
    // ATUALIZADO: Adiciona a coluna e valor da quantidade
    $mysqli->query("UPDATE produtos SET produto='$produto_novo', preco='$preco_novo', quantidade='$quantidade_nova' WHERE idprod='$idprod'");
    
    echo $mysqli->error;
    header("Location: gerenciar_produtos.php");
?>
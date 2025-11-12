<?php
    $idprod = $_POST["idprod"];
    $quantidade_comprada = $_POST["quantidade"]; // NOVO: Recebe a quantidade a comprar
    
    require("conecta.php");

    $produto = $mysqli->query("SELECT * FROM produtos WHERE idprod='$idprod'");
    
    if ($produto->num_rows > 0) {
        $dados = $produto->fetch_assoc();
        
        // ATUALIZADO: Insere a quantidade na tabela 'compras'
        $mysqli->query("INSERT INTO compras (produto, preco, quantidade) VALUES ('$dados[produto]', '$dados[preco]', '$quantidade_comprada')");
    }

    echo $mysqli->error;
    header("Location: index.php");
?>
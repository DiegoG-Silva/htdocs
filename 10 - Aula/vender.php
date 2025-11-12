<?php
	require("conecta.php");
	$contador = $_POST["contador"];

	if ($contador > 0) {
		for ($i=0; $i < $contador; $i++) { 
			$idvenda = $_POST["idcompra_".$i];
			$produto = $_POST["produto_".$i];
			$preco = $_POST["preco_".$i];
            $quantidade = $_POST["quantidade_".$i]; // NOVO: Recebe a quantidade

            // ATUALIZADO: Inserção mais segura e com a nova coluna
            // (Note que o ID da venda está a ser reutilizado do ID da compra)
			$mysqli->query("INSERT INTO vendas (idvenda, produto, preco, quantidade) 
                            VALUES ('$idvenda', '$produto', '$preco', '$quantidade')");
		}
        
        // Limpa o carrinho
		$mysqli->query("DELETE FROM compras");
	}
    
	echo $mysqli->error; // Adicionado para depuração, caso haja erro
	header("Location: index.php");
?>
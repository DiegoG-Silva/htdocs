<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8"/>
		<title>Padaria Online - A Nossa Vitrine</title>
		<link rel="stylesheet" href="styles/style.css">
	</head>
	<body>
	<h1>🥐 Minha Padaria 🥖</h1>
    <h2>O sabor do pão quentinho feito com amor e tradição!</h2>
 
    <h2>Confira algumas delícias da nossa padaria:</h2>
    <p style="font-size: 100px; text-align: center;">🥐🥖🍞</p>
 
    <br/><br/><br/><br/><br/>
 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			
		
		<br/><br/>

		<table border="1" width="100%">
			<tr align="center">
                <td colspan="6">NOSSOS PRODUTOS</td> 
			</tr>
			<tr align="center">
				<td>Id</td>
				<td>Produto</td>
				<td>Preço</td>
				<td>Estoque</td> <td>Quantidade</td> <td>COMPRAR</td>
			</tr>
			<?php 
				require("conecta.php");
				$mostrar = $mysqli->query("SELECT * FROM produtos");
				if ($mostrar->num_rows > 0) {
					while ($row = $mostrar->fetch_assoc()) {
						echo "
							<form action='comprar.php' method='POST'>
								<tr align='center'>
									<td>".$row['idprod']."</td>
									<td>".$row['produto']."</td>
									<td> R$ ".$row['preco']."</td>
                                    
                                    <td>".$row['quantidade']." un.</td> 
                                    
                                    <td>
                                        <input type='number' name='quantidade' value='1' min='1' style='width: 50px;'>
                                    </td>

									<td><button type='submit'>Adicionar ao carrinho</button></td>
								</tr>
								<input type='hidden' name='idprod' value='".$row['idprod']."'>
							</form>
						";
					}
				} else {
                    // Colspan atualizado para 6
					echo "<tr align='center'><td colspan='6'>Nenhum Produto na vitrine ainda!</td></tr>"; 
				}
			?>
		</table>

		<br/><br/>

		<table border="1" width="100%">
			<tr align="center">
                <td colspan="5">CARRINHO DE COMPRAS</td> 
			</tr>
			<tr align="center">
				<td>Id</td>
				<td>Produto</td>
				<td>Preço Unit.</td>
				<td>Quantidade</td> <td>REMOVER</td>
			</tr>
			<?php 
				$total = 0;
				// A conexão (require) já foi feita no topo da página.
				
				$compra = $mysqli->query("SELECT * FROM compras");
				if ($compra->num_rows > 0) {
					while ($row = $compra->fetch_assoc()) {
						echo "
							<form action='remover_compras.php' method='POST'>
								<tr align='center'>
									<td>".$row['idcompra']."</td>
									<td>".$row['produto']."</td>
									<td> R$ ".$row['preco']."</td>
                                    
                                    <td>".$row['quantidade']."</td>

									<td><button type='submit'>Remover</button></td>
								</tr>
								<input type='hidden' name='idcompra' value='".$row['idcompra']."'>
							</form>
						";
                        
                        // CÁLCULO CORRETO DO TOTAL (Preço x Quantidade)
						$total += ($row['preco'] * $row['quantidade']); 
					}

					// Formatar o total para mostrar duas casas decimais
					$total_formatado = number_format($total, 2, ',', '.');
                    
                    // Colspan atualizado para 5
					echo "<tr align='center'><td colspan='5'>Total a pagar: R$".$total_formatado."</td></tr>"; 
				} else {
                    // Colspan atualizado para 5
					echo "<tr align='center'><td colspan='5'>Carrinho vazio</td></tr>"; 
				}
			?>
		</table>

		<br/><br/>

		<form action="vender.php" method="POST">
			<?php
				$compra = $mysqli->query("SELECT * FROM compras");
				$contador = 0;
				while ($row = $compra->fetch_assoc()) {
					echo "
						<input type='hidden' name='idcompra_".$contador."' value='".$row['idcompra']."'>
						<input type='hidden' name='produto_".$contador."' value='".$row['produto']."'>
						<input type='hidden' name='preco_".$contador."' value='".$row['preco']."'>
                        
                        <input type='hidden' name='quantidade_".$contador."' value='".$row['quantidade']."'>
					";
					$contador++;
				}
				echo "<input type='hidden' name='contador' value='".$contador."'>";
			?>
			<div class="finalizar">
				<button type="submit">Finalizar Compra</button>
			</div>
			<br>
			<div class="loja">
        		<h1>🍞 Menu da Padaria 🍞</h1>
        		<button type="submit"><a href="gerenciar_produtos.php">Gerenciar Produtos</a></button>
				<button type="submit"><a href="gerenciar_clientes.php"> Gerenciar Clientes</a></button>
    		</div>
			
		</form>
	</body>
</html>
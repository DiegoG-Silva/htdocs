<?php require("conecta.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Gerenciar Produtos da Padaria</title>
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h2>Gerenciar Produtos (Pão, Bolo, etc.)</h2>
    
    <form action="cadastro.php" method="POST">
        <ul>
            <li>Nome do Produto: <input type="text" name="produto" size="30" maxlength="50" required></li>
            <li>Valor: R$ <input type="number" name="preco" step="0.01" required></li>
            
            <li>Estoque Inicial: <input type="number" name="quantidade" value="0" required></li>
        </ul>
		<br>
        <button type="submit">Adicionar Produto</button>
		<br><br>
    </form>	

    <hr>

    <h2>Produtos Atuais</h2>

    <table border="1" width="100%">
        <tr align="center">
            <td>ID</td>
            <td>Produto</td>
            <td>Preço</td>
            <td>Estoque</td> <td colspan="2">Ações</td>
        </tr>
        <?php 
            // O SELECT * já busca a nova coluna 'quantidade'
            $mostrar = $mysqli->query("SELECT * FROM produtos ORDER BY idprod ASC");
            
            if ($mostrar->num_rows > 0) {
                while ($row = $mostrar->fetch_assoc()) {
                    // Formata o preço para R$ X,XX
                    $preco_formatado = number_format($row['preco'], 2, ',', '.');
                    echo "
                        <tr align='center'>
                            <td>".$row['idprod']."</td>
                            <td>".$row['produto']."</td>
                            <td> R$ ".$preco_formatado."</td>
                            
                            <td>".$row['quantidade']." un.</td>
                            
                            <td>
                                <a href='editar_produto.php?id=".$row['idprod']."'>
                                    <button>Editar</button>
                                </a>
                            </td>
                            
                            <td>
                                <a href='excluir_produto.php?id=".$row['idprod']."'>
                                    <button>Excluir</button>
                                </a>
                            </td>
                        </tr>
                    ";
                }
            } else {
                // Atualiza o colspan de 5 para 6
                echo "<tr align='center'><td colspan='6'>Nenhum Produto Registrado</td></tr>";
            }
        ?>
    </table>
    
    <br><br>
    <a href="index.php">Voltar para a Vitrine</a>
    <br>
    <a href="gerenciar_clientes.php">Gerenciar Clientes</a>
</body>
</html>
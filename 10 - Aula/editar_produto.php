<?php
    // Verifica se o ID foi passado
    if (empty($_GET['id'])) { header("Location: gerenciar_produtos.php"); exit; }
    
    $idprod = $_GET['id'];
    require("conecta.php");

    // Busca o produto específico
    $busca = $mysqli->query("SELECT * FROM produtos WHERE idprod='$idprod'");
    
    if ($busca->num_rows == 0) { header("Location: gerenciar_produtos.php"); exit; }
    $produto = $busca->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Editar Produto</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <h2>Editar Produto: <?php echo $produto['produto']; ?></h2>
    
    <form action="atualizar_produto.php" method="POST">
        
        <input type="hidden" name="idprod" value="<?php echo $produto['idprod']; ?>">
        
        <ul>
            <li>
                Nome: <input type="text" name="produto" size="30" maxlength="50" value="<?php echo $produto['produto']; ?>" required>
            </li>
            <li>
                Valor: R$ <input type="number" name="preco" step="0.01" value="<?php echo $produto['preco']; ?>" required>
            </li>
            <li>
                Estoque: <input type="number" name="quantidade" value="<?php echo $produto['quantidade']; ?>" required>
            </li>
        </ul>
        <button type="submit">Atualizar Produto</button>
    </form>	

    <br>
    <a href="gerenciar_produtos.php">Voltar ao Gerenciador</a>
</body>
</html>
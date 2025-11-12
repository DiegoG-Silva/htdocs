<?php
    $idcliente = $_GET['id'];
    require("conecta.php");
    $busca = $mysqli->query("SELECT * FROM clientes WHERE idcliente='$idcliente'");
    
    if ($busca->num_rows == 0) {
        echo "Cliente não encontrado.";
        exit;
    }
    $cliente = $busca->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Editar Cliente</title>
</head>
<body>
    <h2>Editar Cliente: <?php echo $cliente['nome']; ?></h2>
    
    <form action="atualizar_cliente.php" method="POST">
        
        <input type="hidden" name="idcliente" value="<?php echo $cliente['idcliente']; ?>">
        
        <ul>
            <li>
                Nome: <input type="text" name="nome" size="30" maxlength="100" value="<?php echo $cliente['nome']; ?>">
            </li>
            <li>
                Email: <input type="email" name="email" size="30" maxlength="100" value="<?php echo $cliente['email']; ?>">
            </li>
            <li>
                Telefone: <input type="text" name="telefone" size="20" maxlength="20" value="<?php echo $cliente['telefone']; ?>">
            </li>
        </ul>
        <button type="submit">Atualizar Cliente</button>
    </form>	

    <br>
    <a href="gerenciar_clientes.php">Voltar ao Gerenciador</a>
</body>
</html>
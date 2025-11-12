<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <title>Gerenciar Clientes da Padaria</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h2>Gerenciar Cliente</h2>
    
    <form action="processar_cliente.php" method="POST">
        <ul>
            <li>Nome: <input type="text" name="nome" size="30" maxlength="100"></li>
            <li>Email: <input type="email" name="email" size="30" maxlength="100"></li>
            <li>Telefone: <input type="text" name="telefone" size="20" maxlength="20"></li>
        </ul>
        <br>
        <button type="submit">Adicionar Cliente</button>
        <br><br>
    </form>	

    <hr>

    <h2>Clientes Atuais</h2>

    <table border="1" width="100%">
        <tr align="center">
            <td>ID</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Telefone</td>
            <td colspan="2">Ações</td>
        </tr>
        <?php 
            require("conecta.php");
            $mostrar = $mysqli->query("SELECT * FROM clientes ORDER BY nome ASC");
            
            if ($mostrar->num_rows > 0) {
                while ($row = $mostrar->fetch_assoc()) {
                    echo "
                        <tr align='center'>
                            <td>".$row['idcliente']."</td>
                            <td>".$row['nome']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['telefone']."</td>
                            
                            <td>
                                <a href='editar_cliente.php?id=".$row['idcliente']."'>
                                    <button>Editar</button>
                                </a>
                            </td>
                            
                            <td>
                                <a href='excluir_cliente.php?id=".$row['idcliente']."'>
                                    <button>Excluir</button>
                                </a>
                            </td>
                        </tr>
                    ";
                }
            } else {
                echo "<tr align='center'><td colspan='6'>Nenhum Cliente Registrado</td></tr>";
            }
        ?>
    </table>
    
    <br><br>
    <a href="index.php">Voltar para a Vitrine</a>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Venda de Animes</title>
</head>
<body>
    <header>
        <h1>Venda de Animes</h1>
    </header>
    <main>
        <section class="signup-form">
            <h2>Dados do Cliente</h2>
            <form action="gravacli.php" method="post">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="15" minlength="11" required >
                <br/><br/>
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" size="50" maxlength="50" required>
                <br/><br/>
                <h2>
                    Acrescentar os campos<br>
                    id_cliente <br>
                    telefone <br>
                    email <br>
                    endereco(rua e número) <br>
                    bairro <br>
                    complemento <br>
                    cidade <br>
                    estado <br>
                    cep<br><br>
                    OS CAMPOS PRECISAM SER VALIDADOS
                </h2>
                <br/><br/>
                <button type="submit">Próximo</button>
            </form>
        </section>
    </main>
</body>
</html>
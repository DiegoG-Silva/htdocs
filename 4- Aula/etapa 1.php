<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Etapa 1 - Dados do Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Etapa 1 - Dados do Cliente</h1>
    <form action="etapa%202.php" method="post">
        <label>Nome completo:</label>
        <input type="text" name="nome" required>

        <label>CPF:</label>
        <input type="text" name="cpf" required>

        <label>E-mail:</label>''
        <input type="email" name="email" required> <!-- pra pegar só oq tiver @ !-->

        <label>Riot ID (Nick#Tag):</label>
        <input type="text" name="riotid" required>

        <label>Campeão preferido:</label>
        <input type="text" name="campeao">

        <label class="inline">
            <input type="checkbox" name="novidades" value="1" checked>
            Quero receber novidades e promoções
        </label>

        <div class="botoes">
            <input type="submit" value="Próxima Etapa">
        </div>
    </form>
</div>
</body>
</html>

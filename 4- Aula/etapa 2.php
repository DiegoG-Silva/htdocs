<?php
$nome      = $_POST['nome'] ?? '';
$cpf       = $_POST['cpf'] ?? '';
$email     = $_POST['email'] ?? '';
$riotid    = $_POST['riotid'] ?? '';
$campeao   = $_POST['campeao'] ?? '';
$novidades = $_POST['novidades'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Etapa 2 - Escolha de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Etapa 2 - Escolha de Produtos</h1>
    <form action="etapa%203.php" method="post">
        <input type="hidden" name="nome" value="<?= htmlspecialchars($nome) ?>">
        <input type="hidden" name="cpf" value="<?= htmlspecialchars($cpf) ?>">
        <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
        <input type="hidden" name="riotid" value="<?= htmlspecialchars($riotid) ?>">
        <input type="hidden" name="campeao" value="<?= htmlspecialchars($campeao) ?>">
        <input type="hidden" name="novidades" value="<?= htmlspecialchars($novidades) ?>">

        <label>Skin de Campeão:</label>
        <select name="skin_campeao" required>
            <option value="">Selecione</option>
            <option value="1">Ahri lenda imortalizada - R$50</option>
            <option value="2">Irelia Florescer espiritual - R$45</option>
            <option value="3">Kindred Florescer Espiritual - R$60</option>
        </select>

        <label>Skin de Sentinela:</label>
        <select name="skin_sentinela">
            <option value="">Nenhuma</option>
            <option value="1">Sentinela Neon - R$15</option>
            <option value="2">Sentinela Dragão - R$20</option>
        </select>

        <label>Emote:</label>
        <select name="emote">
            <option value="">Nenhum</option>
            <option value="1">Emote GG - R$5</option>
            <option value="2">Emote Dança - R$5</option>
        </select>


        <label>Eternos:</label>
        <select name="eternos">
            <option value="">Nenhum</option>
            <option value="1">Yasuo - R$25</option>
            <option value="2">Darius - R$30</option>
            <option value="3">Lee sin - R$28</option>
        </select>

        <select name="serieeternos"> <option value="">-</option>
            <option value="1">Serie 1</option>
            <option value="2">Serie 2</option>
        </select>

        <label>Icone:</label>
        <select name="icone">
            <option value="">Nenhum</option>
            <option value="1">Poro feliz - R$5</option>
            <option value="2">Poro triste - R$7</option>
            <option value="3">Poro puto - R$15</option>
        </select>

        <div class="botoes">
            <input type="submit" value="Próxima Etapa">
        </div>
    </form>
</div>
</body>
</html> 
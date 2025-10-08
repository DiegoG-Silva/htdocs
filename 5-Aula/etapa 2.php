<?php
session_start();
// Redireciona de volta se o usuário pular a etapa 1
if (!isset($_SESSION["nome"])) {
    header("Location: etapa%201.php");
    exit;
}

$erro_skin_campeao = "";
$erro_skin_sentinela = "";
$erro_emote = "";
$erro_eternos = "";
$erro_serieeternos = "";
$erro_icone = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {
    // Coletando dados e armazenando na sessão
    $_SESSION["skin_campeao"] = $_POST["skin_campeao"] ?? '';
    $_SESSION["skin_sentinela"] = $_POST["skin_sentinela"] ?? '';
    $_SESSION["emote"] = $_POST["emote"] ?? []; // checkboxes são arrays
    $_SESSION["eternos"] = $_POST["eternos"] ?? '';
    $_SESSION["serieeternos"] = $_POST["serieeternos"] ?? '';
    $_SESSION["icone"] = $_POST["icone"] ?? '';

    // --- VALIDAÇÕES DE TODOS OS CAMPOS ---
    if (empty($_SESSION["skin_campeao"])) {
        $erro_skin_campeao = "<span style='color:red'>Selecione uma skin de campeão.</span>";
        $erro_validacao++;
    }
    
    // Validação para radio button
    if (empty($_SESSION["skin_sentinela"])) {
        $erro_skin_sentinela = "<span style='color:red'>Selecione uma skin de sentinela.</span>";
        $erro_validacao++;
    }

    // Validação para checkboxes (verifica se pelo menos um foi selecionado)
    if (empty($_SESSION["emote"])) {
        $erro_emote = "<span style='color:red'>Selecione pelo menos um emote.</span>";
        $erro_validacao++;
    }
    
    if (empty($_SESSION["eternos"])) {
        $erro_eternos = "<span style='color:red'>Selecione um eterno.</span>";
        $erro_validacao++;
    }

    if (empty($_SESSION["serieeternos"])) {
        $erro_serieeternos = "<span style='color:red'>Selecione a série dos eternos.</span>";
        $erro_validacao++;
    }

    if (empty($_SESSION["icone"])) {
        $erro_icone = "<span style='color:red'>Selecione um ícone.</span>";
        $erro_validacao++;
    }

    // Se não houver erros, redireciona para a próxima etapa
    if ($erro_validacao == 0) {
        header("Location: etapa%203.php");
        exit;
    }
}
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
    <form action="etapa%202.php" method="post">
        
        <label>Skin de Campeão:</label>
        <select name="skin_campeao">
            <option value="">Selecione</option>
            <option value="1" <?= (($_SESSION["skin_campeao"] ?? '') == '1') ? 'selected' : '' ?>>Ahri lenda imortalizada - R$50</option>
            <option value="2" <?= (($_SESSION["skin_campeao"] ?? '') == '2') ? 'selected' : '' ?>>Irelia Florescer espiritual - R$45</option>
            <option value="3" <?= (($_SESSION["skin_campeao"] ?? '') == '3') ? 'selected' : '' ?>>Kindred Florescer Espiritual - R$60</option>
        </select>
        <?= $erro_skin_campeao ?>

        <label>Skin de Sentinela:</label>
        <div>
            <input type="radio" name="skin_sentinela" value="1" id="sentinela-neon" <?= (($_SESSION["skin_sentinela"] ?? '') == '1') ? 'checked' : '' ?>>
            <label for="sentinela-neon" class="inline">Sentinela Neon - R$15</label><br>

            <input type="radio" name="skin_sentinela" value="2" id="sentinela-dragao" <?= (($_SESSION["skin_sentinela"] ?? '') == '2') ? 'checked' : '' ?>>
            <label for="sentinela-dragao" class="inline">Sentinela Dragão - R$20</label>
        </div>
        <?= $erro_skin_sentinela ?>

        <label>Emote:</label>
        <div>
            <input type="checkbox" name="emote[]" value="1" id="emote-gg" <?= (in_array('1', (array)($_SESSION['emote'] ?? []))) ? 'checked' : '' ?>>
            <label for="emote-gg" class="inline">Emote GG - R$5</label><br>
            
            <input type="checkbox" name="emote[]" value="2" id="emote-danca" <?= (in_array('2', (array)($_SESSION['emote'] ?? []))) ? 'checked' : '' ?>>
            <label for="emote-danca" class="inline">Emote Dança - R$5</label>
        </div>
        <?= $erro_emote ?>

        <label>Eternos:</label>
        <select name="eternos">
            <option value="">Nenhum</option>
            <option value="1" <?= (($_SESSION["eternos"] ?? '') == '1') ? 'selected' : '' ?>>Yasuo - R$25</option>
            <option value="2" <?= (($_SESSION["eternos"] ?? '') == '2') ? 'selected' : '' ?>>Darius - R$30</option>
            <option value="3" <?= (($_SESSION["eternos"] ?? '') == '3') ? 'selected' : '' ?>>Lee sin - R$28</option>
        </select>
        <?= $erro_eternos ?>
        
        <label>Série dos Eternos:</label>
        <select name="serieeternos"> 
            <option value="">-</option>
            <option value="1" <?= (($_SESSION["serieeternos"] ?? '') == '1') ? 'selected' : '' ?>>Série 1</option>
            <option value="2" <?= (($_SESSION["serieeternos"] ?? '') == '2') ? 'selected' : '' ?>>Série 2</option>
        </select>
        <?= $erro_serieeternos ?>

        <label>Ícone:</label>
        <select name="icone">
            <option value="">Nenhum</option>
            <option value="1" <?= (($_SESSION["icone"] ?? '') == '1') ? 'selected' : '' ?>>Poro feliz - R$5</option>
            <option value="2" <?= (($_SESSION["icone"] ?? '') == '2') ? 'selected' : '' ?>>Poro triste - R$7</option>
            <option value="3" <?= (($_SESSION["icone"] ?? '') == '3') ? 'selected' : '' ?>>Poro puto - R$15</option>
        </select>
        <?= $erro_icone ?>

        <div class="botoes">
            <a href="etapa%201.php" class="botao">Voltar</a>
            <input type="submit" value="Próxima Etapa" name="botao">
        </div>
    </form>
</div>
</body>
</html>
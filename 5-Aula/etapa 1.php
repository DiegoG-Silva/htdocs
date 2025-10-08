<?php
session_start();
$erro_nome = "";
$erro_cpf = "";
$erro_email = "";
$erro_riotid = "";
$erro_campeao = "";
$erro_telefone = "";
$erro_sexo = "";
$erro_data_nasc = "";
$erro_pais = "";
$erro_plataforma = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {
    // Coletando dados do formulário e armazenando na sessão
    $_SESSION["nome"]       = $_POST["nome"] ?? '';
    $_SESSION["cpf"]        = $_POST["cpf"] ?? '';
    $_SESSION["email"]      = $_POST["email"] ?? '';
    $_SESSION["riotid"]     = $_POST["riotid"] ?? '';
    $_SESSION["campeao"]    = $_POST["campeao"] ?? '';
    $_SESSION["novidades"]  = $_POST["novidades"] ?? '';
    $_SESSION["telefone"]   = $_POST["telefone"] ?? '';
    $_SESSION["sexo"]       = $_POST["sexo"] ?? '';
    $_SESSION["data_nasc"]  = $_POST["data_nasc"] ?? '';
    $_SESSION["pais"]       = $_POST["pais"] ?? '';
    $_SESSION["plataforma"] = $_POST["plataforma"] ?? '';

    // --- VALIDAÇÕES DE TODOS OS CAMPOS ---
    if (empty($_SESSION["nome"])) {
        $erro_nome = "<span style='color:red'>Preencha o nome.</span>";
        $erro_validacao++;
    }

    if (empty($_SESSION["cpf"])) {
        $erro_cpf = "<span style='color:red'>Preencha o CPF.</span>";
        $erro_validacao++;
    }

    if (empty($_SESSION["email"])) {
        $erro_email = "<span style='color:red'>Preencha o e-mail.</span>";
        $erro_validacao++;
    }

    if (empty($_SESSION["riotid"])) {
        $erro_riotid = "<span style='color:red'>Preencha o Riot ID.</span>";
        $erro_validacao++;
    }
    
    if (empty($_SESSION["campeao"])) {
        $erro_campeao = "<span style='color:red'>Preencha o campeão preferido.</span>";
        $erro_validacao++;
    }

    if (empty($_SESSION["telefone"])) {
        $erro_telefone = "<span style='color:red'>Preencha o telefone.</span>";
        $erro_validacao++;
    }

    if (empty($_SESSION["sexo"])) {
        $erro_sexo = "<span style='color:red'>Selecione o sexo.</span>";
        $erro_validacao++;
    }
    
    // VALIDAÇÃO: novos campos
    if (empty($_SESSION["data_nasc"])) {
        $erro_data_nasc = "<span style='color:red'>Preencha a data de nascimento.</span>";
        $erro_validacao++;
    }

    if (empty($_SESSION["pais"])) {
        $erro_pais = "<span style='color:red'>Selecione o país.</span>";
        $erro_validacao++;
    }
    
    if (empty($_SESSION["plataforma"])) {
        $erro_plataforma = "<span style='color:red'>Selecione a plataforma.</span>";
        $erro_validacao++;
    }

    // Se não houver erros de validação, redireciona para a próxima etapa
    if ($erro_validacao == 0) {
        header("Location: etapa%202.php");
        exit;
    }
}
?>

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
    <form action="etapa%201.php" method="post">
        <label>Nome completo:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($_SESSION["nome"] ?? '') ?>">
        <?= $erro_nome ?>

        <label>CPF:</label>
        <input type="text" name="cpf" value="<?= htmlspecialchars($_SESSION["cpf"] ?? '') ?>">
        <?= $erro_cpf ?>

        <label>E-mail:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($_SESSION["email"] ?? '') ?>">
        <?= $erro_email ?>

        <label>Telefone:</label>
        <input type="tel" name="telefone" value="<?= htmlspecialchars($_SESSION["telefone"] ?? '') ?>">
        <?= $erro_telefone ?>

        <label>Sexo:</label>
        <select name="sexo">
            <option value="">Selecione</option>
            <option value="Masculino" <?= (($_SESSION["sexo"] ?? '') == 'Masculino') ? 'selected' : '' ?>>Masculino</option>
            <option value="Feminino" <?= (($_SESSION["sexo"] ?? '') == 'Feminino') ? 'selected' : '' ?>>Feminino</option>
            <option value="Outro" <?= (($_SESSION["sexo"] ?? '') == 'Outro') ? 'selected' : '' ?>>Outro</option>
        </select>
        <?= $erro_sexo ?>

        <label>Data de Nascimento:</label>
        <input type="text" name="data_nasc" value="<?= htmlspecialchars($_SESSION["data_nasc"] ?? '') ?>">
        <?= $erro_data_nasc ?>

        <label>Riot ID (Nick#Tag):</label>
        <input type="text" name="riotid" value="<?= htmlspecialchars($_SESSION["riotid"] ?? '') ?>">
        <?= $erro_riotid ?>

        <label>Campeão preferido:</label>
        <input type="text" name="campeao" value="<?= htmlspecialchars($_SESSION["campeao"] ?? '') ?>">
        <?= $erro_campeao ?>

        <label>País:</label>
        <select name="pais">
            <option value="">Selecione</option>
            <option value="Brasil" <?= (($_SESSION["pais"] ?? '') == 'Brasil') ? 'selected' : '' ?>>Brasil</option>
            <option value="Estados Unidos" <?= (($_SESSION["pais"] ?? '') == 'Estados Unidos') ? 'selected' : '' ?>>Estados Unidos</option>
            <option value="Outro" <?= (($_SESSION["pais"] ?? '') == 'Outro') ? 'selected' : '' ?>>Outro</option>
        </select>
        <?= $erro_pais ?>

        <label>Plataforma de Jogo:</label>
        <select name="plataforma">
            <option value="">Selecione</option>
            <option value="PC" <?= (($_SESSION["plataforma"] ?? '') == 'PC') ? 'selected' : '' ?>>PC</option>
            <option value="Console" <?= (($_SESSION["plataforma"] ?? '') == 'Console') ? 'selected' : '' ?>>Console</option>
            <option value="Mobile" <?= (($_SESSION["plataforma"] ?? '') == 'Mobile') ? 'selected' : '' ?>>Mobile</option>
        </select>
        <?= $erro_plataforma ?>

        <label class="inline">
            <input type="checkbox" name="novidades" value="1" <?= ((isset($_SESSION["novidades"]) AND $_SESSION["novidades"] == '1') OR !isset($_SESSION["novidades"])) ? 'checked' : '' ?>>
            Quero receber novidades e promoções
        </label>

        <div class="botoes">
            <input type="submit" value="Próxima Etapa" name="botao">
        </div>
    </form>
</div>
</body>
</html>
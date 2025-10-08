<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Etapa 1 - Dados do Cliente</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
<div class="container">
    <h1>Etapa 1 - Dados do Cliente</h1>
    <form action="gravacli.php" method="post"> 
        
        <label>ID do Cliente:</label>
        <input type="text" name="id_cliente" required> 

        <label>Nome completo:</label>
        <input type="text" name="nome" required> 

        <label>CPF:</label>
        <input type="text" name="cpf" required>
        
        <label>E-mail:</label>
        <input type="email" name="email" required>

        <label>Telefone:</label>
        <input type="tel" name="telefone" required>

        <label>Sexo:</label>
        <select name="sexo" required>
            <option value="">Selecione</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
        </select>

        <label>Data de Nascimento:</label>
        <input type="text" name="data_nasc" required> 

        <label>Riot ID (Nick#Tag):</label>
        <input type="text" name="riotid" required>

        <label>Campeão preferido:</label>
        <input type="text" name="campeao" required>

        <h2>Dados de Endereço</h2>
        
        <label>Rua e Número:</label>
        <input type="text" name="endereco" required> 

        <label>Bairro:</label>
        <input type="text" name="bairro" required> 

        <label>Complemento (Opcional):</label>
        <input type="text" name="complemento"> 

        <label>Cidade:</label>
        <input type="text" name="cidade" required> 

        <label>Estado:</label>
        <input type="text" name="estado" maxlength="2" required> 

        <label>CEP:</label>
        <input type="text" name="cep" required> 
        
        <label>País:</label>
        <select name="pais" required>
            <option value="">Selecione</option>
            <option value="Brasil">Brasil</option>
            <option value="Estados Unidos">Estados Unidos</option>
            <option value="Outro">Outro</option>
        </select>

        <label>Plataforma de Jogo:</label>
        <select name="plataforma" required>
            <option value="">Selecione</option>
            <option value="PC">PC</option>
            <option value="Console">Console</option>
            <option value="Mobile">Mobile</option>
        </select>

        <label class="inline">
            <input type="checkbox" name="novidades" value="1" checked> 
            Quero receber novidades e promoções
        </label>
        <div class="botoes">
            <a href="../index.php" class="botao">Voltar</a>
            <input type="submit" value="Cadastrar Cliente" name="botao">
        </div>
    </form>
</div>
</body>
</html>
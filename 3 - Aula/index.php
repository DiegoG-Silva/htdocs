<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Formulario</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
        <form method="POST" action="calcula.php">
            <h1>Skin verse</h1>
            <h2>Informações do cliente</h2>

            <label for="nome">Cliente:</label>
            <input type="text" id="nome" name="nome" maxlength="40" size="30" required />

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" size="15" required placeholder="Ex: 000.000.000-00"/>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" size="40" maxlength="60" required placeholder="Ex: Rua Duque de Caxias, 265" />

            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" maxlength="9" size="10" minlength="9" required placeholder="Ex: 00000-000"/>

            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" size="20" maxlength="15" />

            <label for="UF">UF:</label>
            <input type="text" id="UF" name="UF" size="2" maxlength="2" minlength="2" />

            <fieldset class="sem-borda">
                <label style="display: inline-block; margin-right: 15px; cursor: pointer;">
                    <input type="radio" id="masculino" name="sexo" value="1" required />
                    Masculino
                </label>

                <label style="display: inline-block; cursor: pointer;">
                    <input type="radio" id="feminino" name="sexo" value="2" required />
                    Feminino
                </label>
            </fieldset>

            <fieldset class="fieldset">
                <label style="display: block; cursor: pointer;">
                    <input type="checkbox" id="novas-skins" name="notificacoes[]" value="novas" checked />
                    Receber notificações sobre novas skins
                </label>
                <label style="display: block; cursor: pointer;">
                    <input type="checkbox" id="descontos" name="notificacoes[]" value="descontos" checked/>
                    Receber notificações sobre descontos da empresa
                </label>
            </fieldset>

            <label for="champ">Campeão Preferido:</label>
            <input type="text" id="champ" name="champ" size="20" />

            <h2>Informações do pedido</h2>

            <h3>Skin de campeão</h3>
            <select name="codskin">
                <option value="1">Yasuo Emissario - R$ 70,00</option>
                <option value="2">Lux Cosmos Negro - R$ 64,00</option>
                <option value="3">Tristana bombeira - R$ 32,00</option>
                <option value="4">Jhin Velho Oeste - R$ 44,00</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="qtdskin">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>

            <h3>Skin Sentinela</h3>
            <select name="codsent">
                <option value="1">-------------------</option>
                <option value="2">Poro fantasma - R$ 10,00</option>
                <option value="3">Draven Dourado - R$ 16,00</option>
                <option value="4">Star Guardian - R$ 12,00</option>
                <option value="5">Projeto - R$ 8,00</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="qtdsent">
                <option value="0">-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>

            <h3>Emotes</h3>
            <select name="codemote">
                <option value="1">-------------------</option>
                <option value="2">Joinha - R$ 100,00</option>
                <option value="3">Pinguin dab - R$ 67,00</option>
                <option value="4">Circo - R$ 85,00</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="qtdemote">
                <option value="0">-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>

            <h3>Eternos</h3>
            <select name="codeterno">
                <option value="1">-------------------</option>
                <option value="2">Yasuo - R$ 7,00</option>
                <option value="3">LeBlanc - R$ 8,00</option>
                <option value="4">Jhin - R$ 4,00</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="serieeterno">
                <option value="0">-</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <h3>Pagamento e entrega</h3>

            <fieldset class="fieldset" style="margin-bottom: 20px;">
                <label for="pgmnt">Forma de Pagamento</label>
                <select
                    id="pgmnt"
                    name="pgmnt"
                    style="width: 100%; padding: 8px; border-radius: 4px;"
                >
                    <option value="1">Cartão de Crédito</option>
                    <option value="2">PicPay</option>
                    <option value="3">PIX</option>
                    <option value="4">Boleto</option>
                </select>
            </fieldset>

            <fieldset class="fieldset" style="margin-bottom: 20px;">
                <label for="riotid">Nick da conta (RiotID):</label>
                <input type="text" id="riotid" name="riotid" maxlength="30" size="30" placeholder="Ex: Summoner123" required/>

                <label for="email-conta">Email da conta:</label>
                <input type="email" id="email-conta" name="email_conta" size="30" placeholder="exemplo@dominio.com" required/>
            </fieldset>

            <div class="botoes">
                <input type="submit" value="Enviar formulário" />
                <input type="reset" value="Apagar tudo" />
            </div>
        </form>
    </div>
</body>
</html>
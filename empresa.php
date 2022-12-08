<?php 
	include('conexao.php');
	include('protect.php');
?>

	

</head>
<body id="body">
	<main id='conteudo'>
		<div class="estilo">


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styledoc.css">
	<title>Ficha de confirmação</title>
</head>
<body id="body">
	<main id='conteudo'>
		<div class="estilo">
			<form >	
				<h3>DADOS DO ESTUDANTE</h3>
				<label>Campus:</label>
				<input type="checkbox" name="campus" value="FW" required>Frederico Westphalen
				<br>
				<label>Curso:</label>
				<input type="checkbox" name="curso" value="Tec. Agropecuaria" required>Técnico Agropecuária
				<br>
				<br>
				<h3>DADOS DA CONCEDENTE E DO REPRESENTANTE LEGAL</h3>
				<label>Nome da parte concedente da vaga:</label>
				<input type="text" name="nomeconcedente" placeholder="Ex.: Coop. Estrela" required>
				<br>
				<label>Número do CNPJ da concedente:</label>
				<input type="text" name="cnpjconcedente" placeholder="Ex.: 00.000.00/0000-00" required>
				<br>
				<label>Nome do representante legal da concedente:</label><!--Isso é o chefe?-->
				<input type="text" name="nomerepresentante" required>
				<br>
				<label>Cargo do representante legal da concedente:</label>
				<input type="text" name="cargorepresentante" placeholder="Ex.: Responsável RH" required>
				<br>
				<label>Número do CPF do representante legal da concedente:</label>
				<input type="text" name="cpfrepresentate" placeholder="Ex.: 000.000.000-00" required>
				<br>
				<label>Número de registo no conselho de fiscalização profissional:</label><!--Exemplo desse número-->
				<input type="text" name="numerocfp" required>
				<br>
				<label>Área de atuação da parte concedente:</label>
				<input type="text" name="atuacaoconcedente" required>
				<br>
				<label>Setor onde o estágio será realizado:</label>
				<input type="text" name="setorest" required><!--Selecionavel-->
				<br>
				<p>Endereço completo do local do estágio:</p>
				<br>
				<label>Rua/Avenida ou outro:</label>
				<input type="text" name="ruaendestagio" placeholder="Ex.: Rua do Comércio" required>
				<label>, nº</label>
				<input type="number" name="numeroendestagio" placeholder="Ex.: 000" required>
				<br>
				<label>Município:</label>
				<input type="text" name="munendestagio" placeholder="Ex.: Frederico Westphalen" required>
				<br>
				<label>Estado:</label>
				<input type="text" name="estadoendestagio" required>
				<label>CEP:</label>
				<input type="text" name="cependestagio" placeholder="Ex.: 98400-000" required>
				<br>
				<label>Telefone da concedente(código de área e número):</label>
				<input type="text" name="telefoneconcedente" placeholder="(00) 00000-0000" pattern="([0-9]{2}) [0-9]{5}-[0-9]{4}" required>
				<br>
				<label>E-mail da concedente</label>
				<input type="email" name="emailconcedente" required>
				<br>
				<br>
				<h3>DADOS DO SUPERVISOR DESIGNADO PELA CONCEDENTE</h3>
				<br>
				<label>Nome do supervisor do estagiário na parte concedente:</label>
				<input type="text" name="nomesupervisor" required>
				<br>
				<label>Telefone do supervisor(código de área e número):</label>
				<input type="text" name="telefonesupervisor" placeholder="(00) 00000-0000" pattern="([0-9]{2}) [0-9]{5}-[0-9]{4}" required>
				<br>
				<label>E-mail do supervisor:</label>
				<input type="email" name="emailsupervisor">
				<br>
				<br>
				<h3>DADOS DO ESTÁGIO DEFINIDOS COM A CONCEDENTE</h3>
				<br>
				<label>Início do estágio e previsão de término:</label>
				<input type="date" name="inicio" required>
				<label>a</label>
				<input type="date" name="fim" required>
				<br>
				<label>Carga horária: </label>
				<input type="time" name="horasdia" required>
				<label> horas por dia; </label>
				<input type="time" name="horassemana" required>
				<label>horas por semana.</label>
				<br>
				<label>Remunerações e benefícios concedidos pela concedente: </label>
				<br>
				<label>Auxílio estágio</label>
				<input type="radio" name="auxest" value="sim">SIM
				<input type="radio" name="auxest" value="nao">NÃO
				<?php 
					if('auxest' == 'sim') {
						?><label>R$: </label><input type="text" name="valorest" placeholder="000,00"><label>mensal</label><?php
					}
				?>
				<br><br>
				<label>Auxílio transporte</label>
				<input type="radio" name="auxtp" value="sim">SIM
				<input type="radio" name="auxtp" value="nao">NÃO
				<?php 
					if('auxtp' == 'sim') {
						?><label>R$: </label><input type="text" name="valorest" placeholder="000,00"><label>diário</label><?php
					}
				?>
				


				<br><br>
				<button type="submit" name="enviar">Solicitar Assinatura!</button>
			</form>
		</div>	
	</main>
	
</body>
</html>
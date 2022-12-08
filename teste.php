<?php 
include('protect.php');
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styledoc.css">
	<title>ARQ2</title>
</head>
<body>
	<div id="dados">
		
		<img src="img/simbolo.jpg">
		<p><strong>SERVIÇO PÚBLICO FEDERAL<br>MINISTÉRIO DA EDUCAÇÃO<br></strong>INSTITUTO FEDERAL DE EDUCAÇÃO, CIÊNCIA E TECNOLOGIA FARROUPILHA<br> 
		<br><br><br>
		<h4><strng>FICHA DE CONFIRMAÇÃO<br>ESTÁGIO CURRICULAR SUPERVISIONADO OBRIGATÓRIO
		</strng></h4>
		<br><br><br><br>
		<div class="texto">
			<h1> Da Parte do estudante! </h1>
			<p>Nome: <input type="text" name="nome" placeholder="Sua resposta"></p>
			<p>fone: <input type="tel" name="nascimento" pattern="([0-9]{2}) [0-9]{5}-[0-9]{4}"></p>
			<p>time: <input type="time" name="numero" placeholder="Ex. (55) 9 9999-9999"></p>
			<p>E-mail: <input type="email" name="email" placeholder="Sua resposta"></p>
			<br>
			<label for="dtnasc"> Data Nascimento</label>
			<input type="date" id="dtnasc" name="dtnasc" required>
			<label for="cor">Cor Favorita</label>
			<input type="color" id="cor" name="cor" required>
			<label for="filhos"> Qtde Filhos</label>
			<input type="number" id="filhos" name="filhos" required="">
			<label for="peso">Peso</label>
			0<input type="range" id="peso" name="peso" min="0" max="200" required>200
			<p>Sexo</p>
			<input type="radio" id="sexo-m" name="sexo" value="Masculino" required>
			<label for="sexo-m">Masculino</label><br>
			<input type="radio" id="sexo-f" name="sexo" value="Feminino" required>
			<label for="sexo-f">Feminino</label><br>
			<label for="estado">Estado</label>
			<select id="estado" name="estado" required>
				<option value = "SP">SP</option>
				<option value = "SC">SC</option>
				<option value = "PR">PR</option>
				<option value = "RS">RS</option>
				<option value = "TO">TO</option>
				<option value = "RJ">RJ</option>
				<option value = "PB">PB</option>
			</select>
			<br>
			<label for="msg">MENSAGEM</label>
			<textarea id="msg" name="msg" rows="4" cols="50" required></textarea>
			<br>
			<input type="reset" value="Reset">
			<input type="submit" value="Enviar">
			
		</div>	
		
			
		<p>
			<input type="button" name="IMPRIMIR" onclick="funcao_pdf()">
		</p>
	</div>
</body>
<script>
	function funcao_pdf(){
		var pegar_dados = document.getElementById('dados').innerHTML;

		var janela = window.open('','','width=800,heigth=600');
		janela.document.write('<html><head>');
		janela.document.write('<title>PDF</title></head>');
		janela.document.write('<body>');
		janela.document.write(pegar_dados);
		janela.document.write('</body></html>');
		janela.document.close();
		janela.print();
	}
</script>
</html>



<p>Nome: <input type="text" name="nome" placeholder="Sua resposta"></p>
			<p>Nascimento: <input type="text" name="nascimento" placeholder="Sua resposta"></p>
			<p>Telefone: <input type="text" name="numero" placeholder="Ex. (55) 9 9999-9999"></p>
			<p>E-mail: <input type="email" name="email" placeholder="Sua resposta"></p>
			<h1> Endereço - Estudante</h1>
			<p>Endereço: <input type="text" name="endereco" placeholder="Ex: Rua do Comércio"></p>
			<p>Número: <input type="int" name="numeroend" placeholder="Ex: 350/Apartamento 301. Se não tem número, use s/n "></p>
			<p>Bairro: <input type="text" name="bairroend" placeholder="Ex: Bairro Ipiranga"></p>
			<p>Cidade: <input type="text" name="nascimento" placeholder="Informe o nome completo e com apenas as iniciais maiúsculas."></p>
			<p>Estado: </p>	
			<select name="estado" required>
				<option value = "AC">AC  </option>
				<option value = "AL">AL  </option>
				<option value = "AM">AM  </option>
				<option value = "AP">AP  </option>
				<option value = "BA">BA  </option>
				<option value = "CE">CE  </option>
				<option value = "DF">DF  </option>
				<option value = "ES">ES  </option>
				<option value = "GO">GO  </option>
				<option value = "MA">MA  </option>
				<option value = "MG">MG  </option>
				<option value = "MS">MS  </option>
				<option value = "MT">MT  </option>
				<option value = "PA">PA  </option>
				<option value = "PB">PB  </option>
				<option value = "PI">PI  </option>
				<option value = "PR">PR  </option>
				<option value = "RJ">RJ  </option>
				<option value = "RN">RN  </option>
				<option value = "RO">RO  </option>
				<option value = "RR">RR  </option>
				<option value = "RS">RS  </option>
				<option value = "SC">SC  </option>
				<option value = "SE">SE  </option>
				<option value = "SP">SP  </option>
				<option value = "TO">TO  </option>	
			</select>
			<p>CEP: <input type="text" name="cep" placeholder="Ex.: 98.400-000"></p>
			<p>Nacionalidade:</p>
			<input type="radio" name="nacionalidade" value="Brasileiro" required><label>Brasileiro</label><br>
			<input type="radio" name="nacionalidade" value="Estrangeiro"><label>Estrangeiro, com documentação (CPF e RNE/CRNM) brasileira</label><br>









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
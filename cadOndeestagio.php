<?php 
include('protect.php');
include('conexao.php');
$mat = $_SESSION['matriculadoaluno'];
$estagiario_sql = "SELECT * FROM estagiario WHERE matricula = '$mat'";
$estagiario_query = $mysqli->query($estagiario_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$estagiarioquant = $estagiario_query->num_rows;

$estagio_sql = "SELECT * FROM estagio WHERE codEstagiario = '$mat'";
$estagio_query = $mysqli->query($estagio_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$estagioquant = $estagio_query->num_rows;
$estagio = $estagio_query->fetch_assoc();
if ($estagio['codEmpresa'] == NULL) {
	header("Location: selectEmpresa.php");
}else if($estagio['codRepresentante'] == NULL){
	header("Location: selectRepresentante.php");
}else if($estagio['codOndeEstagio'] != NULL){
	header("Location: selectSupervisor.php");
}

if ($estagiarioquant == 0 || $estagioquant == 0) {
	header("Location: fichadeconfirmacao.php");	
}
$estagiario = $estagiario_query->fetch_assoc();
$responsavel_sql = "SELECT * FROM responsavel WHERE matricula = '$mat'";
$responsavel_query = $mysqli->query($responsavel_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$responsavelquant = $responsavel_query->num_rows;
if ($estagiario['maioridade'] == '1' && $responsavelquant == 0) {
	header("Location: responsavel.php");
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styledoc.css">
	
	<title>Ficha de Confirmação</title>
</head>
<body id="body">
	<main id='conteudo'>
		<div class="estilo">
			<div class="tit">
				<br><br>
				<p><strong>FICHA DE CONFIRMAÇÃO <br>ESTÁGIO CURRICULAR SUPERVISIONADO OBRIGATÓRIO</strong><br>Cursos técnicos e de graduação (bacharelados - tecnologias)

				<br>
				<br>
		</div>
		
		<br><br><br>
		<div class="texto1">
			<form action="validaondeestagio.php" method="POST">
				<h4><strng>ONDE SERÁ REALIZADO</strng></h4>
				<p>Setor onde o estágio será realizado:<br>
				<input type="text" name="setorondeestagio" placeholder="Ex.: Setor de reposição" required>
				</p>
				<br><hr>
				<p>Endereço completo do local do estágio:</p>
				<p>Rua/Avenida ou outro:(Coloque Rua ou Avenida como mostra o exemplo)
				<input type="text" name="ruaondeestagio" placeholder="Ex.: Rua do Comércio" required>
				, nº:
				<input type="text" name="numeroendestagio" placeholder="Ex.: 000" required></p>
				<p>
				Bairro:(Apenas o nome)
				<input type="text" name="bairroondeestagio" placeholder="Ex.: Centro" required>	
				Município:
				<input type="text" name="municipioondeestagio" placeholder="Ex.: Frederico Westphalen" required></p>
				<p>
				Estado:
				<select name="estadoondeestagio" required>
					<option value = "" disabled selected>ESCOLHA O ESTADO </option>
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
					<option value = "PE">PE  </option>
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
				CEP:
				<input type="text" name="cepondeestagio" placeholder="Ex.: 98400-000" required>
				</p><br><hr>
				

				<br><br>
				<button type="submit">Salvar dados</button>
				<hr><br>
			</form>
		</div>
			<a href="selectOndeestagio.php"> Voltar!</a>			
		</div>	
	</main>	
</body>
</html>
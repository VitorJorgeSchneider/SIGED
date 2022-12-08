<?php 
include('protect.php');
include('conexao.php');
$mat = $_SESSION['matriculadoaluno'];
$estagiario_sql = "SELECT * FROM estagiario WHERE matricula = '$mat'";
$estagiario_query = $mysqli->query($estagiario_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$estagiarioquant = $estagiario_query->num_rows;

$dadosestagio_sql = "SELECT * FROM dadosestagio WHERE matricula = '$mat'";
$dadosestagio_query = $mysqli->query($dadosestagio_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$ndados = $dadosestagio_query->num_rows;

$estagio_sql = "SELECT * FROM estagio WHERE codEstagiario = '$mat'";
$estagio_query = $mysqli->query($estagio_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$estagioquant = $estagio_query->num_rows;
$estagio = $estagio_query->fetch_assoc();
$codigoempresa = $estagio['codEmpresa'];
if ($codigoempresa == NULL) {
	header("Location: selectEmpresa.php");
}else if($estagio['codRepresentante'] == NULL){
	header("Location: selectRepresentante.php");
}else if($estagio['codOndeEstagio'] == NULL){
	header("Location: selectOndeestagio.php");
}else if($estagio['codSupervisor'] == NULL){
	header("Location: selectSupervisor.php");
}else if($ndados == 1){
	header("Location: selectOrientador.php");
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
<body>
	<main>
		<div class="estilo">
			<div class="tit">
				<br><br>
				<p><strong>FICHA DE CONFIRMAÇÃO <br>ESTÁGIO CURRICULAR SUPERVISIONADO OBRIGATÓRIO</strong><br>Cursos técnicos e de graduação (bacharelados - tecnologias)

				<br>
				<br>
				<h4><strng>DADOS DO ESTÁGIO</strng></h4>
		</div>
		
		<br><br><br>
		<div class="texto1">
			<form action="updadosestagio.php" method="POST">
				<p>Início do estágio e previsão de término: </p> 
				<p><input type="date" name="inicio" required> a <input type="date" name="fim" required></p><br><br><hr>
				<p>Carga horária: </p>
				<p>Carga horária diária:</p>
				<p>A carga horária diária não pode ser superior a 6h por dia para estágio em período letivo ou a 8h por dia para estágio em período não letivo.</p>
				<p><input type="number" name="hrsdia" required> Ex.: 6  <br><input type="text" name="hrsdiaescrito" required> Ex.: seis<br><br></p>
				<p>Carga horária semanal:</p>
				<p>A carga horária diária não pode ser superior a 30h semanais para estágio em período letivo ou a 40h semanais para estágio em período não letivo.</p>
				<p><input type="number" name="hrssemana" required> Ex.: 30 <br><input type="text" name="hrssemanaescrito" required> Ex.: trinta</p><br>
				<p>Carga horária total do Estágio obrigatório:</p><p><input type="number" name="hrstotal" required> Ex.: 180  <br><input type="text" name="hrstotalescrito" required> Ex.: cento e oitenta<br><br></p><br><br><hr>
				<p>Remuneração e benefícios concedidos pela concedente: </p>
				<p>Auxílio estágio:</p>
				<p>Valor
				R$: _mensal.<br><input type="number" name="auxest" min="0.00" step="0.01" required> Ex.: 400,00; 100,00; 0,00 <br></p>
				<p><input type="text" name="auxestescrito" required> Ex.: quatrocentos reais; cem reais; zero reais </p><br>
				
				<br>
				<p>Auxílio transporte:</p>
				<p>Valor
				R$: _diário.<br><input type="number" name="auxtp" min="0.00" step="0.01" required>Ex.: 8,00; 5,00; 0,00 <br></p>
				<p><input type="text" name="auxtpescrito" required>  Ex.: oito reais; cinco reais; zero reais </p><br>
				<br><hr>

				<p>Atividades previstas para o estágio:</p>
				<p>Transcreva o que foi planejado entre a concedente da vaga, o estudante e o orientador.</p>
				<textarea name="atividades" rows="6" cols="40" required></textarea>
				<br><br><hr>

				
				<br><br>
				<button type="submit">Salvar dados</button>
			</form>
		</div>
			<a href="introducao.php"> Voltar!</a>		
		</div>	
	</main>
</body>
</html>
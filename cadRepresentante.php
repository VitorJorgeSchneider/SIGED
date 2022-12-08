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
}else if($estagio['codRepresentante'] != NULL){
	header("Location: selectOndeestagio.php");
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
			<form action="validarepresentante.php" method="POST">
				<br><h4><strng>REPRESENTANTE LEGAL</strng></h4>
				<p>Nome do representante legal da concedente: <br>
				<input type="text" name="nomerepresentante" required></p>
				<br><hR>
				<p>Cargo do representante legal da concedente: <br>
				<input type="text" name="cargorepresentante" required></p>
				<br><hr>
				<p>Número do CPF do representante legal da concedente:<br>
				<input type="text" name="cpfrepresentate" placeholder="Ex.: 000.000.000-00" required></p>
				<br><hr>
				<p>Telefone da concedente(código de área e número): <br>
				<input type="text" name="telefonerepresentante" placeholder="(00) 00000-0000" required></p><br><hr>
				<p>E-mail da concedente:<br>
				<input type="email" name="emailrepresentante" required>
				</p><br><hr>
				

				<br><br>
				<button type="submit">Salvar dados</button>
				<hr><br>
			</form>
		</div>
			<a href="selectRepresentante.php"> Voltar!</a>			
		</div>	
	</main>
</body>
</html>
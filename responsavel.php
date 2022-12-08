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

if ($estagiarioquant == 0 || $estagioquant == 0) {
	header("Location: fichadeconfirmacao.php");	
}
$estagiario = $estagiario_query->fetch_assoc();
$responsavel_sql = "SELECT * FROM responsavel WHERE matricula = '$mat'";
$responsavel_query = $mysqli->query($responsavel_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$responsavelquant = $responsavel_query->num_rows;

if($estagiario['maioridade'] == '0' || $responsavelquant == 1){
	header("Location: selectEmpresa.php");
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
				<h4><strng>DADOS DO RESPONSÁVEL LEGAL</strng></h4>
		</div>
		
		<br><br><br>
		<div class="texto1">
			<form action="dadosresponsavel.php" method="POST">
				<p>Nome do responsável legal: <br>
				Informe o nome do responsável legal que assinará o Termo de Compromisso de Estágio obrigatório. 
				<br>Completo e com apenas as iniciais maiúsculas.<br>
				<input type="text" name="nome" required></p>			
				<hr>
				<p>CPF do responsável legal:<br>
				<input type="text" name="cpf" placeholder="Ex.: 000.000.000-00" required>
				</p>
				<hr>
				<p>E-mail do responsável legal: <br>
				<input type="email" name="email" required>
				</p>
				<hr>
				<p>Grau de parentesco:
				<br>
				<input type="radio" name="grau" value="Pai">Pai<br>
				<input type="radio" name="grau" value="Mãe">Mãe<br>
				<input type="radio" name="grau" value="1">Outro: <input type="text" name="grauo">
				</p>
				
				<hr>
				
				<br><br><br><br>
				<button type="submit">Salvar dados</button>
			</form>
		</div>
		<div id="noprint">
			<button onclick="printPagina();return false">Imprimir</button>
			<a href="introducao.php"> Voltar!</a>			
		</div>
		</div>	
	</main>
	
		
	
<script type="text/javascript">
	function printPagina(){
		var body = document.getElementById('body').innerHTML;
		var conteudo = document.getElementById('conteudo').innerHTML;
		document.getElementById('body').innerHTML = conteudo;
		window.print();
		document.getElementById('body').innerHTML = body;
	}
</script>	
</body>
</html>
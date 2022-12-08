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
$codigoempresa = $estagio['codEmpresa'];
if ($codigoempresa == NULL) {
	header("Location: selectEmpresa.php");
}else if($estagio['codRepresentante'] == NULL){
	header("Location: selectRepresentante.php");
}else if($estagio['codOndeEstagio'] == NULL){
	header("Location: selectOndeestagio.php");
}else if($estagio['codSupervisor'] == NULL){
	header("Location: selectSupervisor");
}else if($estagio['codOrientador'] != NULL){
	header("Location: introducao.php");  
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
				<br><br>
				<h4><strng>SELECIONANDO Orientadores</strng></h4>
		</div>
		<br><br><br>
		<div class="texto1">
			<form action="uporientador.php" method="POST">
				<label>SELECIONE O(A) ORIENTADOR(A):</label> <br>
				<select name="orientador" required>
					<option value="" disabled selected>Escolha o(a) orientador(a) do estágio!</option>
					<?php
						$orientador_sql = "SELECT * FROM professores WHERE ativo = '1' ORDER BY nome";
						$orientador_query = $mysqli->query($orientador_sql);
						while ($orientador = mysqli_fetch_assoc($orientador_query)) {
							?><option value=<?php echo $orientador['id']; ?>><?php echo $orientador['nome']; ?></option><?php
						}
					?>
				</select>
				<br><br><hr>
				<label>Caso tenha!</label><br><br>
				<label>SELECIONE O(A) COORIENTADOR(A):</label> <br>
				<select name="coorientador" required>
					<option value="0" selected>Escolha o(a) orientador(a) do estágio!</option>
					<?php
						$orientador_sql = "SELECT * FROM professores WHERE ativo = '1' ORDER BY nome";
						$orientador_query = $mysqli->query($orientador_sql);
						while ($orientador = mysqli_fetch_assoc($orientador_query)) {
							?><option value=<?php echo $orientador['id']; ?>><?php echo $orientador['nome']; ?></option><?php
						}
					?>
				</select>
				<br><br><hr>

				<br><br><br>
				<button type="submit">Salvar dados</button>
			</form>
		</div>
			<a href="introducao.php"> Voltar!</a>		
		</div>	
	</main>
</body>
</html>
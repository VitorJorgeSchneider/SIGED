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
if ($estagio['codEmpresa'] != NULL) {
	header("Location: selectRepresentante.php");
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
				<h4><strng>SELECIONANDO EMPRESA</strng></h4>
		</div>
		
		<br><br><br>
		<div class="texto1">
			<form action="upempresa.php" method="POST">
				<label>SELECIONE A EMPRESA:</label> <br>
				<select name="empresa" required>
					<option value="" disabled selected>Escolha sua empresa!</option>

					<?php
						$empresa_sql = "SELECT * FROM empresa WHERE status = '1' ORDER BY nome";
						$empresa_query = $mysqli->query($empresa_sql);
						

						while ($empresas = mysqli_fetch_assoc($empresa_query)) {
							?><option value=<?php echo $empresas['codEmpresa']; ?>><?php echo $empresas['nome']; ?></option><?php
						}
					?>
					
				</select>
				<br><br>
				<p> Caso a empresa não esteja na lista,<br><a href="cadEmpresa.php"> clique aqui para Cadastrar!</a></p>
				<br><br>
				<button type="submit">Salvar dados</button>
			</form>
		</div>
			<a href="introducao.php"> Voltar!</a>			
		</div>	
	</main>
</body>
</html>
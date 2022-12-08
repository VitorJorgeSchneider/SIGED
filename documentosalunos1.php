<?php 
include('protect.php');
include('conexao.php');

$matricula = $_POST['aluno'];
$sql_code_doc1 = "SELECT * FROM orientador WHERE matriculaaluno = '$matricula'";
$sql_query_doc1 = $mysqli->query($sql_code_doc1) or die("Falha na execução do código SQL: " . $mysqli->error);
$user_orientado = mysqli_fetch_assoc($sql_query_doc1);
$orientadoquant = $sql_query_doc1->num_rows;

$sql_code_doc2 = "SELECT * FROM estagio WHERE codEstagiario = '$matricula'";
$sql_query_doc2 = $mysqli->query($sql_code_doc2) or die("Falha na execução do código SQL: " . $mysqli->error);
$user_estagio = mysqli_fetch_assoc($sql_query_doc2);
$estagioquant = $sql_query_doc2->num_rows;

$sql_code_doc3 = "SELECT * FROM realizado WHERE codEstagiario = '$matricula'";
$sql_query_doc3 = $mysqli->query($sql_code_doc3) or die("Falha na execução do código SQL: " . $mysqli->error);
$user_realizado = mysqli_fetch_assoc($sql_query_doc3);
$realizadoquant = $sql_query_doc3->num_rows;

$sql_code_aluno = "SELECT * FROM alunos WHERE matricula = '$matricula'";
$sql_query_aluno = $mysqli->query($sql_code_aluno) or die("Falha na execução do código SQL: " . $mysqli->error);
$user_aluno = mysqli_fetch_assoc($sql_query_aluno);
$_SESSION['nomealuno'] = $user_aluno['nome'];
$_SESSION['matriculadoaluno'] = $matricula;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Documentos Alunos</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<img src="./img/IFFar.png" alt="Iffar">
		<h1>Aluno, <?php echo $_SESSION['nomealuno']; ?>.</h1>

	</header>
	<nav>

		<p>
			<a href="estagio.php">Voltar</a>
		</p>

	</nav>
	<main>
		<?php 
		if($orientadoquant == 1){
			if($user_orientado['assinatura'] == NULL){
				?><div class="taga1"><a href="cartadeapresentacao.php">Carta de Apresentação!</a></div><br><?php
			}else{
				?><div class="taga2"><a href="cartadeapresentacao.php">Carta de Apresentação!</a></div><br><?php
			}
			if ($estagioquant == 1){
				if ($user_estagio['status'] == 'analise') {
					?><div class="taga1"><a href="termoDeCompromisso&planoDeAtividades.php">Termo de Compromisso e Plano de Atividades!</a></div><br>
					<div  class="taga0"><a href="javascript:alert('Usuário ainda não completou termo de compromisso e plano de atividades!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
				}if ($user_estagio['status'] == 'assinando') {
					?><div class="taga1"><a href="termoDeCompromisso&planoDeAtividades.php">Termo de Compromisso e Plano de Atividades!</a></div><br>
					<div  class="taga0"><a href="javascript:alert('Usuário ainda não completou termo de compromisso e plano de atividades!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
				}if ($user_estagio['status'] == 'completo') {
					?><div class="taga2"><a href="termoDeCompromisso&planoDeAtividades.php">Termo de Compromisso e Plano de Atividades!</a></div><br>
					<?php 
					if($realizadoquant == 1){
						if($user_realizado['assinatura'] == NULL){
							?><div class="taga1"><a href="submeterrealizado.php">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
						}else{
							?><div class="taga2"><a href="termoDeRealizacaoeAvaliacao.php">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
						}
					}else{
						?><div class="taga0"><a href="javascript:alert('Usuário ainda não solicitou o termo de realização e avaliação do estágio!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
					} 
					
				}
			}else{
				?><div  class="taga0"><a href="javascript:alert('Usuário ainda não preencheu o termo de compromisso e plano de atividades!')">Termo de Compromisso e Plano de Atividades!</a></div><br>
				<div  class="taga0"><a href="javascript:alert('Usuário ainda não preencheu o termo de compromisso e plano de atividades!')">Termo de Realização e Avaliação do Estágio!</a></div><br>
				<?php
			}
		}else{
			?><div class="taga0"><a href="javascript:alert('Carta de Apresentação ainda não solicitada pelo aluno!')">Carta de Apresentação!</a></div><br>
			<div class="taga0"><a href="javascript:alert('Carta de Apresentação ainda não solicitada pelo aluno!')">Termo de Compromisso e Plano de Atividades!</a></div><br>
			<div class="taga0"><a href="javascript:alert('Carta de Apresentação ainda não solicitada pelo aluno!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
		}?>				
		
	</main>
	
</body>
</html>
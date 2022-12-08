<?php 
include('protect.php');
include('conexao.php');
$nome = $_SESSION['nomealuno'];
$matricula = $_SESSION['matriculadoaluno'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INTRODUÇÂO</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<img src="./img/IFFar.png" alt="Iffar">
		<h1>Bem vindo, <?php echo $nome; ?>.</h1>
		<h2><?php echo $matricula; ?></h2>

	</header>
	<nav>

		<p>
			<a href="logout.php">Sair</a>
		</p>

	</nav>
	<main>

			<?php
				$sql_code_doc1 = "SELECT * FROM orientador WHERE matriculaaluno = '$matricula'";
				$sql_query_doc1 = $mysqli->query($sql_code_doc1) or die("Falha na execução do código SQL: " . $mysqli->error);
				$user_orientado = mysqli_fetch_assoc($sql_query_doc1);
				$quantidade_doc1 = $sql_query_doc1->num_rows;

				$sql_code_doc2 = "SELECT * FROM estagio WHERE codEstagiario = '$matricula'";
				$sql_query_doc2 = $mysqli->query($sql_code_doc2) or die("Falha na execução do código SQL: " . $mysqli->error);
				$user_doc2 = mysqli_fetch_assoc($sql_query_doc2);
				$quantidade_doc2 = $sql_query_doc2->num_rows;

				$sql_code_doc3 = "SELECT * FROM realizado WHERE codEstagiario = '$matricula'";
				$sql_query_doc3 = $mysqli->query($sql_code_doc3) or die("Falha na execução do código SQL: " . $mysqli->error);
				$user_doc3 = mysqli_fetch_assoc($sql_query_doc3);
				$quantidade_doc3 = $sql_query_doc3->num_rows;

				if($quantidade_doc1 == 1){
					if($user_orientado['assinatura'] == NULL){
						?><div class="taga1"><a href="cartadeapresentacao.php">Carta de Apresentação!</a></div><br>
						<div class="taga0"><a href="javascript:alert('Carta de apresentação ainda não assinada!')">Termo de Compromisso de Estágio e Plano de Atividades!</a></div><br>
						<div class="taga0"><a href="javascript:alert('Carta de Apresentação ainda não assinada!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
					}else{
						?><div class="taga2"><a href="cartadeapresentacao.php">Carta de Apresentação!</a></div><br>
						<?php 
						if($quantidade_doc2 == 1) {
							if($user_doc2['status'] == NULL){
								?><div class="taga0"><a href="fichadeconfirmacao.php">Termo de Compromisso de Estágio e Plano de Atividades!</a></div><br>
								<div class="taga0"><a href="javascript:alert('Termo de compromisso de estágio e plano de atividades ainda não finalizado!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
							}if($user_doc2['status'] == 'analise'){
								?><div class="taga1"><a href="javascript:alert('Termo de compromisso de estágio e plano de atividades em analise, aguarde!')">Termo de Compromisso de Estágio e Plano de Atividades!</a></div><br>
								<div class="taga0"><a href="javascript:alert('Termo de compromisso de estágio e plano de atividades ainda não finalizado!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
							}if($user_doc2['status'] == 'assinando'){
								?><div class="taga1"><a href="termoDeCompromisso&planoDeAtividades.php">Termo de Compromisso de Estágio e Plano de Atividades!</a></div><br>
								<div class="taga0"><a href="javascript:alert('Termo de compromisso de estágio e plano de atividades ainda não finalizado!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
							}if($user_doc2['status'] == 'completo'){
								?><div class="taga2"><a href="termoDeCompromisso&planoDeAtividades.php">Termo de Compromisso de Estágio e Plano de Atividades!</a></div><br>
								<?php
								if($quantidade_doc3 == 1){
									if($user_doc3['assinatura'] == NULL){
										?><div class="taga1"><a href="javascript:alert('Aguardando preenchimento e assinatura do supervisor!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
									}else{
										?><div class="taga2"><a href="termoDeRealizacaoeAvaliacao.php">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
									}
								}else{
									?><div class="taga0"><a href="solicitaravaliacao.php">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
								}
							}
						}else{
							?><div class="taga0"><a href="fichadeconfirmacao.php">Termo de Compromisso de Estágio e Plano de Atividades!</a></div><br>
							<div class="taga0"><a href="javascript:alert('Termo de compromisso de estágio e plano de atividades ainda não iniciado!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
						} 
					}
				}else{
					?><div class="taga0"><a href="solicitacao00.php">Carta de Apresentação!</a></div><br>
					<div class="taga0"><a href="javascript:alert('Carta de Apresentação ainda não solicitada!')">Termo de Compromisso e Plano de Atividades!</a></div><br>
					<div class="taga0"><a href="javascript:alert('Carta de Apresentação ainda não solicitada!')">Termo de Realização e Avaliação do Estágio!</a></div><br><?php
				}?>
			
		
		
		
	</main>
	
</body>
</html>
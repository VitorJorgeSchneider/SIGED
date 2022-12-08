<?php 
include('protect.php');
include('conexao.php');

$matricula = $_POST['aluno'];
$sql_code_doc1 = "SELECT * FROM orientador WHERE matriculaaluno = '$matricula'";
$sql_query_doc1 = $mysqli->query($sql_code_doc1) or die("Falha na execução do código SQL: " . $mysqli->error);
$user_orientado = mysqli_fetch_assoc($sql_query_doc1);

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
	<title>INTRODUÇÂO</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<img src="./img/IFFar.png" alt="Iffar">
		<h1>Aluno, <?php echo $_SESSION['nomealuno']; ?>.</h1>

	</header>
	<nav>

		<p>
			<a href="professor.php">Voltar</a>
		</p>

	</nav>
	<main>
		<?php
			if($user_orientado['assinatura'] == NULL){
				?><a href="assinarcartadeapresentacao.php">Assinar Carta de Apresentação</a><?php
			}else{
				?><a href="cartadeapresentacao.php" >Carta de Apresentação</a><?php
			}			
		?>
		
		
		
		
	</main>
	
</body>
</html>
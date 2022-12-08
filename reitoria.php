<?php 
include('conexao.php');
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
		<h1>Bem vindo Professor, <?php echo $_SESSION['nome']; ?>.</h1>

	</header>
	<nav>
			<a href="logout.php"><img src="./img/botao-voltar.png"></a>
	
	</nav>
	<main>
		<?php
			$alunos_sql = "SELECT * FROM alunos";
			$alunos_query = $mysqli->query($alunos_sql);
		?>
		<div class="scroller">
			<form action ="documentosalunos.php" method="POST">
				<?php
					while ($alunos = mysqli_fetch_assoc($alunos_query)) {
						
						?><div class="bott"><button type="submit" name= "aluno" value= <?php echo $alunos['matricula']; ?>><?php echo $alunos['nome']; ?></button></div><?php
					}
				?>
			</form>
		</div>
	</main>
</body>
</html>
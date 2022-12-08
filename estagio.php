<?php 
include('protect.php');
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
		<h1><?php echo $_SESSION['nome']; ?></h1>

	</header>
	<nav>
			<a href="estagio_Empresas.php"> Empresas </a>
			<a href="logout.php"><img src="./img/botao-voltar.png"></a>
	
	</nav>
	<main>

		<?php
			$sql_code = "SELECT * FROM alunos ORDER BY nome";
			$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ". $mysqli->error);
		?>
		<table>
			<thead>
				<tr>
					<th>Alunos</th>
				</tr>
			</thead>
			<tbody>
				<form action ="documentosalunos1.php" method="POST">
					<?php
						while ($alunos = mysqli_fetch_assoc($sql_query)) {
							echo "<tr>";
							echo "<td>";
							?><button type="submit" name= "aluno" value= <?php echo $alunos['matricula']; ?>><?php echo $alunos['nome']; ?></button><?php
						}
					?>
				</form>
			</tbody>
		</table>
		
	</main>
	
</body>
</html>
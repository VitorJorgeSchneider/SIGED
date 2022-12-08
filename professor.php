<?php 
include('protect.php');
include('conexao.php');
$id = $_SESSION['id'];
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
			$sqlorientador = "SELECT * FROM orientador WHERE idprofessor = '$id'";
			$dadosorientador = $mysqli->query($sqlorientador);
		?>
		<table>
			<thead>
				<tr>
					<th>Alunos</th>
				</tr>
			</thead>
			<tbody>
				<form action ="documentosalunos.php" method="POST">
					<?php
						while ($user_orientador = mysqli_fetch_assoc($dadosorientador)) {
							$mat = $user_orientador['matriculaaluno'];
							$sqlaluno = "SELECT * FROM alunos WHERE matricula = '$mat' ORDER BY nome";
							$dadosaluno = $mysqli->query($sqlaluno);
							$user_aluno = mysqli_fetch_assoc($dadosaluno);
							
							echo "<tr>";
							echo "<td>";
							?><button type="submit" name= "aluno" value= <?php echo $user_aluno['matricula']; ?>><?php echo $user_aluno['nome']; ?></button><?php
						}
					?>
				</form>
			</tbody>
		</table>
		
	</main>
	
</body>
</html>
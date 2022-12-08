<?php 
	include('conexao.php');
	include('protect.php');
	$jatem = $_SESSION['matriculadoaluno'];
	$sql_code = "SELECT * FROM orientador WHERE matriculaaluno = '$jatem'";

	$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

	$quantidade = $sql_query->num_rows;
	if($quantidade == 1){
		header("Location: introducao.php");
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Carta de Apresentação</title>
</head>
<body>
	<header>
		<img src="./img/IFFar.png" alt="Iffar">
		<h1>Solicitação da Carta de Apresentação.</h1>
		
	</header>
	<nav>

		<p>
			<a href="introducao.php">Sair</a>
		</p>

	</nav>
	<main>
		<form action ="enviandodados00.php" method="POST">
			<label><h1>Selecione seu professor orientador:</h1></label>
			<select name="professor" required>
				<option value="" disabled selected>Escolha o Professor Orientador!</option>
				<?php 
					$sql = "SELECT * FROM professores WHERE ativo = 1 ORDER BY nome";
					$dados = $mysqli->query($sql); 
					while ($user_data = mysqli_fetch_assoc($dados)) {
							?>
							<option value= <?php echo $user_data['id']; ?>><?php echo $user_data['nome']; ?></option>			
							<?php
						}

					?>
			</select>
			<br><br><br>
			<button type="submit" name="enviar">Solicitar Assinatura!</button>
		</form>

	</main>
	
</body>
</html>
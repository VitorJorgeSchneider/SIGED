<?php 
include('protect.php');
include('conexao.php');
$user = $mysqli->real_escape_string($_SESSION['matricula']);
$sql_code = "SELECT * FROM arq1 WHERE matricula = '$user'";
$sql_query = $mysqli->query($sql_code);
$quantidade = $sql_query->num_rows;
if($quantidade == 1){
	header("Location: view1.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>ARQ1</title>
</head>
<body>
	<header>
		<img src="./img/IFFar.png" alt="Iffar">
		<h1>Bem vindo, <?php echo $_SESSION['nome']; ?>.</h1>

	</header>
	<nav>

		<p>
			<a href="logout.php">Sair</a>
		</p>

	</nav>
	<main>
		<form action ="email_arq1.php" method="POST">
			<h1>Olá <strong><?php echo $_SESSION['nome']?></strong>,
			 por favor digite sua empresa desejada<input type="text" name="empresa" placeholder="empresa" required>
			 e seu time favorito <input type="text" name="timefot" placeholder="Seu time" required>
			  e também não esqueça de preencher o nome do professor <input type="radio" name="professor" value="Roberto" required>Roberto
			  <input type="radio" name="professor" value="Flavio">Flavio!
			</h1>
			<br><br><br>
			<h1>Agora selecione os e-mails necessários para envio!<br><br>Primeiro o seu email:<input type="email" name="email" required>
			<br>O E-mail da empresa:<input type="email" name="emailempresa" required></h1>
			<br><br><br>
			<button type="submit">Entrar</button>
		</form>

	</main>
	
</body>
</html>
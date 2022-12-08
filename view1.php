<?php 
include('protect.php');
include('conexao.php');

$matricula = $_SESSION['matricula'];

$sql_code = "SELECT * FROM arq1 WHERE matricula = '$matricula'";

$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

$quantidade = $sql_query->num_rows;

if($quantidade == 1){
	$usuario = $sql_query->fetch_assoc();
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
		
		<h1>Olá <strong><?php echo $_SESSION['nome']?></strong>, por favor digite sua empresa desejada <?php echo $usuario['empresa']?> e seu time favorito <?php echo $usuario['timefot']?> e também não esqueça de preencher o nome do professor <?php echo $usuario['professor']?>!</h1>
		<br><br><br>
		<h1>Agora selecione os e-mails necessários para envio!<br><br>Primeiro o seu email: <?php echo $usuario['email']?><br>O E-mail da empresa: <?php echo $usuario['empresa_mail']?></h1>

	</main>
	
</body>
</html>
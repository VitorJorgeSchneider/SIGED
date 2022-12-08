<?php
   include('conexao.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIGED - Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
			<img src="./img/IFFar.png" alt="Iffar">
			<h1>Bem vindo ao SIGED!</h1>
	</header>
	
	<nav>
		 <form action="" method="POST">
		 	<p>
		 		<label>Tipo de acesso: </label>
		 		<select name="tipo">
		 			<option value="aluno">Aluno</option>
		 			<option value="professor">Professor</option>
		 			<option value="setestagio">Setor de Estágios</option>
		 			<option value="reitor">Reitoria</option>
		 		</select>
		 	</p>
			<p>
				<label>Usuário: </label>
				<input type="text" name="usuario">
			</p>
			<p>
				<label>Senha: </label>
				<input type="password" name="senha">
			</p>

			<button type="submit">Entrar</button>
			

		</form>
	</nav>
	<main>
		
		<?php 
			if(isset($_POST['usuario']) || isset($_POST['senha'])){
				if(strlen($_POST['usuario']) == 0){
					?>
					<div class="msg">Preencha seu Usuário!</div>
					<?php					
				} else if(strlen($_POST['senha']) == 0){
					?>
					<div class="msg">Preencha sua Senha!</div>
					<?php
				} else{

					 $user = $mysqli->real_escape_string($_POST['usuario']);
					 $senha = $mysqli->real_escape_string($_POST['senha']);

					 if($_POST['tipo'] == 'aluno'){
					 	$sql_code = "SELECT * FROM alunos WHERE usuario = '$user' AND senha = '$senha'";

						 $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

						 $quantidade = $sql_query->num_rows;

						 if($quantidade == 1){
						 	
						 	$usuario = $sql_query->fetch_assoc();

						 	if (!isset($_SESSION)){
						 		session_start();
						 	}

						 	$_SESSION['matriculadoaluno'] = $usuario['matricula'];
						 	$_SESSION['nomealuno'] = $usuario['nome'];
						 	header("Location: introducao.php");
						 } else{
						 	?>
						 	<div class="msg">
						 		Falha ao logar! Usuário ou senha incorretos!
						 	</div>
						 	<?php
						 }


					 }
					 if($_POST['tipo'] == 'professor'){
					 	$sql_code = "SELECT * FROM professores WHERE usuario = '$user' AND senha = '$senha'";

						$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

						$quantidade = $sql_query->num_rows;

						if($quantidade == 1){
						 	
						 	$usuario = $sql_query->fetch_assoc();

						 	if (!isset($_SESSION)){
						 		session_start();
						 	}

						 	$_SESSION['id'] = $usuario['id'];
						 	$_SESSION['nome'] = $usuario['nome'];
						 	header("Location: professor.php");
						 } else{
						 	?>
						 	<div class="msg">
						 		Falha ao logar! Usuário ou senha incorretos!
						 	</div>
						 	<?php
						 }


					 }
					 if($_POST['tipo'] == 'setestagio'){
					 	$sql_code = "SELECT * FROM setorest WHERE usuario = '$user' AND senha = '$senha'";

						$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

						$quantidade = $sql_query->num_rows;

						if($quantidade == 1){
						 	
						 	$usuario = $sql_query->fetch_assoc();

						 	if (!isset($_SESSION)){
						 		session_start();
						 	}

						 	$_SESSION['idset'] = $usuario['id'];
						 	$_SESSION['nome'] = $usuario['nome'];
						 	header("Location: estagio.php");
						 } else{
						 	?>
						 	<div class="msg">
						 		Falha ao logar! Usuário ou senha incorretos!
						 	</div>
						 	<?php
						 }


					 }


					 
				}
			}
		?>
		
	</main>

</body>
</html>
<?php
	include('conexao.php');
	$valor = $_POST['professor'];
	$sql_code = "SELECT * FROM professores WHERE id = $valor";

	$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

	$usuario = $sql_query->fetch_assoc();

	echo $usuario['id'];
	echo $usuario['nome'];
	echo $usuario['email'];

?>
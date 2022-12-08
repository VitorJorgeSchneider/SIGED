<?php
include('conexao.php');
include('protect.php');

$matricula = $_POST['del'];
$aluno_sql = "SELECT * FROM responsavel WHERE matricula = '$matricula'";
$aluno_query = $mysqli->query($aluno_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$quantidade = $aluno_query->num_rows;
if ($quantidade == 1) {
	$deletResponsavel = mysqli_query($mysqli, "DELETE FROM responsavel WHERE matricula = '$matricula'");
}
$deletEstagio = mysqli_query($mysqli, "DELETE FROM estagio WHERE codEstagiario = '$matricula'");
$deletEstagiario = mysqli_query($mysqli, "DELETE FROM estagiario WHERE matricula = '$matricula'");
$deletDados = mysqli_query($mysqli, "DELETE FROM dadosestagio WHERE matricula = '$matricula'");
	

header("Location: estagio.php"); 
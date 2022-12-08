<?php 
include('conexao.php');

$matricula = $_POST['ass'];
$assinatura = date("Y-m-d H:i:s");

$sql = "SELECT * FROM estagio WHERE codEstagiario = '$matricula'";
$query = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);
$aluno = $query->fetch_assoc();

if ($aluno['assinaturaRepresentante'] != NULL && $aluno['assinaturaSupervisor'] != NULL && $aluno['assinaturaOrientador'] != NULL && $aluno['assinaturaCordExt'] != NULL && $aluno['assinaturaDiretor'] != NULL && $aluno['assinaturaCordCurso']) {
	$assina = mysqli_query($mysqli, "UPDATE estagio SET assinaturaResponsavel = '$assinatura', status = 'completo' WHERE codEstagiario = '$matricula'");
}else{
	$assina = mysqli_query($mysqli, "UPDATE estagio SET assinaturaResponsavel = '$assinatura' WHERE codEstagiario = '$matricula'");
}


header("Location: assinado.php"); 
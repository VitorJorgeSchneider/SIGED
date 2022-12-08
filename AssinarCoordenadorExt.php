<?php 
include('conexao.php');

$matricula = $_POST['ass'];
$assinatura = date("Y-m-d H:i:s");

$sql = "SELECT * FROM estagio WHERE codEstagiario = '$matricula'";
$query = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);
$aluno = $query->fetch_assoc();
$sql_resp = "SELECT * FROM responsavel WHERE matricula = '$matricula'";
$query_resp = $mysqli->query($sql_resp) or die("Falha na execução do código SQL: " . $mysqli->error);
$quantresp = $query_resp->num_rows;
if($quantresp == 1){
	if ($aluno['assinaturaResponsavel'] != NULL && $aluno['assinaturaRepresentante'] != NULL && $aluno['assinaturaCordCurso'] != NULL && $aluno['assinaturaOrientador'] != NULL && $aluno['assinaturaDiretor'] != NULL && $aluno['assinaturaSupervisor'] != NULL) {
		$assina = mysqli_query($mysqli, "UPDATE estagio SET assinaturaCordExt = '$assinatura', status = 'completo' WHERE codEstagiario = '$matricula'");
	}else{
		$assina = mysqli_query($mysqli, "UPDATE estagio SET assinaturaCordExt = '$assinatura' WHERE codEstagiario = '$matricula'");
	}
}else{
	if ($aluno['assinaturaRepresentante'] != NULL && $aluno['assinaturaCordCurso'] != NULL && $aluno['assinaturaOrientador'] != NULL && $aluno['assinaturaDiretor'] != NULL && $aluno['assinaturaSupervisor'] != NULL) {
		$assina = mysqli_query($mysqli, "UPDATE estagio SET assinaturaCordExt = '$assinatura', status = 'completo' WHERE codEstagiario = '$matricula'");
	}else{
		$assina = mysqli_query($mysqli, "UPDATE estagio SET assinaturaCordExt = '$assinatura' WHERE codEstagiario = '$matricula'");
	}
}

header("Location: assinado.php"); 
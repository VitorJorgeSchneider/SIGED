<?php
include('conexao.php');
include('protect.php');
$matricula = $_POST['sub'];
$_SESSION['matriculadoaluno'] = $matricula;
$result = mysqli_query($mysqli, "UPDATE estagio SET status = 'assinando' WHERE codEstagiario = '$matricula'");
$aluno_sql = "SELECT * FROM responsavel WHERE matricula = '$matricula'";
$aluno_query = $mysqli->query($aluno_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$quantidade = $aluno_query->num_rows;
if($quantidade == 1){
	header("Location: assinaResponsavel.php");
}else{
	header("Location: assinaRepresentante.php");
}

?>
<?php
include('conexao.php');
include('protect.php');

$mat = $_SESSION['matriculadoaluno'];
$codorientador = $_POST['orientador'];
$codcoorientador = $_POST['coorientador'];
$status = 'analise';
$data = date("Y-m-d");
$assinatura = date("Y-m-d H:i:s");
if($codcoorientador == '0'){
	$fixa = mysqli_query($mysqli, "UPDATE estagio SET codOrientador = '$codorientador', assinaturaEstagiario = '$assinatura', status = '$status', datasub = '$data' WHERE codEstagiario = '$mat'");
}else{
	$fixa = mysqli_query($mysqli, "UPDATE estagio SET codOrientador = '$codorientador', codCoorientador = '$codcoorientador', assinaturaEstagiario = '$assinatura', status = '$status', datasub = '$data' WHERE codEstagiario = '$mat'");
}

header("Location: introducao.php"); 
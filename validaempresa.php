<?php 
include('protect.php');
include('conexao.php');

$nomeempresa = $_POST['nomeconcedente'];
$cnpjempresa = $_POST['cnpjconcedente'];
$areaempresa = $_POST['atuacaoconcedente'];

$status = '1';



$sql_empresa = "SELECT * FROM empresa WHERE nome = '$nomeempresa'and CNPJ = '$cnpjempresa' and area = '$areaempresa' and status = '$status'";
$sql_query_empresa = $mysqli->query($sql_empresa) or die("Falha na execução do código SQL: " . $mysqli->error);
$quantasempresas = $sql_query_empresa->num_rows;
if($quantasempresas == 0){
	$empresa = mysqli_query($mysqli, "INSERT INTO empresa(nome, CNPJ, area, status) VALUES ('$nomeempresa', '$cnpjempresa','$areaempresa', '$status')");
}
header("Location: selectEmpresa.php");
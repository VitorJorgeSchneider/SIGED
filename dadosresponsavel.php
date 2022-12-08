<?php
include('conexao.php');
include('protect.php');
$mat = $_SESSION['matriculadoaluno'];
$sql_code = "SELECT * FROM alunos WHERE matricula = $mat";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$usuario = $sql_query->fetch_assoc();

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$grau = $_POST['grau'];
if ($grau == '1') {
	$grau = $_POST['grauo'];
}




$estag = mysqli_query($mysqli, "INSERT INTO responsavel(matricula, nome, cpf, email, grau) VALUES ('$mat', '$nome','$cpf', '$email', '$grau')");

header("Location: selectEmpresa.php");

?>
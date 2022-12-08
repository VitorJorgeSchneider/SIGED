<?php
include('conexao.php');
include('protect.php');
$valor = $_POST['professor'];
$sql_code = "SELECT * FROM professores WHERE id = $valor";

$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

$usuario = $sql_query->fetch_assoc();

$idprof = $usuario['id'];
$_SESSION['professor'] = $idprof;
$matraluno = $_SESSION['matriculadoaluno'];

$result = mysqli_query($mysqli, "INSERT INTO orientador(idprofessor, matriculaaluno, status, assinatura) VALUES ('$idprof', '$matraluno',NULL, NULL)");
header("Location: emailcartadeapresentacao.php");

?>
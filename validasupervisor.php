<?php 
include('protect.php');
include('conexao.php');

$mat = $_SESSION['matriculadoaluno'];
$estagio_sql = "SELECT * FROM estagio WHERE codEstagiario = '$mat'";
$estagio_query = $mysqli->query($estagio_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$estagio = $estagio_query->fetch_assoc();
$codempresa = $estagio['codEmpresa'];

$nomesupervisor = $_POST['nomesupervisor'];
$telefonesupervisor = $_POST['telefonesupervisor'];
$emailsupervisor = $_POST['emailsupervisor'];


$status = '1';

$supervisor = mysqli_query($mysqli, "INSERT INTO supervisor(nome, telefone, email, codEmpresa, status) VALUES('$nomesupervisor', '$telefonesupervisor', '$emailsupervisor', '$codempresa', '$status')");




header("Location: selectSupervisor.php");
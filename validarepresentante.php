<?php 
include('protect.php');
include('conexao.php');
$mat = $_SESSION['matriculadoaluno'];
$estagio_sql = "SELECT * FROM estagio WHERE codEstagiario = '$mat'";
$estagio_query = $mysqli->query($estagio_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$estagio = $estagio_query->fetch_assoc();
$codempresa = $estagio['codEmpresa'];

$nomerepresentante = $_POST['nomerepresentante'];
$cargorepresentate = $_POST['cargorepresentante'];
$cpfrepresentante = $_POST['cpfrepresentate']; 
$telefonerepresentante = $_POST['telefonerepresentante'];
$emailrepresentante = $_POST['emailrepresentante'];

$status = '1';

$representante = mysqli_query($mysqli, "INSERT INTO representante(nome, cargo, cpf, telefone, codEmpresa, email, status) VALUES('$nomerepresentante', '$cargorepresentate', '$cpfrepresentante', '$telefonerepresentante', '$codempresa', '$emailrepresentante', '$status')");


header("Location: selectRepresentante.php");
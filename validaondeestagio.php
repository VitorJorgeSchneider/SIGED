<?php 
include('protect.php');
include('conexao.php');

$mat = $_SESSION['matriculadoaluno'];
$estagio_sql = "SELECT * FROM estagio WHERE codEstagiario = '$mat'";
$estagio_query = $mysqli->query($estagio_sql) or die("Falha na execução do código SQL: ". $mysqli->error);
$estagio = $estagio_query->fetch_assoc();
$codempresa = $estagio['codEmpresa'];

$setorondeestagio = $_POST['setorondeestagio'];
$ruaondeestagio = $_POST['ruaondeestagio'];
$numeroondeestagio = $_POST['numeroendestagio'];
$bairroondeestagio = $_POST['bairroondeestagio'];
$municipioondeestagio = $_POST['municipioondeestagio'];
$estadoondeestagio = $_POST['estadoondeestagio'];
$cepondeestagio = $_POST['cepondeestagio'];


$status = '1';

$local = mysqli_query($mysqli, "INSERT INTO ondeestagio(setor, rua, numero, bairro, cidade, estado, cep, codEmpresa, status) VALUES('$setorondeestagio', '$ruaondeestagio', '$numeroondeestagio', '$bairroondeestagio', '$municipioondeestagio', '$estadoondeestagio', '$cepondeestagio', '$codempresa', '$status')");

header("Location: selectOndeestagio.php");
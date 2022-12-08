<?php
include('conexao.php');
include('protect.php');

$mat = $_SESSION['matriculadoaluno'];
$codigoondeestagio = $_POST['ondeestagio'];

$fixa = mysqli_query($mysqli, "UPDATE estagio SET codOndeEstagio = '$codigoondeestagio' WHERE codEstagiario = '$mat'");

header("Location: selectSupervisor.php");
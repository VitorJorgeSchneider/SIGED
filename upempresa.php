<?php
include('conexao.php');
include('protect.php');

$mat = $_SESSION['matriculadoaluno'];
$codigoempresa = $_POST['empresa'];

$fixa = mysqli_query($mysqli, "UPDATE estagio SET codEmpresa = '$codigoempresa' WHERE codEstagiario = '$mat'");

header("Location: selectRepresentante.php");
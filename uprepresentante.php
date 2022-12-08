<?php
include('conexao.php');
include('protect.php');

$mat = $_SESSION['matriculadoaluno'];
$codigorepresentante = $_POST['representante'];

$fixa = mysqli_query($mysqli, "UPDATE estagio SET codRepresentante = '$codigorepresentante' WHERE codEstagiario = '$mat'");

header("Location: selectOndeestagio.php");
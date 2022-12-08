<?php
include('conexao.php');
include('protect.php');

$mat = $_SESSION['matriculadoaluno'];
$codigosupervisor = $_POST['supervisor'];

$fixa = mysqli_query($mysqli, "UPDATE estagio SET codSupervisor = '$codigosupervisor' WHERE codEstagiario = '$mat'");

header("Location: cadDadosestagio.php");
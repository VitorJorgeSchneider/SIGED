<?php 
include('protect.php');
include('conexao.php');

$mat = $_SESSION['matriculadoaluno'];

$inicio = $_POST['inicio'];
$fim = $_POST['fim'];
$hrdia = $_POST['hrsdia'];
$hrdiaescrito = $_POST['hrsdiaescrito'];
$hrsemana = $_POST['hrssemana'];
$hrsemanaescrito = $_POST['hrssemanaescrito'];
$hrtotal = $_POST['hrstotal'];
$hrtotalescrito =  $_POST['hrstotalescrito'];
$valorbolsa = $_POST['auxest'];
$valorbolsaescrito = $_POST['auxestescrito'];
$valoraux = $_POST['auxtp'];
$valorauxescrito = $_POST['auxtpescrito'];
$atividades = $_POST['atividades'];


$dados = mysqli_query($mysqli, "INSERT INTO dadosestagio(matricula, inicio, fim, hrdia, hrdiaescrito, hrsemana, hrsemanaescrito, hrtotal, hrtotalescrito, valorbolsa, valorbolsaescrito, valoraux, valorauxescrito, atividades) VALUES('$mat', '$inicio', '$fim', '$hrdia', '$hrdiaescrito', '$hrsemana', '$hrsemanaescrito', '$hrtotal', '$hrtotalescrito', '$valorbolsa', '$valorbolsaescrito', '$valoraux', '$valorauxescrito', '$atividades')");

header("Location: selectOrientador.php");
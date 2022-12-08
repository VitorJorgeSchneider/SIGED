<?php
include('conexao.php');
include('protect.php');
$id = $_POST['ass'];
$data = date("Y-m-d H:i:s");
$result = mysqli_query($mysqli, "UPDATE orientador SET status = 'completo', assinatura = '$data' WHERE idorientacao = '$id'");
header("Location: professor.php");

?>
<?php 
include('conexao.php');
include('protect.php');

$matricula = $_SESSION['matricula'];
$nome = $_SESSION['nome'];
$empresa = $_POST['empresa'];
$timefot = $_POST['timefot'];
$professor = $_POST['professor'];
$email = $_POST['email'];
$empresa_mail = $_POST['emailempresa'];

$result = mysqli_query($mysqli, "INSERT INTO arq1(matricula, empresa, timefot, professor, email, empresa_mail, nome) VALUES ('$matricula', '$empresa', '$timefot', '$professor', '$email', '$empresa_mail', '$nome')");
header("Location: emailcartadeapresentacao.php");

?>
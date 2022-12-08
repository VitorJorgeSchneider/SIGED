<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include('conexao.php');
include('protect.php');



$matriculaluno = $_SESSION['matriculadoaluno'];
$sql_code = "SELECT * FROM estagio WHERE codEstagiario = '$matriculaluno'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$estagiosup = $sql_query->fetch_assoc();

$codsup = $estagiosup['codSupervisor'];
$sql_code_sup = "SELECT * FROM supervisor WHERE codSupervisor = '$codsup'";
$sql_query_sup = $mysqli->query($sql_code_sup) or die("Falha na execução do código SQL: " . $mysqli->error);
$supervisor = $sql_query_sup->fetch_assoc();

$hash1 = password_hash($matriculaluno, PASSWORD_DEFAULT);

$mail = new PHPMailer(true);

try {
    
    $mail->CharSet = "UTF-8";                  
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'flotita.editor@gmail.com';                  
    $mail->Password   = 'hhzspbuaucpfefos';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom('flotita.editor@gmail.com', 'SIGED');
    $mail->addAddress($supervisor['email'], $supervisor['nome']);     
    
    

    $mail->isHTML(true);                                  
    $mail->Subject = 'Solicitação de Assinatura do Termo de Compromisso!';
    $mail->Body = "Olá! ". $supervisor['nome'] ." <br> Existe uma solicitação de assinatura para você!<a href = "."http://168.228.253.7/~vitor/assSupervisor.php?aluno=$hash1".">Clique aqui!</a>
     Para ser redirecionado(a) ao portal! Não compartilhe este link com ninguém!";
    $mail->send();
	header("Location: assinaOrientador.php");
} catch (Exception $e) {
    echo "Erro ao enviar o E-mail: {$mail->ErrorInfo}";
    header("Location: assinaOrientador.php");
}
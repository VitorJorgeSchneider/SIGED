<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include('conexao.php');
include('protect.php');


$matriculaluno = $_SESSION['matriculadoaluno'];
$sql_code = "SELECT * FROM assinantes WHERE cargo = 'Coordenador do curso'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$cordcurso = $sql_query->fetch_assoc();

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
    $mail->addAddress($cordcurso['email'], $cordcurso['nome']);     
    
    

    $mail->isHTML(true);                                  
    $mail->Subject = 'Solicitação de Assinatura do Termo de Compromisso!';
    $mail->Body = "Olá! ". $cordcurso['nome'] ." <br> Existe uma solicitação de assinatura para você!<a href = "."http://168.228.253.7/~vitor/assCordCurso.php?aluno=$hash1".">Clique aqui!</a>
     Para ser redirecionado(a) ao portal! Não compartilhe este link com ninguém!";
    $mail->send();
	header("Location: assinaCordExt.php");
} catch (Exception $e) {
    echo "Erro ao enviar o E-mail: {$mail->ErrorInfo}";
    header("Location: assinaCordExt.php");
}
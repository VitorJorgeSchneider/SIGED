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
$estagioorient = $sql_query->fetch_assoc();

$codorient = $estagioorient['codOrientador'];
$sql_code_orient = "SELECT * FROM professores WHERE id = '$codorient'";
$sql_query_orient = $mysqli->query($sql_code_orient) or die("Falha na execução do código SQL: " . $mysqli->error);
$orientador = $sql_query_orient->fetch_assoc();

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

    $mail->setFrom('flotita.editor@gmail.com', 'SIGED');
    $mail->addAddress($orientador['email'], $orientador['nome']);        
    

    $mail->isHTML(true);                                  
    $mail->Subject = 'Solicitação de Assinatura do Termo de Compromisso!';
    $mail->Body = "Olá! ". $orientador['nome'] ." <br> Existe uma solicitação de assinatura para você!<a href = "."http://168.228.253.7/~vitor/assOrientador.php?aluno=$hash1".">Clique aqui!</a>
     Para ser redirecionado(a) ao portal! Não compartilhe este link com ninguém!";
    $mail->send();
	header("Location: assinaCordCurso.php");
} catch (Exception $e) {
    echo "Erro ao enviar o E-mail: {$mail->ErrorInfo}";
    header("Location: assinaCordCurso.php");
}
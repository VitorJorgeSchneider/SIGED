<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include('conexao.php');
//include('protect.php');
$colunaprofessor['email'] = 'professorfefe898@gmail.com';
$colunaprofessor['nome'] = 'Carlos Araujo Fernandes';
$matricula = '2024653879';
$hash1 = password_hash($matricula, PASSWORD_DEFAULT);

//$matriculaluno = $_SESSION['matriculadoaluno'];
//$sql_code = "SELECT * FROM orientador WHERE matriculaaluno = $matriculaluno";

//$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

//$colunaorientacao = $sql_query->fetch_assoc();
//$iddoprofessor = $colunaorientacao['idprofessor'];

//$sql_code_professor = "SELECT * FROM professores WHERE id = $iddoprofessor";
//$sql_query_professor = $mysqli->query($sql_code_professor) or die("Falha na execução do código SQL: " . $mysqli->error);

//$colunaprofessor = $sql_query_professor->fetch_assoc();


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
    $mail->addAddress($colunaprofessor['email'], $colunaprofessor['nome']);     
    
    

    $mail->isHTML(true);                                  
    $mail->Subject = 'Solicitação de Assinatura da Carta de Apresentação!';
    //$mail->Body = "Olá! ". $colunaprofessor['nome'] ." <br> Existe uma solicitação de assinatura para você!<form action ='http://168.228.253.7/~vitor/uhu.php' method='GET'>
    //<button type='submit' name= 'aluno' value= 'cocó'>Clique Aqui!</button> Para ser redirecionado(a) ao portal!</form>";
    $mail->Body = "Olá! ". $colunaprofessor['nome'] ." <br> Existe uma solicitação de assinatura para você!<a href = "."http://168.228.253.7/~vitor/uhu.php?aluno=$hash1".">Clique aqui!</a>
     Para ser redirecionado(a) ao portal!";
    $mail->send();
	header("Location:introducao.php");
} catch (Exception $e) {
    echo "Erro ao enviar o E-mail: {$mail->ErrorInfo}";
    header("Location:introducao.php");
}


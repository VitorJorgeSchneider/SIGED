<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$valor = 'alma';
//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['obrigado'])){
    $mail = new PHPMailer(true);

    try {
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->CharSet = "UTF-8";                  
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'flotita.editor@gmail.com';                  
        $mail->Password   = 'hhzspbuaucpfefos';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('flotita.editor@gmail.com', 'SIGED');
        $mail->addAddress('nathallyn.schneider@gmail.com', 'Joe User');     
        $mail->addReplyTo('nathallyn.schneider@gmail.com', 'Information');
        
        

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Assunto Teste';
        $body = "É hora de testar pra ver se isso funciona Sr. <br>
        Nome:". $_POST['nome'] ."<br>
        Email:". $_POST['email'] ."<br>
        Mensagem:". $_POST['msg'] ."
        <a href='uhu.php?chave= $valor'>Clique aqui</a>";
        $mail->Body = "Olá minha namorada" .Nome;
        //$mail->Body    = 'http://168.228.253.7/~vitor/uhu.php?chave= '. $valor;
        $mail->send();
        echo 'E-mail enviado com sucesso';
    } catch (Exception $e) {
        echo "Erro ao enviar o E-mail: {$mail->ErrorInfo}";
    }
}else{
    echo "Erro ao enviar o e-mail, erro ao enviar o formulario!";
}
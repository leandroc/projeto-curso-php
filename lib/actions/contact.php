<?php
session_start();
header('Content-Type: text/html; Charset=UTF-8');

$mailSenderName    = $_POST['userName'];
$mailSenderEmail   = $_POST['userEmail'];
$mailSenderMessage = $_POST['userMsg'];

$mailMessage =
"<b>Nome:</b>" . $mailSenderName .
"<br />
<b>E-mail:</b>" . $mailSenderEmail .
"<br /><br />
<b>Mensagem:</b>
<br />"
. $mailSenderMessage;

// inclue a lib de email
require '../phpMailer/class.phpmailer.php';

$mail = new PHPMailer();

// define que a mensagem sera SMTP
$mail->IsSMTP();
// define se o e-mail usara autenticacao
$mail->SMTPAuth = true;
// define o servidor de envio da mensagem
$mail->Host     = 'mail.khi.by';
// define a porta utilizada pelo servidor
$mail->Port     = 26;
// define o usuario
$mail->Username = 'alunos@khi.by';
// define a senha
$mail->Password = 'alunos@php1';
// define o charset da mensagem
$mail->Encoding = 'UTF-8';
// define quem vai receber
$mail->AddAddress('leandro.cesar.ma@gmail.com', 'Leandro César');
// define o assunto
$mail->Subject = 'Testando o envio';

// configuracoes de envio do email
$mail->From = $mailSenderEmail;
$mail->FromName = $mailSenderName;
$mail->MsgHTML($mailMessage);

$_SESSION['enviado'] = $mail->Send();
header('Location: ../../contact.php');

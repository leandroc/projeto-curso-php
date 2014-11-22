<?php
// inclue a lib de email
require '/phpMailer/class.phpmailer.php';

function enviaEmail($emailEnviador, $nomeEnviador, $receiver, $assunto, $mensagem, $anexo = array()) {
	$mail = new PHPMailer();

	$mail->IsSMTP(); // define que a mensagem sera SMTP
	$mail->SMTPAuth = true; // define se o e-mail usara autenticacao
	$mail->Host     = 'mail.khi.by'; // define o servidor de envio da mensagem
	$mail->Port     = 26; // define a porta utilizada pelo servidor
	$mail->Username = 'alunos@khi.by'; // define o usuario
	$mail->Password = 'alunos@php1'; // define a senha
	$mail->CharSet  = 'UTF-8'; // define o charset da mensagem 

	$mail->AddAddress( $receiver[0], $receiver[1] ); // define quem vai receber

	// configuracoes de envio do email
	$mail->From     = $emailEnviador;
	$mail->FromName = $nomeEnviador;
	$mail->Subject  = $assunto;
	$mail->MsgHTML($mensagem);
	
	if( count($anexo) > 0 ) {
		foreach ( $anexo as $anexos ) {
			$mail->AddAttachment($anexos);
		}
	}

	$envio = $mail->Send();

	//var_dump( $mail ); exit;

	return $envio;
}
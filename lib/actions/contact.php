<?php
session_start();
header('Content-Type: text/html; Charset=UTF-8');
ini_set("upload_max_filesize", "5MB");
include '../functions.php';
include '../conn.php';

$anexos = array();

// avatar
$avatar        = $_FILES['userAvatar'];
$avatarName    = $avatar['name'];
$avatarType    = explode('/', $avatar['type']);
$avatarSize    = $avatar['size'];
$avatarTmp     = $avatar['tmp_name'];
$avatarPath    = "../../upload/img/";
$avatarDestiny = $avatarPath . $avatarName;

if ( !strstr($avatar['type'], 'image') ) {
	$_SESSION['feedback'] = "Fomarto de arquivo de imagem inválido!";
	
	header('Location: ../../contact.php');
} else {
	$avatarMoving  = move_uploaded_file($avatarTmp, $avatarDestiny);
	
	array_push( $anexos, $avatarMoving );
}

// curriculo
$curriculo     = $_FILES['userCurriculum'];
$curriculoName = $curriculo['name'];
$curriculoType = $curriculo['type'];
$curriculoSize = $curriculo['size'];
$curriculoTmp  = $curriculo['tmp_name'];
$curriculoPath    = "../../upload/pdf/";
$curriculoDestiny = $curriculoPath . $curriculoName;

if ( !strstr($curriculo['type'], 'pdf') ) {
	$_SESSION['feedback'] = "Fomarto de arquivo de documento inválido!";

	header('Location: ../../contact.php');
} else {
	$curriculoMoving  = move_uploaded_file($curriculoTmp, $curriculoDestiny);
	
	array_push( $anexos, $curriculoMoving );
}

//infos a serem salvos
//$mailRecebedor     = array('leandro.cesar.ma@gmail.com', 'Leandro César');
$mailRecebedor     = array('eder.franco@outlook.com', 'Eder Franco');
$mailSenderName    = $_POST['userName'];
$mailSenderEmail   = $_POST['userEmail'];
$userPhone         = $_POST['userPhone'];
$mailSenderSex     = $_POST['userSex'];
$mailSenderMessage = $_POST['userMsg'];
$mailSenderSubject = $_POST['userSubject'];
$mailSenderHour    = implode( ',', $_POST['melhorHorario']  );

if( count( $_POST['melhorHorario'] ) > 0 ) {
	$mailSenderHour = implode( ',', $_POST['melhorHorario']  );
}

$mailMessage =
	"<b>Nome:</b> " . $mailSenderName .
	"<br /><b>E-mail:</b> " . $mailSenderEmail .
	"<br /><b>Telefone:</b> " . $userPhone .
	"<br /><br /><b>Assunto:</b> " . $mailSenderSubject .
	"<br /><b>Melhor responder:</b> " . $mailSenderHour .
	"<br /><b>Meu avatar:</b> <img src='" . $avatarDestiny . "' />
	 <br /><b>Mensagem:</b><br /> " . $mailSenderMessage .
	"<br /><b>Anexo:</b> " . $curriculoName . " (" . $curriculoType . ", " . $curriculoSize . ").";


$_SESSION['enviado'] = enviaEmail($mailSenderEmail, $mailSenderName, $mailRecebedor, $mailSenderSubject, $mailMessage, $anexos);

if ( $_SESSION['enviado'] ) {
	// salva no banco
	$dataCadastro  = date('Y-m-d H:i:s');

	$sql = 'INSERT INTO
			contato (nome, email, sexo, assunto, melhorHorario, mensagem, telefone, dataCadastro)
		VALUES (
			"' . $mailSenderName . '",
			"' . $mailSenderEmail . '",
			"' . $mailSenderSex . '",
			"' . $mailSenderSubject . '",
			"' . $mailSenderHour . '",
			"' . $mailMessage . '",
			"' . $userPhone . '",
			"' . $dataCadastro . '"
		)';

	$retorno = mysql_query( $sql );

	//header('Location: ../../return.php?id=' . mysql_insert_id());
	header('Location: ../../contact.php');
} else {
	header('Location: ../../contact.php');
}
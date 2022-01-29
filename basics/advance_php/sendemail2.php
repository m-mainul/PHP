<?php 
	// error_reporting('all');
	require_once("../photo_gallery/includes/PHPMailer/PHPMailer/class.phpmailer.php");
	require_once("../photo_gallery/includes/PHPMailer/PHPMailer/class.smtp.php");
	require_once("../photo_gallery/includes/PHPMailer/PHPMailer/language/phpmailer.lang-en.php");

	$to_name = "Test";
	// $to = "hasanmbstu13@gmail.com";
	$to = "mainul.hasan@isl-bd.com";
	// $subject = "Mail Test at ".strftime("%T",time());
	$subject = "Mail Test at ";
	$message = "This is a test.";
	$message = wordwrap($message,70);
	$from_name = "Mainul Hasan";
	// $from =  "mainulmbstu11@gmail.com";
	// $from =  "<mainulmbstu11@gmail.com>";
	$from =  "mainul.hasan@isl-bd.com";
	
	// PHP mail version (default)
	$mail = new PHPMailer();

	// PHP SMTP version
	// $mail->isSMTP();
	// $mail->Host  		= "localhost";
	// $mail->Port  		= 25;
	// $mail->SMTPAuth 	= false;
	// // $mail->Username		= "hasanmbstu13@gmail.com";
	// $mail->Username		= "mainul.hasan@isl-bd.com";
	// $mail->Password		= "11309011";

	$mail->FromName  = $from_name;
	$mail->From      = $from;
	$mail->addAddress($to,$to_name);
	$mail->Subject   = $subject;
	$mail->Body      = $message;

	// echo (object)$mail;
	var_dump($mail);
	// exit;
	// $result = mail($to, $subject, $message, $headers);
	$result = $mail->Send();
	echo $result ? 'Sent' : 'Error';

?>
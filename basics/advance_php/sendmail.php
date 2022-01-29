<?php
	
	$to = "hasanmbstu13@gmail.com"; 

	// Windows may not handle this format well
	// $to = "Mainul Hasan <hasanmbstu13@gmail.com>";

	// multiple recipents
	// $to = "hasanmbstu13@gmail, mainulmbstu11@gmail.com";
	// $to = "Mainul Hasan <hasanmbstu13@gmail>,mainulmbstu11@gmail";

	$subject = "Mail Test at ".strftime("%T", time());

	$message = "This is a test."; 

	$from = "Mainul Hasan <hasanmbstu13@gmail.com>";
	// $from = "hasanmbstu13@gmail.com";
	$headers = "From: {$from}\n";
	$headers .= "Reply-To: {$from}\n";
	// $headers .= "Cc: {$to}\n";
	// $headers .= "Bcc: {$to}\n";
	$headers .= "X-Mailer: PHP/".phpversion()."\n";
	$headers .= "MIME-Version: 1.0\n";
	// $headers .= "Content-Type: text/plain; charset=iso-8859-1\n"; // sent a plain text
	$headers .= "Content-Type: text/html; charset=iso-8859-1\n"; // mail server got a html page and render it
	
	$result = mail($to, $subject, $message, $headers);
	echo $result ? 'Sent' : 'Error';

?>
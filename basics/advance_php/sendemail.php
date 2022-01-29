<?php 
	
	$to = "hasanmbstu13@gmail.com";

	// Windows may not handle this format well
	// $to = "Kevin Skoglund <junkmai@novafabrica.com>";
	
	// multiple recipients
	// $to = "junkmail@novafabrica.com, nobody@novafabrica.com";
	// $to = "Kevin Skoglund <junkmai@novafabrica.com>,nobody@novafabrica.com";
	$subject = "Mail Test at ".strftime("%T",time());

	$message = "This is a test.";
	// Wrap a string into new lines when it reaches a specific length:
	// Optional: Wrap lines for old email programs
	// // wrap at 70/72/75/78
	$message = wordwrap($message,70);

	// $from = "mainulmbstu11@gmail.com";
	$from = "Mainul Hasan <mainulmbstu11@gmail.com>";
	$headers  = "From:{$from}";
	$headers .= "Reply-To: {$from}\n";
	$headers .= "Cc: {$to}\n";
	$headers .= "Bcc: {$to}\n";
	$headers .= "X-Mailer PHP/".phpversion();
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "Content-Type: text/plain; charset-iso-8859-1\n";
	// We can send html in content-type by identifying text/html
	// In the header last one never need to \n because it will return new line after the last line
	// $headers .= "Content-Type: text/html; charset-iso-8859-1\n";
	$headers .= "Content-Type: text/html; charset-iso-8859-1";

	$result = mail($to, $subject, $message, $headers);
	// $result = mail('mainul.hasan@isl-bd.com', 'Hello', 'Hi','From:mainulmbstu11@gmail.com');
	// $result = mail('mainul.hasan@isl-bd.com', 'Hello', 'Hi');
	$result = mail('hasanmbstu13@gmail.com', 'Hello', 'Hi','From:mainulmbstu11@gmail.com');
	// $result = mail('mainulmbstu11@gmail.com', 'Hello', 'Hi');
	$result = mail("mainulmbstu11@gmail.com", "Hello", "Hi");
	var_dump($result);
	var_export($result);
	print_r($result);
	// debug($result);
	
	echo $result ? 'Sent' : 'Error';
?>
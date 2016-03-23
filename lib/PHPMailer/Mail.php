<?php
require_once ('class.phpmailer.php');
require_once("class.smtp.php");



  function PHPMailerSendMail($to,$subject,$message,$myOwnHeaders){
	
	$mail = new PHPMailer();
	
	$body = $message;
	
	$mail->IsSMTP (); // telling the class to use SMTP
	
	//$mail->SMTPDebug = 2;
	
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username = "stages.miagebordeaux@gmail.com"; // GMAIL username
	$mail->Password = "M2I@g1/*"; // GMAIL password
	
	$mail->SetFrom ('stages.miagebordeaux@gmail.com', $myOwnHeaders);
	
	$mail->AddReplyTo ("stages.miagebordeaux@gmail.com", $myOwnHeaders);
	
	$mail->Subject = $subject;
	
	$mail->AltBody = $message; // optional, comment out and test
	
	$mail->MsgHTML ( $body );
	
	$address = $to;
	$mail->AddAddress ($address, $myOwnHeaders);
	return $mail->Send();
	
}
/*$mail->AddReplyTo ("alilou.amine2012@gmail.com", "First Last");

$mail->Subject = "PHPMailer Test Subject via smtp (Gmail), basic";

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML ( $body );

$address = "alilou.amine2012@gmail.com";
$mail->AddAddress ( $address, "John Doe" );
if(!$mail->Send()) {
//	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	echo "Message sent!";
}*/

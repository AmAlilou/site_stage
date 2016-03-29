<?php
set_include_path ( "." . PATH_SEPARATOR . ".." );


if (! isset ( $ROOT_PATH )){

require_once ("lib/PHPMailer/Mail.php");
}

if (isset ( $_POST ["action"] ) && ! empty ( $_POST ["action"] )) { // Checks if action value exists
	$action = $_POST ["action"];
	switch ($action) { 
		// Switch case for value of action
		case "sendMessage" :
			sendMessage();
			break;
	}
} 


function sendMessage() {
	
	header ( 'Content-Type: application/json' );
	
	$mailContact = $_POST["contactMail"];
	
	$msg =$_POST["comment"]."<br/><br/>Nom :". $_POST["name"]."<br/>Email : ".$_POST ["email"];
	
	$status =  PHPMailerSendMail ($mailContact, $_POST["subject"],$msg, "formulaire de contact" );
	
	echo json_encode ($status);
}
	


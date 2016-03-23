<?php
set_include_path ( "." . PATH_SEPARATOR . ".." );
if (! isset ( $ROOT_PATH ))

require_once ("lib/PHPMailer/Mail.php");


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
	//$return = $_POST;
	//$return ["json"] = json_encode ( $return );
	
	$status =  PHPMailerSendMail ("alilou.amine2012@gmail.com", $_POST["subject"], $_POST["name"]."\n". $_POST["comment"], "vcxvcxvx" );
	
	echo json_encode ($status);
}
	


<?php
set_include_path ( "." . PATH_SEPARATOR . ".." );
if (! isset ( $ROOT_PATH ))
	require_once ("inc/main.inc.php");
require_once ("inc/PHPLib/template.inc");

require_once ("lib/PHPMailer/Mail.php");

// Classe permettant d'envoyer un mail formaté à partir d'un template php
class Mailer {
	private $_template;
	
	// $templateFile est le lien relatif à $ROOT_PATH vers un fichier .tpl
	// ATTENTION : ne PAS préciser le .tpl à la fin du lien .. il sera rajouté automatiquement (pour des raisons de sécurité => on "impose" l'extension de cette manière)
	// $templateFile "type" : /templates/monTemplate pour viser /templates/monTemplate.tpl
	public function __construct($templateFile) {
		assert ( file_exists ( $GLOBALS ['ROOT_PATH'] . $templateFile . ".tpl" ) );
		$this->__initTemplate ( $GLOBALS ['ROOT_PATH'] . $templateFile . ".tpl" );
	}
	
	// Permet de remplacer une "variable" du template par sa valeur
	// Exemple de variable : {ma_variable}
	public function fillTemplateVar($variableName, $value) {
		$this->_template->set_var ( $variableName, Mailer::__computeText ( $value ) );
	}
	
	// Envoie le mail
	// A noter que si la variable de la table config "MAIL DEBUG" est a 1, tout mail sera automatiquement envoyé aux mails des administrateurs
	public function sendMail($to, $from, $replyTo, $mailSubject, $myOwnHeaders = "") {
		assert ( $to != "" && $from != "" && $replyTo != "" && $mailSubject != "" );
		
		$message = $this->_template->parse ( "message", "mail" );
		if ($myOwnHeaders == "") {
			$myOwnHeaders = "From: " . $from . "\r\nReply-To: " . $replyTo;
			if (DBConfig::getConfigValue ( "MAIL DEBUG" ))
				$myOwnHeaders .= "\r\nBcc: " . DBConfig::getConfigValue ( "MAIL ADMINISTRATEURS" );
		}
		
		return PHPMailerSendMail ( $to, $mailSubject, $message, $myOwnHeaders );
		// mail($to, $mailSubject, $message, $myOwnHeaders);
	}
	
	private function __initTemplate($tpl) {
		$this->_template = new template ( substr ( $tpl, 0, strrpos ( $tpl, "/" ) ) );
		$this->_template->set_file ( "mail", $tpl );
	}
	private static function __computeText($res) {
		// Caractères spéciaux en base
		$res = str_replace ( "Ã‰", "É", $res );
		$res = str_replace ( "Ã©", "é", $res );
		$res = str_replace ( "Ãˆ", "È", $res );
		$res = str_replace ( "Ã¨", "è", $res );
		$res = str_replace ( "Ã‹", "Ë", $res );
		$res = str_replace ( "Ã«", "ë", $res );
		$res = str_replace ( "Ã€", "À", $res );
		$res = str_replace ( "Ã‚", "Â", $res );
		$res = str_replace ( "Ã¢", "â", $res );
		$res = str_replace ( "Ã›", "Û", $res );
		$res = str_replace ( "Ã»", "û", $res );
		$res = str_replace ( "Ã™", "Ù", $res );
		$res = str_replace ( "Ã¹", "ù", $res );
		$res = str_replace ( "ÃŠ", "Ê", $res );
		$res = str_replace ( "Ãª", "ê", $res );
		$res = str_replace ( "ÃŽ", "Î", $res );
		$res = str_replace ( "Ã®", "î", $res );
		$res = str_replace ( "Ã\”", "Ô", $res );
		$res = str_replace ( "Ã´", "ô", $res );
		$res = str_replace ( "Ã‡", "Ç", $res );
		$res = str_replace ( "Ã§", "ç", $res );
		$res = str_replace ( "Ã?", "Ï", $res );
		$res = str_replace ( "Ã¯", "ï", $res );
		$res = str_replace ( "â„¢", "™", $res );
		$res = str_replace ( "â‚¬", "€", $res );
		$res = str_replace ( "Ã", "à", $res );
		
		return $res;
	}
}
?>
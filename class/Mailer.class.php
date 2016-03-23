<?php
set_include_path ( "." . PATH_SEPARATOR . ".." );
if (! isset ( $ROOT_PATH ))
	require_once ("inc/main.inc.php");
require_once ("inc/PHPLib/template.inc");

require_once ("lib/PHPMailer/Mail.php");

// Classe permettant d'envoyer un mail format� � partir d'un template php
class Mailer {
	private $_template;
	
	// $templateFile est le lien relatif � $ROOT_PATH vers un fichier .tpl
	// ATTENTION : ne PAS pr�ciser le .tpl � la fin du lien .. il sera rajout� automatiquement (pour des raisons de s�curit� => on "impose" l'extension de cette mani�re)
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
	// A noter que si la variable de la table config "MAIL DEBUG" est a 1, tout mail sera automatiquement envoy� aux mails des administrateurs
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
		// Caract�res sp�ciaux en base
		$res = str_replace ( "É", "�", $res );
		$res = str_replace ( "é", "�", $res );
		$res = str_replace ( "È", "�", $res );
		$res = str_replace ( "è", "�", $res );
		$res = str_replace ( "Ë", "�", $res );
		$res = str_replace ( "ë", "�", $res );
		$res = str_replace ( "À", "�", $res );
		$res = str_replace ( "Â", "�", $res );
		$res = str_replace ( "â", "�", $res );
		$res = str_replace ( "Û", "�", $res );
		$res = str_replace ( "û", "�", $res );
		$res = str_replace ( "Ù", "�", $res );
		$res = str_replace ( "ù", "�", $res );
		$res = str_replace ( "Ê", "�", $res );
		$res = str_replace ( "ê", "�", $res );
		$res = str_replace ( "Î", "�", $res );
		$res = str_replace ( "î", "�", $res );
		$res = str_replace ( "�\�", "�", $res );
		$res = str_replace ( "ô", "�", $res );
		$res = str_replace ( "Ç", "�", $res );
		$res = str_replace ( "ç", "�", $res );
		$res = str_replace ( "�?", "�", $res );
		$res = str_replace ( "ï", "�", $res );
		$res = str_replace ( "™", "�", $res );
		$res = str_replace ( "€", "�", $res );
		$res = str_replace ( "�", "�", $res );
		
		return $res;
	}
}
?>
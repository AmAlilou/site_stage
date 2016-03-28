<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

/**
 * @package FormObjects
 * @abstract Classe de parametrage du formulaire de configuration des différents responsables du site
 * @var String nom du champ  des mails admin
 * @var String nom du champ des permanences
 * @var String nom du champ du mail secretariat
 * @var String nom du champ du login de l'admin
 * @var String nom du champ de l'ancien mot de passe admin
 * @var String nom du champ du nouveau mot de passe admin
 * @var String nom du champ de la confirmation du nouveau mot de passe admin
 * @var String nom du champ du login secretariat
 * @var String nom du champ de l'ancien mot de passe secretariat
 * @var String nom du champ du nouveau mot de passe secretariat
 * @var String nom du champ de la confirmation du nouveau mot de passe secretariat
 */
class FOConfigContacts extends FormObject{
	public static $CHAMP_FORM_MAILS_ADMIN = "mails_admin";
    public static $CHAMP_FORM_PERMANENCES = "permanences";
    public static $CHAMP_FORM_MAIL_SECRETARIAT = "mail_secretariat";
    public static $CHAMP_FORM_LOGIN_ADMIN = "login_admin";
    public static $CHAMP_FORM_OLD_PASSWD_ADMIN = "old_passwd_admin";
    public static $CHAMP_FORM_NEW_PASSWD_ADMIN = "new_passwd_admin";
    public static $CHAMP_FORM_NEW_PASSWD_ADMIN_CONFIRM = "confirm_passwd_admin";
    public static $CHAMP_FORM_LOGIN_SEC = "login_secretaire";
    public static $CHAMP_FORM_OLD_PASSWD_SEC = "old_passwd_secretaire";
    public static $CHAMP_FORM_NEW_PASSWD_SEC = "new_passwd_secretaire";
    public static $CHAMP_FORM_NEW_PASSWD_SEC_CONFIRM = "confirm_passwd_secretaire";
        
    private $_mailsAdmin;
    private $_permanences;
    private $_mailSecretariat;
    private $_loginAdmin;
    private $_oldPasswdAdmin;
    private $_newPasswdAdmin;
    private $_newPasswdAdminConfirm;
    private $_loginSec;
    private $_oldPasswdSec;
    private $_newPasswdSec;
    private $_newPasswdSecConfirm;
    
    /**
     * @abstract Methode d'initialisation du formulaire de configuratoin des diffÃ©rents responsables du site
     * @access public
     */
    
    public function init(){
    	$this->_mailsAdmin = isset($_POST[FOConfigContacts::$CHAMP_FORM_MAILS_ADMIN])?$_POST[FOConfigContacts::$CHAMP_FORM_MAILS_ADMIN]:"";
    	$this->_permanences = isset($_POST[FOConfigContacts::$CHAMP_FORM_PERMANENCES])?$_POST[FOConfigContacts::$CHAMP_FORM_PERMANENCES]:"";
    	$this->_mailSecretariat = isset($_POST[FOConfigContacts::$CHAMP_FORM_MAIL_SECRETARIAT])?$_POST[FOConfigContacts::$CHAMP_FORM_MAIL_SECRETARIAT]:"";
		$this->_loginAdmin = isset($_POST[FOConfigContacts::$CHAMP_FORM_LOGIN_ADMIN])?$_POST[FOConfigContacts::$CHAMP_FORM_LOGIN_ADMIN]:"";
    	$this->_oldPasswdAdmin = isset($_POST[FOConfigContacts::$CHAMP_FORM_OLD_PASSWD_ADMIN])?$_POST[FOConfigContacts::$CHAMP_FORM_OLD_PASSWD_ADMIN]:"";
    	$this->_newPasswdAdmin = isset($_POST[FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_ADMIN])?$_POST[FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_ADMIN]:"";
    	$this->_newPasswdAdminConfirm = isset($_POST[FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_ADMIN_CONFIRM])?$_POST[FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_ADMIN_CONFIRM]:"";
    	$this->_loginSec = isset($_POST[FOConfigContacts::$CHAMP_FORM_LOGIN_SEC])?$_POST[FOConfigContacts::$CHAMP_FORM_LOGIN_SEC]:"";
    	$this->_oldPasswdSec = isset($_POST[FOConfigContacts::$CHAMP_FORM_OLD_PASSWD_SEC])?$_POST[FOConfigContacts::$CHAMP_FORM_OLD_PASSWD_SEC]:"";
    	$this->_newPasswdSec = isset($_POST[FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_SEC])?$_POST[FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_SEC]:"";
    	$this->_newPasswdSecConfirm = isset($_POST[FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_SEC_CONFIRM])?$_POST[FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_SEC_CONFIRM]:"";
    }
    /**
     * @abstract Methode de verification de la validite des données saisies dans le formulaire
     * @access public
     * @return boolean True si les donnï¿½es sont valides
     */
    public function isValid(){

    	if (($this->_mailsAdmin != "") and (!FormObject::isMail($this->_mailsAdmin)))
    		$this->setErrorMessage("Erreur : Les mails admin doivent être des mails séparés d'une virgule");
    	if (($this->_mailSecretariat != "") and (!FormObject::isMail($this->_mailSecretariat)))
    		$this->setErrorMessage("Erreur : Le mail du secretariat n'est pas un email valide");
    	if (($this->_loginAdmin != "") and (!FormObject::isString($this->_loginAdmin)))
    		$this->setErrorMessage("Erreur : Le login doit etre une chaine de caracteres");
    	if (($this->_newPasswdAdmin != "") and ($this->_newPasswdAdminConfirm != "") and ($this->_newPasswdAdminConfirm!=$this->_newPasswdAdmin))
			$this->setErrorMessage("Erreur : Le nouveau mot de passe administrateur a ete mal saisi et donc non confirme");
		if (($this->_newPasswdSec != "") and ($this->_newPasswdSecConfirm != "") and ($this->_newPasswdSecConfirm!=$this->_newPasswdSec))
			$this->setErrorMessage("Erreur : Le nouveau mot de passe secretaire a été mal saisi et donc non confirmé");
		if (($this->_oldPasswdAdmin != "") and (!DBConfig::validPasswordAdmin($this->_oldPasswdAdmin)))
			$this->setErrorMessage("Erreur : L'ancien mot de passe administrateur n'est pas valide");
		// A. Pecher: desactivation controle de l'ancien mot de passe secretaire	
		// if (($this->_oldPasswdSec != "") and (!DBConfig::validPasswordSecretaire($this->_oldPasswdSec)))
	//		$this->setErrorMessage("Erreur : L'ancien mot de passe secrï¿½taire n'est pas valide");
		return $this->getErrorMessage()=="";			
    }
    /**
     * @abstract Mï¿½thode de traitement des donnï¿½es saisies dans le formulaire. Met Ã  jour les champs des contacts remplis
     * @access public
     */
    
    
    public function process(){
    	if ($this->_mailsAdmin != ""){
    		DBConfig::updateRecord("MAIL ADMINISTRATEURS",$this->_mailsAdmin);
    		$this->setOKMessage("Informations sur les administrateurs modifiées");
    	}  
    	if ($this->_permanences != ""){
			DBConfig::updateRecord("PERMANENCES",$this->_permanences);
			$this->setOKMessage("Informations sur les administrateurs modifiées");
		}
    	if ($this->_mailSecretariat != ""){
    		DBConfig::updateRecord("MAIL SECRETARIAT",$this->_mailSecretariat);
    		$this->setOKMessage("Mail du secrétariat mis à jour");
    	}
    	if (($this->_loginAdmin != "") and ($this->_newPasswdAdmin != "")){
    		DBConfig::updateRecord("LOGIN ADMIN",$this->_loginAdmin);
    		DBConfig::updateRecord("PASSWORD ADMIN",md5($this->_newPasswdAdmin));
    		$this->setOKMessage("Login//Mot de passe Admin mis à jour");
    	}
    	if (($this->_loginSec != "") and ($this->_newPasswdSec != "")){
    		DBConfig::updateRecord("LOGIN SECRETAIRE",$this->_loginSec);
    		DBConfig::updateRecord("PASSWORD SECRETAIRE",md5($this->_newPasswdSec));
    		$this->setOKMessage("Login//Mot de passe Secretaire mis à jour");
    	}
    }
}
?>

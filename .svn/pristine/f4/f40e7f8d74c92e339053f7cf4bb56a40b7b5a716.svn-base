<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOConnexionSecretaire extends FormObject{
    public static $CHAMP_FORM_LOGIN_SECRETAIRE = "identifiant_secretaire";
    public static $CHAMP_FORM_PASSWORD_SECRETAIRE = "motdepasse_secretaire";
        
    private $_identSec;
    private $_mdpSec;
    private $_user=null;
    
    public function init(){
        $this->_identSec = $_POST[FOConnexionSecretaire::$CHAMP_FORM_LOGIN_SECRETAIRE];
        $this->_mdpSec = $_POST[FOConnexionSecretaire::$CHAMP_FORM_PASSWORD_SECRETAIRE];
    }
    
    public function isValid(){
        if(!FormObject::isString($this->_identSec))
	        $this->setErrorMessage("Erreur : chaine attendue pour le login de connexion !");
        if(!FormObject::isString($this->_mdpSec))
	        $this->setErrorMessage("Erreur : chaîne attendue pour le mot de passe de connexion !");
         
        if($this->getErrorMessage() != "")
            return false;
            
        $this->_user = DBConfig::authSecretaire($this->_identSec, $this->_mdpSec);
        if($this->_user == null)
            $this->setErrorMessage("Erreur : login/mot de passe incorrect !<script type=\"text/javascript\">setTimeout(\"window.location.href = '".$GLOBALS['URL_ROOT_PATH']."/connexionSecretaire.php';\", 2000);</script>");

        return ($this->getErrorMessage() == "");
    }
    
    public function process(){
        assert($this->_user != null);
        SessionManager::registerSecretaire($this->_user);
        $this->setOKMessage("Connexion réussie");
        header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/secretaire/accueilSecretaire.php');
    }
}
?>
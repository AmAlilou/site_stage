<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOConnexionEnseignant extends FormObject{
    public static $CHAMP_FORM_LOGIN_ENSEIGNANT = "identifiant_enseignant";
    public static $CHAMP_FORM_PASSWORD_ENSEIGNANT = "motdepasse_enseignant";
        
    private $_identenseignant;
    private $_mdpenseignant;
    
    public function init(){
        $this->_identenseignant = $_POST[FOConnexionEnseignant::$CHAMP_FORM_LOGIN_ENSEIGNANT];
        $this->_mdpenseignant = $_POST[FOConnexionEnseignant::$CHAMP_FORM_PASSWORD_ENSEIGNANT];
    }
    
    public function isValid(){
         if(!FormObject::isInteger($this->_identenseignant))
	        $this->setErrorMessage("Erreur : entier attendu pour le login de connexion !");
         if(!FormObject::isInteger($this->_mdpenseignant))
	        $this->setErrorMessage("Erreur : entier attendu pour le mot de passe de connexion !");
         
         return ($this->getErrorMessage() == "");
    }
    
    public function process(){
    	$enseignant = DBEnseignant::authEnseignant($this->_identenseignant, $this->_mdpenseignant);
    	if ($enseignant!=NULL){
        	$this->setOKMessage("Connexion réussie");
        	SessionManager::registerEnseignant($enseignant);
        	header('location: accueilEnseignant.php');
    	}else{
    		$this->setErrorMessage("Connexion échouée");
    		header('location: ../connexionEnseignant.php?erreur=1');
    	}
    }
}
?>
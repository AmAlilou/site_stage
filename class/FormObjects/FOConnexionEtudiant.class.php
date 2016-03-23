<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOConnexionEtudiant extends FormObject{
    public static $CHAMP_FORM_LOGIN_ETUDIANT = "identifiant_etudiant";
    public static $CHAMP_FORM_PASSWORD_ETUDIANT = "motdepasse_etudiant";
        
    private $_identetudiant;
    private $_mdpetudiant;
    
    public function init(){
        $this->_identetudiant= $_POST[FOConnexionEtudiant::$CHAMP_FORM_LOGIN_ETUDIANT];
        $this->_mdpetudiant = $_POST[FOConnexionEtudiant::$CHAMP_FORM_PASSWORD_ETUDIANT];
    }
    
    public function isValid(){
         if(!FormObject::isString($this->_identetudiant))
	        $this->setErrorMessage("Erreur : chaine attendue pour le login de connexion !");
         if(!FormObject::isInteger($this->_mdpetudiant))
	        $this->setErrorMessage("Erreur : entier attendu pour le mot de passe de connexion !");
 
         return ($this->getErrorMessage() == "");
    }
    
    public function process(){
   	    $etudiant = DBEtudiant::authEtudiant($this->_identetudiant, $this->_mdpetudiant);
    	if ($etudiant!=NULL){
        	$this->setOKMessage("Connexion réussie");
        	SessionManager::registerEtudiant($etudiant);
         $etu = SessionManager::getEtudiant();
         $etu->setDateDerniereConnexion();
        	header('location: accueilEtudiant.php');
    	}else{
    		$this->setErrorMessage("Connexion échouée");
    		header('location: ../connexionEtudiant.php?erreur=1');
        }
     }
}
?>
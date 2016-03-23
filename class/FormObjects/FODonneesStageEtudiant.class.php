<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FODonneesStageEtudiant extends FormObject{
        
    public static $CHAMP_FORM_ID_ETUDIANT = "id_etudiant";
    public static $CHAMP_FORM_ADRESSESTAGE_ETUDIANT = "adresse_stage";
    public static $CHAMP_FORM_CPSTAGE_ETUDIANT = "codepostal_stage";
    public static $CHAMP_FORM_VILLESTAGE_ETUDIANT = "ville_stage";
    public static $CHAMP_FORM_MAILSTAGE_ETUDIANT = "email_stage";
    public static $CHAMP_FORM_TELSTAGE_ETUDIANT = "tel_stage";  

	private $_etudiant ;
    private $_idEtudiant;
    private $_adrstage;
    private $_cpstage;
    private $_villestage;
    private $_emailstage;
    private $_telstage;
    
    public function init(){
        $this->_idEtudiant= isset($_POST[FODonneesStageEtudiant::$CHAMP_FORM_ID_ETUDIANT])?$_POST[FODonneesStageEtudiant::$CHAMP_FORM_ID_ETUDIANT]:"";
        $this->_adrstage= isset($_POST[FODonneesEtudiant::$CHAMP_FORM_ADRESSESTAGE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_ADRESSESTAGE_ETUDIANT]:"";
        $this->_cpstage = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_CPSTAGE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_CPSTAGE_ETUDIANT]:"";
        $this->_villestage = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_VILLESTAGE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_VILLESTAGE_ETUDIANT]:"";
        $this->_emailstage = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_MAILSTAGE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_MAILSTAGE_ETUDIANT]:"";
        $this->_telstage = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_TELSTAGE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_TELSTAGE_ETUDIANT]:"";
    }
    
    public function isValid(){
    	if(!FormObject::isString($this->_adrstage) and ($this->_adrstage != ""))
            $this->setErrorMessage("Erreur : l'adresse doit etre une chaine !");
    	if(!FormObject::isInteger($this->_cpstage)and ($this->_cpstage != ""))
            $this->setErrorMessage("Erreur : le code postal doit etre un entier !");
        if(!FormObject::isString($this->_villestage)and ($this->_villestage != ""))
            $this->setErrorMessage("Erreur : le code postal doit etre un entier !");
        if(!FormObject::isMail($this->_emailstage)and ($this->_emailstage != ""))
            $this->setErrorMessage("Erreur : adresse email incorrecte !");
        
		//Traitement pour récupérer l'étudiant
		if(!SessionManager::isEtudiantLogged()) {
			if(SessionManager::isAdminLogged() or SessionManager::isSecretaireLogged())
				if($this->_idEtudiant=="") 
					$this->setErrorMessage("Erreur : aucun étudiant passé en paramêtre");
				else {
					$etudiants = DBEtudiant::getRecords($this->_idEtudiant) ;
					//Si on n'a pas récupéré d'étudiant
					if(count($etudiants)!=1)
						$this->setErrorMessage("Erreur : Problème de session expirée ou accès interdit");
					else 
						$this->_etudiant=$etudiants[0] ;
				}
			else
				$this->setErrorMessage("Erreur : Problème de session expirée ou accès interdit");	
		}
		else 
			$this->_etudiant = SessionManager::getEtudiant();
        
		return ($this->getErrorMessage() == "");
    }
    
    public function process(){
    	
		
		
    	$this->_etudiant->updateRecord(	$this->_etudiant->getNomEtudiant(),
		    							$this->_etudiant->getPrenomEtudiant(), 
		    							$this->_etudiant->getMailfacEtudiant(), 
		    							$this->_etudiant->getMailstableEtudiant(), 
		    							$this->_etudiant->getMiageEtudiant(), 
		    							$this->_emailstage, 
		    							$this->_etudiant->getSexeEtudiant(), 
		    							$this->_etudiant->getPromoEtudiant(), 
		    							$this->_telstage, 
		    							$this->_etudiant->getLoginEtudiant(), 
		    							$this->_etudiant->getPasswordEtudiant(), 
		    							$this->_adrstage, 
		    							$this->_cpstage, 
		    							$this->_villestage, 
		    							$this->_etudiant->getAdressefacEtudiant(), 
		    							$this->_etudiant->getCpfacEtudiant(), 
		    							$this->_etudiant->getVillefacEtudiant(), 
		    							$this->_etudiant->getAdressestableEtudiant(), 
		    							$this->_etudiant->getCpstableEtudiant(), 
		    							$this->_etudiant->getVillestableEtudiant(),
		    							$this->_etudiant->getDateDerniereConnexion(),
		    							$this->_etudiant->getDateDerniereRecuperationPass());
        $this->setOKMessage("Données étudiant modifiées");
    }
}
?>
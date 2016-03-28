<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOFicheStage extends FormObject{
	//champ d'id de la fiche utilisé en cas de modification UNIQUEMENT
	public static $CHAMP_FORM_ID_FICHE_STAGE = "idFicheStage";
	//Champ relatif au Type de stage
	public static $CHAMP_FORM_ID_TYPE_STAGE = "idTypeStage";
	//Champs relatifs au stage
	public static $CHAMP_FORM_DATE_DEBUT_STAGE = "dateDebutStage";
	public static $CHAMP_FORM_DATE_FIN_STAGE = "dateFinStage";
	public static $CHAMP_FORM_SUJET_STAGE = "sujetStage";
	public static $CHAMP_FORM_INTITULE_STAGE = "intituleStage";
	public static $CHAMP_FORM_TECHNO_STAGE = "technoStage";
	public static $CHAMP_FORM_AUTRE_TECHNO_STAGE = "autreTechnoStage";
	public static $CHAMP_FORM_DESC_TECHNO_STAGE = "descTechnoStage";
	public static $CHAMP_FORM_DOMAINE_STAGE = "domaineStage";
	public static $CHAMP_FORM_AUTRE_DOMAINE_STAGE = "autreDomaineStage";

	private $_etudiant;
    private $_idFicheStage;
    private $_idTypeStage;
    private $_dateDebutStage;
    private $_dateFinStage;
    private $_sujetStage;
    private $_intituleStage;
    private $_technoStage;
    private $_descTechnoStage;
    private $_domaineStage;
    private $_autreDomaineStage;
    private $_autreTechnoStage;
    
    public function init(){
        $this->_idFicheStage = isset($_POST[FOFicheStage::$CHAMP_FORM_ID_FICHE_STAGE])?$_POST[FOFicheStage::$CHAMP_FORM_ID_FICHE_STAGE]:"";
        $this->_idTypeStage = $_POST[FOFicheStage::$CHAMP_FORM_ID_TYPE_STAGE];
        $this->_dateDebutStage = isset($_POST[FOFicheStage::$CHAMP_FORM_DATE_DEBUT_STAGE])?$_POST[FOFicheStage::$CHAMP_FORM_DATE_DEBUT_STAGE]:"";
        $this->_dateFinStage = isset($_POST[FOFicheStage::$CHAMP_FORM_DATE_FIN_STAGE])?$_POST[FOFicheStage::$CHAMP_FORM_DATE_FIN_STAGE]:"";
        $this->_sujetStage = isset($_POST[FOFicheStage::$CHAMP_FORM_SUJET_STAGE])?$_POST[FOFicheStage::$CHAMP_FORM_SUJET_STAGE]:"";
        $this->_intituleStage = isset($_POST[FOFicheStage::$CHAMP_FORM_INTITULE_STAGE])?$_POST[FOFicheStage::$CHAMP_FORM_INTITULE_STAGE]:"";
        $this->_technoStage = isset($_POST[FOFicheStage::$CHAMP_FORM_TECHNO_STAGE])?$_POST[FOFicheStage::$CHAMP_FORM_TECHNO_STAGE]:"";
        $this->_descTechnoStage = isset($_POST[FOFicheStage::$CHAMP_FORM_DESC_TECHNO_STAGE])?$_POST[FOFicheStage::$CHAMP_FORM_DESC_TECHNO_STAGE]:"";
        $this->_domaineStage = $_POST[FOFicheStage::$CHAMP_FORM_DOMAINE_STAGE];
        $this->_autreDomaineStage = isset($_POST[FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE])?$_POST[FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE]:"";
        $this->_autreTechnoStage = isset($_POST[FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE])?$_POST[FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE]:"";
    }
    
    public function isValid(){
        if(($this->getPostFormManager()->getFormObjectResult("Operation")=="Modification") and !FormObject::isInteger($this->_idFicheStage))
            $this->setErrorMessage("Erreur : entier attendu pour l'id de la fiche de stage, attendu pour la modification !");
        if(!FormObject::isInteger($this->_idTypeStage))
            $this->setErrorMessage("Erreur : entier attendu pour l'id de Type de Stage , on a ".$this->_idTypeStage."!");
        if(!FormObject::isDate($this->_dateDebutStage))
            $this->setErrorMessage("Erreur : date attendue pour la date de debut de stage !");
        if(!FormObject::isDate($this->_dateFinStage))
            $this->setErrorMessage("Erreur : date attendue pour la date de fin de stage !");
        if(!FormObject::isString($this->_sujetStage))
            $this->setErrorMessage("Erreur : chaine attendue pour le sujet du stage !");
        if(!FormObject::isString($this->_intituleStage))
            $this->setErrorMessage("Erreur : chaine attendue pour l'intitule du stage !");
        if(!FormObject::isString($this->_technoStage))
            $this->setErrorMessage("Erreur : chaine attendue pour la techno du stage !");
        if(!FormObject::isString($this->_descTechnoStage))
            $this->setErrorMessage("Erreur : chaine attendue pour la description de la techno du stage !");
        if(!FormObject::isString($this->_domaineStage))
            $this->setErrorMessage("Erreur : chaine attendue pour le domaine du stage !");
        if($this->_domaineStage=="Autre" and (!FormObject::isString($this->_autreDomaineStage) or empty($this->_autreDomaineStage)))
            $this->setErrorMessage("Erreur : chaine attendue pour le nouveau domaine de stage !");
        if($this->_technoStage=="Autre" and (!FormObject::isString($this->_autreTechnoStage) or empty($this->_autreTechnoStage)))
            $this->setErrorMessage("Erreur : chaine attendue pour la nouvelle techno de stage !");
        
		//Traitement pour récupérer l'étudiant
		if(!SessionManager::isEtudiantLogged()) {
			if(SessionManager::isAdminLogged() or SessionManager::isSecretaireLogged()) {
				$fiches = DBFicheStage::getRecords($this->_idFicheStage) ;
				if(count($fiches) == 1) {
					$idEtudiant = $fiches[0]->getIdEtudiant() ;
					$etudiants = DBEtudiant::getRecords($idEtudiant) ;
					if(count($etudiants)) 
						$this->_etudiant = $etudiants[0] ;
					else 
						$this->setErrorMessage("Erreur : Etudiant non récupéré par le traitement du formulaire de la fiche de stage.");	
				}
				else 
					$this->setErrorMessage("Erreur : Etudiant non récupéré par le traitement du formulaire de la fiche de stage.");	
			}	
			else
				$this->setErrorMessage("Erreur : Problème de session expirée ou accès interdit");	
		}
		else 
			$this->_etudiant = SessionManager::getEtudiant();
        
		return ($this->getErrorMessage() == "");
    }
    
    public function process(){
        //on recupere l'entreprise créée dans la zone Tampon
        $entreprise = $this->getPostFormManager()->getFormObjectResult("Entreprise");
        //recupération du typeStage
        $liste_types_stage = DBTypeStage::getRecords($this->_idTypeStage);
        $typeStage = $liste_types_stage[0];
        if ($entreprise instanceof DBEntreprise) {
		//on recupère les autres parties si elles ont été instanciées
	    	$maitreStage = $this->getPostFormManager()->isFormObjectResult("Maitre de stage")?$this->getPostFormManager()->getFormObjectResult("Maitre de stage"):NULL;
	    	
			if (!($maitreStage instanceof DBContactEtp)){$maitreStage = NULL;}
		    
			$signataire = $this->getPostFormManager()->isFormObjectResult("Signataire")?$this->getPostFormManager()->getFormObjectResult("Signataire"): NULL;
		    
			if (!($signataire instanceof DBContactEtp)){$signataire = NULL;}
		    
			//on recupere le domaine de stage parmi la liste ou saisi à part
			if ($this->_autreDomaineStage!=""){$domaineStage = $this->_autreDomaineStage;}
	    	else {$domaineStage = $this->_domaineStage;}
   	        
			if ($this->_autreTechnoStage!=""){$technoStage = $this->_autreTechnoStage;}
			else {$technoStage = $this->_technoStage;}
			
   	        $operation = $this->getPostFormManager()->getFormObjectResult("Operation");
   	        echo XHTMLBuilder::getText("$operation en cours") . "<BR/>";
		    if ($operation == "Création"){

	    		//enregistrement de la fiche de stage
    			$resultat = DBFicheStage::addFicheStageSaisie(
    						   	    $typeStage,
						            $this->_etudiant,
    							    $entreprise,
    							    $maitreStage,
    						  	    $signataire,
    							    $this->_dateDebutStage,
    							    $this->_dateFinStage,
    							    $this->_intituleStage,
    							    $this->_sujetStage,
    							    $technoStage,
    							    $this->_descTechnoStage,
    						  	    $domaineStage);
    			$confirm=$resultat->sendMailCreationEtudiant();
    			if ($confirm)
    				$this->setOKMessage("Mail de confirmation bien envoyé à l'etudiant");
    			else $this->setOKMessage("Echec de l'envoi du mail de confirmation à l'etudiant");
    			$confirm=$resultat->sendMailCreationAdmin();
    			if ($confirm)
    				$this->setOKMessage("Mail de création bien envoyé à l'administrateur");
    			else $this->setOKMessage("Echec de l'envoi du mail de création à l'administrateur");
			}
		    elseif ($operation == "Modification"){
	
		    	$liste_fiches = DBFicheStage::getRecords($this->_idFicheStage);
	    		//mise a jour de la fiche de stage
    			$resultat = $liste_fiches[0]->updateFicheStageSaisie(
			  				        $typeStage,
							        $this->_etudiant,
    							    $entreprise,
    							    $maitreStage,
    						  	    $signataire,
    							    $this->_dateDebutStage,
    							    $this->_dateFinStage,
    							    $this->_intituleStage,
    							    $this->_sujetStage,
    							    $technoStage,
    							    $this->_descTechnoStage,
    						  	    $domaineStage);
			}
			else{
				echo"";
			}
            if ($resultat instanceof DBFicheStage){
   	            $this->setOKMessage("$operation de la fiche de stage effectuée avec succès !");
   		    }
         	else {
         	      $this->setErrorMessage("Erreur : L'enregistrement de la fiche de stage a échoué !");
         	}
     } else {$this->setErrorMessage("Erreur : L'entreprise n'a pas été placée dans la zone tampon !");}
}
}
?>

<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOFicheDevenir extends FormObject{
	public static $CHAMP_FORM_ID_DEVENIR = "id_devenir";
	
	public static $CHAMP_FORM_MAILSTABLE_DEVENIR = "mailstable_devenir";
    public static $CHAMP_FORM_NOMMARITAL_DEVENIR = "nommarital_devenir";
	public static $CHAMP_FORM_MIAGE_DEVENIR = "miage_devenir";
	public static $CHAMP_FORM_PROMO_DEVENIR = "promo_devenir";
    public static $CHAMP_FORM_OPTION_DEVENIR = "option_devenir";
    
    public static $CHAMP_FORM_ENTREPRISE_STAGE_DEVENIR = "entreprise_stage_devenir";
	public static $CHAMP_FORM_AUTRE_ENTREPRISE_STAGE_DEVENIR = "autre_entreprise_stage_devenir";
    public static $CHAMP_FORM_TAILLE_STAGE_DEVENIR = "taille_stage_devenir";
    public static $CHAMP_FORM_DOMAINE_STAGE_DEVENIR = "domaine_stage_devenir";
	public static $CHAMP_FORM_AUTRE_DOMAINE_STAGE_DEVENIR = "autre domaine_stage_devenir";
	
    public static $CHAMP_FORM_SITUATION_DEVENIR = "situation_devenir";
	
    public static $CHAMP_FORM_FORMATION_ACTUELLE_DEVENIR = "formation_actuelle_devenir";
	public static $CHAMP_FORM_AUTRE_FORMATION_ACTUELLE_DEVENIR = "autre_situation_devenir";
	
    public static $CHAMP_FORM_METIER_EMPLOI_DEVENIR = "metier_emploi_devenir";
	public static $CHAMP_FORM_AUTRE_METIER_EMPLOI_DEVENIR = "autre_metier_emploi_devenir";
    public static $CHAMP_FORM_ENTREPRISE_EMPLOI_DEVENIR = "entreprise_emploi_devenir";
	public static $CHAMP_FORM_AUTRE_ENTREPRISE_EMPLOI_DEVENIR = "autre_entreprise_devenir";
    public static $CHAMP_FORM_DOMAINE_EMPLOI_DEVENIR = "domaine_emploi_devenir";
	public static $CHAMP_FORM_AUTRE_DOMAINE_EMPLOI_DEVENIR = "autre_domaine_emploi_devenir";
    public static $CHAMP_FORM_VILLE_EMPLOI_DEVENIR = "ville_emploi_devenir";
	public static $CHAMP_FORM_AUTRE_VILLE_EMPLOI_DEVENIR = "autre_ville_emploi_devenir";
	public static $CHAMP_FORM_TELPRO_EMPLOI_DEVENIR = "telpro_emploi_devenir";
	public static $CHAMP_FORM_EMAILPRO_EMPLOI_DEVENIR = "emailpro_emploi_devenir";
	public static $CHAMP_FORM_SALAIRE_EMPLOI_DEVENIR = "salaire_emploi_devenir";
	public static $CHAMP_FORM_CADRE_EMPLOI_DEVENIR = "cadre_emploi_devenir";
	public static $CHAMP_FORM_CONTRAT_EMPLOI_DEVENIR = "contrat_emploi_devenir";
	public static $CHAMP_FORM_AUTRE_CONTRAT_EMPLOI_DEVENIR = "autre_contrat_emploi_devenir";
	public static $CHAMP_FORM_TROUVE_EMPLOI_DEVENIR = "trouve_emploi_devenir";
	public static $CHAMP_FORM_STAGE_EMPLOI_DEVENIR = "stage_emploi_devenir";
    
	private $_idDevenir;
	private $_mailstable;
    private $_nommarital;
	private $_miage;
	private $_promo;
    private $_option;
    private $_entreprise_stage;
	private $_autre_entreprise_stage;
    private $_taille_stage;
    private $_domaine_stage;
	private $_autre_domaine_stage;
    private $_situation;
    private $_formation_actuelle;
	private $_autre_formation_actuelle;
    private $_metier_emploi;
	private $_autre_metier_emploi;
    private $_entreprise_emploi;
	private $_autre_entreprise_emploi;
    private $_domaine_emploi;
	private $_autre_domaine_emploi;
    private $_ville_emploi;
	private $_autre_ville_emploi;
    private $_telpro_emploi;
	private $_emailpro_emploi;
	private $_salaire_emploi;
	private $_cadre_emploi;
	private $_contrat_emploi;
	private $_autre_contrat_emploi;
	private $_trouve_emploi;
	private $_stage_emploi;
    
    public function init(){
		$this->_idDevenir= isset($_POST[FOFicheDevenir::$CHAMP_FORM_ID_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_ID_DEVENIR]:"";
		$this->_mailstable= isset($_POST[FOFicheDevenir::$CHAMP_FORM_MAILSTABLE_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_MAILSTABLE_DEVENIR]:"";
        $this->_nommarital= isset($_POST[FOFicheDevenir::$CHAMP_FORM_NOMMARITAL_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_NOMMARITAL_DEVENIR]:"";
		$this->_miage= isset($_POST[FOFicheDevenir::$CHAMP_FORM_MIAGE_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_MIAGE_DEVENIR]:"";
		$this->_promo= isset($_POST[FOFicheDevenir::$CHAMP_FORM_PROMO_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_PROMO_DEVENIR]:"";
		$this->_option= isset($_POST[FOFicheDevenir::$CHAMP_FORM_OPTION_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_OPTION_DEVENIR]:"";
		$this->_entreprise_stage= isset($_POST[FOFicheDevenir::$CHAMP_FORM_ENTREPRISE_STAGE_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_ENTREPRISE_STAGE_DEVENIR]:"";
		$this->_autre_entreprise_stage= isset($_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_ENTREPRISE_STAGE_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_ENTREPRISE_STAGE_DEVENIR]:"";
		$this->_taille_stage= isset($_POST[FOFicheDevenir::$CHAMP_FORM_TAILLE_STAGE_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_TAILLE_STAGE_DEVENIR]:"";
		$this->_domaine_stage= isset($_POST[FOFicheDevenir::$CHAMP_FORM_DOMAINE_STAGE_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_DOMAINE_STAGE_DEVENIR]:"";
		$this->_autre_domaine_stage= isset($_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_DOMAINE_STAGE_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_DOMAINE_STAGE_DEVENIR]:"";
		$this->_situation= isset($_POST[FOFicheDevenir::$CHAMP_FORM_SITUATION_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_SITUATION_DEVENIR]:"";
		$this->_formation_actuelle= isset($_POST[FOFicheDevenir::$CHAMP_FORM_FORMATION_ACTUELLE_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_FORMATION_ACTUELLE_DEVENIR]:"";
		$this->_autre_formation_actuelle= isset($_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_FORMATION_ACTUELLE_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_FORMATION_ACTUELLE_DEVENIR]:"";
		$this->_metier_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_METIER_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_METIER_EMPLOI_DEVENIR]:"";
		$this->_autre_metier_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_METIER_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_METIER_EMPLOI_DEVENIR]:"";
		$this->_entreprise_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_ENTREPRISE_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_ENTREPRISE_EMPLOI_DEVENIR]:"";
		$this->_autre_entreprise_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_ENTREPRISE_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_ENTREPRISE_EMPLOI_DEVENIR]:"";
		$this->_domaine_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_DOMAINE_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_DOMAINE_EMPLOI_DEVENIR]:"";
		$this->_autre_domaine_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_DOMAINE_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_DOMAINE_EMPLOI_DEVENIR]:"";
		$this->_ville_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_VILLE_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_VILLE_EMPLOI_DEVENIR]:"";
		$this->_autre_ville_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_VILLE_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_VILLE_EMPLOI_DEVENIR]:"";
		$this->_telpro_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_TELPRO_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_TELPRO_EMPLOI_DEVENIR]:"";
		$this->_emailpro_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_EMAILPRO_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_EMAILPRO_EMPLOI_DEVENIR]:"";
		$this->_salaire_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_SALAIRE_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_SALAIRE_EMPLOI_DEVENIR]:"";
		$this->_cadre_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_CADRE_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_CADRE_EMPLOI_DEVENIR]:"";
		$this->_contrat_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_CONTRAT_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_CONTRAT_EMPLOI_DEVENIR]:"";
		$this->_autre_contrat_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_CONTRAT_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_AUTRE_CONTRAT_EMPLOI_DEVENIR]:"";
		$this->_trouve_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_TROUVE_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_TROUVE_EMPLOI_DEVENIR]:"";
		$this->_stage_emploi= isset($_POST[FOFicheDevenir::$CHAMP_FORM_STAGE_EMPLOI_DEVENIR])?$_POST[FOFicheDevenir::$CHAMP_FORM_STAGE_EMPLOI_DEVENIR]:"";
    }
    
    public function isValid(){
		if(!FormObject::isMail($this->_mailstable) and $this->_mailstable!="")
            $this->setErrorMessage("Erreur : adresse mail stable incorrecte !");
    	if(!FormObject::isString($this->_nommarital) and $this->_nommarital!="")
            $this->setErrorMessage("Erreur : le nom marital doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_miage) and $this->_miage!="")
            $this->setErrorMessage("Erreur : la promotion MIAGe doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_promo) and $this->_promo!="")
            $this->setErrorMessage("Erreur : l'ann&#233;e de la promotion doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_option) and $this->_option!="")
            $this->setErrorMessage("Erreur : l'option doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_entreprise_stage) and $this->_entreprise_stage!="")
            $this->setErrorMessage("Erreur : le nom de l'entreprise du stage doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_autre_entreprise_stage) and $this->_autre_entreprise_stage!="")
            $this->setErrorMessage("Erreur : le nom de l'entreprise du stage doit &#234;tre une chaine !");
		if(!FormObject::isInteger($this->_taille_stage) and $this->_taille_stage!="")
            $this->setErrorMessage("Erreur : le taille de l'entreprise du stage doit &#234;tre un entier !");
		if(!FormObject::isString($this->_domaine_stage) and $this->_domaine_stage!="")
            $this->setErrorMessage("Erreur : le domaine de l'entreprise du stage doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_autre_domaine_stage) and $this->_autre_domaine_stage!="")
            $this->setErrorMessage("Erreur : le domaine de l'entreprise du stage doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_situation) and $this->_situation!="")
            $this->setErrorMessage("Erreur : la situation doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_formation_actuelle) and $this->_formation_actuelle!="")
            $this->setErrorMessage("Erreur : la formation actuelle doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_autre_formation_actuelle) and $this->_autre_formation_actuelle!="")
            $this->setErrorMessage("Erreur : la formation actuelle doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_metier_emploi) and $this->_metier_emploi!="")
            $this->setErrorMessage("Erreur : le m&#233;tier de l'emploi doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_autre_metier_emploi) and $this->_autre_metier_emploi!="")
            $this->setErrorMessage("Erreur : le m&#233;tier de l'emploi doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_entreprise_emploi) and $this->_entreprise_emploi!="")
            $this->setErrorMessage("Erreur : le nom de l'entreprise de l'emploi doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_autre_entreprise_emploi) and $this->_autre_entreprise_emploi!="")
            $this->setErrorMessage("Erreur : le nom de l'entreprise de l'emploi doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_domaine_emploi) and $this->_domaine_emploi!="")
            $this->setErrorMessage("Erreur : le domaine de l'entreprise de l'emploi doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_autre_domaine_emploi) and $this->_autre_domaine_emploi!="")
            $this->setErrorMessage("Erreur : le domaine de l'entreprise de l'emploi doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_ville_emploi) and $this->_ville_emploi!="")
            $this->setErrorMessage("Erreur : la ville doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_autre_ville_emploi) and $this->_autre_ville_emploi!="")
            $this->setErrorMessage("Erreur : la ville doit &#234;tre une chaine !");
		if(!FormObject::isInteger($this->_telpro_emploi) and $this->_telpro_emploi!="")
            $this->setErrorMessage("Erreur : le t&#233;l&#233;phone de l'entreprise de l'emploi doit &#234;tre une chaine !");
		if(!FormObject::isMail($this->_emailpro_emploi) and $this->_emailpro_emploi!="")
            $this->setErrorMessage("Erreur : adresse mail emploi incorrecte !");
		if(!FormObject::isInteger($this->_salaire_emploi) and $this->_salaire_emploi!="")
            $this->setErrorMessage("Erreur : le salaire doit &#234;tre un entier !");
		if(!FormObject::isString($this->_cadre_emploi) and $this->_cadre_emploi!="")
            $this->setErrorMessage("Erreur : le cadre de l'emploi doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_contrat_emploi) and $this->_contrat_emploi!="")
            $this->setErrorMessage("Erreur : le type de contrat doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_autre_contrat_emploi) and $this->_autre_contrat_emploi!="")
            $this->setErrorMessage("Erreur : le type de contrat doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_trouve_emploi) and $this->_trouve_emploi!="")
            $this->setErrorMessage("Erreur : le moment o&#250; le stage a &#233;t&#233; trouv&#233; doit &#234;tre une chaine !");
		if(!FormObject::isString($this->_stage_emploi) and $this->_stage_emploi!="")
            $this->setErrorMessage("Erreur : la r&233; &#224; la derni&#232; question doit &#234;tre une chaine !");
        return ($this->getErrorMessage() == "");
    }
    
    public function process(){
		//on recupere les champs pouvant être rempli parmi la liste ou saisi à part
		if ($this->_autre_formation_actuelle!=""){$formationActuelle = $this->_autre_formation_actuelle;}
			else {$formationActuelle = $this->_formation_actuelle;}
		if ($this->_autre_entreprise_emploi!=""){$entrepriseEmploi = $this->_autre_entreprise_emploi;}
			else {$entrepriseEmploi = $this->_entreprise_emploi;}
		if ($this->_autre_domaine_emploi!=""){$domaineEmploi = $this->_autre_domaine_emploi;}
			else {$domaineEmploi = $this->_domaine_emploi;}
		if ($this->_autre_ville_emploi!=""){$villeEmploi = $this->_autre_ville_emploi;}
			else {$villeEmploi = $this->_ville_emploi;}
		if ($this->_autre_contrat_emploi!=""){$contratEmploi = $this->_autre_contrat_emploi;}
			else {$contratEmploi = $this->_contrat_emploi;}
		
		$operation = $this->getPostFormManager()->getFormObjectResult("Operation");
   	    //echo XHTMLBuilder::getText("$operation en cours.") . "<BR/>";
	    $etudiant = SessionManager::getEtudiant();
		
		if($operation=="Création"){
	    	$resultat = DBFicheDevenir::createRecord(
									$etudiant->getMailstableEtudiant(),
									$this->_nommarital,
									$this->_miage,
									$this->_promo,
									$this->_option,
									$this->_entreprise_stage,
									$this->_taille_stage,
									$this->_domaine_stage,
									$this->_situation,
									$formationActuelle,
									$this->_metier_emploi,
									$entrepriseEmploi,
									$domaineEmploi,
									$villeEmploi,
									$this->_telpro_emploi,
									$this->_emailpro_emploi,
									$this->_salaire_emploi,
									$this->_cadre_emploi,
									$contratEmploi,
									$this->_trouve_emploi,
									$this->_stage_emploi);
	        $this->setOKMessage("$operation de la fiche Devenir effectuée avec succès !");
		}
		elseif($operation=="Modification"){
			$liste_fiches = DBFicheDevenir::getRecords($this->_idDevenir);
	    	//mise a jour de la fiche de stage
    		$resultat = $liste_fiches[0]->updateRecord(
									$etudiant,
									$etudiant->getMailstableEtudiant(),
									$this->_nommarital,
									$this->_miage,
									$this->_promo,
									$this->_option,
									$this->_entreprise_stage,
									$this->_taille_stage,
									$this->_domaine_stage,
									$this->_situation,
									$formationActuelle,
									$this->_metier_emploi,
									$entrepriseEmploi,
									$domaineEmploi,
									$villeEmploi,
									$this->_telpro_emploi,
									$this->_emailpro_emploi,
									$this->_salaire_emploi,
									$this->_cadre_emploi,
									$contratEmploi,
									$this->_trouve_emploi,
									$this->_stage_emploi);
			$this->setOKMessage("$operation de la fiche Devenir effectuée avec succès !");
		}
		else{
			echo"";
		}
    }
}
?>
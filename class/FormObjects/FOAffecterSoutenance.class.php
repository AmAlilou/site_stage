<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

/**
* @package FormObjects
* @abstract Classe permettant de paramétrer le formulaire d'affectation de soutenance (date et lieu). Hérite de la classe abstraite FormObject.
* @var String nom du champ contenant le type de soutenance
* @var String nom du champ contenant  l'etudiant 
* @var String nom du champ contenant la date de la soutenance 
* @var String nom du champ contenant l'heure du début de la soutenance
* @var String nom du champ contenant la minute du début de la soutenance
* @var String nom du champ contenant le lieu de la soutenance
*/

class FOAffecterSoutenance extends FormObject{
    public static $CHAMP_FORM_ID_TYPE = "id_type";
    public static $CHAMP_FORM_ID_STAGE = "id_etudiant";
    public static $CHAMP_FORM_DATE = "date";
    public static $CHAMP_FORM_HH_DEB = "heure_debut";
    public static $CHAMP_FORM_MM_DEB = "minute_debut";
    public static $CHAMP_FORM_LIEU = "lieu";
 
    private $_idStage;
    private $_date;
    private $_heureDebut;
    private $_minuteDebut;
    private $_lieu;
    private $_idTypeStage;
	
	
    /**
	* @abstract Fonction d'initialisation du paramètrage des champs pour le formulaire de détermination des éléments de la soutenance
	* @access public
	*/
    public function init(){
        $this->_idStage = $_POST[FOAffecterSoutenance::$CHAMP_FORM_ID_STAGE];
        $this->_date = $_POST[FOAffecterSoutenance::$CHAMP_FORM_DATE];
        $this->_heureDebut = $_POST[FOAffecterSoutenance::$CHAMP_FORM_HH_DEB];
        $this->_minuteDebut = $_POST[FOAffecterSoutenance::$CHAMP_FORM_MM_DEB];
        $this->_lieu = $_POST[FOAffecterSoutenance::$CHAMP_FORM_LIEU];
        $this->_idTypeStage = $_POST[FOSaisirVisite::$CHAMP_FORM_ID_TYPE];
    }
    
	/**
	* @abstract Méthode vérifiant si les données saisies dans le formulaire sont valides ou non
	* @return boolean True si il n'y pas de problemes sur les champs de saisie
	* @access public
	*/
    public function isValid(){
        if(!FormObject::isString($this->_lieu))
            $this->setErrorMessage("Erreur : chaine attendue pour le lieu !");  
         if(!FormObject::isDate($this->_date))
            $this->setErrorMessage("Erreur : la date n'est pas valide !");
        return ($this->getErrorMessage() == "");
    }
	
    /**
	* @abstract Après validation des champs de saisie du formulaire, cette méthode affecte les lieux et la date de soutenance
	* @access public
	*/
    public function process(){
    
        list($jour, $mois, $annee) = split('[/.-]',  $this->_date);     
        //$dateT = "$jour/$mois/$annee $this->_heureDebut:$this->_minuteDebut:00";
        $dateT = timeToFormattedDateTime(mktime($this->_heureDebut, $this->_minuteDebut, 0, $mois, $jour, $annee));    
        $fiche = DBFicheStage::getRecords($this->_idStage,$this->_idTypeStage);
        $fiche[0]->setLieuSoutenance($this->_lieu);
        $fiche[0]->setDateSoutenance($dateT);
        
        $this->setOKMessage("Soutenance affectée!");
    }
}
?>
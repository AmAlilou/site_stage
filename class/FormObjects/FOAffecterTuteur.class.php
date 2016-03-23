<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
/**
* @package FormObjects
* @abstract Classe de parametrage du formulaire d'affectation de tuteur à un stage
* @var String nom du champ pour le type de stage
* @var String nom du champ pour l'étudiant
* @var String nom du champ pour le tuteur
* @var String nom du champ pour le relecteur
*/

class FOAffecterTuteur extends FormObject{
    public static $CHAMP_FORM_ID_TYPE = "id_type";
    public static $CHAMP_FORM_ID_STAGE = "id_etudiant";
    public static $CHAMP_FORM_ID_TUTEUR = "id_tuteur";
    public static $CHAMP_FORM_ID_RELECTEUR = "id_relecteur";
    
    private $_idStage;
    private $_idTuteur;
    private $_idRelecteur;
    private $_idTypeStage;
	
	/**
	* @abstract Fonction d'initialisation du paramètrage des champs pour le formulaire de détermination du tuteur
	* @access public
	*/
    
    public function init(){
        $this->_idStage = $_POST[FOAffecterTuteur::$CHAMP_FORM_ID_STAGE];
        $this->_idTuteur = $_POST[FOAffecterTuteur::$CHAMP_FORM_ID_TUTEUR];
        $this->_idRelecteur = $_POST[FOAffecterTuteur::$CHAMP_FORM_ID_RELECTEUR];
        $this->_idTypeStage = $_POST[FOSaisirVisite::$CHAMP_FORM_ID_TYPE];
    }
    /**
	* @abstract Méthode vérifiant si les données saisies dans le formulaire sont valides ou non
	* @return boolean True si il n'y pas de problemes sur les champs de saisie
	* @access public
	*/
    public function isValid(){
        if(($this->_idTuteur!="") and ($this->_idTuteur == $this->_idRelecteur))
            $this->setErrorMessage("Le tuteur doit être différent du relecteur !");
        return ($this->getErrorMessage() == "");
    }
    /**
	* @abstract Après validation des champs de saisie du formulaire, cette méthode modifie les id, nom et prenom des tuteurs et relecteurs
	* @access public
	*/
    public function process(){
       // modif des id, nom et prenom des tuteurs et relecteurs
       
        $fiche = DBFicheStage::getRecords($this->_idStage,$this->_idTypeStage);
        $tuteurs = DBEnseignant::getRecords($this->_idTuteur);
        $relecteurs = DBEnseignant::getRecords($this->_idRelecteur);   
          
        if(isset($this->_idTuteur) and ($this->_idTuteur!=""))    
           $fiche[0]->affecterTuteur($tuteurs[0]);
        else
           $fiche[0]->desaffecterTuteur();
        
        if(isset($this->_idRelecteur) and ($this->_idRelecteur!=""))
           $fiche[0]->affecterRelecteur($relecteurs[0]);
        else
           $fiche[0]->desaffecterRelecteur();
       
     
       $this->setOKMessage("Tuteur et relecteur affectés! ");
    }
}
?>
<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOSaisirVisite extends FormObject{
    public static $CHAMP_FORM_ID_TYPE = "id_type";
    public static $CHAMP_FORM_ID_STAGE = "id_etudiant";
    public static $CHAMP_FORM_CORRESP= "correspondance";
    public static $CHAMP_FORM_AVIS_RESPONSABLE= "avis_responsable";
    public static $CHAMP_FORM_AVIS_ETUDIANT = "avis_etudiant";
    public static $CHAMP_FORM_AVIS_ENSEIGNANT = "avis_enseignant";
    public static $CHAMP_FORM_DATE_VISITE = "date_visite";
    public static $CHAMP_FORM_RESP_TAXE = "responsable_taxe_apprentissage";
    
    private $_idStage;
    private $_corresp;
    private $_avisResponsable;
    private $_avisEtudiant;
    private $_avisEnseignant;
    private $_idTypeStage;
    private $_dateVisite;
    private $_respTaxe;
    
    public function init(){
        $this->_corresp = $_POST[FOSaisirVisite::$CHAMP_FORM_CORRESP];
        $this->_avisResponsable= $_POST[FOSaisirVisite::$CHAMP_FORM_AVIS_RESPONSABLE];
        $this->_avisEtudiant = $_POST[FOSaisirVisite::$CHAMP_FORM_AVIS_ETUDIANT];
        $this->_avisEnseignant = $_POST[FOSaisirVisite::$CHAMP_FORM_AVIS_ENSEIGNANT];
        $this->_idStage = $_POST[FOSaisirVisite::$CHAMP_FORM_ID_STAGE];
        $this->_idTypeStage = $_POST[FOSaisirVisite::$CHAMP_FORM_ID_TYPE];
        $this->_dateVisite = $_POST[FOSaisirVisite::$CHAMP_FORM_DATE_VISITE];
        $this->_respTaxe = $_POST[FOSaisirVisite::$CHAMP_FORM_RESP_TAXE];
    }
    
    public function isValid(){
        if(!FormObject::isString($this->_corresp))
            $this->setErrorMessage("Erreur : chaine attendue pour la correspondance !");
        if(!FormObject::isString($this->_avisResponsable))
            $this->setErrorMessage("Erreur : chaine attendue pour l'avis du responsable !");
         if(!FormObject::isString($this->_avisEtudiant))
            $this->setErrorMessage("Erreur : chaine attendue pour l'avis de l'étudiant !");
        if(!FormObject::isString($this->_avisEnseignant))
            $this->setErrorMessage("Erreur : chaine attendue pour l'avis de l'enseignant !");
         if(!FormObject::isDate($this->_dateVisite))
            $this->setErrorMessage("Erreur : date de visite non valide!");  
        return ($this->getErrorMessage() == "");
    }
    
    public function process(){
        $fiche = DBFicheStage::getRecords($this->_idStage,$this->_idTypeStage);
        
        if(isset($fiche[0]))
        {
           $fiche[0]->affecterAvisVisite($this->_corresp,
                                         $this->_avisResponsable,
                                         $this->_avisEtudiant ,
                                         $this->_avisEnseignant,
                                         $this->_dateVisite );
           $entreprises = DBEntreprise::getRecords($fiche[0]->getIdEntreprise());
           $ent = $entreprises[0];
           $ent->setResponsableTaxe($this->_respTaxe);
           $this->setOKMessage("La visite est enregistrée!");
        }
        else
        {
           $this->setErrorMessage("Erreur lors de l'enregistrement de la visite : aucune fiche de stage trouvée !");
        }
    }
}
?>
<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FORefuserPropositionStage extends FormObject{

    public static $CHAMP_FORM_MOTIF_REFUS="motif_refus";
    public static $CHAMP_FORM_ID_PROPOSITION_STAGE="id_propostion_stage";

    private $_motifRefus;
    private $_idPropositionStage;

    public function init(){

        $this->_motifRefus=(isset($_POST[FORefuserPropositionStage::$CHAMP_FORM_MOTIF_REFUS])?$_POST[FORefuserPropositionStage::$CHAMP_FORM_MOTIF_REFUS]:"");
        $this->_idPropositionStage=(isset($_POST[FORefuserPropositionStage::$CHAMP_FORM_ID_PROPOSITION_STAGE])?$_POST[FORefuserPropositionStage::$CHAMP_FORM_ID_PROPOSITION_STAGE]:"");

    }
    
    public function isValid(){
        if(!FormObject::isString($this->_motifRefus))
            $this->setErrorMessage("Erreur : chaine attendue pour le motif du refus !");
        if(!FormObject::isInteger($this->_idPropositionStage))
            $this->setErrorMessage("Erreur : entier attendu pour l'id de la proposition de stage !");

        return ($this->getErrorMessage() == "");
    }
    
    public function process(){
           $propositionsStage=DBPropositionStage::getRecords($this->_idPropositionStage);
           $propositionStage=$propositionsStage[0];
           $propositionStage->setMotifRefus($this->_motifRefus);
           $propositionStage->setEtatProposition(DBPropositionStage::$ETAT_PROPOSITION_STAGE_REFUSEE);
           $this->setOKMessage("La proposition de stage a été refusée !..<br/>Un mail a été envoyé automatiquement au responsable de la proposition pour lui indiquer le motif de refus.");
    }
}
?>
<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOModificationPropositionStage extends FOCreationPropositionStage{
    public static $CHAMP_FORM_ID_PROPOSITION_STAGE="id_proposition_stage";

    protected $_idPropositionStage;

    public function init(){
           $this->_idPropositionStage=(isset($_POST[FOModificationPropositionStage::$CHAMP_FORM_ID_PROPOSITION_STAGE])?$_POST[FOModificationPropositionStage::$CHAMP_FORM_ID_PROPOSITION_STAGE]:"");
           parent::init();
    }

    public function isValid(){
        if(!FormObject::isInteger($this->_idPropositionStage))
           $this->setErrorMessage("Erreur : entier attendu pour l'id de la proposition de stage!");
        return parent::isValid();
    }


    public function process(){

           //on recupere le domaine de stage parmi la liste ou saisi à part
            if ($this->_domaineStage!="" && $this->_domaineStage!="Autre")
            {
                $domaine = $this->_domaineStage;
            }
            else
            {
                $domaine = $this->_autreDomaineStage;
            }
            //on reccupère la technologie du stage parmi la liste ou saisi à part
            if($this->_technoStage!="" && $this->_technoStage!="Autre")
            {
                $techno=$this->_technoStage;
            }
            else
            {
                $techno=$this->_autreTechnoStage;
            }
            //modification de la proposition de stage
            $propositions=DBPropositionStage::getRecords($this->_idPropositionStage);

            $propositions[0]->updatePropositionStage(
                                            $domaine,
                                            $this->_intituleStage,
                                            $this->_sujetStage,
                                            $this->_dateDebutStage,
                                            $this->_dateFinStage,
                                            $techno,
                                            $this->_descTechnoStage,
                                            $this->_nbEtudiantStage,
                                            $this->_indemniteStage,
                                            $this->_emailRespPropStage
                                            );
            $propositions=DBPropositionStage::getRecords($this->_idPropositionStage);
             $this->getPostFormManager()->setFormObjectResult("Proposition stage", $propositions[0]);
             $this->setOKMessage("La proposition de stage a été modifiée !");

    }
}
?>
<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOGestionFicheStage extends FormObject{
    public static $CHAMP_FORM_ID_TYPE_STAGE = "idtype_stage";
    public static $CHAMP_FORM_ID_FICHE = "idfiche";
    public static $CHAMP_FORM_MOTIF_REFUS = "motif_refus";
        
    private $_idtypestage;
    private $_idfiche;
    private $_motifrefus;
    private $_action;
    
    public function init(){
        $this->_idtypestage= isset($_POST[FOGestionFicheStage::$CHAMP_FORM_ID_TYPE_STAGE])?$_POST[FOGestionFicheStage::$CHAMP_FORM_ID_TYPE_STAGE]:"";
        $this->_idfiche = isset($_POST[FOGestionFicheStage::$CHAMP_FORM_ID_FICHE])?$_POST[FOGestionFicheStage::$CHAMP_FORM_ID_FICHE]:"";
        $this->_motifrefus= isset($_POST[FOGestionFicheStage::$CHAMP_FORM_MOTIF_REFUS])?$_POST[FOGestionFicheStage::$CHAMP_FORM_MOTIF_REFUS]:"";
        $this->_action = isset($_POST['action'])?$_POST['action']:"";
    }
    
    public function isValid(){
         if($this->_action=="Refuser" and $this->_motifrefus=="")
		    $this->setErrorMessage("Erreur : Motif obligatoire pour un refus de fiche de stage !");
		 if(!FormObject::isString($this->_motifrefus) and $this->_motifrefus!="")
	        $this->setErrorMessage("Erreur : Chaîne attendue pour le refus !");
         return ($this->getErrorMessage() == "");
    }
    
    public function process(){
    	$fiche=DBFicheStage::getRecords($this->_idfiche);
		if (($this->_action=="Refuser") and ($this->_motifrefus!="")){	
			$fiche[0]->refuserFiche($this->_motifrefus);
			$this->setOKMessage("Stage refusé.");
			$envoye=$fiche[0]->sendMailRefus();
			if ($envoye){
				$this->setOKMessage("Message de refus envoyé à l'étudiant.");
			}
			
    	}elseif ($this->_action=="Valider"){
    		$fiche[0]->validerFiche();
			$this->setOKMessage("Stage accepté.");
			$envoye=$fiche[0]->sendMailValidationEtudiant();
			if ($envoye) {
				$this->setOKMessage("Message de validation envoyé à l'étudiant.");
			}
			$envoye=$fiche[0]->sendMailValidationSecretaire();
			if ($envoye) {
				$this->setOKMessage("Message de validation envoyé à la secrétaire.");
			}
		}
		
		elseif ($this->_action=="Remis Etudiant"){
			$fiche[0]->signatureEntrepriseFiche();
			$this->setOKMessage("Fiche remise à l'etudiant.");
			$envoye=$fiche[0]->sendMailSignatureEntreprise();
			if ($envoye){
				$this->setOKMessage("Message de confirmation de remise envoyé à l'étudiant.");
			}
		}
		
		elseif ($this->_action=="Signature Universite"){
			$fiche[0]->signatureUniversiteFiche();
			$this->setOKMessage("Fiche sign&#233;e par l'Universit&#233;.");
			$envoye=$fiche[0]->sendMailSignatureUniversite();
			if ($envoye){
				$this->setOKMessage("Message envoyé à l'étudiant : fiche signée par l'Universit&#233;.");
			}
		}
		
		elseif ($this->_action=="Finaliser"){
			$fiche[0]->terminerFiche();
			$this->setOKMessage("Fiche terminée, le stage peut s'effectuée sans problème.");
			$envoye=$fiche[0]->sendMailFinalisation();
			if ($envoye){
				$this->setOKMessage("Message de finalisation envoyé à l'étudiant.");
			}
			
		}
    }
}
?>
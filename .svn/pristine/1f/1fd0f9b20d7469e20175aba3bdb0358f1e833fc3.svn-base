<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOCreationPropositionStage extends FormObject{


    //champs relatifs a la proposition de stage
    public static $CHAMP_FORM_DOMAINE_STAGE="domaine_stage";
    public static $CHAMP_FORM_AUTRE_DOMAINE_STAGE="autre_domaine_stage";
    public static $CHAMP_FORM_INTITULE_STAGE="intitule_stage";
    public static $CHAMP_FORM_SUJET_STAGE="sujet_stage";
    public static $CHAMP_FORM_DATE_DEBUT_STAGE="date_debut_stage";
    public static $CHAMP_FORM_DATE_FIN_STAGE="date_fin_stage";
    public static $CHAMP_FORM_TECHNO_STAGE="techno_stage";
    public static $CHAMP_FORM_AUTRE_TECHNO_STAGE="autre_techno_stage";
    public static $CHAMP_FORM_DESC_TECHNO_STAGE="desc_techno_stage";
    public static $CHAMP_FORM_NB_ETUDIANT_STAGE="nb_etudiant_stage";
    public static $CHAMP_FORM_INDEMNITE_STAGE="indemnite_stage";
    public static $CHAMP_FORM_EMAIL_RESP_PROP_STAGE="mail_resp_prop_stage";

    protected $_domaineStage;
    protected $_autreDomaineStage;
    protected $_intituleStage;
    protected $_sujetStage;
    protected $_dateDebutStage;
    protected $_dateFinStage;
    protected $_technoStage;
    protected $_autreTechnoStage;
    protected $_descTechnoStage;
    protected $_nbEtudiantStage;
    protected $_indemniteStage;
    protected $_emailRespPropStage;
    
    public function init(){


        $this->_domaineStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE]:"");
        $this->_autreDomaineStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE]:"");
        $this->_intituleStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_INTITULE_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_INTITULE_STAGE]:"");
        $this->_sujetStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_SUJET_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_SUJET_STAGE]:"");
        $this->_dateDebutStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_DATE_DEBUT_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_DATE_DEBUT_STAGE]:"");
        $this->_dateFinStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_DATE_FIN_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_DATE_FIN_STAGE]:"");
        $this->_technoStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_TECHNO_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_TECHNO_STAGE]:"");
        $this->_autreTechnoStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE]:"");
        $this->_descTechnoStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_DESC_TECHNO_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_DESC_TECHNO_STAGE]:"");
        $this->_nbEtudiantStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_NB_ETUDIANT_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_NB_ETUDIANT_STAGE]:"");
        $this->_indemniteStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_INDEMNITE_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_INDEMNITE_STAGE]:"");
        $this->_emailRespPropStage=(isset($_POST[FOCreationPropositionStage::$CHAMP_FORM_EMAIL_RESP_PROP_STAGE])?$_POST[FOCreationPropositionStage::$CHAMP_FORM_EMAIL_RESP_PROP_STAGE]:"");


    }
    
    public function isValid(){

        if(!FormObject::isString($this->_domaineStage))
            $this->setErrorMessage("Erreur : chaine attendue pour le domaine du stage !");
        if(!FormObject::isString($this->_intituleStage))
            $this->setErrorMessage("Erreur : chaine attendue pour l'intitule du stage !");
        if(!FormObject::isString($this->_sujetStage))
            $this->setErrorMessage("Erreur : chaine attendue pour le sujet du stage !");
        if(!FormObject::isDate($this->_dateDebutStage))
            $this->setErrorMessage("Erreur : date attendue pour la date de debut du stage!");
        if(!FormObject::isDate($this->_dateFinStage))
            $this->setErrorMessage("Erreur : date attendue pour la date de fin du stage!");
        if(!FormObject::isString($this->_technoStage))
            $this->setErrorMessage("Erreur : chaine attendue pour la technologie du stage!");
        if(!FormObject::isString($this->_descTechnoStage))
            $this->setErrorMessage("Erreur : chaine attendue pour la description de la technologie du stage!");
        if(!FormObject::isInteger($this->_nbEtudiantStage))
            $this->setErrorMessage("Erreur : entier attendu pour le nombre d'etudiant!");
        if(!FormObject::isString($this->_indemniteStage))
            $this->setErrorMessage("Erreur : chaine attendue pour l'indemnite du stage!");
        if(!FormObject::isMail($this->_emailRespPropStage))
            $this->setErrorMessage("Erreur : email attendu pour l'email du responsable de la proposition!");

        return ($this->getErrorMessage() == "");
    }
    
    public function process(){


        //on recupere l'entreprise créée dans la zone Tampon
        $entreprise = $this->getPostFormManager()->getFormObjectResult("Entreprise");
       
      if ($entreprise instanceof DBEntreprise)
      {
          

        //on recupère les autres parties si elles ont été instanciées

            if($this->getPostFormManager()->isFormObjectResult("Maitre de stage")){

                $maitreStage = $this->getPostFormManager()->getFormObjectResult("Maitre de stage");
                if (!($maitreStage instanceof DBContactEtp)){
                   $maitreStage = NULL;
                }
            }
            else
                $maitreStage=NULL;
           $contact = $this->getPostFormManager()->getFormObjectResult("Contact");
           if (!($contact instanceof DBContactEtp))
           {
               $contact = NULL;
           }

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
            //enregistrement de la proposition de stage
            $propStage=DBPropositionStage::addPropositionStage(
                                            $entreprise,
                                            $maitreStage,
                                            $contact,
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

               $this->getPostFormManager()->setFormObjectResult("Proposition stage", $propStage);
        if ($propStage instanceof DBPropositionStage)
         {
                $this->setOKMessage("Proposition de stage ajoutée avec succès !");
        }
         else
         {
              $this->setErrorMessage("Erreur : L'enregistrement de la proposition de stage a échoué !");
         }

      }

    }
}
?>
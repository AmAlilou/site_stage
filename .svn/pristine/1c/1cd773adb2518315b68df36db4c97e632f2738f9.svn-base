<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOTypeStage extends FormObject{
    public static $CHAMP_FORM_ID_TYPE = "id_type";
    public static $CHAMP_FORM_DATE_DEBUT = "date_debut";
    public static $CHAMP_FORM_DATE_FIN= "date_fin";
    public static $CHAMP_FORM_DATE_RAPPORT= "date_rapport";
    public static $CHAMP_FORM_DATE_SOUTENANCE1 = "date_soutenance1";
    public static $CHAMP_FORM_DATE_SOUTENANCE2 = "date_soutenance2";
    public static $CHAMP_FORM_DUREE = "duree";
    public static $CHAMP_FORM_PROMO = "miage";
    public static $CHAMP_FORM_LIBELLE = "libelle";
    
    
    private $_idTypeStage;
    private $_dateDebut;
    private $_dateFin;
    private $_dateRapport;
    private $_dateSoutenance1;
    private $_dateSoutenance2;
    private $_duree;
    private $_miage;
    private $_libelle;
    
    public function init(){
        if(isset($_POST[FOTypeStage::$CHAMP_FORM_ID_TYPE]))
            $this->_idTypeStage = $_POST[FOTypeStage::$CHAMP_FORM_ID_TYPE];
        $this->_dateDebut= $_POST[FOTypeStage::$CHAMP_FORM_DATE_DEBUT];
        $this->_dateFin = $_POST[FOTypeStage::$CHAMP_FORM_DATE_FIN];
        $this->_dateRapport = $_POST[FOTypeStage::$CHAMP_FORM_DATE_RAPPORT];
        $this->_dateSoutenance1 = $_POST[FOTypeStage::$CHAMP_FORM_DATE_SOUTENANCE1];
        $this->_dateSoutenance2 = $_POST[FOTypeStage::$CHAMP_FORM_DATE_SOUTENANCE2];
        $this->_duree = $_POST[FOTypeStage::$CHAMP_FORM_DUREE];
        $this->_miage = $_POST[FOTypeStage::$CHAMP_FORM_PROMO];
        $this->_libelle = $_POST[FOTypeStage::$CHAMP_FORM_LIBELLE];
    }
    
    public function isValid(){
        if(!FormObject::isDate($this->_dateDebut))
            $this->setErrorMessage("Erreur : la date de debut n'est pas valide!");
        if(!FormObject::isDate($this->_dateFin))
            $this->setErrorMessage("Erreur : la date de fin  n'est pas valide!");
         if(!FormObject::isDate($this->_dateRapport))
            $this->setErrorMessage("Erreur : la date de rapport n'est pas valide !");
        if(!FormObject::isDate($this->_dateSoutenance1))
            $this->setErrorMessage("Erreur : la date de soutenance n'est pas valide!");
        if(!FormObject::isDate($this->_dateSoutenance2))
            $this->setErrorMessage("Erreur : la date de soutenance 2 n'est pas valide!");
        if(!FormObject::isInteger($this->_duree) or ($this->_duree<0))
            $this->setErrorMessage("Erreur : la date de durée n'est pas valide !");
        if(!FormObject::isString($this->_miage))
            $this->setErrorMessage("Erreur : la miage n'est pas valide !");
        if(!FormObject::isString($this->_libelle))
            $this->setErrorMessage("Erreur : le libelle n'est pas valide !");
            
        return ($this->getErrorMessage() == "");
    }
    
    public function process(){
        
        $operation = $this->getPostFormManager()->getFormObjectResult("Operation");
        if ($operation == "Création")
        {
           DBTypeStage::createRecord($this->_libelle,
                                 DBConfig::getConfigValue("ANNEE PROMO"),
                                 $this->_miage,
                                 $this->_dateDebut,
                                 $this->_dateFin,
                                 $this->_dateRapport,
                                 $this->_dateSoutenance1,
                                 $this->_dateSoutenance2,
                                 $this->_duree );
            $this->setOKMessage("Type de stage ajouté !");
        }
        elseif ($operation == "Modification")
        {
           $types = DBTypeStage::getRecords($this->_idTypeStage);
           $type = $types[0];
           $type->UpdateRecord( $this->_libelle,
                                 DBConfig::getConfigValue("ANNEE PROMO"),
                                 $this->_miage,
                                 $this->_dateDebut,
                                 $this->_dateFin,
                                 $this->_dateRapport,
                                 $this->_dateSoutenance1,
                                 $this->_dateSoutenance2,
                                 $this->_duree );
          $this->setOKMessage("Type de stage modifié !");                       
                                  
        }
         
       
        
     
      
    }
}
?>
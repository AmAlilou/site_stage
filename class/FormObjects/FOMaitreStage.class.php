<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOMaitreStage extends FormObject{
    public static $CHAMP_FORM_NOM_MAITRE_STAGE="nom_maitreStage";
    public static $CHAMP_FORM_PRENOM_MAITRE_STAGE="prenom_maitreStage";
    public static $CHAMP_FORM_FONCTION_MAITRE_STAGE="fonction_maitreStage";
    public static $CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE="autre_fonction_maitreStage";
    public static $CHAMP_FORM_EMAIL_MAITRE_STAGE="email_maitreStage";
    public static $CHAMP_FORM_TEL_MAITRE_STAGE="tel_maitreStage";

    private $_nomMaitreStage;
    private $_prenomMaitreStage;
    private $_fonctionMaitreStage;
    private $_autreFonctionMaitreStage;
    private $_emailMaitreStage;
    private $_telMaitreStage;

    public function init(){
        $this->_nomMaitreStage=(isset($_POST[FOMaitreStage::$CHAMP_FORM_NOM_MAITRE_STAGE])?$_POST[FOMaitreStage::$CHAMP_FORM_NOM_MAITRE_STAGE]:"");
        $this->_prenomMaitreStage=(isset($_POST[FOMaitreStage::$CHAMP_FORM_PRENOM_MAITRE_STAGE])?$_POST[FOMaitreStage::$CHAMP_FORM_PRENOM_MAITRE_STAGE]:"");
        $this->_fonctionMaitreStage=(isset($_POST[FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE])?$_POST[FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE]:"");
        $this->_autreFonctionMaitreStage=(isset($_POST[FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE])?$_POST[FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE]:"");
        $this->_emailMaitreStage=(isset($_POST[FOMaitreStage::$CHAMP_FORM_EMAIL_MAITRE_STAGE])?$_POST[FOMaitreStage::$CHAMP_FORM_EMAIL_MAITRE_STAGE]:"");
        $this->_telMaitreStage=(isset($_POST[FOMaitreStage::$CHAMP_FORM_TEL_MAITRE_STAGE])?$_POST[FOMaitreStage::$CHAMP_FORM_TEL_MAITRE_STAGE]:"");

    }
    
    public function isValid(){
        if(!FormObject::isString($this->_nomMaitreStage))
            $this->setErrorMessage("Erreur : chaine attendue pour le nom du maitre de stage !");
        if(!FormObject::isString($this->_prenomMaitreStage))
            $this->setErrorMessage("Erreur : chaine attendue pour le prenom du maitre de stage !");
        if(!FormObject::isString($this->_fonctionMaitreStage))
            $this->setErrorMessage("Erreur : chaine attendue pour la fonction du maitre de stage !");
        if($this->_fonctionMaitreStage=="Autre" and !FormObject::isString($this->_autreFonctionMaitreStage))
            $this->setErrorMessage("Erreur : chaine attendue pour la fonction du maitre de stage !");
        if($this->_emailMaitreStage!="")
          if(!FormObject::isMail($this->_emailMaitreStage))
              $this->setErrorMessage("Erreur : email valide attendu pour l'email du maitre de stage !");
        if($this->_telMaitreStage!="" and !FormObject::isString($this->_telMaitreStage))
            $this->setErrorMessage("Erreur : chaine attendue pour le telephone du maitre de stage !");
        return ($this->getErrorMessage() == "");
    }
    
    public function process(){
        if ($this->_nomMaitreStage!=NULL)
        {
            if ($this->_fonctionMaitreStage!=NULL && $this->_fonctionMaitreStage!="Autre")
                $fonction = $this->_fonctionMaitreStage;
            else
                $fonction = $this->_autreFonctionMaitreStage;
            $entreprise = $this->getPostFormManager()->getFormObjectResult("Entreprise");
            if ($entreprise instanceof DBEntreprise){
                $liste_contacts = DBContactEtp::getRecords("",$this->_nomMaitreStage,$this->_prenomMaitreStage,"","","",$entreprise->getIdEntreprise());
                if ($liste_contacts==NULL){
                    $maitreStage = DBContactEtp::createRecord(
                                        $this->_nomMaitreStage,
                                        $this->_prenomMaitreStage,
                                        $this->_emailMaitreStage,
                                        $this->_telMaitreStage,
                                        $fonction,
                                        $entreprise);
                    $this->setOKMessage("Maitre de stage enregistré");

                }
                elseif (count($liste_contacts)==1) {
                    $maitreStage = $liste_contacts[0];
                    $this->setOKMessage("Maitre de stage existant");

                }
                //elseif (count($liste_contacts>1))
                    //$maitreStage = DBContactEtp::findBestContact($liste_contacts);
                //Ajout du maitreStage dans le tableau tampon des FormObjects
                $this->getPostFormManager()->setFormObjectResult("Maitre de stage",$maitreStage);

            }
            else
            {
                echo "Erreur dans la récupération de l'entreprise, le contact ne peut donc pas être récupéré.";
            }

        }
    }
}
                                     
?>
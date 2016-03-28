<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOSignataireStage extends FormObject{
    public static $CHAMP_FORM_NOM_SIGNATAIRE_STAGE="nom_signataire";
    public static $CHAMP_FORM_PRENOM_SIGNATAIRE_STAGE="prenom_signataire";
    public static $CHAMP_FORM_FONCTION_SIGNATAIRE_STAGE="fonction_signataire";
    public static $CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE="autre_fonction_signataire";
    public static $CHAMP_FORM_EMAIL_SIGNATAIRE_STAGE="email_signataire";
    public static $CHAMP_FORM_TEL_SIGNATAIRE_STAGE="tel_signataire";

    private $_nomSignataireStage;
    private $_prenomSignataireStage;
    private $_fonctionSignataireStage;
    private $_autreFonctionSignataireStage;
    private $_emailSignataireStage;
    private $_telSignataireStage;

    public function init(){
        $this->_nomSignataireStage=isset($_POST[FOSignataireStage::$CHAMP_FORM_NOM_SIGNATAIRE_STAGE])?$_POST[FOSignataireStage::$CHAMP_FORM_NOM_SIGNATAIRE_STAGE]:"";
        $this->_prenomSignataireStage=isset($_POST[FOSignataireStage::$CHAMP_FORM_PRENOM_SIGNATAIRE_STAGE])?$_POST[FOSignataireStage::$CHAMP_FORM_PRENOM_SIGNATAIRE_STAGE]:"";
        $this->_fonctionSignataireStage=isset($_POST[FOSignataireStage::$CHAMP_FORM_FONCTION_SIGNATAIRE_STAGE])?$_POST[FOSignataireStage::$CHAMP_FORM_FONCTION_SIGNATAIRE_STAGE]:"";
        $this->_autreFonctionSignataireStage=isset($_POST[FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE])?$_POST[FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE]:"";
        $this->_emailSignataireStage=isset($_POST[FOSignataireStage::$CHAMP_FORM_EMAIL_SIGNATAIRE_STAGE])?$_POST[FOSignataireStage::$CHAMP_FORM_EMAIL_SIGNATAIRE_STAGE]:"";
        $this->_telSignataireStage=isset($_POST[FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE])?$_POST[FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE]:"";
    }
    
    public function isValid(){
        if(!FormObject::isString($this->_nomSignataireStage))
            $this->setErrorMessage("Erreur : chaine attendue pour le nom du signataire du stage !");
        if(!FormObject::isString($this->_prenomSignataireStage))
            $this->setErrorMessage("Erreur : chaine attendue pour le prenom du signataire du stage !");
        if(!FormObject::isString($this->_fonctionSignataireStage))
            $this->setErrorMessage("Erreur : chaine attendue pour la fonction du signataire du stage !");
        if($this->_fonctionSignataireStage=="Autre" and !FormObject::isString($this->_autreFonctionSignataireStage))
            $this->setErrorMessage("Erreur : chaine attendue pour la fonction du signataire du stage !");
        return ($this->getErrorMessage() == "");
    }
    
    public function process(){
    	if ($this->_nomSignataireStage!=NULL)
        {   
            if ($this->_fonctionSignataireStage == "Autre")
                $fonction = $this->_autreFonctionSignataireStage;
            else
                $fonction = $this->_fonctionSignataireStage;
            $entreprise = $this->getPostFormManager()->getFormObjectResult("Entreprise");
            if ($entreprise instanceof DBEntreprise){
                $liste_contacts = DBContactEtp::getRecords("",$this->_nomSignataireStage,$this->_prenomSignataireStage,"","","",$entreprise->getIdEntreprise());
                if ($liste_contacts==NULL){
                    $signataire = DBContactEtp::createRecord(
                                        $this->_nomSignataireStage,
                                        $this->_prenomSignataireStage,
                                        $this->_emailSignataireStage,
                                        $this->_telSignataireStage,
                                        $fonction,
                                        $entreprise);
                    $this->setOKMessage("Signataire enregistré");
                }
                elseif (count($liste_contacts)==1) {
                    $signataire = $liste_contacts[0];
                    $this->setOKMessage("Signataire existant");
                }
                //elseif (count($liste_contacts>1))
                    //$maitreStage = DBContactEtp::findBestContact($liste_contacts);
                //Ajout du maitreStage dans le tableau tampon des FormObjects
                $this->getPostFormManager()->setFormObjectResult("Signataire",$signataire);

            }
            else
            {
                echo "Erreur dans la récupération de l'entreprise, le contact ne peut donc pas être récupéré.";
            }

        }
    }
}
    								 
?>
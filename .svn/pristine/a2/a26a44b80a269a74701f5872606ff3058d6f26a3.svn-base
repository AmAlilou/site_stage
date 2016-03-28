<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOContactEntreprise extends FormObject{
    public static $CHAMP_FORM_ID_CONTACT_ENTREPRISE="id_contact_entreprise";
    public static $CHAMP_FORM_NOM_CONTACT_ENTREPRISE="nom_contact_entreprise";
    public static $CHAMP_FORM_PRENOM_CONTACT_ENTREPRISE="prenom_contact_entreprise";
    public static $CHAMP_FORM_FONCTION_CONTACT_ENTREPRISE="fonction_contact_entreprise";
    public static $CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE="autre_fonction_contact_entreprise";
    public static $CHAMP_FORM_EMAIL_CONTACT_ENTREPRISE="email_contact_entreprise";
    public static $CHAMP_FORM_TEL_CONTACT_ENTREPRISE="tel_contact_entreprise";

    private $_idContactEntreprise;
    private $_nomContactEntreprise;
    private $_prenomContactEntreprise;
    private $_fonctionContactEntreprise;
    private $_autreFonctionContactEntreprise;
    private $_emailContactEntreprise;
    private $_telContactEntreprise;

    public function init(){
        $this->_idContactEntreprise=(isset($_POST[FOContactEntreprise::$CHAMP_FORM_ID_CONTACT_ENTREPRISE])?$_POST[FOContactEntreprise::$CHAMP_FORM_ID_CONTACT_ENTREPRISE]:"");
        $this->_nomContactEntreprise=(isset($_POST[FOContactEntreprise::$CHAMP_FORM_NOM_CONTACT_ENTREPRISE])?$_POST[FOContactEntreprise::$CHAMP_FORM_NOM_CONTACT_ENTREPRISE]:"");
        $this->_prenomContactEntreprise=(isset($_POST[FOContactEntreprise::$CHAMP_FORM_PRENOM_CONTACT_ENTREPRISE])?$_POST[FOContactEntreprise::$CHAMP_FORM_PRENOM_CONTACT_ENTREPRISE]:"");
        $this->_fonctionContactEntreprise=(isset($_POST[FOContactEntreprise::$CHAMP_FORM_FONCTION_CONTACT_ENTREPRISE])?$_POST[FOContactEntreprise::$CHAMP_FORM_FONCTION_CONTACT_ENTREPRISE]:"");
        $this->_autreFonctionContactEntreprise=(isset($_POST[FOContactEntreprise::$CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE])?$_POST[FOContactEntreprise::$CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE]:"");
        $this->_emailContactEntreprise=(isset($_POST[FOContactEntreprise::$CHAMP_FORM_EMAIL_CONTACT_ENTREPRISE])?$_POST[FOContactEntreprise::$CHAMP_FORM_EMAIL_CONTACT_ENTREPRISE]:"");
        $this->_telContactEntreprise=(isset($_POST[FOContactEntreprise::$CHAMP_FORM_TEL_CONTACT_ENTREPRISE])?$_POST[FOContactEntreprise::$CHAMP_FORM_TEL_CONTACT_ENTREPRISE]:"");

    }
    
    public function isValid(){

        //if(!FormObject::isString($this->_idContactEntreprise))
        //    $this->setErrorMessage("Erreur : entier attendu pour l'id du contact en entreprise !");
        if(!FormObject::isString($this->_nomContactEntreprise))
            $this->setErrorMessage("Erreur : chaine attendue pour le nom du contact en entreprise !");
        if(!FormObject::isString($this->_prenomContactEntreprise))
            $this->setErrorMessage("Erreur : chaine attendue pour le prenom du contact en entreprise !");
        if(!FormObject::isString($this->_fonctionContactEntreprise))
            $this->setErrorMessage("Erreur : chaine attendue pour la fonction du contact en entreprise !");
        if($this->_emailContactEntreprise!="")
          if(!FormObject::isMail($this->_emailContactEntreprise))
              $this->setErrorMessage("Erreur : email valide attendu pour l'email du contact en entreprise !");
        if(!FormObject::isString($this->_telContactEntreprise))
            $this->setErrorMessage("Erreur : chaine attendue pour le telephone du contact en entreprise !");


        return ($this->getErrorMessage() == "");
    }
    
    public function process(){
        if ($this->_nomContactEntreprise!=NULL){
            if ($this->_fonctionContactEntreprise!=NULL && $this->_fonctionContactEntreprise!="Autre")
                $fonction = $this->_fonctionContactEntreprise;
            else
                $fonction = $this->_autreFonctionContactEntreprise;
            $entreprise = $this->getPostFormManager()->getFormObjectResult("Entreprise");
            if ($entreprise instanceof DBEntreprise){
                $liste_contacts = DBContactEtp::getRecords("",$this->_nomContactEntreprise,$this->_prenomContactEntreprise,"","","",$entreprise->getIdEntreprise());
                if ($liste_contacts==NULL){
                    $contactEntreprise = DBContactEtp::createRecord(
                                        $this->_nomContactEntreprise,
                                        $this->_prenomContactEntreprise,
                                        $this->_emailContactEntreprise,
                                        $this->_telContactEntreprise,
                                        $fonction,
                                        $entreprise);
                    $this->setOKMessage("Contact enregistré");
                }
                elseif (count($liste_contacts==1))
                {
                    $contactEntreprise = $liste_contacts[0];
                    $this->setOKMessage("Ce contact existait déja");
                }
                //elseif (count($liste_contacts>1))
                //    $contactEntreprise = findBestContact($liste_contacts);
                //Ajout du contact dans le tableau tampon des FormObjects
                $this->getPostFormManager()->setFormObjectResult("Contact",$contactEntreprise);
                            
            }
            else
            {
                echo "Erreur dans la récupération de l'entreprise, le contact ne peut donc pas être récupéré.";
            }

        }

    }
}
?>
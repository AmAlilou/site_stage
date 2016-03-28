<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOEntreprise extends FormObject{
    public static $CHAMP_FORM_ID_ENTREPRISE = "id_entreprise";
    public static $CHAMP_FORM_RAISON_SOCIALE = "raison_sociale";
    public static $CHAMP_FORM_AUTRE_RAISON_SOCIALE = "autre_raison_sociale";
    public static $CHAMP_FORM_TEL_ENTREPRISE="tel_entreprise";
    public static $CHAMP_FORM_FAX_ENTREPRISE="fax_entreprise";
    public static $CHAMP_FORM_ADRESSE_ENTREPRISE="adresse_entreprise";
    public static $CHAMP_FORM_CP_ENTREPRISE="cp_entreprise";
    public static $CHAMP_FORM_VILLE_ENTREPRISE="ville_entreprise";
    public static $CHAMP_FORM_TYPE_ENTREPRISE="type_entreprise";
    public static $CHAMP_FORM_AUTRE_TYPE_ENTREPRISE="autre_type_entreprise";
    public static $CHAMP_FORM_URL_ENTREPRISE="url_entreprise";

    private $_idEntreprise;
    private $_autreRaisonSociale;
    private $_telEntreprise;
    private $_faxEntreprise;
    private $_adresseEntreprise;
    private $_cpEntreprise;
    private $_villeEntreprise;
    private $_typeEntreprise;
    private $_autreTypeEntreprise;
    private $_urlEntreprise;

    public function init(){
        $this->_idEntreprise=(isset($_POST[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE])?$_POST[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE]:"");
        $this->_autreRaisonSociale=(isset($_POST[FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE])?$_POST[FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE]:"");
        $this->_telEntreprise=(isset($_POST[FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE])?$_POST[FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE]:"");
        $this->_faxEntreprise=(isset($_POST[FOEntreprise::$CHAMP_FORM_FAX_ENTREPRISE])?$_POST[FOEntreprise::$CHAMP_FORM_FAX_ENTREPRISE]:"");
        $this->_adresseEntreprise=(isset($_POST[FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE])?$_POST[FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE]:"");
        $this->_cpEntreprise=(isset($_POST[FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE])?$_POST[FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE]:"");
        $this->_villeEntreprise=(isset($_POST[FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE])?$_POST[FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE]:"");
        $this->_typeEntreprise=(isset($_POST[FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE])?$_POST[FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE]:"");
        $this->_autreTypeEntreprise=(isset($_POST[FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE])?$_POST[FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE]:"");
        $this->_urlEntreprise=(isset($_POST[FOEntreprise::$CHAMP_FORM_URL_ENTREPRISE])?$_POST[FOEntreprise::$CHAMP_FORM_URL_ENTREPRISE]:"");
    }
    
    public function isValid(){
        $exist = $this->_idEntreprise!="Autre";
        if(!$exist and !FormObject::isString($this->_telEntreprise))
            $this->setErrorMessage("Erreur : chaine attendue pour le telephone de l'entreprise !");
        if(!$exist and !FormObject::isString($this->_faxEntreprise))
            $this->setErrorMessage("Erreur : chaine attendue pour le fax de l'entreprise !");
        if(!$exist and !FormObject::isString($this->_adresseEntreprise))
            $this->setErrorMessage("Erreur : chaine attendue pour l'adresse de l'entreprise !");
        if(!$exist and !FormObject::isInteger($this->_cpEntreprise))
            $this->setErrorMessage("Erreur : entier attendu pour le code postal de l'entreprise !");
        if(!$exist and !FormObject::isString($this->_villeEntreprise))
            $this->setErrorMessage("Erreur : chaine attendue pour la ville de l'entreprise !");
        if(!$exist and !FormObject::isString($this->_typeEntreprise))
            $this->setErrorMessage("Erreur : chaine attendue pour le type d'entreprise !");
        return ($this->getErrorMessage() == "");
    }
    
    public function process(){
    	   if ($this->_typeEntreprise!="")  
                $type = $this->_typeEntreprise;
           else
                $type = $this->_autreTypeEntreprise;
           //L'entreprise existe, on la reprend en base
           if($this->_idEntreprise!="Autre"){
                $liste_entreprises = DBEntreprise::getRecords($this->_idEntreprise);
                $entreprise = $liste_entreprises[0];
                if ($this->_cpEntreprise!="" and $this->_villeEntreprise!=""){
                	$entreprise->updateRecord(
		      		$type,
		                $entreprise->getRaisonsocialeEntreprise(),
		                $this->_urlEntreprise, // url du site
		                $this->_adresseEntreprise,
		                $this->_cpEntreprise,
		                $this->_villeEntreprise,
		                $this->_telEntreprise,
		                $this->_faxEntreprise,
		                ""  // nom responsable apprentissage
                     		);
                }
                $this->setOKMessage("Entreprise déja existante");
           }
           //L'entreprise n'existe pas, on en crée une nouvelle
           else {
                //vérifier si la l'entreprise n'existe pas
                 if(!DBEntreprise::entrepriseExisteDeja($this->_autreRaisonSociale,$this->_cpEntreprise))
                 {
                       $entreprise = DBEntreprise::createRecord(
                                $type,
                                $this->_autreRaisonSociale,
                                $this->_urlEntreprise, // url du site
                                $this->_adresseEntreprise,
                                $this->_cpEntreprise,
                                $this->_villeEntreprise,
                                $this->_telEntreprise,
                                $this->_faxEntreprise,
                                ""  // nom responsable apprentissage
                              );
                      $this->setOKMessage("Entreprise enregistrée");
                }
                else{
                     $liste_entreprises = DBEntreprise::getRecords("","",$this->_autreRaisonSociale,"","",$this->_cpEntreprise);
                     $entreprise = $liste_entreprises[0];
                     $this->setOKMessage("Entreprise déja existante");
                }
           }

           //Ajout de l'entreprise dans le tableau tampon des FormObjects
            $this->getPostFormManager()->setFormObjectResult("Entreprise", $entreprise);
               
    }
}

?>

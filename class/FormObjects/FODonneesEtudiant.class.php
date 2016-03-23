<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FODonneesEtudiant extends FormObject{
    public static $CHAMP_FORM_ADRESSEFAC_ETUDIANT = "adresse_fac";
    public static $CHAMP_FORM_CPFAC_ETUDIANT = "codepostal_fac";
    public static $CHAMP_FORM_VILLEFAC_ETUDIANT = "ville_fac";
    public static $CHAMP_FORM_MAILFAC_ETUDIANT = "email_fac";
    
    public static $CHAMP_FORM_ADRESSESTABLE_ETUDIANT = "adresse_stable";
    public static $CHAMP_FORM_CPSTABLE_ETUDIANT = "codepostal_stable";
    public static $CHAMP_FORM_VILLESTABLE_ETUDIANT = "ville_stable";
    public static $CHAMP_FORM_MAILSTABLE_ETUDIANT = "email_stable";
    
    public static $CHAMP_FORM_ADRESSESTAGE_ETUDIANT = "adresse_stage";
    public static $CHAMP_FORM_CPSTAGE_ETUDIANT = "codepostal_stage";
    public static $CHAMP_FORM_VILLESTAGE_ETUDIANT = "ville_stage";
    public static $CHAMP_FORM_MAILSTAGE_ETUDIANT = "email_stage";
    public static $CHAMP_FORM_TELSTAGE_ETUDIANT = "tel_stage";  
    
    private $_adrfac;
    private $_cpfac;
    private $_villefac;
    private $_emailfac;
    private $_adrstable;
    private $_cpstable;
    private $_villestable;
    private $_emailstable;
    private $_adrstage;
    private $_cpstage;
    private $_villestage;
    private $_emailstage;
    private $_telstage;
    
    public function init(){
        $this->_adrfac= isset($_POST[FODonneesEtudiant::$CHAMP_FORM_ADRESSEFAC_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_ADRESSEFAC_ETUDIANT]:"";
        $this->_cpfac = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_CPFAC_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_CPFAC_ETUDIANT]:"";
        $this->_villefac = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_VILLEFAC_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_VILLEFAC_ETUDIANT]:"";
        $this->_emailfac = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_MAILFAC_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_MAILFAC_ETUDIANT]:"";
        $this->_adrstable= isset($_POST[FODonneesEtudiant::$CHAMP_FORM_ADRESSESTABLE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_ADRESSESTABLE_ETUDIANT]:"";
        $this->_cpstable = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_CPSTABLE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_CPSTABLE_ETUDIANT]:"";
        $this->_villestable = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_VILLESTABLE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_VILLESTABLE_ETUDIANT]:"";
        $this->_emailstable = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_MAILSTABLE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_MAILSTABLE_ETUDIANT]:"";
        $this->_adrstage= isset($_POST[FODonneesEtudiant::$CHAMP_FORM_ADRESSESTAGE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_ADRESSESTAGE_ETUDIANT]:"";
        $this->_cpstage = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_CPSTAGE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_CPSTAGE_ETUDIANT]:"";
        $this->_villestage = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_VILLESTAGE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_VILLESTAGE_ETUDIANT]:"";
        $this->_emailstage = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_MAILSTAGE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_MAILSTAGE_ETUDIANT]:"";
        $this->_telstage = isset($_POST[FODonneesEtudiant::$CHAMP_FORM_TELSTAGE_ETUDIANT])?$_POST[FODonneesEtudiant::$CHAMP_FORM_TELSTAGE_ETUDIANT]:"";
    }
    
    public function isValid(){
    	if(!FormObject::isString($this->_adrfac) and $this->_adrfac!="")
            $this->setErrorMessage("Erreur : l'adresse fac doit etre une chaine !");
    	if(!FormObject::isInteger($this->_cpfac)and ($this->_cpfac!=""))
            $this->setErrorMessage("Erreur : le code postal fac doit etre un entier !");
        if(!FormObject::isString($this->_villefac) and $this->_villefac!="")
            $this->setErrorMessage("Erreur : la ville fac doit etre une chaine !");
        if(!FormObject::isMail($this->_emailfac) and ($this->_emailfac!=""))
            $this->setErrorMessage("Erreur : adresse email fac incorrecte !");
        if(!FormObject::isString($this->_adrstable) and $this->_adrstable!="")
            $this->setErrorMessage("Erreur : l'adresse stable doit etre une chaine !");
        if(!FormObject::isInteger($this->_cpstable)and ($this->_cpstable!=""))
            $this->setErrorMessage("Erreur : le code postal stable doit etre un entier !");
        if(!FormObject::isString($this->_villestable) and $this->_villestable=!"")
            $this->setErrorMessage("Erreur : la ville stable doit etre une chaine !");
        if(!FormObject::isMail($this->_emailstable)and ($this->_emailstable!=""))
            $this->setErrorMessage("Erreur : adresse email stable incorrecte !");
        if(!FormObject::isString($this->_adrstage) and $this->_adrstage!="")
            $this->setErrorMessage("Erreur : l'adresse stage doit etre une chaine !"); 
        if(!FormObject::isInteger($this->_cpstage)and ($this->_cpstage!=""))
            $this->setErrorMessage("Erreur : le code postal stage doit etre un entier !");
        if(!FormObject::isString($this->_villestage) and $this->_villestage!="")
            $this->setErrorMessage("Erreur : la ville stage doit etre une chaine !");
        if(!FormObject::isMail($this->_emailstage)and ($this->_emailstage!=""))
            $this->setErrorMessage("Erreur : adresse email stage incorrecte !");
        return ($this->getErrorMessage() == "");
    }
    
    public function process(){
    	$etudiant=SessionManager::getEtudiant();
    	$etudiant->updateRecord($etudiant->getNomEtudiant(),
    							$etudiant->getPrenomEtudiant(), 
    							$this->_emailfac, 
    							$this->_emailstable, 
    							$etudiant->getMiageEtudiant(), 
    							$this->_emailstage, 
    							$etudiant->getSexeEtudiant(), 
    							$etudiant->getPromoEtudiant(), 
    							$this->_telstage, 
    							$etudiant->getLoginEtudiant(), 
    							$etudiant->getPasswordEtudiant(), 
    							$this->_adrstage, 
    							$this->_cpstage, 
    							$this->_villestage, 
    							$this->_adrfac, 
    							$this->_cpfac, 
    							$this->_villefac, 
    							$this->_adrstable, 
    							$this->_cpstable, 
    							$this->_villestable,
    							$etudiant->getDateDerniereConnexion(),
    							$etudiant->getDateDerniereRecuperationPass());
        $this->setOKMessage("Données modifiées");
    }
}
?>
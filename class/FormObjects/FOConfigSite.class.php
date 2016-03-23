<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOConfigSite extends FormObject{
	public static $CHAMP_FORM_ANNEE_ENCOURS = "anneePromo";
	public static $CHAMP_FORM_INTERVALLE_MAILS = "intervalleMails";
	public static $CHAMP_FORM_MAIL_DEBUG = "mailDebug";
    public static $CHAMP_FORM_NB_ELEMENTS = "nbElem";
    
    
    private $_anneePromo;
    private $_intervalleMails;
    private $_mailDebug;
	private $_nbElem;
    
    public function init(){
    	$this->_anneePromo = isset($_POST[FOConfigSite::$CHAMP_FORM_ANNEE_ENCOURS])?$_POST[FOConfigSite::$CHAMP_FORM_ANNEE_ENCOURS]:"";
    	$this->_intervalleMails = isset($_POST[FOConfigSite::$CHAMP_FORM_INTERVALLE_MAILS])?$_POST[FOConfigSite::$CHAMP_FORM_INTERVALLE_MAILS]:"";
    	$this->_mailDebug = isset($_POST[FOConfigSite::$CHAMP_FORM_MAIL_DEBUG])?$_POST[FOConfigSite::$CHAMP_FORM_MAIL_DEBUG]:"";
		$this->_nbElem = isset($_POST[FOConfigSite::$CHAMP_FORM_NB_ELEMENTS])?$_POST[FOConfigSite::$CHAMP_FORM_NB_ELEMENTS]:"";
	}
    
    public function isValid(){
		if ($this->_anneePromo!="" and !FormObject::isInteger($this->_anneePromo))
			$this->setErrorMessage("L'année en cours doit être un entier !");
		if ($this->_intervalleMails!="" and !FormObject::isInteger($this->_intervalleMails))
			$this->setErrorMessage("L'intervalle doit être en secondes, donc un entier !");
		if ($this->_mailDebug!="" and !FormObject::isBoolean($this->_mailDebug))
			$this->setErrorMessage("Le mailDebug doit être un booléen !");
		if ($this->_nbElem!="" and !FormObject::isInteger($this->_nbElem))
			$this->setErrorMessage("Le nombre d'éléments doit être un entier !");
		return $this->getErrorMessage()=="";
	}
    
    public function process(){
    	if ($this->_anneePromo!=""){
			DBConfig::updateRecord("ANNEE PROMO",$this->_anneePromo);
			$liste = DBTypeStage::getRecords("","",$this->_anneePromo);
			if (count($liste)==0){
				$this->setOKMessage("Mise à jour effectuée. Pensez toutefois à ajouter des stages, car il n'y en a aucun pour le moment.<br/><a href='configStages.php'>Configuration des stages pour une année</a><br/><a href='configSite.php'>Retour à la configuration du site</a><br/>");
			} else {
				$this->setOKMessage("Mise à jour effectuée.<br/>Redirection dans 2 secondes.<script type='text/javascript'>setTimeout(\"window.location.href='configSite.php'\",2000);</script>");}
		}
    	if ($this->_intervalleMails!=""){
			DBConfig::updateRecord("LIMITE SECONDES ENVOI MAIL",$this->_intervalleMails);
			$this->setOKMessage("Mise à jour effectuée.<br/>Redirection dans 2 secondes.<script type='text/javascript'>setTimeout(\"window.location.href='configSite.php'\",2000);</script>");
		}
		if ($this->_mailDebug!=""){
			DBConfig::updateRecord("MAIL DEBUG",$this->_mailDebug);
			$this->setOKMessage("Mise à jour effectuée.<br/>Redirection dans 2 secondes.<script type='text/javascript'>setTimeout(\"window.location.href='configSite.php'\",2000);</script>");
		}
		if ($this->_nbElem!=""){
			DBConfig::updateRecord("APPARITION RECHERCHE MENU DEROULANT",$this->_nbElem);
			$this->setOKMessage("Mise à jour effectuée.<br/>Redirection dans 2 secondes.<script type='text/javascript'>setTimeout(\"window.location.href='configSite.php'\",2000);</script>");
		}
    }
}

<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOConfigEnums extends FormObject{
	public static $CHAMP_FORM_ENUM = "enum";
	public static $CHAMP_FORM_MODIFIED_ELEMENT = "modifiedElement";
	public static $CHAMP_FORM_TOMODIFY_ELEMENT = "tomodifyElement";
    public static $CHAMP_FORM_NEW_ELEMENT = "newElement";
    public static $CHAMP_FORM_TODELETE_ELEMENT = "newElement";
    
    
    private $_enum;
    private $_modifiedElement;
    private $_tomodifyElement;
	private $_newElement;
	private $_todeleteElement;
	private $_action;
    
    public function init(){
    	$this->_enum = isset($_POST[FOConfigEnums::$CHAMP_FORM_ENUM])?$_POST[FOConfigEnums::$CHAMP_FORM_ENUM]:"";
    	$this->_modifiedElement = isset($_POST[FOConfigEnums::$CHAMP_FORM_MODIFIED_ELEMENT])?$_POST[FOConfigEnums::$CHAMP_FORM_MODIFIED_ELEMENT]:"";
    	$this->_tomodifyElement = isset($_POST[FOConfigEnums::$CHAMP_FORM_TOMODIFY_ELEMENT])?$_POST[FOConfigEnums::$CHAMP_FORM_TOMODIFY_ELEMENT]:"";
		$this->_newElement = isset($_POST[FOConfigEnums::$CHAMP_FORM_NEW_ELEMENT])?$_POST[FOConfigEnums::$CHAMP_FORM_NEW_ELEMENT]:"";
		$this->_todeleteElement = isset($_POST[FOConfigEnums::$CHAMP_FORM_TODELETE_ELEMENT])?$_POST[FOConfigEnums::$CHAMP_FORM_TODELETE_ELEMENT]:"";
		$this->_action = isset($_POST['action'])?$_POST['action']:"";
		
    }
    
    public function isValid(){
		if (($this->_action == "Ajouter") and ($this->_newElement == "")) 
			$this->setErrorMessage("Champ d'ajout vide, action impossible");
		if (($this->_action == "Modifier") and ($this->_modifiedElement == "") and ($this->_tomodifyElement == "")) 
			$this->setErrorMessage("Champ de modification vide, action impossible");
		if (($this->_action == "Supprimer") and ($this->_todeleteElement == ""))
			$this->setErrorMessage("Aucun élément à supprimer");
		return $this->getErrorMessage()=="";
		 			
    }
    
    public function process(){
    	if ($this->_action == "Ajouter"){
    		$liste = DBConfig::getConfigValue($this->_enum);
    		$liste = $liste.";;".$this->_newElement;
    		DBConfig::updateRecord($this->_enum,$liste);
    	}
    	if ($this->_action == "Modifier"){
    		$liste = DBConfig::getEnumeration($this->_enum,false);
    		$tab=array();
			foreach ($liste as $objet){
				if ($this->_tomodifyElement!=$objet->getFormSelectOptionValue())
					$tab[count($tab)]=$objet->getFormSelectOptionValue();
				else $tab[count($tab)]=$this->_modifiedElement;
			}
			$chaine = implode($tab,";;");
			DBConfig::updateRecord($this->_enum,$chaine);	
    	}
    	if ($this->_action == "Supprimer"){
			$liste = DBConfig::getEnumeration($this->_enum,false);
			$tab=array();
			foreach ($liste as $objet){
			if ($this->_todeleteElement!=$objet->getFormSelectOptionValue())
				$tab[count($tab)]=$objet->getFormSelectOptionValue();
			}
			$chaine = implode($tab,";;");
			DBConfig::updateRecord($this->_enum,$chaine);	
    	}
    	header("Location: configEnumerations.php?".FOConfigEnums::$CHAMP_FORM_ENUM."=".$this->_enum);
    }
}
?>
<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");
//require_once("class/FormObject.class.php");
//require_once("class/XHTMLBuilder.class.php");


/** 
* @abstract Classe se chargeant de sp�cifier le comportement "g�n�rique" � avoir sur un script appel� apr�s un formulaire
* @package /class
*/
class PostFormManager{
    private $_formObjects;
    private $_redirectURL;
    private $_redirectionTimeout;
    
    private $_formObjectTMPResults;

	
    public function __construct($formObjects, $redirectURL="", $redirectionTimeout=5){
        Debugger::getInstance()->traceBDDObject("<i>Appel du constructeur de PostFormManager</i><br/>");
        if(is_array($formObjects)){
            foreach($formObjects as $fo)
                assert($fo instanceof FormObject);
        }
        else
        {
            assert($formObjects instanceof FormObject);
            $formObjects = array($formObjects);
        }
        
        $this->_formObjects = $formObjects;
        $this->_redirectURL = $redirectURL;
        $this->_redirectionTimeout = $redirectionTimeout;
        $this->_formObjectTMPResults = array();
        
        foreach($this->_formObjects as $fo)
            $fo->setPostFormManager($this);
    }
    
    // Permet de stocker d'eventuels resultats intermediaires d'un FormObject qui pourra etre accessible aux FormObjects suivants
    public function setFormObjectResult($resultName, $resultValue){
        assert(!array_key_exists($resultName, $this->_formObjectTMPResults));
        $this->_formObjectTMPResults[$resultName] = $resultValue;
    }
    
    // Accesseur sur un r�sultat interm�diaire d'un FormObject
    public function getFormObjectResult($resultName){
        assert(array_key_exists($resultName, $this->_formObjectTMPResults));
        return $this->_formObjectTMPResults[$resultName];
    }
    
    //Permet de savoir si un r�sultat d�sir� est instanci�
	public function isFormObjectResult($resultName){
		return array_key_exists($resultName, $this->_formObjectTMPResults);
	}
    public function manageAndGenerateContent(){
        Debugger::getInstance()->traceBDDObject("<i>Appel de PostFormManager::manageAndGenerateContent()</i><br/>");
        $generatedContent = "";
        
        // Initialisation de chaque formObjects
        foreach($this->_formObjects as $fo)
            $fo->init();
            
        $formValid = true;
        foreach($this->_formObjects as $fo)
            $formValid &= $fo->isValid();        
        
        // FORMULAIRE OK
        if($formValid){
            // On execute le FormObject
            foreach($this->_formObjects as $fo)
                $fo->process();

            // Cr�ation du message de validation
            foreach($this->_formObjects as $fo)
                $generatedContent .= XHTMLBuilder::getText($fo->getOKMessage()).'<br/>';
                
            if($this->_redirectURL != ""){
                XHTMLBuilder::getInstance()->addOnLoadJavascript("setTimeout(\"window.location.href='".$this->_redirectURL."';\", ".(1000*$this->_redirectionTimeout).");\n");
                $generatedContent .= "Patientez ".$this->_redirectionTimeout." secondes ... vous allez etre redirigé automatiquement...\nSi cela ne marche pas, <a href=\"".$this->_redirectURL."\">cliquer ici</a>";
            }
        // FORMULAIRE NON VALIDE
        } else {
            // On "revient" en arriere" en sp�cifiant toutes les variables post courantes en get du script appelant
            $url = SessionManager::getHTTPReferer()."?";
            foreach($_POST as $label => $value)
                $url .= $label."=".$value."&";
                
            $generatedContent .= XHTMLBuilder::getText("Une ou plusieurs erreurs sont survenues :\n").'
<div class="erreurs">
  ';
            foreach($this->_formObjects as $fo)
                $generatedContent .= $fo->getErrorMessage().'<br/>';
            
            $generatedContent .= '
</div>
<br/>
<a href="'.$url.'">Cliquer ici pour revenir en arrière</a>';
        }
        
        return $generatedContent;
    }
}
?>
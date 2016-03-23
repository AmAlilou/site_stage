<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");


/**
* @abstract Classe Abstraite permettant de sp�cifier le comportement g�n�rique d'un script appel� apr�s un formulaire
* @package /class
*/
abstract class FormObject{

    protected $_error = "";
    protected $_ok = "";
    
    private $_postFormManager;

    public abstract function init();
    public abstract function isValid();
    public abstract function process();

    private static $HEX_VALUES = array("0","1","2","3","4","5","6","7","8","9","a","A","b","B","c","C","d","D","e","E","f","F");

    /**
	* @abstract Utilis� par le PostFormManager pour se r�f�rencer "soi meme"
	* @param PostFormManager
	*/
    public function setPostFormManager($pfm){
        if(!$pfm instanceof PostFormManager)
            die("FormObject::setPostFormManager() : le parametre specifie n'est pas un PostFormManager !");
        $this->_postFormManager = $pfm;
    }
    
    /**
	* @abstract Permet aux sous classes d'avoir acc�s au PostFormManager traitant le FormObject
	* @return PostFormManager
	*/
    protected function getPostFormManager(){
        return $this->_postFormManager;
    }
    
    /**
	* @abstract Utilis� si la m�thode isValid retourne false
	* @return String retourne le message d'erreur
	*/
    public function getErrorMessage(){
        return $this->_error;
    }
    
    /**
	* @abstract Utilis� si la m�thode isValid retourne true
	* @return String retourne le message de r�ussite
	*/
    public function getOKMessage(){
        return $this->_ok;
    }
    
    /** 
	* @abstract Permet aux classes filles de donner le message ok qui sera affich�
	* @param String d�finit le message de r�ussite 
	*/
    protected function setOKMessage($msg){
        $this->_ok = $msg;
    }

    /** 
	* @abstract Permet aux classes filles de donner le message erreur qui sera affich�
	* @param String d�finit le message de erreur 
	*/
    protected function setErrorMessage($msg){
        $this->_error .= $msg;
    }

    //*** Ensemble de m�thodes "aidant" pour le isValid des sous classes ***//
	
	/**
	* @abstract methode static la validit� d'un champ devant etre un bool
	* @param mixed la valeur � tester
	* @return bool retourne true si $value est un bool
	*/
    protected static function isBoolean($value){
        return (($value == 1) || ($value == 0));
    }
    
	/**
	* @abstract v�rifie que c'est un Integer appartenant � un intervalle
	* @param mixed la valeur � tester
	* @param String la borne inferieure de l'intervalle. S'il n'y a pas de borne inf�rieure laissez � "".
	* @param String la borne sup�rieure de l'intervalle. S'il n'y a pas de borne sup�rieure laissez � "".
	* @return bool true si c'est un integer dans l'intervalle sinon false
	*/
    protected static function isInteger($value, $minBound="", $maxBound=""){
        Debugger::getInstance()->traceBDDObject("<i>Appel de FormObject::isInteger()</i><br/>");
        $ok=is_numeric($value);
        if(($minBound != "") && ($value < $minBound)) $ok=false;
        if(($maxBound != "") && ($value > $maxBound)) $ok=false;
        
        return $ok;
    }
    
	/**
	* @abstract v�rifie que c'est la bonne couleur
	* @param mixed la valeur � v�rifier
	* @return bool true si c'est une couleur valide sinon false
	*/
    protected static function isColor($value){
        Debugger::getInstance()->traceBDDObject("<i>Appel de FormObject::isColor()</i><br/>");
        if(strlen($value)!=6) return false;
        $ok=true;
        for($i=0; $ok && $i<6; $i++)
            $ok=in_array($value[$i], FormObject::$HEX_VALUES);
        
        return $ok;
    }
    
	/**
	* @abstract v�rifie que la valeur saisie est un string dont le nombre de caract�re est compris entre lengthMin et lengthMax
	* @ param String la valeur � v�rifier
	* @param String le nombre de caract�re minimal. laissez � "" s'il n'y en a pas
	* @param String le nombre de caract�re maximal. laissez � "" s'il n'y en a pas
	* @return bool true si c'est un string dont le nombre de caract�re est compris entre lengthMin et lengthMax sinon false
	*/
    protected static function isString($value, $lengthMin="", $lengthMax=""){
        Debugger::getInstance()->traceBDDObject("<i>Appel de FormObject::isString()</i><br/>");
        $ok=is_string($value);
        if(($lengthMin != "") && (strlen($value) < $lengthMin)) $ok=false;
        if(($lengthMax != "") && (strlen($value) > $lengthMax)) $ok=false;
        
        return $ok;
    }
    
	/**
	* @abstract v�rifie que la valeur est un mail
	* @param mixed la valeur � v�rifier
	* @return bool true si c'est un mail valide sinon false
	*/
    protected static function isMail($value){
        Debugger::getInstance()->traceBDDObject("<i>Appel de FormObject::isMail($value)</i><br/>");
        return (FormObject::isString($value, 3) && eregi("([^@]+@[^\\.]+\\..+,)*[^@]+@[^\\.]+\\..+", $value));
    }
    
	/**
	* @abstract V�rifie si une cl� existe dans un tableau
	* @param String la cl� � v�rifier
	* @param Array le tableau qui devrait contenir la cl�
	* @return TRUE  s'il existe une cl� du nom de value  dans le tableau enumValues  . value  peut �tre n'importe quelle valeur valide d'index de tableau. fonctionne �galement sur les objets.
	*/
    protected static function isInEnumValues($value, $enumValues){
        Debugger::getInstance()->traceBDDObject("<i>Appel de FormObject::isInEnumValues($value, $enumValues)</i><br/>");
        return array_key_exists($value, $enumValues);
    }
    
    /**
	* @abstract renvoie true si une date est valide pour un format "DD{$char_spec}M{char_spec)YYYY", format logique d'insertion en base
	* @param String la date � v�rifier
	* @return bool
	*/
    protected static function isDate($value){
    	Debugger::getInstance()->traceBDDObject("<i>Appel de FormObject::isDate($value)</i><br/>");
      list($jour, $mois, $annee) = split('[/.-]',  $value);  
      return  (checkdate($mois, $jour, $annee));
    }
}
?>
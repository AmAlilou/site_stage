<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");
//require_once("class/ISelectable.class.php");


// Classe permettant notamment de convertir un array en tableau de ISelectable
class Enumeration{
    public static function getSelectablesArray($normalArray, $elemIsValue=false){
        $selectablesArray = array();
        foreach($normalArray as $key => $elem)
            $selectablesArray[count($selectablesArray)] = new Enumerable((($elemIsValue)?$elem:$key), $elem);
        return $selectablesArray;
    }
    
    // Fonction "complexe" permettant de trier un tableau d'objets en fonction d'une EXPRESSION PHP � �valuer...
    // Sachant que chaque object du tableau $objectArray sera repr�sent� par la variable $a dans $evaluationCodeForOrderBy
    // PAR EXEMPLE, soit la classe �tudiant li�e avec une classe Adresse, et sur laquelle on voudra faire un tri sur le nom, pr�nom et code postal :
    // Enumeration::sort($TableauEtudiants, '$a->getNom()." ".$a->getPrenom()." (".$a->getAdresse()->getCodePostal().")"')
    public static function sort($objectArray, $evaluationCodeForOrderBy){
        $sortedArray = array();
        $assocArray = array();
        foreach($objectArray as $key => $a){
            $orderByValue="";
            eval('$orderByValue = '.$evaluationCodeForOrderBy.';');
            if(!isset($assocArray[$orderByValue])){
                $sortedArray[count($sortedArray)] = $orderByValue;
                $assocArray[$orderByValue] = array();
            }
            $assocArray[$orderByValue][count($assocArray[$orderByValue])] = $a;
        }
        
        sort($sortedArray);
        
        $returnedArray = array();
        foreach($sortedArray as $a)
            foreach($assocArray[$a] as $b)
                $returnedArray[count($returnedArray)] = $b;
        
        return $returnedArray;
    }
    
    /* Permet de cr�er un array de ISelectable avec $key => $value pour chaque �l�ment en sp�cifiant une EXPRESSION PHP � �valuer pour la cr�ation du $key et du $value
    // Regarder la fonction sort pour voir comment utiliser les eval (le fonctionnement est strictement le meme !)
	public static function getSelectablesArrayFromObject($normalArray, $keyEval, $elemEval){
        $selectablesArray = array();
        foreach($normalArray as $a){
        	$key = "";
        	$elem = "";
        	eval('$key = '.$keyEval.';');
        	eval('$elem = '.$elemEval.';');
            $selectablesArray[count($selectablesArray)] = new Enumerable($key, $elem);
        }
        return $selectablesArray;
	}*/
    
    // Permet de cr�er un array TRIE avec $key => $value pour chaque �l�ment en sp�cifiant une EXPRESSION PHP � �valuer pour la cr�ation du $key et du $value
    // Regarder la fonction sort pour voir comment utiliser les eval (le fonctionnement est strictement le meme !)
	public static function getSelectablesArrayFromObject($normalArray, $keyEval, $elemAndSortEval, $differentSortEval="", $isSorted=true){
		if ($isSorted)
        	$normalArray = Enumeration::sort($normalArray,$differentSortEval!=""?$differentSortEval:$elemAndSortEval);
        $selectablesArray = array();
        foreach($normalArray as $a){
        	$key = "";
        	$elem = "";
        	eval('$key = '.$keyEval.';');
        	eval('$elem = '.$elemAndSortEval.';');
            $selectablesArray[count($selectablesArray)] = new Enumerable($key, $elem);
        }
        return $selectablesArray;
    }
    
}

class Enumerable implements ISelectable{
    private $_optionValue;
    private $_optionLabel;
    
    public function __construct($optionValue, $optionLabel){
        $this->_optionValue = $optionValue;
        $this->_optionLabel = $optionLabel;
    }
    
    public function getFormSelectOptionLabel(){
        return $this->_optionLabel;
    }
    
    public function getFormSelectOptionValue(){
        return $this->_optionValue;
    }
}
?>

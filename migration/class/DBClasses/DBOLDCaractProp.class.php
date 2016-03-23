<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// G�n�r� via PHPClassGenerator via l'url index.php?nb_champs=3&pgc_url=&nom_table=caract_prop&nom_champ_1=id_caract_prop&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_proposition_stage&type_champ_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=id_param_stage&type_champ_3=3&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&

 class DBOLDCaractProp     {
    private static $TABLE_NAME = "caract_prop";
    private static $FIELD_ID_CARACT_PROP = "id_caract_prop";
    private static $FIELD_ID_PROPOSITION_STAGE = "id_proposition_stage";
    private static $FIELD_ID_PARAM_STAGE = "id_param_stage";

    private $_idCaractProp;
    private $_idPropositionStage;
    private $_idParamStage;


    private  function __construct($idCaractProp, $idPropositionStage, $idParamStage){
        $this->_idCaractProp = $idCaractProp;
        $this->_idPropositionStage = $idPropositionStage;
        $this->_idParamStage = $idParamStage;
    }
    public  function getIdCaractProp(){
        return $this->_idCaractProp;
    }
    public  function getPropositionStage(){
        $propStage = DBOLDPropositionStage::getRecords($this->_idPropositionStage);
        if(count($propStage) == 0) return null;
        else{
            assert(count($propStage) == 1);
            return $propStage[0];
        }
    }
    public  function getParamStage(){
        $paramStage = DBOLDParamStage::getRecords($this->_idParamStage);
        if(count($paramStage) == 0) return null;
        else{
            assert(count($paramStage) == 1);
            return $paramStage[0];
        }
    }
    public  function getIdParamStage(){
        return $this->_idParamStage;
    }
    public  function getIdPropositionStage(){
        return $this->_idPropositionStage;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDCaractProp::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDCaractProp::$TABLE_NAME."` (  
    }
    public static function createRecord($idPropositionStage, $idParamStage){
        $sql = "INSERT INTO ".DBOLDCaractProp::$TABLE_NAME." ("
    }
    public static function getRecords($idCaractProp="", $idPropositionStage="", $idParamStage=""){
        $sql = "SELECT * FROM ".DBOLDCaractProp::$TABLE_NAME." WHERE 1";
    }
    public  function updateRecord($idPropositionStage, $idParamStage){
        $sql = "UPDATE ".DBOLDCaractProp::$TABLE_NAME." SET ";
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDCaractProp::$TABLE_NAME." WHERE 1";
    }
}
?>
<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=3&pgc_url=&nom_table=caract_prop&nom_champ_1=id_caract_prop&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_proposition_stage&type_champ_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=id_param_stage&type_champ_3=3&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&

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
        $sql = "CREATE TABLE `".DBOLDCaractProp::$TABLE_NAME."` (                              `".DBOLDCaractProp::$FIELD_ID_CARACT_PROP."` INT(11) NOT NULL  auto_increment,                              `".DBOLDCaractProp::$FIELD_ID_PROPOSITION_STAGE."` INT(11) NOT NULL  ,                              `".DBOLDCaractProp::$FIELD_ID_PARAM_STAGE."` INT(11) NOT NULL  ,                            PRIMARY KEY (`".DBOLDCaractProp::$FIELD_ID_CARACT_PROP."`)                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";                        foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($idPropositionStage, $idParamStage){
        $sql = "INSERT INTO ".DBOLDCaractProp::$TABLE_NAME." ("                            .DBOLDCaractProp::$FIELD_ID_PROPOSITION_STAGE.", "                            .DBOLDCaractProp::$FIELD_ID_PARAM_STAGE." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->processInt($idPropositionStage).", "                            .DBConnector::getDBConnectorSource()->processInt($idParamStage)." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDCaractProp::getRecords($id);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($idCaractProp="", $idPropositionStage="", $idParamStage=""){
        $sql = "SELECT * FROM ".DBOLDCaractProp::$TABLE_NAME." WHERE 1";                if($idCaractProp != "")            $sql .= " AND ".DBOLDCaractProp::$FIELD_ID_CARACT_PROP."=".DBConnector::getDBConnectorSource()->processInt($idCaractProp);        if($idPropositionStage != "")            $sql .= " AND ".DBOLDCaractProp::$FIELD_ID_PROPOSITION_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idPropositionStage);        if($idParamStage != "")            $sql .= " AND ".DBOLDCaractProp::$FIELD_ID_PARAM_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idParamStage);                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDCaractProp(                                            $result[DBOLDCaractProp::$FIELD_ID_CARACT_PROP],                                            $result[DBOLDCaractProp::$FIELD_ID_PROPOSITION_STAGE],                                            $result[DBOLDCaractProp::$FIELD_ID_PARAM_STAGE]                                        );                        $i++;        }                return $return;
    }
    public  function updateRecord($idPropositionStage, $idParamStage){
        $sql = "UPDATE ".DBOLDCaractProp::$TABLE_NAME." SET ";        $sql .= DBOLDCaractProp::$FIELD_ID_PROPOSITION_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idPropositionStage).",";        $sql .= DBOLDCaractProp::$FIELD_ID_PARAM_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idParamStage)."";                $sql .= " WHERE 1";        $sql .= " AND ".DBOLDCaractProp::$FIELD_ID_CARACT_PROP."=".DBConnector::getDBConnectorSource()->processInt($this->_idCaractProp);                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_idPropositionStage = $idPropositionStage;        $this->_idParamStage = $idParamStage;
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDCaractProp::$TABLE_NAME." WHERE 1";        $sql .= " AND ".DBOLDCaractProp::$FIELD_ID_CARACT_PROP."=".DBConnector::getDBConnectorSource()->processInt($this->_idCaractProp);                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
}
?>
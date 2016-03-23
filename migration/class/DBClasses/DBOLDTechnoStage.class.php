<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=15&pgc_url=&nom_table=techno_stage&nom_champ_1=id_techno_stage&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_stage&type_champ_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=id_technologie&type_champ_3=3&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=&type_champ_4=1&taille_champ_4=&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=&type_champ_5=1&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=&type_champ_6=1&taille_champ_6=&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=&type_champ_7=1&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=&type_champ_8=1&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=&type_champ_9=1&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&nom_champ_11=&type_champ_11=1&taille_champ_11=&champ_facultatif_11=&valeur_defaut_11=&auto_increment_11=&clef_primaire_11=&getter_11=on&setter_11=&nom_champ_12=&type_champ_12=1&taille_champ_12=&champ_facultatif_12=&valeur_defaut_12=&auto_increment_12=&clef_primaire_12=&getter_12=on&setter_12=&nom_champ_13=&type_champ_13=1&taille_champ_13=&champ_facultatif_13=&valeur_defaut_13=&auto_increment_13=&clef_primaire_13=&getter_13=on&setter_13=&nom_champ_14=&type_champ_14=1&taille_champ_14=&champ_facultatif_14=&valeur_defaut_14=&auto_increment_14=&clef_primaire_14=&getter_14=on&setter_14=&nom_champ_15=&type_champ_15=1&taille_champ_15=&champ_facultatif_15=&valeur_defaut_15=&auto_increment_15=&clef_primaire_15=&getter_15=on&setter_15=&

 class DBOLDTechnoStage     {
    private static $TABLE_NAME = "techno_stage";
    private static $FIELD_ID_TECHNO_STAGE = "id_techno_stage";
    private static $FIELD_ID_STAGE = "id_stage";
    private static $FIELD_ID_TECHNOLOGIE = "id_technologie";

    private $_idTechnoStage;
    private $_idStage;
    private $_idTechnologie;


    private  function __construct($idTechnoStage, $idStage, $idTechnologie){
        $this->_idTechnoStage = $idTechnoStage;
        $this->_idStage = $idStage;
        $this->_idTechnologie = $idTechnologie;
    }
    public  function getTechnologie(){
        $technos = DBOLDTechnologie::getRecords($this->_idTechnologie);
        if(count($technos) == 0) return null;
        else{
            assert(count($technos) == 1);
            return $technos[0];
        }
    }
    public  function getIdTechnoStage(){
        return $this->_idTechnoStage;
    }
    public  function getIdStage(){
        return $this->_idStage;
    }
    public  function getIdTechnologie(){
        return $this->_idTechnologie;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDTechnoStage::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDTechnoStage::$TABLE_NAME."` (                              `".DBOLDTechnoStage::$FIELD_ID_TECHNO_STAGE."` INT(11) NOT NULL  auto_increment,                              `".DBOLDTechnoStage::$FIELD_ID_STAGE."` INT(11) NOT NULL  ,                              `".DBOLDTechnoStage::$FIELD_ID_TECHNOLOGIE."` INT(11) NOT NULL  ,                            PRIMARY KEY (`".DBOLDTechnoStage::$FIELD_ID_TECHNO_STAGE."`)                ) ENGINE=MyISAM;";                        foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($idStage, $idTechnologie){
        $sql = "INSERT INTO ".DBOLDTechnoStage::$TABLE_NAME." ("                            .DBOLDTechnoStage::$FIELD_ID_STAGE.", "                            .DBOLDTechnoStage::$FIELD_ID_TECHNOLOGIE." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->processInt($idStage).", "                            .DBConnector::getDBConnectorSource()->processInt($idTechnologie)." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDTechnoStage::getRecords($id);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($idTechnoStage="", $idStage="", $idTechnologie=""){
        $sql = "SELECT * FROM ".DBOLDTechnoStage::$TABLE_NAME." WHERE 1";                if($idTechnoStage != "")            $sql .= " AND ".DBOLDTechnoStage::$FIELD_ID_TECHNO_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idTechnoStage);        if($idStage != "")            $sql .= " AND ".DBOLDTechnoStage::$FIELD_ID_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idStage);        if($idTechnologie != "")            $sql .= " AND ".DBOLDTechnoStage::$FIELD_ID_TECHNOLOGIE."=".DBConnector::getDBConnectorSource()->processInt($idTechnologie);                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDTechnoStage(                                            $result[DBOLDTechnoStage::$FIELD_ID_TECHNO_STAGE],                                            $result[DBOLDTechnoStage::$FIELD_ID_STAGE],                                            $result[DBOLDTechnoStage::$FIELD_ID_TECHNOLOGIE]                                        );                        $i++;        }                return $return;
    }
    public  function updateRecord($idStage, $idTechnologie){
        $sql = "UPDATE ".DBOLDTechnoStage::$TABLE_NAME." SET ";        $sql .= DBOLDTechnoStage::$FIELD_ID_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idStage).",";        $sql .= DBOLDTechnoStage::$FIELD_ID_TECHNOLOGIE."=".DBConnector::getDBConnectorSource()->processInt($idTechnologie)."";                $sql .= " WHERE 1";        $sql .= " AND ".DBOLDTechnoStage::$FIELD_ID_TECHNO_STAGE."=".DBConnector::getDBConnectorSource()->processInt($this->_idTechnoStage);                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_idStage = $idStage;        $this->_idTechnologie = $idTechnologie;
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDTechnoStage::$TABLE_NAME." WHERE 1";        $sql .= " AND ".DBOLDTechnoStage::$FIELD_ID_TECHNO_STAGE."=".DBConnector::getDBConnectorSource()->processInt($this->_idTechnoStage);                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
}
?>
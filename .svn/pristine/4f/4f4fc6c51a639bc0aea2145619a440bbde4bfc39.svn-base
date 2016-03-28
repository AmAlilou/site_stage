<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=15&pgc_url=&nom_table=role_pers_stage&nom_champ_1=id_role_pers_stage&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_personne&type_champ_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=id_fonction_stage&type_champ_3=3&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=id_stage&type_champ_4=3&taille_champ_4=&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=&type_champ_5=1&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=&type_champ_6=1&taille_champ_6=&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=&type_champ_7=1&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=&type_champ_8=1&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=&type_champ_9=1&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&nom_champ_11=&type_champ_11=1&taille_champ_11=&champ_facultatif_11=&valeur_defaut_11=&auto_increment_11=&clef_primaire_11=&getter_11=on&setter_11=&nom_champ_12=&type_champ_12=1&taille_champ_12=&champ_facultatif_12=&valeur_defaut_12=&auto_increment_12=&clef_primaire_12=&getter_12=on&setter_12=&nom_champ_13=&type_champ_13=1&taille_champ_13=&champ_facultatif_13=&valeur_defaut_13=&auto_increment_13=&clef_primaire_13=&getter_13=on&setter_13=&nom_champ_14=&type_champ_14=1&taille_champ_14=&champ_facultatif_14=&valeur_defaut_14=&auto_increment_14=&clef_primaire_14=&getter_14=on&setter_14=&nom_champ_15=&type_champ_15=1&taille_champ_15=&champ_facultatif_15=&valeur_defaut_15=&auto_increment_15=&clef_primaire_15=&getter_15=on&setter_15=&

 class DBOLDRolePersStage     {
    private static $TABLE_NAME = "role_pers_stage";
    private static $FIELD_ID_ROLE_PERS_STAGE = "id_role_pers_stage";
    private static $FIELD_ID_PERSONNE = "id_personne";
    private static $FIELD_ID_FONCTION_STAGE = "id_fonction_stage";
    private static $FIELD_ID_STAGE = "id_stage";

    private $_idRolePersStage;
    private $_idPersonne;
    private $_idFonctionStage;
    private $_idStage;


    private  function __construct($idRolePersStage, $idPersonne, $idFonctionStage, $idStage){
        $this->_idRolePersStage = $idRolePersStage;
        $this->_idPersonne = $idPersonne;
        $this->_idFonctionStage = $idFonctionStage;
        $this->_idStage = $idStage;
    }
    public  function getIdRolePersStage(){
        return $this->_idRolePersStage;
    }
    public  function getPersonne(){
        $personnes = DBOLDPersonne::getRecords($this->_idPersonne);
        assert(count($personnes) == 1);
        return $personnes[0];
    }
    public  function getFonctionStage(){
        $fonctions = DBOLDFonction::getRecords($this->_idFonctionStage);
        assert(count($fonctions) == 1);
        return $fonctions[0];
    }
    public  function getIdStage(){
        return $this->_idStage;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDRolePersStage::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDRolePersStage::$TABLE_NAME."` (                              `".DBOLDRolePersStage::$FIELD_ID_ROLE_PERS_STAGE."` INT(11) NOT NULL  auto_increment,                              `".DBOLDRolePersStage::$FIELD_ID_PERSONNE."` INT(11) NOT NULL  ,                              `".DBOLDRolePersStage::$FIELD_ID_FONCTION_STAGE."` INT(11) NOT NULL  ,                              `".DBOLDRolePersStage::$FIELD_ID_STAGE."` INT(11) NOT NULL  ,                            PRIMARY KEY (`".DBOLDRolePersStage::$FIELD_ID_ROLE_PERS_STAGE."`)                ) ENGINE=MyISAM;";                        foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($idPersonne, $idFonctionStage, $idStage){
        $sql = "INSERT INTO ".DBOLDRolePersStage::$TABLE_NAME." ("                            .DBOLDRolePersStage::$FIELD_ID_PERSONNE.", "                            .DBOLDRolePersStage::$FIELD_ID_FONCTION_STAGE.", "                            .DBOLDRolePersStage::$FIELD_ID_STAGE." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->processInt($idPersonne).", "                            .DBConnector::getDBConnectorSource()->processInt($idFonctionStage).", "                            .DBConnector::getDBConnectorSource()->processInt($idStage)." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDRolePersStage::getRecords($id);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($idRolePersStage="", $idPersonne="", $idFonctionStage="", $idStage=""){
        $sql = "SELECT * FROM ".DBOLDRolePersStage::$TABLE_NAME." WHERE 1";                if($idRolePersStage != "")            $sql .= " AND ".DBOLDRolePersStage::$FIELD_ID_ROLE_PERS_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idRolePersStage);        if($idPersonne != "")            $sql .= " AND ".DBOLDRolePersStage::$FIELD_ID_PERSONNE."=".DBConnector::getDBConnectorSource()->processInt($idPersonne);        if($idFonctionStage != "")            $sql .= " AND ".DBOLDRolePersStage::$FIELD_ID_FONCTION_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idFonctionStage);        if($idStage != "")            $sql .= " AND ".DBOLDRolePersStage::$FIELD_ID_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idStage);                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDRolePersStage(                                            $result[DBOLDRolePersStage::$FIELD_ID_ROLE_PERS_STAGE],                                            $result[DBOLDRolePersStage::$FIELD_ID_PERSONNE],                                            $result[DBOLDRolePersStage::$FIELD_ID_FONCTION_STAGE],                                            $result[DBOLDRolePersStage::$FIELD_ID_STAGE]                                        );                        $i++;        }                return $return;
    }
    public  function updateRecord($idPersonne, $idFonctionStage, $idStage){
        $sql = "UPDATE ".DBOLDRolePersStage::$TABLE_NAME." SET ";        $sql .= DBOLDRolePersStage::$FIELD_ID_PERSONNE."=".DBConnector::getDBConnectorSource()->processInt($idPersonne).",";        $sql .= DBOLDRolePersStage::$FIELD_ID_FONCTION_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idFonctionStage).",";        $sql .= DBOLDRolePersStage::$FIELD_ID_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idStage)."";                $sql .= " WHERE 1";        $sql .= " AND ".DBOLDRolePersStage::$FIELD_ID_ROLE_PERS_STAGE."=".DBConnector::getDBConnectorSource()->processInt($this->_idRolePersStage);                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_idPersonne = $idPersonne;        $this->_idFonctionStage = $idFonctionStage;        $this->_idStage = $idStage;
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDRolePersStage::$TABLE_NAME." WHERE 1";        $sql .= " AND ".DBOLDRolePersStage::$FIELD_ID_ROLE_PERS_STAGE."=".DBConnector::getDBConnectorSource()->processInt($this->_idRolePersStage);                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
}
?>
<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=fonction&nom_champ_1=id_fonction&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=libelle_fonction&type_champ_2=1&taille_champ_2=255&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=&type_champ_3=1&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=&type_champ_4=1&taille_champ_4=&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=&type_champ_5=1&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=&type_champ_6=1&taille_champ_6=&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=&type_champ_7=1&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=&type_champ_8=1&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=&type_champ_9=1&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

 class DBOLDFonction     {
    private static $TABLE_NAME = "fonction";
    private static $FIELD_ID_FONCTION = "id_fonction";
    private static $FIELD_LIBELLE_FONCTION = "libelle_fonction";

    private $_idFonction;
    private $_libelleFonction;


    private  function __construct($idFonction, $libelleFonction){
        $this->_idFonction = $idFonction;
        $this->_libelleFonction = $libelleFonction;
    }
    public  function getIdFonction(){
        return $this->_idFonction;
    }
    public  function getLibelleFonction(){
        return $this->_libelleFonction;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDFonction::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDFonction::$TABLE_NAME."` (                              `".DBOLDFonction::$FIELD_ID_FONCTION."` INT(11) NOT NULL  auto_increment,                              `".DBOLDFonction::$FIELD_LIBELLE_FONCTION."` VARCHAR(255) NOT NULL  ,                            PRIMARY KEY (`".DBOLDFonction::$FIELD_ID_FONCTION."`)                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";                        foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($libelleFonction){
        $sql = "INSERT INTO ".DBOLDFonction::$TABLE_NAME." ("                            .DBOLDFonction::$FIELD_LIBELLE_FONCTION." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($libelleFonction))." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDFonction::getRecords($id);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($idFonction="", $libelleFonction=""){
        $sql = "SELECT * FROM ".DBOLDFonction::$TABLE_NAME." WHERE 1";                if($idFonction != "")            $sql .= " AND ".DBOLDFonction::$FIELD_ID_FONCTION."=".DBConnector::getDBConnectorSource()->processInt($idFonction);        if($libelleFonction != "")            $sql .= " AND ".DBOLDFonction::$FIELD_LIBELLE_FONCTION."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($libelleFonction));                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDFonction(                                            $result[DBOLDFonction::$FIELD_ID_FONCTION],                                            $result[DBOLDFonction::$FIELD_LIBELLE_FONCTION]                                        );                        $i++;        }                return $return;
    }
    public  function updateRecord($libelleFonction){
        $sql = "UPDATE ".DBOLDFonction::$TABLE_NAME." SET ";        $sql .= DBOLDFonction::$FIELD_LIBELLE_FONCTION."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($libelleFonction))."";                $sql .= " WHERE 1";        $sql .= " AND ".DBOLDFonction::$FIELD_ID_FONCTION."=".DBConnector::getDBConnectorSource()->processInt($this->_idFonction);                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_libelleFonction = DBConnector::getDBConnectorSource()->echapString($libelleFonction);
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDFonction::$TABLE_NAME." WHERE 1";        $sql .= " AND ".DBOLDFonction::$FIELD_ID_FONCTION."=".DBConnector::getDBConnectorSource()->processInt($this->_idFonction);                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
}
?>
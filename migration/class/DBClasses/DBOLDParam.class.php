<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=param&nom_champ_1=derniere_modif&type_champ_1=8&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=&clef_primaire_1=&getter_1=on&setter_1=&nom_champ_2=&type_champ_2=1&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=&type_champ_3=1&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=&type_champ_4=1&taille_champ_4=&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=&type_champ_5=1&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=&type_champ_6=1&taille_champ_6=&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=&type_champ_7=1&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=&type_champ_8=1&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=&type_champ_9=1&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

 class DBOLDParam     {
    private static $TABLE_NAME = "param";
    private static $FIELD_DERNIERE_MODIF = "derniere_modif";

    private $_derniereModif;


    private  function __construct($derniereModif){
        $this->_derniereModif = $derniereModif;
    }
    public  function getDerniereModif(){
        return $this->_derniereModif;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDParam::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDParam::$TABLE_NAME."` (                              `".DBOLDParam::$FIELD_DERNIERE_MODIF."` DATE NOT NULL                                              ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";                        foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($derniereModif){
        $sql = "INSERT INTO ".DBOLDParam::$TABLE_NAME." ("                            .DBOLDParam::$FIELD_DERNIERE_MODIF." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->computeDate($derniereModif)." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDParam::getRecords($derniereModif);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($derniereModif=""){
        $sql = "SELECT * FROM ".DBOLDParam::$TABLE_NAME." WHERE 1";                if($derniereModif != "")            $sql .= " AND ".DBOLDParam::$FIELD_DERNIERE_MODIF."=".DBConnector::getDBConnectorSource()->computeDate($derniereModif);                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDParam(                                            DBConnector::getDBConnectorSource()->decomputeDate($result[DBOLDParam::$FIELD_DERNIERE_MODIF])                                        );                        $i++;        }                return $return;
    }
/*    public  function updateRecord($derniereModif){
        $sql = "UPDATE ".DBOLDParam::$TABLE_NAME." SET ";        $sql .= DBOLDParam::$FIELD_DERNIERE_MODIF."=".DBConnector::getDBConnectorSource()->computeDate($derniereModif)."";                $sql .= " WHERE 1";{bloc_update_pkeys}                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_derniereModif = $derniereModif;
    }*/
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDParam::$TABLE_NAME." WHERE 1";                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
}
?>
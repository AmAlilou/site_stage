<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=etudiantdonnees&nom_champ_1=idEtudiant&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=&clef_primaire_1=&getter_1=on&setter_1=&nom_champ_2=emailFac&type_champ_2=1&taille_champ_2=255&champ_facultatif_2=on&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=emailStable&type_champ_3=1&taille_champ_3=255&champ_facultatif_3=on&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=adresseFac&type_champ_4=2&taille_champ_4=&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=adresseStable&type_champ_5=2&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=id&type_champ_6=3&taille_champ_6=&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=on&clef_primaire_6=on&getter_6=on&setter_6=&nom_champ_7=&type_champ_7=1&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=&type_champ_8=1&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=&type_champ_9=1&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

 class DBOLDEtudiantdonnees     {
    private static $TABLE_NAME = "EtudiantDonnees";
    private static $FIELD_ID = "id";
    private static $FIELD_ID_ETUDIANT = "idEtudiant";
    private static $FIELD_EMAIL_FAC = "emailFac";
    private static $FIELD_EMAIL_STABLE = "emailStable";
    private static $FIELD_ADRESSE_FAC = "adresseFac";
    private static $FIELD_ADRESSE_STABLE = "adresseStable";

    private $_id;
    private $_idEtudiant;
    private $_emailFac;
    private $_emailStable;
    private $_adresseFac;
    private $_adresseStable;


    private  function __construct($id, $idEtudiant, $emailFac, $emailStable, $adresseFac, $adresseStable){
        $this->_id = $id;
        $this->_idEtudiant = $idEtudiant;
        $this->_emailFac = $emailFac;
        $this->_emailStable = $emailStable;
        $this->_adresseFac = $adresseFac;
        $this->_adresseStable = $adresseStable;
    }
    public  function getId(){
        return $this->_id;
    }
    public  function getEtudiant(){
        $etds = DBOLDEtudiant::getRecords($this->_idEtudiant);
        assert(count($etds) == 1);
        return $etds[0];
    }
    public  function getEmailFac(){
        return $this->_emailFac;
    }
    public  function getEmailStable(){
        return $this->_emailStable;
    }
    public  function getAdresseFac(){
        return $this->_adresseFac;
    }
    public  function getAdresseStable(){
        return $this->_adresseStable;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDEtudiantdonnees::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDEtudiantdonnees::$TABLE_NAME."` (                              `".DBOLDEtudiantdonnees::$FIELD_ID."` INT(11) NOT NULL  auto_increment,                              `".DBOLDEtudiantdonnees::$FIELD_ID_ETUDIANT."` INT(11) NOT NULL  ,                              `".DBOLDEtudiantdonnees::$FIELD_EMAIL_FAC."` VARCHAR(255) NULL  ,                              `".DBOLDEtudiantdonnees::$FIELD_EMAIL_STABLE."` VARCHAR(255) NULL  ,                              `".DBOLDEtudiantdonnees::$FIELD_ADRESSE_FAC."` TEXT NOT NULL  ,                              `".DBOLDEtudiantdonnees::$FIELD_ADRESSE_STABLE."` TEXT NOT NULL  ,                            PRIMARY KEY (`".DBOLDEtudiantdonnees::$FIELD_ID."`)                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";                        foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($idEtudiant, $emailFac, $emailStable, $adresseFac, $adresseStable){
        $sql = "INSERT INTO ".DBOLDEtudiantdonnees::$TABLE_NAME." ("                            .DBOLDEtudiantdonnees::$FIELD_ID_ETUDIANT.", "                            .DBOLDEtudiantdonnees::$FIELD_EMAIL_FAC.", "                            .DBOLDEtudiantdonnees::$FIELD_EMAIL_STABLE.", "                            .DBOLDEtudiantdonnees::$FIELD_ADRESSE_FAC.", "                            .DBOLDEtudiantdonnees::$FIELD_ADRESSE_STABLE." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->processInt($idEtudiant).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($emailFac)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($emailStable)).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($adresseFac)).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($adresseStable))." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDEtudiantdonnees::getRecords($id);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($id="", $idEtudiant="", $emailFac="", $emailStable="", $adresseFac="", $adresseStable=""){
        $sql = "SELECT * FROM ".DBOLDEtudiantdonnees::$TABLE_NAME." WHERE 1";                if($id != "")            $sql .= " AND ".DBOLDEtudiantdonnees::$FIELD_ID."=".DBConnector::getDBConnectorSource()->processInt($id);        if($idEtudiant != "")            $sql .= " AND ".DBOLDEtudiantdonnees::$FIELD_ID_ETUDIANT."=".DBConnector::getDBConnectorSource()->processInt($idEtudiant);        if($emailFac != "")            $sql .= " AND ".DBOLDEtudiantdonnees::$FIELD_EMAIL_FAC."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($emailFac));        if($emailStable != "")            $sql .= " AND ".DBOLDEtudiantdonnees::$FIELD_EMAIL_STABLE."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($emailStable));        if($adresseFac != "")            $sql .= " AND ".DBOLDEtudiantdonnees::$FIELD_ADRESSE_FAC."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($adresseFac));        if($adresseStable != "")            $sql .= " AND ".DBOLDEtudiantdonnees::$FIELD_ADRESSE_STABLE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($adresseStable));                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDEtudiantdonnees(                                            $result[DBOLDEtudiantdonnees::$FIELD_ID],                                            $result[DBOLDEtudiantdonnees::$FIELD_ID_ETUDIANT],                                            $result[DBOLDEtudiantdonnees::$FIELD_EMAIL_FAC],                                            $result[DBOLDEtudiantdonnees::$FIELD_EMAIL_STABLE],                                            $result[DBOLDEtudiantdonnees::$FIELD_ADRESSE_FAC],                                            $result[DBOLDEtudiantdonnees::$FIELD_ADRESSE_STABLE]                                        );                        $i++;        }                return $return;
    }
    public  function updateRecord($idEtudiant, $emailFac, $emailStable, $adresseFac, $adresseStable){
        $sql = "UPDATE ".DBOLDEtudiantdonnees::$TABLE_NAME." SET ";        $sql .= DBOLDEtudiantdonnees::$FIELD_ID_ETUDIANT."=".DBConnector::getDBConnectorSource()->processInt($idEtudiant).",";        $sql .= DBOLDEtudiantdonnees::$FIELD_EMAIL_FAC."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($emailFac)).",";        $sql .= DBOLDEtudiantdonnees::$FIELD_EMAIL_STABLE."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($emailStable)).",";        $sql .= DBOLDEtudiantdonnees::$FIELD_ADRESSE_FAC."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($adresseFac)).",";        $sql .= DBOLDEtudiantdonnees::$FIELD_ADRESSE_STABLE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($adresseStable))."";                $sql .= " WHERE 1";        $sql .= " AND ".DBOLDEtudiantdonnees::$FIELD_ID."=".DBConnector::getDBConnectorSource()->processInt($this->_id);                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_idEtudiant = $idEtudiant;        $this->_emailFac = DBConnector::getDBConnectorSource()->echapString($emailFac);        $this->_emailStable = DBConnector::getDBConnectorSource()->echapString($emailStable);        $this->_adresseFac = DBConnector::getDBConnectorSource()->echapString($adresseFac);        $this->_adresseStable = DBConnector::getDBConnectorSource()->echapString($adresseStable);
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDEtudiantdonnees::$TABLE_NAME." WHERE 1";        $sql .= " AND ".DBOLDEtudiantdonnees::$FIELD_ID."=".DBConnector::getDBConnectorSource()->processInt($this->_id);                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
}
?>
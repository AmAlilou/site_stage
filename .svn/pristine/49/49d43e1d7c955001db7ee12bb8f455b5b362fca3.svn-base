<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=enseignant&nom_champ_1=Id&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=nom&type_champ_2=1&taille_champ_2=255&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=prenom&type_champ_3=1&taille_champ_3=255&champ_facultatif_3=on&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=email&type_champ_4=1&taille_champ_4=255&champ_facultatif_4=on&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=login&type_champ_5=1&taille_champ_5=255&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=password&type_champ_6=4&taille_champ_6=&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=&type_champ_7=1&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=&type_champ_8=1&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=&type_champ_9=1&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

 class DBOLDEnseignant     {
    private static $TABLE_NAME = "Enseignant";
    private static $FIELD_ID = "Id";
    private static $FIELD_NOM = "nom";
    private static $FIELD_PRENOM = "prenom";
    private static $FIELD_EMAIL = "email";
    private static $FIELD_LOGIN = "login";
    private static $FIELD_PASSWORD = "password";

    private $_Id;
    private $_nom;
    private $_prenom;
    private $_email;
    private $_login;
    private $_password;


    private  function __construct($Id, $nom, $prenom, $email, $login, $password){
        $this->_Id = $Id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_email = $email;
        $this->_login = $login;
        $this->_password = $password;
    }
    public  function getId(){
        return $this->_Id;
    }
    public  function getNom(){
        return $this->_nom;
    }
    public  function getPrenom(){
        return $this->_prenom;
    }
    public  function getEmail(){
        return $this->_email;
    }
    public  function getLogin(){
        return $this->_login;
    }
    public  function getPassword(){
        return $this->_password;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDEnseignant::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDEnseignant::$TABLE_NAME."` (                              `".DBOLDEnseignant::$FIELD_ID."` INT(11) NOT NULL  auto_increment,                              `".DBOLDEnseignant::$FIELD_NOM."` VARCHAR(255) NOT NULL  ,                              `".DBOLDEnseignant::$FIELD_PRENOM."` VARCHAR(255) NULL  ,                              `".DBOLDEnseignant::$FIELD_EMAIL."` VARCHAR(255) NULL  ,                              `".DBOLDEnseignant::$FIELD_LOGIN."` VARCHAR(255) NOT NULL  ,                              `".DBOLDEnseignant::$FIELD_PASSWORD."` BIGINT NOT NULL  ,                            PRIMARY KEY (`".DBOLDEnseignant::$FIELD_ID."`)                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";                        
	foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($nom, $prenom, $email, $login, $password){
        $sql = "INSERT INTO ".DBOLDEnseignant::$TABLE_NAME." ("                            .DBOLDEnseignant::$FIELD_NOM.", "                            .DBOLDEnseignant::$FIELD_PRENOM.", "                            .DBOLDEnseignant::$FIELD_EMAIL.", "                            .DBOLDEnseignant::$FIELD_LOGIN.", "                            .DBOLDEnseignant::$FIELD_PASSWORD." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nom)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($prenom)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($email)).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($login)).", "                            .DBConnector::getDBConnectorSource()->processInt($password)." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDEnseignant::getRecords($id);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($Id="", $nom="", $prenom="", $email="", $login="", $password=""){
        $sql = "SELECT * FROM ".DBOLDEnseignant::$TABLE_NAME." WHERE 1";                if($Id != "")            $sql .= " AND ".DBOLDEnseignant::$FIELD_ID."=".DBConnector::getDBConnectorSource()->processInt($Id);        if($nom != "")            $sql .= " AND ".DBOLDEnseignant::$FIELD_NOM."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nom));        if($prenom != "")            $sql .= " AND ".DBOLDEnseignant::$FIELD_PRENOM."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($prenom));        if($email != "")            $sql .= " AND ".DBOLDEnseignant::$FIELD_EMAIL."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($email));        if($login != "")            $sql .= " AND ".DBOLDEnseignant::$FIELD_LOGIN."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($login));        if($password != "")            $sql .= " AND ".DBOLDEnseignant::$FIELD_PASSWORD."=".DBConnector::getDBConnectorSource()->processInt($password);                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDEnseignant(                                            $result[DBOLDEnseignant::$FIELD_ID],                                            $result[DBOLDEnseignant::$FIELD_NOM],                                            $result[DBOLDEnseignant::$FIELD_PRENOM],                                            $result[DBOLDEnseignant::$FIELD_EMAIL],                                            $result[DBOLDEnseignant::$FIELD_LOGIN],                                            $result[DBOLDEnseignant::$FIELD_PASSWORD]                                        );                        $i++;        }                return $return;
    }
    public  function updateRecord($nom, $prenom, $email, $login, $password){
        $sql = "UPDATE ".DBOLDEnseignant::$TABLE_NAME." SET ";        $sql .= DBOLDEnseignant::$FIELD_NOM."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nom)).",";        $sql .= DBOLDEnseignant::$FIELD_PRENOM."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($prenom)).",";        $sql .= DBOLDEnseignant::$FIELD_EMAIL."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($email)).",";        $sql .= DBOLDEnseignant::$FIELD_LOGIN."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($login)).",";        $sql .= DBOLDEnseignant::$FIELD_PASSWORD."=".DBConnector::getDBConnectorSource()->processInt($password)."";                $sql .= " WHERE 1";        $sql .= " AND ".DBOLDEnseignant::$FIELD_ID."=".DBConnector::getDBConnectorSource()->processInt($this->_Id);                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_nom = DBConnector::getDBConnectorSource()->echapString($nom);        $this->_prenom = DBConnector::getDBConnectorSource()->echapString($prenom);        $this->_email = DBConnector::getDBConnectorSource()->echapString($email);        $this->_login = DBConnector::getDBConnectorSource()->echapString($login);        $this->_password = $password;
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDEnseignant::$TABLE_NAME." WHERE 1";        $sql .= " AND ".DBOLDEnseignant::$FIELD_ID."=".DBConnector::getDBConnectorSource()->processInt($this->_Id);                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
}
?>

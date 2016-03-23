<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=etudiant&nom_champ_1=id&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=nom&type_champ_2=1&taille_champ_2=255&champ_facultatif_2=on&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=prenom&type_champ_3=1&taille_champ_3=255&champ_facultatif_3=on&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=promo&type_champ_4=3&taille_champ_4=&champ_facultatif_4=on&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=MIAGe&type_champ_5=1&taille_champ_5=255&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=Sexe&type_champ_6=6&taille_champ_6='H','F'&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=password&type_champ_7=4&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=login&type_champ_8=1&taille_champ_8=255&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=email&type_champ_9=1&taille_champ_9=255&champ_facultatif_9=on&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

 class DBOLDEtudiant     {
    private static $TABLE_NAME = "Etudiant";
    private static $FIELD_ID = "id";
    private static $FIELD_NOM = "nom";
    private static $FIELD_PRENOM = "prenom";
    private static $FIELD_PROMO = "promo";
    private static $FIELD_MIAGE = "MIAGe";
    private static $FIELD_SEXE = "Sexe";
    private static $FIELD_PASSWORD = "password";
    private static $FIELD_LOGIN = "login";
    private static $FIELD_EMAIL = "email";

    private $_id;
    private $_nom;
    private $_prenom;
    private $_promo;
    private $_MIAGe;
    private $_Sexe;
    private $_password;
    private $_login;
    private $_email;


    private  function __construct($id, $nom, $prenom, $promo, $MIAGe, $Sexe, $password, $login, $email){
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_promo = $promo;
        $this->_MIAGe = $MIAGe;
        $this->_Sexe = $Sexe;
        $this->_password = $password;
        $this->_login = $login;
        $this->_email = $email;
    }
    public  function getId(){
        return $this->_id;
    }
    public  function getNom(){
        return $this->_nom;
    }
    public  function getPrenom(){
        return $this->_prenom;
    }
    public  function getPromo(){
        return $this->_promo;
    }
    public  function getMIAGe(){
        return $this->_MIAGe;
    }
    public  function getSexe(){
        return $this->_Sexe;
    }
    public  function getPassword(){
        return $this->_password;
    }
    public  function getLogin(){
        return $this->_login;
    }
    public  function getEmail(){
        return $this->_email;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDEtudiant::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDEtudiant::$TABLE_NAME."` (                              `".DBOLDEtudiant::$FIELD_ID."` INT(11) NOT NULL  auto_increment,                              `".DBOLDEtudiant::$FIELD_NOM."` VARCHAR(255) NULL  ,                              `".DBOLDEtudiant::$FIELD_PRENOM."` VARCHAR(255) NULL  ,                              `".DBOLDEtudiant::$FIELD_PROMO."` INT(11) NULL  ,                              `".DBOLDEtudiant::$FIELD_MIAGE."` VARCHAR(255) NOT NULL  ,                              `".DBOLDEtudiant::$FIELD_SEXE."` ENUM('H','F') NOT NULL  ,                              `".DBOLDEtudiant::$FIELD_PASSWORD."` BIGINT NOT NULL  ,                              `".DBOLDEtudiant::$FIELD_LOGIN."` VARCHAR(255) NOT NULL  ,                              `".DBOLDEtudiant::$FIELD_EMAIL."` VARCHAR(255) NULL  ,                            PRIMARY KEY (`".DBOLDEtudiant::$FIELD_ID."`)                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";                        foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($nom, $prenom, $promo, $MIAGe, $Sexe, $password, $login, $email){
        $sql = "INSERT INTO ".DBOLDEtudiant::$TABLE_NAME." ("                            .DBOLDEtudiant::$FIELD_NOM.", "                            .DBOLDEtudiant::$FIELD_PRENOM.", "                            .DBOLDEtudiant::$FIELD_PROMO.", "                            .DBOLDEtudiant::$FIELD_MIAGE.", "                            .DBOLDEtudiant::$FIELD_SEXE.", "                            .DBOLDEtudiant::$FIELD_PASSWORD.", "                            .DBOLDEtudiant::$FIELD_LOGIN.", "                            .DBOLDEtudiant::$FIELD_EMAIL." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($nom)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($prenom)).", "                            .DBConnector::getDBConnectorSource()->processObject($promo).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($MIAGe)).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($Sexe)).", "                            .DBConnector::getDBConnectorSource()->processInt($password).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($login)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($email))." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDEtudiant::getRecords($id);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($id="", $nom="", $prenom="", $promo="", $MIAGe="", $Sexe="", $password="", $login="", $email=""){
        $sql = "SELECT * FROM ".DBOLDEtudiant::$TABLE_NAME." WHERE 1";                if($id != "")            $sql .= " AND ".DBOLDEtudiant::$FIELD_ID."=".DBConnector::getDBConnectorSource()->processInt($id);        if($nom != "")            $sql .= " AND ".DBOLDEtudiant::$FIELD_NOM."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($nom));        if($prenom != "")            $sql .= " AND ".DBOLDEtudiant::$FIELD_PRENOM."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($prenom));        if($promo != "")            $sql .= " AND ".DBOLDEtudiant::$FIELD_PROMO."=".DBConnector::getDBConnectorSource()->processObject($promo);        if($MIAGe != "")            $sql .= " AND ".DBOLDEtudiant::$FIELD_MIAGE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($MIAGe));        if($Sexe != "")            $sql .= " AND ".DBOLDEtudiant::$FIELD_SEXE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($Sexe));        if($password != "")            $sql .= " AND ".DBOLDEtudiant::$FIELD_PASSWORD."=".DBConnector::getDBConnectorSource()->processInt($password);        if($login != "")            $sql .= " AND ".DBOLDEtudiant::$FIELD_LOGIN."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($login));        if($email != "")            $sql .= " AND ".DBOLDEtudiant::$FIELD_EMAIL."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($email));                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDEtudiant(                                            $result[DBOLDEtudiant::$FIELD_ID],                                            $result[DBOLDEtudiant::$FIELD_NOM],                                            $result[DBOLDEtudiant::$FIELD_PRENOM],                                            $result[DBOLDEtudiant::$FIELD_PROMO],                                            $result[DBOLDEtudiant::$FIELD_MIAGE],                                            $result[DBOLDEtudiant::$FIELD_SEXE],                                            $result[DBOLDEtudiant::$FIELD_PASSWORD],                                            $result[DBOLDEtudiant::$FIELD_LOGIN],                                            $result[DBOLDEtudiant::$FIELD_EMAIL]                                        );                        $i++;        }                return $return;
    }
    public  function updateRecord($nom, $prenom, $promo, $MIAGe, $Sexe, $password, $login, $email){
        $sql = "UPDATE ".DBOLDEtudiant::$TABLE_NAME." SET ";        $sql .= DBOLDEtudiant::$FIELD_NOM."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($nom)).",";        $sql .= DBOLDEtudiant::$FIELD_PRENOM."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($prenom)).",";        $sql .= DBOLDEtudiant::$FIELD_PROMO."=".DBConnector::getDBConnectorSource()->processObject($promo).",";        $sql .= DBOLDEtudiant::$FIELD_MIAGE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($MIAGe)).",";        $sql .= DBOLDEtudiant::$FIELD_SEXE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($Sexe)).",";        $sql .= DBOLDEtudiant::$FIELD_PASSWORD."=".DBConnector::getDBConnectorSource()->processInt($password).",";        $sql .= DBOLDEtudiant::$FIELD_LOGIN."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($login)).",";        $sql .= DBOLDEtudiant::$FIELD_EMAIL."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($email))."";                $sql .= " WHERE 1";        $sql .= " AND ".DBOLDEtudiant::$FIELD_ID."=".DBConnector::getDBConnectorSource()->processInt($this->_id);                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_nom = DBConnector::getDBConnectorSource()->echapString($nom);        $this->_prenom = DBConnector::getDBConnectorSource()->echapString($prenom);        $this->_promo = $promo;        $this->_MIAGe = DBConnector::getDBConnectorSource()->echapString($MIAGe);        $this->_Sexe = DBConnector::getDBConnectorSource()->echapString($Sexe);        $this->_password = $password;        $this->_login = DBConnector::getDBConnectorSource()->echapString($login);        $this->_email = DBConnector::getDBConnectorSource()->echapString($email);
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDEtudiant::$TABLE_NAME." WHERE 1";        $sql .= " AND ".DBOLDEtudiant::$FIELD_ID."=".DBConnector::getDBConnectorSource()->processInt($this->_id);                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
    public function getEtudiantDonnees(){
        $etdDonnees = DBOLDEtudiantdonnees::getRecords("", $this->_id);
        if(count($etdDonnees) == 0) return null;
        else{
            assert(count($etdDonnees) == 1);
            return $etdDonnees[0];
        }
    }
}
?>
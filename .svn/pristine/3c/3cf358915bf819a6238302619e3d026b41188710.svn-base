<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=personne&nom_champ_1=id_personne&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_entreprise&type_champ_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=id_fonction&type_champ_3=3&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=nom&type_champ_4=1&taille_champ_4=255&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=prenom&type_champ_5=1&taille_champ_5=255&champ_facultatif_5=on&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=email&type_champ_6=1&taille_champ_6=255&champ_facultatif_6=on&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=tel&type_champ_7=1&taille_champ_7=50&champ_facultatif_7=on&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=&type_champ_8=1&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=&type_champ_9=1&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

 class DBOLDPersonne     {
    private static $TABLE_NAME = "personne";
    private static $FIELD_ID_PERSONNE = "id_personne";
    private static $FIELD_ID_ENTREPRISE = "id_entreprise";
    private static $FIELD_ID_FONCTION = "id_fonction";
    private static $FIELD_NOM = "nom";
    private static $FIELD_PRENOM = "prenom";
    private static $FIELD_EMAIL = "email";
    private static $FIELD_TEL = "tel";

    private $_idPersonne;
    private $_idEntreprise;
    private $_idFonction;
    private $_nom;
    private $_prenom;
    private $_email;
    private $_tel;


    private  function __construct($idPersonne, $idEntreprise, $idFonction, $nom, $prenom, $email, $tel){
        $this->_idPersonne = $idPersonne;
        $this->_idEntreprise = $idEntreprise;
        $this->_idFonction = $idFonction;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_email = $email;
        $this->_tel = $tel;
    }
    public  function getIdPersonne(){
        return $this->_idPersonne;
    }
    public  function getEntreprise(){
        $entreprises = DBOLDEntreprise::getRecords($this->_idEntreprise);
        if(count($entreprises) == 0) return null;
        else{
            assert(count($entreprises) == 1);
            return $entreprises[0];
        }
    }
    public  function getFonction(){
        $fonctions = DBOLDFonction::getRecords($this->_idFonction);
        if(count($fonctions) == 0) return null;
        else{
            assert(count($fonctions) == 1);
            return $fonctions[0];
        }
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
    public  function getTel(){
        return $this->_tel;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDPersonne::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDPersonne::$TABLE_NAME."` (                              `".DBOLDPersonne::$FIELD_ID_PERSONNE."` INT(11) NOT NULL  auto_increment,                              `".DBOLDPersonne::$FIELD_ID_ENTREPRISE."` INT(11) NOT NULL  ,                              `".DBOLDPersonne::$FIELD_ID_FONCTION."` INT(11) NOT NULL  ,                              `".DBOLDPersonne::$FIELD_NOM."` VARCHAR(255) NOT NULL  ,                              `".DBOLDPersonne::$FIELD_PRENOM."` VARCHAR(255) NULL  ,                              `".DBOLDPersonne::$FIELD_EMAIL."` VARCHAR(255) NULL  ,                              `".DBOLDPersonne::$FIELD_TEL."` VARCHAR(50) NULL  ,                            PRIMARY KEY (`".DBOLDPersonne::$FIELD_ID_PERSONNE."`)                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";                        foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($idEntreprise, $idFonction, $nom, $prenom, $email, $tel){
        $sql = "INSERT INTO ".DBOLDPersonne::$TABLE_NAME." ("                            .DBOLDPersonne::$FIELD_ID_ENTREPRISE.", "                            .DBOLDPersonne::$FIELD_ID_FONCTION.", "                            .DBOLDPersonne::$FIELD_NOM.", "                            .DBOLDPersonne::$FIELD_PRENOM.", "                            .DBOLDPersonne::$FIELD_EMAIL.", "                            .DBOLDPersonne::$FIELD_TEL." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->processInt($idEntreprise).", "                            .DBConnector::getDBConnectorSource()->processInt($idFonction).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nom)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($prenom)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($email)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($tel))." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDPersonne::getRecords($id);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($idPersonne="", $idEntreprise="", $idFonction="", $nom="", $prenom="", $email="", $tel=""){
        $sql = "SELECT * FROM ".DBOLDPersonne::$TABLE_NAME." WHERE 1";                if($idPersonne != "")            $sql .= " AND ".DBOLDPersonne::$FIELD_ID_PERSONNE."=".DBConnector::getDBConnectorSource()->processInt($idPersonne);        if($idEntreprise != "")            $sql .= " AND ".DBOLDPersonne::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnectorSource()->processInt($idEntreprise);        if($idFonction != "")            $sql .= " AND ".DBOLDPersonne::$FIELD_ID_FONCTION."=".DBConnector::getDBConnectorSource()->processInt($idFonction);        if($nom != "")            $sql .= " AND ".DBOLDPersonne::$FIELD_NOM."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nom));        if($prenom != "")            $sql .= " AND ".DBOLDPersonne::$FIELD_PRENOM."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($prenom));        if($email != "")            $sql .= " AND ".DBOLDPersonne::$FIELD_EMAIL."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($email));        if($tel != "")            $sql .= " AND ".DBOLDPersonne::$FIELD_TEL."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($tel));                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDPersonne(                                            $result[DBOLDPersonne::$FIELD_ID_PERSONNE],                                            $result[DBOLDPersonne::$FIELD_ID_ENTREPRISE],                                            $result[DBOLDPersonne::$FIELD_ID_FONCTION],                                            $result[DBOLDPersonne::$FIELD_NOM],                                            $result[DBOLDPersonne::$FIELD_PRENOM],                                            $result[DBOLDPersonne::$FIELD_EMAIL],                                            $result[DBOLDPersonne::$FIELD_TEL]                                        );                        $i++;        }                return $return;
    }
    public  function updateRecord($idEntreprise, $idFonction, $nom, $prenom, $email, $tel){
        $sql = "UPDATE ".DBOLDPersonne::$TABLE_NAME." SET ";        $sql .= DBOLDPersonne::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnectorSource()->processInt($idEntreprise).",";        $sql .= DBOLDPersonne::$FIELD_ID_FONCTION."=".DBConnector::getDBConnectorSource()->processInt($idFonction).",";        $sql .= DBOLDPersonne::$FIELD_NOM."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nom)).",";        $sql .= DBOLDPersonne::$FIELD_PRENOM."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($prenom)).",";        $sql .= DBOLDPersonne::$FIELD_EMAIL."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($email)).",";        $sql .= DBOLDPersonne::$FIELD_TEL."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($tel))."";                $sql .= " WHERE 1";        $sql .= " AND ".DBOLDPersonne::$FIELD_ID_PERSONNE."=".DBConnector::getDBConnectorSource()->processInt($this->_idPersonne);                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_idEntreprise = $idEntreprise;        $this->_idFonction = $idFonction;        $this->_nom = DBConnector::getDBConnectorSource()->echapString($nom);        $this->_prenom = DBConnector::getDBConnectorSource()->echapString($prenom);        $this->_email = DBConnector::getDBConnectorSource()->echapString($email);        $this->_tel = DBConnector::getDBConnectorSource()->echapString($tel);
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDPersonne::$TABLE_NAME." WHERE 1";        $sql .= " AND ".DBOLDPersonne::$FIELD_ID_PERSONNE."=".DBConnector::getDBConnectorSource()->processInt($this->_idPersonne);                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
}
?>
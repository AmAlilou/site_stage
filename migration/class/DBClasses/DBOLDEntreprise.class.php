<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=entreprise&nom_champ_1=id_entreprise&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_type_entreprise&type_champ_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=raison_sociale&type_champ_3=1&taille_champ_3=255&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=url_site&type_champ_4=1&taille_champ_4=255&champ_facultatif_4=on&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=adresse&type_champ_5=1&taille_champ_5=255&champ_facultatif_5=on&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=tel&type_champ_6=1&taille_champ_6=50&champ_facultatif_6=on&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=fax&type_champ_7=1&taille_champ_7=50&champ_facultatif_7=on&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=obsolescence&type_champ_8=3&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=login&type_champ_9=1&taille_champ_9=255&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=password&type_champ_10=1&taille_champ_10=255&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

 class DBOLDEntreprise     {
    private static $TABLE_NAME = "entreprise";
    private static $FIELD_ID_ENTREPRISE = "id_entreprise";
    private static $FIELD_ID_TYPE_ENTREPRISE = "id_type_entreprise";
    private static $FIELD_RAISON_SOCIALE = "raison_sociale";
    private static $FIELD_URL_SITE = "url_site";
    private static $FIELD_ADRESSE = "adresse";
    private static $FIELD_TEL = "tel";
    private static $FIELD_FAX = "fax";
    private static $FIELD_OBSOLESCENCE = "obsolescence";
    private static $FIELD_LOGIN = "login";
    private static $FIELD_PASSWORD = "password";

    private $_idEntreprise;
    private $_idTypeEntreprise;
    private $_raisonSociale;
    private $_urlSite;
    private $_adresse;
    private $_tel;
    private $_fax;
    private $_obsolescence;
    private $_login;
    private $_password;


    private  function __construct($idEntreprise, $idTypeEntreprise, $raisonSociale, $urlSite, $adresse, $tel, $fax, $obsolescence, $login, $password){
        $this->_idEntreprise = $idEntreprise;
        $this->_idTypeEntreprise = $idTypeEntreprise;
        $this->_raisonSociale = $raisonSociale;
        $this->_urlSite = $urlSite;
        $this->_adresse = $adresse;
        $this->_tel = $tel;
        $this->_fax = $fax;
        $this->_obsolescence = $obsolescence;
        $this->_login = $login;
        $this->_password = $password;
    }
    public  function getIdEntreprise(){
        return $this->_idEntreprise;
    }
    public  function getTypeEntreprise(){
        $typeEnt = DBOLDTypeEntreprise::getRecords($this->_idTypeEntreprise);
        // C'est pas normal a mon avis qu'une entreprise n'ait pas de type ... mais bon...
        if(count($typeEnt) == 0) return null;
        else{
            assert(count($typeEnt) == 1);
            return $typeEnt[0];
        }
    }
    public  function getRaisonSociale(){
        return $this->_raisonSociale;
    }
    public  function getUrlSite(){
        return $this->_urlSite;
    }
    public  function getAdresse(){
        return $this->_adresse;
    }
    public  function getTel(){
        return $this->_tel;
    }
    public  function getFax(){
        return $this->_fax;
    }
    public  function getObsolescence(){
        return $this->_obsolescence;
    }
    public  function getLogin(){
        return $this->_login;
    }
    public  function getPassword(){
        return $this->_password;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDEntreprise::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDEntreprise::$TABLE_NAME."` (                              `".DBOLDEntreprise::$FIELD_ID_ENTREPRISE."` INT(11) NOT NULL  auto_increment,                              `".DBOLDEntreprise::$FIELD_ID_TYPE_ENTREPRISE."` INT(11) NOT NULL  ,                              `".DBOLDEntreprise::$FIELD_RAISON_SOCIALE."` VARCHAR(255) NOT NULL  ,                              `".DBOLDEntreprise::$FIELD_URL_SITE."` VARCHAR(255) NULL  ,                              `".DBOLDEntreprise::$FIELD_ADRESSE."` VARCHAR(255) NULL  ,                              `".DBOLDEntreprise::$FIELD_TEL."` VARCHAR(50) NULL  ,                              `".DBOLDEntreprise::$FIELD_FAX."` VARCHAR(50) NULL  ,                              `".DBOLDEntreprise::$FIELD_OBSOLESCENCE."` INT(11) NOT NULL  ,                              `".DBOLDEntreprise::$FIELD_LOGIN."` VARCHAR(255) NOT NULL  ,                              `".DBOLDEntreprise::$FIELD_PASSWORD."` VARCHAR(255) NOT NULL  ,                            PRIMARY KEY (`".DBOLDEntreprise::$FIELD_ID_ENTREPRISE."`)                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";                        foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($idTypeEntreprise, $raisonSociale, $urlSite, $adresse, $tel, $fax, $obsolescence, $login, $password){
        $sql = "INSERT INTO ".DBOLDEntreprise::$TABLE_NAME." ("                            .DBOLDEntreprise::$FIELD_ID_TYPE_ENTREPRISE.", "                            .DBOLDEntreprise::$FIELD_RAISON_SOCIALE.", "                            .DBOLDEntreprise::$FIELD_URL_SITE.", "                            .DBOLDEntreprise::$FIELD_ADRESSE.", "                            .DBOLDEntreprise::$FIELD_TEL.", "                            .DBOLDEntreprise::$FIELD_FAX.", "                            .DBOLDEntreprise::$FIELD_OBSOLESCENCE.", "                            .DBOLDEntreprise::$FIELD_LOGIN.", "                            .DBOLDEntreprise::$FIELD_PASSWORD." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->processInt($idTypeEntreprise).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($raisonSociale)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($urlSite)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($adresse)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($tel)).", "                            .DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($fax)).", "                            .DBConnector::getDBConnectorSource()->processInt($obsolescence).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($login)).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($password))." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDEntreprise::getRecords($id);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($idEntreprise="", $idTypeEntreprise="", $raisonSociale="", $urlSite="", $adresse="", $tel="", $fax="", $obsolescence="", $login="", $password=""){
        $sql = "SELECT * FROM ".DBOLDEntreprise::$TABLE_NAME." WHERE 1";                if($idEntreprise != "")            $sql .= " AND ".DBOLDEntreprise::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnectorSource()->processInt($idEntreprise);        if($idTypeEntreprise != "")            $sql .= " AND ".DBOLDEntreprise::$FIELD_ID_TYPE_ENTREPRISE."=".DBConnector::getDBConnectorSource()->processInt($idTypeEntreprise);        if($raisonSociale != "")            $sql .= " AND ".DBOLDEntreprise::$FIELD_RAISON_SOCIALE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($raisonSociale));        if($urlSite != "")            $sql .= " AND ".DBOLDEntreprise::$FIELD_URL_SITE."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($urlSite));        if($adresse != "")            $sql .= " AND ".DBOLDEntreprise::$FIELD_ADRESSE."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($adresse));        if($tel != "")            $sql .= " AND ".DBOLDEntreprise::$FIELD_TEL."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($tel));        if($fax != "")            $sql .= " AND ".DBOLDEntreprise::$FIELD_FAX."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($fax));        if($obsolescence != "")            $sql .= " AND ".DBOLDEntreprise::$FIELD_OBSOLESCENCE."=".DBConnector::getDBConnectorSource()->processInt($obsolescence);        if($login != "")            $sql .= " AND ".DBOLDEntreprise::$FIELD_LOGIN."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($login));        if($password != "")            $sql .= " AND ".DBOLDEntreprise::$FIELD_PASSWORD."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($password));                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDEntreprise(                                            $result[DBOLDEntreprise::$FIELD_ID_ENTREPRISE],                                            $result[DBOLDEntreprise::$FIELD_ID_TYPE_ENTREPRISE],                                            $result[DBOLDEntreprise::$FIELD_RAISON_SOCIALE],                                            $result[DBOLDEntreprise::$FIELD_URL_SITE],                                            $result[DBOLDEntreprise::$FIELD_ADRESSE],                                            $result[DBOLDEntreprise::$FIELD_TEL],                                            $result[DBOLDEntreprise::$FIELD_FAX],                                            $result[DBOLDEntreprise::$FIELD_OBSOLESCENCE],                                            $result[DBOLDEntreprise::$FIELD_LOGIN],                                            $result[DBOLDEntreprise::$FIELD_PASSWORD]                                        );                        $i++;        }                return $return;
    }
    public  function updateRecord($idTypeEntreprise, $raisonSociale, $urlSite, $adresse, $tel, $fax, $obsolescence, $login, $password){
        $sql = "UPDATE ".DBOLDEntreprise::$TABLE_NAME." SET ";        $sql .= DBOLDEntreprise::$FIELD_ID_TYPE_ENTREPRISE."=".DBConnector::getDBConnectorSource()->processInt($idTypeEntreprise).",";        $sql .= DBOLDEntreprise::$FIELD_RAISON_SOCIALE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($raisonSociale)).",";        $sql .= DBOLDEntreprise::$FIELD_URL_SITE."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($urlSite)).",";        $sql .= DBOLDEntreprise::$FIELD_ADRESSE."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($adresse)).",";        $sql .= DBOLDEntreprise::$FIELD_TEL."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($tel)).",";        $sql .= DBOLDEntreprise::$FIELD_FAX."=".DBConnector::getDBConnectorSource()->processObject(DBConnector::getDBConnectorSource()->echapString($fax)).",";        $sql .= DBOLDEntreprise::$FIELD_OBSOLESCENCE."=".DBConnector::getDBConnectorSource()->processInt($obsolescence).",";        $sql .= DBOLDEntreprise::$FIELD_LOGIN."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($login)).",";        $sql .= DBOLDEntreprise::$FIELD_PASSWORD."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($password))."";                $sql .= " WHERE 1";        $sql .= " AND ".DBOLDEntreprise::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnectorSource()->processInt($this->_idEntreprise);                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_idTypeEntreprise = $idTypeEntreprise;        $this->_raisonSociale = DBConnector::getDBConnectorSource()->echapString($raisonSociale);        $this->_urlSite = DBConnector::getDBConnectorSource()->echapString($urlSite);        $this->_adresse = DBConnector::getDBConnectorSource()->echapString($adresse);        $this->_tel = DBConnector::getDBConnectorSource()->echapString($tel);        $this->_fax = DBConnector::getDBConnectorSource()->echapString($fax);        $this->_obsolescence = $obsolescence;        $this->_login = DBConnector::getDBConnectorSource()->echapString($login);        $this->_password = DBConnector::getDBConnectorSource()->echapString($password);
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDEntreprise::$TABLE_NAME." WHERE 1";        $sql .= " AND ".DBOLDEntreprise::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnectorSource()->processInt($this->_idEntreprise);                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
}
?>
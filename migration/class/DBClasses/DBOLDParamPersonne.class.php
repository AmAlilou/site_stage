<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// G�n�r� via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=param_personne&nom_champ_1=id_param_personne&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=email&type_champ_2=1&taille_champ_2=255&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=login&type_champ_3=1&taille_champ_3=50&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=password&type_champ_4=1&taille_champ_4=50&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=&type_champ_5=1&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=&type_champ_6=1&taille_champ_6=&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=&type_champ_7=1&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=&type_champ_8=1&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=&type_champ_9=1&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

 class DBOLDParamPersonne     {
    private static $TABLE_NAME = "param_personne";
    private static $FIELD_ID_PARAM_PERSONNE = "id_param_personne";
    private static $FIELD_EMAIL = "email";
    private static $FIELD_LOGIN = "login";
    private static $FIELD_PASSWORD = "password";

    private $_idParamPersonne;
    private $_email;
    private $_login;
    private $_password;


    private  function __construct($idParamPersonne, $email, $login, $password){
        $this->_idParamPersonne = $idParamPersonne;
        $this->_email = $email;
        $this->_login = $login;
        $this->_password = $password;
    }
    public  function getIdParamPersonne(){
        return $this->_idParamPersonne;
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
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDParamPersonne::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDParamPersonne::$TABLE_NAME."` (  
    }
    public static function createRecord($email, $login, $password){
        $sql = "INSERT INTO ".DBOLDParamPersonne::$TABLE_NAME." ("
    }
    public static function getRecords($idParamPersonne="", $email="", $login="", $password=""){
        $sql = "SELECT * FROM ".DBOLDParamPersonne::$TABLE_NAME." WHERE 1";
    }
    public  function updateRecord($email, $login, $password){
        $sql = "UPDATE ".DBOLDParamPersonne::$TABLE_NAME." SET ";
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDParamPersonne::$TABLE_NAME." WHERE 1";
    }
}
?>
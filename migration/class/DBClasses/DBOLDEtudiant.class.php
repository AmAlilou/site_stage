<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// G�n�r� via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=etudiant&nom_champ_1=id&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=nom&type_champ_2=1&taille_champ_2=255&champ_facultatif_2=on&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=prenom&type_champ_3=1&taille_champ_3=255&champ_facultatif_3=on&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=promo&type_champ_4=3&taille_champ_4=&champ_facultatif_4=on&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=MIAGe&type_champ_5=1&taille_champ_5=255&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=Sexe&type_champ_6=6&taille_champ_6='H','F'&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=password&type_champ_7=4&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=login&type_champ_8=1&taille_champ_8=255&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=email&type_champ_9=1&taille_champ_9=255&champ_facultatif_9=on&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

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
        $sql = "CREATE TABLE `".DBOLDEtudiant::$TABLE_NAME."` (  
    }
    public static function createRecord($nom, $prenom, $promo, $MIAGe, $Sexe, $password, $login, $email){
        $sql = "INSERT INTO ".DBOLDEtudiant::$TABLE_NAME." ("
    }
    public static function getRecords($id="", $nom="", $prenom="", $promo="", $MIAGe="", $Sexe="", $password="", $login="", $email=""){
        $sql = "SELECT * FROM ".DBOLDEtudiant::$TABLE_NAME." WHERE 1";
    }
    public  function updateRecord($nom, $prenom, $promo, $MIAGe, $Sexe, $password, $login, $email){
        $sql = "UPDATE ".DBOLDEtudiant::$TABLE_NAME." SET ";
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDEtudiant::$TABLE_NAME." WHERE 1";
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
<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// G�n�r� via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=etudiantdonnees&nom_champ_1=idEtudiant&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=&clef_primaire_1=&getter_1=on&setter_1=&nom_champ_2=emailFac&type_champ_2=1&taille_champ_2=255&champ_facultatif_2=on&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=emailStable&type_champ_3=1&taille_champ_3=255&champ_facultatif_3=on&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=adresseFac&type_champ_4=2&taille_champ_4=&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=adresseStable&type_champ_5=2&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=id&type_champ_6=3&taille_champ_6=&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=on&clef_primaire_6=on&getter_6=on&setter_6=&nom_champ_7=&type_champ_7=1&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=&type_champ_8=1&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=&type_champ_9=1&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

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
        $sql = "CREATE TABLE `".DBOLDEtudiantdonnees::$TABLE_NAME."` (  
    }
    public static function createRecord($idEtudiant, $emailFac, $emailStable, $adresseFac, $adresseStable){
        $sql = "INSERT INTO ".DBOLDEtudiantdonnees::$TABLE_NAME." ("
    }
    public static function getRecords($id="", $idEtudiant="", $emailFac="", $emailStable="", $adresseFac="", $adresseStable=""){
        $sql = "SELECT * FROM ".DBOLDEtudiantdonnees::$TABLE_NAME." WHERE 1";
    }
    public  function updateRecord($idEtudiant, $emailFac, $emailStable, $adresseFac, $adresseStable){
        $sql = "UPDATE ".DBOLDEtudiantdonnees::$TABLE_NAME." SET ";
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDEtudiantdonnees::$TABLE_NAME." WHERE 1";
    }
}
?>
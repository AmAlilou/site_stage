<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// G�n�r� via PHPClassGenerator via l'url index.php?nb_champs=3&pgc_url=&nom_table=domaine&nom_champ_1=id_domaine&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=libelle_domaine&type_champ_2=1&taille_champ_2=50&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=&type_champ_3=1&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&

 class DBOLDDomaine     {
    private static $TABLE_NAME = "domaine";
    private static $FIELD_ID_DOMAINE = "id_domaine";
    private static $FIELD_LIBELLE_DOMAINE = "libelle_domaine";

    private $_idDomaine;
    private $_libelleDomaine;


    private  function __construct($idDomaine, $libelleDomaine){
        $this->_idDomaine = $idDomaine;
        $this->_libelleDomaine = $libelleDomaine;
    }
    public  function getIdDomaine(){
        return $this->_idDomaine;
    }
    public  function getLibelleDomaine(){
        return $this->_libelleDomaine;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDDomaine::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDDomaine::$TABLE_NAME."` (  
    }
    public static function createRecord($libelleDomaine){
        $sql = "INSERT INTO ".DBOLDDomaine::$TABLE_NAME." ("
    }
    public static function getRecords($idDomaine="", $libelleDomaine=""){
        $sql = "SELECT * FROM ".DBOLDDomaine::$TABLE_NAME." WHERE 1";
    }
    public  function updateRecord($libelleDomaine){
        $sql = "UPDATE ".DBOLDDomaine::$TABLE_NAME." SET ";
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDDomaine::$TABLE_NAME." WHERE 1";
    }
}
?>
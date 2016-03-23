<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// G�n�r� via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=param_stage&nom_champ_1=id_param_stage&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=libelle_param_stage&type_champ_2=1&taille_champ_2=50&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=date_debut&type_champ_3=8&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=date_fin&type_champ_4=8&taille_champ_4=&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=affichage_propo_stage&type_champ_5=3&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=date_rapport&type_champ_6=8&taille_champ_6=&champ_facultatif_6=on&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=date_soutenance1&type_champ_7=8&taille_champ_7=&champ_facultatif_7=on&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=date_soutenance2&type_champ_8=8&taille_champ_8=&champ_facultatif_8=on&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=id_param_projet&type_champ_9=3&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=promo&type_champ_10=1&taille_champ_10=20&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&

 class DBOLDParamStage     {
    private static $TABLE_NAME = "param_stage";
    private static $FIELD_ID_PARAM_STAGE = "id_param_stage";
    private static $FIELD_LIBELLE_PARAM_STAGE = "libelle_param_stage";
    private static $FIELD_DATE_DEBUT = "date_debut";
    private static $FIELD_DATE_FIN = "date_fin";
    private static $FIELD_AFFICHAGE_PROPO_STAGE = "affichage_propo_stage";
    private static $FIELD_DATE_RAPPORT = "date_rapport";
    private static $FIELD_DATE_SOUTENANCE1 = "date_soutenance1";
    private static $FIELD_DATE_SOUTENANCE2 = "date_soutenance2";
    private static $FIELD_ID_PARAM_PROJET = "id_param_projet";
    private static $FIELD_PROMO = "promo";

    private $_idParamStage;
    private $_libelleParamStage;
    private $_dateDebut;
    private $_dateFin;
    private $_affichagePropoStage;
    private $_dateRapport;
    private $_dateSoutenance1;
    private $_dateSoutenance2;
    private $_idParamProjet;
    private $_promo;

    private  function __construct($idParamStage, $libelleParamStage, $dateDebut, $dateFin, $affichagePropoStage, $dateRapport, $dateSoutenance1, $dateSoutenance2, $idParamProjet, $promo){
        $this->_idParamStage = $idParamStage;
        $this->_libelleParamStage = $libelleParamStage;
        $this->_dateDebut = $dateDebut;
        $this->_dateFin = $dateFin;
        $this->_affichagePropoStage = $affichagePropoStage;
        $this->_dateRapport = $dateRapport;
        $this->_dateSoutenance1 = $dateSoutenance1;
        $this->_dateSoutenance2 = $dateSoutenance2;
        $this->_idParamProjet = $idParamProjet;
        $this->_promo = $promo;
    }
    public  function getIdParamStage(){
        return $this->_idParamStage;
    }
    public  function getLibelleParamStage(){
        return $this->_libelleParamStage;
    }
    public  function getDateDebut(){
        return $this->_dateDebut;
    }
    public  function getDateFin(){
        return $this->_dateFin;
    }
    public  function getAffichagePropoStage(){
        return $this->_affichagePropoStage;
    }
    public  function getDateRapport(){
        return $this->_dateRapport;
    }
    public  function getDateSoutenance1(){
        return $this->_dateSoutenance1;
    }
    public  function getDateSoutenance2(){
        return $this->_dateSoutenance2;
    }
    public  function getIdParamProjet(){
        return $this->_idParamProjet;
    }
    public  function getPromo(){
        return $this->_promo;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDParamStage::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDParamStage::$TABLE_NAME."` (  
    }
    public static function createRecord($libelleParamStage, $dateDebut, $dateFin, $affichagePropoStage, $dateRapport, $dateSoutenance1, $dateSoutenance2, $idParamProjet, $promo){
        $sql = "INSERT INTO ".DBOLDParamStage::$TABLE_NAME." ("
    }
    public static function getRecords($idParamStage="", $libelleParamStage="", $dateDebut="", $dateFin="", $affichagePropoStage="", $dateRapport="", $dateSoutenance1="", $dateSoutenance2="", $idParamProjet="", $promo=""){
        $sql = "SELECT * FROM ".DBOLDParamStage::$TABLE_NAME." WHERE 1";
    }
    public  function updateRecord($libelleParamStage, $dateDebut, $dateFin, $affichagePropoStage, $dateRapport, $dateSoutenance1, $dateSoutenance2, $idParamProjet, $promo){
        $sql = "UPDATE ".DBOLDParamStage::$TABLE_NAME." SET ";
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDParamStage::$TABLE_NAME." WHERE 1";
    }
}
?>
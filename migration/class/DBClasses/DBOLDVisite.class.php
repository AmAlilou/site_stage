<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=15&pgc_url=&nom_table=visite&nom_champ_1=id_visite&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_stage&type_champ_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=nom_resp_rencontre&type_champ_3=1&taille_champ_3=50&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=nom_resp_apprentissage&type_champ_4=1&taille_champ_4=50&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=avis_resp_rencontre&type_champ_5=2&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=avis_etudiant&type_champ_6=2&taille_champ_6=&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=avis_enseignant&type_champ_7=2&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=corresp_sujet_travail&type_champ_8=2&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=&type_champ_9=1&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=&type_champ_10=1&taille_champ_10=&champ_facultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&nom_champ_11=&type_champ_11=1&taille_champ_11=&champ_facultatif_11=&valeur_defaut_11=&auto_increment_11=&clef_primaire_11=&getter_11=on&setter_11=&nom_champ_12=&type_champ_12=1&taille_champ_12=&champ_facultatif_12=&valeur_defaut_12=&auto_increment_12=&clef_primaire_12=&getter_12=on&setter_12=&nom_champ_13=&type_champ_13=1&taille_champ_13=&champ_facultatif_13=&valeur_defaut_13=&auto_increment_13=&clef_primaire_13=&getter_13=on&setter_13=&nom_champ_14=&type_champ_14=1&taille_champ_14=&champ_facultatif_14=&valeur_defaut_14=&auto_increment_14=&clef_primaire_14=&getter_14=on&setter_14=&nom_champ_15=&type_champ_15=1&taille_champ_15=&champ_facultatif_15=&valeur_defaut_15=&auto_increment_15=&clef_primaire_15=&getter_15=on&setter_15=&

 class DBOLDVisite     {
    private static $TABLE_NAME = "visite";
    private static $FIELD_ID_VISITE = "id_visite";
    private static $FIELD_ID_STAGE = "id_stage";
    private static $FIELD_NOM_RESP_RENCONTRE = "nom_resp_rencontre";
    private static $FIELD_NOM_RESP_APPRENTISSAGE = "nom_resp_apprentissage";
    private static $FIELD_AVIS_RESP_RENCONTRE = "avis_resp_rencontre";
    private static $FIELD_AVIS_ETUDIANT = "avis_etudiant";
    private static $FIELD_AVIS_ENSEIGNANT = "avis_enseignant";
    private static $FIELD_CORRESP_SUJET_TRAVAIL = "corresp_sujet_travail";

    private $_idVisite;
    private $_idStage;
    private $_nomRespRencontre;
    private $_nomRespApprentissage;
    private $_avisRespRencontre;
    private $_avisEtudiant;
    private $_avisEnseignant;
    private $_correspSujetTravail;


    private  function __construct($idVisite, $idStage, $nomRespRencontre, $nomRespApprentissage, $avisRespRencontre, $avisEtudiant, $avisEnseignant, $correspSujetTravail){
        $this->_idVisite = $idVisite;
        $this->_idStage = $idStage;
        $this->_nomRespRencontre = $nomRespRencontre;
        $this->_nomRespApprentissage = $nomRespApprentissage;
        $this->_avisRespRencontre = $avisRespRencontre;
        $this->_avisEtudiant = $avisEtudiant;
        $this->_avisEnseignant = $avisEnseignant;
        $this->_correspSujetTravail = $correspSujetTravail;
    }
    public  function getIdVisite(){
        return $this->_idVisite;
    }
    public  function getIdStage(){
        return $this->_idStage;
    }
    public  function getNomRespRencontre(){
        return $this->_nomRespRencontre;
    }
    public  function getNomRespApprentissage(){
        return $this->_nomRespApprentissage;
    }
    public  function getAvisRespRencontre(){
        return $this->_avisRespRencontre;
    }
    public  function getAvisEtudiant(){
        return $this->_avisEtudiant;
    }
    public  function getAvisEnseignant(){
        return $this->_avisEnseignant;
    }
    public  function getCorrespSujetTravail(){
        return $this->_correspSujetTravail;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDVisite::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDVisite::$TABLE_NAME."` (                              `".DBOLDVisite::$FIELD_ID_VISITE."` INT(11) NOT NULL  auto_increment,                              `".DBOLDVisite::$FIELD_ID_STAGE."` INT(11) NOT NULL  ,                              `".DBOLDVisite::$FIELD_NOM_RESP_RENCONTRE."` VARCHAR(50) NOT NULL  ,                              `".DBOLDVisite::$FIELD_NOM_RESP_APPRENTISSAGE."` VARCHAR(50) NOT NULL  ,                              `".DBOLDVisite::$FIELD_AVIS_RESP_RENCONTRE."` TEXT NOT NULL  ,                              `".DBOLDVisite::$FIELD_AVIS_ETUDIANT."` TEXT NOT NULL  ,                              `".DBOLDVisite::$FIELD_AVIS_ENSEIGNANT."` TEXT NOT NULL  ,                              `".DBOLDVisite::$FIELD_CORRESP_SUJET_TRAVAIL."` TEXT NOT NULL  ,                            PRIMARY KEY (`".DBOLDVisite::$FIELD_ID_VISITE."`)                ) ENGINE=MyISAM;";                        foreach(explode(";", $sql) as $query)        {            if($query != "")                DBConnector::getDBConnectorSource()->executeQuery($query);        }
    }
    public static function createRecord($idStage, $nomRespRencontre, $nomRespApprentissage, $avisRespRencontre, $avisEtudiant, $avisEnseignant, $correspSujetTravail){
        $sql = "INSERT INTO ".DBOLDVisite::$TABLE_NAME." ("                            .DBOLDVisite::$FIELD_ID_STAGE.", "                            .DBOLDVisite::$FIELD_NOM_RESP_RENCONTRE.", "                            .DBOLDVisite::$FIELD_NOM_RESP_APPRENTISSAGE.", "                            .DBOLDVisite::$FIELD_AVIS_RESP_RENCONTRE.", "                            .DBOLDVisite::$FIELD_AVIS_ETUDIANT.", "                            .DBOLDVisite::$FIELD_AVIS_ENSEIGNANT.", "                            .DBOLDVisite::$FIELD_CORRESP_SUJET_TRAVAIL." "                            .") VALUES ("                            .DBConnector::getDBConnectorSource()->processInt($idStage).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nomRespRencontre)).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nomRespApprentissage)).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($avisRespRencontre)).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($avisEtudiant)).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($avisEnseignant)).", "                            .DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($correspSujetTravail))." "                            .")";                $id = DBConnector::getDBConnectorSource()->executeQuery($sql);                $obj = DBOLDVisite::getRecords($id);        assert(count($obj) == 1);        return $obj[0];
    }
    public static function getRecords($idVisite="", $idStage="", $nomRespRencontre="", $nomRespApprentissage="", $avisRespRencontre="", $avisEtudiant="", $avisEnseignant="", $correspSujetTravail=""){
        $sql = "SELECT * FROM ".DBOLDVisite::$TABLE_NAME." WHERE 1";                if($idVisite != "")            $sql .= " AND ".DBOLDVisite::$FIELD_ID_VISITE."=".DBConnector::getDBConnectorSource()->processInt($idVisite);        if($idStage != "")            $sql .= " AND ".DBOLDVisite::$FIELD_ID_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idStage);        if($nomRespRencontre != "")            $sql .= " AND ".DBOLDVisite::$FIELD_NOM_RESP_RENCONTRE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nomRespRencontre));        if($nomRespApprentissage != "")            $sql .= " AND ".DBOLDVisite::$FIELD_NOM_RESP_APPRENTISSAGE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nomRespApprentissage));        if($avisRespRencontre != "")            $sql .= " AND ".DBOLDVisite::$FIELD_AVIS_RESP_RENCONTRE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($avisRespRencontre));        if($avisEtudiant != "")            $sql .= " AND ".DBOLDVisite::$FIELD_AVIS_ETUDIANT."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($avisEtudiant));        if($avisEnseignant != "")            $sql .= " AND ".DBOLDVisite::$FIELD_AVIS_ENSEIGNANT."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($avisEnseignant));        if($correspSujetTravail != "")            $sql .= " AND ".DBOLDVisite::$FIELD_CORRESP_SUJET_TRAVAIL."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($correspSujetTravail));                $res = DBConnector::getDBConnectorSource()->executeQuery($sql);                $return = array();        $i=0;        while($result = DBConnector::getDBConnectorSource()->fetchArray($res))        {            $return[$i] = new DBOLDVisite(                                            $result[DBOLDVisite::$FIELD_ID_VISITE],                                            $result[DBOLDVisite::$FIELD_ID_STAGE],                                            $result[DBOLDVisite::$FIELD_NOM_RESP_RENCONTRE],                                            $result[DBOLDVisite::$FIELD_NOM_RESP_APPRENTISSAGE],                                            $result[DBOLDVisite::$FIELD_AVIS_RESP_RENCONTRE],                                            $result[DBOLDVisite::$FIELD_AVIS_ETUDIANT],                                            $result[DBOLDVisite::$FIELD_AVIS_ENSEIGNANT],                                            $result[DBOLDVisite::$FIELD_CORRESP_SUJET_TRAVAIL]                                        );                        $i++;        }                return $return;
    }
    public  function updateRecord($idStage, $nomRespRencontre, $nomRespApprentissage, $avisRespRencontre, $avisEtudiant, $avisEnseignant, $correspSujetTravail){
        $sql = "UPDATE ".DBOLDVisite::$TABLE_NAME." SET ";        $sql .= DBOLDVisite::$FIELD_ID_STAGE."=".DBConnector::getDBConnectorSource()->processInt($idStage).",";        $sql .= DBOLDVisite::$FIELD_NOM_RESP_RENCONTRE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nomRespRencontre)).",";        $sql .= DBOLDVisite::$FIELD_NOM_RESP_APPRENTISSAGE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($nomRespApprentissage)).",";        $sql .= DBOLDVisite::$FIELD_AVIS_RESP_RENCONTRE."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($avisRespRencontre)).",";        $sql .= DBOLDVisite::$FIELD_AVIS_ETUDIANT."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($avisEtudiant)).",";        $sql .= DBOLDVisite::$FIELD_AVIS_ENSEIGNANT."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($avisEnseignant)).",";        $sql .= DBOLDVisite::$FIELD_CORRESP_SUJET_TRAVAIL."=".DBConnector::getDBConnectorSource()->processString(DBConnector::getDBConnectorSource()->echapString($correspSujetTravail))."";                $sql .= " WHERE 1";        $sql .= " AND ".DBOLDVisite::$FIELD_ID_VISITE."=".DBConnector::getDBConnectorSource()->processInt($this->_idVisite);                DBConnector::getDBConnectorSource()->executeQuery($sql);                $this->_idStage = $idStage;        $this->_nomRespRencontre = DBConnector::getDBConnectorSource()->echapString($nomRespRencontre);        $this->_nomRespApprentissage = DBConnector::getDBConnectorSource()->echapString($nomRespApprentissage);        $this->_avisRespRencontre = DBConnector::getDBConnectorSource()->echapString($avisRespRencontre);        $this->_avisEtudiant = DBConnector::getDBConnectorSource()->echapString($avisEtudiant);        $this->_avisEnseignant = DBConnector::getDBConnectorSource()->echapString($avisEnseignant);        $this->_correspSujetTravail = DBConnector::getDBConnectorSource()->echapString($correspSujetTravail);
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDVisite::$TABLE_NAME." WHERE 1";        $sql .= " AND ".DBOLDVisite::$FIELD_ID_VISITE."=".DBConnector::getDBConnectorSource()->processInt($this->_idVisite);                DBConnector::getDBConnectorSource()->executeQuery($sql);
    }
}
?>
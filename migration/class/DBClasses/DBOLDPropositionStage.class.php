<?php
set_include_path(".".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// G�n�r� via PHPClassGenerator via l'url index.php?nb_champs=15&pgc_url=&nom_table=proposition_stage&nom_champ_1=id_proposition_stage&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_domaine&type_champ_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=id_resp_stage&type_champ_3=3&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=date_debut&type_champ_4=8&taille_champ_4=&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=date_fin&type_champ_5=8&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=intitule&type_champ_6=2&taille_champ_6=&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=sujet&type_champ_7=2&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=nb_etudiant&type_champ_8=3&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=indemnite&type_champ_9=3&taille_champ_9=&champ_facultatif_9=on&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=valide&type_champ_10=3&taille_champ_10=&champ_facultatif_10=on&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&nom_champ_11=motif_refus&type_champ_11=2&taille_champ_11=&champ_facultatif_11=on&valeur_defaut_11=&auto_increment_11=&clef_primaire_11=&getter_11=on&setter_11=&nom_champ_12=date_creation&type_champ_12=8&taille_champ_12=&champ_facultatif_12=&valeur_defaut_12=&auto_increment_12=&clef_primaire_12=&getter_12=on&setter_12=&nom_champ_13=id_entreprise&type_champ_13=3&taille_champ_13=&champ_facultatif_13=&valeur_defaut_13=&auto_increment_13=&clef_primaire_13=&getter_13=on&setter_13=&nom_champ_14=&type_champ_14=1&taille_champ_14=&champ_facultatif_14=&valeur_defaut_14=&auto_increment_14=&clef_primaire_14=&getter_14=on&setter_14=&nom_champ_15=&type_champ_15=1&taille_champ_15=&champ_facultatif_15=&valeur_defaut_15=&auto_increment_15=&clef_primaire_15=&getter_15=on&setter_15=&

 class DBOLDPropositionStage     {
    private static $TABLE_NAME = "proposition_stage";
    private static $FIELD_ID_PROPOSITION_STAGE = "id_proposition_stage";
    private static $FIELD_ID_DOMAINE = "id_domaine";
    private static $FIELD_ID_RESP_STAGE = "id_resp_stage";
    private static $FIELD_DATE_DEBUT = "date_debut";
    private static $FIELD_DATE_FIN = "date_fin";
    private static $FIELD_INTITULE = "intitule";
    private static $FIELD_SUJET = "sujet";
    private static $FIELD_NB_ETUDIANT = "nb_etudiant";
    private static $FIELD_INDEMNITE = "indemnite";
    private static $FIELD_VALIDE = "valide";
    private static $FIELD_MOTIF_REFUS = "motif_refus";
    private static $FIELD_DATE_CREATION = "date_creation";
    private static $FIELD_ID_ENTREPRISE = "id_entreprise";

    private $_idPropositionStage;
    private $_idDomaine;
    private $_idRespStage;
    private $_dateDebut;
    private $_dateFin;
    private $_intitule;
    private $_sujet;
    private $_nbEtudiant;
    private $_indemnite;
    private $_valide;
    private $_motifRefus;
    private $_dateCreation;
    private $_idEntreprise;


    private  function __construct($idPropositionStage, $idDomaine, $idRespStage, $dateDebut, $dateFin, $intitule, $sujet, $nbEtudiant, $indemnite, $valide, $motifRefus, $dateCreation, $idEntreprise){
        $this->_idPropositionStage = $idPropositionStage;
        $this->_idDomaine = $idDomaine;
        $this->_idRespStage = $idRespStage;
        $this->_dateDebut = $dateDebut;
        $this->_dateFin = $dateFin;
        $this->_intitule = $intitule;
        $this->_sujet = $sujet;
        $this->_nbEtudiant = $nbEtudiant;
        $this->_indemnite = $indemnite;
        $this->_valide = $valide;
        $this->_motifRefus = $motifRefus;
        $this->_dateCreation = $dateCreation;
        $this->_idEntreprise = $idEntreprise;
    }
// M�thode rajout�e
    public function getPersonneMaitreDeStage(){
        $mds = DBOLDRolePersProp::getRecords("", "", 1, $this->_idPropositionStage);
        if(count($mds) == 0)
            return null;
        else{
//            assert(count($mds) == 1); // Comment� car la base initiale �tait tellement corrompue qu'on avait des doublons sur les maitres de stage pour une proposition donn�e
            return $mds[0]->getPersonne();
        }
    }
    
    public function getPersonneContact(){
        $contacts = DBOLDRolePersProp::getRecords("", "", 3, $this->_idPropositionStage);
        if(count($contacts) == 0)
            return null;
        else{
//            assert(count($contacts) == 1); // Comment� car la base initiale �tait tellement corrompue qu'on avait des doublons sur les maitres de stage pour une proposition donn�e
            return $contacts[0]->getPersonne();
        }
    }
    public  function getDomaine(){
        $domaines = DBOLDDomaine::getRecords($this->_idDomaine);
        if(count($domaines) == 0) return null;
        else {
            assert(count($domaines) == 1);
            return $domaines[0];
        }
    }
    public function getTechnos(){
        $liensTechnos = DBOLDTechnoPropoStage::getRecords("", $this->_idPropositionStage);
        $technos = array();
        foreach($liensTechnos as $lienTechno){
            $techno = $lienTechno->getTechnologie();
            if($techno != null)
                $technos[count($technos)] = $techno;
        }
        return $technos;
    }
    public  function getEntreprise(){
        $entreprises = DBOLDEntreprise::getRecords($this->_idEntreprise);
        if(count($entreprises) == 0) return null;
        else{
            assert(count($entreprises) == 1);
            return $entreprises[0];
        }
    }
// Fin M�thode rajout�e
    public  function getIdPropositionStage(){
        return $this->_idPropositionStage;
    }
    public  function getIdRespStage(){
        return $this->_idRespStage;
    }
    public  function getDateDebut(){
        return $this->_dateDebut;
    }
    public  function getDateFin(){
        return $this->_dateFin;
    }
    public  function getIntitule(){
        return $this->_intitule;
    }
    public  function getSujet(){
        return $this->_sujet;
    }
    public  function getNbEtudiant(){
        return $this->_nbEtudiant;
    }
    public  function getIndemnite(){
        return $this->_indemnite;
    }
    public  function getValide(){
        return $this->_valide;
    }
    public  function getMotifRefus(){
        return $this->_motifRefus;
    }
    public  function getDateCreation(){
        return $this->_dateCreation;
    }
    public  function getIdEntreprise(){
        return $this->_idEntreprise;
    }
    public static function tableExists(){
        return DBConnector::getDBConnectorSource()->tableExists(DBOLDPropositionStage::$TABLE_NAME);
    }
    public static function createTable(){
        $sql = "CREATE TABLE `".DBOLDPropositionStage::$TABLE_NAME."` (  
    }
    public static function createRecord($idDomaine, $idRespStage, $dateDebut, $dateFin, $intitule, $sujet, $nbEtudiant, $indemnite, $valide, $motifRefus, $dateCreation, $idEntreprise){
        $sql = "INSERT INTO ".DBOLDPropositionStage::$TABLE_NAME." ("
    }
    public static function getRecords($idPropositionStage="", $idDomaine="", $idRespStage="", $dateDebut="", $dateFin="", $intitule="", $sujet="", $nbEtudiant="", $indemnite="", $valide="", $motifRefus="", $dateCreation="", $idEntreprise=""){
        $sql = "SELECT * FROM ".DBOLDPropositionStage::$TABLE_NAME." WHERE 1";
    }
    public  function updateRecord($idDomaine, $idRespStage, $dateDebut, $dateFin, $intitule, $sujet, $nbEtudiant, $indemnite, $valide, $motifRefus, $dateCreation, $idEntreprise){
        $sql = "UPDATE ".DBOLDPropositionStage::$TABLE_NAME." SET ";
    }
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBOLDPropositionStage::$TABLE_NAME." WHERE 1";
    }
}
?>
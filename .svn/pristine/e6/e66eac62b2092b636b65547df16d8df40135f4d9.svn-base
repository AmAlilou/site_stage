<?php
set_include_path(".".PATH_SEPARATOR."..".PATH_SEPARATOR."../..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=10&nom_table=type_stage&nom_champ_1=id_type_stage&type_champ_1=4&taille_champ_1=&champ_fatcultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=libelle_type_stage&type_champ_2=1&taille_champ_2=255&champ_fatcultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=promo_stage&type_champ_3=3&taille_champ_3=&champ_fatcultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=miage&type_champ_4=1&taille_champ_4=255&champ_fatcultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=date_debut_theorique&type_champ_5=8&taille_champ_5=&champ_fatcultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=date_fin_theorique&type_champ_6=8&taille_champ_6=&champ_fatcultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=date_rapport&type_champ_7=8&taille_champ_7=&champ_fatcultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=date_soutenance1&type_champ_8=8&taille_champ_8=&champ_fatcultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=date_soutenance2&type_champ_9=8&taille_champ_9=&champ_fatcultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=duree_soutenance&type_champ_10=3&taille_champ_10=&champ_fatcultatif_10=&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=

/**
* @package DBClasses
* @abstract Implémente la classe ISelectable. Classe correspondant à la table 'type_stage' de la base de données. Elle contient également un ensemble de méthodes permettant la gestion de cette table.
*/
 class DBTypeStage  implements ISelectable  {
    /**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "miage" correspondant aux promos 'L3, M1, M2'. Chaine stockée pour l'année de promo L3
	*/
	public static $ENUM_MIAGE_L3 = "L3";
    /**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "miage" correspondant aux promos 'L3, M1, M2'. Chaine stockée pour l'année de promo M1
	*/
	public static $ENUM_MIAGE_M1 = "M1";
    /**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "miage" correspondant aux promos 'L3, M1, M2'. Chaine stockée pour l'année de promo M2
	*/
	public static $ENUM_MIAGE_M2 = "M2";
 
    private static $TABLE_NAME = "type_stage";
    private static $FIELD_ID_TYPE_STAGE = "id_type_stage";
    private static $FIELD_LIBELLE_TYPE_STAGE = "libelle_type_stage";
    private static $FIELD_PROMO_STAGE = "promo_stage";
    private static $FIELD_MIAGE = "miage";
    private static $FIELD_DATE_DEBUT_THEORIQUE = "date_debut_theorique";
    private static $FIELD_DATE_FIN_THEORIQUE = "date_fin_theorique";
    private static $FIELD_DATE_RAPPORT = "date_rapport";
    private static $FIELD_DATE_SOUTENANCE1 = "date_soutenance1";
    private static $FIELD_DATE_SOUTENANCE2 = "date_soutenance2";
    private static $FIELD_DUREE_SOUTENANCE = "duree_soutenance";


    private $_idTypeStage;
    private $_libelleTypeStage;
    private $_promoStage;
    private $_miage;
    private $_dateDebutTheorique;
    private $_dateFinTheorique;
    private $_dateRapport;
    private $_dateSoutenance1;
    private $_dateSoutenance2;
    private $_dureeSoutenance;

    private static $NB_CONFIG_VALUES = 8;

	/**
	* @abstract Constructeur avec parametres.
	* @param int Identifiant d'un type de stage.
	* @param String Libellé du type de stage
	* @param int année du type de stage
	* @param Enum Promotion à laquelle le type de stage est destiné. Prend les valeurs des variable de l'énumération
	* @param Date Date de début théorique du type de stage
	* @param Date Date de fin théorique du type de stage
	* @param Date Date de remise du rapport
	* @param Date Première date de soutenance
	* @param Date Seconde date de soutenance
	* @param int Durée de la soutenance
	* @access private
	*/
    private  function __construct($idTypeStage, $libelleTypeStage, $promoStage, $miage, $dateDebutTheorique, $dateFinTheorique, $dateRapport, $dateSoutenance1, $dateSoutenance2, $dureeSoutenance){

        $this->_idTypeStage = $idTypeStage;
        $this->_libelleTypeStage = $libelleTypeStage;
        $this->_promoStage = $promoStage;
        $this->_miage = $miage;
        $this->_dateDebutTheorique = $dateDebutTheorique;
        $this->_dateFinTheorique = $dateFinTheorique;
        $this->_dateRapport = $dateRapport;
        $this->_dateSoutenance1 = $dateSoutenance1;
        $this->_dateSoutenance2 = $dateSoutenance2;
        $this->_dureeSoutenance = $dureeSoutenance;
    }
	
	/**
	* @abstract liste des getters
	* @return Valeur de la variable privé correspondante
	* @access public
	*/
    public  function getIdTypeStage(){

        return $this->_idTypeStage;
    }
    public  function getLibelleTypeStage(){

        return $this->_libelleTypeStage;
    }
    public  function getPromoStage(){

        return $this->_promoStage;
    }
    public  function getMiage(){

        return $this->_miage;
    }
    public  function getDateDebutTheorique(){

        return $this->_dateDebutTheorique;
    }
    public  function getDateFinTheorique(){

        return $this->_dateFinTheorique;
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
    public  function getDureeSoutenance(){

        return $this->_dureeSoutenance;
    }
	
	/**
	* @abstract Méthode statique. Vérifie que la table type_stage existe
	* @return Bool TRUE si la table existe, FALSE sinon.
	* @access public
	*/
    public static function tableExists(){
        $tableExists = DBConnector::getDBConnector()->tableExists(DBTypeStage::$TABLE_NAME);
        if($tableExists)
            $countOK = (count(DBTypeStage::getRecords()) == DBTypeStage::$NB_CONFIG_VALUES);
        else
            $countOK = false;
        return ($tableExists && $countOK);
    }
	
	/**
	* @abstract Méthode statique. Permet de créer la table type_stage
	* @access public
	*/
    public static function createTable(){
       if(!DBConnector::getDBConnector()->tableExists(DBTypeStage::$TABLE_NAME))
        {
         $sql = "CREATE TABLE `".DBTypeStage::$TABLE_NAME."` (
          
                            `".DBTypeStage::$FIELD_ID_TYPE_STAGE."` BIGINT NOT NULL  auto_increment,  
                            `".DBTypeStage::$FIELD_LIBELLE_TYPE_STAGE."` VARCHAR(255) NOT NULL  ,  
                            `".DBTypeStage::$FIELD_PROMO_STAGE."` INT(11) NOT NULL  ,  
                            `".DBTypeStage::$FIELD_MIAGE."` ENUM('"
                                                .DBTypeStage::$ENUM_MIAGE_L3."','"
                                                .DBTypeStage::$ENUM_MIAGE_M1."','"
                                                .DBTypeStage::$ENUM_MIAGE_M2."') NOT NULL  ,  
                            `".DBTypeStage::$FIELD_DATE_DEBUT_THEORIQUE."` DATE NOT NULL  ,  
                            `".DBTypeStage::$FIELD_DATE_FIN_THEORIQUE."` DATE NOT NULL  ,  
                            `".DBTypeStage::$FIELD_DATE_RAPPORT."` DATE NOT NULL  ,  
                            `".DBTypeStage::$FIELD_DATE_SOUTENANCE1."` DATE NOT NULL  ,  
                            `".DBTypeStage::$FIELD_DATE_SOUTENANCE2."` DATE NOT NULL  ,  
                            `".DBTypeStage::$FIELD_DUREE_SOUTENANCE."` INT(11) NOT NULL  ,
                            PRIMARY KEY (`".DBTypeStage::$FIELD_ID_TYPE_STAGE."`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
        
        
           foreach(explode(";", $sql) as $query)
           {
               if($query != "")
                   DBConnector::getDBConnector()->executeQuery($query);
           }
        }

        if(count(DBTypeStage::getRecords("", "Stages en entreprises M2", 2004)) == 0)
            DBTypeStage::createRecord(
                    "Stages en entreprises M2",
                    2004,
                    "M2",
                    "01/03/2005",
                    "31/08/2005",
                    "23/08/2005",
                    "04/09/2005",
                    "08/09/2005",
                    30);
        if(count(DBTypeStage::getRecords("", "Stages en entreprises M1", 2004)) == 0)
            DBTypeStage::createRecord(
                    "Stages en entreprises M1",
                    2004,
                    "M1",
                    "02/05/2005",
                    "31/08/2005",
                    "23/08/2005",
                    "04/09/2005",
                    "08/09/2005",
                    30);
        if(count(DBTypeStage::getRecords("", "Stages en entreprises L3", 2004)) == 0)
            DBTypeStage::createRecord(
                    "Stages en entreprises L3",
                    2004,
                    "L3",
                    "01/05/2005",
                    "30/06/2005",
                    "04/07/2005",
                    "12/07/2005",
                    "13/07/2005",
                    30);
        if(count(DBTypeStage::getRecords("", "Projet d'analyse M1", 2004)) == 0)
            DBTypeStage::createRecord(
                    "Projet d'analyse M1",
                    2004,
                    "M1",
                    "01/02/2005",
                    "29/03/2005",
                    "18/04/2005",
                    "18/04/2005",
                    "18/04/2005",
                    30);
  
        if(count(DBTypeStage::getRecords("", "Stages en entreprises M2", 2005)) == 0)
            DBTypeStage::createRecord(
                    "Stages en entreprises M2",
                    2005,
                    "M2",
                    "01/04/2006",
                    "31/08/2006",
                    "23/08/2006",
                    "04/09/2006",
                    "08/09/2006",
                    30);
        if(count(DBTypeStage::getRecords("", "Stages en entreprises M1", 2005)) == 0)
            DBTypeStage::createRecord(
                    "Stages en entreprises M1",
                    2005,
                    "M1",
                    "01/05/2006",
                    "31/08/2006",
                    "23/08/2006",
                    "04/09/2006",
                    "08/09/2006",
                    30);
        if(count(DBTypeStage::getRecords("", "Stages en entreprises L3", 2005)) == 0)
            DBTypeStage::createRecord(
                    "Stages en entreprises L3",
                    2005,
                    "L3",
                    "01/06/2006",
                    "31/07/2006",
                    "04/07/2006",
                    "12/07/2006",
                    "13/07/2006",
                    30);
        if(count(DBTypeStage::getRecords("", "Projet d'analyse M1", 2005)) == 0)
            DBTypeStage::createRecord(
                    "Projet d'analyse M1",
                    2005,
                    "M1",
                    "01/02/2006",
                    "31/03/2006",
                    "31/05/2006",
                    "18/04/2006",
                    "18/04/2006",
                    30);
  
        
    }
    
	/**
	* @abstract Insère dans la base de données une nouvelle proposition de stage
	* @param String Libellé du type de stage
	* @param int année du type de stage
	* @param Enum Promotion à laquelle le type de stage est destiné. Prend les valeurs des variable de l'énumération
	* @param Date Date de début théorique du type de stage
	* @param Date Date de fin théorique du type de stage
	* @param Date Date de remise du rapport
	* @param Date Première date de soutenance
	* @param Date Seconde date de soutenance
	* @param int Durée de la soutenance
	* @return DBTypeStage Objet contenant les informations du type de stage que l'on vient d'inserer
	* @access public
	*/
	public static function createRecord($libelleTypeStage, $promoStage, $miage, $dateDebutTheorique, $dateFinTheorique, $dateRapport, $dateSoutenance1, $dateSoutenance2, $dureeSoutenance){

        $sql = "INSERT INTO ".DBTypeStage::$TABLE_NAME." ("
        
                            .DBTypeStage::$FIELD_LIBELLE_TYPE_STAGE.", "
                            .DBTypeStage::$FIELD_PROMO_STAGE.", "
                            .DBTypeStage::$FIELD_MIAGE.", "
                            .DBTypeStage::$FIELD_DATE_DEBUT_THEORIQUE.", "
                            .DBTypeStage::$FIELD_DATE_FIN_THEORIQUE.", "
                            .DBTypeStage::$FIELD_DATE_RAPPORT.", "
                            .DBTypeStage::$FIELD_DATE_SOUTENANCE1.", "
                            .DBTypeStage::$FIELD_DATE_SOUTENANCE2.", "
                            .DBTypeStage::$FIELD_DUREE_SOUTENANCE." "
                            .") VALUES ("
        
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($libelleTypeStage)).", "
                            .DBConnector::getDBConnector()->processInt($promoStage).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($miage)).", "
                            .DBConnector::getDBConnector()->computeDate($dateDebutTheorique).", "
                            .DBConnector::getDBConnector()->computeDate($dateFinTheorique).", "
                            .DBConnector::getDBConnector()->computeDate($dateRapport).", "
                            .DBConnector::getDBConnector()->computeDate($dateSoutenance1).", "
                            .DBConnector::getDBConnector()->computeDate($dateSoutenance2).", "
                            .DBConnector::getDBConnector()->processInt($dureeSoutenance)." "
                            .")";
        
        $id = DBConnector::getDBConnector()->executeQuery($sql);
        
        $obj = DBTypeStage::getRecords($id);
        assert(count($obj) == 1);
        return $obj[0];
    }
	
	
	/**
	* @abstract Méthode statique. Construit une requête de sélection à partir des paramètres, l'exécute, puis retourne un tableau contenant les objets DBTypeStage correspondants. L'ensemble des paramètres peuvent etre absent, dans ce cas l'ensemble de la table est retournée.
	* @param int Identifiant d'un type de stage.
	* @param String Libellé du type de stage
	* @param int année du type de stage
	* @param Enum Promotion à laquelle le type de stage est destiné. Prend les valeurs des variable de l'énumération
	* @param Date Date de début théorique du type de stage
	* @param Date Date de fin théorique du type de stage
	* @param Date Date de remise du rapport
	* @param Date Première date de soutenance
	* @param Date Seconde date de soutenance
	* @param int Durée de la soutenance
	* @return Array Tableau contenant les objets de type DBTypeStage correspondant aux ligne de la base de données que l'on vient de récupérer
	* @access public
	*/
    public static function getRecords($idTypeStage="", $libelleTypeStage="", $promoStage="", $miage="", $dateDebutTheorique="", $dateFinTheorique="", $dateRapport="", $dateSoutenance1="", $dateSoutenance2="", $dureeSoutenance=""){

        $sql = "SELECT * FROM ".DBTypeStage::$TABLE_NAME." WHERE 1";
        
        
        if($idTypeStage != "")
            $sql .= " AND ".DBTypeStage::$FIELD_ID_TYPE_STAGE."=".DBConnector::getDBConnector()->processInt($idTypeStage);
        if($libelleTypeStage != "")
            $sql .= " AND ".DBTypeStage::$FIELD_LIBELLE_TYPE_STAGE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($libelleTypeStage));
        if($promoStage != "")
            $sql .= " AND ".DBTypeStage::$FIELD_PROMO_STAGE."=".DBConnector::getDBConnector()->processInt($promoStage);
        if($miage != "")
            $sql .= " AND ".DBTypeStage::$FIELD_MIAGE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($miage));
        if($dateDebutTheorique != "")
            $sql .= " AND ".DBTypeStage::$FIELD_DATE_DEBUT_THEORIQUE."=".DBConnector::getDBConnector()->computeDate($dateDebutTheorique);
        if($dateFinTheorique != "")
            $sql .= " AND ".DBTypeStage::$FIELD_DATE_FIN_THEORIQUE."=".DBConnector::getDBConnector()->computeDate($dateFinTheorique);
        if($dateRapport != "")
            $sql .= " AND ".DBTypeStage::$FIELD_DATE_RAPPORT."=".DBConnector::getDBConnector()->computeDate($dateRapport);
        if($dateSoutenance1 != "")
            $sql .= " AND ".DBTypeStage::$FIELD_DATE_SOUTENANCE1."=".DBConnector::getDBConnector()->computeDate($dateSoutenance1);
        if($dateSoutenance2 != "")
            $sql .= " AND ".DBTypeStage::$FIELD_DATE_SOUTENANCE2."=".DBConnector::getDBConnector()->computeDate($dateSoutenance2);
        if($dureeSoutenance != "")
            $sql .= " AND ".DBTypeStage::$FIELD_DUREE_SOUTENANCE."=".DBConnector::getDBConnector()->processInt($dureeSoutenance);
        
        $res = DBConnector::getDBConnector()->executeQuery($sql);
        
        return DBTypeStage::ressourceToArray($res);
    }
	/**
	* @param int année du type de stage
	* @param Enum Promotion à laquelle le type de stage est destiné. Prend les valeurs des variables de l'énumération
	*/
	public static function getNonConcernes($promoStage, $miage) {
		
		$sql = "SELECT * FROM ".DBTypeStage::$TABLE_NAME." WHERE 1";
		$sql .= " AND ".DBTypeStage::$FIELD_PROMO_STAGE."=".DBConnector::getDBConnector()->processInt($promoStage);
		$sql .= " AND ".DBTypeStage::$FIELD_MIAGE."<>".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($miage));
		
		$res = DBConnector::getDBConnector()->executeQuery($sql);
        
        return DBTypeStage::ressourceToArray($res) ;
	}
	
	
	/**
	* @abstract Construit une requête d'update à partir des paramètres, l'exécute, puis affecte les informations passé en paramètre dans l'objet DBTypeStage courant. La clause where de la requete est automatiquement construite avec l'identifiant de la proposition de stage stocké dans l'Objet courant.
	* @param String Libellé du type de stage
	* @param int année du type de stage
	* @param Enum Promotion à laquelle le type de stage est destiné. Prend les valeurs des variable de l'énumération
	* @param Date Date de début théorique du type de stage
	* @param Date Date de fin théorique du type de stage
	* @param Date Date de remise du rapport
	* @param Date Première date de soutenance
	* @param Date Seconde date de soutenance
	* @param int Durée de la soutenance
	* @access public
	*/
    public  function updateRecord($libelleTypeStage, $promoStage, $miage, $dateDebutTheorique, $dateFinTheorique, $dateRapport, $dateSoutenance1, $dateSoutenance2, $dureeSoutenance){

        $sql = "UPDATE ".DBTypeStage::$TABLE_NAME." SET ";
        
        $sql .= DBTypeStage::$FIELD_LIBELLE_TYPE_STAGE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($libelleTypeStage)).",";
        $sql .= DBTypeStage::$FIELD_PROMO_STAGE."=".DBConnector::getDBConnector()->processInt($promoStage).",";
        $sql .= DBTypeStage::$FIELD_MIAGE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($miage)).",";
        $sql .= DBTypeStage::$FIELD_DATE_DEBUT_THEORIQUE."=".DBConnector::getDBConnector()->computeDate($dateDebutTheorique).",";
        $sql .= DBTypeStage::$FIELD_DATE_FIN_THEORIQUE."=".DBConnector::getDBConnector()->computeDate($dateFinTheorique).",";
        $sql .= DBTypeStage::$FIELD_DATE_RAPPORT."=".DBConnector::getDBConnector()->computeDate($dateRapport).",";
        $sql .= DBTypeStage::$FIELD_DATE_SOUTENANCE1."=".DBConnector::getDBConnector()->computeDate($dateSoutenance1).",";
        $sql .= DBTypeStage::$FIELD_DATE_SOUTENANCE2."=".DBConnector::getDBConnector()->computeDate($dateSoutenance2).",";
        $sql .= DBTypeStage::$FIELD_DUREE_SOUTENANCE."=".DBConnector::getDBConnector()->processInt($dureeSoutenance)."";
        
        $sql .= " WHERE 1"; 
        
        $sql .= " AND ".DBTypeStage::$FIELD_ID_TYPE_STAGE."=".DBConnector::getDBConnector()->processInt($this->_idTypeStage);
        
        DBConnector::getDBConnector()->executeQuery($sql);
        
        
        $this->_libelleTypeStage = DBConnector::getDBConnector()->echapString($libelleTypeStage);
        $this->_promoStage = $promoStage;
        $this->_miage = DBConnector::getDBConnector()->echapString($miage);
        $this->_dateDebutTheorique = $dateDebutTheorique;
        $this->_dateFinTheorique = $dateFinTheorique;
        $this->_dateRapport = $dateRapport;
        $this->_dateSoutenance1 = $dateSoutenance1;
        $this->_dateSoutenance2 = $dateSoutenance2;
        $this->_dureeSoutenance = $dureeSoutenance;
    }
    
	
	/**
	* @abstract Construit une requête de suppression et l'exécute. La clause where de la requete est automatiquement construite avec l'identifiant de la proposition de stage stocké dans l'Objet courant.
	* @access public
	*/
	public  function deleteRecord(){

        $sql = "DELETE FROM ".DBTypeStage::$TABLE_NAME." WHERE 1";
        
        $sql .= " AND ".DBTypeStage::$FIELD_ID_TYPE_STAGE."=".DBConnector::getDBConnector()->processInt($this->_idTypeStage);
        
        DBConnector::getDBConnector()->executeQuery($sql);
    }
    
	
	/**
	* @abstract Synonyme de la méthode getLibelleTypeStage
	* @return String Libellé du type de stage
	* @access public
	*/
    public function getFormSelectOptionLabel(){
        return $this->getLibelleTypeStage();
    }
	
	/**
	* @abstract Synonyme de la méthode getIdTypeStage
	* @return String Libellé du type de stage
	* @access public
	*/
    public function getFormSelectOptionValue(){
        return $this->getIdTypeStage();
    }
	
	/**
	* @abstract Prend en parametre une ressource (retour d'un requete de select) et retourne un tableau contenant des objets 
	* @param  Ressource Ressource que l'on souhaite traiter
	* @return Array Tableau contenant les objets DBTypeStage contenant les informations retournées par la requete
	* @access private
	*/
	private static function ressourceToArray($res) {
		$return = array();
        $i=0;
        while($result = DBConnector::getDBConnector()->fetchArray($res))
        {
            $return[$i] = new DBTypeStage(
                                            $result[DBTypeStage::$FIELD_ID_TYPE_STAGE],
                                            $result[DBTypeStage::$FIELD_LIBELLE_TYPE_STAGE],
                                            $result[DBTypeStage::$FIELD_PROMO_STAGE],
                                            $result[DBTypeStage::$FIELD_MIAGE],
                                            DBConnector::getDBConnector()->decomputeDate($result[DBTypeStage::$FIELD_DATE_DEBUT_THEORIQUE]),
                                            DBConnector::getDBConnector()->decomputeDate($result[DBTypeStage::$FIELD_DATE_FIN_THEORIQUE]),
                                            DBConnector::getDBConnector()->decomputeDate($result[DBTypeStage::$FIELD_DATE_RAPPORT]),
                                            DBConnector::getDBConnector()->decomputeDate($result[DBTypeStage::$FIELD_DATE_SOUTENANCE1]),
                                            DBConnector::getDBConnector()->decomputeDate($result[DBTypeStage::$FIELD_DATE_SOUTENANCE2]),
                                            $result[DBTypeStage::$FIELD_DUREE_SOUTENANCE]
                                        );
            
            $i++;
        }
        
        return $return;
	}
}
?>
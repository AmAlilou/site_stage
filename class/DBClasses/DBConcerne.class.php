<?php
set_include_path(".".PATH_SEPARATOR."..".PATH_SEPARATOR."../..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=2&nom_table=Concerne&nom_champ_1=id_type_stage&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_proposition_stage&type_champ_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=on&getter_2=on&setter_2=

/**
* @package DBClasses
* @abstract Classe correspondant à la table 'proposition_concerne' de la base de données. Elle contient également un ensemble de méthodes permettant la gestion de cette table.
*/
class DBConcerne {

    private static $TABLE_NAME = "proposition_concerne";
    private static $FIELD_ID_TYPE_STAGE = "id_type_stage";
    private static $FIELD_ID_PROPOSITION_STAGE = "id_proposition_stage";
    private $_idTypeStage;    
    private $_idPropositionStage;

	/**
	* @abstract Constructeur avec parametre
	* @param int  Identifiant de du type de stage
	* @param int Identifiant de la proposition de stage
	* @access private
	*/
    private  function __construct($idTypeStage, $idPropositionStage){
        $this->_idTypeStage = $idTypeStage;
        $this->_idPropositionStage = $idPropositionStage;
    }


	/**
	* @abstract liste des getters
	* @return Valeur de la variable privé correspondante
	* @access public
	*/
    public  function getIdTypeStage(){
        return $this->_idTypeStage;
    }
    public  function getIdPropositionStage(){
        return $this->_idPropositionStage;
    }
    
	/**
	* @abstract Retourne l'objet DBTypeStage correspondant à l'identifiant stocké dans l'objet
	* @return Valeur de la variable privé correspondante
	* @access public
	*/
	public function getTypeStage(){
        $typesStage = DBTypeStage::getRecords($this->_idTypeStage);
        assert(count($typesStage) == 1);
        return $typesStage[0];
    }


	/**
	* @abstract Méthode statique. Vérifie que la table 'proposition_concerne' existe
	* @return Bool TRUE si la table existe, FALSE sinon.
	* @access public
	*/
    public static function tableExists(){
        return DBConnector::getDBConnector()->tableExists(DBConcerne::$TABLE_NAME);
    }


	/**
	* @abstract Méthode statique. Permet de créer la table 'proposition_concerne'
	* @access public
	*/
    public static function createTable(){
        $sql = "CREATE TABLE `".DBConcerne::$TABLE_NAME."` (
                            `".DBConcerne::$FIELD_ID_TYPE_STAGE."` INT(11) NOT NULL  ,  
                            `".DBConcerne::$FIELD_ID_PROPOSITION_STAGE."` INT(11) NOT NULL  ,
                            PRIMARY KEY (`".DBConcerne::$FIELD_ID_TYPE_STAGE."`,`".DBConcerne::$FIELD_ID_PROPOSITION_STAGE."`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
        
        
        foreach(explode(";", $sql) as $query)
        {
            if($query != "")
                DBConnector::getDBConnector()->executeQuery($query);
        }
    }


	
	/**
	* @abstract Insère dans la base de données un nouveau lien entre un type de stage et une proposition
	* @param DBTypeStage Objet correspondant au type de stage
	* @param DBPropositionStage Objet correspondant à la proposition de stage
	* @access public
	*/
    public static function createRecord($typeStage, $propositionStage){
        assert($typeStage instanceof DBTypeStage);
        assert($propositionStage instanceof DBPropositionStage);
        $sql = "INSERT INTO ".DBConcerne::$TABLE_NAME." ("
                            .DBConcerne::$FIELD_ID_TYPE_STAGE.", "
                            .DBConcerne::$FIELD_ID_PROPOSITION_STAGE." "
                            .") VALUES ("
                            .DBConnector::getDBConnector()->processInt($typeStage->getIdTypeStage()).", "
                            .DBConnector::getDBConnector()->processInt($propositionStage->getIdPropositionStage())." "
                            .")";
        
        $id = DBConnector::getDBConnector()->executeQuery($sql);
        
        $obj = DBConcerne::getRecords($typeStage->getIdTypeStage(), $propositionStage->getIdPropositionStage());
        assert(count($obj) == 1);
        return $obj[0];
    }


	/**
	* @abstract Méthode statique. Construit une requête de sélection à partir des paramètres, l'exécute, puis retourne un tableau contenant les objets DBConcerne correspondants. L'ensemble des paramètres peuvent etre absent, dans ce cas l'ensemble de la table est retourné.
	* @param int  Identifiant de du type de stage
	* @param int Identifiant de la proposition de stage
	* @return Array Tableau contenant les objets de type DBConcerne correspondant aux ligne de la base de données que l'on vient de récupérer
	* @access public
	*/
    public static function getRecords($idTypeStage="", $idPropositionStage=""){
        $sql = "SELECT * FROM ".DBConcerne::$TABLE_NAME." WHERE 1";
        
        if($idTypeStage != "")
            $sql .= " AND ".DBConcerne::$FIELD_ID_TYPE_STAGE."=".DBConnector::getDBConnector()->processInt($idTypeStage);
        if($idPropositionStage != "")
            $sql .= " AND ".DBConcerne::$FIELD_ID_PROPOSITION_STAGE."=".DBConnector::getDBConnector()->processInt($idPropositionStage);
        
        $res = DBConnector::getDBConnector()->executeQuery($sql);
        
        $return = array();
        $i=0;
        while($result = DBConnector::getDBConnector()->fetchArray($res)) {
            $return[$i] = new DBConcerne(
        
                                            $result[DBConcerne::$FIELD_ID_TYPE_STAGE],
                                            $result[DBConcerne::$FIELD_ID_PROPOSITION_STAGE]
                                        );
            
            $i++;
        }
        
        return $return;
    }
    
	

	/**
	* @abstract Construit une requête de suppression et l'exécute. La clause where de la requete est automatiquement construite avec l'identifiant du type de stage et celui de la proposition stocké dans l'Objet courant.
	* @access public
	*/
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBConcerne::$TABLE_NAME." WHERE 1";
        
        $sql .= " AND ".DBConcerne::$FIELD_ID_TYPE_STAGE."=".DBConnector::getDBConnector()->processInt($this->_idTypeStage);
        $sql .= " AND ".DBConcerne::$FIELD_ID_PROPOSITION_STAGE."=".DBConnector::getDBConnector()->processInt($this->_idPropositionStage);
        
        DBConnector::getDBConnector()->executeQuery($sql);
    }
}
?>
<?php
set_include_path(".".PATH_SEPARATOR."..".PATH_SEPARATOR."../..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// G�n�r� via PHPClassGenerator via l'url index.php?nb_champs=2&nom_table=config&nom_champ_1=nom_variable&type_champ_1=1&taille_champ_1=128&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=&clef_primaire_1=on&getter_1=&setter_1=&nom_champ_2=valeur_variable&type_champ_2=2&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=

/**
* @package DBClasses
* @abstract Si vous modifiez le nombre de ligne de la table 'config' il est n�cessaire de modifier la variable static priv�e 'nb_config_values'
*/
 class DBConfig {
    private static $TABLE_NAME = "config";
    private static $FIELD_NOM_VARIABLE = "nom_variable";
    private static $FIELD_VALEUR_VARIABLE = "valeur_variable";

    private $_nomVariable;
    private $_valeurVariable;

    // A MODIFIER "a la main" lorsqu'on rajoute des valeurs dans la table config
    private static $NB_CONFIG_VALUES = 15;

	/**
	* @abstract Constructeur avec param�tre
	* @param String Nom de la variable 
	* @param String Valeur de la variable
	* @acces private
	*/
    private  function __construct($nomVariable, $valeurVariable){
        $this->_nomVariable = $nomVariable;
        $this->_valeurVariable = $valeurVariable;
    }
	
	/**
	* @abstract Getter pour la valeur de la variable
	* @return String Valeur de la variable
	* @access public
	*/
    public  function getValeurVariable(){
        return $this->_valeurVariable;
    }
	
	/**
	* @abstract M�thode statique. V�rifie que la table 'config' existe et que la variable du nombre de valeurs 'nb_config_values' est bon.
	* @return Bool TRUE si la table existe et que la variable 'ng_config_value' est bonne, FALSE sinon.
	* @access public
	*/
    public static function tableExists(){
        $tableExists = DBConnector::getDBConnector()->tableExists(DBConfig::$TABLE_NAME);
        if($tableExists)
            $countOK = (count(DBConfig::getRecords()) == DBConfig::$NB_CONFIG_VALUES);
        else
            $countOK = false;
        return ($tableExists && $countOK);
    }
	
	/**
	* @abstract M�thode statique. Permet de cr�er la table 'config'
	* @access public
	*/
    public static function createTable(){
        if(!DBConnector::getDBConnector()->tableExists(DBConfig::$TABLE_NAME))
        {
            $sql = "CREATE TABLE `".DBConfig::$TABLE_NAME."` (  
                                `".DBConfig::$FIELD_NOM_VARIABLE."` VARCHAR(128) NOT NULL  ,  
                                `".DBConfig::$FIELD_VALEUR_VARIABLE."` TEXT NOT NULL  ,
                                PRIMARY KEY (`".DBConfig::$FIELD_NOM_VARIABLE."`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
            
            
            foreach(explode(";", $sql) as $query)
            {
                if($query != "")
                    DBConnector::getDBConnector()->executeQuery($query);
            }
        }
        
        if(count(DBConfig::getRecords("APPARITION RECHERCHE MENU DEROULANT")) == 0)
            DBConfig::createRecord("APPARITION RECHERCHE MENU DEROULANT", 10);
        if(count(DBConfig::getRecords("MAIL ADMINISTRATEURS")) == 0)
            DBConfig::createRecord("MAIL ADMINISTRATEURS", "miage@adacis.net, olivier.marchand25@wanadoo.fr");
        if(count(DBConfig::getRecords("MAIL SECRETARIAT")) == 0)
            DBConfig::createRecord("MAIL SECRETARIAT", "sophie.espinosa@labri.fr");
        if(count(DBConfig::getRecords("LOGIN ADMIN")) == 0)
            DBConfig::createRecord("LOGIN ADMIN", "admin");
        if(count(DBConfig::getRecords("PASSWORD ADMIN")) == 0)
        	DBConfig::createRecord("PASSWORD ADMIN", md5("admin"));
        if(count(DBConfig::getRecords("LOGIN SECRETAIRE")) == 0)
            DBConfig::createRecord("LOGIN SECRETAIRE", "secretaire");
        if(count(DBConfig::getRecords("PASSWORD SECRETAIRE")) == 0)
        	DBConfig::createRecord("PASSWORD SECRETAIRE", md5("secretaire"));
        if(count(DBConfig::getRecords("MAIL DEBUG")) == 0)
            DBConfig::createRecord("MAIL DEBUG", "0");
        if(count(DBConfig::getRecords("FONCTION")) == 0)
            DBConfig::createRecord("FONCTION", "Directeur;;Chef de Projet;;Directeur Informatique;;DRH");
        if(count(DBConfig::getRecords("DOMAINE")) == 0)
            DBConfig::createRecord("DOMAINE", "Banque - Assurance;;Comptabilit�;;Industrie;;Informatique;;R�seaux;;Secteur Public");
        if(count(DBConfig::getRecords("TECHNOLOGIE")) == 0)
            DBConfig::createRecord("TECHNOLOGIE", "C;;C++;;C#;;Java;;J2EE;;PHP;;SQL/PLSQL;;Oracle;;XML/XSLT;;ABAP");
        if(count(DBConfig::getRecords("ANNEE PROMO")) == 0)
            DBConfig::createRecord("ANNEE PROMO", "2005");
        if(count(DBConfig::getRecords("PERMANENCES")) == 0)
            DBConfig::createRecord("PERMANENCES", "Olivier Marchand : Le Vendredi, sur RDV\nChristophe Maillet : Lundi & Vendredi sur RDV");
        if(count(DBConfig::getRecords("TYPE ENTREPRISE")) == 0)
            DBConfig::createRecord("TYPE ENTREPRISE",
                                   "Administration;;A�ronautique;;Agence de communication;;Agence Internet;;Agroalimentaire;;"
	  							  ."Association;;Assurances;;Banques;;Cabinet conseil syst�mes d'information;;Cabinet d'expertise comptable;;"
								  ."Caisse des depots;;Concessions automobiles;;Editeur de logiciels;;Entreprise Informatique;;Finance;;"
								  ."Industrie;;Institut de recherches;;Presse;;Soci�t� de services;;Soci�t� de transport;;SSII;;Universit�");
        if(count(DBConfig::getRecords("LIMITE SECONDES ENVOI MAIL")) == 0)
            DBConfig::createRecord("LIMITE SECONDES ENVOI MAIL", "3600");
    }
    
	/**
	* @abstract M�thode statique. Ins�re dans la base de donn�es une nouvelle ligne de configuration
	* @param String Nom de la variable
	* @param String Valeur de la variable
	* @return DBConfig Objet contenant le nom et la valeur de la nouvelle variable
	* @access public
	*/
	public static function createRecord($nomVariable, $valeurVariable){
        $sql = "INSERT INTO ".DBConfig::$TABLE_NAME." ("
                            .DBConfig::$FIELD_NOM_VARIABLE.", "
                            .DBConfig::$FIELD_VALEUR_VARIABLE." "
                            .") VALUES ("
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomVariable)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($valeurVariable))." "
                            .")";
        
        $id = DBConnector::getDBConnector()->executeQuery($sql);
        
        $obj = DBConfig::getRecords($nomVariable, $valeurVariable);
        assert(count($obj) == 1);
        return $obj[0];
    }
    
	/**
	* @abstract M�thode statique. Construit une requ�te de s�lection � partir des param�tres, l'ex�cute, puis retourne un tableau contenant les objets DBConfig correspondants. L'ensemble des param�tres peuvent etre absent, dans ce cas l'ensemble de la table est retourn�e.
	* @param String Nom de la variable 
	* @param String Valeur de la variable
	* @return Array Tableau contenant les objets de type DBConfig correspondant aux lignes de la base de donn�es que l'on vient de r�cup�rer
	* @access public
	*/
	public static function getRecords($nomVariable="", $valeurVariable=""){
        $sql = "SELECT * FROM ".DBConfig::$TABLE_NAME." WHERE 1";
        
        if($nomVariable != "")
            $sql .= " AND ".DBConfig::$FIELD_NOM_VARIABLE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomVariable));
        if($valeurVariable != "")
            $sql .= " AND ".DBConfig::$FIELD_VALEUR_VARIABLE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($valeurVariable));
        
        $res = DBConnector::getDBConnector()->executeQuery($sql);
        
        $return = array();
        $i=0;
        while($result = DBConnector::getDBConnector()->fetchArray($res))
        {
            $return[$i] = new DBConfig(
                                            $result[DBConfig::$FIELD_NOM_VARIABLE],
                                            $result[DBConfig::$FIELD_VALEUR_VARIABLE]
                                        );
            
            $i++;
        }
        
        return $return;
    }
    
	/**
	* @abstract Construit une requ�te d'update � partir des param�tres et l'ex�cute. La clause where de la requete est automatiquement construite avec le nom de la variable stock� dans l'Objet courant.
	* @param String Nom de la variable
	* @param String Valeur de la variable
	* @access public
	*/
	public static function updateRecord($nomVariable, $valeurVariable){
        $sql = "UPDATE ".DBConfig::$TABLE_NAME." SET ";
        $sql .= DBConfig::$FIELD_VALEUR_VARIABLE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($valeurVariable))."";
        
        $sql .= " WHERE 1";
        $sql .= " AND ".DBConfig::$FIELD_NOM_VARIABLE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomVariable));
        
        DBConnector::getDBConnector()->executeQuery($sql);
    }
	
	/**
	* @abstract Construit une requ�te de suppression et l'ex�cute. La clause where de la requete est automatiquement construite avec le nom de la variable stock� dans l'Objet courant.
	* @access public
	*/
    public  function deleteRecord(){
        $sql = "DELETE FROM ".DBConfig::$TABLE_NAME." WHERE 1";
        $sql .= " AND ".DBConfig::$FIELD_NOM_VARIABLE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($this->_nomVariable));
        
        DBConnector::getDBConnector()->executeQuery($sql);
    }
	
	/**
	* @abstract M�thode statique. Permet de r�cup�rer la valeur d'une variable pass� en param�tre
	* @param String Nom de la variable que l'on souhaite r�cup�rer de la base de donn�es
	* @return String Valeur de la variable r�cup�r�
	* @access public
	*/
    public static function getConfigValue($variableName){
        $configs = DBConfig::getRecords($variableName);
        if(count($configs) != 1) die("Erreur : DBConfig::getConfigValue($variableName) : $variableName inconnue dans la table de configuration !!");
        $c = $configs[0];
        return $c->getValeurVariable();
    }
	
	/**
	* @abstract M�thode statique. Permet d'authentifier l'administrateur � partir du login et du mot de passe pass� en parametre.
	* @param String Login administrateur � tester
	* @param String Mot de passe administrateur � tester
	* @return String Login administrateur en cas de succ�s, NULL sinon
	* @access public
	*/
    public static function authAdmin($login, $mdp){
    	$log = DBConfig::getRecords("LOGIN ADMIN", $login);
    	//$pass = DBConfig::getRecords("PASSWORD ADMIN2", md5($mdp));
    	$pass = DBConfig::getRecords("PASSWORD ADMIN2", $mdp);
    	if ((count($log)==1) and (count($pass)==1))
    		return $log[0]->getValeurVariable();
    	else
    		return NULL;
    }
    
	/**
	* @abstract M�thode statique. Permet d'authentifier la secretaire � partir du login et du mot de passe pass� en parametre.
	* @param String Login secretaire � tester
	* @param String Mot de passe secretaire � tester
	* @return String Login secretaire en cas de succ�s, NULL sinon
	* @access public 
	*/
    public static function authSecretaire($login, $mdp){
    	$log = DBConfig::getRecords("LOGIN SECRETAIRE", $login);
    	$pass = DBConfig::getRecords("PASSWORD SECRETAIRE", md5($mdp));
    	if ((count($log)==1) and (count($pass)==1))
    		return $log[0]->getValeurVariable();
    	else
    		return NULL;
    }
    
    /**
	* @abstract M�thode statique. Permet de transformer une variable �num�r�e de la table config (du type "valeur1;valeur2;valeur3...") en un tableau de ISelectable
	* @param String Variable que l'on souhaire transformer
	* @param Bool TRUE par d�faut.
	* @return Array La variable demand� sous forme de tableau
	* @access public
	*/
    public static function getEnumeration($enumeratedVariable,$addAutre=true){
        $table = Enumeration::getSelectablesArray(explode(";;", DBConfig::getConfigValue($enumeratedVariable)), true);
        $table = Enumeration::sort($table,'$a->getFormSelectOptionLabel()');
        if ($addAutre){
        	$table[count($table)] = new Enumerable("Autre","Autre");}
        return $table;
    }
    
	/**
	* @abstract Permet de dire si le parametre est bien un type d'entreprise
	* @param String Valeur � tester
	* @return TRUE si la valeur pass�e en param�tre est bien un type d'entreprise stock�, FALSE sinon.
	* @access public
	*/
    public static function isTypeEntreprise($valueType){
    	$liste = DBConfig::getEnumeration("TYPE ENTREPRISE");
    	foreach ($liste as $type){
    		if ($type->getFormSelectOptionValue()==$valueType){
    			return true;
    		}
    	}
    	return false;
    }
    
	/**
	* @abstract V�rifie si la valeur pass� en parametre est pr�sente dans l'�num�ration pass�e dans le premier parametre. Les �num�rations sont les champs de la table config qui contiennent par exemple l'ensemble des technologies s�par� par ';;'.
	* @param String Nom de l'�num�ration dans laquelle recherch� la valeur
	* @param String Valeur � rechercher dans l'�num�ration
	* @return TRUE si la valeur est dans l'�num�ration, FALSE sinon
	* @access public
	*/
    public static function inEnumeration($nom_enum,$valueType){
        	$liste = DBConfig::getEnumeration($nom_enum);
        	foreach ($liste as $type){
        		if ($type->getFormSelectOptionValue()==$valueType){
        			return true;
        		}
        	}
        	return false;
    }
    
	/**
	* @abstract M�thode statique. Permet de savoir si la valeur pass� en param�tre est le mot de passe administrateur
	* @param String Mot de passe � tester
	* @return TRUE si le mot de passe en parametre est celui de l'administrateur, FALSE sinon
	* @access public
	*/
    public static function validPasswordAdmin($value){
    	$passwd = DBConfig::getConfigValue("PASSWORD ADMIN");
    	return md5($value)==$passwd;
    }
        
		
	/**
	* @abstract M�thode statique. Permet de savoir si la valeur pass� en param�tre est le mot de passe secretaire
	* @param String Mot de passe � tester
	* @return TRUE si le mot de passe en parametre est celui secretaire FALSE sinon
	* @access public
	*/
    public static function validPasswordSecretaire($value){
    	$passwd = DBConfig::getConfigValue("PASSWORD SECRETAIRE");
    	return md5($value)==$passwd;
    }
}
?>
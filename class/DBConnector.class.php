<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");
/**
* @abstract Classe abstraite permettant de d�finir le comportement de l'acces � la base de donn�es
* @package /class
*/
abstract class DBConnector{
    private static $_dbConnector;
    private $_connexionPersistance=false;
    private $_currentConnexion=null;
    
    /**
	* @abstract Permet de forcer une connexion "persistante" (utile lorsqu'on sait qu'on va faire beaucoup de requetes)
	* @param $forced bool
	*/
    public function forceConnexionPersistance($forced=true){
        if($forced && !$this->_connexionPersistance)
            $this->connect();
        
        if($this->_connexionPersistance && !$forced){
            $this->__disconnect();
            $this->_currentConnexion=null;
        }
        
        $this->_connexionPersistance = $forced;
    }
    
	/**
	* @abstract d�finit le DBConnector � utiliser
	* @param $dbConnector DBConnector d�finit le DBConnector � utiliser
	*/
    public static function setDBConnector($dbConnector){
        if($dbConnector instanceof DBConnector)
            DBConnector::$_dbConnector = $dbConnector;
        else die("Tentative de sp�cification d'un mauvais connecteur � la base de donn�es : $dbConnector !");
    }

	/**
	* @abstract Ex�cute une requ�te SQL
	* @param $sql String la requ�te SQL � ex�cuter
	* @param $recordBegin int l'indice du premier enregistrement � retourner
	* @param $recordCount int le nombre d'enregistrement � retourner
	* @return Mixed le resultset correspond � la requete si c'est un SELECT sinon le nombre de ligne soit false
	*/
    public function executeQuery($sql, $recordBegin=0, $recordCount=-1){
        $currentConnexion = $this->connect();

        Debugger::getInstance()->traceBDD("<i>Execution de la requ�te</i> : $sql<br/>");
        if(eregi("[:space:]*INSERT", $sql))
            $res = $this->__executeInsert($sql, $currentConnexion);
        else
            $res = $this->__executeQuery($sql, $currentConnexion, $recordBegin, $recordCount);
        
        $this->disconnect();
        
        return $res;
    }
        
    /**
	* @abstract Permet de crypter du texte pour insertion en base de donn�es (attention : l'op�ration est r�versible !... ne pas utiliser cette m�thode pour crypter des mots de passe !)
	* @param $text String le texte � crypter
	* @return String le texte crypt�
	*/
   	public static function cryptText($text) 
	{
        Debugger::getInstance()->traceBDD("<i>Cryptage du texte</i> : $text<br/>");
		if (!ctype_digit($text) && !is_integer($text))
		{
			return base64_encode($text);
		}
		return $text;
	}

    /**
	* @abstract	Permet de d�crypter du texte depuis la base de donn�es
	* @param $text String le texte � d�crypter
	* @return String le texte d�crypt�
	*/
	public static function decryptText($text)
	{
        Debugger::getInstance()->traceBDD("<i>D�cryptage du texte</i> : $text<br/>");
		if (!ctype_digit($text)  && !is_integer($text))
		{
			return base64_decode($text);
		}
		return $text;
	}
    
	/**
	* @abstract convertit un String en Date
	* @param $date String le string � convertir en date
	* @return Date la date convertie
	*/
    public function computeDate($date){
        return $this->__computeDate($date, $GLOBALS['DATE_FORMAT']);
    }
	
	/**
	* @abstract convertit une Date en String
	* @param $dbDate Date la date � convertir en String
	* @return String la date convertie en String
	*/
    public function decomputeDate($dbDate){
        return $this->__decomputeDate($dbDate, $GLOBALS['DATE_FORMAT']);
    }
    
	/**
	* @abstract convertit un String en Time
	* @param $time String le string � convertir en time
	* @return Time la time convertie
	*/
    public function computeTime($time){
        return $this->__computeTime($time, $GLOBALS['TIME_FORMAT']);
    }
	
	/**
	* @abstract convertit une Time en String
	* @param $dbTime Time la Time � convertir en String
	* @return String la Time convertie en String
	*/
    public function decomputeTime($dbTime){
        return $this->__decomputeTime($dbTime, $GLOBALS['TIME_FORMAT']);
    }
    
	/**
	* @abstract convertit un String en dateTime
	* @param $dateTime String le string � convertir en dateTime
	* @return dateTime la dateTime convertie
	*/
    public function computeDateTime($dateTime){
        return $this->__computeDateTime($dateTime, $GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT']);
    }
	
	/**
	* @abstract convertit une DateTime en String
	* @param $dbDateTime DateTime la DateTime � convertir en String
	* @return String la DateTime convertie en String
	*/
    public function decomputeDateTime($dbDateTime){
        return $this->__decomputeDateTime($dbDateTime, $GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT']);
    }

	/**
	* @abstract Connecte la base de donn�es
	* @return la connexion courante si la connexion n'est pas persistante sinon retourne la connexion persistante
	*/
    protected function connect(){
        if(!$this->_connexionPersistance){
            return $this->__connect();
        }
        else if($this->_currentConnexion == null){
            $this->_currentConnexion = $this->__connect();
        }
        return $this->_currentConnexion;
    }
    
	/**
	* @abstract Deconnecte la base de donn�es
	*/
    protected function disconnect(){
        if(!$this->_connexionPersistance){
            $this->__disconnect();
            $this->_currentConnexion=null;
        }
    }
    
	/**
	* @return retourne le DBConnector 
	*/
    public static function getDBConnector(){ return DBConnector::$_dbConnector; }
    
	/**
	* @abstract fonction de connexion � red�finir dans les classes filles
	*/
    abstract protected function __connect();
	/**
	* @abstract fonction de d�connexion � red�finir dans les classes filles
	*/
    abstract protected function __disconnect();
	/**
	* @abstract fonction d'insertion de requete � red�finir dans les classes filles
	* @param $sql String la requete d'insertion
	* @param $currentConnexion int l'identifiant de connexion
	* @return mixed retourne le nombre de ligne ins�r� ou une erreur
	*/
    abstract protected function __executeInsert($sql, $currentConnexion);
	/**
	* @abstract fonction d'extraction de requete � red�finir dans les classes filles
	* @param $sql String la requete SELECT
	* @param $currentConnexion int l'identifiant de connexion
	* @param $recordBegin int l'indice de la premiere ligne � retourner
	* @param $recordCount int le nombre de ligne � retourner
	* @return mixed retourne le nombre de ligne ins�r� ou une erreur
	*/
    abstract protected function __executeQuery($sql, $currentConnexion, $recordBegin=0, $recordCount=-1);
	/**
	* @abstract fonction de traitement d'un ResultSet � red�finir dans les classes filles
	* @param ResultSet le ResultSet � traiter
	* @return Array retourne le resultSet converti en tableau
	*/
    abstract public function fetchArray($res);
	/**
	* @abstract ne sert � rien � red�finir dans les classes filles
	* @param int
	* @return int
	*/
    abstract public function processInt($int);
	/**
	* @abstract ne sert � rien � red�finir dans les classes filles
	* @param String
	* @return String
	*/
    abstract public function processString($string);
	/**
	* @abstract ne sert � rien � red�finir dans les classes filles
	* @param Object
	* @return Object
	*/
    abstract public function processObject($object);
	/**
	* @abstract V�rifie l'existence de la base de donn�es � red�finir dans les classes filles
	* @return bool true la base existe sinon false
	*/
    abstract public function databaseExists();
	/**
	* @abstract Cr�e la base de donn�es � red�finir dans les classes filles
	* @return bool true la base existe sinon false
	*/
    abstract public function createDatabase();
	/**
	* @abstract supprime la base de donn�es � red�finir dans les classes filles
	* @return bool true la base existe sinon false
	*/
    abstract public function dropDatabase();
	/**
	* @abstract ajoute les caract�res d'�chappement pour les caract�res sp�ciaux en fonction du SGBDR � redefinir dans la classe fille
	* @param String le string � convertir
	* @return String le string converti
	*/
    abstract public function echapString($text);
	/**
	* @abstract converti un String en date en fonction du SGBDR � redefinir dans la classe fille
	* @param String le string � convertir
	* @param DateFormat le format de convertion
	* @return Date la date obtenue
	*/
    abstract protected function __computeDate($date, $dateFormat);
	/**
	* @abstract converti une Date en String en fonction du SGBDR � redefinir dans la classe fille
	* @param Date la Date � convertir
	* @param DateFormat le format de convertion
	* @return String la string obtenue
	*/
    abstract protected function __decomputeDate($dbDate, $dateFormat);
	/**
	* @abstract converti un String en time en fonction du SGBDR � redefinir dans la classe fille
	* @param String le string � convertir
	* @param timeFormat le format de convertion
	* @return time la time obtenue
	*/
    abstract protected function __computeTime($time, $timeFormat);
	/**
	* @abstract converti une time en String en fonction du SGBDR � redefinir dans la classe fille
	* @param Time la Time � convertir
	* @param TimeFormat le format de convertion
	* @return String la string obtenue
	*/
    abstract protected function __decomputeTime($dbTime, $timeFormat);
	/**
	* @abstract converti un String en dateTime en fonction du SGBDR � redefinir dans la classe fille
	* @param String le string � convertir
	* @param DateFormatTime le format de convertion
	* @return dateTime la dateTime obtenue
	*/
    abstract protected function __computeDateTime($dateTime, $dateTimeFormat);
	/**
	* @abstract converti une Datetime en String en fonction du SGBDR � redefinir dans la classe fille
	* @param Datetime la Datetime � convertir
	* @param DatetimeFormat le format de convertion
	* @return String la string obtenue
	*/
    abstract protected function __decomputeDateTime($dbDateTime, $dateTimeFormat);
}
?>
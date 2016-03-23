<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

abstract class DBConnector{
    private static $_dbConnector;
    private static $_sourceDbConnector;
    private $_connexionPersistance=false;
    private $_currentConnexion=null;
    
    // Permet de forcer une connexion "persistante" (utile lorsqu'on sait qu'on va faire beaucoup de requetes)
    public function forceConnexionPersistance($forced=true){
        if($forced && !$this->_connexionPersistance)
            $this->connect();
        
        if($this->_connexionPersistance && !$forced){
            $this->__disconnect();
            $this->_currentConnexion=null;
        }
        
        $this->_connexionPersistance = $forced;
    }
    
    public static function setDBConnectorSource($dbConnector){
        if($dbConnector instanceof DBConnector)
            DBConnector::$_sourceDbConnector = $dbConnector;
        else die("Tentative de spécification d'un mauvais connecteur à la base de données : $dbConnector !");
    }
    
    public static function setDBConnector($dbConnector){
        if($dbConnector instanceof DBConnector)
            DBConnector::$_dbConnector = $dbConnector;
        else die("Tentative de spécification d'un mauvais connecteur à la base de données : $dbConnector !");
    }
    
    public function executeQuery($sql, $recordBegin=0, $recordCount=-1){
        $currentConnexion = $this->connect();

        Debugger::getInstance()->traceBDD("<i>Execution de la requête</i> : $sql<br/>");
        if(eregi("[:space:]*INSERT", $sql))
            $res = $this->__executeInsert($sql, $currentConnexion);
        else
            $res = $this->__executeQuery($sql, $currentConnexion, $recordBegin, $recordCount);
        
        $this->disconnect();
        
        return $res;
    }
        
    // Permet de crypter du texte pour insertion en base de données (attention : l'opération est réversible !... ne pas utiliser cette méthode pour crypter des mots de passe !)
   	public static function cryptText($text) 
	{
        Debugger::getInstance()->traceBDD("<i>Cryptage du texte</i> : $text<br/>");
		if (!ctype_digit($text) && !is_integer($text))
		{
			return base64_encode($text);
		}
		return $text;
	}

    // Permet de décrypter du texte depuis la base de données
	public static function decryptText($text)
	{
        Debugger::getInstance()->traceBDD("<i>Décryptage du texte</i> : $text<br/>");
		if (!ctype_digit($text)  && !is_integer($text))
		{
			return base64_decode($text);
		}
		return $text;
	}
    
    public function computeDate($date){
        return $this->__computeDate($date, $GLOBALS['DATE_FORMAT']);
    }
    public function decomputeDate($dbDate){
        return $this->__decomputeDate($dbDate, $GLOBALS['DATE_FORMAT']);
    }
    
    public function computeTime($time){
        return $this->__computeTime($time, $GLOBALS['TIME_FORMAT']);
    }
    
    public function decomputeTime($dbTime){
        return $this->__decomputeTime($dbTime, $GLOBALS['TIME_FORMAT']);
    }
    
    public function computeDateTime($dateTime){
        return $this->__computeDateTime($dateTime, $GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT']);
    }

    public function decomputeDateTime($dbDateTime){
        return $this->__decomputeDateTime($dbDateTime, $GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT']);
    }
    
    protected function connect(){
        if(!$this->_connexionPersistance){
            return $this->__connect();
        }
        else if($this->_currentConnexion == null){
            $this->_currentConnexion = $this->__connect();
        }
        return $this->_currentConnexion;
    }
    
    protected function disconnect(){
        if(!$this->_connexionPersistance){
            $this->__disconnect();
            $this->_currentConnexion=null;
        }
    }
    
    public static function getDBConnector(){ return DBConnector::$_dbConnector; }
    public static function getDBConnectorSource(){ return DBConnector::$_sourceDbConnector; }
    
    abstract protected function __connect();
    abstract protected function __disconnect();
    abstract protected function __executeInsert($sql, $currentConnexion);
    abstract protected function __executeQuery($sql, $currentConnexion, $recordBegin=0, $recordCount=-1);
    abstract public function fetchArray($res);
    abstract public function processInt($int);
    abstract public function processString($string);
    abstract public function processObject($object);
    abstract public function databaseExists();
    abstract public function createDatabase();
    abstract public function dropDatabase();
    abstract public function echapString($text);
    abstract protected function __computeDate($date, $dateFormat);
    abstract protected function __decomputeDate($dbDate, $dateFormat);
    abstract protected function __computeTime($time, $timeFormat);
    abstract protected function __decomputeTime($dbTime, $timeFormat);
    abstract protected function __computeDateTime($dateTime, $dateTimeFormat);
    abstract protected function __decomputeDateTime($dbDateTime, $dateTimeFormat);
}
?>
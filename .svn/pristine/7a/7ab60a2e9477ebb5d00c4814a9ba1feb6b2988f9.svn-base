<?php

set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");
//require_once("class/DBConnector.class.php");

/**
*@abstract Classe d'acces à une base de données mysql
*@package /class/DBConnector
*
*/


class MySQLConnector extends DBConnector
{
    private $_lastConnexion;
    private $_dbHost;
    private $_dbUser;
    private $_dbPass;
    private $_dbName;
    
	/**
	* @abstract instancie la classe
	* @param $dbHost String le chemin de la base de données MySQL
	* @param $dbUser String login de la base
	* @param $dbPass String mot de passe de la base
	* @param $dbName String nom de la base
	*/
    public function __construct($dbHost, $dbUser, $dbPass, $dbName){
        $this->_dbHost = $dbHost; $this->_dbUser = $dbUser; $this->_dbPass = $dbPass; $this->_dbName = $dbName;
    }
    
	/**
	* @abstract réalise la connexion à la base de données
	* @return int l'identifiant de base de données
	*/
    protected function __connect()
    {
        Debugger::getInstance()->traceBDD("<i>Connexion à la base de données</i><br/>");

        $this->_lastConnexion = mysql_connect($this->_dbHost, $this->_dbUser, $this->_dbPass, true) or die ("Erreur de connexion mysql : <b>".mysql_error()."</b>");
        mysql_select_db($this->_dbName, $this->_lastConnexion) or die ("Erreur lors de la sélection de ".$this->_dbName." (".mysql_error().") !");
        $this->__executeQuery("SET NAMES 'UTF8'", $this->_lastConnexion);
        return $this->_lastConnexion;
    }
    
	/**
	* @abstract déconnecte la base de données
	*/
    protected function __disconnect()
    {
        if(isset($this->_lastConnexion))
        {
            Debugger::getInstance()->traceBDD("<i>Déconnexion de la base de données</i><br/>");
            mysql_close($this->_lastConnexion);
        }
        
        unset($this->_lastConnexion);
    }
    
	/**
	* @abstract execute la requete
	* @param String la requete à exécuter
	* @param int l'identifiant de connexion 
	* @param int l'indice du premer enregistrement à retourner
	* @param int le nombre d'enregistrement à retourner
	* @return ResultSet 
	*/
    protected function __executeQuery($sql, $currentConnexion, $recordBegin=0, $recordCount=-1)
    {
        if($recordCount != -1)
            $sql .= " LIMIT ".$recordBegin.",".$recordCount;
            
        $res = mysql_query($sql, $currentConnexion) or die("Erreur SQL : <i>$sql</i><br/><b>".mysql_error()."</b>");
        return $res;
    }
    /**
	* @abstract insert la requete
	* @param $sql String la requete d'insertion
	* @param $currentConnexion int l'identifiant de connexion 
	* @return int l'identifiant généré par l'insertion
	*/
    protected function __executeInsert($sql, $currentConnexion){
        $this->__executeQuery($sql, $currentConnexion);
        return mysql_insert_id();
    }
    
    public function processInt($int)
    {
        return $int;
    }
    
    public function processString($string)
    {
        return "'$string'";
    }

    public function processObject($object)
    {
        if(($object == "") || ($object == null)) return "NULL";
        if(is_int($object)) return $this->processInt($object);
        else if(is_string($object)) return $this->processString($object);

        return "'$object'";
    }
    
	/**
	* @abstract vérifie l'existence de la base de données
	* @return bool true si la base existe sinon false
	*/
    public function databaseExists(){
        Debugger::getInstance()->traceBDDObject("<i>Appel de MySQLConnector::databaseExists()</i><br/>");
        $c = mysql_connect($this->_dbHost, $this->_dbUser, $this->_dbPass, true) or die ("Erreur de connexion mysql : <b>".mysql_error()."</b>");
        
        $sql = "SHOW DATABASES LIKE '".strtolower($this->_dbName)."'";
        $res = mysql_query($sql, $c);

        mysql_close($c);
        
        return (mysql_num_rows($res) == 1);
    }
    
	/**
	* @abstract crée la base de données
	*/
    public function createDatabase(){
        Debugger::getInstance()->traceBDDObject("<i>Appel de MySQLConnector::createDatabase()</i><br/>");
        $c = mysql_connect($this->_dbHost, $this->_dbUser, $this->_dbPass, true) or die ("Erreur de connexion mysql : <b>".mysql_error()."</b>");
        mysql_query("CREATE DATABASE ".$this->_dbName, $c) or die("Erreur lors de la création de la base de données ".$this->_dbName." : <b>".mysql_error()."</b>");
        mysql_query("GRANT ALL PRIVILEGES ON `".$this->_dbName."` . * TO '".$this->_dbUser."'@'%' WITH GRANT OPTION", $c) or die("Erreur lors de l'affectation des privilèges sur la table créée : <b>".mysql_error()."</b>");
        mysql_query("GRANT ALL PRIVILEGES ON `".$this->_dbName."` . * TO '".$this->_dbUser."'@'localhost' WITH GRANT OPTION", $c) or die("Erreur lors de l'affectation des privilèges sur la table créée : <b>".mysql_error()."</b>");
        mysql_close($c);
    }
    
	/**
	* @abstract supprime la base de données
	*/
    public function dropDatabase(){
        Debugger::getInstance()->traceBDDObject("<i>Appel de MySQLConnector::dropDatabase()</i><br/>");
        $c = $this->connect();
        $this->executeQuery("DROP DATABASE ".$this->_dbName, $c);
        $this->disconnect();
    }
    
	/**
	* @abstract vérifie l'existence de la table
	* @param $tableName nom de la table à vérifier
	* @return bool true si la table existe
	*/
    public function tableExists($tableName){
        Debugger::getInstance()->traceBDDObject("<i>Appel de MySQLConnector::tableExists($tableName)</i><br/>");
        $sql = "SHOW TABLES FROM ".$this->_dbName." LIKE '".$tableName."'";
        $res = $this->executeQuery($sql);
        return (mysql_num_rows($res) == 1);
    }
    
	/**
	* @abstract convertit un resultset en tableau
	* @param $res ResultSet le resultSet à convertir
	* @return Array 
	*/
    public function fetchArray($res){
        return mysql_fetch_array($res);
    }
    
    /**
	* @abstract Méthode utile pour echapper les différents caractères spéciaux de mysql
	* @param $text String le texte à convertir
	* @return String le texte converti
	*/
    public function echapString($text){
        if( 1 === get_magic_quotes_gpc() )
            $text = stripslashes(stripslashes(stripslashes(stripslashes($text))));
        return str_replace("\\", "\\\\", str_replace("'", "''", $text));
    }

	/**
	* @abstract convertit un string en date
	* @param $date String le string à convertir en date
	* @param $dateFormat DateFormat le format de conversion
	* @return Date 
	*/
    protected function __computeDate($date, $dateFormat){
        if($date == "") return "NULL";
        else return "STR_TO_DATE('".$date."','".$dateFormat."')";
    }
    
	/**
	* @abstract convertit une date en string
	* @param $dbDate date la date à convertir
	* @param $dbFormat DateFormat le format de conversion
	* @return String 
	*/
    protected function __decomputeDate($dbDate, $dateFormat){
        $res = $this->executeQuery("SELECT DATE_FORMAT('".$dbDate."', '".$dateFormat."')");
        $result = $this->fetchArray($res);
        return $result[0];
    }
    
	/**
	* @abstract convertit un string en Time
	* @param $time String le string à convertir en Time
	* @param $timeFormat TimeFormat le format de conversion
	* @return Time
	*/
    protected function __computeTime($time, $timeFormat){
        if($time== "") return "NULL";
        else return "STR_TO_DATE('".$time."','".$timeFormat."')";
    }
    
	/**
	* @abstract convertit une time en string
	* @param $dbTime Time la Time à convertir
	* @param $timeFormat TimeFormat le format de conversion
	* @return String 
	*/
    protected function __decomputeTime($dbTime, $timeFormat){
        $res = $this->executeQuery("SELECT TIME_FORMAT('".$dbTime."', '".$timeFormat."')");
        $result = $this->fetchArray($res);
        return $result[0];
    }

	/**
	* @abstract convertit un string en dateTime
	* @param $dateTime String le string à convertir en dateTime
	* @param $dateTimeFormat dateTimeFormat le format de conversion
	* @return dateTime 
	*/
    protected function __computeDateTime($dateTime, $dateTimeFormat){
        if($dateTime == "") return "NULL";
        else return "STR_TO_DATE('".$dateTime."','".$dateTimeFormat."')";
    }
    
	/**
	* @abstract convertit une dateTime en string
	* @param $dbDateTime la dateTime à convertir
	* @param $dateTimeFormat le format de conversion
	* @return String 
	*/
    protected function __decomputeDateTime($dbDateTime, $dateTimeFormat){
        $res = $this->executeQuery("SELECT DATE_FORMAT('".$dbDateTime."', '".$dateTimeFormat."')");
        $result = $this->fetchArray($res);
        return $result[0];
    }
	
	/**
	* @abstract getter _dbHost
	* @return String 
	*/
	public function getHost(){
		return $this->_dbHost;
	}
	
	/**
	* @abstract getter _dbName
	* @return String 
	*/
	public function getDatabase(){
		return $this->_dbName;
	}
	
	/**
	* @abstract getter _dbUser
	* @return String 
	*/
	public function getUser(){
		return $this->_dbUser;
	}
	
	/**
	* @abstract getter _dbPass
	* @return String 
	*/
	public function getPass(){
		return $this->_dbPass;
	}
}
?>

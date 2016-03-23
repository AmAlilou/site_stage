<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");
//require_once("class/DBConnector.class.php");

class MySQLConnector extends DBConnector
{
    private $_lastConnexion;
    private $_dbHost;
    private $_dbUser;
    private $_dbPass;
    private $_dbName;
    
    public function __construct($dbHost, $dbUser, $dbPass, $dbName){
        $this->_dbHost = $dbHost; $this->_dbUser = $dbUser; $this->_dbPass = $dbPass; $this->_dbName = $dbName;
    }
    
    protected function __connect()
    {
        Debugger::getInstance()->traceBDD("<i>Connexion à la base de données</i><br/>");

        $this->_lastConnexion = mysql_connect($this->_dbHost, $this->_dbUser, $this->_dbPass, true) or die ("Erreur de connexion mysql : <b>".mysql_error()."</b>");
        mysql_select_db($this->_dbName, $this->_lastConnexion) or die ("Erreur lors de la sélection de ".$this->_dbName." (".mysql_error().") !");
        $this->__executeQuery("SET NAMES 'UTF8'", $this->_lastConnexion);
        return $this->_lastConnexion;
    }
    
    protected function __disconnect()
    {
        if(isset($this->_lastConnexion))
        {
            Debugger::getInstance()->traceBDD("<i>Déconnexion de la base de données</i><br/>");
            mysql_close($this->_lastConnexion);
        }
        
        unset($this->_lastConnexion);
    }
    
    protected function __executeQuery($sql, $currentConnexion, $recordBegin=0, $recordCount=-1)
    {
        if($recordCount != -1)
            $sql .= " LIMIT ".$recordBegin.",".$recordCount;
            
        $res = mysql_query($sql, $currentConnexion) or die("Erreur SQL : <i>$sql</i><br/><b>".mysql_error()."</b>");
        return $res;
    }
    
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
        if($object instanceof int) return $this->processInt($object);
        else if($object instanceof string) return $this->processString($object);

        return "'$object'";
    }
    
    public function databaseExists(){
        Debugger::getInstance()->traceBDDObject("<i>Appel de MySQLConnector::databaseExists()</i><br/>");
        $c = mysql_connect($this->_dbHost, $this->_dbUser, $this->_dbPass, true) or die ("Erreur de connexion mysql : <b>".mysql_error()."</b>");
        
        $sql = "SHOW DATABASES LIKE '".strtolower($this->_dbName)."'";
        $res = mysql_query($sql, $c);

        mysql_close($c);
        
        return (mysql_num_rows($res) == 1);
    }
    
    public function createDatabase(){
        Debugger::getInstance()->traceBDDObject("<i>Appel de MySQLConnector::createDatabase()</i><br/>");
        $c = mysql_connect($this->_dbHost, $this->_dbUser, $this->_dbPass, true) or die ("Erreur de connexion mysql : <b>".mysql_error()."</b>");
        mysql_query("CREATE DATABASE ".$this->_dbName, $c) or die("Erreur lors de la création de la base de données ".$this->_dbName." : <b>".mysql_error()."</b>");
        mysql_query("GRANT ALL PRIVILEGES ON `".$this->_dbName."` . * TO '".$this->_dbUser."'@'%' WITH GRANT OPTION", $c) or die("Erreur lors de l'affectation des privilèges sur la table créée : <b>".mysql_error()."</b>");
        mysql_query("GRANT ALL PRIVILEGES ON `".$this->_dbName."` . * TO '".$this->_dbUser."'@'localhost' WITH GRANT OPTION", $c) or die("Erreur lors de l'affectation des privilèges sur la table créée : <b>".mysql_error()."</b>");
        mysql_close($c);
    }
    
    public function dropDatabase(){
        Debugger::getInstance()->traceBDDObject("<i>Appel de MySQLConnector::dropDatabase()</i><br/>");
        $c = $this->connect();
        $this->executeQuery("DROP DATABASE ".$this->_dbName, $c);
        $this->disconnect();
    }
    
    public function tableExists($tableName){
        Debugger::getInstance()->traceBDDObject("<i>Appel de MySQLConnector::tableExists($tableName)</i><br/>");
        $sql = "SHOW TABLES FROM ".$this->_dbName." LIKE '".$tableName."'";
        $res = $this->executeQuery($sql);
        return (mysql_num_rows($res) == 1);
    }
    
    public function fetchArray($res){
        return mysql_fetch_array($res);
    }
    
    // Méthode utile pour echapper les différents caractères spéciaux de mysql
    public function echapString($text){
        if( 1 === get_magic_quotes_gpc() )
            $text = stripslashes(stripslashes(stripslashes(stripslashes($text))));
        return str_replace("\\", "\\\\", str_replace("'", "''", $text));
    }

    protected function __computeDate($date, $dateFormat){
        if($date == "") return "NULL";
        else return "STR_TO_DATE('".$date."','".$dateFormat."')";
    }
    
    protected function __decomputeDate($dbDate, $dateFormat){
        $res = $this->executeQuery("SELECT DATE_FORMAT('".$dbDate."', '".$dateFormat."')");
        $result = $this->fetchArray($res);
        return $result[0];
    }
    
    protected function __computeTime($time, $timeFormat){
        if($time== "") return "NULL";
        else return "STR_TO_DATE('".$time."','".$timeFormat."')";
    }
    
    protected function __decomputeTime($dbTime, $timeFormat){
        $res = $this->executeQuery("SELECT TIME_FORMAT('".$dbTime."', '".$timeFormat."')");
        $result = $this->fetchArray($res);
        return $result[0];
    }

    protected function __computeDateTime($dateTime, $dateTimeFormat){
        if($dateTime == "") return "NULL";
        else return "STR_TO_DATE('".$dateTime."','".$dateTimeFormat."')";
    }
    
    protected function __decomputeDateTime($dbDateTime, $dateTimeFormat){
        $res = $this->executeQuery("SELECT DATE_FORMAT('".$dbDateTime."', '".$dateTimeFormat."')");
        $result = $this->fetchArray($res);
        return $result[0];
    }
}
?>
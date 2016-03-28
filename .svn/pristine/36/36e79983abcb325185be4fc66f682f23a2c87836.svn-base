<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

class Debugger{
    public static $DEBUG_LOG = "debug.html";

    // A MODIFIER POUR LE DEBUGGAGE
    private $_traceBDD = false;
    private $_traceBDDObject = false;
    private $_traceFunctions = false;
    
    private $_output = "";
    private static $_instance = null;
    
    private function __contruct(){}
    
    public static function getInstance(){
        if(Debugger::$_instance == null)
            Debugger::$_instance = new Debugger();
        return Debugger::$_instance;
    }
    
    public function traceBDD($msg){
        if($this->_traceBDD)
            $this->_output .= $msg;
    }

    public function traceBDDObject($msg){
        if($this->_traceBDDObject)
            $this->_output .= $msg;
    }

    public function traceFunction($msg){
        if($this->_traceFunctions)
            $this->_output .= $msg;
    }
    
    public function trace($msg){
        $this->_output .= $msg;
    }
    
    public function debugLogGenerated(){
        return ($this->_output != "");
    }
    
    public function saveDebug(){
        $fw = new FileWriter();

        // Sauvegarde de "l'output" dans debug/debug.html
        if($this->debugLogGenerated())
            $fw->write($GLOBALS['ROOT_PATH']."/debug/".Debugger::$DEBUG_LOG, $this->_output);
    }
}
?>
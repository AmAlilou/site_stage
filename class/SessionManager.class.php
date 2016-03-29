<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// Classe permettant de g�rer toutes les variables de sessions (pour une clart� du code)
class SessionManager {
	private static $VARIABLE_ID_ETUDIANT = "idEtudiant";
	private static $VARIABLE_ID_ENSEIGNANT = "idEnseignant";
	private static $VARIABLE_ID_ADMIN = "idAdmin";
	private static $VARIABLE_ID_SECRETAIRE = "idSecretaire";
	private static $VARIABLE_EXPANDED_MENU = "expandedMenu";

    // Variables pour palier au manque de HTTP_REFERER dans php5
    private static $VARIABLE_REFERER = "referer";
    private static $VARIABLE_URL = "url";
    
    private static $_sessionStarted = false;

	//d�bute la session ou recup�re celle commenc�e avant
    public static function startSession(){
    	
    	   
        if(!SessionManager::$_sessionStarted)
        	session_start();
        SessionManager::$_sessionStarted = true;
        if(isset($_SESSION[SessionManager::$VARIABLE_URL]))
            $_SESSION[SessionManager::$VARIABLE_REFERER] = $_SESSION[SessionManager::$VARIABLE_URL];

        // Construction de l'url du script actuel
        $scriptName = $_SERVER["SCRIPT_FILENAME"];
        $rootPath = $GLOBALS['ROOT_PATH'];
        // On supprime le root path du script name
        $scriptName = substr($scriptName, strlen($rootPath)+(($scriptName[strlen($rootPath)]!='/')?1:0));
        $_SESSION[SessionManager::$VARIABLE_URL] = $GLOBALS['URL_ROOT_PATH'].$scriptName."?";
        return NULL;
        // On "colle" toutes les variables en get
        foreach($_GET as $key => $value)
            $_SESSION[SessionManager::$VARIABLE_URL] .= $key."=".$value."&";
    }
	public static function isSomeoneLogged(){
        return (SessionManager::isEtudiantLogged() || SessionManager::isEnseignantLogged() || SessionManager::isAdminLogged() || SessionManager::isSecretaireLogged());
	}
	public static function isEtudiantLogged(){
		return (isset($_SESSION[SessionManager::$VARIABLE_ID_ETUDIANT]) && $_SESSION[SessionManager::$VARIABLE_ID_ETUDIANT] != "");
	}
	public static function isEnseignantLogged(){
		return (isset($_SESSION[SessionManager::$VARIABLE_ID_ENSEIGNANT]) && $_SESSION[SessionManager::$VARIABLE_ID_ENSEIGNANT] != "");
	}
	public static function isAdminLogged(){
		return (isset($_SESSION[SessionManager::$VARIABLE_ID_ADMIN]) && $_SESSION[SessionManager::$VARIABLE_ID_ADMIN] != "");
	}
    public static function isSecretaireLogged(){
		return (isset($_SESSION[SessionManager::$VARIABLE_ID_SECRETAIRE]) && $_SESSION[SessionManager::$VARIABLE_ID_SECRETAIRE] != "");
    }
	public static function isThereMenuExpanded(){
		return (isset($_SESSION[SessionManager::$VARIABLE_EXPANDED_MENU]) && $_SESSION[SessionManager::$VARIABLE_EXPANDED_MENU] != "");
	}
	public static function isExpanded($menu){
		return ($_SESSION[SessionManager::$VARIABLE_EXPANDED_MENU]==$menu);
	}
	public static function getEtudiant(){
		if (SessionManager::isEtudiantLogged()){
			$etudiants = DBEtudiant::getRecords($_SESSION[SessionManager::$VARIABLE_ID_ETUDIANT]);
			assert(count($etudiants)==1);
			return $etudiants[0];
		}
		return NULL;
	}
	public static function getEnseignant(){
		if (SessionManager::isEnseignantLogged()){
			$enseignants = DBEnseignant::getRecords($_SESSION[SessionManager::$VARIABLE_ID_ENSEIGNANT]);
			assert(count($enseignants)==1);
			return $enseignants[0];
		}
		return NULL;
	}
	public static function getAdmin(){
		if (SessionManager::isAdminLogged())
			return $_SESSION[SessionManager::$VARIABLE_ID_ADMIN];
		return NULL;
	}
	public static function getSecretaire(){
		if (SessionManager::isSecretaireLogged())
			return $_SESSION[SessionManager::$VARIABLE_ID_SECRETAIRE];
		return NULL;
	}
	public static function getExpandedMenu(){
		if(SessionManager::isThereExpandedMenu())
			return $_SESSION[SessionManager::$VARIABLE_EXPANDED_MENU];
		return NULL;
	}
    public static function getHTTPReferer(){
        if(!isset($_SESSION[SessionManager::$VARIABLE_REFERER]))
            return "";
        else
            return $_SESSION[SessionManager::$VARIABLE_REFERER];
    }
    public static function disconnectUsers(){
        session_unregister(SessionManager::$VARIABLE_ID_ETUDIANT);
        session_unregister(SessionManager::$VARIABLE_ID_ENSEIGNANT);
        session_unregister(SessionManager::$VARIABLE_ID_ADMIN);
        session_unregister(SessionManager::$VARIABLE_ID_SECRETAIRE);
        
    	// detruire tous les variables de la session
    	session_unset ( );
    	session_destroy();
    	
        
    }
	public static function registerEtudiant(DBEtudiant $etudiant){
		$_SESSION[SessionManager::$VARIABLE_ID_ETUDIANT]=$etudiant->getIdEtudiant();	
	}
	public static function registerEnseignant(DBEnseignant $enseignant){
		$_SESSION[SessionManager::$VARIABLE_ID_ENSEIGNANT]=$enseignant->getIdEnseignant();
	}
	public static function registerAdmin($login_admin){
		$_SESSION[SessionManager::$VARIABLE_ID_ADMIN]=$login_admin;
	}
	public static function registerSecretaire($login_secretaire){
		$_SESSION[SessionManager::$VARIABLE_ID_SECRETAIRE]=$login_secretaire;
	}
	public static function registerExpandedMenu($menu){
		$_SESSION[SessionManager::$VARIABLE_EXPANDED_MENU]=$menu;
	}
}
?>
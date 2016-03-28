<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// Classe permettant de rapidement vérifier des contraintes sur l'affichage d'une page
class PagePermission {
    public static $NO_CONSTRAINT=1;
    public static $CONSTRAINT_ADMIN_LOGGED=2;
    public static $CONSTRAINT_ETUDIANT_LOGGED=3;
    public static $CONSTRAINT_ENSEIGNANT_LOGGED=4;
    public static $CONSTRAINT_SECRETAIRE_LOGGED=5;
    public static $CONSTRAINT_SOMEBODY_LOGGED=6;
    
    private $_constraint;
    
    public function __construct($constraint){
        assert(in_array($constraint, array(
                                                PagePermission::$NO_CONSTRAINT, 
                                                PagePermission::$CONSTRAINT_ADMIN_LOGGED, 
                                                PagePermission::$CONSTRAINT_ETUDIANT_LOGGED, 
                                                PagePermission::$CONSTRAINT_ENSEIGNANT_LOGGED,
                                                PagePermission::$CONSTRAINT_SECRETAIRE_LOGGED,
                                                PagePermission::$CONSTRAINT_SOMEBODY_LOGGED)));
        $this->_constraint = $constraint;
    }
    
    public static function verifyPagePermission($pp){
        assert($pp instanceof PagePermission);
        $test = false;
        $redirectPage = "";
        switch($pp->_constraint){
            case PagePermission::$NO_CONSTRAINT:
                $test = true;
                break;
            case PagePermission::$CONSTRAINT_ADMIN_LOGGED:
                $test = SessionManager::isAdminLogged();
                $redirectPage = $GLOBALS['URL_ROOT_PATH']."/connexionAdmin.php";
                break;
            case PagePermission::$CONSTRAINT_SECRETAIRE_LOGGED:
                $test = SessionManager::isSecretaireLogged();
                $redirectPage = $GLOBALS['URL_ROOT_PATH']."/connexionSecretaire.php";
                break;
            case PagePermission::$CONSTRAINT_ETUDIANT_LOGGED:
                $test = SessionManager::isEtudiantLogged();
                $redirectPage = $GLOBALS['URL_ROOT_PATH']."/connexionEtudiant.php";
                break;
            case PagePermission::$CONSTRAINT_ENSEIGNANT_LOGGED:
                $test = SessionManager::isEnseignantLogged();
                $redirectPage = $GLOBALS['URL_ROOT_PATH']."/connexionEnseignant.php";
                break;
            case  PagePermission::$CONSTRAINT_SOMEBODY_LOGGED:
               $test = SessionManager::isSomeoneLogged();
               if (!$test)
                   die(XHTMLBuilder::getText("Vous devez être connecté"));
        }
        
        if(!$test)
            header("Location: ".$redirectPage);
    }
}
?>
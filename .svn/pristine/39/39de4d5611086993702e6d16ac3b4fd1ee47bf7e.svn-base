<?php
set_include_path(".".PATH_SEPARATOR."..".PATH_SEPARATOR."../..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=23&pgc_url=&nom_table=Etudiant&nom_champ_1=id_etudiant&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=nom_etudiant&type_champ_2=1&taille_champ_2=255&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=prenom_etudiant&type_champ_3=1&taille_champ_3=255&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=mailfac_etudiant&type_champ_4=1&taille_champ_4=255&champ_facultatif_4=on&valeur_defaut_4=NULL&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=mailstable_etudiant&type_champ_5=1&taille_champ_5=255&champ_facultatif_5=on&valeur_defaut_5=NULL&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=miage_etudiant&type_champ_6=1&taille_champ_6=255&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=mailstage_etudiant&type_champ_7=1&taille_champ_7=255&champ_facultatif_7=on&valeur_defaut_7=NULL&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=sexe_etudiant&type_champ_8=6&taille_champ_8='H','F'&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=promo_etudiant&type_champ_9=3&taille_champ_9=&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=telstage_etudiant&type_champ_10=1&taille_champ_10=255&champ_facultatif_10=on&valeur_defaut_10=NULL&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&nom_champ_11=login_etudiant&type_champ_11=1&taille_champ_11=255&champ_facultatif_11=on&valeur_defaut_11=NULL&auto_increment_11=&clef_primaire_11=&getter_11=on&setter_11=&nom_champ_12=password_etudiant&type_champ_12=4&taille_champ_12=&champ_facultatif_12=on&valeur_defaut_12=0&auto_increment_12=&clef_primaire_12=&getter_12=on&setter_12=&nom_champ_13=adressestage_etudiant&type_champ_13=1&taille_champ_13=255&champ_facultatif_13=on&valeur_defaut_13=NULL&auto_increment_13=&clef_primaire_13=&getter_13=on&setter_13=&nom_champ_14=cpstage_etudiant&type_champ_14=3&taille_champ_14=&champ_facultatif_14=on&valeur_defaut_14=00000&auto_increment_14=&clef_primaire_14=&getter_14=on&setter_14=&nom_champ_15=villestage_etudiant&type_champ_15=1&taille_champ_15=255&champ_facultatif_15=on&valeur_defaut_15=NULL&auto_increment_15=&clef_primaire_15=&getter_15=on&setter_15=&nom_champ_16=adressefac_etudiant&type_champ_16=1&taille_champ_16=255&champ_facultatif_16=on&valeur_defaut_16=NULL&auto_increment_16=&clef_primaire_16=&getter_16=on&setter_16=&nom_champ_17=cpfac_etudiant&type_champ_17=3&taille_champ_17=&champ_facultatif_17=on&valeur_defaut_17=00000&auto_increment_17=&clef_primaire_17=&getter_17=on&setter_17=&nom_champ_18=villefac_etudiant&type_champ_18=1&taille_champ_18=255&champ_facultatif_18=on&valeur_defaut_18=NULL&auto_increment_18=&clef_primaire_18=&getter_18=on&setter_18=&nom_champ_19=adressestable_etudiant&type_champ_19=1&taille_champ_19=255&champ_facultatif_19=on&valeur_defaut_19=NULL&auto_increment_19=&clef_primaire_19=&getter_19=on&setter_19=&nom_champ_20=cpstable_etudiant&type_champ_20=3&taille_champ_20=&champ_facultatif_20=on&valeur_defaut_20=00000&auto_increment_20=&clef_primaire_20=&getter_20=on&setter_20=&nom_champ_21=villestable_etudiant&type_champ_21=1&taille_champ_21=255&champ_facultatif_21=on&valeur_defaut_21=NULL&auto_increment_21=&clef_primaire_21=&getter_21=on&setter_21=&nom_champ_22=date_derniere_connexion&type_champ_22=10&taille_champ_22=&champ_facultatif_22=on&valeur_defaut_22=&auto_increment_22=&clef_primaire_22=&getter_22=on&setter_22=&nom_champ_23=date_derniere_recuperation_pass&type_champ_23=10&taille_champ_23=&champ_facultatif_23=on&valeur_defaut_23=&auto_increment_23=&clef_primaire_23=&getter_23=on&setter_23=&

/**
* @package DBClasses
* @abstract Classe correspondant à la table 'etudiant' de la base de données. Elle contient également un ensemble de méthodes permettant la gestion de cette table.
*/
class DBEtudiant {
    /**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "miage". Chaine stockée pour le niveau 'L3'
	*/
	public static $ENUM_MIAGE_L3 = "L3";
	/**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "miage". Chaine stockée pour le niveau 'M1'
	*/
    public static $ENUM_MIAGE_M1 = "M1";
	/**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "miage". Chaine stockée pour le niveau 'M2'
	*/
    public static $ENUM_MIAGE_M2 = "M2";
 
    private static $TABLE_NAME = "etudiant";
    private static $FIELD_ID_ETUDIANT = "id_etudiant";

    private static $FIELD_NOM_ETUDIANT = "nom_etudiant";
    private static $FIELD_PRENOM_ETUDIANT = "prenom_etudiant";
    private static $FIELD_MAILFAC_ETUDIANT = "mailfac_etudiant";
    private static $FIELD_MAILSTABLE_ETUDIANT = "mailstable_etudiant";
    private static $FIELD_MIAGE_ETUDIANT = "miage_etudiant";
    private static $FIELD_MAILSTAGE_ETUDIANT = "mailstage_etudiant";
    private static $FIELD_SEXE_ETUDIANT = "sexe_etudiant";
    private static $FIELD_PROMO_ETUDIANT = "promo_etudiant";
    private static $FIELD_TELSTAGE_ETUDIANT = "telstage_etudiant";
    private static $FIELD_LOGIN_ETUDIANT = "login_etudiant";
    private static $FIELD_PASSWORD_ETUDIANT = "password_etudiant";
    private static $FIELD_ADRESSESTAGE_ETUDIANT = "adressestage_etudiant";
    private static $FIELD_CPSTAGE_ETUDIANT = "cpstage_etudiant";
    private static $FIELD_VILLESTAGE_ETUDIANT = "villestage_etudiant";
    private static $FIELD_ADRESSEFAC_ETUDIANT = "adressefac_etudiant";
    private static $FIELD_CPFAC_ETUDIANT = "cpfac_etudiant";
    private static $FIELD_VILLEFAC_ETUDIANT = "villefac_etudiant";
    private static $FIELD_ADRESSESTABLE_ETUDIANT = "adressestable_etudiant";
    private static $FIELD_CPSTABLE_ETUDIANT = "cpstable_etudiant";
    private static $FIELD_VILLESTABLE_ETUDIANT = "villestable_etudiant";
    private static $FIELD_DATE_DERNIERE_CONNEXION = "date_derniere_connexion";
    private static $FIELD_DATE_DERNIERE_RECUPERATION_PASS = "date_derniere_recuperation_pass";

    private $_idEtudiant;
    private $_nomEtudiant;
    private $_prenomEtudiant;
    private $_mailfacEtudiant;
    private $_mailstableEtudiant;
    private $_miageEtudiant;
    private $_mailstageEtudiant;
    private $_sexeEtudiant;
    private $_promoEtudiant;
    private $_telstageEtudiant;
    private $_loginEtudiant;
    private $_passwordEtudiant;
    private $_adressestageEtudiant;
    private $_cpstageEtudiant;
    private $_villestageEtudiant;
    private $_adressefacEtudiant;
    private $_cpfacEtudiant;
    private $_villefacEtudiant;
    private $_adressestableEtudiant;
    private $_cpstableEtudiant;
    private $_villestableEtudiant;
    private $_dateDerniereConnexion;
    private $_dateDerniereRecuperationPass;

    private static $MAILPASS_TEMPLATE = "/mailTemplates/mailPassEtd";
    private static $MAILPASSADMIN_TEMPLATE = "/mailTemplates/mailPassAdminEtd";

	/**
	* @abstract Constructeur avec parametre
	* @param int Identifiant de l'étudiant
	* @param String Nom de l'étudiant
	* @param String Prénom de l'étudiant
	* @param String Adresse mail de la fac
	* @param String Adresse mail personelle de l'étudiant
	* @param Enum Niveau de l'étudiant. Prend l'une des valeurs définie dans les variables statiques définies dans cette classe.
	* @param String Adresse mail de l'étudiant en période de stage
	* @param Enum Sexe de l'étudiant. Prend les valeurs 'H' ou 'F'.
	* @param int Année de promo de l'étudiant
	* @param String Téléphone de l'étudiant en période de stage.
	* @param String Login de l'étudiant sur le site des stages (et de la miage)
	* @param int Mot de passe de l'étudiant sur le site des stages ( et de la miage).
	* @param String Adresse de l'étudiant en période de stage.
	* @param int Code postal de l'étudiant en période de stage.
	* @param String Ville de l'étudiant en période de stage.
	* @param String Adresse de l'étudiant lorsqu'il est à la fac.
	* @param int Code postal de l'étudiant lorsqu'il est à la fac.
	* @param String Ville de l'étudiant lorsqu'il est à la fac.
	* @param String Adresse personelle (stable) de l'étudiant.
	* @param int Code postal personel (stable) de l'étudiant.
	* @param String Ville personelle (stable) de l'étudiant.
	* @param DateTime Date et heure de la dernière connexion de l'étudiant sur le site des stages.
	* @param DateTime Date et heure de la dernière récupération de son mot de passe par l'étudiant.
	* @access private
	*/
    private  function __construct($idEtudiant, $nomEtudiant, $prenomEtudiant, $mailfacEtudiant, $mailstableEtudiant, $miageEtudiant, $mailstageEtudiant, $sexeEtudiant, $promoEtudiant, $telstageEtudiant, $loginEtudiant, $passwordEtudiant, $adressestageEtudiant, $cpstageEtudiant, $villestageEtudiant, $adressefacEtudiant, $cpfacEtudiant, $villefacEtudiant, $adressestableEtudiant, $cpstableEtudiant, $villestableEtudiant, $dateDerniereConnexion, $dateDerniereRecuperationPass){
        $this->_idEtudiant = $idEtudiant;
        $this->_nomEtudiant = $nomEtudiant;
        $this->_prenomEtudiant = $prenomEtudiant;
        $this->_mailfacEtudiant = $mailfacEtudiant;
        $this->_mailstableEtudiant = $mailstableEtudiant;
        $this->_miageEtudiant = $miageEtudiant;
        $this->_mailstageEtudiant = $mailstageEtudiant;
        $this->_sexeEtudiant = $sexeEtudiant;
        $this->_promoEtudiant = $promoEtudiant;
        $this->_telstageEtudiant = $telstageEtudiant;
        $this->_loginEtudiant = $loginEtudiant;
        $this->_passwordEtudiant = $passwordEtudiant;
        $this->_adressestageEtudiant = $adressestageEtudiant;
        $this->_cpstageEtudiant = $cpstageEtudiant;
        $this->_villestageEtudiant = $villestageEtudiant;
        $this->_adressefacEtudiant = $adressefacEtudiant;
        $this->_cpfacEtudiant = $cpfacEtudiant;
        $this->_villefacEtudiant = $villefacEtudiant;
        $this->_adressestableEtudiant = $adressestableEtudiant;
        $this->_cpstableEtudiant = $cpstableEtudiant;
        $this->_villestableEtudiant = $villestableEtudiant;
        $this->_dateDerniereConnexion = $dateDerniereConnexion;
        $this->_dateDerniereRecuperationPass = $dateDerniereRecuperationPass;
    }
    
	/**
	* @abstract liste des getters
	* @return Valeur de la variable privé correspondante
	* @access public
	*/
	public  function getIdEtudiant(){
        return $this->_idEtudiant;
    }
    public  function getNomEtudiant(){
        return $this->_nomEtudiant;
    }
    public  function getPrenomEtudiant(){
        return $this->_prenomEtudiant;
    }
    public  function getMailfacEtudiant(){
        return $this->_mailfacEtudiant;
    }
    public  function getMailstableEtudiant(){
        return $this->_mailstableEtudiant;
    }
    public  function getMiageEtudiant(){
        return $this->_miageEtudiant;
    }
    public  function getMailstageEtudiant(){
        return $this->_mailstageEtudiant;
    }
    public  function getSexeEtudiant(){
        return $this->_sexeEtudiant;
    }
    public  function getPromoEtudiant(){
        return $this->_promoEtudiant;
    }
    public  function getTelstageEtudiant(){
        return $this->_telstageEtudiant;
    }
    public  function getLoginEtudiant(){
        return $this->_loginEtudiant;
    }
    public  function getPasswordEtudiant(){
        return $this->_passwordEtudiant;
    }
    public  function getAdressestageEtudiant(){
        return $this->_adressestageEtudiant;
    }
    public  function getCpstageEtudiant(){
        return $this->_cpstageEtudiant;
    }
    public  function getVillestageEtudiant(){
        return $this->_villestageEtudiant;
    }
    public  function getAdressefacEtudiant(){
        return $this->_adressefacEtudiant;
    }
    public  function getCpfacEtudiant(){
        return $this->_cpfacEtudiant;
    }
    public  function getVillefacEtudiant(){
        return $this->_villefacEtudiant;
    }
    public  function getAdressestableEtudiant(){
        return $this->_adressestableEtudiant;
    }
    public  function getCpstableEtudiant(){
        return $this->_cpstableEtudiant;
    }
    public  function getVillestableEtudiant(){
        return $this->_villestableEtudiant;
    }
    public  function getDateDerniereConnexion(){
        return $this->_dateDerniereConnexion;
    }
    public  function getDateDerniereRecuperationPass(){
        return $this->_dateDerniereRecuperationPass;
    }
    
	
	
	/**
	* @abstract Méthode statique. Vérifie que la table 'etudiant' existe
	* @return Bool TRUE si la table existe, FALSE sinon.
	* @access public
	*/
	public static function tableExists(){
        return DBConnector::getDBConnector()->tableExists(DBEtudiant::$TABLE_NAME);
    }
    
	
	/**
	* @abstract Méthode statique. Permet de créer la table 'etudiant'
	* @access public
	*/
	public static function createTable(){
        $sql = "CREATE TABLE `".DBEtudiant::$TABLE_NAME."` (  
                            `".DBEtudiant::$FIELD_ID_ETUDIANT."` INT(11) NOT NULL  auto_increment,  
                            `".DBEtudiant::$FIELD_NOM_ETUDIANT."` VARCHAR(255) NOT NULL  ,  
                            `".DBEtudiant::$FIELD_PRENOM_ETUDIANT."` VARCHAR(255) NOT NULL  ,  
                            `".DBEtudiant::$FIELD_MAILFAC_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_MAILSTABLE_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_MIAGE_ETUDIANT."` ENUM('"
                                                .DBEtudiant::$ENUM_MIAGE_L3."','"
                                                .DBEtudiant::$ENUM_MIAGE_M1."','"
                                                .DBEtudiant::$ENUM_MIAGE_M2."') NOT NULL  ,  
                            `".DBEtudiant::$FIELD_MAILSTAGE_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_SEXE_ETUDIANT."` ENUM('H','F') NOT NULL  ,  
                            `".DBEtudiant::$FIELD_PROMO_ETUDIANT."` INT(11) NOT NULL  ,  
                            `".DBEtudiant::$FIELD_TELSTAGE_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_LOGIN_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_PASSWORD_ETUDIANT."` BIGINT NULL default '0' ,  
                            `".DBEtudiant::$FIELD_ADRESSESTAGE_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_CPSTAGE_ETUDIANT."` INT(11) NULL default '00000' ,  
                            `".DBEtudiant::$FIELD_VILLESTAGE_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_ADRESSEFAC_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_CPFAC_ETUDIANT."` INT(11) NULL default '00000' ,  
                            `".DBEtudiant::$FIELD_VILLEFAC_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_ADRESSESTABLE_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_CPSTABLE_ETUDIANT."` INT(11) NULL default '00000' ,  
                            `".DBEtudiant::$FIELD_VILLESTABLE_ETUDIANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEtudiant::$FIELD_DATE_DERNIERE_CONNEXION."` DATETIME NULL  ,  
                            `".DBEtudiant::$FIELD_DATE_DERNIERE_RECUPERATION_PASS."` DATETIME NULL  ,
                            PRIMARY KEY (`".DBEtudiant::$FIELD_ID_ETUDIANT."`)
                ) ENGINE=MyISAM;";
        
        
        foreach(explode(";", $sql) as $query)
        {
            if($query != "")
                DBConnector::getDBConnector()->executeQuery($query);
        }
    }
    
	
	/**
	* @abstract Insère dans la base de données une nouvelle proposition de stage
	* @param int Identifiant de l'étudiant
	* @param String Nom de l'étudiant
	* @param String Prénom de l'étudiant
	* @param String Adresse mail de la fac
	* @param String Adresse mail personelle de l'étudiant
	* @param Enum Niveau de l'étudiant. Prend l'une des valeurs définie dans les variables statiques définies dans cette classe.
	* @param String Adresse mail de l'étudiant en période de stage
	* @param Enum Sexe de l'étudiant. Prend les valeurs 'H' ou 'F'.
	* @param int Année de promo de l'étudiant
	* @param String Téléphone de l'étudiant en période de stage.
	* @param String Login de l'étudiant sur le site des stages (et de la miage)
	* @param int Mot de passe de l'étudiant sur le site des stages ( et de la miage).
	* @param String Adresse de l'étudiant en période de stage.
	* @param int Code postal de l'étudiant en période de stage.
	* @param String Ville de l'étudiant en période de stage.
	* @param String Adresse de l'étudiant lorsqu'il est à la fac.
	* @param int Code postal de l'étudiant lorsqu'il est à la fac.
	* @param String Ville de l'étudiant lorsqu'il est à la fac.
	* @param String Adresse personelle (stable) de l'étudiant.
	* @param int Code postal personel (stable) de l'étudiant.
	* @param String Ville personelle (stable) de l'étudiant.
	* @param DateTime Date et heure de la dernière connexion de l'étudiant sur le site des stages.
	* @param DateTime Date et heure de la dernière récupération de son mot de passe par l'étudiant.
	* @return DBEtudiant Objet contenant les informations de l'étudiant que l'on vient d'inserer
	* @access public
	*/
	public static function createRecord($nomEtudiant, $prenomEtudiant, $mailfacEtudiant, $mailstableEtudiant, $miageEtudiant, $mailstageEtudiant, $sexeEtudiant, $promoEtudiant, $telstageEtudiant, $loginEtudiant, $passwordEtudiant, $adressestageEtudiant, $cpstageEtudiant, $villestageEtudiant, $adressefacEtudiant, $cpfacEtudiant, $villefacEtudiant, $adressestableEtudiant, $cpstableEtudiant, $villestableEtudiant, $dateDerniereConnexion, $dateDerniereRecuperationPass){
        $sql = "INSERT INTO ".DBEtudiant::$TABLE_NAME." ("
                            .DBEtudiant::$FIELD_NOM_ETUDIANT.", "
                            .DBEtudiant::$FIELD_PRENOM_ETUDIANT.", "
                            .DBEtudiant::$FIELD_MAILFAC_ETUDIANT.", "
                            .DBEtudiant::$FIELD_MAILSTABLE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_MIAGE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_MAILSTAGE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_SEXE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_PROMO_ETUDIANT.", "
                            .DBEtudiant::$FIELD_TELSTAGE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_LOGIN_ETUDIANT.", "
                            .DBEtudiant::$FIELD_PASSWORD_ETUDIANT.", "
                            .DBEtudiant::$FIELD_ADRESSESTAGE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_CPSTAGE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_VILLESTAGE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_ADRESSEFAC_ETUDIANT.", "
                            .DBEtudiant::$FIELD_CPFAC_ETUDIANT.", "
                            .DBEtudiant::$FIELD_VILLEFAC_ETUDIANT.", "
                            .DBEtudiant::$FIELD_ADRESSESTABLE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_CPSTABLE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_VILLESTABLE_ETUDIANT.", "
                            .DBEtudiant::$FIELD_DATE_DERNIERE_CONNEXION.", "
                            .DBEtudiant::$FIELD_DATE_DERNIERE_RECUPERATION_PASS." "
                            .") VALUES ("
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomEtudiant)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($prenomEtudiant)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailfacEtudiant)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailstableEtudiant)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($miageEtudiant)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailstageEtudiant)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($sexeEtudiant)).", "
                            .DBConnector::getDBConnector()->processInt($promoEtudiant).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($telstageEtudiant)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($loginEtudiant)).", "
                            .DBConnector::getDBConnector()->processObject($passwordEtudiant).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($adressestageEtudiant)).", "
                            .DBConnector::getDBConnector()->processObject($cpstageEtudiant).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villestageEtudiant)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($adressefacEtudiant)).", "
                            .DBConnector::getDBConnector()->processObject($cpfacEtudiant).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villefacEtudiant)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($adressestableEtudiant)).", "
                            .DBConnector::getDBConnector()->processObject($cpstableEtudiant).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villestableEtudiant)).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateDerniereConnexion).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateDerniereRecuperationPass)." "
                            .")";
        
        $id = DBConnector::getDBConnector()->executeQuery($sql);
        
        $obj = DBEtudiant::getRecords($id);
        assert(count($obj) == 1);
        return $obj[0];
    }
    
	
	/**
	* @abstract Méthode statique. Construit une requête de sélection à partir des paramètres, l'exécute, puis retourne un tableau contenant les objets DBEtudiant correspondants. L'ensemble des paramètres peuvent etre absent, dans ce cas l'ensemble de la table est retourné.
	* @param int Identifiant de l'étudiant
	* @param String Nom de l'étudiant
	* @param String Prénom de l'étudiant
	* @param String Adresse mail de la fac
	* @param String Adresse mail personelle de l'étudiant
	* @param Enum Niveau de l'étudiant. Prend l'une des valeurs définie dans les variables statiques définies dans cette classe.
	* @param String Adresse mail de l'étudiant en période de stage
	* @param Enum Sexe de l'étudiant. Prend les valeurs 'H' ou 'F'.
	* @param int Année de promo de l'étudiant
	* @param String Téléphone de l'étudiant en période de stage.
	* @param String Login de l'étudiant sur le site des stages (et de la miage)
	* @param int Mot de passe de l'étudiant sur le site des stages ( et de la miage).
	* @param String Adresse de l'étudiant en période de stage.
	* @param int Code postal de l'étudiant en période de stage.
	* @param String Ville de l'étudiant en période de stage.
	* @param String Adresse de l'étudiant lorsqu'il est à la fac.
	* @param int Code postal de l'étudiant lorsqu'il est à la fac.
	* @param String Ville de l'étudiant lorsqu'il est à la fac.
	* @param String Adresse personelle (stable) de l'étudiant.
	* @param int Code postal personel (stable) de l'étudiant.
	* @param String Ville personelle (stable) de l'étudiant.
	* @param DateTime Date et heure de la dernière connexion de l'étudiant sur le site des stages.
	* @param DateTime Date et heure de la dernière récupération de son mot de passe par l'étudiant.
	* @return Array Tableau contenant les objets de type DBEtudiant correspondant aux ligne de la base de données que l'on vient de récupérer
	* @access public
	*/
	public static function getRecords($idEtudiant="", $nomEtudiant="", $prenomEtudiant="", $mailfacEtudiant="", $mailstableEtudiant="", $miageEtudiant="", $mailstageEtudiant="", $sexeEtudiant="", $promoEtudiant="", $telstageEtudiant="", $loginEtudiant="", $passwordEtudiant="", $adressestageEtudiant="", $cpstageEtudiant="", $villestageEtudiant="", $adressefacEtudiant="", $cpfacEtudiant="", $villefacEtudiant="", $adressestableEtudiant="", $cpstableEtudiant="", $villestableEtudiant="", $dateDerniereConnexion="", $dateDerniereRecuperationPass=""){
        $sql = "SELECT * FROM ".DBEtudiant::$TABLE_NAME." WHERE 1";
        
        if($idEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_ID_ETUDIANT."=".DBConnector::getDBConnector()->processInt($idEtudiant);
        if($nomEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_NOM_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomEtudiant));
        if($prenomEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_PRENOM_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($prenomEtudiant));
        if($mailfacEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_MAILFAC_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailfacEtudiant));
        if($mailstableEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_MAILSTABLE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailstableEtudiant));
        if($miageEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_MIAGE_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($miageEtudiant));
        if($mailstageEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_MAILSTAGE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailstageEtudiant));
        if($sexeEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_SEXE_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($sexeEtudiant));
        if($promoEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_PROMO_ETUDIANT."=".DBConnector::getDBConnector()->processInt($promoEtudiant);
        if($telstageEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_TELSTAGE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($telstageEtudiant));
        if($loginEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_LOGIN_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($loginEtudiant));
        if($passwordEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_PASSWORD_ETUDIANT."=".DBConnector::getDBConnector()->processObject($passwordEtudiant);
        if($adressestageEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_ADRESSESTAGE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($adressestageEtudiant));
        if($cpstageEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_CPSTAGE_ETUDIANT."=".DBConnector::getDBConnector()->processObject($cpstageEtudiant);
        if($villestageEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_VILLESTAGE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villestageEtudiant));
        if($adressefacEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_ADRESSEFAC_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($adressefacEtudiant));
        if($cpfacEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_CPFAC_ETUDIANT."=".DBConnector::getDBConnector()->processObject($cpfacEtudiant);
        if($villefacEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_VILLEFAC_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villefacEtudiant));
        if($adressestableEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_ADRESSESTABLE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($adressestableEtudiant));
        if($cpstableEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_CPSTABLE_ETUDIANT."=".DBConnector::getDBConnector()->processObject($cpstableEtudiant);
        if($villestableEtudiant != "")
            $sql .= " AND ".DBEtudiant::$FIELD_VILLESTABLE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villestableEtudiant));
        if($dateDerniereConnexion != "")
            $sql .= " AND ".DBEtudiant::$FIELD_DATE_DERNIERE_CONNEXION."=".DBConnector::getDBConnector()->computeDateTime($dateDerniereConnexion);
        if($dateDerniereRecuperationPass != "")
            $sql .= " AND ".DBEtudiant::$FIELD_DATE_DERNIERE_RECUPERATION_PASS."=".DBConnector::getDBConnector()->computeDateTime($dateDerniereRecuperationPass);
        
        $res = DBConnector::getDBConnector()->executeQuery($sql);
        
        $return = array();
        $i=0;
        while($result = DBConnector::getDBConnector()->fetchArray($res)) {
            $return[$i] = new DBEtudiant(
                                            $result[DBEtudiant::$FIELD_ID_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_NOM_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_PRENOM_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_MAILFAC_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_MAILSTABLE_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_MIAGE_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_MAILSTAGE_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_SEXE_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_PROMO_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_TELSTAGE_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_LOGIN_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_PASSWORD_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_ADRESSESTAGE_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_CPSTAGE_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_VILLESTAGE_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_ADRESSEFAC_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_CPFAC_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_VILLEFAC_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_ADRESSESTABLE_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_CPSTABLE_ETUDIANT],
                                            $result[DBEtudiant::$FIELD_VILLESTABLE_ETUDIANT],
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBEtudiant::$FIELD_DATE_DERNIERE_CONNEXION]),
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBEtudiant::$FIELD_DATE_DERNIERE_RECUPERATION_PASS])
                                        );
            
            $i++;
        }
        
        return $return;
    }
    
	/**
	* @abstract Construit une requête d'update à partir des paramètres, l'exécute, puis affecte les informations passé en paramètre dans l'objet DBEtudiant courant. La clause where de la requete est automatiquement construite avec l'identifiant de la proposition de stage stocké dans l'Objet courant.
	* @param int Identifiant de l'étudiant
	* @param String Nom de l'étudiant
	* @param String Prénom de l'étudiant
	* @param String Adresse mail de la fac
	* @param String Adresse mail personelle de l'étudiant
	* @param Enum Niveau de l'étudiant. Prend l'une des valeurs définie dans les variables statiques définies dans cette classe.
	* @param String Adresse mail de l'étudiant en période de stage
	* @param Enum Sexe de l'étudiant. Prend les valeurs 'H' ou 'F'.
	* @param int Année de promo de l'étudiant
	* @param String Téléphone de l'étudiant en période de stage.
	* @param String Login de l'étudiant sur le site des stages (et de la miage)
	* @param int Mot de passe de l'étudiant sur le site des stages ( et de la miage).
	* @param String Adresse de l'étudiant en période de stage.
	* @param int Code postal de l'étudiant en période de stage.
	* @param String Ville de l'étudiant en période de stage.
	* @param String Adresse de l'étudiant lorsqu'il est à la fac.
	* @param int Code postal de l'étudiant lorsqu'il est à la fac.
	* @param String Ville de l'étudiant lorsqu'il est à la fac.
	* @param String Adresse personelle (stable) de l'étudiant.
	* @param int Code postal personel (stable) de l'étudiant.
	* @param String Ville personelle (stable) de l'étudiant.
	* @param DateTime Date et heure de la dernière connexion de l'étudiant sur le site des stages.
	* @param DateTime Date et heure de la dernière récupération de son mot de passe par l'étudiant.
	* @access public
	*/
	public  function updateRecord($nomEtudiant, $prenomEtudiant, $mailfacEtudiant, $mailstableEtudiant, $miageEtudiant, $mailstageEtudiant, $sexeEtudiant, $promoEtudiant, $telstageEtudiant, $loginEtudiant, $passwordEtudiant, $adressestageEtudiant, $cpstageEtudiant, $villestageEtudiant, $adressefacEtudiant, $cpfacEtudiant, $villefacEtudiant, $adressestableEtudiant, $cpstableEtudiant, $villestableEtudiant, $dateDerniereConnexion, $dateDerniereRecuperationPass){
        $sql = "UPDATE ".DBEtudiant::$TABLE_NAME." SET ";
        $sql .= DBEtudiant::$FIELD_NOM_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_PRENOM_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($prenomEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_MAILFAC_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailfacEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_MAILSTABLE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailstableEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_MIAGE_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($miageEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_MAILSTAGE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailstageEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_SEXE_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($sexeEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_PROMO_ETUDIANT."=".DBConnector::getDBConnector()->processInt($promoEtudiant).",";
        $sql .= DBEtudiant::$FIELD_TELSTAGE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($telstageEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_LOGIN_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($loginEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_PASSWORD_ETUDIANT."=".DBConnector::getDBConnector()->processObject($passwordEtudiant).",";
        $sql .= DBEtudiant::$FIELD_ADRESSESTAGE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($adressestageEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_CPSTAGE_ETUDIANT."=".DBConnector::getDBConnector()->processObject($cpstageEtudiant).",";
        $sql .= DBEtudiant::$FIELD_VILLESTAGE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villestageEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_ADRESSEFAC_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($adressefacEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_CPFAC_ETUDIANT."=".DBConnector::getDBConnector()->processObject($cpfacEtudiant).",";
        $sql .= DBEtudiant::$FIELD_VILLEFAC_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villefacEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_ADRESSESTABLE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($adressestableEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_CPSTABLE_ETUDIANT."=".DBConnector::getDBConnector()->processObject($cpstableEtudiant).",";
        $sql .= DBEtudiant::$FIELD_VILLESTABLE_ETUDIANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villestableEtudiant)).",";
        $sql .= DBEtudiant::$FIELD_DATE_DERNIERE_CONNEXION."=".DBConnector::getDBConnector()->computeDateTime($dateDerniereConnexion).",";
        $sql .= DBEtudiant::$FIELD_DATE_DERNIERE_RECUPERATION_PASS."=".DBConnector::getDBConnector()->computeDateTime($dateDerniereRecuperationPass)."";
        
        $sql .= " WHERE 1";
        $sql .= " AND ".DBEtudiant::$FIELD_ID_ETUDIANT."=".DBConnector::getDBConnector()->processInt($this->_idEtudiant);
        
        DBConnector::getDBConnector()->executeQuery($sql);
        
        $this->_nomEtudiant = DBConnector::getDBConnector()->echapString($nomEtudiant);
        $this->_prenomEtudiant = DBConnector::getDBConnector()->echapString($prenomEtudiant);
        $this->_mailfacEtudiant = DBConnector::getDBConnector()->echapString($mailfacEtudiant);
        $this->_mailstableEtudiant = DBConnector::getDBConnector()->echapString($mailstableEtudiant);
        $this->_miageEtudiant = DBConnector::getDBConnector()->echapString($miageEtudiant);
        $this->_mailstageEtudiant = DBConnector::getDBConnector()->echapString($mailstageEtudiant);
        $this->_sexeEtudiant = DBConnector::getDBConnector()->echapString($sexeEtudiant);
        $this->_promoEtudiant = $promoEtudiant;
        $this->_telstageEtudiant = DBConnector::getDBConnector()->echapString($telstageEtudiant);
        $this->_loginEtudiant = DBConnector::getDBConnector()->echapString($loginEtudiant);
        $this->_passwordEtudiant = $passwordEtudiant;
        $this->_adressestageEtudiant = DBConnector::getDBConnector()->echapString($adressestageEtudiant);
        $this->_cpstageEtudiant = $cpstageEtudiant;
        $this->_villestageEtudiant = DBConnector::getDBConnector()->echapString($villestageEtudiant);
        $this->_adressefacEtudiant = DBConnector::getDBConnector()->echapString($adressefacEtudiant);
        $this->_cpfacEtudiant = $cpfacEtudiant;
        $this->_villefacEtudiant = DBConnector::getDBConnector()->echapString($villefacEtudiant);
        $this->_adressestableEtudiant = DBConnector::getDBConnector()->echapString($adressestableEtudiant);
        $this->_cpstableEtudiant = $cpstableEtudiant;
        $this->_villestableEtudiant = DBConnector::getDBConnector()->echapString($villestableEtudiant);
        $this->_dateDerniereConnexion = $dateDerniereConnexion;
        $this->_dateDerniereRecuperationPass = $dateDerniereRecuperationPass;
    }
    
	
	/**
	* @abstract Construit une requête de suppression et l'exécute. La clause where de la requete est automatiquement construite avec l'identifiant de l'étudiant stocké dans l'Objet courant.
	* @access public
	*/
	public  function deleteRecord(){
        $sql = "DELETE FROM ".DBEtudiant::$TABLE_NAME." WHERE 1";
        $sql .= " AND ".DBEtudiant::$FIELD_ID_ETUDIANT."=".DBConnector::getDBConnector()->processInt($this->_idEtudiant);
        
        DBConnector::getDBConnector()->executeQuery($sql);
    }
    
	
	/**
	* @abstract Méthode statique. Permet d'authentifier l'étudiant à partir du login et du mot de passe passé en parametre.
	* @param String Login de l'étudiant à tester
	* @param String Mot de passe de l'étudiant à tester
	* @return DBEtudiant Objet contenant les informations de l'étudiant que l'on vient d'authentifier, FALSE sinon.
	* @access public 
	*/
	public static function authEtudiant($login,$mdp){
    	$etudiants = DBEtudiant::getRecords("", "", "", "", "", "", "", "", "", "", $login, $mdp);
    	if (count($etudiants)==1)
    		return $etudiants[0];
    	else return NULL;
    } 
    
	
	
	/**
	* @abstract Méthode permettant d'envoyer le mot de passe de l'étudiant à tous ses mails. Note: on vérifie toutefois qu'on ait pas envoyé "trop récemment" un mail a l'étudiant. La méthode renvoie l'erreur survenue (si une erreur survient) ou "" sinon.
	* @param Bool TRUE si un mail doit etre envoyé aux administrateurs si aucun mail n'est trouvé pour l'étudiant, FALSE sinon. TRUE par défaut.
	* @return String Message d'erreur en cas d'échec de l'envoi du mot de passe, NULL sinon.
	* @access public
	*/
    public function sendPass($sendMailToAdminIfNoMailFound=true){
    	//$msg = "Mail Fac Etudiant : " . $this->_mailfacEtudiant . "<br />" ;
		//$msg .= "Mail stable Etudiant : " . $this->_mailstableEtudiant . "<br />" ;
		//$msg .= "Mail stage Etudiant : " . $this->_mailstageEtudiant . "<br />" ;
    
        // On vérifie d'abord si le dernier mail n'a pas été envoyé trop récemment
        if(($this->_dateDerniereRecuperationPass != null) && (time() - formattedDateTimeToTime($this->_dateDerniereRecuperationPass) < DBConfig::getConfigValue("LIMITE SECONDES ENVOI MAIL")))
            return "Erreur : cela fait trop peu de temps que vous avez demandé votre mot de passe !";
        else{

            // On regarde s'il existe au moins une adresse valable... Si ce n'est pas le cas, on mail le responsable des stages pour lui communiquer la demande de mail
            // et on demandera à l'utilisateur de mailer le maitre de stage
            if(($this->_mailfacEtudiant == "") && ($this->_mailstableEtudiant == "") && ($this->_mailstageEtudiant == "") && $sendMailToAdminIfNoMailFound){ 
				//echo "je suis dans le if <br />" ;
		// envoi mail administracteur DESACTIVE
		/*
    		$m = new Mailer(DBEtudiant::$MAILPASSADMIN_TEMPLATE);
                $m->fillTemplateVar("nom_etudiant", $this->_nomEtudiant);
                $m->fillTemplateVar("prenom_etudiant", $this->_prenomEtudiant);
                $m->fillTemplateVar("mot_de_passe", $this->_passwordEtudiant);
                $m->fillTemplateVar("login_etudiant", $this->_loginEtudiant);
                
                if(!$m->sendMail(DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages : Mot de passe de ".$this->_nomEtudiant." ".$this->_prenomEtudiant))
                    return "Erreur lors de l'envoi de mail à l'administrateur !";
                else
                    return "Aucune adresse n'est disponible dans la base vous concernant. L'administrateur du site a été notifié de votre demande de mot de passe. Vous pouvez le contacter pour récupérer votre mot de passe.";*/
				return "Aucune adresse n'est disponible dans la base vous concernant. Veuillez contacter le responsable des stages ou votre responsable d'année pour lui demander votre mot de passe.";
            }
            // S'il existe au moins un mail valide, on envoie le mail
            else if(($this->_mailfacEtudiant != "") || ($this->_mailstableEtudiant != "") || ($this->_mailstageEtudiant != "")){
				//echo "je suis dans le else if <br />" ;
                $m = new Mailer(DBEtudiant::$MAILPASS_TEMPLATE);
                $m->fillTemplateVar("nom_etudiant", $this->_nomEtudiant);
                $m->fillTemplateVar("prenom_etudiant", $this->_prenomEtudiant);
                $m->fillTemplateVar("mot_de_passe", $this->_passwordEtudiant);
                $m->fillTemplateVar("login_etudiant", $this->_loginEtudiant);
                
                $ok = true;
                if($this->_mailfacEtudiant != "")
                    $ok = ($ok && $m->sendMail($this->_mailfacEtudiant, "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages : Récupération de mot de passe"));
                if($this->_mailstableEtudiant != "")
                    $ok = ($ok && $m->sendMail($this->_mailstableEtudiant, "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages : Récupération de mot de passe"));
                if($this->_mailstageEtudiant != "")
                    $ok = ($ok && $m->sendMail($this->_mailstageEtudiant, "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages : Récupération de mot de passe"));

                // Mise a jour de la date de dernier envoi
                $this->_dateDerniereRecuperationPass = timeToFormattedDateTime(time());
                $this->updateRecord($this->_nomEtudiant, $this->_prenomEtudiant, $this->_mailfacEtudiant, $this->_mailstableEtudiant, $this->_miageEtudiant, $this->_mailstageEtudiant, $this->_sexeEtudiant, $this->_promoEtudiant, $this->_telstageEtudiant, $this->_loginEtudiant, $this->_passwordEtudiant, $this->_adressestageEtudiant, $this->_cpstageEtudiant, $this->_villestageEtudiant, $this->_adressefacEtudiant, $this->_cpfacEtudiant, $this->_villefacEtudiant, $this->_adressestableEtudiant, $this->_cpstableEtudiant, $this->_villestableEtudiant, $this->_dateDerniereConnexion, $this->_dateDerniereRecuperationPass);

                if(!$ok)
                    return "Erreur lors de l'envoi d'au moins un stage !";
                
                return "";
            }
            
            //return $msg . "Aucune adresse n'est disponible dans la base vous concernant.";
			return "Aucune adresse n'est disponible dans la base vous concernant." ;
        }
    }
    
    /**
	* @abstract Modifie les données de l'étudiant à partir des attributs de l'objet courant. Cette méthode utilise la méthode 'updateRecord' et lui passe en paramètre les attributs de l'objet courant.
	* @access public
	*/
    public function updateFicheAvecAttr(){
	      $this->updateRecord(
		       $this->_nomEtudiant,
	           $this->_prenomEtudiant, 
	           $this->_mailfacEtudiant, 
	           $this->_mailstableEtudiant, 
	           $this->_miageEtudiant, 
	           $this->_mailstageEtudiant, 
	           $this->_sexeEtudiant, 
	           $this->_promoEtudiant, 
	           $this->_telstageEtudiant, 
	           $this->_loginEtudiant, 
	           $this->_passwordEtudiant, 
	           $this->_adressestageEtudiant, 
	           $this->_cpstageEtudiant, 
	           $this->_villestageEtudiant, 
	           $this->_adressefacEtudiant, 
	           $this->_cpfacEtudiant, 
	           $this->_villefacEtudiant, 
	           $this->_adressestableEtudiant, 
	           $this->_cpstableEtudiant, 
	           $this->_villestableEtudiant, 
	           $this->_dateDerniereConnexion, 
	           $this->_dateDerniereRecuperationPass
           );
     }
     
    /**
	* @abstract Affecte à l'objet la date et l'heure de la dernière connexion de l'étudiant et l'enregistre dans la base de données.
	* @access public
	*/	
    public function setDateDerniereConnexion() {
        $this->_dateDerniereConnexion = date("d/m/Y H:i:s");
        $this->updateFicheAvecAttr();
     }
}
?>

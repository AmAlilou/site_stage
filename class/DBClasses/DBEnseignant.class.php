<?php
set_include_path(".".PATH_SEPARATOR."..".PATH_SEPARATOR."../..");
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=7&pgc_url=&nom_table=enseignant&nom_champ_1=id_enseignant&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=nom_enseignant&type_champ_2=1&taille_champ_2=255&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=prenom_enseignant&type_champ_3=1&taille_champ_3=255&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=mail_enseignant&type_champ_4=1&taille_champ_4=255&champ_facultatif_4=on&valeur_defaut_4=NULL&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=login_enseignant&type_champ_5=1&taille_champ_5=255&champ_facultatif_5=on&valeur_defaut_5=NULL&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=password_enseignant&type_champ_6=4&taille_champ_6=&champ_facultatif_6=on&valeur_defaut_6=0&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=date_derniere_recuperation_pass&type_champ_7=10&taille_champ_7=&champ_facultatif_7=on&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&


/**
* @package DBClasses
* @abstract Classe correspondant à la table 'enseignant' de la base de données. Elle contient également un ensemble de méthodes permettant la gestion de cette table.
*/
class DBEnseignant  implements ISelectable   {
    
	/**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "statut_enseignant". Chaine stockée pour l'état actif dans le tutorat des stages : "actif"
	*/
	public static $STATUT_ENSEIGNANT_ACTIF = 'actif' ;
	/**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "statut_enseignant". Chaine stockée pour l'état non actif dans le tutorat des stages : "passif"
	*/
	public static $STATUT_ENSEIGNANT_PASSIF = 'passif' ;
	
	
	private static $TABLE_NAME = "enseignant";
    private static $FIELD_ID_ENSEIGNANT = "id_enseignant";
    private static $FIELD_NOM_ENSEIGNANT = "nom_enseignant";
    private static $FIELD_PRENOM_ENSEIGNANT = "prenom_enseignant";
    private static $FIELD_MAIL_ENSEIGNANT = "mail_enseignant";
    private static $FIELD_LOGIN_ENSEIGNANT = "login_enseignant";
    private static $FIELD_PASSWORD_ENSEIGNANT = "password_enseignant";
    private static $FIELD_DATE_DERNIERE_RECUPERATION_PASS = "date_derniere_recuperation_pass";
    private static $FIELD_STATUT_ENSEIGNANT = "statut_enseignant";

    private $_idEnseignant;
    private $_nomEnseignant;
    private $_prenomEnseignant;
    private $_mailEnseignant;
    private $_loginEnseignant;
    private $_passwordEnseignant;
    private $_dateDerniereRecuperationPass;
    private $_statutEnseignant;

    private static $MAILPASS_TEMPLATE = "/mailTemplates/mailPassEns";
    private static $MAILPASSADMIN_TEMPLATE = "/mailTemplates/mailPassAdminEns";

	/**
	* @abstract Constructeur avec parametre
	* @param int Identifiant de l'enseignant
	* @param String Nom de l'enseignant
	* @param String Prénom de l'enseignant
	* @param String Mail de l'enseignant
	* @param String Login de l'enseignant
	* @param int Mot de passe de l'enseignant
	* @param DateTime Date et heure de la dernière récupération de son mot de passe par l'enseignant.
	* @param Enum Statut de l'enseignant. Actif si prend par au tutorat de stages, inactif sinon.
	* @access private
	*/
    private  function __construct($idEnseignant, $nomEnseignant, $prenomEnseignant, $mailEnseignant, $loginEnseignant, $passwordEnseignant, $dateDerniereRecuperationPass, $statutEnseignant){
        $this->_idEnseignant = $idEnseignant;
        $this->_nomEnseignant = $nomEnseignant;
        $this->_prenomEnseignant = $prenomEnseignant;
        $this->_mailEnseignant = $mailEnseignant;
        $this->_loginEnseignant = $loginEnseignant;
        $this->_passwordEnseignant = $passwordEnseignant;
        $this->_dateDerniereRecuperationPass = $dateDerniereRecuperationPass;
        $this->_statutEnseignant = $statutEnseignant;
    }
    
	
	/**
	* @abstract liste des getters
	* @return Valeur de la variable privé correspondante
	* @access public
	*/
	public  function getIdEnseignant(){
        return $this->_idEnseignant;
    }
    public  function getNomEnseignant(){
        return $this->_nomEnseignant;
    }
    public  function getPrenomEnseignant(){
        return $this->_prenomEnseignant;
    }
    public  function getMailEnseignant(){
        return $this->_mailEnseignant;
    }
    public  function getLoginEnseignant(){
        return $this->_loginEnseignant;
    }
    public  function getPasswordEnseignant(){
        return $this->_passwordEnseignant;
    }
    public  function getDateDerniereRecuperationPass(){
        return $this->_dateDerniereRecuperationPass;
    }
	public function getStatutEnseignant() {
		return $this->_statutEnseignant ;
	}
    
	
	/**
	* @abstract Méthode statique. Vérifie que la table 'enseignant' existe
	* @return Bool TRUE si la table existe, FALSE sinon.
	* @access public
	*/
	public static function tableExists(){
        return DBConnector::getDBConnector()->tableExists(DBEnseignant::$TABLE_NAME);
    }
    
	
	/**
	* @abstract Méthode statique. Permet de créer la table 'enseignant'
	* @access public
	*/
	public static function createTable(){
        $sql = "CREATE TABLE `".DBEnseignant::$TABLE_NAME."` (  
                            `".DBEnseignant::$FIELD_ID_ENSEIGNANT."` INT(11) NOT NULL  auto_increment,  
                            `".DBEnseignant::$FIELD_NOM_ENSEIGNANT."` VARCHAR(255) NOT NULL  ,  
                            `".DBEnseignant::$FIELD_PRENOM_ENSEIGNANT."` VARCHAR(255) NOT NULL  ,  
                            `".DBEnseignant::$FIELD_MAIL_ENSEIGNANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEnseignant::$FIELD_LOGIN_ENSEIGNANT."` VARCHAR(255) NULL default 'NULL' ,  
                            `".DBEnseignant::$FIELD_PASSWORD_ENSEIGNANT."` BIGINT NULL default '0' ,  
                            `".DBEnseignant::$FIELD_DATE_DERNIERE_RECUPERATION_PASS."` DATETIME NULL  ,
							'".DBEnseignant::$FIELD_STATUT_ENSEIGNANT."`  ENUM('"
												.DBEnseignant::$STATUT_ENSEIGNANT_ACTIF."','"
												.DBEnseignant::$STATUT_ENSEIGNANT_PASSIF."') NOT NULL default 'actif',
                            PRIMARY KEY (`".DBEnseignant::$FIELD_ID_ENSEIGNANT."`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
        
        
        foreach(explode(";", $sql) as $query)
        {
            if($query != "")
                DBConnector::getDBConnector()->executeQuery($query);
        }
    }
    
	
	/**
	* @abstract Insère dans la base de données une nouvelle proposition de stage
	* @param String Nom de l'enseignant
	* @param String Prénom de l'enseignant
	* @param String Mail de l'enseignant
	* @param String Login de l'enseignant
	* @param int Mot de passe de l'enseignant
	* @param DateTime Date et heure de la dernière récupération de son mot de passe par l'enseignant.
	* @param Enum Statut de l'enseignant. Actif si prend par au tutorat de stages, inactif sinon.
	* @return DBEnseignant Objet contenant les informations de l'enseignant que l'on vient d'inserer
	* @access public
	*/
	public static function createRecord($nomEnseignant, $prenomEnseignant, $mailEnseignant, $loginEnseignant, $passwordEnseignant, $dateDerniereRecuperationPass, $statutEnseignant){
        $sql = "INSERT INTO ".DBEnseignant::$TABLE_NAME." ("
                            .DBEnseignant::$FIELD_NOM_ENSEIGNANT.", "
                            .DBEnseignant::$FIELD_PRENOM_ENSEIGNANT.", "
                            .DBEnseignant::$FIELD_MAIL_ENSEIGNANT.", "
                            .DBEnseignant::$FIELD_LOGIN_ENSEIGNANT.", "
                            .DBEnseignant::$FIELD_PASSWORD_ENSEIGNANT.", "
                            .DBEnseignant::$FIELD_DATE_DERNIERE_RECUPERATION_PASS.", "
                            .DBEnseignant::$FIELD_STATUT_ENSEIGNANT." "
                            .") VALUES ("
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomEnseignant)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($prenomEnseignant)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailEnseignant)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($loginEnseignant)).", "
                            .DBConnector::getDBConnector()->processObject($passwordEnseignant).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateDerniereRecuperationPass).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($statutEnseignant))." "
                            .")";
        
        $id = DBConnector::getDBConnector()->executeQuery($sql);
        
        $obj = DBEnseignant::getRecords($id);
        assert(count($obj) == 1);
        return $obj[0];
    }
    
	
	/**
	* @abstract Méthode statique. Construit une requête de sélection à partir des paramètres, l'exécute, puis retourne un tableau contenant les objets DBEntreprise correspondants. L'ensemble des paramètres peuvent etre absent, dans ce cas l'ensemble de la table est retourné.
	* @param int Identifiant de l'enseignant
	* @param String Nom de l'enseignant
	* @param String Prénom de l'enseignant
	* @param String Mail de l'enseignant
	* @param String Login de l'enseignant
	* @param int Mot de passe de l'enseignant
	* @param DateTime Date et heure de la dernière récupération de son mot de passe par l'enseignant.
	* @param Enum Statut de l'enseignant. Actif si prend par au tutorat de stages, inactif sinon.
	* @return Array Tableau contenant les objets de type DBEnseignant correspondant aux ligne de la base de données que l'on vient de récupérer
	* @access public
	*/
	public static function getRecords($idEnseignant="", $nomEnseignant="", $prenomEnseignant="", $mailEnseignant="", $loginEnseignant="", $passwordEnseignant="", $dateDerniereRecuperationPass="", $statutEnseignant=""){
        $sql = "SELECT * FROM ".DBEnseignant::$TABLE_NAME." WHERE 1";
        
        if($idEnseignant != "")
            $sql .= " AND ".DBEnseignant::$FIELD_ID_ENSEIGNANT."=".DBConnector::getDBConnector()->processInt($idEnseignant);
        if($nomEnseignant != "")
            $sql .= " AND ".DBEnseignant::$FIELD_NOM_ENSEIGNANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomEnseignant));
        if($prenomEnseignant != "")
            $sql .= " AND ".DBEnseignant::$FIELD_PRENOM_ENSEIGNANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($prenomEnseignant));
        if($mailEnseignant != "")
            $sql .= " AND ".DBEnseignant::$FIELD_MAIL_ENSEIGNANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailEnseignant));
        if($loginEnseignant != "")
            $sql .= " AND ".DBEnseignant::$FIELD_LOGIN_ENSEIGNANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($loginEnseignant));
        if($passwordEnseignant != "")
            $sql .= " AND ".DBEnseignant::$FIELD_PASSWORD_ENSEIGNANT."=".DBConnector::getDBConnector()->processObject($passwordEnseignant);
        if($dateDerniereRecuperationPass != "")
            $sql .= " AND ".DBEnseignant::$FIELD_DATE_DERNIERE_RECUPERATION_PASS."=".DBConnector::getDBConnector()->computeDateTime($dateDerniereRecuperationPass);
        if($statutEnseignant != "")
            $sql .= " AND ".DBEnseignant::$FIELD_STATUT_ENSEIGNANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($statutEnseignant));
			
        $res = DBConnector::getDBConnector()->executeQuery($sql);
        
        $return = array();
        $i=0;
        while($result = DBConnector::getDBConnector()->fetchArray($res))
        {
            $return[$i] = new DBEnseignant(
                                            $result[DBEnseignant::$FIELD_ID_ENSEIGNANT],
                                            $result[DBEnseignant::$FIELD_NOM_ENSEIGNANT],
                                            $result[DBEnseignant::$FIELD_PRENOM_ENSEIGNANT],
                                            $result[DBEnseignant::$FIELD_MAIL_ENSEIGNANT],
                                            $result[DBEnseignant::$FIELD_LOGIN_ENSEIGNANT],
                                            $result[DBEnseignant::$FIELD_PASSWORD_ENSEIGNANT],
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBEnseignant::$FIELD_DATE_DERNIERE_RECUPERATION_PASS]),
											$result[DBEnseignant::$FIELD_STATUT_ENSEIGNANT]
                                        );
            
            $i++;
        }
        
        return $return;
    }
    
	
	/**
	* @abstract Construit une requête d'update à partir des paramètres, l'exécute, puis affecte les informations passé en paramètre dans l'objet DBEtudiant courant. La clause where de la requete est automatiquement construite avec l'identifiant de la proposition de stage stocké dans l'Objet courant.
	* @param String Nom de l'enseignant
	* @param String Prénom de l'enseignant
	* @param String Mail de l'enseignant
	* @param String Login de l'enseignant
	* @param int Mot de passe de l'enseignant
	* @param DateTime Date et heure de la dernière récupération de son mot de passe par l'enseignant.
	* @param Enum Statut de l'enseignant. Actif si prend par au tutorat de stages, inactif sinon.
	* @access public
	*/
	public  function updateRecord($nomEnseignant, $prenomEnseignant, $mailEnseignant, $loginEnseignant, $passwordEnseignant, $dateDerniereRecuperationPass, $statutEnseignant){
        $sql = "UPDATE ".DBEnseignant::$TABLE_NAME." SET ";
        $sql .= DBEnseignant::$FIELD_NOM_ENSEIGNANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomEnseignant)).",";
        $sql .= DBEnseignant::$FIELD_PRENOM_ENSEIGNANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($prenomEnseignant)).",";
        $sql .= DBEnseignant::$FIELD_MAIL_ENSEIGNANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailEnseignant)).",";
        $sql .= DBEnseignant::$FIELD_LOGIN_ENSEIGNANT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($loginEnseignant)).",";
        $sql .= DBEnseignant::$FIELD_PASSWORD_ENSEIGNANT."=".DBConnector::getDBConnector()->processObject($passwordEnseignant).",";
        $sql .= DBEnseignant::$FIELD_DATE_DERNIERE_RECUPERATION_PASS."=".DBConnector::getDBConnector()->computeDateTime($dateDerniereRecuperationPass).",";
        $sql .= DBEnseignant::$FIELD_STATUT_ENSEIGNANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($statutEnseignant))."";
        
        $sql .= " WHERE 1";
        $sql .= " AND ".DBEnseignant::$FIELD_ID_ENSEIGNANT."=".DBConnector::getDBConnector()->processInt($this->_idEnseignant);
        
        DBConnector::getDBConnector()->executeQuery($sql);
        
        $this->_nomEnseignant = DBConnector::getDBConnector()->echapString($nomEnseignant);
        $this->_prenomEnseignant = DBConnector::getDBConnector()->echapString($prenomEnseignant);
        $this->_mailEnseignant = DBConnector::getDBConnector()->echapString($mailEnseignant);
        $this->_loginEnseignant = DBConnector::getDBConnector()->echapString($loginEnseignant);
        $this->_passwordEnseignant = $passwordEnseignant;
        $this->_dateDerniereRecuperationPass = $dateDerniereRecuperationPass;
        $this->_statutEnseignant = $statutEnseignant;
    }
    
	
	/**
	* @abstract Construit une requête de suppression et l'exécute. La clause where de la requete est automatiquement construite avec l'identifiant de l'enseignant stocké dans l'Objet courant.
	* @access public
	*/
	public  function deleteRecord(){
        $sql = "DELETE FROM ".DBEnseignant::$TABLE_NAME." WHERE 1";
        $sql .= " AND ".DBEnseignant::$FIELD_ID_ENSEIGNANT."=".DBConnector::getDBConnector()->processInt($this->_idEnseignant);
        
        DBConnector::getDBConnector()->executeQuery($sql);
    }
    
	
	/**
	* @abstract Méthode statique. Permet d'authentifier l'enseignant à partir du login et du mot de passe passé en parametre.
	* @param String Login de l'étudiant à tester
	* @param String Mot de passe de l'étudiant à tester
	* @return DBEtudiant Objet contenant les informations de l'étudiant que l'on vient d'authentifier, FALSE sinon.
	* @access public 
	*/
    public static function authEnseignant($id,$mdp){
    	$enseignants = DBEnseignant::getRecords($id, "", "", "", "", $mdp);
    	if (count($enseignants)== 1)
    		return $enseignants[0];
    	else
    		return NULL;
    } 
    
	
	/**
	* @abstract Retourne le nom et le prénom de l'enseignant.
	* @return String le nom et le prénom de l'enseignant sous la forme suivante : <nom> <prénom>
	* @access public
	*/
    public function getFormSelectOptionLabel(){
        return $this->getNomEnseignant()." ".$this->getPrenomEnseignant();
    }
    
	
	/**
	* @abstract Retourne l'identifiant de l'enseignant.Synonyme de la méthode getIdEnseignant()
	* @return int Identifiant de l'enseignant
	* @access public
	*/

    public function getFormSelectOptionValue(){
        return $this->getIdEnseignant();
    }
    
	
	
	/**
	* @abstract Méthode permettant d'envoyer le mot de passe de l'enseignant. Note: on vérifie toutefois qu'on ait pas envoyé "trop récemment" un mail a l'étudiant. La méthode renvoie l'erreur survenue (si une erreur survient) ou "" sinon.
	* @param Bool TRUE si un mail doit etre envoyé aux administrateurs si aucun mail n'est trouvé pour l'étudiant, FALSE sinon. TRUE par défaut.
	* @return String Message d'erreur en cas d'échec de l'envoi du mot de passe, NULL sinon.
	* @access public
	*/
    public function sendPass($sendMailToAdminIfNoMailFound=true){
        // On vérifie d'abord si le dernier mail n'a pas été envoyé trop récemment
        if(($this->_dateDerniereRecuperationPass != null) && (time() - formattedDateTimeToTime($this->_dateDerniereRecuperationPass) < DBConfig::getConfigValue("LIMITE SECONDES ENVOI MAIL")))
            return "Erreur : cela fait trop peu de temps que vous avez demandé votre mot de passe !";
        else{

            // On regarde si l'adresse est valable... Si ce n'est pas le cas, on mail le responsable des stages pour lui communiquer la demande de mail
            // et on demandera à l'utilisateur de mailer le maitre de stage
            if(($this->_mailEnseignant == "") && $sendMailToAdminIfNoMailFound){
                $m = new Mailer(DBEnseignant::$MAILPASSADMIN_TEMPLATE);
                $m->fillTemplateVar("nom_enseignant", $this->_nomEnseignant);
                $m->fillTemplateVar("prenom_enseignant", $this->_prenomEnseignant);
                $m->fillTemplateVar("mot_de_passe", $this->_passwordEnseignant);
                
                if(!$m->sendMail(DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages : Mot de passe de ".$this->_nomEnseignant." ".$this->_prenomEnseignant))
                    return "Erreur lors de l'envoi de mail à l'administrateur !";
                else
                    return "Aucune adresse n'est disponible dans la base vous concernant. L'administrateur du site a été notifié de votre demande de mot de passe. Vous pouvez le contacter pour récupérer votre mot de passe.";
            }
            // Si le mail est valide
            else if($this->_mailEnseignant != ""){
                $m = new Mailer(DBEnseignant::$MAILPASS_TEMPLATE);
                $m->fillTemplateVar("nom_enseignant", $this->_nomEnseignant);
                $m->fillTemplateVar("prenom_enseignant", $this->_prenomEnseignant);
                $m->fillTemplateVar("mot_de_passe", $this->_passwordEnseignant);
                
                $ok = true;
                $ok = ($ok && $m->sendMail($this->_mailEnseignant, "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages : Récupération de mot de passe"));

                // Mise a jour de la date de dernier envoi
                $this->_dateDerniereRecuperationPass = timeToFormattedDateTime(time());
                $this->updateRecord($this->_nomEnseignant, $this->_prenomEnseignant, $this->_mailEnseignant, $this->_loginEnseignant, $this->_passwordEnseignant, $this->_dateDerniereRecuperationPass);

                if(!$ok)
                    return "Erreur lors de l'envoi d'au moins un stage !";
                
                return "";
            }
        }
    }
}
?>
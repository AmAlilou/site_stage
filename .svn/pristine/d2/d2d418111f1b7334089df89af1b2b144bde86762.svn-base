<?php
set_include_path(".".PATH_SEPARATOR."..".PATH_SEPARATOR."../..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=7&pgc_url=&nom_table=contact_etp&nom_champ_1=id_contact&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=nom_contact&type_champ_2=1&taille_champ_2=50&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=prenom_contact&type_champ_3=1&taille_champ_3=50&champ_facultatif_3=on&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=email_contact&type_champ_4=1&taille_champ_4=255&champ_facultatif_4=on&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=tel_contact&type_champ_5=1&taille_champ_5=255&champ_facultatif_5=on&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=fonction_contact&type_champ_6=1&taille_champ_6=255&champ_facultatif_6=on&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=id_entreprise&type_champ_7=3&taille_champ_7=&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&


/**
* @package DBClasses
* @abstract Classe correspondant à la table 'contact_etp' de la base de données. Elle contient également un ensemble de méthodes permettant la gestion de cette table.
*/
class DBContactEtp {
    private static $TABLE_NAME = "contact_etp";
    private static $FIELD_ID_CONTACT = "id_contact";
    private static $FIELD_NOM_CONTACT = "nom_contact";
    private static $FIELD_PRENOM_CONTACT = "prenom_contact";
    private static $FIELD_EMAIL_CONTACT = "email_contact";
    private static $FIELD_TEL_CONTACT = "tel_contact";
    private static $FIELD_FONCTION_CONTACT = "fonction_contact";
    private static $FIELD_ID_ENTREPRISE = "id_entreprise";

    private $_idContact;
    private $_nomContact;
    private $_prenomContact;
    private $_emailContact;
    private $_telContact;
    private $_fonctionContact;
    private $_idEntreprise;


	/**
	* @abstract Constructeur avec parametre
	* @param int Identifiant du contact
	* @param String Nom du contact
	* @param String Prénom du contact
	* @param String Adresse mail du contact
	* @param String Télephone de l'entreprise
	* @param String Fonction du contact dans l'entreprise
	* @param int Identifiant de l'entreprise employant le contact
	* @access private
	*/
    private  function __construct($idContact, $nomContact, $prenomContact, $emailContact, $telContact, $fonctionContact, $idEntreprise){
        $this->_idContact = $idContact;
        $this->_nomContact = $nomContact;
        $this->_prenomContact = $prenomContact;
        $this->_emailContact = $emailContact;
        $this->_telContact = $telContact;
        $this->_fonctionContact = $fonctionContact;
        $this->_idEntreprise = $idEntreprise;
    }
	
	
	/**
	* @abstract liste des getters
	* @return Valeur de la variable privé correspondante
	* @access public
	*/
    public  function getIdContact(){
        return $this->_idContact;
    }
    public  function getNomContact(){
        return $this->_nomContact;
    }
    public  function getPrenomContact(){
        return $this->_prenomContact;
    }
    public  function getEmailContact(){
        return $this->_emailContact;
    }
    public  function getTelContact(){
        return $this->_telContact;
    }
    public  function getFonctionContact(){
        return $this->_fonctionContact;
    }
    public  function getIdEntreprise(){
        return $this->_idEntreprise;
    }
	
	
	/**
	* @abstract Méthode statique. Vérifie que la table 'contact_etp' existe
	* @return Bool TRUE si la table existe, FALSE sinon.
	* @access public
	*/
    public static function tableExists(){
        return DBConnector::getDBConnector()->tableExists(DBContactEtp::$TABLE_NAME);
    }
	
	
	/**
	* @abstract Méthode statique. Permet de créer la table 'contact_etp'
	* @access public
	*/
    public static function createTable(){
        $sql = "CREATE TABLE `".DBContactEtp::$TABLE_NAME."` (  
                            `".DBContactEtp::$FIELD_ID_CONTACT."` INT(11) NOT NULL  auto_increment,  
                            `".DBContactEtp::$FIELD_NOM_CONTACT."` VARCHAR(50) NOT NULL  ,  
                            `".DBContactEtp::$FIELD_PRENOM_CONTACT."` VARCHAR(50) NULL  ,  
                            `".DBContactEtp::$FIELD_EMAIL_CONTACT."` VARCHAR(255) NULL  ,  
                            `".DBContactEtp::$FIELD_TEL_CONTACT."` VARCHAR(255) NULL  ,  
                            `".DBContactEtp::$FIELD_FONCTION_CONTACT."` VARCHAR(255) NULL  ,  
                            `".DBContactEtp::$FIELD_ID_ENTREPRISE."` INT(11) NOT NULL  ,
                            PRIMARY KEY (`".DBContactEtp::$FIELD_ID_CONTACT."`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
        
        
        foreach(explode(";", $sql) as $query)
        {
            if($query != "")
                DBConnector::getDBConnector()->executeQuery($query);
        }
    }
	
	
	/**
	* @abstract Insère dans la base de données un nouveau contact
	* @param String Nom du contact
	* @param String Prénom du contact
	* @param String Adresse mail du contact
	* @param String Télephone de l'entreprise
	* @param String Fonction du contact dans l'entreprise
	* @param DBEntreprise Entreprise employant le contact
	* @return DBContactEtp Objet contenant les informations du contact que l'on vient d'inserer
	* @access public
	*/
    public static function createRecord($nomContact, $prenomContact, $emailContact, $telContact, $fonctionContact, $entreprise){
        assert(($entreprise == null) || ($entreprise instanceof DBEntreprise));
        $sql = "INSERT INTO ".DBContactEtp::$TABLE_NAME." ("
                            .DBContactEtp::$FIELD_NOM_CONTACT.", "
                            .DBContactEtp::$FIELD_PRENOM_CONTACT.", "
                            .DBContactEtp::$FIELD_EMAIL_CONTACT.", "
                            .DBContactEtp::$FIELD_TEL_CONTACT.", "
                            .DBContactEtp::$FIELD_FONCTION_CONTACT.", "
                            .DBContactEtp::$FIELD_ID_ENTREPRISE." "
                            .") VALUES ("
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomContact)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($prenomContact)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($emailContact)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($telContact)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($fonctionContact)).", "
                            .DBConnector::getDBConnector()->processInt(($entreprise == null)?-1:$entreprise->getIdEntreprise())." "
                            .")";
        
        $id = DBConnector::getDBConnector()->executeQuery($sql);
        
        $obj = DBContactEtp::getRecords($id);
        assert(count($obj) == 1);
        return $obj[0];
    }
    
	
	/**
	* @abstract Méthode statique. Construit une requête de sélection à partir des paramètres, l'exécute, puis retourne un tableau contenant les objets DBContactEtp correspondants. L'ensemble des paramètres peuvent etre absent, dans ce cas l'ensemble de la table est retourné.
	* @param int Identifiant du contact
	* @param String Nom du contact
	* @param String Prénom du contact
	* @param String Adresse mail du contact
	* @param String Télephone de l'entreprise
	* @param String Fonction du contact dans l'entreprise
	* @param int Identifiant de l'entreprise employant le contact
	* @return Array Tableau contenant les objets de type DBContactEtp correspondant aux ligne de la base de données que l'on vient de récupérer
	* @access public
	*/
	public static function getRecords($idContact="", $nomContact="", $prenomContact="", $emailContact="", $telContact="", $fonctionContact="", $idEntreprise=""){
        $sql = "SELECT * FROM ".DBContactEtp::$TABLE_NAME." WHERE 1";
        
        if($idContact != "")
            $sql .= " AND ".DBContactEtp::$FIELD_ID_CONTACT."=".DBConnector::getDBConnector()->processInt($idContact);
        if($nomContact != "")
            $sql .= " AND ".DBContactEtp::$FIELD_NOM_CONTACT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomContact));
        if($prenomContact != "")
            $sql .= " AND ".DBContactEtp::$FIELD_PRENOM_CONTACT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($prenomContact));
        if($emailContact != "")
            $sql .= " AND ".DBContactEtp::$FIELD_EMAIL_CONTACT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($emailContact));
        if($telContact != "")
            $sql .= " AND ".DBContactEtp::$FIELD_TEL_CONTACT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($telContact));
        if($fonctionContact != "")
            $sql .= " AND ".DBContactEtp::$FIELD_FONCTION_CONTACT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($fonctionContact));
        if($idEntreprise != "")
            $sql .= " AND ".DBContactEtp::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnector()->processInt($idEntreprise);
        
        $res = DBConnector::getDBConnector()->executeQuery($sql);
        
        $return = array();
        $i=0;
        while($result = DBConnector::getDBConnector()->fetchArray($res))
        {
            $return[$i] = new DBContactEtp(
                                            $result[DBContactEtp::$FIELD_ID_CONTACT],
                                            $result[DBContactEtp::$FIELD_NOM_CONTACT],
                                            $result[DBContactEtp::$FIELD_PRENOM_CONTACT],
                                            $result[DBContactEtp::$FIELD_EMAIL_CONTACT],
                                            $result[DBContactEtp::$FIELD_TEL_CONTACT],
                                            $result[DBContactEtp::$FIELD_FONCTION_CONTACT],
                                            $result[DBContactEtp::$FIELD_ID_ENTREPRISE]
                                        );
            
            $i++;
        }
        
        return $return;
    }
	
	
	/**
	* @abstract Construit une requête d'update à partir des paramètres, l'exécute, puis affecte les informations passé en paramètre dans l'objet DBContactEtp courant. La clause where de la requete est automatiquement construite avec l'identifiant du contact stocké dans l'Objet courant.
	* @param int Identifiant du contact
	* @param String Nom du contact
	* @param String Prénom du contact
	* @param String Adresse mail du contact
	* @param String Télephone de l'entreprise
	* @param String Fonction du contact dans l'entreprise
	* @param int Identifiant de l'entreprise employant le contact
	* @access public
	*/
    public  function updateRecord($nomContact, $prenomContact, $emailContact, $telContact, $fonctionContact, $idEntreprise){
        $sql = "UPDATE ".DBContactEtp::$TABLE_NAME." SET ";
        $sql .= DBContactEtp::$FIELD_NOM_CONTACT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomContact)).",";
        $sql .= DBContactEtp::$FIELD_PRENOM_CONTACT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($prenomContact)).",";
        $sql .= DBContactEtp::$FIELD_EMAIL_CONTACT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($emailContact)).",";
        $sql .= DBContactEtp::$FIELD_TEL_CONTACT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($telContact)).",";
        $sql .= DBContactEtp::$FIELD_FONCTION_CONTACT."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($fonctionContact)).",";
        $sql .= DBContactEtp::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnector()->processInt($idEntreprise)."";
        
        $sql .= " WHERE 1";
        $sql .= " AND ".DBContactEtp::$FIELD_ID_CONTACT."=".DBConnector::getDBConnector()->processInt($this->_idContact);
        
        DBConnector::getDBConnector()->executeQuery($sql);
        
        $this->_nomContact = DBConnector::getDBConnector()->echapString($nomContact);
        $this->_prenomContact = DBConnector::getDBConnector()->echapString($prenomContact);
        $this->_emailContact = DBConnector::getDBConnector()->echapString($emailContact);
        $this->_telContact = DBConnector::getDBConnector()->echapString($telContact);
        $this->_fonctionContact = DBConnector::getDBConnector()->echapString($fonctionContact);
        $this->_idEntreprise = $idEntreprise;
    }
    
	
	/**
	* @abstract Construit une requête de suppression et l'exécute. La clause where de la requete est automatiquement construite avec l'identifiant du contact stocké dans l'Objet courant.
	* @access public
	*/
	public  function deleteRecord(){
        $sql = "DELETE FROM ".DBContactEtp::$TABLE_NAME." WHERE 1";
        $sql .= " AND ".DBContactEtp::$FIELD_ID_CONTACT."=".DBConnector::getDBConnector()->processInt($this->_idContact);
        
        DBConnector::getDBConnector()->executeQuery($sql);
    }
	
	
	
    // Méthode non générée
	/**
	* @abstract Cette méthode  est privé et n'est jamais appelé dans cette classe. Donc elle doit servir à rien.
	* @access private
	*/
    private function findBestContact($liste_contacts,$nomContactRef,$prenomContactRef,$mailContactRef,
                                     $telContactRef, $fonctionContactRef, $entreprise){
        $nb_elements = 0;
        foreach ($liste_contacts as $contact){
            if ($contact instanceof DBContactEtp){
                if (($nomContactRef==$contact->getNomContact()) &&
                     ($prenomContactRef == $contact->getPrenomContact()) &&
                     ($mailContactRef == $contact->getEmailContact()) &&
                     ($telContactRef == $contact->getTelContact()) &&
                     ($fonctionContactRef == $contact->getFonctionContact()) &&
                     ($entreprise->getIdEntreprise() == $contact->getEntreprise()->getIdEntreprise())){
                    return $contact;
                }
            }
        }
        return null;
    }
}
?>
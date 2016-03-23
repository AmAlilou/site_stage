<?php
set_include_path(".".PATH_SEPARATOR."..".PATH_SEPARATOR."../..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?nb_champs=10&pgc_url=&nom_table=entreprise&nom_champ_1=id_entreprise&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=type_entreprise&type_champ_2=1&taille_champ_2=255&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=raisonsociale_entreprise&type_champ_3=1&taille_champ_3=255&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=url_site_entreprise&type_champ_4=1&taille_champ_4=255&champ_facultatif_4=on&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=adresse_entreprise&type_champ_5=1&taille_champ_5=255&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=code_postal_entreprise&type_champ_6=3&taille_champ_6=&champ_facultatif_6=on&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=ville_entreprise&type_champ_7=1&taille_champ_7=255&champ_facultatif_7=on&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=tel_entreprise&type_champ_8=1&taille_champ_8=255&champ_facultatif_8=on&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=fax_entreprise&type_champ_9=1&taille_champ_9=255&champ_facultatif_9=on&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=nom_resp_taxe_apprentissage&type_champ_10=1&taille_champ_10=255&champ_facultatif_10=on&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&nom_champ_11=mail_resp_taxe_apprentissage&type_champ_11=1&taille_champ_11=255&champ_facultatif_11=on&valeur_defaut_11=0&auto_increment_11=&clef_primaire_11=&getter_11=on&setter_11=&nom_champ_12=paiement_taxe_apprentissage&type_champ_12=3&taille_champ_12=4&champ_facultatif_12=on&valeur_defaut_12=0&auto_increment_12=&clef_primaire_12=&getter_12=on&setter_12=&nom_champ_13=commentaire&type_champ_13=1&taille_champ_13=255&champ_facultatif_13=on&valeur_defaut_13=0&auto_increment_13=&clef_primaire_13=&getter_13=on&setter_13=


/**
* @package DBClasses
* @abstract Classe correspondant à la table 'entreprise' de la base de données. Elle contient également un ensemble de méthodes permettant la gestion de cette table.
*/
class DBEntreprise implements ISelectable {
    private static $TABLE_NAME = "entreprise";
    private static $FIELD_ID_ENTREPRISE = "id_entreprise";
    private static $FIELD_TYPE_ENTREPRISE = "type_entreprise";
    private static $FIELD_RAISONSOCIALE_ENTREPRISE = "raisonsociale_entreprise";
    private static $FIELD_URL_SITE_ENTREPRISE = "url_site_entreprise";
    private static $FIELD_ADRESSE_ENTREPRISE = "adresse_entreprise";
    private static $FIELD_CODE_POSTAL_ENTREPRISE = "code_postal_entreprise";
    private static $FIELD_VILLE_ENTREPRISE = "ville_entreprise";
    private static $FIELD_TEL_ENTREPRISE = "tel_entreprise";
    private static $FIELD_FAX_ENTREPRISE = "fax_entreprise";
    private static $FIELD_NOM_RESP_TAXE_APPRENTISSAGE = "nom_resp_taxe_apprentissage";
    private static $FIELD_MAIL_RESP_TAXE_APPRENTISSAGE = "mail_resp_taxe_apprentissage";
    private static $FIELD_PAIEMENT_TAXE_APPRENTISSAGE = "paiement_taxe_apprentissage";
    private static $FIELD_COMMENTAIRE = "commentaire";

    private $_idEntreprise;
    private $_typeEntreprise;
    private $_raisonsocialeEntreprise;
    private $_urlSiteEntreprise;
    private $_adresseEntreprise;
    private $_codePostalEntreprise;
    private $_villeEntreprise;
    private $_telEntreprise;
    private $_faxEntreprise;
    private $_nomRespTaxeApprentissage;
    private $_mailRespTaxeApprentissage;
    private $_paiementTaxeApprentissage;
    private $_commentaire;
	
	/**
	* @abstract Constructeur avec parametre
	* @param int Identifiant de l'entreprise
	* @param String Type d'entreprise
	* @param String Raison sociale de l'entreprise
	* @param String Adresse URL du site internet de l'entreprise
	* @param String Adresse de l'entreprise
	* @param int Code postal de l'entreprise
	* @param String Ville de l'entreprise
	* @param String Télephone de l'entreprise
	* @param String Fax de l'entreprise
	* @param String Renseignement sur la personne chargée du versement de la taxe d'apprentissage
	* @param String Mail la personne chargée du versement de la taxe d'apprentissage
	* @param String Renseignement sur la taxe d'apprentissage
	* @param String Commentaire sur l'entreprise 
	* @access private
	*/
    private  function __construct($idEntreprise, $typeEntreprise, $raisonsocialeEntreprise, $urlSiteEntreprise, $adresseEntreprise, $codePostalEntreprise, $villeEntreprise, $telEntreprise, $faxEntreprise, $nomRespTaxeApprentissage, $mailRespTaxeApprentissage, $paiementTaxeApprentissage, $commentaire){
        $this->_idEntreprise = $idEntreprise;
        $this->_typeEntreprise = $typeEntreprise;
        $this->_raisonsocialeEntreprise = $raisonsocialeEntreprise;
        $this->_urlSiteEntreprise = $urlSiteEntreprise;
        $this->_adresseEntreprise = $adresseEntreprise;
        $this->_codePostalEntreprise = $codePostalEntreprise;
        $this->_villeEntreprise = $villeEntreprise;
        $this->_telEntreprise = $telEntreprise;
        $this->_faxEntreprise = $faxEntreprise;
        $this->_nomRespTaxeApprentissage = $nomRespTaxeApprentissage;
	$this->_mailRespTaxeApprentissage = $mailRespTaxeApprentissage;
	$this->_paiementTaxeApprentissage = $paiementTaxeApprentissage;
	$this->_commentaire = $commentaire;
    }
    
	
	/**
	* @abstract liste des getters
	* @return Valeur de la variable privé correspondante
	* @access public
	*/
	public  function getIdEntreprise(){
        return $this->_idEntreprise;
    }
    public  function getTypeEntreprise(){
        return $this->_typeEntreprise;
    }
    public  function getRaisonsocialeEntreprise(){
        return $this->_raisonsocialeEntreprise;
    }
    public  function getUrlSiteEntreprise(){
        return $this->_urlSiteEntreprise;
    }
    public  function getAdresseEntreprise(){
        return $this->_adresseEntreprise;
    }
    public  function getCodePostalEntreprise(){
        return $this->_codePostalEntreprise;
    }
    public  function getVilleEntreprise(){
        return $this->_villeEntreprise;
    }
    public  function getTelEntreprise(){
        return $this->_telEntreprise;
    }
    public  function getFaxEntreprise(){
        return $this->_faxEntreprise;
    }
    public  function getNomRespTaxeApprentissage(){
        return $this->_nomRespTaxeApprentissage;
    }
    public  function getMailRespTaxeApprentissage(){
        return $this->_mailRespTaxeApprentissage;
    }
    public  function getPaiementTaxeApprentissage(){
        return $this->_paiementTaxeApprentissage;
    }
    public  function getCommentaire(){
        return $this->_commentaire;
    }
	/**
	* @abstract Méthode statique. Vérifie que la table 'entreprise' existe
	* @return Bool TRUE si la table existe, FALSE sinon.
	* @access public
	*/
	public static function tableExists(){
        return DBConnector::getDBConnector()->tableExists(DBEntreprise::$TABLE_NAME);
    }
    
	
	/**
	* @abstract Méthode statique. Permet de créer la table 'entreprise'
	* @access public
	*/
	public static function createTable(){
        $sql = "CREATE TABLE `".DBEntreprise::$TABLE_NAME."` (  
                            `".DBEntreprise::$FIELD_ID_ENTREPRISE."` INT(11) NOT NULL  auto_increment,  
                            `".DBEntreprise::$FIELD_TYPE_ENTREPRISE."` VARCHAR(255) NOT NULL  ,  
                            `".DBEntreprise::$FIELD_RAISONSOCIALE_ENTREPRISE."` VARCHAR(255) NOT NULL  ,  
                            `".DBEntreprise::$FIELD_URL_SITE_ENTREPRISE."` VARCHAR(255) NULL  ,  
                            `".DBEntreprise::$FIELD_ADRESSE_ENTREPRISE."` VARCHAR(255) NOT NULL  ,  
                            `".DBEntreprise::$FIELD_CODE_POSTAL_ENTREPRISE."` INT(11) NULL  ,  
                            `".DBEntreprise::$FIELD_VILLE_ENTREPRISE."` VARCHAR(255) NULL  ,  
                            `".DBEntreprise::$FIELD_TEL_ENTREPRISE."` VARCHAR(255) NULL  ,  
                            `".DBEntreprise::$FIELD_FAX_ENTREPRISE."` VARCHAR(255) NULL  ,  
                            `".DBEntreprise::$FIELD_NOM_RESP_TAXE_APPRENTISSAGE."` VARCHAR(255) NULL  ,
			    `".DBEntreprise::$FIELD_MAIL_RESP_TAXE_APPRENTISSAGE."` VARCHAR(255) NULL  ,
			    `".DBEntreprise::$FIELD_PAIEMENT_TAXE_APPRENTISSAGE."` INT(11) NULL  ,
			    `".DBEntreprise::$FIELD_COMMENTAIRE."` VARCHAR(255) NULL  ,
                            PRIMARY KEY (`".DBEntreprise::$FIELD_ID_ENTREPRISE."`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
        
        
        foreach(explode(";", $sql) as $query)
        {
            if($query != "")
                DBConnector::getDBConnector()->executeQuery($query);
        }
    }
    
	
	/**
	* @abstract Insère dans la base de données une nouvelle entreprise
	* @param String Type d'entreprise
	* @param String Raison sociale de l'entreprise
	* @param String Adresse URL du site internet de l'entreprise
	* @param String Adresse de l'entreprise
	* @param int Code postal de l'entreprise
	* @param String Ville de l'entreprise
	* @param String Télephone de l'entreprise
	* @param String Fax de l'entreprise
	* @param String Renseignement sur la personne chargée du versement de la taxe d'apprentissage	
	* @param String Mail de la personne chargée du versement de la taxe d'apprentissage	
	* @param String Renseignement sur le paiement de la taxe d'apprentisage	
	* @param String Commentaire sur l'entreprise
	* @return DBEntreprise Objet contenant les informations de l'entreprise que l'on vient d'inserer
	* @access public
	*/
	public static function createRecord($typeEntreprise, $raisonsocialeEntreprise, $urlSiteEntreprise, $adresseEntreprise, $codePostalEntreprise, $villeEntreprise, $telEntreprise, $faxEntreprise, $nomRespTaxeApprentissage, $mailRespTaxeApprentissage, $paiementTaxeApprentissage, $commentaire){
        $sql = "INSERT INTO ".DBEntreprise::$TABLE_NAME." ("
                            .DBEntreprise::$FIELD_TYPE_ENTREPRISE.", "
                            .DBEntreprise::$FIELD_RAISONSOCIALE_ENTREPRISE.", "
                            .DBEntreprise::$FIELD_URL_SITE_ENTREPRISE.", "
                            .DBEntreprise::$FIELD_ADRESSE_ENTREPRISE.", "
                            .DBEntreprise::$FIELD_CODE_POSTAL_ENTREPRISE.", "
                            .DBEntreprise::$FIELD_VILLE_ENTREPRISE.", "
                            .DBEntreprise::$FIELD_TEL_ENTREPRISE.", "
                            .DBEntreprise::$FIELD_FAX_ENTREPRISE.", "
                            .DBEntreprise::$FIELD_NOM_RESP_TAXE_APPRENTISSAGE.", "
			    .DBEntreprise::$FIELD_MAIL_RESP_TAXE_APPRENTISSAGE.", "
			    .DBEntreprise::$FIELD_PAIEMENT_TAXE_APPRENTISSAGE.", "
			    .DBEntreprise::$FIELD_COMMENTAIRE." "
                            .") VALUES ("
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($typeEntreprise)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($raisonsocialeEntreprise)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($urlSiteEntreprise)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($adresseEntreprise)).", "
                            .DBConnector::getDBConnector()->processObject($codePostalEntreprise).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villeEntreprise)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($telEntreprise)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($faxEntreprise)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($nomRespTaxeApprentissage)).", "
			    .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailRespTaxeApprentissage)).", "			    
			    .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($paiementTaxeApprentissage)).", "
			    .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($commentaire))." "
                            .")";
        
        $id = DBConnector::getDBConnector()->executeQuery($sql);
        
        $obj = DBEntreprise::getRecords($id);
        assert(count($obj) == 1);
        return $obj[0];
    }
    
	
	/**
	* @abstract Méthode statique. Construit une requête de sélection à partir des paramètres, l'exécute, puis retourne un tableau contenant les objets DBEntreprise correspondants. L'ensemble des paramètres peuvent etre absent, dans ce cas l'ensemble de la table est retourné.
	* @param int Identifiant de l'entreprise
	* @param String Type d'entreprise
	* @param String Raison sociale de l'entreprise
	* @param String Adresse URL du site internet de l'entreprise
	* @param String Adresse de l'entreprise
	* @param int Code postal de l'entreprise
	* @param String Ville de l'entreprise
	* @param String Télephone de l'entreprise
	* @param String Fax de l'entreprise
	* @param String Renseignement sur la personne chargée du versement de la taxe d'apprentissage
	* @param String Mail de la personne chargée du versement de la taxe d'apprentissage
	* @param String Renseignement sur la taxe d'apprentissage
	* @param String Commentaire sur l'entreprise
	* @return Array Tableau contenant les objets de type DBEntreprise correspondant aux ligne de la base de données que l'on vient de récupérer
	* @access public
	*/
	public static function getRecords($idEntreprise="", $typeEntreprise="", $raisonsocialeEntreprise="", $urlSiteEntreprise="", $adresseEntreprise="", $codePostalEntreprise="", $villeEntreprise="", $telEntreprise="", $faxEntreprise="", $nomRespTaxeApprentissage="", $mailRespTaxeApprentissage="", $paiementTaxeApprentissage="", $commentaire=""){
        $sql = "SELECT * FROM ".DBEntreprise::$TABLE_NAME." WHERE 1";
        
        if($idEntreprise != "")
            $sql .= " AND ".DBEntreprise::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnector()->processInt($idEntreprise);
        if($typeEntreprise != "")
            $sql .= " AND ".DBEntreprise::$FIELD_TYPE_ENTREPRISE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($typeEntreprise));
        if($raisonsocialeEntreprise != "")
            $sql .= " AND ".DBEntreprise::$FIELD_RAISONSOCIALE_ENTREPRISE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($raisonsocialeEntreprise));
        if($urlSiteEntreprise != "")
            $sql .= " AND ".DBEntreprise::$FIELD_URL_SITE_ENTREPRISE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($urlSiteEntreprise));
        if($adresseEntreprise != "")
            $sql .= " AND ".DBEntreprise::$FIELD_ADRESSE_ENTREPRISE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($adresseEntreprise));
        if($codePostalEntreprise != "")
            $sql .= " AND ".DBEntreprise::$FIELD_CODE_POSTAL_ENTREPRISE."=".DBConnector::getDBConnector()->processObject($codePostalEntreprise);
        if($villeEntreprise != "")
            $sql .= " AND ".DBEntreprise::$FIELD_VILLE_ENTREPRISE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villeEntreprise));
        if($telEntreprise != "")
            $sql .= " AND ".DBEntreprise::$FIELD_TEL_ENTREPRISE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($telEntreprise));
        if($faxEntreprise != "")
            $sql .= " AND ".DBEntreprise::$FIELD_FAX_ENTREPRISE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($faxEntreprise));
        if($nomRespTaxeApprentissage != "")
            $sql .= " AND ".DBEntreprise::$FIELD_NOM_RESP_TAXE_APPRENTISSAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($nomRespTaxeApprentissage));
	if($mailRespTaxeApprentissage != "")
            $sql .= " AND ".DBEntreprise::$FIELD_MAIL_RESP_TAXE_APPRENTISSAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailRespTaxeApprentissage));
	if($paiementTaxeApprentissage != "")
            $sql .= " AND ".DBEntreprise::$FIELD_PAIEMENT_TAXE_APPRENTISSAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($paiementTaxeApprentissage));
	if($commentaire != "")
            $sql .= " AND ".DBEntreprise::$FIELD_COMMENTAIRE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($commentaire));
        
        $res = DBConnector::getDBConnector()->executeQuery($sql);
        
        $return = array();
        $i=0;
        while($result = DBConnector::getDBConnector()->fetchArray($res))
        {
            $return[$i] = new DBEntreprise(
                                            $result[DBEntreprise::$FIELD_ID_ENTREPRISE],
                                            $result[DBEntreprise::$FIELD_TYPE_ENTREPRISE],
                                            $result[DBEntreprise::$FIELD_RAISONSOCIALE_ENTREPRISE],
                                            $result[DBEntreprise::$FIELD_URL_SITE_ENTREPRISE],
                                            $result[DBEntreprise::$FIELD_ADRESSE_ENTREPRISE],
                                            $result[DBEntreprise::$FIELD_CODE_POSTAL_ENTREPRISE],
                                            $result[DBEntreprise::$FIELD_VILLE_ENTREPRISE],
                                            $result[DBEntreprise::$FIELD_TEL_ENTREPRISE],
                                            $result[DBEntreprise::$FIELD_FAX_ENTREPRISE],
                                            $result[DBEntreprise::$FIELD_NOM_RESP_TAXE_APPRENTISSAGE],
					    $result[DBEntreprise::$FIELD_MAIL_RESP_TAXE_APPRENTISSAGE],
					    $result[DBEntreprise::$FIELD_PAIEMENT_TAXE_APPRENTISSAGE],
					    $result[DBEntreprise::$FIELD_COMMENTAIRE]
                                        );
            
            $i++;
        }
        
        return $return;
    }
    
	
	/**
	* @abstract Construit une requête d'update à partir des paramètres, l'exécute, puis affecte les informations passé en paramètre dans l'objet DBEntreprise courant. La clause where de la requete est automatiquement construite avec l'identifiant de l'entreprise stockée dans l'Objet courant. 
	* @param String Type d'entreprise
	* @param String Raison sociale de l'entreprise
	* @param String Adresse URL du site internet de l'entreprise
	* @param String Adresse de l'entreprise
	* @param int Code postal de l'entreprise
	* @param String Ville de l'entreprise
	* @param String Télephone de l'entreprise
	* @param String Fax de l'entreprise
	* @param String Renseignement sur la personne chargée du versement de la taxe d'apprentissage
	* @param String Mail de la personne chargée du versement de la taxe d'apprentissage
	* @param String Renseignement sur le paiement de la taxe d'apprentissage
	* @param String Commentaire sur l'entreprise
	* @access public
	*/
	public  function updateRecord($typeEntreprise, $raisonsocialeEntreprise, $urlSiteEntreprise, $adresseEntreprise, $codePostalEntreprise, $villeEntreprise, $telEntreprise, $faxEntreprise, $nomRespTaxeApprentissage, $mailRespTaxeApprentissage, $paiementTaxeApprentissage, $commentaire){
        $sql = "UPDATE ".DBEntreprise::$TABLE_NAME." SET ";
        $sql .= DBEntreprise::$FIELD_TYPE_ENTREPRISE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($typeEntreprise)).",";
        $sql .= DBEntreprise::$FIELD_RAISONSOCIALE_ENTREPRISE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($raisonsocialeEntreprise)).",";
        $sql .= DBEntreprise::$FIELD_URL_SITE_ENTREPRISE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($urlSiteEntreprise)).",";
        $sql .= DBEntreprise::$FIELD_ADRESSE_ENTREPRISE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($adresseEntreprise)).",";
        $sql .= DBEntreprise::$FIELD_CODE_POSTAL_ENTREPRISE."=".DBConnector::getDBConnector()->processObject($codePostalEntreprise).",";
        $sql .= DBEntreprise::$FIELD_VILLE_ENTREPRISE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($villeEntreprise)).",";
        $sql .= DBEntreprise::$FIELD_TEL_ENTREPRISE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($telEntreprise)).",";
        $sql .= DBEntreprise::$FIELD_FAX_ENTREPRISE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($faxEntreprise)).",";
        $sql .= DBEntreprise::$FIELD_NOM_RESP_TAXE_APPRENTISSAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($nomRespTaxeApprentissage)).",";
	$sql .= DBEntreprise::$FIELD_MAIL_RESP_TAXE_APPRENTISSAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($mailRespTaxeApprentissage)).",";
	$sql .= DBEntreprise::$FIELD_PAIEMENT_TAXE_APPRENTISSAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($paiementTaxeApprentissage)).",";
        $sql .= DBEntreprise::$FIELD_COMMENTAIRE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($commentaire))."";
        $sql .= " WHERE 1";
        $sql .= " AND ".DBEntreprise::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnector()->processInt($this->_idEntreprise);
        
        DBConnector::getDBConnector()->executeQuery($sql);
        
        $this->_typeEntreprise = DBConnector::getDBConnector()->echapString($typeEntreprise);
        $this->_raisonsocialeEntreprise = DBConnector::getDBConnector()->echapString($raisonsocialeEntreprise);
        $this->_urlSiteEntreprise = DBConnector::getDBConnector()->echapString($urlSiteEntreprise);
        $this->_adresseEntreprise = DBConnector::getDBConnector()->echapString($adresseEntreprise);
        $this->_codePostalEntreprise = $codePostalEntreprise;
        $this->_villeEntreprise = DBConnector::getDBConnector()->echapString($villeEntreprise);
        $this->_telEntreprise = DBConnector::getDBConnector()->echapString($telEntreprise);
        $this->_faxEntreprise = DBConnector::getDBConnector()->echapString($faxEntreprise);
        $this->_nomRespTaxeApprentissage = DBConnector::getDBConnector()->echapString($nomRespTaxeApprentissage);
	$this->_mailRespTaxeApprentissage = DBConnector::getDBConnector()->echapString($mailRespTaxeApprentissage);
	$this->_paiementTaxeApprentissage = DBConnector::getDBConnector()->echapString($paiementTaxeApprentissage);
	$this->_commentaire = DBConnector::getDBConnector()->echapString($commentaire);
    }
    
	
	/**
	* @abstract Construit une requête de suppression et l'exécute. La clause where de la requete est automatiquement construite avec l'identifiant de l'entreprise stocké dans l'Objet courant.
	* @access public
	*/
	public  function deleteRecord(){
        $sql = "DELETE FROM ".DBEntreprise::$TABLE_NAME." WHERE 1";
        $sql .= " AND ".DBEntreprise::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnector()->processInt($this->_idEntreprise);
        
        DBConnector::getDBConnector()->executeQuery($sql);
    }
    
    
	
	/**
	* @abstract Permet d'uniformiser chaque "type d'entreprise" dans la base de données
	* @access public
	*/
    public static function uniformiseTypes(){
        $res = DBConnector::getDBConnector()->executeQuery("SELECT ".DBEntreprise::$FIELD_ID_ENTREPRISE.", ".DBEntreprise::$FIELD_TYPE_ENTREPRISE." FROM ".DBEntreprise::$TABLE_NAME." ORDER BY ".DBEntreprise::$FIELD_ID_ENTREPRISE." ASC");
        
        while($result = DBConnector::getDBConnector()->fetchArray($res)){
            // On regarde tous les enregistrements ayant un type identique, sans tenir compte de la casse, mais différent, en tenant compte de la casse
            $sql = "SELECT ".DBEntreprise::$FIELD_ID_ENTREPRISE." FROM ".DBEntreprise::$TABLE_NAME." WHERE 1 ";
            $sql .= "AND ".DBEntreprise::$FIELD_TYPE_ENTREPRISE." LIKE ".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($result[1]));
            $sql .= " AND ".DBEntreprise::$FIELD_TYPE_ENTREPRISE." != ".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($result[1]));
            
            $res2 = DBConnector::getDBConnector()->executeQuery($sql);
            
            // Pour tous ces enregistrements, on les "nivelle" avec le premier "bon" enregistrement trouvé
            while($result2 = DBConnector::getDBConnector()->fetchArray($res2)){
                $sql = "UPDATE ".DBEntreprise::$TABLE_NAME." SET ".DBEntreprise::$FIELD_TYPE_ENTREPRISE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($result[1]))." WHERE ".DBEntreprise::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnector()->processInt($result2[0]);
                
                DBConnector::getDBConnector()->executeQuery($sql);
            }            
        }
    }
    
    
	
	//methodes non générées
	/**
	* @abstract Retourne la raison sociale, le code postal et la ville de l'entreprise
	* @return String la raison sociale, le code postal et la ville de l'entreprise sous la forme suivante : <RS> (<CP> <Ville>)
	* @access public
	*/
    public function getFormSelectOptionLabel(){
        return "".$this->getRaisonsocialeEntreprise()." (".$this->getCodePostalEntreprise()." ".$this->getVilleEntreprise().")";
    }
    
	
	/**
	* @abstract Retourne l'identifiant de l'entreprise.Synonyme de la méthode getIdEntreprise()
	* @return int Identifiant de l'entreprise
	* @access public
	*/
	public function getFormSelectOptionValue(){
        return $this->getIdEntreprise();
    }
    
    
	
	/**
	* @abstract Méthode statique. Retourne l'ensemble des entreprises dans un tableau contenant des objets de type Enumerable. Ce tableau est trié sur le retour de la fonction 'getFormSelectOptionLabel()'. Chaque objet de type Enumerable contient comme valeur le retour de la fonction 'getFormSelectOptionValue()' et comme label le retour de la fonction 'getFormSelectOptionLabel()'.
	* @param Demande l'ajoute d'un objet Enumerable à la fin du tableau ayant comme valeur 'Autre' et label 'Autre' si à TRUE, sinon mettre à FALSE.
	* @return Array Tableau contenant des objet de type Enumerable. Ce tableau est trié sur le retour de la fonction 'getFormSelectOptionLabel()'. Chaque objet de type Enumerable contient comme valeur le retour de la fonction 'getFormSelectOptionValue()' et comme label le retour de la fonction 'getFormSelectOptionLabel()'.
	* @access public
	*/
	public static function getEnumeration($addAutre=true){
        $liste_entreprises = DBEntreprise::getRecords();
        $res = Enumeration::getSelectablesArrayFromObject($liste_entreprises,'$a->getFormSelectOptionValue()','$a->getFormSelectOptionLabel()');
        if ($addAutre)
        	$res[count($res)] = new Enumerable("Autre","Autre");
        return $res;
    }
    
	
	/**
	* @abstract Permet de savoir si l'entreprise passé en paramètre existe déjà dans la base de donées
	* @param String Raison social de l'entreprise à tester
	* @param int Code postal de l'entreprise à tester
	* @return TRUE si l'entreprise existe déjà, FALSE sinon.
	* @access public
	*/
	public static function entrepriseExisteDeja($raisonSociale,$cp){
        $sql = "SELECT * FROM ".DBEntreprise::$TABLE_NAME." WHERE ".DBEntreprise::$FIELD_RAISONSOCIALE_ENTREPRISE." LIKE '".$raisonSociale."' AND ".DBEntreprise::$FIELD_CODE_POSTAL_ENTREPRISE."=".$cp;
        $res = DBConnector::getDBConnector()->executeQuery($sql);
        if(DBConnector::getDBConnector()->fetchArray($res))
            return true;
        else
            return false;
    }
    
	
	/**
	* @abstract Modifie les données de l'entreprise à partir des attributs de l'objet courant. Cette méthode utilise la méthode 'updateRecord' et lui passe en paramètre les attributs de l'objet courant.
	* @access public
	*/
    public function updateFicheAvecAttr() {
	  $this->updateRecord( 
           $this->_typeEntreprise, 
           $this->_raisonsocialeEntreprise, 
           $this->_urlSiteEntreprise, 
           $this->_adresseEntreprise,
           $this->_codePostalEntreprise,
           $this->_villeEntreprise, 
           $this->_telEntreprise, 
           $this->_faxEntreprise, 
           $this->_nomRespTaxeApprentissage,
	   $this->_mailRespTaxeApprentissage,
	   $this->_paiementTaxeApprentissage,
	   $this->_commentaire);
   }
   
   
   /**
	* @abstract Affecte à l'objet les informations sur la personne chargée de la taxe d'apprentissge dans l'entreprise et l'enregistre dans la base de données.
	* @access public
	*/
   public function setResponsableTaxe($res) {
       $this->_nomRespTaxeApprentissage = $res;
       $this->updateFicheAvecAttr();
   }

}
?>
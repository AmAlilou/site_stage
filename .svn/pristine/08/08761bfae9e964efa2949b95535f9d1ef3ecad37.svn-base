<?php
set_include_path(".".PATH_SEPARATOR."..".PATH_SEPARATOR."../..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// Généré via PHPClassGenerator via l'url index.php?//nb_champs=27&pgc_url=&nom_table=proposition_stage&nom_champ_1=id_proposition_stage&type_champ_1=3&taille_champ_1=&champ_fac//ultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_maitre_stage&type_c//hamp_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_//champ_3=id_contact&type_champ_3=3&taille_champ_3=&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&g//etter_3=on&setter_3=&


/**
* @package DBClasses
* @abstract Classe correspondant à la table 'candidature' de la base de données. Elle contient également un ensemble de méthodes permettant la gestion de cette table.
*/
 class DBCandidature {
 //code non généré
//variables représentant les valeurs de l'enum de l'attribut "etat_stage"
    /**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "etat_stage". Chaine stockée pour l'état attente de validation de la proposition de stage : "En attente de validation"
	*/
	public static $ETAT_PROPOSITION_STAGE_ATTENTE_VALIDATION = "En attente de validation";
    /**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "etat_stage". Chaine stockée pour l'état validée de la proposition de stage : "Validee"
	*/
	public static $ETAT_PROPOSITION_STAGE_VALIDEE = "Validee";
    /**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "etat_stage". Chaine stockée pour l'état terminée de la proposition de stage : "Terminee"
	*/
	public static $ETAT_PROPOSITION_STAGE_TERMINEE = "Terminee";
	/**
	* @var String Variable représentant les valeurs de l'enum de l'attribut "etat_stage". Chaine stockée pour l'état refusée de la proposition de stage : "Refusee"
	*/
    public static $ETAT_PROPOSITION_STAGE_REFUSEE = "Refusee";
    
    private static $NOTIFICATION_ADMIN_TEMPLATE = "/mailTemplates/notificationAdminAjoutProposition";
    private static $NOTIFICATION_PROPOSITION_ETD = "/mailTemplates/notificationEtdAjoutProposition";
    private static $MAILREFUSPROPSTAGE_TEMPLATE = "/mailTemplates/mailRefusPropStage";
    private static $MAILVALIDATIONPROPSTAGE_TEMPLATE = "/mailTemplates/mailValidationPropStage";
    private static $MAILTERMINAISONPROPSTAGE_TEMPLATE = "/mailTemplates/mailTerminaisonPropStage";
//fin code non généré


    private static $TABLE_NAME = "candiature";
    private static $FIELD_ID_PROPOSITION_STAGE = "id_proposition_stage";
    private static $FIELD_ID_MAITRE_STAGE = "id_maitre_stage";
    private static $FIELD_ID_CONTACT = "id_contact";
    private static $FIELD_DOMAINE = "domaine";
    private static $FIELD_INTITULE = "intitule";
    private static $FIELD_SUJET = "sujet";
    private static $FIELD_DATE_DEBUT = "date_debut";
    private static $FIELD_DATE_FIN = "date_fin";
    private static $FIELD_TECHNO = "techno";
    private static $FIELD_NB_ETUDIANT_PROP = "nb_etudiant_prop";
    private static $FIELD_INDEMNITE_PROP = "indemnite_prop";
    private static $FIELD_ETAT = "etat";
    private static $FIELD_MOTIF_REFUS = "motif_refus";
    private static $FIELD_MAIL_RESPONSABLE_PROPOSITION = "mail_responsable_proposition";
    private static $FIELD_PROMO = "promo";
    private static $FIELD_DATE_CREATION = "date_creation";
    private static $FIELD_DATE_DERNIERE_MODIFICATION = "date_derniere_modification";
    private static $FIELD_DATE_VALIDATION = "date_validation";
    private static $FIELD_DATE_REFUS = "date_refus";
    private static $FIELD_DATE_TERMINAISON = "date_terminaison";
    private static $FIELD_DESC_TECHNO_PROP = "desc_techno_prop";
    private static $FIELD_ID_ENTREPRISE = "id_entreprise";
    private static $FIELD_NOM_MAITRE_STAGE = "nom_maitre_stage";
    private static $FIELD_PRENOM_MAITRE_STAGE = "prenom_maitre_stage";
    private static $FIELD_NOM_CONTACT = "nom_contact";
    private static $FIELD_PRENOM_CONTACT = "prenom_contact";
    private static $FIELD_RAISON_SOCIALE_ENTREPRISE = "raison_sociale_entreprise";
    private static $FIELD_NB_CANDIDATURE = "nb_candidature";
    private static $FIELD_NB_FICHE = "nb_fiche";

    private $_idPropositionStage;
    private $_idMaitreStage;
    private $_idContact;
    private $_domaine;
    private $_intitule;
    private $_sujet;
    private $_dateDebut;
    private $_dateFin;
    private $_techno;
    private $_nbEtudiantProp;
    private $_indemniteProp;
    private $_etat;
    private $_motifRefus;
    private $_mailResponsableProposition;
    private $_promo;
    private $_dateCreation;
    private $_dateDerniereModification;
    private $_dateValidation;
    private $_dateRefus;
    private $_dateTerminaison;
    private $_descTechnoProp;
    private $_idEntreprise;
    private $_nbCandidature;
    private $_nbFiche;

	/**
	* @abstract Constructeur prenant en parametre les variables d'une proposition de stage
	* @param int Identifiant de la proposition de stage
	* @param int Identifiant du maitre de stage, clef étrangère
	* @param int Identifiant du contact de la proposition
	* @param String Domaine d'application du stage proposé
	* @param String Intitulé du stage proposé
	* @param String Sujet du stage proposé
	* @param Date Date de début du stage
	* @param Date Date de fin du stage
	* @param String Technologie utilisé pendant le stage
	* @param int Nombre d'étudiant recherché pour le stage proposé
	* @param String Indemnité proposé pour le stage
	* @param Enum Etat de la proposition de stage. Prend l'une des valeurs définie dans les variables statiques définies dans cette classe.
	* @param String Motif du refus du stage proposé
	* @param String Adresse mail du responsable de la proposition de stage
	* @param int Promo de la proposition de stage
	* @param Date Date de création de la proposition
	* @param Date Date de dernière modification de la proposition, null si pas de modification
	* @param Date Date de passage à l'état 'Validee' de la proposition, null si pas validée
	* @param Date Date de passage à l'état 'Refusee' de la proposition, null si pas refusée
	* @param Date Date de passage à l'état 'Terminée' de la proposition, null si pas terminée
	* @param String Description de la technologie utilisée pendant le stage
	* @param int Identifiant de l'entreprise proposant ce stage, clef étrangère
	* @param int Nombre d'étudiant qui ont répondu à la proposition de stage. Valeur par défaut : 0.
	* @param int Nombre d'étudiant qui ont envoyé une fiche de stage en rapport avec la proposition de stage. Valeur par défaut : 0.
	* @access private
	*/
    private  function __construct($idPropositionStage, $idMaitreStage, $idContact, $domaine, $intitule, $sujet, $dateDebut, $dateFin, $techno, $nbEtudiantProp, $indemniteProp, $etat, $motifRefus, $mailResponsableProposition, $promo, $dateCreation, $dateDerniereModification, $dateValidation, $dateRefus, $dateTerminaison, $descTechnoProp, $idEntreprise, $nbCandidature=0, $nbFiche=0){
        $this->_idPropositionStage = $idPropositionStage;
        $this->_idMaitreStage = $idMaitreStage;
        $this->_idContact = $idContact;
        $this->_domaine = $domaine;
        $this->_intitule = $intitule;
        $this->_sujet = $sujet;
        $this->_dateDebut = $dateDebut;
        $this->_dateFin = $dateFin;
        $this->_techno = $techno;
        $this->_nbEtudiantProp = $nbEtudiantProp;
        $this->_indemniteProp = $indemniteProp;
        $this->_etat = $etat;
        $this->_motifRefus = $motifRefus;
        $this->_mailResponsableProposition = $mailResponsableProposition;
        $this->_promo = $promo;
        $this->_dateCreation = $dateCreation;
        $this->_dateDerniereModification = $dateDerniereModification;
        $this->_dateValidation = $dateValidation;
        $this->_dateRefus = $dateRefus;
        $this->_dateTerminaison = $dateTerminaison;
        $this->_descTechnoProp = $descTechnoProp;
        $this->_idEntreprise = $idEntreprise;
        $this->_nbCandidature = $nbCandidature;
        $this->_nbFiche = $nbFiche;
    }
	
	/**
	* @abstract liste des getters
	* @return Valeur de la variable privé correspondante
	* @access public
	*/
    public function getIdPropositionStage(){
        return $this->_idPropositionStage;
    }
    public  function getIdMaitreStage(){
        return $this->_idMaitreStage;
    }
    public  function getIdContact(){
        return $this->_idContact;
    }
    public  function getDomaine(){
        return $this->_domaine;
    }
    public  function getIntitule(){
        return $this->_intitule;
    }
    public  function getSujet(){
        return $this->_sujet;
    }
    public  function getDateDebut(){
        return $this->_dateDebut;
    }
    public  function getDateFin(){
        return $this->_dateFin;
    }
    public  function getTechno(){
        return $this->_techno;
    }
    public  function getNbEtudiantProp(){
        return $this->_nbEtudiantProp;
    }
    public  function getIndemniteProp(){
        return $this->_indemniteProp;
    }
    public  function getEtat(){
        return $this->_etat;
    }
    public  function getMotifRefus(){
        return $this->_motifRefus;
    }
    public  function getMailResponsableProposition(){
        return $this->_mailResponsableProposition;
    }
    public  function getPromo(){
        return $this->_promo;
    }
    public  function getDateCreation(){
        return $this->_dateCreation;
    }
    public  function getDateDerniereModification(){
        return $this->_dateDerniereModification;
    }
    public  function getDateValidation(){
        return $this->_dateValidation;
    }
    public  function getDateRefus(){
        return $this->_dateRefus;
    }
    public  function getDateTerminaison(){
        return $this->_dateTerminaison;
    }
    public  function getDescTechnoProp(){
        return $this->_descTechnoProp;
    }
    public  function getIdEntreprise(){
        return $this->_idEntreprise;
    }
	public  function getNbCandidature(){
        return $this->_nbCandidature;
    }
	public  function getNbFiche(){
        return $this->_nbFiche;
    }
	
	/**
	* @abstract Méthode statique. Vérifie que la table 'proposition_stage' existe
	* @return Bool TRUE si la table existe, FALSE sinon.
	* @access public
	*/
    public static function tableExists(){
        return DBConnector::getDBConnector()->tableExists(DBPropositionStage::$TABLE_NAME);
    }
	
	/**
	* @abstract Méthode statique. Permet de créer la table 'proposition_stage'
	* @access public
	*/
    public static function createTable(){
        $sql = "CREATE TABLE `".DBPropositionStage::$TABLE_NAME."` (  
                            `".DBPropositionStage::$FIELD_ID_PROPOSITION_STAGE."` INT(11) NOT NULL  auto_increment,  
                            `".DBPropositionStage::$FIELD_ID_MAITRE_STAGE."` INT(11) NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_ID_CONTACT."` INT(11) NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_DOMAINE."` VARCHAR(255) NULL  ,  
                            `".DBPropositionStage::$FIELD_INTITULE."` VARCHAR(255) NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_SUJET."` TEXT NULL  ,  
                            `".DBPropositionStage::$FIELD_DATE_DEBUT."` DATE NULL  ,  
                            `".DBPropositionStage::$FIELD_DATE_FIN."` DATE NULL  ,  
                            `".DBPropositionStage::$FIELD_TECHNO."` VARCHAR(255) NULL  ,  
                            `".DBPropositionStage::$FIELD_NB_ETUDIANT_PROP."` INT(11) NULL  ,  
                            `".DBPropositionStage::$FIELD_INDEMNITE_PROP."` TEXT NULL  ,
                            `".DBPropositionStage::$FIELD_ETAT."` ENUM('".DBPropositionStage::$ETAT_PROPOSITION_STAGE_ATTENTE_VALIDATION."','"
                                                                         .DBPropositionStage::$ETAT_PROPOSITION_STAGE_VALIDEE."','"
                                                                         .DBPropositionStage::$ETAT_PROPOSITION_STAGE_REFUSEE."','"
                                                                         .DBPropositionStage::$ETAT_PROPOSITION_STAGE_TERMINEE."') NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_MOTIF_REFUS."` VARCHAR(255) NULL  ,  
                            `".DBPropositionStage::$FIELD_MAIL_RESPONSABLE_PROPOSITION."` VARCHAR(255) NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_PROMO."` INT(11) NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_DATE_CREATION."` DATETIME NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_DATE_DERNIERE_MODIFICATION."` DATETIME NULL  ,  
                            `".DBPropositionStage::$FIELD_DATE_VALIDATION."` DATETIME NULL  ,  
                            `".DBPropositionStage::$FIELD_DATE_REFUS."` DATETIME NULL  ,  
                            `".DBPropositionStage::$FIELD_DATE_TERMINAISON."` DATETIME NULL  ,  
                            `".DBPropositionStage::$FIELD_DESC_TECHNO_PROP."` TEXT NULL  ,
                            `".DBPropositionStage::$FIELD_ID_ENTREPRISE."` INT(11) NOT NULL  ,
                            `".DBPropositionStage::$FIELD_NOM_MAITRE_STAGE."` VARCHAR(255) NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_PRENOM_MAITRE_STAGE."` VARCHAR(255) NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_NOM_CONTACT."` VARCHAR(255) NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_PRENOM_CONTACT."` VARCHAR(255) NOT NULL  ,  
                            `".DBPropositionStage::$FIELD_RAISON_SOCIALE_ENTREPRISE."` VARCHAR(255) NOT NULL  ,
                            `".DBPropositionStage::$FIELD_NB_CANDIDATURE."` tinyint(3) unsigned NOT NULL default '0' COMMENT 'Permet de stocker le nombre de réponse à cette proposition',
                            `".DBPropositionStage::$FIELD_NB_FICHE."` tinyint(3) unsigned NOT NULL default '0' COMMENT 'Permet de savoir le nombre de fiche de stage résultant de la proposition',
                            PRIMARY KEY (`".DBPropositionStage::$FIELD_ID_PROPOSITION_STAGE."`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
        
        
        foreach(explode(";", $sql) as $query)
        {
            if($query != "")
                DBConnector::getDBConnector()->executeQuery($query);
        }
    }
    

	/**
	* @abstract Insère dans la base de données une nouvelle proposition de stage
	* @param DBContactEtp Objet contenant les informations du maitre de stage du stage proposé
	* @param DBContactEtp Objet contenant les informations du contact dans l'entreprise pour cette proposition de stage
	* @param String Domaine d'application du stage
	* @param String Intitulé du stage proposé
	* @param String Sujet du stage proposé
	* @param Date Date de début du stage proposé
	* @param Date Date de fin du stage proposé
	* @param String Technologie utilisé pendant le stage proposé
	* @param int Nombre d'étudiant pouvant être accueillie pour cette proposition de stage
	* @param String Indemnité proposé pour le stage
	* @param Enum Etat de la proposition de stage. Prend l'une des valeurs définie dans les variables statiques définies dans cette classe.
	* @param String Motif du refus du stage proposé, NULL si pas de refus
	* @param String Adresse mail du responsable de la proposition de stage
	* @param int Promo de la proposition de stage
	* @param Date Date de création de la proposition
	* @param Date Date de dernière modification de la proposition, null si pas de modification
	* @param Date Date de passage à l'état 'Validee' de la proposition, null si pas validée
	* @param Date Date de passage à l'état 'Refusee' de la proposition, null si pas refusée
	* @param Date Date de passage à l'état 'Terminée' de la proposition, null si pas terminée
	* @param String Description de la technologie utilisée pendant le stage
	* @param DBEtreprise Objet contenant les informations de l'entreprise proposant ce stage
	* @param int Nombre d'étudiant qui ont répondu à la proposition de stage. Valeur par défaut : 0.
	* @param int Nombre d'étudiant qui ont envoyé une fiche de stage en rapport avec la proposition de stage. Valeur par défaut : 0.
	* @return DBPropositionStage Objet contenant les informations de la proposition de stage que l'on vient d'inserer
	* @access public
	*/
	public static function createRecord($maitreStage, $contact, $domaine, $intitule, $sujet, $dateDebut, $dateFin, $techno, $nbEtudiantProp, $indemniteProp, $etat, $motifRefus, $mailResponsableProposition, $promo, $dateCreation, $dateDerniereModification, $dateValidation, $dateRefus, $dateTerminaison, $descTechnoProp, $entreprise, $nbCandidature=0, $nbFiche=0){
        assert(($maitreStage == null) || ($maitreStage instanceof DBContactEtp));
        assert(($contact == null) || ($contact instanceof DBContactEtp));
        assert(($entreprise == null) || ($entreprise instanceof DBEntreprise));
        $sql = "INSERT INTO ".DBPropositionStage::$TABLE_NAME." ("
                            .DBPropositionStage::$FIELD_ID_MAITRE_STAGE.", "
                            .DBPropositionStage::$FIELD_ID_CONTACT.", "
                            .DBPropositionStage::$FIELD_DOMAINE.", "
                            .DBPropositionStage::$FIELD_INTITULE.", "
                            .DBPropositionStage::$FIELD_SUJET.", "
                            .DBPropositionStage::$FIELD_DATE_DEBUT.", "
                            .DBPropositionStage::$FIELD_DATE_FIN.", "
                            .DBPropositionStage::$FIELD_TECHNO.", "
                            .DBPropositionStage::$FIELD_NB_ETUDIANT_PROP.", "
                            .DBPropositionStage::$FIELD_INDEMNITE_PROP.", "
                            .DBPropositionStage::$FIELD_ETAT.", "
                            .DBPropositionStage::$FIELD_MOTIF_REFUS.", "
                            .DBPropositionStage::$FIELD_MAIL_RESPONSABLE_PROPOSITION.", "
                            .DBPropositionStage::$FIELD_PROMO.", "
                            .DBPropositionStage::$FIELD_DATE_CREATION.", "
                            .DBPropositionStage::$FIELD_DATE_DERNIERE_MODIFICATION.", "
                            .DBPropositionStage::$FIELD_DATE_VALIDATION.", "
                            .DBPropositionStage::$FIELD_DATE_REFUS.", "
                            .DBPropositionStage::$FIELD_DATE_TERMINAISON.", "
                            .DBPropositionStage::$FIELD_DESC_TECHNO_PROP.", "
                            .DBPropositionStage::$FIELD_ID_ENTREPRISE.", "
                            .DBPropositionStage::$FIELD_NOM_MAITRE_STAGE.", "
                            .DBPropositionStage::$FIELD_PRENOM_MAITRE_STAGE.", "
                            .DBPropositionStage::$FIELD_NOM_CONTACT.", "
                            .DBPropositionStage::$FIELD_PRENOM_CONTACT.", "
                            .DBPropositionStage::$FIELD_RAISON_SOCIALE_ENTREPRISE.", "
                            .DBPropositionStage::$FIELD_NB_CANDIDATURE.", "
                            .DBPropositionStage::$FIELD_NB_FICHE." "
                            .") VALUES ("
                            .DBConnector::getDBConnector()->processInt(($maitreStage==null?-1:$maitreStage->getIdContact())).", "
                            .DBConnector::getDBConnector()->processInt(($contact==null?-1:$contact->getIdContact())).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($domaine)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($intitule)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($sujet)).", "
                            .DBConnector::getDBConnector()->computeDate($dateDebut).", "
                            .DBConnector::getDBConnector()->computeDate($dateFin).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($techno)).", "
                            .DBConnector::getDBConnector()->processObject($nbEtudiantProp).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($indemniteProp)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($etat)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($motifRefus)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($mailResponsableProposition)).", "
                            .DBConnector::getDBConnector()->processInt($promo).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateCreation).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateDerniereModification).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateValidation).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateRefus).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateTerminaison).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($descTechnoProp)).", "
                            .DBConnector::getDBConnector()->processInt(($entreprise==null?-1:$entreprise->getIdEntreprise())).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString(($maitreStage==null?"":$maitreStage->getNomContact()))).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString(($maitreStage==null?"":$maitreStage->getPrenomContact()))).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString(($contact==null?"":$contact->getNomContact()))).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString(($contact==null?"":$contact->getPrenomContact()))).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString(($entreprise==null?"":$entreprise->getRaisonsocialeEntreprise()))).", "
							.DBConnector::getDBConnector()->processInt(($nbCandidature)).", "
							.DBConnector::getDBConnector()->processInt(($nbFiche))." "
                            .")";
        
        $id = DBConnector::getDBConnector()->executeQuery($sql);
        
        $obj = DBPropositionStage::getRecords($id);
        assert(count($obj) == 1);
        return $obj[0];
    }

    /**
	* @abstract Méthode statique. Construit une requête de sélection à partir des paramètres, l'exécute, puis retourne un tableau contenant les objets DBPropositionStage correspondants. L'ensemble des paramètres peuvent etre absent, dans ce cas l'ensemble de la table est retournée.
	* @param int Identifiant de la proposition de stage
	* @param int Indentifiant du maitre de stage du stage proposé
	* @param int Identifiant du contact dans l'entreprise pour cette proposition de stage
	* @param String Domaine d'application du stage
	* @param String Intitulé du stage proposé
	* @param String Sujet du stage proposé
	* @param Date Date de début du stage proposé
	* @param Date Date de fin du stage proposé
	* @param String Technologie utilisé pendant le stage proposé
	* @param int Nombre d'étudiant pouvant être accueillie pour cette proposition de stage
	* @param String Indemnité proposé pour le stage
	* @param Enum Etat de la proposition de stage. Prend l'une des valeurs définie dans les variables statiques définies dans cette classe.
	* @param String Motif du refus du stage proposé, NULL si pas de refus
	* @param String Adresse mail du responsable de la proposition de stage
	* @param int Promo de la proposition de stage
	* @param Date Date de création de la proposition
	* @param Date Date de dernière modification de la proposition, null si pas de modification
	* @param Date Date de passage à l'état 'Validee' de la proposition, null si pas validée
	* @param Date Date de passage à l'état 'Refusee' de la proposition, null si pas refusée
	* @param Date Date de passage à l'état 'Terminée' de la proposition, null si pas terminée
	* @param String Description de la technologie utilisée pendant le stage
	* @param int Identifiant de l'entreprise proposant ce stage
	* @param int Nombre d'étudiant qui ont répondu à la proposition de stage.
	* @param int Nombre d'étudiant qui ont envoyé une fiche de stage en rapport avec la proposition de stage.
	* @return Array Tableau contenant les objets de type DBPropositionStage correspondant aux ligne de la base de données que l'on vient de récupérer
	* @access public
	*/
	public static function getRecords($idPropositionStage="", $idMaitreStage="", $idContact="", $domaine="", $intitule="", $sujet="", $dateDebut="", $dateFin="", $techno="", $nbEtudiantProp="", $indemniteProp="", $etat="", $motifRefus="", $mailResponsableProposition="", $promo="", $dateCreation="", $dateDerniereModification="", $dateValidation="", $dateRefus="", $dateTerminaison="", $descTechnoProp="", $idEntreprise="", $nbCandidature="", $nbFiche=""){
        $sql = "SELECT * FROM ".DBPropositionStage::$TABLE_NAME." WHERE 1";
        
        if($idPropositionStage != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_ID_PROPOSITION_STAGE."=".DBConnector::getDBConnector()->processInt($idPropositionStage);
        if($idMaitreStage != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_ID_MAITRE_STAGE."=".DBConnector::getDBConnector()->processInt($idMaitreStage);
        if($idContact != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_ID_CONTACT."=".DBConnector::getDBConnector()->processInt($idContact);
        if($domaine != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_DOMAINE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($domaine));
        if($intitule != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_INTITULE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($intitule));
        if($sujet != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_SUJET."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($sujet));
        if($dateDebut != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_DATE_DEBUT."=".DBConnector::getDBConnector()->computeDate($dateDebut);
        if($dateFin != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_DATE_FIN."=".DBConnector::getDBConnector()->computeDate($dateFin);
        if($techno != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_TECHNO."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($techno));
        if($nbEtudiantProp != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_NB_ETUDIANT_PROP."=".DBConnector::getDBConnector()->processObject($nbEtudiantProp);
        if($indemniteProp != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_INDEMNITE_PROP."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($indemniteProp));
        if($etat != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_ETAT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($etat));
        if($motifRefus != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_MOTIF_REFUS."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($motifRefus));
        if($mailResponsableProposition != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_MAIL_RESPONSABLE_PROPOSITION."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($mailResponsableProposition));
        if($promo != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_PROMO."=".DBConnector::getDBConnector()->processInt($promo);
        if($dateCreation != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_DATE_CREATION."=".DBConnector::getDBConnector()->computeDateTime($dateCreation);
        if($dateDerniereModification != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_DATE_DERNIERE_MODIFICATION."=".DBConnector::getDBConnector()->computeDateTime($dateDerniereModification);
        if($dateValidation != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_DATE_VALIDATION."=".DBConnector::getDBConnector()->computeDateTime($dateValidation);
        if($dateRefus != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_DATE_REFUS."=".DBConnector::getDBConnector()->computeDateTime($dateRefus);
        if($dateTerminaison != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_DATE_TERMINAISON."=".DBConnector::getDBConnector()->computeDateTime($dateTerminaison);
        if($descTechnoProp != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_DESC_TECHNO_PROP."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($descTechnoProp));
        if($idEntreprise != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnector()->processInt($idEntreprise);
        if($nbCandidature != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_NB_CANDIDATURE."=".DBConnector::getDBConnector()->processInt($nbCandidature);
		if($nbFiche != "")
            $sql .= " AND ".DBPropositionStage::$FIELD_NB_FICHE."=".DBConnector::getDBConnector()->processInt($nbFiche);
			
        $res = DBConnector::getDBConnector()->executeQuery($sql);
        
        $return = array();
        $i=0;
        while($result = DBConnector::getDBConnector()->fetchArray($res)) {
            $return[$i] = new DBPropositionStage(
                                            $result[DBPropositionStage::$FIELD_ID_PROPOSITION_STAGE],
                                            $result[DBPropositionStage::$FIELD_ID_MAITRE_STAGE],
                                            $result[DBPropositionStage::$FIELD_ID_CONTACT],
                                            $result[DBPropositionStage::$FIELD_DOMAINE],
                                            $result[DBPropositionStage::$FIELD_INTITULE],
                                            $result[DBPropositionStage::$FIELD_SUJET],
                                            DBConnector::getDBConnector()->decomputeDate($result[DBPropositionStage::$FIELD_DATE_DEBUT]),
                                            DBConnector::getDBConnector()->decomputeDate($result[DBPropositionStage::$FIELD_DATE_FIN]),
                                            $result[DBPropositionStage::$FIELD_TECHNO],
                                            $result[DBPropositionStage::$FIELD_NB_ETUDIANT_PROP],
                                            $result[DBPropositionStage::$FIELD_INDEMNITE_PROP],
                                            $result[DBPropositionStage::$FIELD_ETAT],
                                            $result[DBPropositionStage::$FIELD_MOTIF_REFUS],
                                            $result[DBPropositionStage::$FIELD_MAIL_RESPONSABLE_PROPOSITION],
                                            $result[DBPropositionStage::$FIELD_PROMO],
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBPropositionStage::$FIELD_DATE_CREATION]),
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBPropositionStage::$FIELD_DATE_DERNIERE_MODIFICATION]),
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBPropositionStage::$FIELD_DATE_VALIDATION]),
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBPropositionStage::$FIELD_DATE_REFUS]),
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBPropositionStage::$FIELD_DATE_TERMINAISON]),
                                            $result[DBPropositionStage::$FIELD_DESC_TECHNO_PROP],
                                            $result[DBPropositionStage::$FIELD_ID_ENTREPRISE],
                                            $result[DBPropositionStage::$FIELD_NB_CANDIDATURE],
                                            $result[DBPropositionStage::$FIELD_NB_FICHE]
                                        );
            
            $i++;
        }
        
        return $return;
    }
    
	
	
	/**
	* @abstract Construit une requête d'update à partir des paramètres, l'exécute, puis affecte les informations passé en paramètre dans l'objet DBPropostionStage courant. La clause where de la requete est automatiquement construite avec l'identifiant de la proposition de stage stocké dans l'Objet courant.
	* @param int Identifiant du maitre de stage du stage proposé
	* @param int Identifiant du contact dans l'entreprise pour cette proposition de stage
	* @param String Domaine d'application du stage
	* @param String Intitulé du stage proposé
	* @param String Sujet du stage proposé
	* @param Date Date de début du stage proposé
	* @param Date Date de fin du stage proposé
	* @param String Technologie utilisé pendant le stage proposé
	* @param int Nombre d'étudiant pouvant être accueillie pour cette proposition de stage
	* @param String Indemnité proposé pour le stage
	* @param Enum Etat de la proposition de stage. Prend l'une des valeurs définie dans les variables statiques définies dans cette classe.
	* @param String Motif du refus du stage proposé, NULL si pas de refus
	* @param String Adresse mail du responsable de la proposition de stage
	* @param int Promo de la proposition de stage
	* @param Date Date de création de la proposition
	* @param Date Date de dernière modification de la proposition, null si pas de modification
	* @param Date Date de passage à l'état 'Validee' de la proposition, null si pas validée
	* @param Date Date de passage à l'état 'Refusee' de la proposition, null si pas refusée
	* @param Date Date de passage à l'état 'Terminée' de la proposition, null si pas terminée
	* @param String Description de la technologie utilisée pendant le stage
	* @param int Identifiant de l'entreprise proposant ce stage
	* @param int Nombre d'étudiants qui ont répondu à la proposition de stage.
	* @param int Nombre d'étudiants qui ont envoyé une fiche de stage en rapport avec la proposition de stage.
	* @access public
	*/
	public  function updateRecord($idMaitreStage, $idContact, $domaine, $intitule, $sujet, $dateDebut, $dateFin, $techno, $nbEtudiantProp, $indemniteProp, $etat, $motifRefus, $mailResponsableProposition, $promo, $dateCreation, $dateDerniereModification, $dateValidation, $dateRefus, $dateTerminaison, $descTechnoProp, $idEntreprise, $nbCandidature, $nbFiche){
        
		$sql = "UPDATE ".DBPropositionStage::$TABLE_NAME." SET ";
        $sql .= DBPropositionStage::$FIELD_ID_MAITRE_STAGE."=".DBConnector::getDBConnector()->processInt($idMaitreStage).",";
        $sql .= DBPropositionStage::$FIELD_ID_CONTACT."=".DBConnector::getDBConnector()->processInt($idContact).",";
        $sql .= DBPropositionStage::$FIELD_DOMAINE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($domaine)).",";
        $sql .= DBPropositionStage::$FIELD_INTITULE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($intitule)).",";
        $sql .= DBPropositionStage::$FIELD_SUJET."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($sujet)).",";
        $sql .= DBPropositionStage::$FIELD_DATE_DEBUT."=".DBConnector::getDBConnector()->computeDate($dateDebut).",";
        $sql .= DBPropositionStage::$FIELD_DATE_FIN."=".DBConnector::getDBConnector()->computeDate($dateFin).",";
        $sql .= DBPropositionStage::$FIELD_TECHNO."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($techno)).",";
        $sql .= DBPropositionStage::$FIELD_NB_ETUDIANT_PROP."=".DBConnector::getDBConnector()->processObject($nbEtudiantProp).",";
        $sql .= DBPropositionStage::$FIELD_INDEMNITE_PROP."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($indemniteProp)).",";
        $sql .= DBPropositionStage::$FIELD_ETAT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($etat)).",";
        $sql .= DBPropositionStage::$FIELD_MOTIF_REFUS."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($motifRefus)).",";
        $sql .= DBPropositionStage::$FIELD_MAIL_RESPONSABLE_PROPOSITION."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($mailResponsableProposition)).",";
        $sql .= DBPropositionStage::$FIELD_PROMO."=".DBConnector::getDBConnector()->processInt($promo).",";
        $sql .= DBPropositionStage::$FIELD_DATE_CREATION."=".DBConnector::getDBConnector()->computeDateTime($dateCreation).",";
        $sql .= DBPropositionStage::$FIELD_DATE_DERNIERE_MODIFICATION."=".DBConnector::getDBConnector()->computeDateTime($dateDerniereModification).",";
        $sql .= DBPropositionStage::$FIELD_DATE_VALIDATION."=".DBConnector::getDBConnector()->computeDateTime($dateValidation).",";
        $sql .= DBPropositionStage::$FIELD_DATE_REFUS."=".DBConnector::getDBConnector()->computeDateTime($dateRefus).",";
        $sql .= DBPropositionStage::$FIELD_DATE_TERMINAISON."=".DBConnector::getDBConnector()->computeDateTime($dateTerminaison).",";
        $sql .= DBPropositionStage::$FIELD_DESC_TECHNO_PROP."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($descTechnoProp)).",";
        $sql .= DBPropositionStage::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnector()->processInt($idEntreprise).", ";
		$sql .= DBPropositionStage::$FIELD_NB_CANDIDATURE."=".DBConnector::getDBConnector()->processInt($nbCandidature).", ";
		$sql .= DBPropositionStage::$FIELD_NB_FICHE."=".DBConnector::getDBConnector()->processInt($nbFiche)."";
        
        $sql .= " WHERE 1";
        $sql .= " AND ".DBPropositionStage::$FIELD_ID_PROPOSITION_STAGE."=".DBConnector::getDBConnector()->processInt($this->_idPropositionStage);
        
        DBConnector::getDBConnector()->executeQuery($sql);
        
        $this->_idMaitreStage = $idMaitreStage;
        $this->_idContact = $idContact;
        $this->_domaine = DBConnector::getDBConnector()->echapString($domaine);
        $this->_intitule = DBConnector::getDBConnector()->echapString($intitule);
        $this->_sujet = DBConnector::getDBConnector()->echapString($sujet);
        $this->_dateDebut = $dateDebut;
        $this->_dateFin = $dateFin;
        $this->_techno = DBConnector::getDBConnector()->echapString($techno);
        $this->_nbEtudiantProp = $nbEtudiantProp;
        $this->_indemniteProp = DBConnector::getDBConnector()->echapString($indemniteProp);
        $this->_etat = DBConnector::getDBConnector()->echapString($etat);
        $this->_motifRefus = DBConnector::getDBConnector()->echapString($motifRefus);
        $this->_mailResponsableProposition = DBConnector::getDBConnector()->echapString($mailResponsableProposition);
        $this->_promo = $promo;
        $this->_dateCreation = $dateCreation;
        $this->_dateDerniereModification = $dateDerniereModification;
        $this->_dateValidation = $dateValidation;
        $this->_dateRefus = $dateRefus;
        $this->_dateTerminaison = $dateTerminaison;
        $this->_descTechnoProp = DBConnector::getDBConnector()->echapString($descTechnoProp);
        $this->_idEntreprise = $idEntreprise;
        $this->_nbCandidature = $nbCandidature;
        $this->_nbFiche = $nbFiche;
		
    }
    
	
	/**
	* @abstract Construit une requête de suppression et l'exécute. La clause where de la requete est automatiquement construite avec l'identifiant de la proposition de stage stocké dans l'Objet courant.
	* @access public
	*/
	public  function deleteRecord(){
        $sql = "DELETE FROM ".DBPropositionStage::$TABLE_NAME." WHERE 1";
        $sql .= " AND ".DBPropositionStage::$FIELD_ID_PROPOSITION_STAGE."=".DBConnector::getDBConnector()->processInt($this->_idPropositionStage);
        
        DBConnector::getDBConnector()->executeQuery($sql);
    }


    //méthodes non générées
	/**
	* @abstract Permet d'ajouter une proposition de stage à l'aide de la méthode 'createRecord'. Cette méthode contient moins de paramètre car certains sont automatiquements affectés.
	* @param DBEtreprise Objet contenant les informations de l'entreprise proposant ce stage
	* @param DBContactEtp Objet contenant les informations du maitre de stage du stage proposé
	* @param DBContactEtp Objet contenant les informations du contact dans l'entreprise pour cette proposition de stage
	* @param String Domaine d'application du stage
	* @param String Intitulé du stage proposé
	* @param String Sujet du stage proposé
	* @param Date Date de début du stage proposé
	* @param Date Date de fin du stage proposé
	* @param String Technologie utilisé pendant le stage proposé
	* @param String Description de la technologie utilisée pendant le stage
	* @param int Nombre d'étudiant pouvant être accueillie pour cette proposition de stage
	* @param String Indemnité proposé pour le stage
	* @param String Adresse mail du responsable de la proposition de stage
	* @return DBPropositionStage Objet contenant les informations de la proposition de stage que l'on vient d'inserer
	* @access public
	*/
    public static function addPropositionStage($entreprise,$maitreStage, $contact, $domaine, $intitule, $sujet, $dateDebut, $dateFin, $techno, $descTechnoProp,$nbEtudiantProp, $indemniteProp,$mailRespProp){
            return DBPropositionStage::createRecord(
                                            $maitreStage,
                                            $contact,
                                            $domaine,
                                            $intitule,
                                            $sujet,
                                            $dateDebut,
                                            $dateFin,
                                            $techno,
                                            $nbEtudiantProp,
                                            $indemniteProp,
                                            DBPropositionStage::$ETAT_PROPOSITION_STAGE_ATTENTE_VALIDATION,//état
                                            "",// motif refus
                                            $mailRespProp, // mail du responsable de la proposition
                                            DBConfig::getConfigValue("ANNEE PROMO"),                      //promo
                                            date("d/m/Y H:i:s"),               //date de création
                                            "",   //date de dernière modification
                                            "",             //date de validation
                                            "",                  //date de refus
                                            "",            //date de terminaison
                                            $descTechnoProp,
                                            $entreprise
                                            );
    }

    /**
	* @abstract Méthode statique. Méthode permettant de rendre la base "cohérente" en supprimant les propositions de stage auxquelles aucun type de stage n'a été fourni.
	* @return int Nombre de propositions supprimés
	* @access public
	*/
    public static function supprimerPropositionsSansTypeDeStage(){
        $propositionsSupprimees = 0;

        // Récupération de toutes les propositions existantes
        foreach(DBPropositionStage::getRecords() as $proposition){
            // Si aucun lien dans la table proposition_concerne, la proposition n'a aucun type de stage => on la supprime
            if(count(DBConcerne::getRecords("", $proposition->getIdPropositionStage())) == 0){
                $proposition->deleteRecord();
                $propositionsSupprimees += 1;
            }
        }
        
        return $propositionsSupprimees;
    }
    
	
	/**
	* @abstract Modifie la proposition de stage à partir des attributs de l'objet courant. Cette méthode utilise la méthode 'updateRecord' et lui passe en paramètre les attributs de l'objet courant.
	* @access public
	*/
	public function updatePropositionAvecAttr() {
      $this->updateRecord(
      $this->_idMaitreStage,
      $this->_idContact,
      $this->_domaine,
      $this->_intitule,
      $this->_sujet,
      $this->_dateDebut,
      $this->_dateFin,
      $this->_techno,
      $this->_nbEtudiantProp,
      $this->_indemniteProp,
      $this->_etat,
      $this->_motifRefus,
      $this->_mailResponsableProposition,
      $this->_promo,
      $this->_dateCreation,
      $this->_dateDerniereModification,
      $this->_dateValidation,
      $this->_dateRefus,
      $this->_dateTerminaison,
      $this->_descTechnoProp,
      $this->_idEntreprise,
	  $this->_nbCandidature,
	  $this->_nbFiche
	  );

    }
   
	
	/**
	* @abstract Affecte le nouvel état de la proposition à l'attribut état de la proposition. Affecte la date de validation, de refus ou de terminaison en fonction du nouvel état. Change la date de dernière modification. Modifie la proposition de stage dans la base de données. Envoi de mail au responsable et aux étudiants intéressé en fonction du nouvel état.
	* @param String Nouvel état de la proposition
	* @access public
	*/
	public function setEtatProposition($etat) {
        $this->_etat = $etat;
        switch ($this->_etat) {
        case DBPropositionStage::$ETAT_PROPOSITION_STAGE_ATTENTE_VALIDATION:
            break;
        case DBPropositionStage::$ETAT_PROPOSITION_STAGE_VALIDEE:
            $this->_dateValidation=date("d/m/Y H:i:s");
            break;
        case DBPropositionStage::$ETAT_PROPOSITION_STAGE_REFUSEE:
            $this->_dateRefus=date("d/m/Y H:i:s");
            break;
        case DBPropositionStage::$ETAT_PROPOSITION_STAGE_TERMINEE:
            $this->_dateTerminaison=date("d/m/Y H:i:s");
            break;
        }
        $this->_dateDerniereModification=date("d/m/Y H:i:s");
        $this->updatePropositionAvecAttr();
       
        // Envoi du mail au responsable
        if($this->_etat == DBPropositionStage::$ETAT_PROPOSITION_STAGE_VALIDEE)
            $this->envoiMailResponsableValidation();
        if($this->_etat == DBPropositionStage::$ETAT_PROPOSITION_STAGE_REFUSEE)
            $this->envoiMailResponsableRefus();

        // Envoi de mail aux étudiants pouvant être intéressés par la propositions
        if($this->_etat == DBPropositionStage::$ETAT_PROPOSITION_STAGE_VALIDEE)
            $this->mailEtudiantsInteresses();
   }
   
	/**
	* @abstract Refus de la proposition de stage. Affecte le motif passé en parametre à l'attribut de l'objet, modifie la date et reporte les modifications dans la base.
	* @param String Motif du refus de la proposition de stage
	* @access public
	*/
	public function setMotifRefus($motif) {
       $this->_motifRefus = $motif;
       $this->_dateDerniereModification=date("d/m/Y H:i:s");
       $this->updatePropositionAvecAttr();

   }
    
	
	/**
	* @abstract Récupère dans la base et retourne l'entreprise proposant le stage
	* @return DBEntreprise Objet contentant les informations de l'entreprise proposant le stage en cas de succés, NULL sinon.
	* @access public
	*/
	public function getEntreprise(){
        $entreprises = DBEntreprise::getRecords($this->_idEntreprise);
        if(count($entreprises) == 0) return null;
        else{
            assert(count($entreprises) == 1);
            return $entreprises[0];
        }
    }


	/**
	* @abstract Méthode pour la modification d'une proposition de stage dans la base en fonction des informations passées en parametre. Seules infos modifiable par le site.
	* @param String Domaine d'application du stage proposé
	* @param String Intitule du stage proposé
	* @param String Sujet du stage proposé
	* @param Date Date de début du stage
	* @param Date Date de fin du stage
	* @param String Technologie utilisé pendant le stage
	* @param String Description des technologies utilisé pendant le stage
	* @param int Nombre d'étudiant pouvant être accueilli pour le stage proposé
	* @param String Indemnité pour le stage proposé
	* @param String Adresse mail du responsable de la proposition de stage
	* @access public
	*/
    public function updatePropositionStage($domaine,$intitule,$sujet,$dateDebut,$dateFin,$techno,$descTechno,$nbEtudiant,$indemnite,$emailRespProp) {

        $this->_domaine = $domaine;
        $this->_intitule = $intitule;
        $this->_sujet = $sujet;
        $this->_dateDebut = $dateDebut;
        $this->_dateFin = $dateFin;
        $this->_techno = $techno;
        $this->_nbEtudiantProp = $nbEtudiant;
        $this->_indemniteProp = $indemnite;
        $this->_mailResponsableProposition = $emailRespProp;
        $this->_descTechnoProp = $descTechno;

        $this->_dateDerniereModification = date("d/m/Y H:i:s");

        $this->updatePropositionAvecAttr();

    }

	/**
	* @abstract Permet d'incrémenter le nombre d'étudiant qui ont répondu à la proposition de stage
	* @access public
	*/
	public function incrementeNbCandidature() {
		$this->_nbCandidature++ ;
	}
	
	/**
	* @abstract Permet d'incrémenter le nombre d'étudiant qui ont envoyé une fiche de stage en rapport avec la proposition de stage
	* @access public
	*/
	public function incrementeNbFiche() {
		$this->_nbFiche++ ;
	}
	
	/**
	* @abstract Envoi un mail à tous les étudiants qui peuvent être intéressés par la proposition de stage de l'objet courant
	* @access public
	*/
    public function mailEtudiantsInteresses(){
        // Récupération de tous les étudiants de l'année en cours
        $etudiants = DBEtudiant::getRecords("", "", "", "", "", "", "", "", DBConfig::getConfigValue("ANNEE PROMO"));
        foreach($etudiants as $etd){

            // On regarde si l'étudiant est dans la MIAGe visée par la proposition
            $etdVise = false;
            $miageEtd = $etd->getMiageEtudiant();
            $typesMiageConcernes = DBConcerne::getRecords("", $this->_idPropositionStage);
            $i=0;
            while((!$etdVise) && ($i < count($typesMiageConcernes))){
                $etdVise = ($miageEtd == $typesMiageConcernes[$i]->getTypeStage()->getMiage());
                $i++;
            }

            // Si l'étudiant n'est pas visé, on retourne en début de boucle
            if(!$etdVise)
                continue;
            // On regarde si l'étudiant est déjà lié a une fiche de stage : auquel cas il ne sera pas intéressé par la proposition
            if(count(DBFicheStage::getRecords("", "", "", "", $etd->getIdEtudiant())) != 0)
                continue;
            $adresseMail = "";
            if($etd->getMailfacEtudiant() != "")
                $adresseMail .= (($adresseMail == "")?"":",").$etd->getMailfacEtudiant();
            if($etd->getMailstableEtudiant() != "")
                $adresseMail .= (($adresseMail == "")?"":",").$etd->getMailstableEtudiant();
            if($etd->getMailstageEtudiant() != "")
                $adresseMail .= (($adresseMail == "")?"":",").$etd->getMailstageEtudiant();
                
            // Si l'étudiant a un mail invalide, on n'envoie rien
            if($adresseMail == "")
                continue;
            
            // Si on arrive ici, l'étudiant est "concerné" par la proposition de stage !
            $m = new Mailer(DBPropositionStage::$NOTIFICATION_PROPOSITION_ETD);
            $m->fillTemplateVar("nom_etudiant", $etd->getNomEtudiant());
            $m->fillTemplateVar("prenom_etudiant", $etd->getPrenomEtudiant());
            $m->fillTemplateVar("intitule_stage", $this->_intitule);
            $m->fillTemplateVar("raison_sociale_etp", $this->getEntreprise()->getRaisonsocialeEntreprise());
            $m->fillTemplateVar("sujet_stage", $this->_sujet);
            $m->fillTemplateVar("technologie_stage", $this->_techno);
            $m->fillTemplateVar("description_technologie", $this->_descTechnoProp);
            $m->fillTemplateVar("indemnite_stage", $this->_indemniteProp);
            
            $m->sendMail($adresseMail, "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Proposition de stage MIAGe");
        }
    }
    
	/**
	* @abstract Envoi un mail  de validation de la proposition au responsable
	* @return TRUE si le mail est accepté pour livraison, FALSE sinon
	* @access public
	*/
	private function envoiMailResponsableValidation(){
        $m = new Mailer(DBPropositionStage::$MAILVALIDATIONPROPSTAGE_TEMPLATE);

        $contacts=DBContactEtp::getRecords($this->_idContact);
        $contact=$contacts[0];

        $m->fillTemplateVar("nom_contact", $contact->getNomContact());
        $m->fillTemplateVar("prenom_contact", $contact->getPrenomContact());
        $m->fillTemplateVar("intitule", $this->_intitule);

        $concernes=DBConcerne::getRecords("",$this->_idPropositionStage);

        $listeTypeStage="";
        foreach($concernes as $concerne)
        {
            $cs=DBTypeStage::getRecords($concerne->getIdTypeStage());
            $c=$cs[0];
            if($listeTypeStage!="")
             $listeTypeStage=$listeTypeStage . ",". $c->getLibelleTypeStage();
            else
             $listeTypeStage=$listeTypeStage . $c->getLibelleTypeStage();
        }
        $m->fillTemplateVar("types_stage", $listeTypeStage);
        return $m->sendMail($this->_mailResponsableProposition, "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages ");
    }
    
	/**
	* @abstract Envoi un mail  de refus de la proposition au responsable
	* @return TRUE si le mail est accepté pour livraison, FALSE sinon
	* @access public
	*/
	private function envoiMailResponsableRefus(){
        $m = new Mailer(DBPropositionStage::$MAILREFUSPROPSTAGE_TEMPLATE);

        $contacts=DBContactEtp::getRecords($this->_idContact);
        $contact=$contacts[0];

        $m->fillTemplateVar("nom_contact", $contact->getNomContact());
        $m->fillTemplateVar("prenom_contact", $contact->getPrenomContact());
        $m->fillTemplateVar("motif_refus", $this->_motifRefus);
        $m->fillTemplateVar("intitule", $this->_intitule);

        $concernes=DBConcerne::getRecords("",$this->_idPropositionStage);

        $listeTypeStage="";
        foreach($concernes as $concerne)
        {
            $cs=DBTypeStage::getRecords($concerne->getIdTypeStage());
            $c=$cs[0];
            if($listeTypeStage!="")
             $listeTypeStage=$listeTypeStage . ",". $c->getLibelleTypeStage();
            else
             $listeTypeStage=$listeTypeStage . $c->getLibelleTypeStage();
        }
        $m->fillTemplateVar("types_stage", $listeTypeStage);
        return $m->sendMail($this->_mailResponsableProposition, "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages ");
    }
    
	/**
	* @abstract Envoi un mail aux administrateurs
	* @return TRUE si le mail est accepté pour livraison, FALSE sinon
	* @access public
	*/
	public function notificationAdministrateurAjout(){
        $m = new Mailer(DBPropositionStage::$NOTIFICATION_ADMIN_TEMPLATE);

        $m->fillTemplateVar("raison_sociale_etp", $this->getEntreprise()->getRaisonsocialeEntreprise());
        $m->fillTemplateVar("intitule_proposition", $this->_intitule);
        $m->fillTemplateVar("description_proposition", $this->_sujet);

        return $m->sendMail(DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages : Ajout d'une proposition");
    }
}
?>
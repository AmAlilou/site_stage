<?php
set_include_path(".".PATH_SEPARATOR."..".PATH_SEPARATOR."../..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// G�n�r� via PHPClassGenerator via l'url index.php?nb_champs=45&pgc_url=&nom_table=FicheStage&nom_champ_1=id_stage&type_champ_1=3&taille_champ_1=&champ_facultatif_1=&valeur_defaut_1=&auto_increment_1=on&clef_primaire_1=on&getter_1=on&setter_1=&nom_champ_2=id_type_stage&type_champ_2=3&taille_champ_2=&champ_facultatif_2=&valeur_defaut_2=&auto_increment_2=&clef_primaire_2=&getter_2=on&setter_2=&nom_champ_3=libelle_type_stage&type_champ_3=1&taille_champ_3=255&champ_facultatif_3=&valeur_defaut_3=&auto_increment_3=&clef_primaire_3=&getter_3=on&setter_3=&nom_champ_4=promo_stage&type_champ_4=3&taille_champ_4=&champ_facultatif_4=&valeur_defaut_4=&auto_increment_4=&clef_primaire_4=&getter_4=on&setter_4=&nom_champ_5=id_etudiant&type_champ_5=3&taille_champ_5=&champ_facultatif_5=&valeur_defaut_5=&auto_increment_5=&clef_primaire_5=&getter_5=on&setter_5=&nom_champ_6=nom_etudiant&type_champ_6=1&taille_champ_6=255&champ_facultatif_6=&valeur_defaut_6=&auto_increment_6=&clef_primaire_6=&getter_6=on&setter_6=&nom_champ_7=prenom_etudiant&type_champ_7=1&taille_champ_7=255&champ_facultatif_7=&valeur_defaut_7=&auto_increment_7=&clef_primaire_7=&getter_7=on&setter_7=&nom_champ_8=id_entreprise&type_champ_8=3&taille_champ_8=&champ_facultatif_8=&valeur_defaut_8=&auto_increment_8=&clef_primaire_8=&getter_8=on&setter_8=&nom_champ_9=raison_sociale_entreprise&type_champ_9=1&taille_champ_9=255&champ_facultatif_9=&valeur_defaut_9=&auto_increment_9=&clef_primaire_9=&getter_9=on&setter_9=&nom_champ_10=id_maitre_stage&type_champ_10=3&taille_champ_10=&champ_facultatif_10=on&valeur_defaut_10=&auto_increment_10=&clef_primaire_10=&getter_10=on&setter_10=&nom_champ_11=nom_maitre_stage&type_champ_11=1&taille_champ_11=255&champ_facultatif_11=on&valeur_defaut_11=&auto_increment_11=&clef_primaire_11=&getter_11=on&setter_11=&nom_champ_12=prenom_maitre_stage&type_champ_12=1&taille_champ_12=255&champ_facultatif_12=on&valeur_defaut_12=&auto_increment_12=&clef_primaire_12=&getter_12=on&setter_12=&nom_champ_13=id_signataire_stage&type_champ_13=3&taille_champ_13=&champ_facultatif_13=on&valeur_defaut_13=&auto_increment_13=&clef_primaire_13=&getter_13=on&setter_13=&nom_champ_14=nom_signataire_stage&type_champ_14=1&taille_champ_14=255&champ_facultatif_14=on&valeur_defaut_14=&auto_increment_14=&clef_primaire_14=&getter_14=on&setter_14=&nom_champ_15=prenom_signataire&type_champ_15=1&taille_champ_15=255&champ_facultatif_15=on&valeur_defaut_15=&auto_increment_15=&clef_primaire_15=&getter_15=on&setter_15=&nom_champ_16=intitule_stage&type_champ_16=1&taille_champ_16=255&champ_facultatif_16=on&valeur_defaut_16=&auto_increment_16=&clef_primaire_16=&getter_16=on&setter_16=&nom_champ_17=sujet_stage&type_champ_17=2&taille_champ_17=&champ_facultatif_17=on&valeur_defaut_17=&auto_increment_17=&clef_primaire_17=&getter_17=on&setter_17=&nom_champ_18=date_debut_stage&type_champ_18=8&taille_champ_18=&champ_facultatif_18=on&valeur_defaut_18=&auto_increment_18=&clef_primaire_18=&getter_18=on&setter_18=&nom_champ_19=date_fin_stage&type_champ_19=8&taille_champ_19=&champ_facultatif_19=on&valeur_defaut_19=&auto_increment_19=&clef_primaire_19=&getter_19=on&setter_19=&nom_champ_20=domaine_stage&type_champ_20=1&taille_champ_20=255&champ_facultatif_20=on&valeur_defaut_20=&auto_increment_20=&clef_primaire_20=&getter_20=on&setter_20=&nom_champ_21=techno_stage&type_champ_21=1&taille_champ_21=255&champ_facultatif_21=on&valeur_defaut_21=&auto_increment_21=&clef_primaire_21=&getter_21=on&setter_21=&nom_champ_22=desc_techno_stage&type_champ_22=2&taille_champ_22=&champ_facultatif_22=on&valeur_defaut_22=&auto_increment_22=&clef_primaire_22=&getter_22=on&setter_22=&nom_champ_23=etat_stage&type_champ_23=6&taille_champ_23='En attente de validation','Validée','Refusée','Conventionnée','Terminée'&champ_facultatif_23=&valeur_defaut_23=&auto_increment_23=&clef_primaire_23=&getter_23=on&setter_23=&nom_champ_24=date_creation_suivi&type_champ_24=10&taille_champ_24=&champ_facultatif_24=&valeur_defaut_24=&auto_increment_24=&clef_primaire_24=&getter_24=on&setter_24=&nom_champ_25=date_derniere_modif_suivi&type_champ_25=10&taille_champ_25=&champ_facultatif_25=on&valeur_defaut_25=&auto_increment_25=&clef_primaire_25=&getter_25=on&setter_25=&nom_champ_26=date_validation_suivi&type_champ_26=10&taille_champ_26=&champ_facultatif_26=on&valeur_defaut_26=&auto_increment_26=&clef_primaire_26=&getter_26=on&setter_26=&nom_champ_27=date_conventionnement_suivi&type_champ_27=10&taille_champ_27=&champ_facultatif_27=on&valeur_defaut_27=&auto_increment_27=&clef_primaire_27=&getter_27=on&setter_27=&nom_champ_28=date_finale_suivi&type_champ_28=10&taille_champ_28=&champ_facultatif_28=on&valeur_defaut_28=&auto_increment_28=&clef_primaire_28=&getter_28=on&setter_28=&nom_champ_29=date_refus_suivi&type_champ_29=10&taille_champ_29=&champ_facultatif_29=on&valeur_defaut_29=&auto_increment_29=&clef_primaire_29=&getter_29=on&setter_29=&nom_champ_30=motif_refus_stage_suivi&type_champ_30=2&taille_champ_30=&champ_facultatif_30=on&valeur_defaut_30=&auto_increment_30=&clef_primaire_30=&getter_30=on&setter_30=&nom_champ_31=id_tuteur_stage&type_champ_31=3&taille_champ_31=&champ_facultatif_31=on&valeur_defaut_31=&auto_increment_31=&clef_primaire_31=&getter_31=on&setter_31=&nom_champ_32=nom_tuteur_stage&type_champ_32=1&taille_champ_32=255&champ_facultatif_32=on&valeur_defaut_32=&auto_increment_32=&clef_primaire_32=&getter_32=on&setter_32=&nom_champ_33=prenom_tuteur_stage&type_champ_33=1&taille_champ_33=255&champ_facultatif_33=on&valeur_defaut_33=&auto_increment_33=&clef_primaire_33=&getter_33=on&setter_33=&nom_champ_34=id_relecteur_stage&type_champ_34=3&taille_champ_34=&champ_facultatif_34=on&valeur_defaut_34=&auto_increment_34=&clef_primaire_34=&getter_34=on&setter_34=&nom_champ_35=nom_relecteur_stage&type_champ_35=1&taille_champ_35=255&champ_facultatif_35=on&valeur_defaut_35=&auto_increment_35=&clef_primaire_35=&getter_35=on&setter_35=&nom_champ_36=prenom_relecteur_stage&type_champ_36=1&taille_champ_36=255&champ_facultatif_36=on&valeur_defaut_36=&auto_increment_36=&clef_primaire_36=&getter_36=on&setter_36=&nom_champ_37=date_soutenance_stage&type_champ_37=10&taille_champ_37=&champ_facultatif_37=on&valeur_defaut_37=&auto_increment_37=&clef_primaire_37=&getter_37=on&setter_37=&nom_champ_38=lieu_soutenance_stage&type_champ_38=1&taille_champ_38=255&champ_facultatif_38=on&valeur_defaut_38=&auto_increment_38=&clef_primaire_38=&getter_38=on&setter_38=&nom_champ_39=date_visite_stage&type_champ_39=8&taille_champ_39=&champ_facultatif_39=on&valeur_defaut_39=&auto_increment_39=&clef_primaire_39=&getter_39=on&setter_39=&nom_champ_40=corresp_sujet_travail_visite&type_champ_40=1&taille_champ_40=255&champ_facultatif_40=on&valeur_defaut_40=&auto_increment_40=&clef_primaire_40=&getter_40=on&setter_40=&nom_champ_41=avis_etudiant_visite&type_champ_41=2&taille_champ_41=&champ_facultatif_41=on&valeur_defaut_41=&auto_increment_41=&clef_primaire_41=&getter_41=on&setter_41=&nom_champ_42=avis_maitre_stage_visite&type_champ_42=2&taille_champ_42=&champ_facultatif_42=on&valeur_defaut_42=&auto_increment_42=&clef_primaire_42=&getter_42=on&setter_42=&nom_champ_43=avis_tuteur_visite&type_champ_43=2&taille_champ_43=&champ_facultatif_43=on&valeur_defaut_43=&auto_increment_43=&clef_primaire_43=&getter_43=on&setter_43=&nom_champ_44=id_prop_stage&type_champ_44=3&taille_champ_44=&champ_facultatif_44=on&valeur_defaut_44=&auto_increment_44=&clef_primaire_44=&getter_44=on&setter_44=&nom_champ_45=&type_champ_45=1&taille_champ_45=&champ_facultatif_45=&valeur_defaut_45=&auto_increment_45=&clef_primaire_45=&getter_45=on&setter_45=&


/**
* @package DBClasses
* @abstract Impl�mente la classe ISelectable. Classe correspondant � la table 'fiche_stage' de la base de donn�es. Elle contient �galement un ensemble de m�thodes permettant la gestion de cette table.
*/
 class DBFicheStage implements ISelectable {
//code non g�n�r�
//variables repr�sentant les valeurs de l'enum de l'attribut "etat_stage"

	/**
	* @var String Variable repr�sentant les valeurs de l'enum de l'attribut "etat_stage". Chaine stock�e pour l'�tat attente de validation de la fiche de stage : "En attente de validation"
	*/
    public static $ETAT_STAGE_ATTENTE_VALIDATION = "En attente de validation";
	/**
	* @var String Variable repr�sentant les valeurs de l'enum de l'attribut "etat_stage". Chaine stock�e pour l'�tat valid�e de la fiche de stage : "Validee"
	*/
    public static $ETAT_STAGE_VALIDEE = "Validee";
	/**
	* @var String Variable repr�sentant les valeurs de l'enum de l'attribut "etat_stage". Chaine stock�e pour l'�tat refus�e de la fiche de stage : "Conventionn�e"
	*/
    public static $ETAT_STAGE_SIGNATURE_ENTREPRISE = "Signature Entreprise";
    /**
	* @var String Variable repr�sentant les valeurs de l'enum de l'attribut "etat_stage". Chaine stock�e pour l'�tat refus�e de la fiche de stage : "Conventionn�e"
	*/
    public static $ETAT_STAGE_SIGNATURE_UNIVERSITE = "Signature Universite";
    /**
	* @var String Variable repr�sentant les valeurs de l'enum de l'attribut "etat_stage". Chaine stock�e pour l'�tat termin�e de la fiche de stage : "Terminee"
	*/
	public static $ETAT_STAGE_TERMINEE = "Terminee";
    /**
	* @var String Variable repr�sentant les valeurs de l'enum de l'attribut "etat_stage". Chaine stock�e pour l'�tat refus�e de la fiche de stage : "Refusee"
	*/
	public static $ETAT_STAGE_REFUSEE = "Refusee";
    
    private static $MAILREFUS_TEMPLATE = "/mailTemplates/mailRefusStageEtd";
    private static $MAILVALETD_TEMPLATE = "/mailTemplates/mailValidationFicheEtd";
    private static $MAILVALSEC_TEMPLATE = "/mailTemplates/mailValidationFicheSec";
    private static $MAILCONV_TEMPLATE = "/mailTemplates/mailConventionnementFicheEtd";
    private static $MAILFIN_TEMPLATE = "/mailTemplates/mailFinalisationFicheEtd";
    private static $MAILCREAETD_TEMPLATE = "/mailTemplates/mailCreationFicheEtd";
    private static $MAILCREAADMIN_TEMPLATE = "/mailTemplates/mailCreationFicheAdmin";
    private static $MAILSUIVIFICHE_TEMPLATE = "/mailTemplates/mailFicheSuivi";
//code g�n�r�
//variables de la table concernant les fiches de stages
    private static $TABLE_NAME = "fiche_stage";
    private static $FIELD_ID_STAGE = "id_stage";
    private static $FIELD_ID_TYPE_STAGE = "id_type_stage";
    private static $FIELD_LIBELLE_TYPE_STAGE = "libelle_type_stage";
    private static $FIELD_PROMO_STAGE = "promo_stage";
    private static $FIELD_ID_ETUDIANT = "id_etudiant";
    private static $FIELD_NOM_ETUDIANT = "nom_etudiant";
    private static $FIELD_PRENOM_ETUDIANT = "prenom_etudiant";
    private static $FIELD_ID_ENTREPRISE = "id_entreprise";
    private static $FIELD_RAISON_SOCIALE_ENTREPRISE = "raison_sociale_entreprise";
    private static $FIELD_ID_MAITRE_STAGE = "id_maitre_stage";
    private static $FIELD_NOM_MAITRE_STAGE = "nom_maitre_stage";
    private static $FIELD_PRENOM_MAITRE_STAGE = "prenom_maitre_stage";
    private static $FIELD_ID_SIGNATAIRE_STAGE = "id_signataire_stage";
    private static $FIELD_NOM_SIGNATAIRE_STAGE = "nom_signataire_stage";
    private static $FIELD_PRENOM_SIGNATAIRE = "prenom_signataire";
    private static $FIELD_INTITULE_STAGE = "intitule_stage";
    private static $FIELD_SUJET_STAGE = "sujet_stage";
    private static $FIELD_DATE_DEBUT_STAGE = "date_debut_stage";
    private static $FIELD_DATE_FIN_STAGE = "date_fin_stage";
    private static $FIELD_DOMAINE_STAGE = "domaine_stage";
    private static $FIELD_TECHNO_STAGE = "techno_stage";
    private static $FIELD_DESC_TECHNO_STAGE = "desc_techno_stage";
    private static $FIELD_ETAT_STAGE = "etat_stage";
    private static $FIELD_DATE_CREATION_SUIVI = "date_creation_suivi";
    private static $FIELD_DATE_DERNIERE_MODIF_SUIVI = "date_derniere_modif_suivi";
    private static $FIELD_DATE_VALIDATION_SUIVI = "date_validation_suivi";
    private static $FIELD_DATE_SIGNATURE_ENTREPRISE_SUIVI = "date_signature_entreprise_suivi";
    private static $FIELD_DATE_SIGNATURE_UNIVERSITE_SUIVI = "date_signature_universite_suivi";
    private static $FIELD_DATE_FINALE_SUIVI = "date_finale_suivi";
    private static $FIELD_DATE_REFUS_SUIVI = "date_refus_suivi";
    private static $FIELD_MOTIF_REFUS_STAGE_SUIVI = "motif_refus_stage_suivi";
    private static $FIELD_ID_TUTEUR_STAGE = "id_tuteur_stage";
    private static $FIELD_NOM_TUTEUR_STAGE = "nom_tuteur_stage";
    private static $FIELD_PRENOM_TUTEUR_STAGE = "prenom_tuteur_stage";
    private static $FIELD_ID_RELECTEUR_STAGE = "id_relecteur_stage";
    private static $FIELD_NOM_RELECTEUR_STAGE = "nom_relecteur_stage";
    private static $FIELD_PRENOM_RELECTEUR_STAGE = "prenom_relecteur_stage";
    private static $FIELD_DATE_SOUTENANCE_STAGE = "date_soutenance_stage";
    private static $FIELD_LIEU_SOUTENANCE_STAGE = "lieu_soutenance_stage";
    private static $FIELD_DATE_VISITE_STAGE = "date_visite_stage";
    private static $FIELD_CORRESP_SUJET_TRAVAIL_VISITE = "corresp_sujet_travail_visite";
    private static $FIELD_AVIS_ETUDIANT_VISITE = "avis_etudiant_visite";
    private static $FIELD_AVIS_MAITRE_STAGE_VISITE = "avis_maitre_stage_visite";
    private static $FIELD_AVIS_TUTEUR_VISITE = "avis_tuteur_visite";
    private static $FIELD_ID_PROP_STAGE = "id_prop_stage";
    

    private $_idStage;
    private $_idTypeStage;
    private $_libelleTypeStage;
    private $_promoStage;
    private $_idEtudiant;
    private $_nomEtudiant;
    private $_prenomEtudiant;
    private $_idEntreprise;
    private $_raisonSocialeEntreprise;
    private $_idMaitreStage;
    private $_nomMaitreStage;
    private $_prenomMaitreStage;
    private $_idSignataireStage;
    private $_nomSignataireStage;
    private $_prenomSignataire;
    private $_intituleStage;
    private $_sujetStage;
    private $_dateDebutStage;
    private $_dateFinStage;
    private $_domaineStage;
    private $_technoStage;
    private $_descTechnoStage;
    private $_etatStage;
    private $_dateCreationSuivi;
    private $_dateDerniereModifSuivi;
    private $_dateValidationSuivi;
    private $_dateSignatureEntrepriseSuivi;
    private $_dateSignatureUniversiteSuivi;
    private $_dateFinaleSuivi;
    private $_dateRefusSuivi;
    private $_motifRefusStageSuivi;
    private $_idTuteurStage;
    private $_nomTuteurStage;
    private $_prenomTuteurStage;
    private $_idRelecteurStage;
    private $_nomRelecteurStage;
    private $_prenomRelecteurStage;
    private $_dateSoutenanceStage;
    private $_lieuSoutenanceStage;
    private $_dateVisiteStage;
    private $_correspSujetTravailVisite;
    private $_avisEtudiantVisite;
    private $_avisMaitreStageVisite;
    private $_avisTuteurVisite;
    private $_idPropStage;

	/**
	* @abstract Constructeur prenant en parametre les variables d'une fiche de stage.
	* @param int Identifiant de la fiche de stage.
	* @param int Idenfifiant du type de stage li� � ce stage.
	* @param String Libell� du type de stage li� � ce stage.
	* @param int Ann�e de la fiche de stage
	* @param int Identifiant de l'�tudiant concern� par la fiche de stage
	* @param String Nom de l'�tudiant concern� par la fiche de stage
	* @param String Pr�nom de l'�tudiant concern� par la fiche de stage
	* @param int Identifiant de l'entreprise concern�e par la fiche de stage
	* @param String Raison sociale de l'entreprise concern�e par la fiche de stage
	* @param int Identifiant du maitre de stage
	* @param String Nom du maitre de stage
	* @param String Pr�nom du maitre de stage
	* @param int Identifiant du signataire de stage
	* @param String Nom du signataire de stage
	* @param String Pr�nom du signataire de stage
	* @param String Intitul� du stage
	* @param String Sujet du stage
	* @param Date Date de d�but du stage
	* @param Date Date de fin du stage
	* @param String Domaine d'application du stage
	* @param String Technologie utilis� pendant le stage
	* @param String Description de la technologie utilis�e pendant le stage
	* @param Enum Etat de la fiche de stage. Prend l'une des valeurs d�finie dans les variables statiques d�finies dans cette classe.
	* @param Date Date de la cr�ation de la fiche de stage
	* @param Date Date de la derni�re modification de la fiche de stage
	* @param Date Date de la validation de la fiche de stage
	* @param Date Date du conventionnement de la fiche de stage
	* @param Date Date de la finalisation de la fiche de stage
	* @param Date Date du refus de la fiche de stage
	* @param String Motif du refus de la fiche de stage
	* @param int Idenfifiant du tuteur du stage
	* @param String Nom du tuteur du stage
	* @param String Pr�nom du tuteur du stage
	* @param int Idenfifiant du releteur du stage
	* @param String Nom du releteur du stage
	* @param String Pr�nom du releteur du stage
	* @param DateTime Date et heure de la soutenance du stage
	* @param String Lieu de la soutenance du stage
	* @param Date Date de la visite au stagiaire
	* @param String Evaluation de la corespondance entre le stagiaire et son tuteur
	* @param String Avis de l'�tudiant sur le stage
	* @param String Avis du maitre de stage sur le stage
	* @param String Avis du tuteur sur le stage
	* @param int Identifiant de la proposition de stage. -1 si pas de proposition de stage
	* @access private
	*/
    private  function __construct($idStage, $idTypeStage, $libelleTypeStage, $promoStage, $idEtudiant, $nomEtudiant, $prenomEtudiant, $idEntreprise, $raisonSocialeEntreprise, $idMaitreStage, $nomMaitreStage, $prenomMaitreStage, $idSignataireStage, $nomSignataireStage, $prenomSignataire, $intituleStage, $sujetStage, $dateDebutStage, $dateFinStage, $domaineStage, $technoStage, $descTechnoStage, $etatStage, $dateCreationSuivi, $dateDerniereModifSuivi, $dateValidationSuivi, $dateSignatureEntrepriseSuivi, $dateSignatureUniversiteSuivi, $dateFinaleSuivi, $dateRefusSuivi, $motifRefusStageSuivi, $idTuteurStage, $nomTuteurStage, $prenomTuteurStage, $idRelecteurStage, $nomRelecteurStage, $prenomRelecteurStage, $dateSoutenanceStage, $lieuSoutenanceStage, $dateVisiteStage, $correspSujetTravailVisite, $avisEtudiantVisite, $avisMaitreStageVisite, $avisTuteurVisite, $idPropStage){
        $this->_idStage = $idStage;
        $this->_idTypeStage = $idTypeStage;
        $this->_libelleTypeStage = $libelleTypeStage;
        $this->_promoStage = $promoStage;
        $this->_idEtudiant = $idEtudiant;
        $this->_nomEtudiant = $nomEtudiant;
        $this->_prenomEtudiant = $prenomEtudiant;
        $this->_idEntreprise = $idEntreprise;
        $this->_raisonSocialeEntreprise = $raisonSocialeEntreprise;
        $this->_idMaitreStage = $idMaitreStage;
        $this->_nomMaitreStage = $nomMaitreStage;
        $this->_prenomMaitreStage = $prenomMaitreStage;
        $this->_idSignataireStage = $idSignataireStage;
        $this->_nomSignataireStage = $nomSignataireStage;
        $this->_prenomSignataire = $prenomSignataire;
        $this->_intituleStage = $intituleStage;
        $this->_sujetStage = $sujetStage;
        $this->_dateDebutStage = $dateDebutStage;
        $this->_dateFinStage = $dateFinStage;
        $this->_domaineStage = $domaineStage;
        $this->_technoStage = $technoStage;
        $this->_descTechnoStage = $descTechnoStage;
        $this->_etatStage = $etatStage;
        $this->_dateCreationSuivi = $dateCreationSuivi;
        $this->_dateDerniereModifSuivi = $dateDerniereModifSuivi;
        $this->_dateValidationSuivi = $dateValidationSuivi;
        $this->_dateSignatureEntrepriseSuivi = $dateSignatureEntrepriseSuivi;
        $this->_dateSignatureUniversiteSuivi = $dateSignatureUniversiteSuivi;
        $this->_dateFinaleSuivi = $dateFinaleSuivi;
        $this->_dateRefusSuivi = $dateRefusSuivi;
        $this->_motifRefusStageSuivi = $motifRefusStageSuivi;
        $this->_idTuteurStage = $idTuteurStage;
        $this->_nomTuteurStage = $nomTuteurStage;
        $this->_prenomTuteurStage = $prenomTuteurStage;
        $this->_idRelecteurStage = $idRelecteurStage;
        $this->_nomRelecteurStage = $nomRelecteurStage;
        $this->_prenomRelecteurStage = $prenomRelecteurStage;
        $this->_dateSoutenanceStage = $dateSoutenanceStage;
        $this->_lieuSoutenanceStage = $lieuSoutenanceStage;
        $this->_dateVisiteStage = $dateVisiteStage;
        $this->_correspSujetTravailVisite = $correspSujetTravailVisite;
        $this->_avisEtudiantVisite = $avisEtudiantVisite;
        $this->_avisMaitreStageVisite = $avisMaitreStageVisite;
        $this->_avisTuteurVisite = $avisTuteurVisite;
        $this->_idPropStage = $idPropStage;
    }
    
	
	/**
	* @abstract liste des getters
	* @return Valeur de la variable priv� correspondante
	* @access public
	*/
	public  function getIdStage(){
        return $this->_idStage;
    }
    public  function getIdTypeStage(){
        return $this->_idTypeStage;
    }
    public  function getLibelleTypeStage(){
        return $this->_libelleTypeStage;
    }
    public  function getPromoStage(){
        return $this->_promoStage;
    }
    public  function getIdEtudiant(){
        return $this->_idEtudiant;
    }
    public  function getNomEtudiant(){
        return $this->_nomEtudiant;
    }
    public  function getPrenomEtudiant(){
        return $this->_prenomEtudiant;
    }
    public  function getIdEntreprise(){
        return $this->_idEntreprise;
    }
    public  function getRaisonSocialeEntreprise(){
        return $this->_raisonSocialeEntreprise;
    }
    public  function getIdMaitreStage(){
        return $this->_idMaitreStage;
    }
    public  function getNomMaitreStage(){
        return $this->_nomMaitreStage;
    }
    public  function getPrenomMaitreStage(){
        return $this->_prenomMaitreStage;
    }
    public  function getIdSignataireStage(){
        return $this->_idSignataireStage;
    }
    public  function getNomSignataireStage(){
        return $this->_nomSignataireStage;
    }
    public  function getPrenomSignataire(){
        return $this->_prenomSignataire;
    }
    public  function getIntituleStage(){
        return $this->_intituleStage;
    }
    public  function getSujetStage(){
        return $this->_sujetStage;
    }
    public  function getDateDebutStage(){
        return $this->_dateDebutStage;
    }
    public  function getDateFinStage(){
        return $this->_dateFinStage;
    }
    public  function getDomaineStage(){
        return $this->_domaineStage;
    }
    public  function getTechnoStage(){
        return $this->_technoStage;
    }
    public  function getDescTechnoStage(){
        return $this->_descTechnoStage;
    }
    public  function getEtatStage(){
        return $this->_etatStage;
    }
    public  function getDateCreationSuivi(){
        return $this->_dateCreationSuivi;
    }
    public  function getDateDerniereModifSuivi(){
        return $this->_dateDerniereModifSuivi;
    }
    public  function getDateValidationSuivi(){
        return $this->_dateValidationSuivi;
    }
    public  function getDateSignatureEntrepriseSuivi(){
        return $this->_dateSignatureEntrepriseSuivi;
    }
    public  function getDateSignatureUniversiteSuivi(){
        return $this->_dateSignatureUniversiteSuivi;
    }
    public  function getDateFinaleSuivi(){
        return $this->_dateFinaleSuivi;
    }
    public  function getDateRefusSuivi(){
        return $this->_dateRefusSuivi;
    }
    public  function getMotifRefusStageSuivi(){
        return $this->_motifRefusStageSuivi;
    }
    public  function getIdTuteurStage(){
        return $this->_idTuteurStage;
    }
    public  function getNomTuteurStage(){
        return $this->_nomTuteurStage;
    }
    public  function getPrenomTuteurStage(){
        return $this->_prenomTuteurStage;
    }
    public  function getIdRelecteurStage(){
        return $this->_idRelecteurStage;
    }
    public  function getNomRelecteurStage(){
        return $this->_nomRelecteurStage;
    }
    public  function getPrenomRelecteurStage(){
        return $this->_prenomRelecteurStage;
    }
    public  function getDateSoutenanceStage(){
       // return substr($this->_dateSoutenanceStage,0,strlen($this->_dateSoutenanceStage)-3);
        return $this->_dateSoutenanceStage;
    }
    public  function getLieuSoutenanceStage(){
        return $this->_lieuSoutenanceStage;
    }
    public  function getDateVisiteStage(){
        return $this->_dateVisiteStage;
    }
    public  function getCorrespSujetTravailVisite(){
        return $this->_correspSujetTravailVisite;
    }
    public  function getAvisEtudiantVisite(){
        return $this->_avisEtudiantVisite;
    }
    public  function getAvisMaitreStageVisite(){
        return $this->_avisMaitreStageVisite;
    }
    public  function getAvisTuteurVisite(){
        return $this->_avisTuteurVisite;
    }
    public  function getIdPropStage(){
        return $this->_idPropStage;
    }
	
	
	/**
	* @abstract M�thode statique. V�rifie que la table 'fiche_stage' existe
	* @return Bool TRUE si la table existe, FALSE sinon.
	* @access public
	*/
    public static function tableExists(){
        return DBConnector::getDBConnector()->tableExists(DBFicheStage::$TABLE_NAME);
    }
	
	/**
	* @abstract M�thode statique. Permet de cr�er la table fiche_stage
	* @access public
	*/
    public static function createTable(){
        $sql = "CREATE TABLE `".DBFicheStage::$TABLE_NAME."` (
          
                            `".DBFicheStage::$FIELD_ID_STAGE."` INT(11) NOT NULL  auto_increment,  
                            `".DBFicheStage::$FIELD_ID_TYPE_STAGE."` INT(11) NOT NULL  ,  
                            `".DBFicheStage::$FIELD_LIBELLE_TYPE_STAGE."` VARCHAR(255) NOT NULL  ,  
                            `".DBFicheStage::$FIELD_PROMO_STAGE."` INT(11) NOT NULL  ,  
                            `".DBFicheStage::$FIELD_ID_ETUDIANT."` INT(11) NOT NULL  ,  
                            `".DBFicheStage::$FIELD_NOM_ETUDIANT."` VARCHAR(255) NOT NULL  ,  
                            `".DBFicheStage::$FIELD_PRENOM_ETUDIANT."` VARCHAR(255) NOT NULL  ,  
                            `".DBFicheStage::$FIELD_ID_ENTREPRISE."` INT(11) NOT NULL  ,  
                            `".DBFicheStage::$FIELD_RAISON_SOCIALE_ENTREPRISE."` VARCHAR(255) NOT NULL  ,  
                            `".DBFicheStage::$FIELD_ID_MAITRE_STAGE."` INT(11) NULL  ,  
                            `".DBFicheStage::$FIELD_NOM_MAITRE_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_PRENOM_MAITRE_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_ID_SIGNATAIRE_STAGE."` INT(11) NULL  ,  
                            `".DBFicheStage::$FIELD_NOM_SIGNATAIRE_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_PRENOM_SIGNATAIRE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_INTITULE_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_SUJET_STAGE."` TEXT NULL  ,  
                            `".DBFicheStage::$FIELD_DATE_DEBUT_STAGE."` DATE NULL  ,  
                            `".DBFicheStage::$FIELD_DATE_FIN_STAGE."` DATE NULL  ,  
                            `".DBFicheStage::$FIELD_DOMAINE_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_TECHNO_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_DESC_TECHNO_STAGE."` TEXT NULL  ,  
                            `".DBFicheStage::$FIELD_ETAT_STAGE."` ENUM('"
                                                .DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION."','"
                                                .DBFicheStage::$ETAT_STAGE_VALIDEE."','"
                                                .DBFicheStage::$ETAT_STAGE_REFUSEE."','"
                                                .DBFicheStage::$ETAT_STAGE_SIGNATURE_ENTREPRISE."','"
                                                .DBFicheStage::$ETAT_STAGE_SIGNATURE_UNIVERSITE."','"
                                                .DBFicheStage::$ETAT_STAGE_TERMINEE."') NOT NULL  ,  
                            `".DBFicheStage::$FIELD_DATE_CREATION_SUIVI."` DATETIME NULL  ,  
                            `".DBFicheStage::$FIELD_DATE_DERNIERE_MODIF_SUIVI."` DATETIME NULL  ,  
                            `".DBFicheStage::$FIELD_DATE_VALIDATION_SUIVI."` DATETIME NULL  ,  
                            `".DBFicheStage::$FIELD_DATE_SIGNATURE_ENTREPRISE_SUIVI."` DATETIME NULL  ,
							`".DBFicheStage::$FIELD_DATE_SIGNATURE_UNIVERSITE_SUIVI."` DATETIME NULL  ,  
                            `".DBFicheStage::$FIELD_DATE_FINALE_SUIVI."` DATETIME NULL  ,  
                            `".DBFicheStage::$FIELD_DATE_REFUS_SUIVI."` DATETIME NULL  ,  
                            `".DBFicheStage::$FIELD_MOTIF_REFUS_STAGE_SUIVI."` TEXT NULL  ,  
                            `".DBFicheStage::$FIELD_ID_TUTEUR_STAGE."` INT(11) NULL  ,  
                            `".DBFicheStage::$FIELD_NOM_TUTEUR_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_PRENOM_TUTEUR_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_ID_RELECTEUR_STAGE."` INT(11) NULL  ,  
                            `".DBFicheStage::$FIELD_NOM_RELECTEUR_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_PRENOM_RELECTEUR_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_DATE_SOUTENANCE_STAGE."` DATETIME NULL  ,  
                            `".DBFicheStage::$FIELD_LIEU_SOUTENANCE_STAGE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_DATE_VISITE_STAGE."` DATE NULL  ,  
                            `".DBFicheStage::$FIELD_CORRESP_SUJET_TRAVAIL_VISITE."` VARCHAR(255) NULL  ,  
                            `".DBFicheStage::$FIELD_AVIS_ETUDIANT_VISITE."` TEXT NULL  ,  
                            `".DBFicheStage::$FIELD_AVIS_MAITRE_STAGE_VISITE."` TEXT NULL  ,  
                            `".DBFicheStage::$FIELD_AVIS_TUTEUR_VISITE."` TEXT NULL  ,  
                            `".DBFicheStage::$FIELD_ID_PROP_STAGE."` INT(11) NULL  ,
                            PRIMARY KEY (`".DBFicheStage::$FIELD_ID_STAGE."`)
                ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
        
        
        foreach(explode(";", $sql) as $query)
        {
            if($query != "")
                DBConnector::getDBConnector()->executeQuery($query);
        }
    }
    
	
	/**
	* @abstract Ins�re dans la base de donn�es une nouvelle fiche de stage
	* @param DBTypeStage Objet contenant le type de stage correspondant � la fiche de stage
	* @param DBEtudiant Objet contenant l'�tudiant effectuant le stage
	* @param DBEntreprise Objet contenant l'entreprise dans laquelle le stage s'effectu
	* @param DBContactEtp Objet contenant le maitre de stage
	* @param DBContactEtp Objet contenant le signataire de la fiche de stage
	* @param String Intitul� du stage
	* @param String Sujet du stage
	* @param Date Date de d�but du stage
	* @param Date Date de fin du stage
	* @param String Domaine d'application du stage
	* @param String Technologie utilis�e pendant le stage
	* @param String Description de la technologie utilis�e pendant le stage
	* @param Enum Etat de la fiche de stage. Prend l'une des valeurs d�finie dans les variables statiques d�finies dans cette classe.
	* @param Date Date de la cr�ation de la fiche de stage
	* @param Date Date de la derni�re modification de la fiche de stage
	* @param Date Date de la validation de la fiche de stage
	* @param Date Date de signature entreprise de la fiche de stage
	* @param Date Date de signature universite de la fiche de stage
	* @param Date Date de la finalisation de la fiche de stage
	* @param Date Date du refus de la fiche de stage
	* @param String Motif du refus de la fiche de stage
	* @param DBEnseignant Objet contenant l'enseignant tuteur du stage
	* @param DBEnseignant Objet contenant l'enseignant relecteur du stage
	* @param DateTime Date et heure de la soutenance du stage
	* @param String Lieu de la soutenance du stage
	* @param Date Date de la visite au stagiaire
	* @param String Evaluation de la corespondance entre le stagiaire et son tuteur
	* @param String Avis de l'�tudiant sur le stage
	* @param String Avis du maitre de stage sur le stage
	* @param String Avis du tuteur sur le stage
	* @param DBPropositionStage Objet contenant la proposition de stage.
	* @return DBFicheStage Objet contenant les informations de la fiche de stage que l'on vient d'inserer
	* @access public
	*/
	public static function createRecord($typeStage, $etudiant, $entreprise, $maitreStage, $signataireStage, $intituleStage, $sujetStage, $dateDebutStage, $dateFinStage, $domaineStage, $technoStage, $descTechnoStage, $etatStage, $dateCreationSuivi, $dateDerniereModifSuivi, $dateValidationSuivi, $dateSignatureEntrepriseSuivi, $dateSignatureUniversiteSuivi, $dateFinaleSuivi, $dateRefusSuivi, $motifRefusStageSuivi, $tuteurStage, $relecteurStage, $dateSoutenanceStage, $lieuSoutenanceStage, $dateVisiteStage, $correspSujetTravailVisite, $avisEtudiantVisite, $avisMaitreStageVisite, $avisTuteurVisite, $propStage){
        $sql = "INSERT INTO ".DBFicheStage::$TABLE_NAME." ("
        
                            .DBFicheStage::$FIELD_ID_TYPE_STAGE.", "
                            .DBFicheStage::$FIELD_LIBELLE_TYPE_STAGE.", "
                            .DBFicheStage::$FIELD_PROMO_STAGE.", "
                            .DBFicheStage::$FIELD_ID_ETUDIANT.", "
                            .DBFicheStage::$FIELD_NOM_ETUDIANT.", "
                            .DBFicheStage::$FIELD_PRENOM_ETUDIANT.", "
                            .DBFicheStage::$FIELD_ID_ENTREPRISE.", "
                            .DBFicheStage::$FIELD_RAISON_SOCIALE_ENTREPRISE.", "
                            .DBFicheStage::$FIELD_ID_MAITRE_STAGE.", "
                            .DBFicheStage::$FIELD_NOM_MAITRE_STAGE.", "
                            .DBFicheStage::$FIELD_PRENOM_MAITRE_STAGE.", "
                            .DBFicheStage::$FIELD_ID_SIGNATAIRE_STAGE.", "
                            .DBFicheStage::$FIELD_NOM_SIGNATAIRE_STAGE.", "
                            .DBFicheStage::$FIELD_PRENOM_SIGNATAIRE.", "
                            .DBFicheStage::$FIELD_INTITULE_STAGE.", "
                            .DBFicheStage::$FIELD_SUJET_STAGE.", "
                            .DBFicheStage::$FIELD_DATE_DEBUT_STAGE.", "
                            .DBFicheStage::$FIELD_DATE_FIN_STAGE.", "
                            .DBFicheStage::$FIELD_DOMAINE_STAGE.", "
                            .DBFicheStage::$FIELD_TECHNO_STAGE.", "
                            .DBFicheStage::$FIELD_DESC_TECHNO_STAGE.", "
                            .DBFicheStage::$FIELD_ETAT_STAGE.", "
                            .DBFicheStage::$FIELD_DATE_CREATION_SUIVI.", "
                            .DBFicheStage::$FIELD_DATE_DERNIERE_MODIF_SUIVI.", "
                            .DBFicheStage::$FIELD_DATE_VALIDATION_SUIVI.", "
                            .DBFicheStage::$FIELD_DATE_SIGNATURE_ENTREPRISE_SUIVI.", "
                            .DBFicheStage::$FIELD_DATE_SIGNATURE_UNIVERSITE_SUIVI.", "
                            .DBFicheStage::$FIELD_DATE_FINALE_SUIVI.", "
                            .DBFicheStage::$FIELD_DATE_REFUS_SUIVI.", "
                            .DBFicheStage::$FIELD_MOTIF_REFUS_STAGE_SUIVI.", "
                            .DBFicheStage::$FIELD_ID_TUTEUR_STAGE.", "
                            .DBFicheStage::$FIELD_NOM_TUTEUR_STAGE.", "
                            .DBFicheStage::$FIELD_PRENOM_TUTEUR_STAGE.", "
                            .DBFicheStage::$FIELD_ID_RELECTEUR_STAGE.", "
                            .DBFicheStage::$FIELD_NOM_RELECTEUR_STAGE.", "
                            .DBFicheStage::$FIELD_PRENOM_RELECTEUR_STAGE.", "
                            .DBFicheStage::$FIELD_DATE_SOUTENANCE_STAGE.", "
                            .DBFicheStage::$FIELD_LIEU_SOUTENANCE_STAGE.", "
                            .DBFicheStage::$FIELD_DATE_VISITE_STAGE.", "
                            .DBFicheStage::$FIELD_CORRESP_SUJET_TRAVAIL_VISITE.", "
                            .DBFicheStage::$FIELD_AVIS_ETUDIANT_VISITE.", "
                            .DBFicheStage::$FIELD_AVIS_MAITRE_STAGE_VISITE.", "
                            .DBFicheStage::$FIELD_AVIS_TUTEUR_VISITE.", "
                            .DBFicheStage::$FIELD_ID_PROP_STAGE." "
                            .") VALUES ("
        
                            .DBConnector::getDBConnector()->processInt($typeStage!=NULL?$typeStage->getIdTypeStage():"-1").", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($typeStage!=NULL?$typeStage->getLibelleTypeStage():"-1")).", "
                            .DBConnector::getDBConnector()->processInt($etudiant!=NULL?$etudiant->getPromoEtudiant():"").", "
                            .DBConnector::getDBConnector()->processInt($etudiant!=NULL?$etudiant->getIdEtudiant():"").", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($etudiant!=NULL?$etudiant->getNomEtudiant():"")).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($etudiant!=NULL?$etudiant->getPrenomEtudiant():"")).", "
                            .DBConnector::getDBConnector()->processInt($entreprise!=NULL?$entreprise->getIdEntreprise():"-1").", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($entreprise!=NULL?$entreprise->getRaisonsocialeEntreprise():"")).", "
                            .DBConnector::getDBConnector()->processObject($maitreStage!=NULL?$maitreStage->getIdContact():"-1").", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($maitreStage!=NULL?$maitreStage->getNomContact():"")).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($maitreStage!=NULL?$maitreStage->getPrenomContact():"")).", "
                            .DBConnector::getDBConnector()->processObject($signataireStage!=NULL?$signataireStage->getIdContact():"-1").", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($signataireStage!=NULL?$signataireStage->getNomContact():"")).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($signataireStage!=NULL?$signataireStage->getPrenomContact():"")).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($intituleStage)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($sujetStage)).", "
                            .DBConnector::getDBConnector()->computeDate($dateDebutStage).", "
                            .DBConnector::getDBConnector()->computeDate($dateFinStage).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($domaineStage)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($technoStage)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($descTechnoStage)).", "
                            .DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($etatStage)).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateCreationSuivi).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateDerniereModifSuivi).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateValidationSuivi).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateSignatureEntrepriseSuivi).", "
							.DBConnector::getDBConnector()->computeDateTime($dateSignatureUniversiteSuivi).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateFinaleSuivi).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateRefusSuivi).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($motifRefusStageSuivi)).", "
                            .DBConnector::getDBConnector()->processObject($tuteurStage!=NULL?$tuteurStage->getIdEnseignant():"-1").", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($tuteurStage!=NULL?$tuteurStage->getNomEnseignant():"")).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($tuteurStage!=NULL?$tuteurStage->getPrenomEnseignant():"")).", "
                            .DBConnector::getDBConnector()->processObject($relecteurStage!=NULL?$relecteurStage->getIdEnseignant():"-1").", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($relecteurStage!=NULL?$relecteurStage->getNomEnseignant():"")).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($relecteurStage!=NULL?$relecteurStage->getPrenomEnseignant():"")).", "
                            .DBConnector::getDBConnector()->computeDateTime($dateSoutenanceStage).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($lieuSoutenanceStage)).", "
                            .DBConnector::getDBConnector()->computeDate($dateVisiteStage).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($correspSujetTravailVisite)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($avisEtudiantVisite)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($avisMaitreStageVisite)).", "
                            .DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($avisTuteurVisite)).", "
                            .DBConnector::getDBConnector()->processObject($propStage!=NULL?$propStage->getIdPropositionStage():"-1")." "
                            .")";
        
        $id = DBConnector::getDBConnector()->executeQuery($sql);
        
        $obj = DBFicheStage::getRecords($id);
        assert(count($obj) == 1);
        return $obj[0];
    }
    
	
	
	/**
	* @abstract M�thode statique. Construit une requ�te de s�lection � partir des param�tres, l'ex�cute, puis retourne un tableau contenant les objets DBFicheStage correspondants. L'ensemble des param�tres peuvent etre absent, dans ce cas l'ensemble de la table est retourn�e.
	* @param int Identifiant de la fiche de stage.
	* @param int Idenfifiant du type de stage li� � ce stage.
	* @param String Libell� du type de stage li� � ce stage.
	* @param int Ann�e de la fiche de stage
	* @param int Identifiant de l'�tudiant concern� par la fiche de stage
	* @param String Nom de l'�tudiant concern� par la fiche de stage
	* @param String Pr�nom de l'�tudiant concern� par la fiche de stage
	* @param int Identifiant de l'entreprise concern�e par la fiche de stage
	* @param String Raison sociale de l'entreprise concern�e par la fiche de stage
	* @param int Identifiant du maitre de stage
	* @param String Nom du maitre de stage
	* @param String Pr�nom du maitre de stage
	* @param int Identifiant du signataire de stage
	* @param String Nom du signataire de stage
	* @param String Pr�nom du signataire de stage
	* @param String Intitul� du stage
	* @param String Sujet du stage
	* @param Date Date de d�but du stage
	* @param Date Date de fin du stage
	* @param String Domaine d'application du stage
	* @param String Technologie utilis� pendant le stage
	* @param String Description de la technologie utilis�e pendant le stage
	* @param Enum Etat de la fiche de stage. Prend l'une des valeurs d�finie dans les variables statiques d�finies dans cette classe.
	* @param Date Date de la cr�ation de la fiche de stage
	* @param Date Date de la derni�re modification de la fiche de stage
	* @param Date Date de la validation de la fiche de stage
	* @param Date Date du signature entreprise de la fiche de stage
	* @param Date Date du signature universite de la fiche de stage
	* @param Date Date de la finalisation de la fiche de stage
	* @param Date Date du refus de la fiche de stage
	* @param String Motif du refus de la fiche de stage
	* @param int Idenfifiant du tuteur du stage
	* @param String Nom du tuteur du stage
	* @param String Pr�nom du tuteur du stage
	* @param int Idenfifiant du releteur du stage
	* @param String Nom du releteur du stage
	* @param String Pr�nom du releteur du stage
	* @param DateTime Date et heure de la soutenance du stage
	* @param String Lieu de la soutenance du stage
	* @param Date Date de la visite au stagiaire
	* @param String Evaluation de la corespondance entre le stagiaire et son tuteur
	* @param String Avis de l'�tudiant sur le stage
	* @param String Avis du maitre de stage sur le stage
	* @param String Avis du tuteur sur le stage
	* @param int Identifiant de la proposition de stage. -1 si pas de proposition de stage
	* @return Array Tableau contenant les objets de type DBFicheStage correspondant aux ligne de la base de donn�es que l'on vient de r�cup�rer
	* @access public
	*/
	public static function getRecords($idStage="", $idTypeStage="", $libelleTypeStage="", $promoStage="", $idEtudiant="", $nomEtudiant="", $prenomEtudiant="", $idEntreprise="", $raisonSocialeEntreprise="", $idMaitreStage="", $nomMaitreStage="", $prenomMaitreStage="", $idSignataireStage="", $nomSignataireStage="", $prenomSignataire="", $intituleStage="", $sujetStage="", $dateDebutStage="", $dateFinStage="", $domaineStage="", $technoStage="", $descTechnoStage="", $etatStage="", $dateCreationSuivi="", $dateDerniereModifSuivi="", $dateValidationSuivi="", $dateSignatureEntrepriseSuivi="", $dateSignatureUniversiteSuivi="", $dateFinaleSuivi="", $dateRefusSuivi="", $motifRefusStageSuivi="", $idTuteurStage="", $nomTuteurStage="", $prenomTuteurStage="", $idRelecteurStage="", $nomRelecteurStage="", $prenomRelecteurStage="", $dateSoutenanceStage="", $lieuSoutenanceStage="", $dateVisiteStage="", $correspSujetTravailVisite="", $avisEtudiantVisite="", $avisMaitreStageVisite="", $avisTuteurVisite="", $idPropStage=""){
        $sql = "SELECT * FROM ".DBFicheStage::$TABLE_NAME." WHERE 1";
        
        if($idStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_ID_STAGE."=".DBConnector::getDBConnector()->processInt($idStage);
        if($idTypeStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_ID_TYPE_STAGE."=".DBConnector::getDBConnector()->processInt($idTypeStage);
        if($libelleTypeStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_LIBELLE_TYPE_STAGE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($libelleTypeStage));
        if($promoStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_PROMO_STAGE."=".DBConnector::getDBConnector()->processInt($promoStage);
        if($idEtudiant != "")
            $sql .= " AND ".DBFicheStage::$FIELD_ID_ETUDIANT."=".DBConnector::getDBConnector()->processInt($idEtudiant);
        if($nomEtudiant != "")
            $sql .= " AND ".DBFicheStage::$FIELD_NOM_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($nomEtudiant));
        if($prenomEtudiant != "")
            $sql .= " AND ".DBFicheStage::$FIELD_PRENOM_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($prenomEtudiant));
        if($idEntreprise != "")
            $sql .= " AND ".DBFicheStage::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnector()->processInt($idEntreprise);
        if($raisonSocialeEntreprise != "")
            $sql .= " AND ".DBFicheStage::$FIELD_RAISON_SOCIALE_ENTREPRISE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($raisonSocialeEntreprise));
        if($idMaitreStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_ID_MAITRE_STAGE."=".DBConnector::getDBConnector()->processObject($idMaitreStage);
        if($nomMaitreStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_NOM_MAITRE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($nomMaitreStage));
        if($prenomMaitreStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_PRENOM_MAITRE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($prenomMaitreStage));
        if($idSignataireStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_ID_SIGNATAIRE_STAGE."=".DBConnector::getDBConnector()->processObject($idSignataireStage);
        if($nomSignataireStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_NOM_SIGNATAIRE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($nomSignataireStage));
        if($prenomSignataire != "")
            $sql .= " AND ".DBFicheStage::$FIELD_PRENOM_SIGNATAIRE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($prenomSignataire));
        if($intituleStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_INTITULE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($intituleStage));
        if($sujetStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_SUJET_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($sujetStage));
        if($dateDebutStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_DEBUT_STAGE."=".DBConnector::getDBConnector()->computeDate($dateDebutStage);
        if($dateFinStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_FIN_STAGE."=".DBConnector::getDBConnector()->computeDate($dateFinStage);
        if($domaineStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DOMAINE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($domaineStage));
        if($technoStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_TECHNO_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($technoStage));
        if($descTechnoStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DESC_TECHNO_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($descTechnoStage));
        if($etatStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_ETAT_STAGE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($etatStage));
        if($dateCreationSuivi != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_CREATION_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateCreationSuivi);
        if($dateDerniereModifSuivi != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_DERNIERE_MODIF_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateDerniereModifSuivi);
        if($dateValidationSuivi != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_VALIDATION_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateValidationSuivi);
        if($dateSignatureEntrepriseSuivi != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_SIGNATURE_ENTREPRISE_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateSignatureEntrepriseSuivi);
		if($dateSignatureUniversiteSuivi != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_SIGNATURE_UNIVERSITE_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateSignatureUniversiteSuivi);
        if($dateFinaleSuivi != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_FINALE_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateFinaleSuivi);
        if($dateRefusSuivi != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_REFUS_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateRefusSuivi);
        if($motifRefusStageSuivi != "")
            $sql .= " AND ".DBFicheStage::$FIELD_MOTIF_REFUS_STAGE_SUIVI."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($motifRefusStageSuivi));
        if($idTuteurStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_ID_TUTEUR_STAGE."=".DBConnector::getDBConnector()->processObject($idTuteurStage);
        if($nomTuteurStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_NOM_TUTEUR_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($nomTuteurStage));
        if($prenomTuteurStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_PRENOM_TUTEUR_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($prenomTuteurStage));
        if($idRelecteurStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_ID_RELECTEUR_STAGE."=".DBConnector::getDBConnector()->processObject($idRelecteurStage);
        if($nomRelecteurStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_NOM_RELECTEUR_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($nomRelecteurStage));
        if($prenomRelecteurStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_PRENOM_RELECTEUR_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($prenomRelecteurStage));
        if($dateSoutenanceStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_SOUTENANCE_STAGE."=".DBConnector::getDBConnector()->computeDateTime($dateSoutenanceStage);
        if($lieuSoutenanceStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_LIEU_SOUTENANCE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($lieuSoutenanceStage));
        if($dateVisiteStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_DATE_VISITE_STAGE."=".DBConnector::getDBConnector()->computeDate($dateVisiteStage);
        if($correspSujetTravailVisite != "")
            $sql .= " AND ".DBFicheStage::$FIELD_CORRESP_SUJET_TRAVAIL_VISITE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($correspSujetTravailVisite));
        if($avisEtudiantVisite != "")
            $sql .= " AND ".DBFicheStage::$FIELD_AVIS_ETUDIANT_VISITE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($avisEtudiantVisite));
        if($avisMaitreStageVisite != "")
            $sql .= " AND ".DBFicheStage::$FIELD_AVIS_MAITRE_STAGE_VISITE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($avisMaitreStageVisite));
        if($avisTuteurVisite != "")
            $sql .= " AND ".DBFicheStage::$FIELD_AVIS_TUTEUR_VISITE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($avisTuteurVisite));
        if($idPropStage != "")
            $sql .= " AND ".DBFicheStage::$FIELD_ID_PROP_STAGE."=".DBConnector::getDBConnector()->processObject($idPropStage);
            
        
        $res = DBConnector::getDBConnector()->executeQuery($sql);
        
        $return = array();
        $i=0;
        while($result = DBConnector::getDBConnector()->fetchArray($res))
        {
            $return[$i] = new DBFicheStage(
                                            $result[DBFicheStage::$FIELD_ID_STAGE],
                                            $result[DBFicheStage::$FIELD_ID_TYPE_STAGE],
                                            $result[DBFicheStage::$FIELD_LIBELLE_TYPE_STAGE],
                                            $result[DBFicheStage::$FIELD_PROMO_STAGE],
                                            $result[DBFicheStage::$FIELD_ID_ETUDIANT],
                                            $result[DBFicheStage::$FIELD_NOM_ETUDIANT],
                                            $result[DBFicheStage::$FIELD_PRENOM_ETUDIANT],
                                            $result[DBFicheStage::$FIELD_ID_ENTREPRISE],
                                            $result[DBFicheStage::$FIELD_RAISON_SOCIALE_ENTREPRISE],
                                            $result[DBFicheStage::$FIELD_ID_MAITRE_STAGE],
                                            $result[DBFicheStage::$FIELD_NOM_MAITRE_STAGE],
                                            $result[DBFicheStage::$FIELD_PRENOM_MAITRE_STAGE],
                                            $result[DBFicheStage::$FIELD_ID_SIGNATAIRE_STAGE],
                                            $result[DBFicheStage::$FIELD_NOM_SIGNATAIRE_STAGE],
                                            $result[DBFicheStage::$FIELD_PRENOM_SIGNATAIRE],
                                            $result[DBFicheStage::$FIELD_INTITULE_STAGE],
                                            $result[DBFicheStage::$FIELD_SUJET_STAGE],
                                            DBConnector::getDBConnector()->decomputeDate($result[DBFicheStage::$FIELD_DATE_DEBUT_STAGE]),
                                            DBConnector::getDBConnector()->decomputeDate($result[DBFicheStage::$FIELD_DATE_FIN_STAGE]),
                                            $result[DBFicheStage::$FIELD_DOMAINE_STAGE],
                                            $result[DBFicheStage::$FIELD_TECHNO_STAGE],
                                            $result[DBFicheStage::$FIELD_DESC_TECHNO_STAGE],
                                            $result[DBFicheStage::$FIELD_ETAT_STAGE],
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBFicheStage::$FIELD_DATE_CREATION_SUIVI]),
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBFicheStage::$FIELD_DATE_DERNIERE_MODIF_SUIVI]),
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBFicheStage::$FIELD_DATE_VALIDATION_SUIVI]),
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBFicheStage::$FIELD_DATE_SIGNATURE_ENTREPRISE_SUIVI]),
											DBConnector::getDBConnector()->decomputeDateTime($result[DBFicheStage::$FIELD_DATE_SIGNATURE_UNIVERSITE_SUIVI]),
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBFicheStage::$FIELD_DATE_FINALE_SUIVI]),
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBFicheStage::$FIELD_DATE_REFUS_SUIVI]),
                                            $result[DBFicheStage::$FIELD_MOTIF_REFUS_STAGE_SUIVI],
                                            $result[DBFicheStage::$FIELD_ID_TUTEUR_STAGE],
                                            $result[DBFicheStage::$FIELD_NOM_TUTEUR_STAGE],
                                            $result[DBFicheStage::$FIELD_PRENOM_TUTEUR_STAGE],
                                            $result[DBFicheStage::$FIELD_ID_RELECTEUR_STAGE],
                                            $result[DBFicheStage::$FIELD_NOM_RELECTEUR_STAGE],
                                            $result[DBFicheStage::$FIELD_PRENOM_RELECTEUR_STAGE],
                                            DBConnector::getDBConnector()->decomputeDateTime($result[DBFicheStage::$FIELD_DATE_SOUTENANCE_STAGE]),
                                            $result[DBFicheStage::$FIELD_LIEU_SOUTENANCE_STAGE],
                                            DBConnector::getDBConnector()->decomputeDate($result[DBFicheStage::$FIELD_DATE_VISITE_STAGE]),
                                            $result[DBFicheStage::$FIELD_CORRESP_SUJET_TRAVAIL_VISITE],
                                            $result[DBFicheStage::$FIELD_AVIS_ETUDIANT_VISITE],
                                            $result[DBFicheStage::$FIELD_AVIS_MAITRE_STAGE_VISITE],
                                            $result[DBFicheStage::$FIELD_AVIS_TUTEUR_VISITE],
                                            $result[DBFicheStage::$FIELD_ID_PROP_STAGE]
                                        );
            
            $i++;
        }
        
        return $return;
    }
    
	
	
	/**
	* @abstract Construit une requ�te d'update � partir des param�tres, l'ex�cute, puis affecte les informations pass� en param�tre dans l'objet DBPropostionStage courant. La clause where de la requete est automatiquement construite avec l'identifiant de la proposition de stage stock� dans l'Objet courant.
	* @param DBTypeStage Objet contenant le type de stage correspondant � la fiche de stage
	* @param DBEtudiant Objet contenant l'�tudiant effectuant le stage
	* @param DBEntreprise Objet contenant l'entreprise dans laquelle le stage s'effectu
	* @param DBContactEtp Objet contenant le maitre de stage
	* @param DBContactEtp Objet contenant le signataire de la fiche de stage
	* @param String Intitul� du stage
	* @param String Sujet du stage
	* @param Date Date de d�but du stage
	* @param Date Date de fin du stage
	* @param String Domaine d'application du stage
	* @param String Technologie utilis�e pendant le stage
	* @param String Description de la technologie utilis�e pendant le stage
	* @param Enum Etat de la fiche de stage. Prend l'une des valeurs d�finie dans les variables statiques d�finies dans cette classe.
	* @param Date Date de la cr�ation de la fiche de stage
	* @param Date Date de la derni�re modification de la fiche de stage
	* @param Date Date de la validation de la fiche de stage
	* @param Date Date de signature entreprise de la fiche de stage
	* @param Date Date de signature universite de la fiche de stage
	* @param Date Date de la finalisation de la fiche de stage
	* @param Date Date du refus de la fiche de stage
	* @param String Motif du refus de la fiche de stage
	* @param DBEnseignant Objet contenant l'enseignant tuteur du stage
	* @param DBEnseignant Objet contenant l'enseignant relecteur du stage
	* @param DateTime Date et heure de la soutenance du stage
	* @param String Lieu de la soutenance du stage
	* @param Date Date de la visite au stagiaire
	* @param String Evaluation de la corespondance entre le stagiaire et son tuteur
	* @param String Avis de l'�tudiant sur le stage
	* @param String Avis du maitre de stage sur le stage
	* @param String Avis du tuteur sur le stage
	* @param DBPropositionStage Objet contenant la proposition de stage.
	* @access public
	*/
	public function updateRecord($typeStage, $etudiant, $entreprise, $maitreStage, $signataireStage, $intituleStage, $sujetStage, $dateDebutStage, $dateFinStage, $domaineStage, $technoStage, $descTechnoStage, $etatStage, $dateCreationSuivi, $dateDerniereModifSuivi, $dateValidationSuivi, $dateSignatureEntrepriseSuivi, $dateSignatureUniversiteSuivi, $dateFinaleSuivi, $dateRefusSuivi, $motifRefusStageSuivi, $tuteurStage, $relecteurStage, $dateSoutenanceStage, $lieuSoutenanceStage, $dateVisiteStage, $correspSujetTravailVisite, $avisEtudiantVisite, $avisMaitreStageVisite, $avisTuteurVisite, $propStage){
        $sql = "UPDATE ".DBFicheStage::$TABLE_NAME." SET ";
        
        $sql .= DBFicheStage::$FIELD_ID_TYPE_STAGE."=".DBConnector::getDBConnector()->processInt($typeStage!=NULL?$typeStage->getIdTypeStage():"-1").",";
        $sql .= DBFicheStage::$FIELD_LIBELLE_TYPE_STAGE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($typeStage!=NULL?$typeStage->getLibelleTypeStage():"")).",";
        $sql .= DBFicheStage::$FIELD_PROMO_STAGE."=".DBConnector::getDBConnector()->processInt($etudiant!=NULL?$etudiant->getPromoEtudiant():"").",";
        $sql .= DBFicheStage::$FIELD_ID_ETUDIANT."=".DBConnector::getDBConnector()->processInt($etudiant!=NULL?$etudiant->getIdEtudiant():"-1").",";
        $sql .= DBFicheStage::$FIELD_NOM_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($etudiant!=NULL?$etudiant->getNomEtudiant():"")).",";
        $sql .= DBFicheStage::$FIELD_PRENOM_ETUDIANT."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($etudiant!=NULL?$etudiant->getPrenomEtudiant():"")).",";
        $sql .= DBFicheStage::$FIELD_ID_ENTREPRISE."=".DBConnector::getDBConnector()->processInt($entreprise!=NULL?$entreprise->getIdEntreprise():"-1").",";
        $sql .= DBFicheStage::$FIELD_RAISON_SOCIALE_ENTREPRISE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($entreprise!=NULL?$entreprise->getRaisonsocialeEntreprise():"")).",";
        $sql .= DBFicheStage::$FIELD_ID_MAITRE_STAGE."=".DBConnector::getDBConnector()->processObject($maitreStage!=NULL?$maitreStage->getIdContact():"-1").",";
        $sql .= DBFicheStage::$FIELD_NOM_MAITRE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($maitreStage!=NULL?$maitreStage->getNomContact():"")).",";
        $sql .= DBFicheStage::$FIELD_PRENOM_MAITRE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($maitreStage!=NULL?$maitreStage->getPrenomContact():"-1")).",";
        $sql .= DBFicheStage::$FIELD_ID_SIGNATAIRE_STAGE."=".DBConnector::getDBConnector()->processObject($signataireStage!=NULL?$signataireStage->getIdContact():"-1").",";
        $sql .= DBFicheStage::$FIELD_NOM_SIGNATAIRE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($signataireStage!=NULL?$signataireStage->getNomContact():"")).",";
        $sql .= DBFicheStage::$FIELD_PRENOM_SIGNATAIRE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($signataireStage!=NULL?$signataireStage->getPrenomContact():"")).",";
        $sql .= DBFicheStage::$FIELD_INTITULE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($intituleStage)).",";
        $sql .= DBFicheStage::$FIELD_SUJET_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($sujetStage)).",";
        $sql .= DBFicheStage::$FIELD_DATE_DEBUT_STAGE."=".DBConnector::getDBConnector()->computeDate($dateDebutStage).",";
        $sql .= DBFicheStage::$FIELD_DATE_FIN_STAGE."=".DBConnector::getDBConnector()->computeDate($dateFinStage).",";
        $sql .= DBFicheStage::$FIELD_DOMAINE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($domaineStage)).",";
        $sql .= DBFicheStage::$FIELD_TECHNO_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($technoStage)).",";
        $sql .= DBFicheStage::$FIELD_DESC_TECHNO_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($descTechnoStage)).",";
        $sql .= DBFicheStage::$FIELD_ETAT_STAGE."=".DBConnector::getDBConnector()->processString(DBConnector::getDBConnector()->echapString($etatStage)).",";
        $sql .= DBFicheStage::$FIELD_DATE_CREATION_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateCreationSuivi).",";
        $sql .= DBFicheStage::$FIELD_DATE_DERNIERE_MODIF_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateDerniereModifSuivi).",";
        $sql .= DBFicheStage::$FIELD_DATE_VALIDATION_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateValidationSuivi).",";
        $sql .= DBFicheStage::$FIELD_DATE_SIGNATURE_ENTREPRISE_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateSignatureEntrepriseSuivi).",";
		$sql .= DBFicheStage::$FIELD_DATE_SIGNATURE_UNIVERSITE_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateSignatureUniversiteSuivi).",";
        $sql .= DBFicheStage::$FIELD_DATE_FINALE_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateFinaleSuivi).",";
        $sql .= DBFicheStage::$FIELD_DATE_REFUS_SUIVI."=".DBConnector::getDBConnector()->computeDateTime($dateRefusSuivi).",";
        $sql .= DBFicheStage::$FIELD_MOTIF_REFUS_STAGE_SUIVI."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($motifRefusStageSuivi)).",";
        $sql .= DBFicheStage::$FIELD_ID_TUTEUR_STAGE."=".DBConnector::getDBConnector()->processObject($tuteurStage!=NULL?$tuteurStage->getIdEnseignant():"-1").",";
        $sql .= DBFicheStage::$FIELD_NOM_TUTEUR_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($tuteurStage!=NULL?$tuteurStage->getNomEnseignant():"")).",";
        $sql .= DBFicheStage::$FIELD_PRENOM_TUTEUR_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($tuteurStage!=NULL?$tuteurStage->getPrenomEnseignant():"")).",";
        $sql .= DBFicheStage::$FIELD_ID_RELECTEUR_STAGE."=".DBConnector::getDBConnector()->processObject($relecteurStage!=NULL?$relecteurStage->getIdEnseignant():"-1").",";
        $sql .= DBFicheStage::$FIELD_NOM_RELECTEUR_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($relecteurStage!=NULL?$relecteurStage->getNomEnseignant():"")).",";
        $sql .= DBFicheStage::$FIELD_PRENOM_RELECTEUR_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($relecteurStage!=NULL?$relecteurStage->getPrenomEnseignant():"")).",";
        $sql .= DBFicheStage::$FIELD_DATE_SOUTENANCE_STAGE."=".DBConnector::getDBConnector()->computeDateTime($dateSoutenanceStage).",";
        $sql .= DBFicheStage::$FIELD_LIEU_SOUTENANCE_STAGE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($lieuSoutenanceStage)).",";
        $sql .= DBFicheStage::$FIELD_DATE_VISITE_STAGE."=".DBConnector::getDBConnector()->computeDate($dateVisiteStage).",";
        $sql .= DBFicheStage::$FIELD_CORRESP_SUJET_TRAVAIL_VISITE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($correspSujetTravailVisite)).",";
        $sql .= DBFicheStage::$FIELD_AVIS_ETUDIANT_VISITE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($avisEtudiantVisite)).",";
        $sql .= DBFicheStage::$FIELD_AVIS_MAITRE_STAGE_VISITE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($avisMaitreStageVisite)).",";
        $sql .= DBFicheStage::$FIELD_AVIS_TUTEUR_VISITE."=".DBConnector::getDBConnector()->processObject(DBConnector::getDBConnector()->echapString($avisTuteurVisite)).",";
        $sql .= DBFicheStage::$FIELD_ID_PROP_STAGE."=".DBConnector::getDBConnector()->processObject($propStage!=NULL?$propStage->getIdPropositionStage():"-1")."";
        
        $sql .= " WHERE 1";
        $sql .= " AND ".DBFicheStage::$FIELD_ID_STAGE."=".DBConnector::getDBConnector()->processInt($this->_idStage);
        
        DBConnector::getDBConnector()->executeQuery($sql);
        
        $this->_idTypeStage = $typeStage!=NULL?$typeStage->getIdTypeStage():"-1";
        $this->_libelleTypeStage = DBConnector::getDBConnector()->echapString($typeStage!=NULL?$typeStage->getLibelleTypeStage():"-1");
        $this->_promoStage = $etudiant!=NULL?$etudiant->getPromoEtudiant():"";
        $this->_idEtudiant = $etudiant!=NULL?$etudiant->getIdEtudiant():"";
        $this->_nomEtudiant = DBConnector::getDBConnector()->echapString($etudiant!=NULL?$etudiant->getNomEtudiant():"");
        $this->_prenomEtudiant = DBConnector::getDBConnector()->echapString($etudiant!=NULL?$etudiant->getPrenomEtudiant():"");
        $this->_idEntreprise = $entreprise!=NULL?$entreprise->getIdEntreprise():"-1";
        $this->_raisonSocialeEntreprise = DBConnector::getDBConnector()->echapString($entreprise!=NULL?$entreprise->getRaisonsocialeEntreprise():"");
        $this->_idMaitreStage = $maitreStage!=NULL?$maitreStage->getIdContact():"-1";
        $this->_nomMaitreStage = DBConnector::getDBConnector()->echapString($maitreStage!=NULL?$maitreStage->getNomContact():"");
        $this->_prenomMaitreStage = DBConnector::getDBConnector()->echapString($maitreStage!=NULL?$maitreStage->getPrenomContact():"");
        $this->_idSignataireStage = $signataireStage!=NULL?$signataireStage->getIdContact():"-1";
        $this->_nomSignataireStage = DBConnector::getDBConnector()->echapString($signataireStage!=NULL?$signataireStage->getNomContact():"");
        $this->_prenomSignataire = DBConnector::getDBConnector()->echapString($signataireStage!=NULL?$signataireStage->getPrenomContact():"");
        $this->_intituleStage = DBConnector::getDBConnector()->echapString($intituleStage);
        $this->_sujetStage = DBConnector::getDBConnector()->echapString($sujetStage);
        $this->_dateDebutStage = $dateDebutStage;
        $this->_dateFinStage = $dateFinStage;
        $this->_domaineStage = DBConnector::getDBConnector()->echapString($domaineStage);
        $this->_technoStage = DBConnector::getDBConnector()->echapString($technoStage);
        $this->_descTechnoStage = DBConnector::getDBConnector()->echapString($descTechnoStage);
        $this->_etatStage = DBConnector::getDBConnector()->echapString($etatStage);
        $this->_dateCreationSuivi = $dateCreationSuivi;
        $this->_dateDerniereModifSuivi = $dateDerniereModifSuivi;
        $this->_dateValidationSuivi = $dateValidationSuivi;
        $this->_dateSignatureEntrepriseSuivi = $dateSignatureEntrepriseSuivi;
		$this->_dateSignatureUniversiteSuivi = $dateSignatureUniversiteSuivi;
        $this->_dateFinaleSuivi = $dateFinaleSuivi;
        $this->_dateRefusSuivi = $dateRefusSuivi;
        $this->_motifRefusStageSuivi = DBConnector::getDBConnector()->echapString($motifRefusStageSuivi);
        $this->_idTuteurStage = $tuteurStage!=NULL?$tuteurStage->getIdEnseignant():"-1";
        $this->_nomTuteurStage = DBConnector::getDBConnector()->echapString($tuteurStage!=NULL?$tuteurStage->getNomEnseignant():"");
        $this->_prenomTuteurStage = DBConnector::getDBConnector()->echapString($tuteurStage!=NULL?$tuteurStage->getPrenomEnseignant():"");
        $this->_idRelecteurStage = $relecteurStage!=NULL?$relecteurStage->getIdEnseignant():"-1";
        $this->_nomRelecteurStage = DBConnector::getDBConnector()->echapString($relecteurStage!=NULL?$relecteurStage->getNomEnseignant():"");
        $this->_prenomRelecteurStage = DBConnector::getDBConnector()->echapString($relecteurStage!=NULL?$relecteurStage->getPrenomEnseignant():"-1");
        $this->_dateSoutenanceStage = $dateSoutenanceStage;
        $this->_lieuSoutenanceStage = DBConnector::getDBConnector()->echapString($lieuSoutenanceStage);
        $this->_dateVisiteStage = $dateVisiteStage;
        $this->_correspSujetTravailVisite = DBConnector::getDBConnector()->echapString($correspSujetTravailVisite);
        $this->_avisEtudiantVisite = DBConnector::getDBConnector()->echapString($avisEtudiantVisite);
        $this->_avisMaitreStageVisite = DBConnector::getDBConnector()->echapString($avisMaitreStageVisite);
        $this->_avisTuteurVisite = DBConnector::getDBConnector()->echapString($avisTuteurVisite);
        $this->_idPropStage = $propStage!=NULL?$propStage->getIdPropositionStage():"-1";
    }
    
	
	/**
	* @abstract Construit une requ�te de suppression et l'ex�cute. La clause where de la requete est automatiquement construite avec l'identifiant de la fiche de stage stock� dans l'Objet courant.
	* @access public
	*/
	public  function deleteRecord(){
        $sql = "DELETE FROM ".DBFicheStage::$TABLE_NAME." WHERE 1";        
        $sql .= " AND ".DBFicheStage::$FIELD_ID_STAGE."=".DBConnector::getDBConnector()->processInt($this->_idStage);
        DBConnector::getDBConnector()->executeQuery($sql);
    }

//m�thodes non g�n�r�es
//renvois des cles etrangeres sous forme d'objet
	/**
	* @abstract Retourne le type du stage sous la forme d'objet
	* @return DBTypeStage Objet contenant les informations du type du stage en cas de succ�s, FALSE sinon.
	* @access public
	*/
    public function getTypeStage(){
        $liste_typesStage = DBTypeStage::getRecords($this->_idTypeStage);
        if(count($liste_typesStage) == 0) return null;
        else{
            assert(count($liste_typesStage) == 1);
            return $liste_typesStage[0];
        }
    }
	
	/**
	* @abstract Retourne l'�tudiant stagiaire sous la forme d'objet
	* @return DBEtudiant Objet contenant les informations de l'�tudiant stagiaire en cas de succ�s, FALSE sinon.
	* @access public
	*/
    public function getEtudiant(){
        $liste_etudiants = DBEtudiant::getRecords($this->_idEtudiant);
        if(count($liste_etudiants) == 0) return null;
        else{
            assert(count($liste_etudiants) == 1);
            return $liste_etudiants[0];
        }
    }
	
	/**
	* @abstract Retourne l'entreprise accueillant le stagiaire sous la forme d'objet
	* @return DBEntreprise Objet contenant les informations de l'entreprise en cas de succ�s, FALSE sinon.
	* @access public
	*/
    public function getEntreprise(){
        $liste_entreprises = DBEntreprise::getRecords($this->_idEntreprise);
        if(count($liste_entreprises) == 0) return null;
        else{
            assert(count($liste_entreprises) == 1);
            return $liste_entreprises[0];
        }
    }
	
	/**
	* @abstract Retourne le maitre de stage sous la forme d'objet
	* @return DBContactEtp Objet contenant les informations du maitre de stage en cas de succ�s, FALSE sinon.
	* @access public
	*/
    public function getMaitreStage(){
        $liste_maitresStage = DBContactEtp::getRecords($this->_idMaitreStage);
        if(count($liste_maitresStage) == 0) return null;
        else{
            assert(count($liste_maitresStage) == 1);
            return $liste_maitresStage[0];
        }
    }
	
	/**
	* @abstract Retourne le signataire du stage sous la forme d'objet
	* @return DBContactEtp Objet contenant les informations du signataire du stage en cas de succ�s, FALSE sinon.
	* @access public
	*/
    public function getSignataireStage(){
        $liste_signatairesStage = DBContactEtp::getRecords($this->_idSignataireStage);
        if(count($liste_signatairesStage) == 0) return null;
        else{
            assert(count($liste_signatairesStage) == 1);
            return $liste_signatairesStage[0];
        }
    }
	
	/**
	* @abstract Retourne le tuteur du stage sous la forme d'objet
	* @return DBEnseignant Objet contenant les informations du tuteur du stage en cas de succ�s, FALSE sinon.
	* @access public
	*/
    public function getTuteurStage(){
        $liste_tuteursStage = DBEnseignant::getRecords($this->_idTuteurStage);
        if(count($liste_tuteursStage) == 0) return null;
        else{
            assert(count($liste_tuteursStage) == 1);
            return $liste_tuteursStage[0];
        }
    }
	
	
	/**
	* @abstract Retourne le relecteur du stage sous la forme d'objet
	* @return DBEnseignant Objet contenant les informations du relecteur du stage en cas de succ�s, FALSE sinon.
	* @access public
	*/
    public function getRelecteurStage(){
    	$liste_relecteursStage = DBEnseignant::getRecords($this->_idRelecteurStage);
        if(count($liste_relecteursStage) == 0) return null;
        else{
            assert(count($liste_relecteursStage) == 1);
            return $liste_relecteursStage[0];
        }
    }
	
	/**
	* @abstract Retourne la proposition de stage sous la forme d'objet
	* @return DBEnseignant Objet contenant les informations de la proposition de stage en cas de succ�s, FALSE sinon.
	* @access public
	*/
    public function getPropositionStage(){
    	$liste_propositionsStage = DBPropositionStage::getRecords($this->_idPropStage);
        if(count($liste_propositionsStage) == 0) return null;
        else{
            assert(count($liste_propositionsStage) == 1);
            return $liste_propositionsStage[0];
        }
    }
	
	
	/**
	* @abstract Modifie la fiche de stage � partir des attributs de l'objet courant. Cette m�thode utilise la m�thode 'updateRecord' et lui passe en param�tre les attributs de l'objet courant.
	* @access public
	*/
    public function updateFicheAvecAttr(){
	  $this->updateRecord(
	        $this->getTypeStage(),
	        $this->getEtudiant(),
	        $this->getEntreprise(),
	        $this->getMaitreStage(),
	        $this->getSignataireStage(),
	        $this->_intituleStage,
	        $this->_sujetStage,
	        $this->_dateDebutStage,
	        $this->_dateFinStage,
	        $this->_domaineStage,
	        $this->_technoStage,
	        $this->_descTechnoStage,
	        $this->_etatStage,
	        $this->_dateCreationSuivi,
	        $this->_dateDerniereModifSuivi,
	        $this->_dateValidationSuivi,
	        $this->_dateSignatureEntrepriseSuivi,
			$this->_dateSignatureUniversiteSuivi,
	        $this->_dateFinaleSuivi,
	        $this->_dateRefusSuivi,
	        $this->_motifRefusStageSuivi,
	        $this->getTuteurStage(),
	        $this->getRelecteurStage(),
	        $this->_dateSoutenanceStage,
	        $this->_lieuSoutenanceStage,
	        $this->_dateVisiteStage,
	        $this->_correspSujetTravailVisite,
	        $this->_avisEtudiantVisite,
	        $this->_avisMaitreStageVisite,
	        $this->_avisTuteurVisite,
	        $this->getPropositionStage());
    }
    
	
	/**
	* @abstract Valide la fiche de stage dans l'objet et l'enregistre dans la base.
	* @access public
	*/
	public function validerFiche(){
         $this->_etatStage = DBFicheStage::$ETAT_STAGE_VALIDEE;
         $this->_dateValidationSuivi = date(str_replace("%","",$GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT']));
         $this->updateFicheAvecAttr();
    }
	
	/**
	* @abstract La fiche de stage est remise � l'�tudiant pour signature de l'entreprise et l'enregistre dans la base.
	* @access public
	*/
    public function signatureEntrepriseFiche(){
         $this->_etatStage = DBFicheStage::$ETAT_STAGE_SIGNATURE_ENTREPRISE;
         $this->_dateSignatureEntrepriseSuivi = date(str_replace("%","",$GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT']));
         $this->updateFicheAvecAttr();
    }
	
	/**
	* @abstract La fiche a �t� sign� par l'universite et l'enregistre dans la base.
	* @access public
	*/
    public function signatureUniversiteFiche(){
         $this->_etatStage = DBFicheStage::$ETAT_STAGE_SIGNATURE_UNIVERSITE;
         $this->_dateSignatureUniversiteSuivi = date(str_replace("%","",$GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT']));
         $this->updateFicheAvecAttr();
    }
    	
	/**
	* @abstract Termine la fiche de stage dans l'objet et l'enregistre dans la base.
	* @access public
	*/
    public function terminerFiche(){
	   $this->_etatStage = DBFicheStage::$ETAT_STAGE_TERMINEE;
	   $this->_dateFinaleSuivi = date(str_replace("%","",$GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT']));	   
         $this->updateFicheAvecAttr();
    }
	
	/**
	* @abstract Refuse la fiche de stage dans l'objet et l'enregistre dans la base.
	* @access public
	*/
    public function refuserFiche($motif_refus){
         $this->_etatStage = DBFicheStage::$ETAT_STAGE_REFUSEE;
         $this->_motifRefusStageSuivi = $motif_refus;
         $this->_dateRefusSuivi = date(str_replace("%","",$GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT']));
         $this->updateFicheAvecAttr();
    }
	
	/**
	* @abstract Affecte un tuteur au stage et l'enregistre dans la base.
	* @param DBEnseignant Objet contenant les information de l'enseignant qui doit etre affect� comme tuteur
	* @return Bool TRUE en cas de succ�s, FALSE sinon.
	* @access public
	*/
    public function affecterTuteur(DBEnseignant $ens){
         if ($ens->getIdEnseignant()!=$this->_idRelecteurStage){
             $this->_idTuteurStage = $ens->getIdEnseignant();
	          $this->_nomTuteurStage = $ens->getNomEnseignant();
	          $this->_prenomTuteurStage = $ens->getPrenomEnseignant();
             $this->updateFicheAvecAttr();
             return true;
         }
    }
    
	/**
	* @abstract D�saffecte le tuteur du stage et enregistre dans la base
	* @return Bool TRUE en cas de succ�s, FALSE sinon.
	* @access public
	*/
    public function desaffecterTuteur(){
             $this->_idTuteurStage = -1;
	         $this->_nomTuteurStage = NULL;
	         $this->_prenomTuteurStage = NULL;
             $this->updateFicheAvecAttr();
             return true;
    }
     
	/**
	* @abstract Affecte un relecteur au stage et l'enregistre dans la base.
	* @param DBEnseignant Objet contenant les information de l'enseignant qui doit etre affect� comme relecteur
	* @return Bool TRUE en cas de succ�s, FALSE sinon.
	* @access public
	*/ 
    public function affecterRelecteur(DBEnseignant $ens){
         if ($ens->getIdEnseignant()!=$this->_idTuteurStage){
             $this->_idRelecteurStage = $ens->getIdEnseignant();
	          $this->_nomRelecteurStage = $ens->getNomEnseignant();
	          $this->_prenomRelecteurStage = $ens->getPrenomEnseignant();
             $this->updateFicheAvecAttr();
             return true;
         }
         return false;
    }
    
	/**
	* @abstract D�saffecte le relecteur du stage et enregistre dans la base
	* @return Bool TRUE en cas de succ�s, FALSE sinon.
	* @access public
	*/	
    public function desaffecterRelecteur(){
             $this->_idRelecteurStage = -1;
	         $this->_nomRelecteurStage = NULL;
	         $this->_prenomRelecteurStage = NULL;
             $this->updateFicheAvecAttr();
             return true;
    }
    
      
        
    /**
	* @abstract Affecte un lieu de soutenance et l'enregistre dans la base
	* @param String Lieu de la soutenance
	* @access public
	*/
    public function setLieuSoutenance($lieuSoutenanceStage)
    {
             $this->_lieuSoutenanceStage = $lieuSoutenanceStage;
             $this->updateFicheAvecAttr();
    }
    

	/**
	* @abstract Affecte une date de soutenance et l'enregistre dans la base
	* @param String Date de la soutenance
	* @access public
	*/
    public function setDateSoutenance($dateSoutenanceStage)
         {   
             $this->_dateSoutenanceStage = $dateSoutenanceStage;
             $this->updateFicheAvecAttr();
    }

	/**
	* @abstract Retourne le nom et le pr�nom de l'�tudiant stagiaire.
	* @return String le nom et le pr�nom de l'�tudiant sous la forme suivante : <nom> <pr�nom>
	* @access public
	*/
    public function getFormSelectOptionLabel(){
        return $this->getNomEtudiant()." ".$this->getPrenomEtudiant();
    }
	
	/**
	* @abstract Retourne l'identifiant de la fiche de stage.Synonyme de la m�thode getIdStage()
	* @return int Identifiant de la fiche de stage
	* @access public
	*/
    public function getFormSelectOptionValue(){
        return $this->getIdStage();
    }

	/**
	* @abstract Retourne l'�tudiant avec son tuteur et son relecteur pour un affichage.
	* @return String Etudiant, tuteur et relecteur sous la forme suivante : <NomEtudiant> <Pr�nomEtudiant> (<Pr�nomTuteur> <NomTuteur>, <Pr�nomRelecteur> <NomRelecteur>). Si il n'y a pas de tuteur ou de relecteur leur nom et pr�nom son remplac� par 'Personne'.
	* @access public
	*/
    public function getFormSelectOptionLabel2(){
		$label_etudiant = $this->getNomEtudiant()." ".$this->getPrenomEtudiant(); 
		$tuteur=$this->getTuteurStage();
		$label_tuteur = $tuteur!=NULL?$tuteur->getPrenomEnseignant()." ".$tuteur->getNomEnseignant():"Personne";
		$relecteur=$this->getRelecteurStage();
		$label_relecteur = $relecteur!=NULL?$relecteur->getPrenomEnseignant()." ".$relecteur->getNomEnseignant():"Personne"; 
    	return "$label_etudiant ($label_tuteur, $label_relecteur)";
    }
    
	
	/**
	* @abstract M�thode statique. Retourne l'ensemble des fiches de stage auxquelles un tuteur ou un relecteur sont d�j� affect�s et qui ne sont pas dans l'�tat 'attente de validation' ni 'refus�e'.
	* @param int Idenfifiant du type de stage sur lequel se porte la recherche
	* @return Array Tableau contenant les objets DBFicheStage que l'on recherche.
	* @access public
	*/
	public static function  getFichesStagesAffecteesTuteur($idTypeStage) {
      $fiches = DBFicheStage::getRecords("",$idTypeStage,"",DBConfig::getConfigValue("ANNEE PROMO"));
      $i = 0;
      $arrayFichesAffectees  = array();
		foreach ($fiches as $fiche) {
	        if( ($fiche->getIdTuteurStage() != -1) or ($fiche->getIdRelecteurStage() != -1) ) {
	            if (($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION) and ($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_REFUSEE)) {
		      		$arrayFichesAffectees[count($arrayFichesAffectees)] = $fiche;
				}
	        }
		}
      $arrayFichesAffectees = Enumeration::sort($arrayFichesAffectees, '$a->getNomEtudiant()');
      
	  return $arrayFichesAffectees;
   }
   
	/**
	* @abstract M�thode statique. Retourne l'ensemble des fiches de stage auxquelles ni tuteur ni relecteur sont affect�s et qui ne sont pas dans l'�tat 'attente de validation' ni 'refus�e'.
	* @param int Idenfifiant du type de stage sur lequel se porte la recherche
	* @return Array Tableau contenant les objets DBFicheStage que l'on recherche.
	* @access public
	*/
	public static function  getFichesStagesNonAffecteesTuteur($idTypeStage) {
		$fiches = DBFicheStage::getRecords("",$idTypeStage,"",DBConfig::getConfigValue("ANNEE PROMO"));
		$arrayFichesNonAffectees  = array();
		foreach ($fiches as $fiche) {
		    if( ($fiche->getIdTuteurStage() == -1) and ($fiche->getIdRelecteurStage() == -1) ) {
			    if (($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION) and ($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_REFUSEE)){
			    		$arrayFichesNonAffectees[count($arrayFichesNonAffectees)] = $fiche;
				}
	        }
	    }
	    $arrayFichesNonAffectees = Enumeration::sort($arrayFichesNonAffectees, '$a->getNomEtudiant()');
	    return $arrayFichesNonAffectees;
   }
   
	/**
	* @abstract M�thode statique. Retourne l'ensemble des fiches de stage auxquelles une soutenance est d�j� affect�e et qui ne sont pas dans l'�tat 'attente de validation' ni 'refus�e'.
	* @param int Idenfifiant du type de stage sur lequel se porte la recherche
	* @return Array Tableau contenant les objets DBFicheStage que l'on recherche.
	* @access public
	*/
	public static function  getFichesStagesAffecteesSoutenance($idTypeStage) {
		$fiches = DBFicheStage::getRecords("",$idTypeStage,"",DBConfig::getConfigValue("ANNEE PROMO"));
		$i = 0;
		$arrayFichesAffectees  = array();
		foreach ($fiches as $fiche) {
			if( (($fiche->getDateSoutenanceStage() != NULL) and ($fiche->getDateSoutenanceStage() != "00/00/0000 00:00")) or ($fiche->getLieuSoutenanceStage() != NULL) ) {
				if (($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION) and ($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_REFUSEE)) {
					$arrayFichesAffectees[count($arrayFichesAffectees)] = $fiche;
				}
			}
		}
      
		$arrayFichesAffectees = Enumeration::sort($arrayFichesAffectees, '$a->getNomEtudiant()');
		return $arrayFichesAffectees;
   }
   
   
	/**
	* @abstract M�thode statique. Retourne l'ensemble des fiches de stage auxquelles aucune soutenance est affect�e et qui ne sont pas dans l'�tat 'attente de validation' ni 'refus�e'.
	* @param int Idenfifiant du type de stage sur lequel se porte la recherche
	* @return Array Tableau contenant les objets DBFicheStage que l'on recherche.
	* @access public
	*/
	public static function  getFichesStagesNonAffecteesSoutenance($idTypeStage) { 
		$fiches = DBFicheStage::getRecords("",$idTypeStage,"",DBConfig::getConfigValue("ANNEE PROMO"));
		$arrayFichesNonAffectees  = array();
		foreach ($fiches as $fiche) {
			if( (($fiche->getDateSoutenanceStage() == NULL) or ($fiche->getDateSoutenanceStage() == "00/00/0000 00:00")) and ($fiche->getLieuSoutenanceStage() == NULL) ) {
				if (($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION) and ($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_REFUSEE)) {
					$arrayFichesNonAffectees[count($arrayFichesNonAffectees)] = $fiche;
				}
			}
		}
		$arrayFichesNonAffectees = Enumeration::sort($arrayFichesNonAffectees, '$a->getNomEtudiant()');
		return $arrayFichesNonAffectees;
	}
   
   
	/**
	* @abstract M�thode statique. Retourne l'ensemble des fiches de stage auxquelles aucune visite n'est affect�e et qui ne sont pas dans l'�tat 'attente de validation' ni 'refus�e'.
	* @param int Idenfifiant du type de stage sur lequel se porte la recherche
	* @param int Identifiant de l'enseignent pour lequel on recherche les stage qu'il n'a pas visit�
	* @return Array Tableau contenant les objets DBFicheStage que l'on recherche.
	* @access public
	*/
    public static function getFichesStagesNonAffecteesVisite($idTypeStage,$idEns) {
		$fiches = DBFicheStage::getRecords("",$idTypeStage,"",DBConfig::getConfigValue("ANNEE PROMO"),"","","","","","","","","","","","","","","","","","","","","","","","","","","",$idEns);
		$i = 0;
		$arrayFichesNonAffectees  = array();
		foreach ($fiches as $fiche) {
			if( ($fiche->getCorrespSujetTravailVisite() == NULL)) {
				if (($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION) and ($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_REFUSEE)) {
					$arrayFichesNonAffectees[count($arrayFichesNonAffectees)] = $fiche;
				}
			}
		}
		
		return $arrayFichesNonAffectees;
    }
    
	
	/**
	* @abstract M�thode statique. Retourne l'ensemble des stages visit�s et qui ne sont pas dans l'�tat 'attente de validation' ni 'refus�e'.
	* @param int Idenfifiant du type de stage sur lequel se porte la recherche
	* @param int Identifiant de l'enseignent pour lequel on recherche les stages qu'il n'a pas visit�
	* @return Array Tableau contenant les objets DBFicheStage que l'on recherche.
	* @access public
	*/
    public static function getFichesStagesAffecteesVisite($idTypeStage,$idEns) {
		$fiches = DBFicheStage::getRecords("",$idTypeStage,"",DBConfig::getConfigValue("ANNEE PROMO"),"","","","","","","","","","","","","","","","","","","","","","","","","","","",$idEns);
		$i = 0;
		$arrayFichesAffectees  = array();
		foreach ($fiches as $fiche) {
			if( ($fiche->getCorrespSujetTravailVisite() != NULL)) {
				if (($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION) and ($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_REFUSEE)) {
					$arrayFichesAffectees[count($arrayFichesAffectees)] = $fiche;
				}
			}
		}
		
		return $arrayFichesAffectees;
    }
    
	
	/**
	* @abstract Permet d'ajouter une fiche de stage � l'aide de la m�thode 'createRecord'. Cette m�thode contient moins de param�tre car certains sont automatiquements affect�s.
	* @param DBTypeStage Objet contenant le type de stage correspondant � la fiche de stage
	* @param DBEtudiant Objet contenant l'�tudiant effectuant le stage
	* @param DBEntreprise Objet contenant l'entreprise dans laquelle le stage s'effectu
	* @param DBContactEtp Objet contenant le maitre de stage
	* @param DBContactEtp Objet contenant le signataire de la fiche de stage
	* @param Date Date de d�but du stage
	* @param Date Date de fin du stage
	* @param String Intitul� du stage
	* @param String Sujet du stage
	* @param String Technologie utilis�e pendant le stage
	* @param String Description de la technologie utilis�e pendant le stage
	* @param String Domaine d'application du stage
	* @return DBFicheStage Objet contenant les informations de la fiche de stage que l'on vient d'inserer
	* @access public
	*/
    public static function addFicheStageSaisie($typeStage, $etudiant, $entreprise,$maitreStage,$signataire,$dateDebutStage,$dateFinStage,$intituleStage,$sujetStage,$technoStage,$descTechnoStage,$domaineStage){
    	$res = DBFicheStage::createRecord(
  			$typeStage,
  			$etudiant,
  			$entreprise,
  			$maitreStage,
  			$signataire,
  			$intituleStage,
  			$sujetStage, 
  			$dateDebutStage, 
  			$dateFinStage,
  			$domaineStage, 
  			$technoStage, 
  			$descTechnoStage, 
  			DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION, 
  			date(str_replace("%","",$GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT'])), 
  			"","","","","","",     //autres dates de suivis
  			"",                    //motif refus stage 
  			NULL,                  //infos tuteur stage 
  			NULL,                  //infos tuteur stage 
  			"","",                 //infos soutenance 
  			"","","","","",NULL);  //infos visite
  		return $res;
    }

	
	/**
	* @abstract M�thode pour la modification d'une fiche de stage dans la base en fonction des informations pass�es en parametre. Seules infos modifiable par le site.
	* @param DBTypeStage Objet contenant le type de stage correspondant � la fiche de stage
	* @param DBEtudiant Objet contenant l'�tudiant effectuant le stage
	* @param DBEntreprise Objet contenant l'entreprise dans laquelle le stage s'effectu
	* @param DBContactEtp Objet contenant le maitre de stage
	* @param DBContactEtp Objet contenant le signataire de la fiche de stage
	* @param Date Date de d�but du stage
	* @param Date Date de fin du stage
	* @param String Intitul� du stage
	* @param String Sujet du stage
	* @param String Technologie utilis�e pendant le stage
	* @param String Description de la technologie utilis�e pendant le stage
	* @param String Domaine d'application du stage
	* @return DBFicheStage Objet contenant les informations de la fiche de stage que l'on vient de modifier
	* @access public
	*/
    public function updateFicheStageSaisie($typeStage, $etudiant,$entreprise,$maitreStage,$signataire,$dateDebutStage,$dateFinStage,$intituleStage,$sujetStage,$technoStage,$descTechnoStage,$domaineStage){	
    	$this->updateRecord(
  			$typeStage, 
  			$etudiant, 
  			$entreprise, 
  			$maitreStage,
  			$signataire,
  			$intituleStage,
  			$sujetStage, 
  			$dateDebutStage, 
  			$dateFinStage,
  			$domaineStage,
  			$technoStage,
  			$descTechnoStage, 
  			$this->getEtatStage(), 
  			$this->getDateCreationSuivi(), 
  			date(str_replace("%","",$GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT'])), 
  			"","","","","",     //autres dates de suivis
  			"",                 //motif refus stage 
  			$this->getTuteurStage(),  //infos tuteur stage 
  			$this->getRelecteurStage(), //infos tuteur stage 
  			"","",              //infos soutenance 
  			"","","","","",$this->getPropositionStage()); //infos visite
  			return $this;
     }

	 
	/**
	* @abstract Affecte � l'objet courant et enregistre dans la base l'avis sur la visite du tuteur.
	* @param String Evaluation de la corespondance entre le stagiaire et son tuteur
	* @param String Avis du maitre de stage sur le stage
	* @param String Avis de l'�tudiant sur le stage
	* @param String Avis du tuteur sur le stage
	* @param Date Date de la visite au stagiaire
	* @return TRUE en cas de succ�s, FALSE sinon.
	* @access public
	*/	
    public function affecterAvisVisite($corresp,$avisResp,$avisEtu,$avisEns,$dateVisite) {
		$this->_correspSujetTravailVisite = $corresp;
   	  	$this->_avisEtudiantVisite = $avisEtu;
        $this->_avisMaitreStageVisite = $avisResp;
   	  	$this->_avisTuteurVisite = $avisEns;
        $this->_dateVisiteStage = $dateVisite;
        
        $this->updateFicheAvecAttr();
        
		return true;
    }

	/**
	* @abstract M�thode statique. Retourne la ou les fiche(s) de stages de l'�tudiant pass� en param�tre 
	* @param DBEtudiant Objet contenant les informations de l'�tudiant pour lequel on souhaite r�cup�rer la ou les fiche(s) de stage
	* @return Array Tableau contenant les objets de type DBFicheStage correspondant aux ligne de la base de donn�es que l'on vient de r�cup�rer
	* @access public
	*/
    public static function getFicheStageEtudiant($etudiant){
		return 	DBFicheStage::getRecords("", "", "", $etudiant->getPromoEtudiant(), $etudiant->getIdEtudiant());
    }
     
    /**
	* @abstract M�thode statique. Retourne la ou les fiche(s) de stage valid�e(s) de l'�tudiant pass� en param�tre pour le type de stage pass� en param�tre. Les fiches retourn�es sont celles pour l'ann�e de la promo est celui stock� dans la table 'config'. Les fiches retourn�s sont tri�es sur le nom de l'�tudiant.
	* @param DBEtudiant Objet contenant les informations de l'�tudiant pour lequel on souhaite r�cup�rer la ou les fiche(s) de stage valid�es. Prend la valeur NULL si non renseign�
	* @param DBTypeStage Objet contenant le type de stage pour lequel on recherche les fiches de stage.
	* @return Array Tableau contenant les objets de type DBFicheStage correspondant aux ligne de la base de donn�es que l'on vient de r�cup�rer
	* @access public
	*/	
	public static function getFichesStageValides($etudiant=NULL,$typeStage=NULL){
		$fiches = DBFicheStage::getRecords("", $typeStage!=NULL?$typeStage->getIdTypeStage():"", "", DBConfig::getConfigValue("ANNEE PROMO"), $etudiant!=NULL?$etudiant->getIdEtudiant():"");
		$arrayFiches  = array();
		foreach ($fiches as $fiche) {
			if (($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION) and ($fiche->getEtatStage()!=DBFicheStage::$ETAT_STAGE_REFUSEE)) {
				$arrayFiches[count($arrayFiches)] = $fiche;
			}
		}
		$arrayFiches = Enumeration::sort($arrayFiches, '$a->getNomEtudiant()');
	
        return $arrayFiches;
    }
   
     
	/**
	* @abstract M�thode statique. Retourne la ou les fiche(s) de stage valid�e(s) de l'�tudiant pass� en param�tre pour le type de stage pass� en param�tre. Les fiches retourn�es sont celles pour l'ann�e de la promo est celui stock� dans la table 'config'. Les fiches retourn�es sont tri�es sur le nom de l'�tudiant.
	* @param DBEtudiant Objet contenant les informations de l'�tudiant pour lequel on souhaite r�cup�rer la ou les fiche(s) de stage valid�es. Prend la valeur NULL si non renseign�
	* @param DBTypeStage Objet contenant le type de stage pour lequel on recherche les fiches de stage.
	* @return Array Tableau contenant les objets de type DBFicheStage correspondant aux ligne de la base de donn�es que l'on vient de r�cup�rer
	* @access public
	*/ 
	public static function getFichesStageNonValides($etudiant=NULL,$typeStage=NULL){
     	$arrayFiches = DBFicheStage::getRecords("", $typeStage!=NULL?$typeStage->getIdTypeStage():"", "", DBConfig::getConfigValue("ANNEE PROMO"), $etudiant!=NULL?$etudiant->getIdEtudiant():"","","","","","","","","","","","","","","","","","",DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION);
		$arrayFiches = Enumeration::sort($arrayFiches, '$a->getNomEtudiant()');
		return $arrayFiches;
    }
     
     
	/**
	* @abstract M�thode statique. Retourne l'ensemble des fiches de stage auxquelles un tuteur ou un relecteur sont d�j� affect�s et qui ne sont pas dans l'�tat 'attente de validation' ni 'refus�e'. Synonyme de 'getFichesStagesAffecteesTuteur()'.
	* @param int Idenfifiant du type de stage sur lequel se porte la recherche
	* @return Array Tableau contenant les objets de type Enumerable correspondant aux fiches de stages que l'on recherche.
	* @access public
	*/
	public static function getEnumerationEtudiantTuteurRelecteur($idTypeStage){
		$liste_fiches = DBFicheStage::getFichesStagesAffecteesTuteur($idTypeStage);
		$res = array();
		$i = 0;
		foreach ($liste_fiches as $fiche){
			$res[$i] = new Enumerable($fiche->getFormSelectOptionValue(),$fiche->getFormSelectOptionLabel2());
			$i++;
		} 
		return $res;
	}
	
	/**
	* @abstract Retourne la liste des adresses mails de l'�tudiant concern� par la fiche de stage.
	* @return String Liste des adresses mails s�par�es par des ','
	* @access private
	*/
	private function createListMailEtudiant(){
		$mails=array();
		$etudiant = $this->getEtudiant();
		if ($etudiant->getMailfacEtudiant()!=NULL)
	      	$mails[count($mails)]=$etudiant->getMailfacEtudiant();
	    if ($etudiant->getMailstableEtudiant()!=NULL)
	    	$mails[count($mails)]=$etudiant->getMailstableEtudiant();
	    if ($etudiant->getMailstageEtudiant()!=NULL)
	      	$mails[count($mails)]=$etudiant->getMailstageEtudiant();
	    return (implode($mails,','));
	}
	
	/**
	* @abstract Envoi un mail de refus de la fiche de stage � l'�tudiant
	* @return Bool TRUE si le mail est accept� pour livraison, FALSE sinon
	* @access public
	*/
	public function sendMailRefus(){
		$m = new Mailer(DBFicheStage::$MAILREFUS_TEMPLATE);
		$m->fillTemplateVar("prenom_etudiant", $this->_prenomEtudiant);
        $m->fillTemplateVar("nom_etudiant", $this->_nomEtudiant);
        $m->fillTemplateVar("type_stage", $this->getLibelleTypeStage());
        $m->fillTemplateVar("raison_sociale", $this->getRaisonSocialeEntreprise());
        $m->fillTemplateVar("motif_refus", $this->_motifRefusStageSuivi);
        
        if(!$m->sendMail($this->createListMailEtudiant(), "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Refus de votre fiche de stage"))
            return false;
        else
            return true;
	}
    
    /**
	* @abstract Envoi un mail de cr�ation de la fiche de stage � l'�tudiant concern�
	* @return Bool TRUE si le mail est accept� pour livraison, FALSE sinon
	* @access public
	*/
	public function sendMailCreationEtudiant(){
    	$etudiant = $this->getEtudiant();
    	$m = new Mailer(DBFicheStage::$MAILCREAETD_TEMPLATE);
		$m->fillTemplateVar("prenom_etudiant", $etudiant->getPrenomEtudiant());
        $m->fillTemplateVar("nom_etudiant", $etudiant->getNomEtudiant());
        $m->fillTemplateVar("type_stage", $this->getLibelleTypeStage());
        $m->fillTemplateVar("date_creation", $this->getDateCreationSuivi());
        
        if(!$m->sendMail($this->createListMailEtudiant(), "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Validation de votre fiche de stage"))
            return false;
        else
            return true;
	}
	
    /**
	* @abstract Envoi un mail de cr�ation de la fiche de stage aux administrateurs
	* @return Bool TRUE si le mail est accept� pour livraison, FALSE sinon
	* @access public
	*/
	public function sendMailCreationAdmin(){
    	$m = new Mailer(DBFicheStage::$MAILCREAADMIN_TEMPLATE);
    	$etudiant = $this->getEtudiant();
		$m->fillTemplateVar("prenom_etudiant", $etudiant->getPrenomEtudiant());
        $m->fillTemplateVar("nom_etudiant", $etudiant->getNomEtudiant());
        $m->fillTemplateVar("type_stage", $this->getLibelleTypeStage());
        $m->fillTemplateVar("date_creation", $this->getDateCreationSuivi());
        
        if(!$m->sendMail(DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Creation d'une fiche de stage de ".$etudiant->getNomEtudiant()." ".$etudiant->getPrenomEtudiant()." (".$etudiant->getMiageEtudiant().")"))
            return false;
        else
            return true;
	} 
    
    
	/**
	* @abstract Envoi un mail de validation de la fiche de stage � l'�tudiant concern�
	* @return Bool TRUE si le mail est accept� pour livraison, FALSE sinon
	* @access public
	*/
	public function sendMailValidationEtudiant(){
    	$m = new Mailer(DBFicheStage::$MAILVALETD_TEMPLATE);
		$m->fillTemplateVar("prenom_etudiant", $this->_prenomEtudiant);
        $m->fillTemplateVar("nom_etudiant", $this->_nomEtudiant);
        $m->fillTemplateVar("type_stage", $this->getLibelleTypeStage());
        $m->fillTemplateVar("date_validation", $this->getDateValidationSuivi());
        
        //if(!$m->sendMail($this->createListMailEtudiant(), "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Validation de votre fiche de stage"))
       if(!$m->sendMail("alilou.amine2012@gmail.com", "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Validation de votre fiche de stage"))
        
        return false;
        else
            return true;
	} 
	
	
	/**
	* @abstract Envoi un mail de validation d'une fiche de stage au secr�tariat
	* @return Bool TRUE si le mail est accept� pour livraison, FALSE sinon
	* @access public
	*/
	public function sendMailValidationSecretaire(){
		$m = new Mailer(DBFicheStage::$MAILVALSEC_TEMPLATE);
		$m->fillTemplateVar("prenom_etudiant", $this->_prenomEtudiant);
        $m->fillTemplateVar("nom_etudiant", $this->_nomEtudiant);
        $m->fillTemplateVar("type_stage", $this->getLibelleTypeStage());
        $m->fillTemplateVar("raison_sociale", $this->getRaisonSocialeEntreprise());
        
        if(!$m->sendMail(DBConfig::getConfigValue("MAIL SECRETARIAT"), "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Validation d'une fiche de stage"))
            return false;
        else
            return true;
	}
	
	
	/**
	* @abstract Envoi un mail de recup�ration de la fiche par l'�tudiant pour la signature entreprise de la fiche de stage � l'�tudiant concern�
	* @return Bool TRUE si le mail est accept� pour livraison, FALSE sinon
	* @access public
	*/
	public function sendMailSignatureEntreprise(){
		$m = new Mailer(DBFicheStage::$MAILCONV_TEMPLATE);
		$m->fillTemplateVar("prenom_etudiant", $this->_prenomEtudiant);
        $m->fillTemplateVar("nom_etudiant", $this->_nomEtudiant);
        $m->fillTemplateVar("type_stage", $this->getLibelleTypeStage());
        $reply=DBConfig::getConfigValue("MAIL SECRETARIAT").", ".DBConfig::getConfigValue("MAIL ADMINISTRATEURS");
        
        if(!$m->sendMail($this->createListMailEtudiant(), DBConfig::getConfigValue("MAIL SECRETARIAT"), $reply, "Fiche de stage remis � l'�tudiant"))
            return false;
        else
            return true;
	}
	
	/**
	* @abstract Envoi un mail indiquant que la fiche de stage � l'�tudiant concern� a �t� sign� par l'Universit�
	* @return Bool TRUE si le mail est accept� pour livraison, FALSE sinon
	* @access public
	*/
	public function sendMailSignatureUniversite(){
		$m = new Mailer(DBFicheStage::$MAILCONV_TEMPLATE);
		$m->fillTemplateVar("prenom_etudiant", $this->_prenomEtudiant);
        $m->fillTemplateVar("nom_etudiant", $this->_nomEtudiant);
        $m->fillTemplateVar("type_stage", $this->getLibelleTypeStage());
        $reply=DBConfig::getConfigValue("MAIL SECRETARIAT").", ".DBConfig::getConfigValue("MAIL ADMINISTRATEURS");
        
        if(!$m->sendMail($this->createListMailEtudiant(), DBConfig::getConfigValue("MAIL SECRETARIAT"), $reply, "Fiche de stage sign�e par l'Universit�"))
            return false;
        else
            return true;
	}
	
	
	/**
	* @abstract Envoi un mail de finalisation de la fiche de stage � l'�tudiant concern�
	* @return Bool TRUE si le mail est accept� pour livraison, FALSE sinon
	* @access public
	*/
	public function sendMailFinalisation(){
		$m = new Mailer(DBFicheStage::$MAILFIN_TEMPLATE);
		$m->fillTemplateVar("prenom_etudiant", $this->_prenomEtudiant);
        $m->fillTemplateVar("nom_etudiant", $this->_nomEtudiant);
        $m->fillTemplateVar("type_stage", $this->getLibelleTypeStage());
        $reply=DBConfig::getConfigValue("MAIL SECRETARIAT").", ".DBConfig::getConfigValue("MAIL ADMINISTRATEURS");
        
        if(!$m->sendMail($this->createListMailEtudiant(), DBConfig::getConfigValue("MAIL SECRETARIAT"), $reply, "Fiche de stage finalis�e"))
            return false;
        else
            return true;
	}
	
	public function sendMailFiche_suivi($mail,$from)
	{
	//on verifie le format de chaque email
	$mail_verif=$mail.",".$from;
	$tableau_adresses = split(",",trim($mail_verif));
	$regex = "/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i";
	foreach($tableau_adresses as $adresse){
		if (!preg_match($regex,$adresse)) {
		echo "Il y a une erreur dans la saisie de ou des emails";
				exit();} 
		}	
	//construction du corp du message a l'aide du template 
	$m = new Mailer(DBFicheStage::$MAILSUIVIFICHE_TEMPLATE);
	$m->fillTemplateVar("prenom_etudiant", $this->getPrenomEtudiant());
	$m->fillTemplateVar("nom_etudiant", $this->getNomEtudiant());
	$m->fillTemplateVar("type_stage",$this->getLibelleTypeStage());
	$m->fillTemplateVar("date_visite", $this->getDateVisiteStage());
	$m->fillTemplateVar("entreprise", $this->getRaisonSocialeEntreprise());
	$m->fillTemplateVar("nom_maitre_stage", $this->getNomMaitreStage());
	$m->fillTemplateVar("prenom_maitre_stage", $this->getPrenomMaitreStage());
	$m->fillTemplateVar("intitule", $this->getIntituleStage());
	$m->fillTemplateVar("sujet", $this->getSujetStage());
	$m->fillTemplateVar("corres", $this->getCorrespSujetTravailVisite());
	$m->fillTemplateVar("avis_etu", $this->getAvisEtudiantVisite());
	$m->fillTemplateVar("avis_maitre", $this->getAvisMaitreStageVisite());
	$m->fillTemplateVar("avis_tuteur", $this->getAvisTuteurVisite());

	if(!$m->sendMail($mail,$from,$from,"Fiche de suivi")){
		return false;
		echo "Une erreur est survenue lors de l'envoi de l'email";
		exit();}
        else{
	    echo "L'envoie de l'email s'est bien deroule";	
            return true;
	}    
}

}

?>

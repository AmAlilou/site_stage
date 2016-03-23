<?php
set_include_path(".");
require_once("inc/main.inc.php");

$validValues = array("GestionVisite","GestionProposition","GestionFiche","GestionSuivi","GestionRapports","GestionSoutenance","GestionTuteur","SoutenanceStage", "DeroulementStage", "RechercheStandard", "Entreprises", "Etudiant", "Enseignant", "EntrepriseAdmin");
if(isset($_GET['option']) && (in_array($_GET['option'], $validValues))){
    SessionManager::registerExpandedMenu($_GET['option']);
    
	switch($_GET['option']) {
		case 'GestionProposition' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilPropositionStage.php');
			break ;
		
		case 'GestionFiche' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionFiche.php');
			break ;
		
		case 'GestionSuivi' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/admin/modifEtatSuivi.php');
			break ;
			
		case 'GestionRapports' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/admin/listeRapports.php');
			break ;
			
		case 'GestionSoutenance' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionSoutenance.php');
			break ;
		
		case 'GestionTuteur' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionTuteur.php');
			break ;		
		
		case 'Etudiant' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionEtudiant.php');
			break ;
			
		case 'Enseignant' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionEnseignant.php');
			break ;
		
		case 'EntrepriseAdmin' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionEntreprise.php');
			break ;
		
		case 'GestionVisite' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/enseignant/accueilGestionVisites.php');
			break ;
		case 'RechercheStandard' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/ChercherStage.php');
			break ;
			
		case 'Entreprises' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/EntreprisePageGenerale.php');
			break ;
			
		case 'DeroulementStage' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/DeroulementStage.php');
			break ;
			
		case 'SoutenanceStage' :
			header('Location: '.$GLOBALS['URL_ROOT_PATH'].'/SoutenanceStage.php');
			break ;
				
		default :
			// Redirection auto sur la page sur laquelle on était
		    header("Location: ".SessionManager::getHTTPReferer());
	}
}
else
    die("Erreur : Option invalide !");
?>
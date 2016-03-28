<?php
set_include_path(".".PATH_SEPARATOR."..");
include_once("inc/main.inc.php");
require_once("inc/PHPLib/template.inc");

  $etudiant = SessionManager::getEtudiant();
  $stage=NULL;
  if (isset($_GET['ficheEnCours']) and $_GET['ficheEnCours']!=""){
  	$stages = DBFicheStage::getRecords($_GET['ficheEnCours']);
  	$stage = $stages[0];
  }
  $fb = new FormBuilder("affichageFicheStage.php","POST");
  $fb->beginForm();
  $liste = DBFicheStage::getFicheStageEtudiant($etudiant);
  $liste_fiches = Enumeration::getSelectablesArrayFromObject($liste,'$a->getIdStage()','"[".$a->getLibelleTypeStage()."] ".$a->getEntreprise()->getRaisonsocialeEntreprise()." : ".$a->getEtatStage()','"[".$a->getLibelleTypeStage()."]".$a->getEtatStage()." - ".$a->getEntreprise()->getRaisonsocialeEntreprise()');
  $fb->addSelectMenuField("Vos fiches","ficheEnCours",true,$liste_fiches," -- FICHE DE STAGE -- ",isset($_GET['ficheEnCours'])?$_GET['ficheEnCours']:"","",true,"OnChange = \"refreshPage();\"");
  echo "<hr/>";
  $fb->endForm();
  
  if($stage!=NULL){
  
	  $template = new Template($GLOBALS['ROOT_PATH']."/etudiant", 0, $GLOBALS['ROOT_PATH']."/etudiant/affichageFicheStage.tpl");
	  $template->set_file("affichageFicheStage","../templates/affichageFicheStage.tpl");
	
	  $template->set_var("nomETUDIANT", $etudiant->getNomEtudiant());
	  $template->set_var("prenomETUDIANT", $etudiant->getPrenomEtudiant());
	  $template->set_var("adresseETUDIANT", $etudiant->getAdresseStageEtudiant());
	  $template->set_var("cpETUDIANT", $etudiant->getCpstageEtudiant());
	  $template->set_var("villeETUDIANT", $etudiant->getVillestageEtudiant());
	  $template->set_var("mailETUDIANT", $etudiant->getMailstageEtudiant());
	  $template->set_var("telETUDIANT", $etudiant->getTelstageEtudiant());
	  
	  $typeStage = $stage->getTypeStage();
	  $template->set_var("typeStageSTAGE", $typeStage->getLibelleTypeStage());
	  
	  $entreprise = $stage->getEntreprise();
	  $template->set_var("nomENTREPRISE", $entreprise->getRaisonsocialeEntreprise());
	  $template->set_var("adresseENTREPRISE", $entreprise->getAdresseEntreprise());
	  $template->set_var("cpENTREPRISE", $entreprise->getCodePostalEntreprise());
	  $template->set_var("villeENTREPRISE", $entreprise->getVilleEntreprise());
	  $template->set_var("telENTREPRISE", $entreprise->getTelEntreprise());
	  $template->set_var("faxENTREPRISE", $entreprise->getFaxEntreprise());
	  $signataire = $stage->getSignataireStage();
	  $template->set_var("nomSIGNATAIRE", $signataire!=NULL?$signataire->getNomContact():" - ");
	  $template->set_var("prenomSIGNATAIRE", $signataire!=NULL?$signataire->getPrenomContact():" - ");
	  $template->set_var("fonctionSIGNATAIRE", $signataire!=NULL?$signataire->getFonctionContact():" - ");
	  $template->set_var("debutSTAGE", $stage->getDateDebutStage());
	  $template->set_var("finSTAGE", $stage->getDateFinStage());
	  $maitreStage = $stage->getMaitreStage();
	  $template->set_var("nomMAITRESTAGE", $maitreStage!=NULL?$maitreStage->getNomContact():" - ");
	  $template->set_var("prenomMAITRESTAGE", $maitreStage!=NULL?$maitreStage->getPrenomContact():" - ");
	  $template->set_var("fonctionMAITRESTAGE", $maitreStage!=NULL?$maitreStage->getFonctionContact():" - ");
	  $template->set_var("mailMAITRESTAGE", $maitreStage!=NULL?$maitreStage->getEmailContact():" - ");
	  $template->set_var("telMAITRESTAGE", $maitreStage!=NULL?$maitreStage->getTelContact():" - ");
	
	  $template->set_var("nomSTAGE", $stage->getIntituleStage());
	  $template->set_var("sujetSTAGE", $stage->getSujetStage());
	  $template->set_var("domaineSTAGE", $stage->getDomaineStage());
	  $template->set_var("technoSTAGE", $stage->getTechnoStage());
	
	$template->parse("parse", "affichageFicheStage");
	  // Affichage des donn&#233;es
	  $template->p("parse");
  } else
  	echo "Aucune fiche de stage selectionn&#233;e.";
  	
  $fb->generateXHTML();

?>

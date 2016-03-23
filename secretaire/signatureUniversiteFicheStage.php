<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_SECRETAIRE_LOGGED));

echo "<h2>Fiches de stage sign&#233;es par l'Universit&#233;</h2>";
$fb = new FormBuilder("traitementSignatureUniversiteFicheStage.php", "POST");
$fb->beginForm();
//affichage des types de stages
$listeTypesStage = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"));
$fb->addSelectMenuField("Type de stage", FOGestionFicheStage::$CHAMP_FORM_ID_TYPE_STAGE, true, Enumeration::getSelectablesArrayFromObject($listeTypesStage,'$a->getIdTypeStage()','$a->getLibelleTypeStage()'),"Type","","",false,"onChange=\"refreshPage();\"");
echo "<br/>";
//affichage des fiches de stage valid&#233;es pour le type de stage choisi
$idtype = isset($_GET[FOGestionFicheStage::$CHAMP_FORM_ID_TYPE_STAGE])?$_GET[FOGestionFicheStage::$CHAMP_FORM_ID_TYPE_STAGE]:"";

$listeFiches=$idtype!=""?DBFicheStage::getRecords("",$idtype,"",DBConfig::getConfigValue("ANNEE PROMO"),"","","","","","","","","","","","","","","","","","",DBFicheStage::$ETAT_STAGE_SIGNATURE_ENTREPRISE):array();
$fb->addSelectMenuField("Etudiant", FOGestionFicheStage::$CHAMP_FORM_ID_FICHE, true, Enumeration::getSelectablesArrayFromObject($listeFiches,'$a->getIdStage()','$a->getNomEtudiant()." ".$a->getPrenomEtudiant()'),"Etudiants","","",false,"onChange=\"refreshPage();\"");
echo "<br/>";

if (isset($_GET[FOGestionFicheStage::$CHAMP_FORM_ID_FICHE]) and $_GET[FOGestionFicheStage::$CHAMP_FORM_ID_FICHE]!=""){
	  echo "<hr>";
	  echo "<center><input type='submit' value='Signature Universite' name='action'/></center><br/><br/>";
	  $fiches=DBFicheStage::getRecords($_GET[FOGestionFicheStage::$CHAMP_FORM_ID_FICHE]);
	  $fiche=$fiches[0];
	  $etudiant=$fiche->getEtudiant();
	  $entreprise=$fiche->getEntreprise();
	  $signataire=$fiche->getSignataireStage();
	  $maitreStage=$fiche->getMaitreStage();

	  $template = new Template($GLOBALS['ROOT_PATH']."/templates", 0, $GLOBALS['ROOT_PATH']."/templates/affichageFicheStage.tpl");	  
	  $template->set_file("gestionFicheStage","../templates/affichageFicheStage.tpl");
	  
	  $template->set_var("nomETUDIANT", $etudiant->getNomEtudiant());
	  $template->set_var("prenomETUDIANT", $etudiant->getPrenomEtudiant());
	  $template->set_var("adresseETUDIANT", $etudiant->getAdresseStageEtudiant());
	  $template->set_var("cpETUDIANT", $etudiant->getCpstageEtudiant());
	  $template->set_var("villeETUDIANT", $etudiant->getVillestageEtudiant());
	  $template->set_var("mailETUDIANT", $etudiant->getMailstageEtudiant());
	  $template->set_var("telETUDIANT", $etudiant->getTelstageEtudiant());
	  
	  $typeStage = $fiche->getTypeStage();
	  $template->set_var("typeStageSTAGE", $typeStage->getLibelleTypeStage());

	  $template->set_var("nomENTREPRISE", $entreprise->getRaisonsocialeEntreprise());
	  $template->set_var("adresseENTREPRISE", $entreprise->getAdresseEntreprise());
	  $template->set_var("cpENTREPRISE", $entreprise->getCodePostalEntreprise());
	  $template->set_var("villeENTREPRISE", $entreprise->getVilleEntreprise());
	  $template->set_var("telENTREPRISE", $entreprise->getTelEntreprise());
	  $template->set_var("faxENTREPRISE", $entreprise->getFaxEntreprise());

	  $template->set_var("nomSIGNATAIRE", $signataire!=NULL?$signataire->getNomContact():" - ");
	  $template->set_var("prenomSIGNATAIRE", $signataire!=NULL?$signataire->getPrenomContact():" - ");
	  $template->set_var("fonctionSIGNATAIRE", $signataire!=NULL?$signataire->getFonctionContact():" - ");
	  $template->set_var("debutSTAGE", $fiche->getDateDebutStage());
	  $template->set_var("finSTAGE", $fiche->getDateFinStage());

	  $template->set_var("nomMAITRESTAGE", $maitreStage!=NULL?$maitreStage->getNomContact():" - ");
	  $template->set_var("prenomMAITRESTAGE", $maitreStage!=NULL?$maitreStage->getPrenomContact():" - ");
	  $template->set_var("fonctionMAITRESTAGE", $maitreStage!=NULL?$maitreStage->getFonctionContact():" - ");
	  $template->set_var("mailMAITRESTAGE", $maitreStage!=NULL?$maitreStage->getEmailContact():" - ");
	  $template->set_var("telMAITRESTAGE", $maitreStage!=NULL?$maitreStage->getTelContact():" - ");
	
	  $template->set_var("nomSTAGE", $fiche->getIntituleStage());
	  $template->set_var("sujetSTAGE", $fiche->getSujetStage());
	  $template->set_var("domaineSTAGE", $fiche->getDomaineStage());
	  $template->set_var("technoSTAGE", $fiche->getTechnoStage());
	
	  $template->parse("parse", "gestionFicheStage");

      // Affichage des donn&#233;es
      $template->p("parse");
}
$fb->endForm();
$fb->generateXHTML();
?>

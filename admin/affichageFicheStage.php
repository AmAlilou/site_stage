<?php
set_include_path(".".PATH_SEPARATOR."..");
$SKIP_OB_START=true;
include_once("inc/main.inc.php");
require_once("inc/PHPLib/template.inc");

  $stage=NULL;
  $etudiant=NULL;
  if (isset($_GET['ficheEnCours']) and $_GET['ficheEnCours']!=""){
  	$stages = DBFicheStage::getRecords($_GET['ficheEnCours']);
  	$stage = $stages[0];
	$etudiant = $stage->getEtudiant();
  }
  /*
  $fb = new FormBuilder("affichageFicheStage.php","POST");
  $fb->beginForm();
  $liste = DBFicheStage::getFicheStageEtudiant($etudiant);
  $liste_fiches = Enumeration::getSelectablesArrayFromObject($liste,'$a->getIdStage()','"[".$a->getLibelleTypeStage()."] ".$a->getEntreprise()->getRaisonsocialeEntreprise()." : ".$a->getEtatStage()','"[".$a->getLibelleTypeStage()."]".$a->getEtatStage()." - ".$a->getEntreprise()->getRaisonsocialeEntreprise()');
  $fb->addSelectMenuField("Vos fiches","ficheEnCours",true,$liste_fiches," -- FICHE DE STAGE -- ",isset($_GET['ficheEnCours'])?$_GET['ficheEnCours']:"","",true,"OnChange = \"refreshPage();\"");
  echo "<hr/>";
  $fb->endForm();
  */
  if($stage!=NULL){

	  $template = new Template($GLOBALS['ROOT_PATH']."/admin", 0, $GLOBALS['ROOT_PATH']."/admin/affichageFicheStage.tpl");
	  $template->set_file("affichageFicheStage","../templates/affichageFicheStage.tpl");
	
	  $template->set_var("nomETUDIANT", XHTMLBuilder::getText($etudiant->getNomEtudiant()));
	  $template->set_var("prenomETUDIANT", XHTMLBuilder::getText($etudiant->getPrenomEtudiant()));
	  $template->set_var("adresseETUDIANT", XHTMLBuilder::getText($etudiant->getAdresseStageEtudiant()));
	  $template->set_var("cpETUDIANT", XHTMLBuilder::getText($etudiant->getCpstageEtudiant()));
	  $template->set_var("villeETUDIANT", XHTMLBuilder::getText($etudiant->getVillestageEtudiant()));
	  $template->set_var("mailETUDIANT", XHTMLBuilder::getText($etudiant->getMailstageEtudiant()));
	  $template->set_var("telETUDIANT", XHTMLBuilder::getText($etudiant->getTelstageEtudiant()));
	  
	  $typeStage = $stage->getTypeStage();
	  $template->set_var("typeStageSTAGE", XHTMLBuilder::getText($stage->getLibelleTypeStage()));
	  
	  $entreprise = $stage->getEntreprise();
	  $template->set_var("nomENTREPRISE", XHTMLBuilder::getText($entreprise->getRaisonsocialeEntreprise()));
	  $template->set_var("adresseENTREPRISE", XHTMLBuilder::getText($entreprise->getAdresseEntreprise()));
	  $template->set_var("cpENTREPRISE", XHTMLBuilder::getText($entreprise->getCodePostalEntreprise()));
	  $template->set_var("villeENTREPRISE", XHTMLBuilder::getText($entreprise->getVilleEntreprise()));
	  $template->set_var("telENTREPRISE", XHTMLBuilder::getText($entreprise->getTelEntreprise()));
	  $template->set_var("faxENTREPRISE", XHTMLBuilder::getText($entreprise->getFaxEntreprise()));
	  $signataire = $stage->getSignataireStage();
	  $template->set_var("nomSIGNATAIRE", XHTMLBuilder::getText($signataire!=NULL?$signataire->getNomContact():" - "));
	  $template->set_var("prenomSIGNATAIRE", XHTMLBuilder::getText($signataire!=NULL?$signataire->getPrenomContact():" - "));
	  $template->set_var("fonctionSIGNATAIRE", XHTMLBuilder::getText($signataire!=NULL?$signataire->getFonctionContact():" - "));
	  $template->set_var("debutSTAGE", XHTMLBuilder::getText($stage->getDateDebutStage()));
	  $template->set_var("finSTAGE", XHTMLBuilder::getText($stage->getDateFinStage()));
	  $maitreStage = $stage->getMaitreStage();
	  $template->set_var("nomMAITRESTAGE", XHTMLBuilder::getText($maitreStage!=NULL?$maitreStage->getNomContact():" - "));
	  $template->set_var("prenomMAITRESTAGE", XHTMLBuilder::getText($maitreStage!=NULL?$maitreStage->getPrenomContact():" - "));
	  $template->set_var("fonctionMAITRESTAGE", XHTMLBuilder::getText($maitreStage!=NULL?$maitreStage->getFonctionContact():" - "));
	  $template->set_var("mailMAITRESTAGE", XHTMLBuilder::getText($maitreStage!=NULL?$maitreStage->getEmailContact():" - "));
	  $template->set_var("telMAITRESTAGE", XHTMLBuilder::getText($maitreStage!=NULL?$maitreStage->getTelContact():" - "));
	
	  $template->set_var("nomSTAGE", XHTMLBuilder::getText($stage->getIntituleStage()));
	  $template->set_var("sujetSTAGE", XHTMLBuilder::getText($stage->getSujetStage()));
	  $template->set_var("domaineSTAGE", XHTMLBuilder::getText($stage->getDomaineStage()));
	  $template->set_var("technoSTAGE", XHTMLBuilder::getText($stage->getTechnoStage()));
	
	$template->parse("parse", "affichageFicheStage");
	  // Affichage des donn&#233;es
	  $template->p("parse");

  } else
  	echo "Aucune fiche de stage selectionn&#233;e.";
  	
  //$fb->generateXHTML();

?>

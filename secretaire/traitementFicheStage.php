<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

$fo_liste = array();
$fo_liste[0] = new FODonneesStageEtudiant();
$fo_liste[1] = new FOEntreprise();
$fo_liste[2] = new FOMaitreStage();
$fo_liste[3] = new FOSignataireStage();
$fo_liste[4] = new FOFicheStage();

$pfm = new PostFormManager($fo_liste);

if (isset($_GET["operation"]) and ($_GET["operation"]==2)){
	$pfm->setFormObjectResult("Operation","Modification");
	echo XHTMLBuilder::getText($pfm->manageAndGenerateContent());
}
else 
	echo XHTMLBuilder::getText("Opération inconnue.");
?>
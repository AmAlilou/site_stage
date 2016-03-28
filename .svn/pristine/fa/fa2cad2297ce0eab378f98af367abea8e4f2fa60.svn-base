<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo "<center><h2>Espace administrateur</h2></center>";


$fb = new FormBuilder("traitementAffecterTuteur.php", "post");


echo "<h1>  Affecter un tuteur et un relecteur  </h1>";

$fb->beginForm();
$fb->addSelectMenuField("Stage", FOAffecterTuteur::$CHAMP_FORM_ID_TYPE, true, DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO")),"choisissez","","",false,
"onChange=\"refreshPage()\"");
echo "<br/>";

if((isset($_GET[FOAffecterTuteur::$CHAMP_FORM_ID_TYPE])) and ($_GET[FOAffecterTuteur::$CHAMP_FORM_ID_TYPE] != ""))
{
   $idTypeStage =  $_GET[FOAffecterTuteur::$CHAMP_FORM_ID_TYPE];
}
else
{
  $idTypeStage =  -1;
  $_GET[FOAffecterTuteur::$CHAMP_FORM_ID_STAGE] = NULL;
}


$fb->addSelectMenuField("Etudiant", FOAffecterTuteur::$CHAMP_FORM_ID_STAGE, true, DBFicheStage::getFichesStagesNonAffecteesTuteur($idTypeStage),"choisissez");
echo "<br/>";

//Récupération des enseignants actif
$ensActif = DBEnseignant::getRecords(null, null, null, null, null, null, null, DBEnseignant::$STATUT_ENSEIGNANT_ACTIF) ;
//Tri des enseignants
$ensActif = Enumeration::sort($ensActif, '$a->getNomEnseignant()') ;

$fb->addSelectMenuField("Tuteur", FOAffecterTuteur::$CHAMP_FORM_ID_TUTEUR, false, $ensActif,"choisissez");
echo "<br/>";
$fb->addSelectMenuField("Relecteur", FOAffecterTuteur::$CHAMP_FORM_ID_RELECTEUR, false, $ensActif,"choisissez");

echo "<br/>";
echo '<input type="submit" value="Valider" />';
$fb->endForm();
$fb->generateXHTML();
?>
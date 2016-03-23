<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo "<center><h2>Espace administrateur</h2></center>";

   
$fb = new FormBuilder("traitementFormAffecterSoutenance.php", "post");

echo "<h1> Affecter une soutenance  </h1>";

$fb->beginForm();
$fb->addSelectMenuField("Stage", FOAffecterSoutenance::$CHAMP_FORM_ID_TYPE, true, DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO")),"choisissez","","",false,
"onChange=\"refreshPage()\"");
echo "<br/>";

if((isset($_GET[FOAffecterSoutenance::$CHAMP_FORM_ID_TYPE])) and ($_GET[FOAffecterSoutenance::$CHAMP_FORM_ID_TYPE] != ""))
{
   $idTypeStage =  $_GET[FOAffecterSoutenance::$CHAMP_FORM_ID_TYPE];
}
else
{
  $idTypeStage =  -1;
  $_GET[FOAffecterTuteur::$CHAMP_FORM_ID_STAGE] = NULL;
}

$fb->addSelectMenuField("Etudiant", FOAffecterSoutenance::$CHAMP_FORM_ID_STAGE, true, DBFicheStage::getFichesStagesNonAffecteesSoutenance($idTypeStage),"s&#233;lectionnez");
echo "<br/>";

$fb->addDateField("Date",  FOAffecterSoutenance::$CHAMP_FORM_DATE, true, "jj/mm/aaaa");
echo "<br/>";

echo "Heure de d&#233;but :";
echo "<SELECT name='".FOAffecterSoutenance::$CHAMP_FORM_HH_DEB."' id ='".FOAffecterSoutenance::$CHAMP_FORM_HH_DEB."'>";
for ($h=8; $h<21 ; $h++)
{
   $hFormat = str_pad($h, 2, "0", STR_PAD_LEFT);
   echo "<OPTION value=$hFormat>$hFormat</OPTION>";
} 		 
echo "</SELECT>h";

echo "<SELECT name='".FOAffecterSoutenance::$CHAMP_FORM_MM_DEB."' id ='".FOAffecterSoutenance::$CHAMP_FORM_MM_DEB."'>";
for ($h=0; $h<60 ; $h+=5)
{
   $hFormat = str_pad($h, 2, "0", STR_PAD_LEFT);
   echo "<OPTION value=$hFormat>$hFormat</OPTION>";
} 		 
echo "</SELECT>min";

echo "<br/>";
$fb->addTextField("Lieu", FOAffecterSoutenance::$CHAMP_FORM_LIEU, true, true, "", "", "");
echo "<br/>";
echo '<input type="submit" value="Valider" />';
$fb->endForm();
$fb->generateXHTML();

?>

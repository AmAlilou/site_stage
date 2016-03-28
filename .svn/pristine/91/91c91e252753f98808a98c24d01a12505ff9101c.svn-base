<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo "<center><h2>Espace administrateur</h2></center>";

   
$fb = new FormBuilder("traitementFormAffecterSoutenance.php", "post");

echo "<h1>Modifier une soutenance  </h1>";

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

// lors de la s&#233;lection d'un &#233;tudiant, la page sera recharg&#233;e avec l'id de l'&#233;tudiant
$fb->addSelectMenuField("Etudiant", FOAffecterSoutenance::$CHAMP_FORM_ID_STAGE, true, DBFicheStage::getFichesStagesAffecteesSoutenance($idTypeStage),"choisissez","","",false,
   "onChange=\"refreshPage()\"");
echo "<br/>";

$date = "jj/mm/aaaa";
$heure = "08";
$minutes = "00";
$_GET[FOAffecterSoutenance::$CHAMP_FORM_LIEU] = "";
$_GET[FOAffecterSoutenance::$CHAMP_FORM_DATE] = "";
if((isset($_GET[FOAffecterSoutenance::$CHAMP_FORM_ID_STAGE])) and ($_GET[FOAffecterSoutenance::$CHAMP_FORM_ID_STAGE] != ""))
{
   // si un id d'etudiant est pass&#233; en param&#232;tre,
   // permettra de remplir les autres champs avec les bonne sinfo
   $FicheEtu = DBFicheStage::getRecords($_GET[FOAffecterSoutenance::$CHAMP_FORM_ID_STAGE]);
   if($FicheEtu[0]->getIdTypeStage() == $_GET[FOAffecterSoutenance::$CHAMP_FORM_ID_TYPE])
   {
      $dateFiche = $FicheEtu[0]->getDateSoutenanceStage();
      list($date, $horaire) = split(" ",  $dateFiche); 
      list($heure, $minutes) = split('[:]',$horaire);
      $_GET[FOAffecterSoutenance::$CHAMP_FORM_DATE] = $date;
      $_GET[FOAffecterSoutenance::$CHAMP_FORM_LIEU] = $FicheEtu[0]->getLieuSoutenanceStage();
   }
}

$fb->addDateField("Date",  FOAffecterSoutenance::$CHAMP_FORM_DATE, true, "");
echo "<br/>";

echo "Heure de d&#233;but :";
echo "<SELECT name='".FOAffecterSoutenance::$CHAMP_FORM_HH_DEB."' id ='".FOAffecterSoutenance::$CHAMP_FORM_HH_DEB."'>";
for ($h=8; $h<21 ; $h++)
{
   $hFormat = str_pad($h, 2, "0", STR_PAD_LEFT);
   echo "<OPTION value=$hFormat";
   if ($hFormat == $heure)
      echo " selected";
   echo ">$hFormat</OPTION>";
   
} 		 
echo "</SELECT>h";

echo "<SELECT name='".FOAffecterSoutenance::$CHAMP_FORM_MM_DEB."' id ='".FOAffecterSoutenance::$CHAMP_FORM_MM_DEB."'>";
for ($h=0; $h<60 ; $h+=5)
{
   $hFormat = str_pad($h, 2, "0", STR_PAD_LEFT);
   echo "<OPTION value=$hFormat";
   if ($hFormat == $minutes)
      echo " selected";
   echo ">$hFormat</OPTION>";
} 		 
echo "</SELECT>min";

echo "<br/>";
$fb->addTextField("Lieu", FOAffecterSoutenance::$CHAMP_FORM_LIEU, true, true, "", "", "");
echo "<br/>";
echo '<input type="submit" value="Valider" />';
$fb->endForm();
$fb->generateXHTML();

?>

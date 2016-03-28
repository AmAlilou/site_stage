<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo "<center><h2>Espace administrateur</h2></center>";


$fb = new FormBuilder("traitementAffecterTuteur.php", "post");


echo "<h1> Modifier un tuteur et un relecteur  </h1>";

$fb->beginForm();
   
$fb->addSelectMenuField("Stage", FOAffecterTuteur::$CHAMP_FORM_ID_TYPE, true, DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO")),"choisissez","","",false,
"onChange=\"refreshPage()\"");
echo '<br/>';

if((isset($_GET[FOAffecterTuteur::$CHAMP_FORM_ID_TYPE])) and ($_GET[FOAffecterTuteur::$CHAMP_FORM_ID_TYPE] != ""))
{
   $idTypeStage =  $_GET[FOAffecterTuteur::$CHAMP_FORM_ID_TYPE];
}
else
{
  $idTypeStage =  -1;
  $_GET[FOAffecterTuteur::$CHAMP_FORM_ID_STAGE] = NULL;
}


// lors de la s&#233;lection d'un &#233;tudiant, la page sera recharg&#233;e avec l'id de l'&#233;tudiant
$fb->addSelectMenuField("Etudiant", FOAffecterTuteur::$CHAMP_FORM_ID_STAGE, true, DBFicheStage::getEnumerationEtudiantTuteurRelecteur($idTypeStage),"choisissez","","",false,
   "onChange=\"refreshPage()\"");
echo "<br/>";


$_GET[FOAffecterTuteur::$CHAMP_FORM_ID_TUTEUR] = "";
$_GET[FOAffecterTuteur::$CHAMP_FORM_ID_RELECTEUR] = "";
if((isset($_GET[FOAffecterTuteur::$CHAMP_FORM_ID_STAGE])) and ($_GET[FOAffecterTuteur::$CHAMP_FORM_ID_STAGE] != NULL))
{
   // si un id d'etudiant est pass&#233; en param&#232;tre,
   // permettra de selectionner son tuteur et son relecteur dans les 2 autres menu
   $FicheEtu = DBFicheStage::getRecords($_GET[FOAffecterTuteur::$CHAMP_FORM_ID_STAGE]);
   if( $FicheEtu[0]->getIdTypeStage() == $_GET[FOAffecterTuteur::$CHAMP_FORM_ID_TYPE])
   {
     $_GET[FOAffecterTuteur::$CHAMP_FORM_ID_TUTEUR] = $FicheEtu[0]->getIdTuteurStage();
     $_GET[FOAffecterTuteur::$CHAMP_FORM_ID_RELECTEUR] = $FicheEtu[0]->getIdRelecteurStage();
   }
}

$fb->addSelectMenuField("Tuteur", FOAffecterTuteur::$CHAMP_FORM_ID_TUTEUR, false, DBEnseignant::getRecords(null, null, null, null, null, null, null, DBEnseignant::$STATUT_ENSEIGNANT_ACTIF),"choisissez");
echo "<br/>";
$fb->addSelectMenuField("Relecteur", FOAffecterTuteur::$CHAMP_FORM_ID_RELECTEUR, false, DBEnseignant::getRecords(null, null, null, null, null, null, null, DBEnseignant::$STATUT_ENSEIGNANT_ACTIF),"choisissez");



echo "<br/>";
echo '<input type="submit" value="Valider" />';
$fb->endForm();
$fb->generateXHTML();
?>
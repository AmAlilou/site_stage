<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

if (isset($_GET["id_type_stage"]))
   $idType = $_GET["id_type_stage"];
else
   $idType = 1; 

$types = DBTypeStage::getRecords($idType);
$type = $types[0];
echo "<center><h2>Modification du type stage : ".$type->getLibelleTypeStage()."</h2></center>";


$fb = new FormBuilder("traitementFormModifierTypeStage.php?operation=2", "post");
$fb->beginForm();
$fb->addHiddenField(FOTypeStage::$CHAMP_FORM_ID_TYPE,"",$idType);
$fb->addTextField("Miage", FOTypeStage::$CHAMP_FORM_PROMO, true, true, "", "", "", $type->getMiage());
echo "<br/>";
$fb->addTextField("Libelle", FOTypeStage::$CHAMP_FORM_LIBELLE, true, true, "", "", "", $type->getLibelleTypeStage());
echo "<br/>";
$fb->addDateField("Date Debut Th&#233;orique",  FOTypeStage::$CHAMP_FORM_DATE_DEBUT, true, "",$type->getDateDebutTheorique());
echo "<br/>";
$fb->addDateField("Date Fin th&#233;orique",  FOTypeStage::$CHAMP_FORM_DATE_FIN, true,"",  $type->getDateFinTheorique());
echo "<br/>";
$fb->addDateField("Date Rapport",  FOTypeStage::$CHAMP_FORM_DATE_RAPPORT, true, "", $type->getDateRapport());
echo "<br/>";
$fb->addDateField("Date Soutenance 1",  FOTypeStage::$CHAMP_FORM_DATE_SOUTENANCE1, true, "", $type->getDateSoutenance1());
echo "<br/>";
$fb->addDateField("Date Soutenance 2",  FOTypeStage::$CHAMP_FORM_DATE_SOUTENANCE2, true, "", $type->getDateSoutenance2());
echo "<br/>";
$fb->addTextField("Dur&#233;e", FOTypeStage::$CHAMP_FORM_DUREE, true, true, "", "", "", $type->getDureeSoutenance());
echo "<br/>";
echo '<input type="submit" value="Valider" />';
$fb->endForm();
$fb->generateXHTML();

?>
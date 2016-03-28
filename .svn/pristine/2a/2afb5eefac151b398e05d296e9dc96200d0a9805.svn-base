<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));


echo "<center><h2>Cr&#233;ation d'un type de stage </h2></center>";

$fb = new FormBuilder("traitementFormModifierTypeStage.php?operation=1", "post");
$fb->beginForm();
$fb->addSelectMenuField("MIAGe", FOTypeStage::$CHAMP_FORM_PROMO, true, Enumeration::getSelectablesArray(array("L3","M1","M2"),true));
echo "<br/>";
$fb->addTextField("Libelle", FOTypeStage::$CHAMP_FORM_LIBELLE, true, true, "", "", "", "");
echo "<br/>";
$fb->addDateField("Date Debut Th&#233;orique",  FOTypeStage::$CHAMP_FORM_DATE_DEBUT, true, "","");
echo "<br/>";
$fb->addDateField("Date Fin th&#233;orique",  FOTypeStage::$CHAMP_FORM_DATE_FIN, true,"",  "");
echo "<br/>";
$fb->addDateField("Date Rapport",  FOTypeStage::$CHAMP_FORM_DATE_RAPPORT, true, "", "");
echo "<br/>";
$fb->addDateField("Date Soutenance 1",  FOTypeStage::$CHAMP_FORM_DATE_SOUTENANCE1, true, "", "");
echo "<br/>";
$fb->addDateField("Date Soutenance 2",  FOTypeStage::$CHAMP_FORM_DATE_SOUTENANCE2, true, "", "");
echo "<br/>";
$fb->addTextField("Dur&#233;e soutenances (min)", FOTypeStage::$CHAMP_FORM_DUREE, true, true, 2, "", "", "");
echo "<br/>";
echo '<input type="submit" value="Valider" />';
$fb->endForm();
$fb->generateXHTML();

?>
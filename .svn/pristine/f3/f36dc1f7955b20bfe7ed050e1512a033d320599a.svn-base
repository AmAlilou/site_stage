<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

$fb = new FormBuilder("traitementRefuserPropositionStage.php", "post");

$fb->beginForm();

$prop = DBPropositionStage::getRecords($_GET['idProposition']);
echo "<h1>Refus de la proposition intitul&#233;e : ".$prop[0]->getIntitule()."</h1>";

$fb->addTextareaField("Motif du refus", FORefuserPropositionStage::$CHAMP_FORM_MOTIF_REFUS, true, "");
$fb->addHiddenField(FORefuserPropositionStage::$CHAMP_FORM_ID_PROPOSITION_STAGE,"", $_GET["idProposition"]);
echo '<input type="submit" value="Valider" />';
echo '<input type="reset" value="Annuler" />';
$fb->endForm();


$fb->generateXHTML();

?>


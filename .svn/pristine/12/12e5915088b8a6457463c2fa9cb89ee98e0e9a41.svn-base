<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

$fo_liste = array();
$fo_liste[0] = new FOModificationPropositionStage();
$fo_liste[1] = new FOModificationConcerne();
$pfm = new PostFormManager($fo_liste);
echo $pfm->manageAndGenerateContent();

?>
<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

$fo_liste = array();
$fo_liste[0] = new FORefuserPropositionStage();

$pfm = new PostFormManager($fo_liste);
echo $pfm->manageAndGenerateContent();

?>
<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_SECRETAIRE_LOGGED));

$pfm = new PostFormManager(new FOGestionFicheStage());
echo $pfm->manageAndGenerateContent();
?>
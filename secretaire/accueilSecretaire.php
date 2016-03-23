<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
require_once("fctAide.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_SECRETAIRE_LOGGED));

echo "<center><h2>Espace Secr&#233;taire</h2></center>";

echo aideSecretaire() ;

?>

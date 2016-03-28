<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
require_once("fctAide.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ENSEIGNANT_LOGGED));
$nomEns = SessionManager::getEnseignant()->getNomEnseignant();
$prenomEns = SessionManager::getEnseignant()->getPrenomEnseignant();
echo "<center><h2>Espace enseignant $nomEns $prenomEns</h2></center>";

echo '<h3>Gestion des visites</h3>' ;
echo aideEnseignantGestionVisites() ;

?>

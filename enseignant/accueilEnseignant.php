<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
require_once("fctAide.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ENSEIGNANT_LOGGED));
$nomEns = SessionManager::getEnseignant()->getNomEnseignant();
$prenomEns = SessionManager::getEnseignant()->getPrenomEnseignant();

echo "<center><h2>Espace enseignant $nomEns $prenomEns</h2></center>";

echo '<h2>Informations personelles</h2>' ;
echo aideEnseignantPerso() ;

echo '<br /><br /><br /><hr /><hr />' ;

echo '<h2>'.XHTMLBuilder::getText('Informations générales').'</h2>' ;
echo aideEnseignantGnrl() ;
?>

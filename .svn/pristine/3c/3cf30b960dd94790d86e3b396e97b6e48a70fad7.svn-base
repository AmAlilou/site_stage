<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
require_once("fctAide.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ETUDIANT_LOGGED));
$nomEtu = SessionManager::getEtudiant()->getNomEtudiant();
$prenomEtu = SessionManager::getEtudiant()->getPrenomEtudiant();
echo "<center><h2>Espace &#233;tudiant $prenomEtu $nomEtu</h2></center>";

echo '<h2>Informations personnelles</h2>' ;
echo aideEtudiantPerso() ;

echo '<br /><br /><br /><hr /><hr />' ;

echo '<h2>'.XHTMLBuilder::getText('Informations générales').'</h2>' ;
echo aideEtudiantGnrl() ;
?>

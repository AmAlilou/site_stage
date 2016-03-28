<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
require_once("fctAide.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ETUDIANT_LOGGED));
// Ancienne Gestion des fichiers pdf, charge a la chaine //
//$nomEtu = SessionManager::getEtudiant()->getNomEtudiant();
//$prenomEtu = SessionManager::getEtudiant()->getPrenomEtudiant();
//echo "<center><h2>Espace &#233;tudiant $prenomEtu $nomEtu</h2></center>";
//echo "<h2>Propositions PDF envoy&#233es par le responsable des stages:</h2>";
//
//include "gestionRepertoireProp.php";

//on inclut le fichier pdf qui gere les pdf uploader par l administrateur//
include "listePropositionsPdf.php";

?>

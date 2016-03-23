<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo "<center><h2>Espace administrateur</h2></center>";

echo "<h1>Gestion des propositions de stage</h1>";

echo "<a href=\"gestionPropositionStage.php?action=avalider\">Propositions de stage &#224; valider</a>";
echo "<br/>";

echo "<a href=\"gestionPropositionStage.php?action=valider\">Propositions de stage valid&#233;es</a>";
echo "<br/>";

echo "<a href=\"gestionPropositionStage.php?action=refuser\">Propositions de stage refus&#233;es</a>";
echo "<br/>";

echo "<a href=\"modifierPropositionStage.php\">Modifier des propositions de stage</a>";

?>
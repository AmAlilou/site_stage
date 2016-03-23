<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));


$propsStages=DBPropositionStage::getRecords($_GET["idProposition"]);
$propStage=$propsStages[0];
$propStage->setEtatProposition(DBPropositionStage::$ETAT_PROPOSITION_STAGE_VALIDEE);
echo "La proposition de stage est valid&#233;e !<br/>Un mail a &#233;t&#233; envoy&#233; aux &#233;tudiants pouvant &#234;tre concern&#233;s par la proposition.<br/>Un mail a &#233;galement &#233;t&#233; envoy&#233; &#224; l'entreprise pour l'informer de la validation de la proposition.";
?>
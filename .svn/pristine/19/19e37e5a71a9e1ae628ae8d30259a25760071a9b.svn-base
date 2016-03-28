<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");


PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ETUDIANT_LOGGED));
$nomEtu = SessionManager::getEtudiant()->getNomEtudiant();
$prenomEtu = SessionManager::getEtudiant()->getPrenomEtudiant();
$idEtu = SessionManager::getEtudiant()->getIdEtudiant();
$fichesEtu  = DBFicheStage::getRecords("","","",DBConfig::getConfigValue("ANNEE PROMO"),$idEtu);


echo "<center><h2>Espace &#233;tudiant $prenomEtu $nomEtu</h2></center>";

$typesStage = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"),SessionManager::getEtudiant()->getMiageEtudiant());

echo "<center><h2>Propositions de stage des entreprises</h2></center>";

//Affichage des propositions de stage du niveau de l'étudiant (fonction à la fin de ce fichier)
affPropositions($typesStage) ;

//Récupération des types de stage qui ne concernent pas l'étudiant logué
$typesStageNonConcernes = DBTypeStage::getNonConcernes(DBConfig::getConfigValue("ANNEE PROMO"),SessionManager::getEtudiant()->getMiageEtudiant());

//Affichage des propositions de stage qui ne concerne pas l'étudiant logué (fonction à la fin de ce fichier)
affPropositions($typesStageNonConcernes) ;

function affPropositions($typesStage) {
	foreach($typesStage as $typeStage) { 
   
		echo "<h2>".$typeStage->getLibelleTypeStage()."</h2>";
		echo "<br/>";
		$concernes = DBConcerne::getRecords($typeStage->getIdTypeStage(),"");
	   
		foreach($concernes as $concerne) {
	      
			$idPropStage = $concerne->getIdPropositionStage();
			$props = DBPropositionStage::getRecords($idPropStage,"","","","","","","","","","",DBPropositionStage::$ETAT_PROPOSITION_STAGE_VALIDEE);
	      
			if(isset($props[0])) {
				$prop = $props[0];
				$ents = DBEntreprise::getRecords($prop->getIdEntreprise());
				echo '<strong> <a href="../popups/popUpEntreprise.php?idEntreprise='.$prop->getIdEntreprise().'" target="blank">'. $ents[0]->getRaisonsocialeEntreprise().' ('.$ents[0]->getVilleEntreprise().')</a> </strong><br/> <a href="../popups/popUpSujetProposition.php?idProposition='.$prop->getIdPropositionStage().'" target="blank">'. $prop->getIntitule().'</a>';

				if($prop->getNbFiche()>0) {
					echo XHTMLBuilder::getText('<br />Cette proposition fait déjà l\'objet d\'une fiche de stage.') ;
				}
				echo "<br/>";
				echo "<br/>";
			}
		}
	}
}

?>
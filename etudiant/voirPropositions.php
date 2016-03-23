<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");


PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ETUDIANT_LOGGED));
$nomEtu = SessionManager::getEtudiant()->getNomEtudiant();
$prenomEtu = SessionManager::getEtudiant()->getPrenomEtudiant();
$idEtu = SessionManager::getEtudiant()->getIdEtudiant();
$fichesEtu  = DBFicheStage::getRecords("","","",DBConfig::getConfigValue("ANNEE PROMO"),$idEtu);

      
echo "<center><h2>Espace &#233;tudiant $prenomEtu $nomEtu</h2></center>";

$promotion = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"),SessionManager::getEtudiant()->getMiageEtudiant());

//Récupération des types de stage qui ne concernent pas l'étudiant logué
$promotionsNonConcernees = DBTypeStage::getNonConcernes(DBConfig::getConfigValue("ANNEE PROMO"),SessionManager::getEtudiant()->getMiageEtudiant());

echo "<center><h2>Propositions de stage des entreprises</h2></center>";

?>
<span><b>Promotion :</b></span>
  <form method="post" name="formu" action="voirPropositions.php"> 
	  <select name="prom[]" onchange="submit()">
	  <option selected value="promo">Choisissez la promotion</option>
	  <option value="toutes">Toutes</option>
	  <?php 
	  foreach($promotion as $type)
	  {
	  echo '<option value="' .$type->getLibelleTypeStage(). '">' .$type->getLibelleTypeStage(). '</option>'; 
      }
      foreach($promotionsNonConcernees as $type)
	  {
	  echo '<option value="' .$type->getLibelleTypeStage(). '">' .$type->getLibelleTypeStage(). '</option>'; 
      }
      	?>
  

	  </select>
  </form>
  <form method="post" name="test" action=""> 
	  <?php
	  //modif guilhem le 12-01-2008
	  if (isset($_POST['prom'])){
	  $prom=$_POST['prom']; 
	  foreach($prom as $selectValue){
		 if($selectValue!="promo"){
		//Affichage des propositions de stage du niveau de l'étudiant (fonction à la fin de ce fichier)
		affProposition($promotion, $selectValue) ;
		//Affichage des propositions de stage qui ne concernent pas l'étudiant logué (fonction à la fin de ce fichier)
		affProposition($promotionsNonConcernees,$selectValue) ;
		}
		if ($selectValue=="toutes"){
		//Affichage des propositions de stage du niveau de l'étudiant (fonction à la fin de ce fichier)
		affPropositions($promotion) ;
		//Affichage des propositions de stage qui ne concernent pas l'étudiant logué (fonction à la fin de ce fichier)
		affPropositions($promotionsNonConcernees) ;
			
		}
		}
		}
   		 ?>
  </form>	  
       
<?php



function affProposition($typesStage,$promo) {
	foreach($typesStage as $typeStage) { 
		$var= $typeStage->getLibelleTypeStage();
   		if($promo==$var){	 
		echo "<h2>".$typeStage->getLibelleTypeStage()."</h2>";
		echo "<br/>";
		$concernes = DBConcerne::getRecords($typeStage->getIdTypeStage(),"");
	   
		foreach($concernes as $concerne) {
	      
			$idPropStage = $concerne->getIdPropositionStage();
			$props = DBPropositionStage::getRecords($idPropStage,"","","","","","","","","","",DBPropositionStage::$ETAT_PROPOSITION_STAGE_VALIDEE);
			$props += DBPropositionStage::getRecords($idPropStage,"","","","","","","","","","",DBPropositionStage::$ETAT_PROPOSITION_STAGE_POURVUE);
	      
			if(isset($props[0])) {
				$prop = $props[0];
				$ents = DBEntreprise::getRecords($prop->getIdEntreprise());
				echo '<strong> <a href="../popups/popUpEntreprise.php?idEntreprise='.$prop->getIdEntreprise().'" target="blank">'. $ents[0]->getRaisonsocialeEntreprise().' ('.$ents[0]->getVilleEntreprise().')</a> </strong><br/> <a href="../popups/popUpSujetProposition.php?idProposition='.$prop->getIdPropositionStage().'" target="blank">'. $prop->getIntitule().'</a>';

				if($prop->getEtat() == "Pourvue") {
					echo XHTMLBuilder::getText('<br />Cette proposition est deja pourvue.') ;
				}
				echo "<br/>";
				echo "<br/>";
				}
			}
		}
	}
}

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
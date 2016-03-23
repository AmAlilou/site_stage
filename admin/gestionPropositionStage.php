<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));



$fb = new FormBuilder("", "post");

$fb->beginForm();


$fb->addHiddenField("action", "", $_GET["action"]);
$afficher="non";
$candidat='non';
switch ($_GET["action"]) {
case "avalider":
   $etat=DBPropositionStage::$ETAT_PROPOSITION_STAGE_ATTENTE_VALIDATION;
   $titre="Propositions de stages &#224; valider";
   $afficher="oui";
   break;
case "valider":
   $etat=DBPropositionStage::$ETAT_PROPOSITION_STAGE_VALIDEE;
   $titre="Propositions de stages valid&#233;es";
   $candidat='oui';
   break;
case "refuser":
   $etat=DBPropositionStage::$ETAT_PROPOSITION_STAGE_REFUSEE;
   $titre="Propositions de stages refus&#233;es";

   break;
case "pourvue":
   $etat=DBPropositionStage::$ETAT_PROPOSITION_STAGE_POURVUE;
   $titre="Propositions de stages pourvues";
   $candidat='oui';
   break;

}



echo "<H2>".$titre."</H2>";



$value_idTypeStage=isset($_GET[FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE])?$_GET[FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE]:"";
$value_idEntreprise=isset($_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE]:"";
//On reccup&#232;re les types de stage
$typesStage = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"));
$fb->addSelectMenuField("Type de stage", FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE, true,$typesStage,"Tous","","","","onChange=\"refreshPage();\"");

//on reccup&#232;re les entreprises ayant propos&#233;s un stage pour ce type de stage

$entreprisesRetenues=array();
$propositionsStagesRetenues=array();
//if($value_idTypeStage == ""){
//     $concernes=DBConcerne::getRecords();
//}
//else
//{
     $concernes=DBConcerne::getRecords($value_idTypeStage);
//}

foreach($concernes as $concerne) {

         $propStages=DBPropositionStage::getRecords($concerne->getIdPropositionStage(), "", "", "", "", "", "", "", "", "", "", $etat, "", "", DBConfig::getConfigValue("ANNEE PROMO"), "", "", "", "", "", "", $value_idEntreprise);
         if(count($propStages)==1){
             $propStage=$propStages[0];
			 
             $entreprises=DBEntreprise::getRecords($propStage->getIdEntreprise());

             if(count($entreprises)==1){
                 $entreprise=$entreprises[0];
                 //on rajoute cet entreprise dans la liste si elle n'y est pas encore
                 if(!array_key_exists($entreprise->getIdEntreprise(),$entreprisesRetenues))
                      $entreprisesRetenues[$entreprise->getIdEntreprise()]=$entreprise->getRaisonsocialeEntreprise()." (".$entreprise->getCodePostalEntreprise()." ".$entreprise->getVilleEntreprise().")";
                 //on rajoute cette proposition dans la liste des propositions
                 $propositionsStagesRetenues[$propStage->getIdPropositionStage()]=$propStage;
             }

         }
}

//on affiche la liste des propositions de stage
if(count($entreprisesRetenues)>0){

    $fb->addSelectMenuField("Entreprise", FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE, true,Enumeration::getSelectablesArray($entreprisesRetenues) ,"Tous","","","","onChange=\"refreshPage();\"");
    echo "<br/><br/>";
    echo "<table border='1' width='98%'>";
    echo "<tr>";
    
	echo "<th width='50%' align='center'>Intitul&#233; du stage</th>";
	echo "<th width='40%' align='center'>Entreprise</th>";
    
	if($afficher=="oui")
        echo "<th width='10%' align='center'>Action</th>";
	
	if($candidat=='oui') {
		echo '<th width="10%" align="center">Candidats</th>';
		echo '<th width="10%" align="center">Fiches</th>';
	}
	echo "</tr>";
    //sort($propositionsStagesRetenues);
    foreach($propositionsStagesRetenues as $key => $propositionStageRetenue) {
        echo "<tr>";
         //echo "<td>";
         //$fb->addRadioGroup("", $radioName, $isMandatory, $selectablesArray, $selectedRadioDefaultValue="", $currentValue="", $verticalDisplay=false, $moreRadioParams="");

        echo '<td><a href="../popups/popUpSujetProposition.php?idProposition='.$key.'" target="blank">'. $propositionStageRetenue->getIntitule().'</a></td>';
        
		echo '<td><a href="../popups/popUpEntreprise.php?idEntreprise='.$propositionStageRetenue->getIdEntreprise().'" target="blank">';
		$entreprises = DBEntreprise::getRecords($propositionStageRetenue->getIdEntreprise()) ;
		echo $entreprises[0]->getRaisonsocialeEntreprise() ;
		echo '</a></td>';
		
        if($afficher=="oui")
            echo "<td><a href=\"#\" onclick='if(confirm(\"Confirmez vous la validation?\"))document.location.href=\"validerPropStage.php?idProposition=". $key ."\"'>Valider</a><br/>".
            "<a href=\"formRefuserPropStage.php?idProposition=". $key ."\">Refuser</a></td>";
			
	if($candidat=='oui') {
			echo '<td>'.$propositionStageRetenue->getNbCandidature().'</td>' ;
			echo '<td>'.$propositionStageRetenue->getNbFiche().'</td>' ;
		}
			 
        echo "</tr>";
    }

    echo "</table>";
}
else
    echo "<br/><br/>Aucune proposition de stage!";


$fb->generateXHTML();


?>


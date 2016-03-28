<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));



$fb = new FormBuilder("", "post");

$fb->beginForm();

echo "<H2>Proposition de stage &#224; modifier</H2>";


$value_idTypeStage=isset($_GET[FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE])?$_GET[FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE]:"";
$value_idEntreprise=isset($_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE]:"";
//On reccup&#232;re les types de stage
$typesStage = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"));
$fb->addSelectMenuField("Type de stage", FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE, true,$typesStage,"Tous","","","","onChange=\"refreshPage();\"");

//on reccup&#232;re les entreprises ayant propos&#233;s un stage pour ce type de stage

$entreprisesRetenues=array();
$propositionsStagesRetenues=array();
$concernes=DBConcerne::getRecords($value_idTypeStage);


foreach($concernes as $concerne)
{
         $propStages=DBPropositionStage::getRecords($concerne->getIdPropositionStage(), "", "", "", "", "", "", "", "", "", "", "", "", "", DBConfig::getConfigValue("ANNEE PROMO"), "", "", "", "", "", "", $value_idEntreprise);

         if(count($propStages)==1){
             $propStage=$propStages[0];
             $entreprises=DBEntreprise::getRecords($propStage->getIdEntreprise());

             if(count($entreprises)==1){
                 $entreprise=$entreprises[0];
                 //on rajoute cet entreprise dans la liste si elle n'y est pas encore
                 if(!array_key_exists($entreprise->getIdEntreprise(),$entreprisesRetenues))
                      $entreprisesRetenues[$entreprise->getIdEntreprise()]=$entreprise->getRaisonsocialeEntreprise()." (".$entreprise->getCodePostalEntreprise()." ".$entreprise->getVilleEntreprise().")";
                 //on rajoute cette proposition dans la liste des propositions
                 $propositionsStagesRetenues[$propStage->getIdPropositionStage()]=$propStage->getIntitule();
             }

         }
}

//on affiche la liste des propositions de stage
if(count($entreprisesRetenues)>0){

    $fb->addSelectMenuField("Entreprise", FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE, true,Enumeration::getSelectablesArray($entreprisesRetenues) ,"Tous","","","","onChange=\"refreshPage();\"");
    echo "<br/><br/>";
    echo "<table border='1' width='98%'>";
    echo "<tr>";
    echo "<th width='90%' align='center'>Intitul&#233; du stage</th>";
    echo "<th width='10%' align='center'>Action</th>";
    echo "</tr>";
    //sort($propositionsStagesRetenues);
    foreach($propositionsStagesRetenues as $key => $propositionStageRetenue)
    {
         echo "<tr>";

         echo "<td><a href=\"../popups/popUpSujetProposition.php?idProposition=".$key."\" target=\"blank\">". $propositionStageRetenue ."</a> </td>";
         echo "<td><a href=\"formModificationPropStage.php?idProposition=". $key ."\">Modifier</a></td>";
         echo "</tr>";
    }

    echo "</table>";
}
else
    echo "<br/><br/>Aucune proposition de stage!";


$fb->generateXHTML();


?>


<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
//PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

$adminLog = false;
if (SessionManager::isAdminLogged())
{
   echo "<center><h2>Espace administrateur</h2></center>";
   $adminLog = true;
}

echo "<h1>Consultation des soutenances</h1>";

$fb = new FormBuilder("traitementAffecterTuteur.php", "post");
$fb->beginForm();


if((isset($_GET["id_type_stage"])) and ($_GET["id_type_stage"] != ""))
{
   $typesStage =  DBTypeStage::getRecords($_GET["id_type_stage"]);
   $typeStage = $typesStage[0] ;
}
else
{
  $typeStage =  NULL;
}

$fb->addSelectMenuField("Stage", "id_type_stage", true, DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO")),"choisissez","","",false,
"onChange=\"refreshPage()\"");
echo "<br/>";

$TRIS_POSSIBLES = array(
"type" => '$a->getLibelleTypeStage()',
"etudiant" => '$a->getNomEtudiant()',
"dateSoutenance" => '$a->getDateSoutenanceStage()', 
"lieuSoutenance" => '$a->getLieuSoutenanceStage()',
"tuteur" => '$a->getNomTuteurStage()', 
"relecteur" => '$a->getNomRelecteurStage()'
);


//$fiches = DBFicheStage::getRecords("", $idTypeStage,"",DBConfig::getConfigValue("ANNEE PROMO"),"","","","","","","","","","","","","","","","","","","","","","","","","","","");
$fiches = DBFicheStage::getFichesStageValides(NULL,$typeStage);

if(isset($_GET['OrderBy']) and (array_key_exists( $_GET['OrderBy'], $TRIS_POSSIBLES)))
 $fiches = Enumeration::sort($fiches, $TRIS_POSSIBLES[$_GET['OrderBy']]);


echo" <table border='1' width='98%'><tr>" ;
if(!is_null($typeStage)) {
	echo "<th width='10%' align='center'> <a href='formConsulterCalendrier.php?id_type_stage=".$typeStage->getIdTypeStage()."&OrderBy=type'>Type Stage</a></th>
	<th width='10%' align='center'> <a href='formConsulterCalendrier.php?id_type_stage=".$typeStage->getIdTypeStage()."&OrderBy=etudiant'>Etudiant</a></th>  
	<th width='20%' align='center'> <a href='formConsulterCalendrier.php?id_type_stage=".$typeStage->getIdTypeStage()."&OrderBy=dateSoutenance'>DateSoutenance</a></th> 
	<th width='20%' align='center'> <a href='formConsulterCalendrier.php?id_type_stage=".$typeStage->getIdTypeStage()."&OrderBy=lieuSoutenance'>Lieu soutenance</a></th>
	<th width='20%' align='center'> <a href='formConsulterCalendrier.php?id_type_stage=".$typeStage->getIdTypeStage()."&OrderBy=tuteur'>Tuteur</a></th>
	<th width='20%' align='center'> <a href='formConsulterCalendrier.php?id_type_stage=".$typeStage->getIdTypeStage()."&OrderBy=relecteur'>Relecteur</a></th>" ;
}
else {
	echo "<th width='10%' align='center'> <a href='formConsulterCalendrier.php?OrderBy=type'>Type Stage</a></th>
		<th width='10%' align='center'> <a href='formConsulterCalendrier.php?OrderBy=etudiant'>Etudiant</a></th>  
		<th width='20%' align='center'> <a href='formConsulterCalendrier.php?OrderBy=dateSoutenance'>DateSoutenance</a></th> 
		<th width='20%' align='center'> <a href='formConsulterCalendrier.php?OrderBy=lieuSoutenance'>Lieu soutenance</a></th>
		<th width='20%' align='center'> <a href='formConsulterCalendrier.php?OrderBy=tuteur'>Tuteur</a></th>
		<th width='20%' align='center'> <a href='formConsulterCalendrier.php?OrderBy=relecteur'>Relecteur</a></th>" ;
}
echo "</tr>";

foreach ($fiches as $fiche)
{
   if($adminLog)
   {
      echo "<tr> 
      <td><a href=\"../popups/popUpTypeStage.php?idTypeStage=".$fiche->getIdTypeStage()."\" target=\"blank\">". $fiche->getLibelleTypeStage() ."</a></td> 
      <td> <a href=\"../popups/popUpEtudiant.php?idEtudiant=".$fiche->getIdEtudiant()."\" target=\"blank\">". $fiche->getNomEtudiant()." ".$fiche->getPrenomEtudiant()."</a></td> 
      <td>". $fiche->getDateSoutenanceStage() ."</td> 
      <td>". $fiche->getLieuSoutenanceStage() ."</td> 
      <td> <a href=\"../popups/popUpEnseignant.php?idEnseignant=".$fiche->getIdTuteurStage()."\" target=\"blank\">". $fiche->getNomTuteurStage()." ".$fiche->getPrenomTuteurStage()  ."</a></td> 
      <td> <a href=\"../popups/popUpEnseignant.php?idEnseignant=".$fiche->getIdRelecteurStage()."\" target=\"blank\">". $fiche->getNomRelecteurStage()." ".$fiche->getPrenomRelecteurStage()  ."</a></td>  
      </tr>";
   }
   else
   {
       echo "<tr> 
      <td> ". $fiche->getLibelleTypeStage() ."</td> 
      <td> ". $fiche->getNomEtudiant()." ".$fiche->getPrenomEtudiant()."</td> 
      <td> ". $fiche->getDateSoutenanceStage() ."</td> 
      <td> ". $fiche->getLieuSoutenanceStage() ."</td> 
      <td> ". $fiche->getNomTuteurStage()." ".$fiche->getPrenomTuteurStage()  ."</td> 
      <td> ". $fiche->getNomRelecteurStage()." ".$fiche->getPrenomRelecteurStage()  ."</td>  
      </tr>";
   }
}
echo "</table>";
$fb->endForm();
$fb->generateXHTML();
?>
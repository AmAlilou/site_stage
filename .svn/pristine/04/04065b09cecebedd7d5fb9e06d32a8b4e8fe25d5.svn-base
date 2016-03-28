<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ENSEIGNANT_LOGGED));
$nomEns = SessionManager::getEnseignant()->getNomEnseignant();
$prenomEns = SessionManager::getEnseignant()->getPrenomEnseignant();
$idEns = SessionManager::getEnseignant()->getIdEnseignant();


 /****IMPRESSION****/
include("../impression.php");

echo "<center><h2>Espace enseignant $nomEns $prenomEns</h2></center>";

echo "<h1>Consultation des soutenances</h1>";

$TRIS_POSSIBLES = array(
"type" => '$a->getLibelleTypeStage()',
"etudiant" => '$a->getNomEtudiant()',
"dateSoutenance" => '$a->getDateSoutenanceStage()', 
"lieuSoutenance" => '$a->getLieuSoutenanceStage()',
"tuteur" => '$a->getNomTuteurStage()', 
"relecteur" => '$a->getNomRelecteurStage()'
);


$fichesTut = DBFicheStage::getRecords("","","",DBConfig::getConfigValue("ANNEE PROMO"),"","","","","","","","","","","","","","","","","","","","","","","","","","","",$idEns);
$fichesRel = DBFicheStage::getRecords("","","",DBConfig::getConfigValue("ANNEE PROMO"),"","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",$idEns);

$fiches = array_merge($fichesTut, $fichesRel);


if(isset($_GET['OrderBy']) and (array_key_exists( $_GET['OrderBy'], $TRIS_POSSIBLES)))
 $fiches = Enumeration::sort($fiches, $TRIS_POSSIBLES[$_GET['OrderBy']]);


echo" <table border='1' width='98%'>
<tr> 
<th width='10%' align='center'> <a href='consulterSoutenances.php?OrderBy=type'>Type Stage</a></th>
<th width='10%' align='center'> <a href='consulterSoutenances.php?OrderBy=etudiant'>Etudiant</a></th>  
<th width='20%' align='center'> <a href='consulterSoutenances.php?OrderBy=dateSoutenance'>DateSoutenance</a></th> 
<th width='20%' align='center'> <a href='consulterSoutenances.php?OrderBy=lieuSoutenance'>Lieu soutenance</a></th>
<th width='20%' align='center'> <a href='consulterSoutenances.php?OrderBy=tuteur'>Tuteur</a></th>
<th width='20%' align='center'> <a href='consulterSoutenances.php?OrderBy=relecteur'>Relecteur</a></th>
</tr>";

foreach ($fiches as $fiche)
{
   echo "<tr> 
   <td><a href=\"#\" onclick=\"window.open('../popups/popUpTypeStage.php?idTypeStage=".$fiche->getIdTypeStage()."','','menubar=no,toolbar=no,location=no')\">". $fiche->getLibelleTypeStage() ."</a></td> 
   <td> <a href=\"#\" onclick=\"window.open('../popups/popUpEtudiant.php?idEtudiant=".$fiche->getIdEtudiant()."','','menubar=no,toolbar=no,location=no')\">". $fiche->getNomEtudiant()." ".$fiche->getPrenomEtudiant()."</a></td> 
   <td>". $fiche->getDateSoutenanceStage() ."</td> 
   <td>". $fiche->getLieuSoutenanceStage() ."</td> 
   <td> <a href=\"#\" onclick=\"window.open('../popups/popUpEnseignant.php?idEnseignant=".$fiche->getIdTuteurStage()."','','menubar=no,toolbar=no,location=no')\">". $fiche->getNomTuteurStage()." ".$fiche->getPrenomTuteurStage()  ."</a></td> 
   <td> <a href=\"#\" onclick=\"window.open('../popups/popUpEnseignant.php?idEnseignant=".$fiche->getIdRelecteurStage()."','','menubar=no,toolbar=no,location=no')\">". $fiche->getNomRelecteurStage()." ".$fiche->getPrenomRelecteurStage()  ."</a></td>  
   </tr>";
}
echo "</table>";

?>
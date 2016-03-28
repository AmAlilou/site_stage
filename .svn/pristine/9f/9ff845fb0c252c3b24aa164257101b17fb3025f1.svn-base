<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ENSEIGNANT_LOGGED));
$nomEns = SessionManager::getEnseignant()->getNomEnseignant();
$prenomEns = SessionManager::getEnseignant()->getPrenomEnseignant();
$idEns = SessionManager::getEnseignant()->getIdEnseignant();
echo "<center><h2>Espace enseignant $nomEns $prenomEns</h2></center>";

echo "<h1>Consultation des visites</h1>";

$TRIS_POSSIBLES = array(
"type" => '$a->getLibelleTypeStage()',
"etudiant" => '$a->getNomEtudiant()',
"avisCorresp" => '$a->getCorrespSujetTravailVisite()', 
"avisEtu" => '$a->getAvisEtudiantVisite()',
"avisMaitre" => '$a->getAvisMaitreStageVisite()', 
"avisEns" => '$a->getAvisTuteurVisite()'
);


$fiches = DBFicheStage::getRecords("","","",DBConfig::getConfigValue("ANNEE PROMO"),"","","","","","","","","","","","","","","","","","","","","","","","","","","",$idEns);

if(isset($_GET['OrderBy']) and (array_key_exists( $_GET['OrderBy'], $TRIS_POSSIBLES)))
 $fiches = Enumeration::sort($fiches, $TRIS_POSSIBLES[$_GET['OrderBy']]);


echo" <table border='1' width='98%'>
<tr> 
<th width='10%' align='center'> <a href='consulterVisites.php?OrderBy=type'>Promo</a></th>
<th width='10%' align='center'> <a href='consulterVisites.php?OrderBy=etudiant'>Etudiant</a></th>  
<th width='20%' align='center'> <a href='consulterVisites.php?OrderBy=avisCorresp'>Avis de correspondance</a></th> 
<th width='20%' align='center'> <a href='consulterVisites.php?OrderBy=avisEtu'>Avis de &#233;tudiant</a></th>
<th width='20%' align='center'> <a href='consulterVisites.php?OrderBy=avisMaitre'>Avis de maitre de stage</a></th>
<th width='20%' align='center'> <a href='consulterVisites.php?OrderBy=avisEns'>Avis du tuteur</a></th>
</tr>";

foreach ($fiches as $fiche)
{
   echo "<tr> 
   <td><a href=\"#\" onclick=\"window.open('../popups/popUpTypeStage.php?idTypeStage=".$fiche->getIdTypeStage()."','','menubar=no,toolbar=no,location=no')\">". $fiche->getLibelleTypeStage() ."</a></td> 
   <td> <a href=\"#\" onclick=\"window.open('../popups/popUpEtudiant.php?idEtudiant=".$fiche->getIdEtudiant()."','','menubar=no,toolbar=no,location=no')\">". $fiche->getNomEtudiant()." ".$fiche->getPrenomEtudiant()."</a></td> 
   <td>". $fiche->getCorrespSujetTravailVisite() ."</td> 
   <td>". $fiche->getAvisEtudiantVisite() ."</td> 
   <td>". $fiche->getAvisMaitreStageVisite() ."</td> 
   <td>". $fiche->getAvisTuteurVisite() ."</td> 
   </tr>";
}
echo "</table>";

?>
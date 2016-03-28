<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo "<center><h2>Espace administrateur</h2></center>";

echo "<h1>Affectations des tuteurs et relecteurs</h1>";

$TRIS_POSSIBLES = array(
"type" => '$a->getLibelleTypeStage()',
"etudiant" => '$a->getNomEtudiant()',
"tuteur" => '$a->getNomTuteurStage()', 
"relecteur" => '$a->getNomRelecteurStage()'
);

$fiches = DBFicheStage::getFichesStageValides();

if(isset($_GET['OrderBy']) and (array_key_exists( $_GET['OrderBy'], $TRIS_POSSIBLES)))
 $fiches = Enumeration::sort($fiches, $TRIS_POSSIBLES[$_GET['OrderBy']]);


echo" <table border='1' width='90%'>
<tr> 
<th width='25%' align='center'> <a href='consulterAffectationsTuteur.php?OrderBy=type'>Promo</a></th>
<th width='25%' align='center'> <a href='consulterAffectationsTuteur.php?OrderBy=etudiant'>Etudiant</a></th>  
<th width='25%' align='center'> <a href='consulterAffectationsTuteur.php?OrderBy=tuteur'>Tuteur</a></th> 
<th width='25%' align='center'> <a href='consulterAffectationsTuteur.php?OrderBy=relecteur'>Relecteur</a></th>
</tr>";

foreach ($fiches as $fiche)
{
   echo "<tr> 
   <td><a href=\"#\" onclick=\"window.open('../popups/popUpTypeStage.php?idTypeStage=".$fiche->getIdTypeStage()."','','menubar=no,toolbar=no,location=no')\">". $fiche->getLibelleTypeStage() ."</a></td> 
    <td> <a href=\"#\" onclick=\"window.open('../popups/popUpEtudiant.php?idEtudiant=".$fiche->getIdEtudiant()."','','menubar=no,toolbar=no,location=no')\">". $fiche->getNomEtudiant()." ".$fiche->getPrenomEtudiant()."</a></td> 
    <td> <a href=\"#\" onclick=\"window.open('../popups/popUpEnseignant.php?idEnseignant=".$fiche->getIdTuteurStage()."','','menubar=no,toolbar=no,location=no')\">". $fiche->getNomTuteurStage()." ".$fiche->getPrenomTuteurStage()  ."</a></td> 
    <td> <a href=\"#\" onclick=\"window.open('../popups/popUpEnseignant.php?idEnseignant=".$fiche->getIdRelecteurStage()."','','menubar=no,toolbar=no,location=no')\">". $fiche->getNomRelecteurStage()." ".$fiche->getPrenomRelecteurStage()  ."</a></td> 
   </tr>";
}
echo "</table>";

?>
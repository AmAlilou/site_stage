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
echo "<h1>Consultation des &#233;tudiants &#224; suivre en tant que tuteur</h1>";

$TRIS_POSSIBLES = array(
"type" => '$a->getLibelleTypeStage()',
"etudiant" => '$a->getNomEtudiant()',
"societe" => '$a->getRaisonSocialeEntreprise()', 
"maitre" => '$a->getNomMaitreStage()', 
"sujet" => '$a->getIntituleStage()'
);


$fiches = DBFicheStage::getRecords("","","",DBConfig::getConfigValue("ANNEE PROMO"),"","","","","","","","","","","","","","","","","","","","","","","","","","","",$idEns);


if(isset($_GET['OrderBy']) and (array_key_exists( $_GET['OrderBy'], $TRIS_POSSIBLES)))
 $fiches = Enumeration::sort($fiches, $TRIS_POSSIBLES[$_GET['OrderBy']]);


echo" <table border='1' width='98%'>
<tr> 
<th width='18%' align='center'> <a href='consulterEtudiantsASuivre.php?OrderBy=type'>Promo</a></th>
<th width='18%' align='center'> <a href='consulterEtudiantsASuivre.php?OrderBy=etudiant'>Etudiant</a></th>  
<th width='18%' align='center'> <a href='consulterEtudiantsASuivre.php?OrderBy=societe'>Societe</a></th> 
<th width='18%' align='center'> <a href='consulterEtudiantsASuivre.php?OrderBy=maitre'>Maitre Stage</a></th> 
<th width='28%' align='center'> <a href='consulterEtudiantsASuivre.php?OrderBy=sujet'>Sujet</a></th>
</tr>";

foreach ($fiches as $fiche)
{ 
   echo "<tr> 
   <td><a href=\"../popups/popUpTypeStage.php?idTypeStage=".$fiche->getIdTypeStage()."\" target=\"blank\">". $fiche->getLibelleTypeStage()."</a></td> 
   <td> <a href=\"../popups/popUpEtudiant.php?idEtudiant=".$fiche->getIdEtudiant()."\" target=\"blank\">". $fiche->getNomEtudiant()." ".$fiche->getPrenomEtudiant()."</a></td> 
   <td> <a href=\"../popups/popUpEntreprise.php?idEntreprise=".$fiche->getIdEntreprise()."\" target=\"blank\">". $fiche->getRaisonSocialeEntreprise() ."</a></td> 
   <td> <a href=\"../popups/popUpContact.php?idContact=".$fiche->getIdMaitreStage()."\" target=\"blank\">".  $fiche->getNomMaitreStage()." ". $fiche->getPrenomMaitreStage()."</a></td>  
   <td> <a href=\"../popups/popUpSujetStage.php?idStage=".$fiche->getIdStage()."\" target=\"blank\">". $fiche->getIntituleStage() ."</a></td>  
   </tr>";
}
echo "</table>";

?>
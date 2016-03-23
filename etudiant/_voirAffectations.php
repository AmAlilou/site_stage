<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ETUDIANT_LOGGED));
$nomEtu = SessionManager::getEtudiant()->getNomEtudiant();
$prenomEtu = SessionManager::getEtudiant()->getPrenomEtudiant();
$idEtu =  SessionManager::getEtudiant()->getIdEtudiant();
$fichesEtu  = DBFicheStage::getFichesStageValides(SessionManager::getEtudiant());

echo "<center><h2>Espace &#233;tudiant $prenomEtu $nomEtu</h2></center>";

if (isset($fichesEtu[0]))
{
   foreach ($fichesEtu as $fiche)
   {
      echo "<table border='1' width='50%'>";
      echo "<tr> <th colspan='2' align='center'>". $fiche->getLibelleTypeStage() ."</th></tr>";
      echo "<tr> <td><strong>Tuteur</strong> </td> <td>".$fiche->getNomTuteurStage()." ".$fiche->getPrenomTuteurStage()."</td></tr>";
      echo "<tr> <td><strong>Relecteur</strong> </td> <td>".$fiche->getNomRelecteurStage()." ".$fiche->getPrenomRelecteurStage()."</td></tr>";
      echo "<tr> <td><strong>Date soutenance</strong> </td> <td>".$fiche->getDateSoutenanceStage()."</td></tr>";
      echo "<tr> <td><strong>Lieu soutenance</strong> </td> <td>".$fiche->getLieuSoutenanceStage()."</td></tr>";
      echo "</table>";
   }
}
else
{
 echo "Vous n'avez pas de fiche de stage";
}
?>
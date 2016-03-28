<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");


PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ENSEIGNANT_LOGGED));
$nomEns = SessionManager::getEnseignant()->getNomEnseignant();
$prenomEns = SessionManager::getEnseignant()->getPrenomEnseignant();
$idEns = SessionManager::getEnseignant()->getIdEnseignant();
echo "<center><h2>Espace enseignant $nomEns $prenomEns</h2></center>";

   
$fb = new FormBuilder("traitementFormSaisirVisite.php", "post");

echo "<h1> Saisissez une visite</h1>";

$fb->beginForm();
 $fb->addSelectMenuField("Stage", FOSaisirVisite::$CHAMP_FORM_ID_TYPE, true, DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO")),"choisissez","","",false,
"onChange=\"refreshPage()\"");
echo "<br/>";

if((isset($_GET[FOSaisirVisite::$CHAMP_FORM_ID_TYPE])) and ($_GET[FOSaisirVisite::$CHAMP_FORM_ID_TYPE] != ""))
{
   $idTypeStage =  $_GET[FOSaisirVisite::$CHAMP_FORM_ID_TYPE];
}
else
{
  $idTypeStage =  -1;
  $_GET[FOSaisirVisite::$CHAMP_FORM_ID_STAGE] = NULL;
}

$fb->addSelectMenuField("Etudiant", FOSaisirVisite::$CHAMP_FORM_ID_STAGE, true, DBFicheStage::getFichesStagesNonAffecteesVisite($idTypeStage,$idEns),"s&#233;lectionnez");
echo "<br/>";


$_GET[FOSaisirVisite::$CHAMP_FORM_AVIS_RESPONSABLE] = "";
$_GET[FOSaisirVisite::$CHAMP_FORM_CORRESP] = "";
$_GET[FOSaisirVisite::$CHAMP_FORM_AVIS_ETUDIANT] = "";
$_GET[FOSaisirVisite::$CHAMP_FORM_AVIS_ENSEIGNANT] = "";
$_GET[FOSaisirVisite::$CHAMP_FORM_DATE_VISITE] = "";
      
$fb->addTextareaField("Correspondance entre le sujet pr&#233;-d&#233;fini et le travail effectu&#233;", FOSaisirVisite::$CHAMP_FORM_CORRESP, true, "","",60);

echo '<br/>';

$fb->addTextareaField("Avis du responsable rencontr&#233;", FOSaisirVisite::$CHAMP_FORM_AVIS_RESPONSABLE, true, "","",60);
echo '<br/>';
$fb->addTextareaField("Avis de l'etudiant", FOSaisirVisite::$CHAMP_FORM_AVIS_ETUDIANT, true,  "","",60);
echo '<br/>';
$fb->addTextareaField("Avis l'enseignant", FOSaisirVisite::$CHAMP_FORM_AVIS_ENSEIGNANT, true,  "","",60);
echo '<br/>';
$fb->addDateField("Date de la visite",  FOSaisirVisite::$CHAMP_FORM_DATE_VISITE, true, "jj/mm/aaaa");
echo "<br/>";
$fb->addTextField("Responsable taxe apprentissage", FOSaisirVisite::$CHAMP_FORM_RESP_TAXE, false, true, "", "", "");
echo "<br/>";
echo '<input type="submit" value="Valider" />';
$fb->endForm();
$fb->generateXHTML();
?>
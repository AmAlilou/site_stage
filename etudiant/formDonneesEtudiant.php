<?php

set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
$nomEtu = SessionManager::getEtudiant()->getNomEtudiant();
$prenomEtu = SessionManager::getEtudiant()->getPrenomEtudiant();
$fb = new FormBuilder("traitementDonneesEtudiant.php", "post");
$etudiant = SessionManager::getEtudiant();
echo "<center><h2>Espace &#233;tudiant $prenomEtu $nomEtu</h2></center>";
echo "<center><h1>Modification des donn&#233;es &#233;tudiant</h1></center>";

$fb->beginForm();
echo "<BR/><BR/><BR/>";
echo "<h3>Coordonn&#233;es fac</h3>";

echo "<table><tr><td align='right'>";
$fb->addTextField("Adresse", FODonneesEtudiant::$CHAMP_FORM_ADRESSEFAC_ETUDIANT, false, true, "", "", "",$etudiant->getAdressefacEtudiant());
echo "</td><td align='right'>";
$fb->addTextField("Code postal", FODonneesEtudiant::$CHAMP_FORM_CPFAC_ETUDIANT, false, true, "", "","", $etudiant->getCpfacEtudiant());
echo "</td></tr><tr><td align='right'>";
$fb->addTextField("Ville", FODonneesEtudiant::$CHAMP_FORM_VILLEFAC_ETUDIANT, false, true, "", "","", $etudiant->getVillefacEtudiant());
echo "</td><td align='right'>";
$fb->addTextField("Email", FODonneesEtudiant::$CHAMP_FORM_MAILFAC_ETUDIANT, false, true, "", "","", $etudiant->getMailfacEtudiant());
echo "</td></tr></table>";
echo "<BR/><BR/><BR/>";

echo "<h3>Coordonn&#233;es stables</h3>";

echo "<table><tr><td align='right'>";
$fb->addTextField("Adresse", FODonneesEtudiant::$CHAMP_FORM_ADRESSESTABLE_ETUDIANT, false, true, "", "","", $etudiant->getAdressestableEtudiant());
echo "</td><td align='right'>";
$fb->addTextField("Code postal", FODonneesEtudiant::$CHAMP_FORM_CPSTABLE_ETUDIANT, false, true, "", "","", $etudiant->getCpstableEtudiant());
echo "</td></tr><tr><td align='right'>";
$fb->addTextField("Ville", FODonneesEtudiant::$CHAMP_FORM_VILLESTABLE_ETUDIANT, false, true, "", "","", $etudiant->getVillestableEtudiant());
echo "</td><td align='right'>";
$fb->addTextField("Email", FODonneesEtudiant::$CHAMP_FORM_MAILSTABLE_ETUDIANT, false, true, "", "","", $etudiant->getMailstableEtudiant());
echo "</td></tr></table>";
echo "<BR/><BR/><BR/>";

echo "<h3>Coordonn&#233;es stage</h3>";

echo "<table><tr><td align='right'>";
$fb->addTextField("Adresse", FODonneesEtudiant::$CHAMP_FORM_ADRESSESTAGE_ETUDIANT, false, true, "", "","", $etudiant->getAdressestageEtudiant());
echo "</td><td align='right'>";
$fb->addTextField("Code postal", FODonneesEtudiant::$CHAMP_FORM_CPSTAGE_ETUDIANT, false, true, "", "","", $etudiant->getCpstageEtudiant());
echo "</td></tr><tr><td align='right'>";
$fb->addTextField("Ville", FODonneesEtudiant::$CHAMP_FORM_VILLESTAGE_ETUDIANT, false, true, "", "","", $etudiant->getVillestageEtudiant());
echo "</td><td align='right'>";
$fb->addTextField("Email", FODonneesEtudiant::$CHAMP_FORM_MAILSTAGE_ETUDIANT, false, true, "", "","", $etudiant->getMailstageEtudiant());
echo "</td></tr><tr><td align='right'>";
$fb->addTextField("T&#233;l&#233;phone", FODonneesEtudiant::$CHAMP_FORM_TELSTAGE_ETUDIANT, false, true, "", "","", $etudiant->getTelstageEtudiant());
echo "</td></tr></table>";
echo "<br/>";

echo '<br/><br/>';
echo '<center><input type="submit" value="Valider" />';
echo '<input type="reset" value="Annuler" /></center>';
$fb->endForm();
$fb->generateXHTML();
?>




<?php
set_include_path(".");
require_once("inc/main.inc.php");

$fb = new FormBuilder("", "");
?>
<h1>R&#233;cup&#233;rer son mot de passe</h1>
<fieldset>
  <legend>Etudiant</legend>
<?php
    $etudiants = DBEtudiant::getRecords("", "", "", "", "", "", "", "", DBConfig::getConfigValue("ANNEE PROMO"));
    $etudiants = Enumeration::getSelectablesArrayFromObject($etudiants, '$a->getIdEtudiant()', '"[".$a->getMiageEtudiant()."] ".$a->getNomEtudiant()." ".$a->getPrenomEtudiant()');
    $fb->addSelectMenuField("Etudiant", "etudiant", false, $etudiants, XHTMLBuilder::getText("Sélectionnez un étudiant"));
?>
    <button onclick="window.location.href = 'traitementRecupMdp.php?idEtudiant='+document.getElementById('etudiant').value;">Envoyer un mail</button>
</fieldset>
<br/><br/><br/>
<fieldset>
  <legend>Enseignant</legend>
<?php
    $enseignants = Enumeration::sort(DBEnseignant::getRecords(), '$a->getNomEnseignant()." ".$a->getPrenomEnseignant()');
    $fb->addSelectMenuField("Enseignant", "enseignant", false, $enseignants, XHTMLBuilder::getText("Sélectionnez un Enseignant"));
?>
    <button onclick="window.location.href = 'traitementRecupMdp.php?idEnseignant='+document.getElementById('enseignant').value;">Envoyer un mail</button>
</fieldset>

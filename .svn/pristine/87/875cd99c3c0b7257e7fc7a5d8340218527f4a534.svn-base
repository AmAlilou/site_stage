<?php
set_include_path(".");
require_once("inc/main.inc.php");

$fb = new FormBuilder("enseignant/traitementConnexionEnseignant.php", "post");

echo "<center><h1>Espace Enseignant</h1></center>";
echo "<br/><br/><br/>";
if (isset($_GET['erreur']))
	if ($_GET['erreur']==1)
		echo "Erreur de connexion, le login ou le mot de passe est incorrect !";

$fb->beginForm();
echo "<table align='center'>";
echo "<tr><td>";

$enseignants = DBEnseignant::getRecords();
$enseignants = Enumeration::getSelectablesArrayFromObject($enseignants, '$a->getIdEnseignant()', '$a->getNomEnseignant()." ".$a->getPrenomEnseignant()');
$fb->addSelectMenuField("Identifiant", FOConnexionEnseignant::$CHAMP_FORM_LOGIN_ENSEIGNANT, true, $enseignants, $defaultMsg="Choisissez un enseignant");
echo "</td></tr><tr><td>";
$fb->addTextField("Mot de passe", FOConnexionEnseignant::$CHAMP_FORM_PASSWORD_ENSEIGNANT, true, false);
echo "</td></tr><tr><td align=\"center\"><a href=\"recupMdp.php\">".XHTMLBuilder::getText("J'ai oublié mon mot de passe")."</a></td></tr>";
echo "</table>";
echo "<br/><br/>";
echo '<center><input type="submit" value="Se connecter" /></center>';
$fb->endForm();
$fb->generateXHTML();
?>
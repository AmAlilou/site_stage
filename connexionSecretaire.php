<?php
set_include_path(".");
require_once("inc/main.inc.php");

$fb = new FormBuilder("secretaire/traitementConnexionSecretaire.php", "post");

echo "<center><h1>Espace Secr&#233;taire</h1></center>";
echo "<br/><br/><br/>";
if (isset($_GET['erreur']))
	if ($_GET['erreur']==1)
		echo "Erreur de connexion, le login ou le mot de passe est incorrect !";

$fb->beginForm();
echo "<table align='center'>";
echo "<tr><td>";
$fb->addTextField("Identifiant", FOConnexionSecretaire::$CHAMP_FORM_LOGIN_SECRETAIRE, true, true);
echo "</td></tr><tr><td>";
$fb->addTextField("Mot de passe", FOConnexionSecretaire::$CHAMP_FORM_PASSWORD_SECRETAIRE, true, false);
echo "</td></tr>";
echo "</table>";
echo "<br/><br/>";
echo '<center><input type="submit" value="Se connecter" /></center>';
$fb->endForm();
$fb->generateXHTML();
?>
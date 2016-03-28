<?php
set_include_path(".");
require_once("inc/main.inc.php");

$fb = new FormBuilder("etudiant/traitementConnexionEtudiant.php", "post");

echo "<center><h1>Espace Etudiant</h1></center>";
echo "<br/><br/><br/>";
$fb->beginForm();
if (isset($_GET['erreur']))
	if ($_GET['erreur']==1)
		echo "Erreur de connexion, le login ou le mot de passe est incorrect !";

echo "<table align='center'>";
echo "<tr><td>";
$fb->addTextField("Identifiant", FOConnexionEtudiant::$CHAMP_FORM_LOGIN_ETUDIANT, true, true);
echo "</td></tr><tr><td>";
$fb->addTextField("Mot de passe", FOConnexionEtudiant::$CHAMP_FORM_PASSWORD_ETUDIANT, true, false);
echo "</td></tr><tr><td align=\"center\"><a href=\"recupMdp.php\">".XHTMLBuilder::getText('J\'ai oublié mon mot de passe')."</a></td></tr>";
echo "</table>";
echo "<br/><br/>";
echo '<center><input type="submit" value="Se connecter" /></center>';
$fb->endForm();
$fb->generateXHTML();
?>
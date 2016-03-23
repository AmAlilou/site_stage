<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

$modif = (isset($_GET['action']) and ($_GET['action']==1));

echo "<table><tr><td width = '20%'>";
echo "<a href='configContacts.php'>Contacts</a>";
echo "</td><td  width = '20%'>";
echo "<a href='configStages.php'>Stages</a>";
echo "</td><td  width = '20%'>";
echo "<a href='configEnumerations.php'>Enumerations</a>";
echo "</td><td  width = '20%'>";
echo "<a href='configSite.php'>Site</a>";
echo "</td></tr></table>";
echo "<hr/><br/><br/>";

//parametrages site
echo "<h2>Mailing des mots de passe</h2>";
echo "<a href='envoiMdpEtudiants.php'>Envoyer les mots de passe de l'ann&#233;e &#224; tous les &#233;tudiants</a>";
echo "<br/><br/>";
echo "<h2>Param&#232;trage du site</h2><br/>";
if ($modif) {
    $fb = new FormBuilder("traitementConfigSite.php","POST");
    $fb->beginForm();
}
echo "<table border='1' width='100%'><th height='25'>Variable</th><th><center>Valeur</center></th><th><center>Modifier</center></th>";

//annee en cours
echo "<tr><td height='25' width='60%'><strong>Ann&#233;e en cours</strong></td><td width='20%'><center>";
if ($modif and isset($_GET['value']) and $_GET['value']==1){
    $fb->addTextField("",FOConfigSite::$CHAMP_FORM_ANNEE_ENCOURS,false, true,"","","",DBConfig::getConfigValue("ANNEE PROMO"));
    echo "</center></td><td width='20%'><center><input type='submit' value='Modifier'/></center></td></tr>";
}else {
	echo DBConfig::getConfigValue("ANNEE PROMO");
	echo "</center></td><td width='20%'><center><a href='configSite.php?action=1&value=1'>Modifier</a></center></td></tr>";
}

//intervalle en secondes
echo "<tr><td  height='25'><strong>Intervalle d'envoi de mails (en secondes)</strong></td><td><center>";
if ($modif and isset($_GET['value']) and $_GET['value']==2){
    $fb->addTextField("",FOConfigSite::$CHAMP_FORM_INTERVALLE_MAILS,false, true,"","","",DBConfig::getConfigValue("LIMITE SECONDES ENVOI MAIL"));
   	echo "</center></td width='20%'><td><center><input type='submit' value='Modifier'/></center></td></tr>";
}else {
	echo DBConfig::getConfigValue("LIMITE SECONDES ENVOI MAIL");
	echo "</center></td><td><center><a href='configSite.php?action=1&value=2'>Modifier</a></center></td></tr>";
}

//mail debug
echo "<tr><td height='25'><strong>Admin en copie cach&#233;e dans les mails envoy&#233;s (oui=1,non=0)</strong></td><td><center>";
if ($modif and isset($_GET['value']) and $_GET['value']==3){
    $fb->addTextField("",FOConfigSite::$CHAMP_FORM_MAIL_DEBUG,false, true,"","","",DBConfig::getConfigValue("MAIL DEBUG"));
    echo "</center></td><td width='20%'><center><input type='submit' value='Modifier'/></center></td></tr>";
}else {
	echo DBConfig::getConfigValue("MAIL DEBUG");
	echo "</center></td><td><center><a href='configSite.php?action=1&value=3'>Modifier</a></center></td></tr>";
}

//nb elements min avant filtre
echo "<tr><td height='25'><strong>Nb &#233;l&#233;ments min avant activation du filtre (listes d&#233;roulantes)</strong></td><td><center>";
if ($modif and isset($_GET['value']) and $_GET['value']==4){
    $fb->addTextField("",FOConfigSite::$CHAMP_FORM_NB_ELEMENTS,false, true,"","","",DBConfig::getConfigValue("APPARITION RECHERCHE MENU DEROULANT"));
    echo "</center></td><td><center><input type='submit' value='Modifier'/></center></td></tr>";
}else {
	echo DBConfig::getConfigValue("APPARITION RECHERCHE MENU DEROULANT");
	echo "</center></td><td><center><a href='configSite.php?action=1&value=4'>Modifier</a></center></td></tr>";
}
echo "</table>";


if ($modif) {
    $fb->endForm();
    $fb->generateXHTML();
}

?>
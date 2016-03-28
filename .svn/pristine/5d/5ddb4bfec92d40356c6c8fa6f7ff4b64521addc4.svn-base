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

//infos admins
echo "<h2>Informations sur les administrateurs</h2><br/>";
if ($modif and isset($_GET['value']) and $_GET['value']==1){
    $fb = new FormBuilder("traitementConfigContacts.php","POST");
    $fb->beginForm();
    echo "<table border='1' width='100%'><th width = '25%'>Mails</th><th width = '50%'>Permanences</th><th width='25%'></th>";
    echo "<tr><td>";
    $fb->addTextAreaField("",FOConfigContacts::$CHAMP_FORM_MAILS_ADMIN,false,"",DBConfig::getConfigValue("MAIL ADMINISTRATEURS"));
    echo "</td><td>";
    $fb->addTextAreaField("",FOConfigContacts::$CHAMP_FORM_PERMANENCES,false,"",DBConfig::getConfigValue("PERMANENCES"));
    echo "</td><td><input type='submit' value='Modifier'></td></tr></table><br/>";
    $fb->endForm();
    
} else {
    echo "<table border='1' width='100%'><th width = '25%'>Mails</th><th width = '50%'>Permanences</th><th width='25%'></th>";
    echo "<tr><td>";
    echo DBConfig::getConfigValue("MAIL ADMINISTRATEURS");
    echo "</td><td>";
    echo DBConfig::getConfigValue("PERMANENCES");
    echo "</td><td><center><a href='configContacts.php?action=1&value=1'>Modifier</a></center></td></tr></table><br/>";
}
//secretariat
echo "<h2>Informations sur le secr&#233;tariat</h2><br/>";
if ($modif and isset($_GET['value']) and $_GET['value']==2){
    $fb = new FormBuilder("traitementConfigContacts.php","POST");
    $fb->beginForm();
    echo "<table border='1' width='60%'>";
    echo "<td height='25' width='40%'><strong>Mail secr&#233;taire</strong></td>";
    echo "<td width='40%'>";
    $fb->addTextField("",FOConfigContacts::$CHAMP_FORM_MAIL_SECRETARIAT,false,true,"","","",DBConfig::getConfigValue("MAIL SECRETARIAT"));
    echo "</td><td  width='20%'><input type='submit' value='Modifier'></td></tr></table>";
    $fb->endForm();
} else {
    echo "<table border='1' width='60%'>";
    echo "<td height='25' width='40%'><strong>Mail secr&#233;taire</strong></td>";
    echo "<td width='40%'>";
    echo DBConfig::getConfigValue("MAIL SECRETARIAT");
    echo "</td><td width='20%'><center><a href='configContacts.php?action=1&value=2'>Modifier</a></center></td></tr></table>";
}

//login et passwd
echo "<h2>Informations sur l'acc&#232;s Administrateur/Secretaire</h2><br/>";
if ($modif and isset($_GET['value']) and $_GET['value']==3){
    $fb = new FormBuilder("traitementConfigContacts.php","POST");
    $fb->beginForm();    
    echo "<table border='1' width='100%'>";
    echo "<th width='20%'>Login Admin</th>";
    echo "<th width='20%'>Ancien mot de passe</th>";
    echo "<th width='20%'>Nouveau mot de passe</th>";
    echo "<th width='20%'>Nouveau mot de passe (confirmation)</th>";
    echo "<th width='20%'></th>";
    echo "<tr><td>";
    $fb->addTextField("",FOConfigContacts::$CHAMP_FORM_LOGIN_ADMIN,false,true,"","","",DBConfig::getConfigValue("LOGIN ADMIN"));
    echo "</td><td>";
    $fb->addTextField("",FOConfigContacts::$CHAMP_FORM_OLD_PASSWD_ADMIN,false,false);
    echo "</td><td>";
    $fb->addTextField("",FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_ADMIN,false,false);
    echo "</td><td>";
    $fb->addTextField("",FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_ADMIN_CONFIRM,false,false);
    echo "</td><td><input type='submit' value='Modifier'></td></tr></table>";
    $fb->endForm();
} else {
    echo "<a href='configContacts.php?action=1&value=3'>Changer le login/password de l'administrateur</a><br/>";
}

if ($modif and isset($_GET['value']) and $_GET['value']==4){
    $fb = new FormBuilder("traitementConfigContacts.php","POST");
    $fb->beginForm();    
    echo "<table border='1' width='100%'>";
    echo "<th width='20%'>Login Secretaire</th>";
    // A. Pecher: desactivation demande ancien mot de passe secretaire 
    // echo "<th width='20%'>Ancien mot de passe</th>";
    echo "<th width='20%'>Nouveau mot de passe</th>";
    echo "<th width='20%'>Nouveau mot de passe (confirmation)</th>";
    echo "<th width='20%'></th>";
    echo "<tr><td>";
    $fb->addTextField("",FOConfigContacts::$CHAMP_FORM_LOGIN_SEC,false,true,"","","",DBConfig::getConfigValue("LOGIN SECRETAIRE"));
    echo "</td><td>";
   //  $fb->addTextField("",FOConfigContacts::$CHAMP_FORM_OLD_PASSWD_SEC,false,false);
    // echo "</td><td>";
    $fb->addTextField("",FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_SEC,false,false);
    echo "</td><td>";
    $fb->addTextField("",FOConfigContacts::$CHAMP_FORM_NEW_PASSWD_SEC_CONFIRM,false,false);
    echo "</td><td><input type='submit' value='Modifier'></td></tr></table>";
    $fb->endForm();
} else {
    echo "<a href='configContacts.php?action=1&value=4'>Changer le login/password du secretariat</a>";
}

if ($modif) $fb->generateXHTML();
?>

<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo "<table><tr><td width = '20%'>";
echo "<a href='configContacts.php'>Contacts</a>";
echo "</td><td  width = '20%'>";
echo "<a href='configStages.php'>Stages</a>";
echo "</td><td  width = '20%'>";
echo "<a href='configEnumerations.php'>Enumerations</a>";
echo "</td><td  width = '20%'>";
echo "<a href='configSite.php'>Site</a>";
echo "</td></tr></table>";
echo "<hr/><br/>";

$posType = 0;
$posFonction = 1;
$posDomaine = 2;
$posTechno = 3;

$enums = array();
$enums[$posType] = new Enumerable("TYPE ENTREPRISE","Types d'entreprise");
$enums[$posFonction] = new Enumerable("FONCTION","Fonctions des contacts");
$enums[$posDomaine] = new Enumerable("DOMAINE","Domaines du sujet de stage");
$enums[$posTechno] = new Enumerable("TECHNOLOGIE","Technologies de stage");

$modif = (isset($_GET['action']) and ($_GET['action']==1));

//infos admins
echo "<h2>Informations sur les variables d'&#233;numerations du site</h2><br/>";
$fb = new FormBuilder("traitementConfigEnumerations.php","POST");
$fb->beginForm();
$fb->addSelectMenuField("Enum&#233;ration &#224; configurer : ",FOConfigEnums::$CHAMP_FORM_ENUM,true,$enums,"-- ENUMERATION --",isset($_GET[FOConfigEnums::$CHAMP_FORM_ENUM])?$_GET[FOConfigEnums::$CHAMP_FORM_ENUM]:"","","","onChange=\"refreshPage();\"");
echo "<br/><br/>";
//$fb->addHiddenField(FOConfigEnums::$CHAMP_FORM_VALUE_ENUM,"",isset($_GET[FOConfigEnums::$CHAMP_FORM_ENUM])?DBConfig::getConfigValue($_GET[FOConfigEnums::$CHAMP_FORM_ENUM]):"");
if (isset($_GET[FOConfigEnums::$CHAMP_FORM_ENUM]) and $_GET[FOConfigEnums::$CHAMP_FORM_ENUM]!=""){
	$liste = DBConfig::getEnumeration($_GET[FOConfigEnums::$CHAMP_FORM_ENUM],false);
	echo "<table border='1'><th>Valeur</th><th><center>Modifier</center></th><th><center>Supprimer</center></th>";
	foreach ($liste as $elem){
		if ($modif and $elem->getFormSelectOptionValue()==base64_decode($_GET['value'])){
			echo "<tr><td>";
			$fb->addHiddenField(FOConfigEnums::$CHAMP_FORM_TOMODIFY_ELEMENT,"",$elem->getFormSelectOptionValue());
			$fb->addTextField("",FOConfigEnums::$CHAMP_FORM_MODIFIED_ELEMENT,false,true,"","","",$elem->getFormSelectOptionValue());
			echo "</td><td><center><input type='submit' name='action' value='Modifier'></center>";
			echo "</td><td><center><a href='traitementConfigEnumerations.php?".FOConfigEnums::$CHAMP_FORM_ENUM."=".$_GET[FOConfigEnums::$CHAMP_FORM_ENUM]."&action=2&value=".base64_encode($elem->getFormSelectOptionValue())."'>Supprimer</a></center>";
			echo "</td></tr>";
		}else {
			echo "<tr><td>".$elem->getFormSelectOptionValue();
			echo "</td><td><center><a href='configEnumerations.php?".FOConfigEnums::$CHAMP_FORM_ENUM."=".$_GET[FOConfigEnums::$CHAMP_FORM_ENUM]."&action=1&value=".base64_encode($elem->getFormSelectOptionValue())."'>Modifier</a></center>";
			echo "</td><td><center><a href='traitementConfigEnumerations.php?".FOConfigEnums::$CHAMP_FORM_ENUM."=".$_GET[FOConfigEnums::$CHAMP_FORM_ENUM]."&action=2&value=".base64_encode($elem->getFormSelectOptionValue())."'>Supprimer</a></center>";
			echo "</td></tr>";
		}
	}
	echo "<tr><td>";
	$fb->addTextField("",FOConfigEnums::$CHAMP_FORM_NEW_ELEMENT,false,true);
	echo "</td><td><input type='submit' name='action' value='Ajouter'/><td>";
	echo "</table>";
}
$fb->endForm();
$fb->generateXHTML();



?>
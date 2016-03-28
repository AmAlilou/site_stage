<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

$suppr=isset($_GET['action']) and ($_GET['action']==2); 
if ($suppr){
	$_POST[FOConfigEnums::$CHAMP_FORM_TODELETE_ELEMENT]=base64_decode($_GET['value']);
	$_POST['action']="Supprimer";
	$_POST[FOConfigEnums::$CHAMP_FORM_ENUM]=$_GET[FOConfigEnums::$CHAMP_FORM_ENUM];
}
$pfm = new PostFormManager(new FOConfigEnums());
echo $pfm->manageAndGenerateContent();


?>
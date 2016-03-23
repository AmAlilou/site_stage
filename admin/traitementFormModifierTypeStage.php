<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

$pfm = new PostFormManager(new FOTypeStage());
if (isset($_GET["operation"]) and ($_GET["operation"]==2)){
	$pfm->setFormObjectResult("Operation","Modification");
	echo $pfm->manageAndGenerateContent();
}elseif (isset($_GET["operation"]) and ($_GET["operation"]==1)){
	$pfm->setFormObjectResult("Operation","Création");
	echo $pfm->manageAndGenerateContent();
}else echo "Operation inconnue.";
?>
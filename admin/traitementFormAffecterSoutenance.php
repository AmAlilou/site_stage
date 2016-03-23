<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

$pfm = new PostFormManager(new FOAffecterSoutenance());
echo $pfm->manageAndGenerateContent();
?>
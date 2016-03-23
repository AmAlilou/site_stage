<?php
set_include_path(".");
require_once("inc/main.inc.php");

?>
<h1>Permanences des responsables des stages</h1>
<?php
echo DBConfig::getConfigValue("PERMANENCES");
?>
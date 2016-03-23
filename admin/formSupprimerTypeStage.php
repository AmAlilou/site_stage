<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

if (isset($_GET["id_type_stage"]))
{
   $types = DBTypeStage::getRecords($_GET["id_type_stage"]);
   $type = $types[0];
   $type->DeleteRecord();    
   echo "Type de stage supprim&#233;";
}       
else
{
 echo "Type de stage non trouv&#233;";
}

?>
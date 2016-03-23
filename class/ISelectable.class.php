<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

interface ISelectable{
    public function getFormSelectOptionLabel();
    public function getFormSelectOptionValue();
}
?>
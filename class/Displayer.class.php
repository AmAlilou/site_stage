<?php
set_include_path(".".PATH_SEPARATOR."..");
if(!isset($ROOT_PATH))
require_once("inc/main.inc.php");

// Classe permettant d'afficher tout texte provenant de la base de données (en échappant notamment les caractères HTML spéciaux)
class Displayer{
    public static function text($text, $transformEndLine=true){
        $text = XHTMLBuilder::getText($text);
        $text = ($transformEndLine?nl2br($text):$text);
        
        return $text;
    }
}
?>
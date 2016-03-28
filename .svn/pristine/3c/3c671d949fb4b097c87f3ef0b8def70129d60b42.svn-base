
<?php
set_include_path(".");
require_once("inc/main.inc.php");

if(!(isset($_GET['wiki'])) || ($_GET['wiki'] == "")){
    echo "Erreur : spécifier une url de wiki !";
}
else{
    echo "<iframe src=\"".$MEDIAWIKI_ROOT_PATH.$_GET['wiki']."\" width=\"100%\" height=\"600\">
  Désolé mais votre navigateur ne supporte pas les IFrames !
</iframe>
";
}
?>

<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo "<center><h1>Espace administrateur</h1></center>";

echo "<h2>Gestion des propositions de stage au format PDF</h2>";

echo "<h3>Liste des fichiers PDF sur le serveur</h3>";
	
include "gestionRepertoireProp.php";

echo "<h3>Ajouter des propositions de stage au format PDF</h3>";

$fb = new FormBuilder("traitementUploadProp.php", "post", true);
$fb->beginForm(); $fb->addUploadField("Proposition de stage 1",
FOUploadProp::$CHAMP_FORM_PROP_1,true, ""); echo "<br />
"; $fb->addUploadField("Proposition de stage 2",
FOUploadProp::$CHAMP_FORM_PROP_2,false, ""); echo "<br />
"; $fb->addUploadField("Proposition de stage 3",
FOUploadProp::$CHAMP_FORM_PROP_3,false, ""); echo "<br />
"; $fb->addUploadField("Proposition de stage 4",
FOUploadProp::$CHAMP_FORM_PROP_4,false, ""); echo "<br />
"; $fb->addUploadField("Proposition de stage 5",
FOUploadProp::$CHAMP_FORM_PROP_5,false, ""); echo "<br />
"; echo '<input type="submit" name="envoyer" value="Envoyer le fichier">';
$fb->endForm(); $fb->generateXHTML(); 

?>
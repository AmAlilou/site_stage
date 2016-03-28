<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

$id_proposition = $_GET["idProposition"];
$sql = 'SELECT n_proposition, mail_resp_prop_pdf, raisonsociale_entreprise, type_stage FROM propositions,entreprise WHERE propositions.id_proposition_pdf='.$id_proposition.' AND entreprise.id_entreprise=propositions.id_entreprise';

$resultat =  mysql_query($sql) or die ('Erreur : '.mysql_error() );
while ($propositions = mysql_fetch_array($resultat, MYSQL_ASSOC))
{
	$mail_resp_prop_pdf = $propositions['mail_resp_prop_pdf'];
	$n_proposition = $propositions['n_proposition'];
	$type = $propositions['type_stage'];
}

  $m = new Mailer('/mailTemplates/mailValidationPropStagePdf');
  $m->fillTemplateVar("intitule",$n_proposition);
  $m->fillTemplateVar("types_stage", $type);
  $m->sendMail($mail_resp_prop_pdf , "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages ");

  $upd = "UPDATE propositions set etat=\"Validee\" WHERE id_proposition_pdf=\"$id_proposition\" ;";
  mysql_query($upd)or die ('Erreur : '.mysql_error() );
  
echo "La proposition de stage est valid&#233;e !<br/>Un mail a &#233;galement &#233;t&#233; envoy&#233; &#224; l'entreprise pour l'informer de la validation de la proposition.";
?>


      
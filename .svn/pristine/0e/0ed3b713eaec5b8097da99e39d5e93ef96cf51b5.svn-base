<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));


$id_proposition = $_POST['prop'];
$mail_resp_prop_pdf = $_POST['mail_resp_prop_pdf'];
$n_proposition = $_POST['n_proposition'];
$type = $_POST['type'];
$motif_refus = $_POST['motif_refus'];

  $m = new Mailer('/mailTemplates/mailRefusPropStagePdf');
  $m->fillTemplateVar("motif_refus", $motif_refus);
  $m->fillTemplateVar("intitule",$n_proposition);
  $m->fillTemplateVar("types_stage", $type);
  $m->sendMail($mail_resp_prop_pdf , "stages_miage@miage.emi.u-bordeaux1.fr", DBConfig::getConfigValue("MAIL ADMINISTRATEURS"), "Site MIAGe des stages ");

  $date_refus = date("Y-m-d");
  $upd = "UPDATE propositions set etat=\"Refusee\", motif_refus=\"$motif_refus\", date_refus=\"$date_refus\" WHERE id_proposition_pdf=\"$id_proposition\" ;";
  mysql_query($upd)or die ('Erreur : '.mysql_error() );
  
echo "La proposition de stage a &eacute;t&eacute; refus&eacute;e !..<br/>Un mail a &eacute;t&eacute; envoy&eacute; automatiquement au responsable de la proposition pour lui indiquer le motif de refus.";
?>
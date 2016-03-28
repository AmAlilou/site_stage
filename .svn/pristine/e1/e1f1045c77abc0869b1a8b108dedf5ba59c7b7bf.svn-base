<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo "<style type=\"text/css\">

#erreur_refus {
	display: none;
	color: red;
	font-family: arial;
	font-size: 11px;
	font-weight: bold;	
}

</style>

<script language=\"javascript\">
	function verif_ChampFormu(){
		var motif_refus = document.getElementById('motif_refus').value;
		
		
		if ((motif_refus==''))
		{
			
			document.getElementById('erreur_refus').style.display = 'block';
		}	
		else
		{
			document.formu.method = \"POST\";
			document.formu.action = \"traitementRefusPropStagePdf.php\";			
			document.formu.submit();
		}
	}	

</script>


";



$prop = $_GET['idProposition'];

$sql = 'SELECT n_proposition, mail_resp_prop_pdf, raisonsociale_entreprise, type_stage FROM propositions,entreprise WHERE propositions.id_proposition_pdf='.$prop.' AND entreprise.id_entreprise=propositions.id_entreprise';

$resultat =  mysql_query($sql) or die ('Erreur : '.mysql_error() );
while ($propositions = mysql_fetch_array($resultat, MYSQL_ASSOC))
{
	$mail_resp_prop_pdf = $propositions['mail_resp_prop_pdf'];
	$n_proposition = $propositions['n_proposition'];
	$type = $propositions['type_stage'];
}

echo " <form id='formu' name='formu' action='traitementRefusPropStagePdf.php' method='post'>";

echo " <input type=\"hidden\" name=\"prop\" value=".$prop ." />";
echo " <input type=\"hidden\" name=\"mail_resp_prop_pdf\" value=".$mail_resp_prop_pdf." />";
echo " <input type=\"hidden\" name=\"n_proposition\" value=".$n_proposition." />";
echo " <input type=\"hidden\" name=\"type\" value=".$type." />";

echo "<h1>Refus de la proposition intitul&#233;e : ".$n_proposition." </h1>";

echo "<table><tr><td>Motif du refus (*): </td></tr><tr><td><textarea id='motif_refus' name='motif_refus' COLS=40 ROWS=6 onfocus=\"document.getElementById('erreur_refus').style.display = 'none';\"></textarea></td></tr><br />";

echo '<tr><td><input type="button" value="Valider" onClick="verif_ChampFormu();" name="valid"/>';
echo '<input type="reset" value="Annuler" /></td></tr></table>';
echo "<div id='erreur_refus'>Vous devez remplir un motif de refus de la proposition de stage, ce motif sera envoy&eacute; au responsable de la proposition.</div><form>";


?>


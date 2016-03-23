<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

?>

<center><h2>Gestion des propositions de stages upload&#233es</h2></center>

<br /><br />

<!-- Liste propositions -->
<fieldset>
  <legend>Liste des propositions refus&eacute;es</legend>
  <br />
    
<?php 
$rep ="../propositions/";

$sql = "SELECT * FROM propositions WHERE etat='Refusee' ORDER BY date_refus desc;";
$resultat = mysql_query($sql);

if (mysql_num_rows($resultat)==0){
	echo "<span>Aucune proposition de diponible pour le moment.</span>";
}
else{	
	echo "<table cellspacing=\"12\" border=\"0\">";
	echo "<tr>";
	echo "<td><b>Proposition</b></td>";
	echo "<td><b>Email responsable</b></td>";
	echo "<td><b>Date Refus</b></td>";	
	echo "<td><b>Motif Refus</b></td>";
	echo "</tr>";
	while($propositions = mysql_fetch_array($resultat, MYSQL_ASSOC)){
		echo "<tr>";
		echo "<td><a href=\"traitementPropositionsPdf.php?action=dl&f=".$propositions['n_file']."\">".$propositions['n_proposition']."</a></td>";
		echo "<td>".$propositions['mail_resp_prop_pdf']."</td>";
		echo "<td>".$propositions['date_refus']."</td>";
		echo "<td>".$propositions['motif_refus']."</td>";
		echo "</tr>";
	}
	echo "</table>";
}

?>

</fieldset>
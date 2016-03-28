<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

?>

<center><h2>Gestion des propositions de stages upload&#233es</h2></center>

<br /><br />

<!-- Liste propositions -->
<fieldset>
  <legend>Liste des propositions</legend>
  <br />
    
<?php 
$rep ="../propositions/";

$sql = "SELECT * FROM propositions ORDER BY d_upload desc;";
$resultat = mysql_query($sql);

if (mysql_num_rows($resultat)==0){
	echo "<span>Aucune proposition de diponible pour le moment.</span>";
}
else{	
	echo "<table cellspacing=\"12\" border=\"0\">";
	echo "<tr>";
	echo "<td><b>Proposition</b></td>";
	echo "<td><b>Email responsable</b></td>";	
	echo "<td><b>Mots cl&#233s</b></td>";
	echo "<td><b>Type de stage</b></td>";
	echo "<td><b>Upload&#233 le</b></td>";
	echo "<td><b>Cliqu&#233</b></td>";
	echo "<td><b>Modif</b></td>";
	echo "<td><b>Suppr</b></td>";
	echo "</tr>";
	while($propositions = mysql_fetch_array($resultat, MYSQL_ASSOC)){
		echo "<tr>";
		echo "<td><a href=\"traitementPropositionsPdf.php?action=dl&f=".$propositions['n_file']."\">".$propositions['n_proposition']."</a></td>";
		echo "<td>".$propositions['mail_resp_prop_pdf']."</td>";
		echo "<td>".$propositions['resume']."</td>";
		echo "<td>".$propositions['type_stage']."</td>";
		echo "<td>".$propositions['d_upload']."</td>";
		echo "<td>".$propositions['nb_click']."</td>";
		echo "<td><a href=\"traitementPropositionsPdf.php?action=dem_modif&id_proposition_pdf=".$propositions['id_proposition_pdf']."\" ><img src=\"../image/b_edit.png\" title=\"Modifier les infos\" ></a></td>";
		echo "<td><a href=\"traitementPropositionsPdf.php?action=dem_suppr&id_proposition_pdf=".$propositions['id_proposition_pdf']."\" ><img src=\"../image/b_drop.png\" title=\"Supprimer\" ></a></td>";
		echo "</tr>";
	}
	echo "</table>";
}

?>

</fieldset>
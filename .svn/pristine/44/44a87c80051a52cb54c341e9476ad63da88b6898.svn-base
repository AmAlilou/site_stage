<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

?>

<center><h2>Gestion des rapports de stages</h2></center>
<!-- Upload rapport -->
<fieldset>
  <legend>Upload d'un rapport</legend>
  <br />
  <form action="traitementRapports.php" method="post" enctype="multipart/form-data">
	  <span><b>Rapport (*.pdf, 2Mo max) :</b></span>
	  <br />
	  <input type="file" name="f_pdf" size="40">
	  <br /><br />
	  <span><b>Promotion:</span>
	  <select name="promotion">
		<option selected>L3</option>
		<option>M1</option>
		<option>M2</option>
	  </select>
	  <br /><br />
	  <span><b>Resum&#233, mots cl&#233s (optionnel) :</b></span>
	  <br />
	  <textarea name="resume" rows="5" cols="40"></textarea>
	  <br /><br />
	  <input type="hidden" name="action" value="upload" />
	  <input type="submit" value="Valider">
  </form>  
</fieldset>

<br /><br />

<!-- Liste rapports -->
<fieldset>
  <legend>Liste des rapports</legend>
  <br />
    
<?php 
$rep ="../rapports/";

$sql = "SELECT * FROM rapports ORDER BY promo asc, d_upload desc;";
$resultat = mysql_query($sql);

if (mysql_num_rows($resultat)==0){
	echo "<span>Aucun rapport de diponible pour le moment.</span>";
}
else{	
	echo "<table cellspacing=\"12\" border=\"0\">";
	echo "<tr>";
	echo "<td><b>Promo</b></td>";
	echo "<td><b>Rapport</b></td>";
	echo "<td><b>Resum&#233, mots cl&#233s</b></td>";
	echo "<td><b>Upload&#233 le</b></td>";
	echo "<td><b>Cliqu&#233</b></td>";
	echo "<td><b>Modif</b></td>";
	echo "<td><b>Suppr</b></td>";
	echo "</tr>";
	while($rapports = mysql_fetch_array($resultat, MYSQL_ASSOC)){
		echo "<tr>";
		echo "<td>".$rapports['promo']."</td>";
		echo "<td><a href=\"traitementRapports.php?action=dl&f=".$rapports['n_file']."\" target=\"_blank\">".$rapports['n_rapport']."</a></td>";
		echo "<td>".$rapports['resume']."</td>";
		echo "<td>".$rapports['d_upload']."</td>";
		echo "<td>".$rapports['nb_click']."</td>";
		echo "<td><a href=\"traitementRapports.php?action=dem_modif&id=".$rapports['id']."\" ><img src=\"../image/b_edit.png\" title=\"Modifier les infos\" ></a></td>";
		echo "<td><a href=\"traitementRapports.php?action=dem_suppr&id=".$rapports['id']."\" ><img src=\"../image/b_drop.png\" title=\"Supprimer\" ></a></td>";
		echo "</tr>";
	}
	echo "</table>";
}

?>

</fieldset>
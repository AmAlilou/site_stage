<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ENSEIGNANT_LOGGED));

?>

<center><h2>Consulter les rapports de stages</h2></center>



<!-- Rechercher un rapport -->
<fieldset>
  <legend>Recherche</legend>

    <form action="listeRapports.php" method="post" enctype="multipart/form-data">
	  <span><b>Mots cl&#233s :</b></span>
	  <input type="text" name="mots" size="40">
	  <span><b>Promo:</b></span>
	  <select name="promotion">
		<option selected>Toutes</option>
		<option>L3</option>
		<option>M1</option>
		<option>M2</option>
	  </selected>
	  <input type="hidden" name="action" value="recherche" />
	  <input type="submit" value="Valider">
  </form> 
</fieldset>
<br />
<!-- Liste rapports -->
<fieldset>
  <legend>Liste des rapports</legend>
  <br />
    
<?php 

$sql = "SELECT * FROM rapports ORDER BY promo asc, d_upload desc;";
$fin = "";

if (isset($_POST["action"])){
	if($_POST["action"]=="recherche"){
		if($_POST["mots"]!=""){
			$mots = addslashes($_POST["mots"]);
			$promo = $_POST['promotion'];
			echo "<span><b>R&#233sultat pour \"".stripslashes($mots)."\" et promotion \"".$promo."\" :</b></span><br/>";
			$sql = "SELECT * FROM rapports WHERE (n_rapport like \"%$mots%\" OR resume like \"%$mots%\")";
			if ($promo != "Toutes") {
				$sql.= " AND promo=\"".$promo."\"";
			}			
			$sql.= " ORDER BY promo asc, d_upload desc;";
			$fin = "<br/><span><a href=\"listeRapports.php\"><b>Retour &#224 la liste compl&#232te.</b></a></span>";
		}
		else {
			$promo = $_POST['promotion'];
			echo "<span><b>R&#233sultat pour promotion \"".$promo."\" :</b></span><br/>";
			if ($promo == "Toutes"){
				$sql = "SELECT * FROM rapports ORDER BY promo asc, d_upload desc;";
			}
			else {
				$sql = "SELECT * FROM rapports WHERE promo=\"".$promo."\" ORDER BY promo asc, d_upload desc;";
			}
		
		}
	}
}
			

$resultat = mysql_query($sql);

if (mysql_num_rows($resultat)==0){
	echo "<span>Aucun rapport de diponible pour le moment.</span>";
}
else{	
	echo "<table cellspacing=\"12\" border=\"0\">";
	echo "<tr>";
	echo "<td><b>Promo</b></td";
	echo "<td><b>Rapport</b></td>";
	echo "<td><b>Resum&#233, mots cl&#233s</b></td>";
	echo "<td><b>Upload&#233 le</b></td>";
	echo "</tr>";
	while($rapports = mysql_fetch_array($resultat, MYSQL_ASSOC)){
		echo "<tr>";
		echo "<td>".$rapports['promo']."</td>";
		echo "<td><a href=\"traitementRapports.php?a=dl&f=".$rapports['n_file']."\" target=\"_blank\">".$rapports['n_rapport']."</a></td>";
		echo "<td>".$rapports['resume']."</td>";
		echo "<td>".$rapports['d_upload']."</td>";
		echo "</tr>";
	}
	echo "</table>";
}

echo $fin;
?>

</fieldset>
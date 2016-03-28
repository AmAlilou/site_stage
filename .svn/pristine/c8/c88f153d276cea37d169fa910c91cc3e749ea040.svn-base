<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ETUDIANT_LOGGED));


//telechargement de fichier
if (isset($_GET["a"])){
	if($_GET["a"]=="dl"){
		if(isset($_GET["f"])){
			//on verifie que le fichier est bien dans la bdd
			$sql = "SELECT id, n_rapport FROM rapports WHERE n_file=\"".$_GET["f"]."\";";
			$resultat = mysql_query($sql);
			if (mysql_num_rows($resultat)==1){
				$rapports = mysql_fetch_array($resultat, MYSQL_ASSOC);
				$sql = "UPDATE rapports SET nb_click=(nb_click+1) WHERE id=".$rapports['id'].";";
				mysql_query($sql);
			

				$rep = "../rapports/";
				$file = $_GET['f'];
				header("location: ".$rep.$file);	
				exit();
			}
			else{
				echo "<br /><br /><span><b>Le fichier n'existe pas.</b></span><br />";
				echo "<span><a href=\"javascript:history.back()\">Retour</a></span>";		
				exit();
			}
		}	
		else{
			echo "<br /><br /><span><b>Erreur lors du telechargement du fichier.</b></span><br />";
			echo "<span><a href=\"javascript:history.back()\">Retour</a></span>";
			exit();
		}
	}
}
	
?>
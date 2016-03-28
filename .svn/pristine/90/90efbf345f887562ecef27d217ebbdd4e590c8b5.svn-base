<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");


//telechargement de fichier
if (isset($_GET["action"])){
	if($_GET["action"]=="dl"){
		if(isset($_GET["f"])){
			//on verifie que le fichier est bien dans la bdd
			$sql = "SELECT id, n_proposition FROM propositions WHERE n_file=\"".$_GET["f"]."\";";
			$resultat = mysql_query($sql);
			if (mysql_num_rows($resultat)==1){
				$propositions = mysql_fetch_array($resultat, MYSQL_ASSOC);
				$type = "application/pdf";
				$rep = "../propositions";
				$file = $_GET['f'];
				$n_proposition = $propositions['n_proposition'].".pdf";
				header("Content-disposition: attachment; filename=\"$n_proposition\"");
				header("Content-Type: application/force-download");
				header("Content-Transfer-Encoding: $type\n"); // Surtout ne pas enlever le \n
				header("Content-Length: ".filesize($rep.$file));
				header("Pragma: no-cache");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
				header("Expires: 0");
				readfile($rep.$file); 			
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



//Upload de proposition (récupération des infos et traitement)
if (isset($_REQUEST["action"])){
	if($_REQUEST["action"]=="upload"){
		if(is_uploaded_file($_FILES['f_pdf']['tmp_name'])){
			//on verifie que le fichier envoyé est bien au format pdf
			$type = $_FILES['f_pdf']['type'];
			if(!strstr($type, 'pdf')){
			  echo "<br /><br /><span><b>ERREUR: Le proposition doit être au format pdf.</b></span><br />";
			  echo "<span><a href=\"javascript:history.back()\">Retour</a></span>";
			  exit();
			}	
			else{		
				$n_proposition = str_replace(".pdf","",$_FILES['f_pdf']['name']);
				$rep = "../propositions/";
				$n_file = md5(uniqid(rand())).".pdf";				//on donne un nom unique au pdf
				move_uploaded_file($_FILES['f_pdf']['tmp_name'],$rep.$n_file);
			
				$resume = addslashes($_REQUEST['resume']);
				$d_upload = date("Y-m-d");
				$sql = "INSERT INTO propositions VALUES (\"NULL\",\"$n_file\",\"$n_proposition\",\"$d_upload\",0,\"$resume\");";
				mysql_query($sql);
				
				header("Location: listepropositions.php");
				exit();
			}
		}
		else{
			echo "<br /><br /><span><b>Erreur lors de l'envoi du fichier.</b></span><br />";
			echo "<span><a href=\"javascript:history.back()\">Retour</a></span>";
			exit();
		}
	}
}
	
//demande de confirmation de suppression de proposition
if (isset($_GET["action"])){
	if($_GET["action"]=="dem_suppr"){
		if (isset($_GET["id"])){
			
			$sql = "SELECT n_proposition FROM propositions WHERE id=".$_GET["id"].";";
			$resultat = mysql_query($sql);
			$propositions = mysql_fetch_array($resultat,MYSQL_ASSOC);
			
			echo "<center><h2>Confirmation de suppression</h2></center>";
			echo "<br /><br />";
			echo "<center><span>Voulez vous vraiment supprimer le fichier \"".$propositions['n_proposition']."\" ?</span></center>";
			echo "<br /><br />";
			echo "<form action=\"traitementpropositions.php\" method=\"post\">";
			echo "<input type=\"hidden\" name=\"action\" value=\"conf_suppr\" />";
			echo "<input type=\"hidden\" name=\"id\" value=\"".$_GET["id"]."\" />";
			echo "<center><input type=\"submit\" value=\"Valider\"></center>";
			echo "</form>";
			exit();
		}
		else {
			echo "<span>Erreur: nom non defini</span>";
			exit();
		}
	}
}


//suppression de proposition
if (isset($_REQUEST["action"])){
	if($_REQUEST["action"]=="conf_suppr"){
		if (isset($_REQUEST["id"])){
			$id =$_REQUEST["id"];
			
			$sql = "SELECT n_file FROM propositions WHERE id=$id;";
			$resultat = mysql_query($sql);
			$propositions = mysql_fetch_array($resultat, MYSQL_ASSOC);
			$file = "../propositions/".$propositions['n_file'];
			
			$sql = "DELETE FROM propositions WHERE id=$id;";
			$resultat = mysql_query($sql);
									
			if (unlink($file)) {
				header("Location: listepropositions.php");
			}
			else {
				echo "<span>Erreur lors de la suppression du fichier>";	
				exit();
			}
		}
	}
}




//formulaire modification des infos d'un proposition
if (isset($_REQUEST["action"])){
	if($_REQUEST["action"]=="dem_modif"){
		if (isset($_REQUEST["id"])){
			$id =$_REQUEST["id"];
			
			$sql = "SELECT n_proposition, resume FROM propositions WHERE id=$id;";
			$resultat = mysql_query($sql);
			$propositions = mysql_fetch_array($resultat, MYSQL_ASSOC);
			
			echo "<center><h2>Modification des informations du proposition :\"".$propositions['n_proposition']."\"</h2></center>";
			
			echo"<br />";
			echo "<form action=\"traitementpropositions.php\" method=\"post\">";
			echo "<span><b>Nom du proposition :</b></span>";
			echo "<br />";
			echo "<input type=\"text\" name=\"n_proposition\" size=\"54\" value=\"".$propositions['n_proposition']."\">";
			echo "<br /><br />";
			echo "<span><b>R&#233sum&#233, mots cl&#233s (optionnel) :</b></span>";
			echo "<br />";
			echo "<textarea name=\"resume\" rows=\"5\" cols=\"40\">".$propositions['resume']."</textarea>";
			echo "<br /><br />";
			echo "<input type=\"hidden\" name=\"action\" value=\"conf_modif\" />";
			echo "<input type=\"hidden\" name=\"id\" value=\"".$_REQUEST["id"]."\" />";
			echo "<input type=\"submit\" value=\"Valider\">";
			echo "</form> ";
			exit();
		}
		else{
			echo "<br /><br /><span><b>Erreur: proposition introuvable.</b></span><br />";
			echo "<span><a href=\"javascript:history.back()\">Retour</a></span>";
			exit();
		}
	}
}



//modification des infos d'un proposition
if (isset($_REQUEST["action"])){
	if($_REQUEST["action"]=="conf_modif"){
		if (isset($_REQUEST["id"])){
			$id =$_REQUEST["id"];
			if ($_REQUEST["n_proposition"] ==""){
				echo "<br /><br /><span><b>Erreur: le nom du proposition ne peut pas être null.</b></span><br />";
				echo "<span><a href=\"javascript:history.back()\">Retour</a></span>";
				exit();			
			}
			
			$resume = addslashes($_REQUEST['resume']);
			$n_proposition = $_REQUEST['n_proposition'];
			// on enleve les caractères spéciaux du nom du fichier
			$interdit=array(";",",",":","!","?","/","&",'\"',"\'","(",")","»","« ","\n","\r");
			foreach ($interdit as $test){
				$n_proposition=str_replace($test,"",$n_proposition);
			}
			$n_proposition = addslashes($n_proposition);
			$sql = "SELECT id FROM propositions WHERE n_proposition=\"".$n_proposition."\";";
			$resultat = mysql_query($sql);
			if (mysql_num_rows($resultat)==1){
				echo "<br /><br /><span><b>Erreur: Une proposition portant le m&#234me nom existe d&#233j&#224.</b></span><br />";
				echo "<span><a href=\"javascript:history.back()\">Retour</a></span>";
				exit();
			}
			
			else{
				$sql = "UPDATE propositions SET n_proposition=\"".$n_proposition."\", resume=\"".$resume."\" WHERE id=".$id.";";
				mysql_query($sql);
				header("Location: listepropositions.php");
				exit();				
			}
		}
		else{
			echo "<br /><br /><span><b>Erreur: proposition introuvable.</b></span><br />";
			echo "<span><a href=\"javascript:history.back()\">Retour</a></span>";
			exit();
		}
	}
}


?>
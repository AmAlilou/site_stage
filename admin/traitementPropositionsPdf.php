<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));


//telechargement de fichier
if (isset($_GET["action"])){
	if($_GET["action"]=="dl"){
		if(isset($_GET["f"])){
			//on verifie que le fichier est bien dans la bdd
			$sql = "SELECT id_proposition_pdf, n_proposition FROM propositions WHERE n_file=\"".$_GET["f"]."\";";
			$resultat = mysql_query($sql);
			if (mysql_num_rows($resultat)==1){
				$propositions = mysql_fetch_array($resultat, MYSQL_ASSOC);
				
				$rep = "../propositions/";
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



//Upload de proposition (récupération des infos et traitement)
if (isset($_REQUEST["action"])){
	if($_REQUEST["action"]=="upload"){
		if(is_uploaded_file($_FILES['f_pdf']['tmp_name'])){
			//on verifie que le fichier envoyé est bien au format pdf
			$type = $_FILES['f_pdf']['type'];
			if(!strstr($type, 'pdf')){
			  echo "<br /><br /><span><b>ERREUR: La proposition doit être au format pdf.</b></span><br />";
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
				
				header("Location: listePropositionsPdf.php");
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
		if (isset($_GET["id_proposition_pdf"])){
			
			$sql = "SELECT n_proposition FROM propositions WHERE id_proposition_pdf=".$_GET["id_proposition_pdf"].";";
			$resultat = mysql_query($sql);
			$propositions = mysql_fetch_array($resultat,MYSQL_ASSOC);
			
			echo "<center><h2>Confirmation de suppression</h2></center>";
			echo "<br /><br />";
			echo "<center><span>Voulez vous vraiment supprimer le fichier \"".$propositions['n_proposition']."\" ?</span></center>";
			echo "<br /><br />";
			echo "<form action=\"traitementPropositionsPdf.php\" method=\"post\">";
			echo "<input type=\"hidden\" name=\"action\" value=\"conf_suppr\" />";
			echo "<input type=\"hidden\" name=\"id_proposition_pdf\" value=\"".$_GET["id_proposition_pdf"]."\" />";
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
		if (isset($_REQUEST["id_proposition_pdf"])){
			$id =$_REQUEST["id_proposition_pdf"];
			
			$sql = "SELECT n_file FROM propositions WHERE id_proposition_pdf=$id;";
			$resultat = mysql_query($sql);
			$propositions = mysql_fetch_array($resultat, MYSQL_ASSOC);
			$file = "../propositions/".$propositions['n_file'];
			
			$sql = "DELETE FROM propositions WHERE id_proposition_pdf=$id;";
			$resultat = mysql_query($sql);
									
			if (unlink($file)) {
				header("Location: listePropositionsPdf.php");
			}
			else {
				echo "<span>Erreur lors de la suppression du fichier. Le fichier pdf n'existait peut être d&#233jà plus</span><br/>";
				echo "<a href=\"listePropositionsPdf.php\">Retour aux propositions.</a>";	
				exit();
			}
		}
	}
}




//formulaire modification des infos d'une proposition
if (isset($_REQUEST["action"])){
	if($_REQUEST["action"]=="dem_modif"){
		if (isset($_REQUEST["id_proposition_pdf"])){
			$id =$_REQUEST["id_proposition_pdf"];
			
			$sql = "SELECT n_proposition, resume FROM propositions WHERE id_proposition_pdf=$id;";
			$resultat = mysql_query($sql);
			$propositions = mysql_fetch_array($resultat, MYSQL_ASSOC);
			
			echo "<center><h2>Modification des informations de la proposition :\"".$propositions['n_proposition']."\"</h2></center>";
			
			echo"<br />";
			echo "<form action=\"traitementPropositionsPdf.php\" method=\"post\">";
			echo "<span><b>Proposition :</b></span>";
			echo "<br />";
			echo "<input type=\"text\" name=\"n_proposition\" size=\"54\" value=\"".$propositions['n_proposition']."\">";
			echo "<br /><br />";
			echo "<span><b>Mots cl&#233s (optionnel) :</b></span>";
			echo "<br />";
			echo "<textarea name=\"resume\" rows=\"5\" cols=\"40\">".$propositions['resume']."</textarea>";
			echo "<br /><br />";
			echo "<input type=\"hidden\" name=\"action\" value=\"conf_modif\" />";
			echo "<input type=\"hidden\" name=\"id_proposition_pdf\" value=\"".$_REQUEST["id_proposition_pdf"]."\" />";
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



//modification des infos d'une proposition
if (isset($_REQUEST["action"])){
	if($_REQUEST["action"]=="conf_modif"){
		if (isset($_REQUEST["id_proposition_pdf"])){
			$id =$_REQUEST["id_proposition_pdf"];
			if ($_REQUEST["n_proposition"] ==""){
				echo "<br /><br /><span><b>Erreur: le nom de la proposition ne peut pas être null.</b></span><br />";
				echo "<span><a href=\"javascript:history.back()\">Retour</a></span>";
				exit();			
			}
			
			$resume = addslashes($_REQUEST['resume']);
			$n_proposition = $_REQUEST['n_proposition'];
			// on enleve les caractères spéciaux du nom du fichier
			$interdit=array(";",",",":","!","?","/","&",'\"',"\'","(",")","»","« ","\n","\r",'"');
			foreach ($interdit as $test){
				$n_proposition=str_replace($test,"",$n_proposition);
		
			}
			
			$n_proposition = addslashes($n_proposition);
			$sql = "UPDATE propositions SET n_proposition=\"".$n_proposition."\", resume=\"".$resume."\" WHERE id_proposition_pdf=".$id.";";
			mysql_query($sql);
			header("Location: listePropositionsPdf.php");
			exit();				
		}
		else{
			echo "<br /><br /><span><b>Erreur: proposition introuvable.</b></span><br />";
			echo "<span><a href=\"javascript:history.back()\">Retour</a></span>";
			exit();
		}
	}
}


?>
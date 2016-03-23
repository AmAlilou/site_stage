<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");


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
				$email = addslashes($_REQUEST['email']);
				if ($email==''){
		echo "<br /><br /><span><b>Erreur : email du responsable non pr&#233cis&#233.</b></span><br />";$erreur='trouve';}		
				$resume = addslashes($_REQUEST['resume']);
				if ($resume==''){
		echo "<span><b>Erreur : mots cl&#233s non pr&#233cis&#233s.</b></span><br />";$erreur='trouve';}
		if(isset($erreur) && ($erreur=='trouve')){
			echo "<br /><span><a href=\"javascript:history.back()\">Retour</a></span>";
			exit();
		}
				$id_entp = addslashes($_REQUEST['id_entp']);
				$d_upload = date("Y-m-d");
				$type_stage_prop="";
				$sql = "INSERT INTO propositions VALUES (\"NULL\",\"$n_file\",\"$n_proposition\",\"$d_upload\",0,\"$resume\",\"$id_entp\",\"$email\",\"$type_stage_prop\");";
				mysql_query($sql);
			
				
				//recuperation de l'id_proposition qui vient d'être insérée
					$rq=mysql_query("select id_proposition_pdf from propositions where n_file='$n_file' and n_proposition='$n_proposition' and d_upload='$d_upload'");
	 			while($id = mysql_fetch_assoc($rq))//tri des données
			       {$id_prop=$id['id_proposition_pdf'];
				   }
			
				//recuperation des types de stage de la proposition
				$type = $_POST['types'];

				//insertion des infos type_stage + id_proposition dans la table proposition_pdf_concerne
				foreach($type as $typeStage)
				{
				//récupération de l'id_type_stage correspondant
				$rq=mysql_query("select id_type_stage,miage from type_stage where libelle_type_stage='$typeStage'") or die ('Erreur : '.mysql_error() );
	 			while($id = mysql_fetch_assoc($rq))//tri des données
			       {$id_type=$id['id_type_stage'];
			       $type_stage_prop=$type_stage_prop." ".$id['miage'];
				   }
				$sql = "INSERT INTO proposition_pdf_concerne VALUES (\"$id_type\",\"$id_prop\");";
				mysql_query($sql)or die ('Erreur : '.mysql_error() );
					
			     echo "<br/>";
				 }
				$sql = "UPDATE propositions set type_stage=\"$type_stage_prop\" WHERE id_proposition_pdf=\"$id_prop\" ;";
				mysql_query($sql)or die ('Erreur : '.mysql_error() );
					
				echo "<br /><br /><span><b>Votre proposition de stage a bien &#233t&#233 enregistr&#233e. La Miage de Bordeaux vous remercie.</b></span><br />";
			
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


?>
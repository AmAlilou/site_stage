<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");


?>
  <form action="traitementFormPropStageUpload.php" method="post" enctype="multipart/form-data">

<left><h2>Uploader une proposistion de stage</h2></left>
<!-- Upload proposition -->

	  <span><b>Email du Responsable de la proposition :</b></span>
	  <input type="text" name="email" size="40"/>

<!-- Upload proposition -->
<fieldset>
  <legend>Upload de la proposition</legend>
  <br />

  <?php 
  	$type = $_POST['types'];
	foreach($type as $typeStage)
	{
	echo	'<input type="hidden" name="types[]" value="'.$typeStage.'"/>';
     echo "<br/>";}

   ?>

  <?php
  $entp = addslashes($_REQUEST['autreRS']);
  $actiEntp = addslashes($_REQUEST['typeEntp']);
  $autreActi = addslashes($_REQUEST['autreActivite']);
  $tel = addslashes($_REQUEST['tel']);
  $fax = addslashes($_REQUEST['fax']);
  $adr = addslashes($_REQUEST['adresse']);
  $ville = addslashes($_REQUEST['ville']);
  $cp = addslashes($_REQUEST['cp']);        
  $url = addslashes($_REQUEST['url']);

//tentative de récupération de l'identifiant de l'entreprise
   $rq=mysql_query("select id_entreprise from entreprise where raisonsociale_entreprise='$entp'");
	  while($id = mysql_fetch_assoc($rq))//tri des données
       {$id_entp=$id['id_entreprise'];}
//insertion de la nouvelle entreprise si nécessaire
	if(!isset($id_entp)){	
		if($autreActi!=""){
			$actiInseree=$autreActi;
			}
			else{
			$actiInseree=$actiEntp;
				
	$sql = "INSERT INTO `entreprise` VALUES (\"NULL\",\"$actiInseree\", \"$entp\", \"$url\", \"$adr\",\"$cp\",\"$ville\",\"$tel\",\"$fax\", NULL);";
			mysql_query($sql);		}
	
	//récupération de l'identtifiant de l'entreprise
	$rq=mysql_query("select id_entreprise from entreprise where raisonsociale_entreprise='$entp'");
	  while($id = mysql_fetch_assoc($rq))//tri des données
       {$id_entp=$id['id_entreprise'];}
	}


?>
	  <input type="hidden" name="id_entp" value="<?php echo "$id_entp" ?>" />
	  <span><b>Proposition (*.pdf) :</b></span>
	  <br />
	  <input type="file" name="f_pdf" size="40">
	  <br /><br />
	  <span><b>Mots cl&#233s :</b></span>
	  <br />
	  <textarea name="resume" rows="2" cols="40"></textarea>
	  </fieldset>
	  <input type="hidden" name="action" value="upload" />
	  <center><input type="submit" value="Valider" name="valid">
	  <input type="reset" value="Annuler" /></center>
  </form>
  


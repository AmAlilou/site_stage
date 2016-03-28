<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");


?>

<style type="text/css">

#erreur_mail, #erreur_mots, #erreur_fichier {
	display: none;
	color: red;
	font-family: arial;
	font-size: 11px;
	font-weight: bold;	
}

</style>

<script language="javascript">
	function verif_ChampFormu(){
		var email = document.getElementById('email').value;
		var resume = document.getElementById('resume').value;
		var f_pdf = document.getElementById('f_pdf').value;
		
		
		if ((email=='') || (resume== '') || (f_pdf ==''))
		{
			if (email=='')
			{
				document.getElementById('erreur_mail').style.display = 'block';
			}
			if (resume =='')
			{
				document.getElementById('erreur_mots').style.display = 'block';
			}
			if (f_pdf =='')
			{
				document.getElementById('erreur_fichier').style.display = 'block';
			}
		}	
		else
		{
			document.formu.method = "POST";
			document.formu.action = "traitementFormPropStageUpload.php";			
			document.formu.submit();
		}
	}	

</script>

  <form id="formu" name="formu" action="traitementFormPropStageUpload.php" method="post" enctype="multipart/form-data">

<left><h2>Uploader une proposistion de stage</h2></left>
<!-- Upload proposition -->

	  <span><b>Email du Responsable de la proposition :</b></span>
	  <input type="text" id="email" name="email" size="40" onfocus="document.getElementById('erreur_mail').style.display = 'none';"/>
	  <div id="erreur_mail">Vous devez remplir un email responsable de la proposition.</div>
	  <br/>

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
	  <input type="file" id="f_pdf" name="f_pdf" size="40" onfocus="document.getElementById('erreur_fichier').style.display = 'none';">
	  <div id="erreur_fichier">Vous devez inclure un fichier pdf &agrave; votre proposition.</div>
	  <br /><br />
	  <span><b>Mots cl&#233s :</b></span>
	  <br />
	  <textarea id="resume" name="resume" rows="2" cols="40" onfocus="document.getElementById('erreur_mots').style.display = 'none';"></textarea>
	  <div id="erreur_mots">Vous devez pr&eacute;ciser des mots cl&eacute;s pour la proposition.</div>
	  </fieldset>
	  <input type="hidden" name="action" value="upload" />
	  <center><input type="button" value="Valider"  onClick="verif_ChampFormu();" name="valid">
	  <input type="reset" value="Annuler" /></center>
  </form>
  


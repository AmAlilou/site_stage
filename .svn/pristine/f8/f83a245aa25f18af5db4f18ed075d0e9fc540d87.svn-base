<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

//controle sur les champs du formulaire entreprise
  $entp = addslashes($_REQUEST['autreRS']);
  $entpModif = addslashes($_REQUEST['autreRS']);
  if ($entp==''){
		echo "<span><b>Erreur : raison sociale non pr&#233cis&#233e.</b></span><br />";$erreur='trouve';}
  $actiEntp = addslashes($_REQUEST['typeEntp']);
  $autreActi = addslashes($_REQUEST['autreActivite']);
  if (($actiEntp=='') && ($autreActi=='')){
		echo "<span><b>Erreur : activit&#233 de l\'entreprise non pr&#233cis&#233e.</b></span><br />";$erreur='trouve';}
  $tel = addslashes($_REQUEST['tel']);
  if ($tel==''){
		echo "<span><b>Erreur : num&#233ro de t&#233l&#233phone non pr&#233cis&#233.</b></span><br />";$erreur='trouve';}
  $fax = addslashes($_REQUEST['fax']);
 /**
*  if ($fax==''){
* 		echo "<span><b>Erreur : num&#233ro de fax non pr&#233cis&#233.</b></span><br />";$erreur='trouve';}
*/
  $adr = addslashes($_REQUEST['adresse']);
  if ($adr==''){
		echo "<span><b>Erreur : adresse non pr&#233cis&#233e.</b></span><br />";$erreur='trouve';}
  $ville = addslashes($_REQUEST['ville']);
  if ($ville==''){
		echo "<span><b>Erreur : ville non pr&#233cis&#233e.</b></span><br />";$erreur='trouve';}
  $cp = addslashes($_REQUEST['cp']);        
  if ($cp==''){
		echo "<span><b>Erreur : code postal non pr&#233cis&#233.</b></span><br />";$erreur='trouve';}
  $url = addslashes($_REQUEST['url']);
 /**
*  if ($url==''){
* 		echo "<span><b>Erreur : url de l\'entreprise non pr&#233cis&#233e.</b></span><br />";$erreur='trouve';}
*/
  //if (!isset($_REQUEST["types"])){
	//	echo "<span><b>Erreur : type de stage non pr&#233cis&#233.</b></span><br />";$erreur='trouve';}
		
		
  
if(isset($erreur) && $erreur=='trouve')	{
		echo "<br /><span><a href=\"javascript:history.back()\">Retour</a></span>";
		
		exit();
}
// on enleve les caractères spéciaux des infos entreprise
			$interdit=array(";",",",":","!","?","/","&",'\"',"\'","(",")","»","« ","\n","\r",'"');
			foreach ($interdit as $test){
				$entpModif=str_replace($test,"",$entpModif);
				$actiEntp=str_replace($test,"",$actiEntp);
				$tel=str_replace($test,"",$tel);
				$fax=str_replace($test,"",$fax);
				$adr=str_replace($test,"",$adr);
				$cp=str_replace($test,"",$cp);
				$ville=str_replace($test,"",$ville);
				$url=str_replace($test,"",$url);}
				
				$entpModif= addslashes($entpModif);
				$actiEntp= addslashes($actiEntp);
				$tel= addslashes($tel);
				$fax= addslashes($fax);
				$adr= addslashes($adr);
				$cp= addslashes($cp);
				$ville= addslashes($ville);
				$url= addslashes($url);
		
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
  if (!((isset($_REQUEST["types0"])) or (isset($_REQUEST["types1"])) or (isset($_REQUEST["types2"])))){
  		echo "aucun type de stage n'a ete selectionne";}else{
	  if (isset($_REQUEST["types0"])) {
  	$types[0] = $_POST['types0'];
  }
	if (isset($_REQUEST["types1"])){
	$types[1] = $_POST['types1'];
  }
	if (isset($_REQUEST["types2"])){
	$types[2] = $_POST['types2'];	
  }
}
  	//$type = $_POST['types'];
  	
	foreach($types as $typeStage)
	{echo	'<input type="hidden" name="types[]" value="'.$typeStage.'"/>';
     echo "<br/>";}
 
//tentative de récupération de l'identifiant de l'entreprise
   $rq=mysql_query("select id_entreprise from entreprise where raisonsociale_entreprise='$entp'");
	  while($id = mysql_fetch_assoc($rq))//tri des données
       {$id_entp=$id['id_entreprise'];}

//MAJ de l'activite de l'entreprise
   if($autreActi!=""){
	$actiInseree=$autreActi;}
   else{$actiInseree=$actiEntp;}
//insertion de la nouvelle entreprise si nécessaire
	if(!isset($id_entp) || ($id_entp=="")){		
	$sql = "INSERT INTO `entreprise` VALUES (\"NULL\",\"$actiInseree\", \"$entp\", \"$url\", \"$adr\",\"$cp\",\"$ville\",\"$tel\",\"$fax\", NULL);";
	mysql_query($sql);}
	else{
	//mise à jour des informations de l'entreprise
	$sql = "UPDATE `entreprise` SET type_entreprise=\"".$actiInseree."\", raisonsociale_entreprise=\"".$entpModif."\", url_site_entreprise=\"".$url."\", code_postal_entreprise=\"".$cp."\", ville_entreprise=\"".$ville."\", tel_entreprise=\"".$tel."\", fax_entreprise=\"".$fax."\" WHERE id_entreprise=".$id_entp.";";
	mysql_query($sql);
	}
//récupération de l'identifiant de l'entreprise
	$rq=mysql_query("select id_entreprise from entreprise where raisonsociale_entreprise='$entp'");
	  while($id = mysql_fetch_assoc($rq))//tri des données
       {$id_entp=$id['id_entreprise'];}
	
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
  


<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");


?>
<style type="text/css">

#erreur_entreprise, #erreur_type {
	display: none;
	color: red;
	font-family: arial;
	font-size: 11px;
	font-weight: bold;	
}

</style>

<script language="javascript">
	function verif_ChampFormu(){
		var entreprise = document.getElementById('entreprise').value;
		var ok = 'false';
		if ((document.log.types[0].checked) || (document.log.types[1].checked) || (document.log.types[2].checked))
		{
			ok = 'true';
		}
		
		if ((entreprise=='') || (ok =='false'))
		{
			if (entreprise == '')
			{
				document.getElementById('erreur_entreprise').style.display = 'block';
			}
			if (ok =='false')
			{
				document.getElementById('erreur_type').style.display = 'block';
			}			
		}	
		else
		{
			document.log.method = "POST";
			document.log.action = "formPropStageUploadSuite.php";			
			document.log.submit();
		}
	}	

</script>

<center><h1>D&eacute;poser une proposistion de stage au format PDF</h1></center>
<!-- Upload proposition -->
<br />
  <h2>Entreprise</h2>
  <form method="post" name="formu" action="formPropStageUpload.php"> 

	  Raison Sociale : <select name="entreprise" onchange="submit()" onclick="document.getElementById('erreur_entreprise').style.display = 'none';">
	  <br />
	 
	  <?php

  	  if(!isset($entrep)|| $entrep=="")
	{   echo '<option selected value="raisonSociale">Choisissez une entreprise</option>';
  	 }
	   else{
		echo '<option selected value="$entp">'.$entp.'</option>';
		echo '<option value="raisonSociale">Choisissez une entreprise</option>';
	}
       $requete = mysql_query("SELECT  raisonsociale_entreprise FROM entreprise ORDER BY raisonsociale_entreprise ASC"); //sélection des données
       while($tri = mysql_fetch_assoc($requete))//tri des données
       {
      echo '<option value="' .addslashes($tri['raisonsociale_entreprise']). '">' .$tri['raisonsociale_entreprise']. '</option>'; //affichage de chaque ligne
      }
    ?>
	  </select>
</form>
<form id="log" method="post" name="log" action="formPropStageUploadSuite.php"> 
  <?php
  	  if(isset($_POST['entreprise'])){
      $entp=$_POST['entreprise'];
      if($entp!= "raisonSociale")
	  {
	  $rq=mysql_query("select type_entreprise from entreprise where raisonsociale_entreprise='$entp'");
	  while($act = mysql_fetch_assoc($rq))//tri des données
       {$acti=$act["type_entreprise"];}
      $rq=mysql_query("select tel_entreprise from entreprise where raisonsociale_entreprise='$entp'");
      while($act = mysql_fetch_assoc($rq))//tri des données
       {$tel=$act['tel_entreprise']; }
      $rq=mysql_query("select fax_entreprise from entreprise where raisonsociale_entreprise='$entp'");
      while($act = mysql_fetch_assoc($rq))//tri des données
       {$fax=$act['fax_entreprise'];      }
      $rq=mysql_query("select code_postal_entreprise from entreprise where raisonsociale_entreprise='$entp'");	
      while($act = mysql_fetch_assoc($rq))//tri des données
       {$cp=$act['code_postal_entreprise'];}
      $rq=mysql_query("select adresse_entreprise from entreprise where raisonsociale_entreprise='$entp'");
      while($act = mysql_fetch_assoc($rq))//tri des données
       {$adr=$act['adresse_entreprise'];}  
      $rq=mysql_query("select ville_entreprise from entreprise where raisonsociale_entreprise='$entp'");
      while($act = mysql_fetch_assoc($rq))//tri des données
       {$ville=$act['ville_entreprise'];}     
      $rq=mysql_query("select url_site_entreprise from entreprise where raisonsociale_entreprise='$entp'");	  
      while($act = mysql_fetch_assoc($rq))//tri des données
       {$url=$act['url_site_entreprise'];}   
	   
	   //gestion de l'affichage du code postal: ne rien afficher si $cp=0
	   if($cp==0){
		$cp="";
		}
	      	  	
   		}
   	  }
   	  else{
   	  	$entp = "";
		$acti = "";
		$tel = "";
		$fax = "";
		$cp = "";
		$adr = "";
		$ville = "";
		$url = "";	
	  }
	  ?>

      
	  <br />
	  <span>Nom de l'entreprise :</span>
	  <input type="text" id="entreprise" name="autreRS" size="60" value="<?php echo "$entp" ?>"/>
<br /><br />
	 
	  <span>Activit&#233 :</span>
  	  <select name="typeEntp">
  	  <?php
  	  
  	  if($acti=="")
	{  echo '<option selected value="activite">Choisissez l activit&#233</option>';
  	 }
	   else{
		echo '<option selected value="'.$acti.'">'.$acti.'</option>';
		echo '<option value="activite">Choisissez l activit&#233</option>';
	} 
     
    
      $liste=DBConfig::getEnumeration("TYPE ENTREPRISE");
	  foreach($liste as $type)
       {
      echo '<option value="' .$type->getFormSelectOptionValue(). '">' .$type->getFormSelectOptionValue(). '</option>'; //affichage de chaque ligne
      
      }
      
  ?>
        </select>
	 
	  <span>ou Autre activit&#233 :</span>
	  <input type="text" name="autreActivite" size="60" value=""/>
	<br /><br />
	  <span>T&#233l&#233phone :</span>
	  <input type="text" name="tel" value="<?php echo "$tel" ?>"/>
	  <span>Fax :</span>
	  <input type="text" name="fax" value="<?php echo "$fax" ?>"/>
<br /><br />
	  <span>Adresse :</span>
	  <input type="text" name="adresse" size="60" value="<?php echo "$adr" ?>"/>
<br /><br />
	  <span>Code Postal :</span>
	  <input type="text" name="cp" value="<?php echo "$cp" ?>"/>
	  <span>Ville :</span>
	  <input type="text" name="ville" value="<?php echo "$ville" ?>"/>
<br /><br />
	  <span >URL de l'entreprise :
	  <input type="text" name="url" value="<?php echo "$url" ?>"/>

 <br /><br /><br />
 
  <h2>Type de stage</h2>
  <?php 
  
  $typesStage = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"));
foreach($typesStage as $typeStage)
{
   echo '<input type="checkbox" id="types" name="types[]" onclick="document.getElementById(\'erreur_type\').style.display = \'none\';" value="'.$typeStage->getLibelleTypeStage().'" />'.$typeStage->getLibelleTypeStage().'-  [Dates : '. $typeStage->getDateDebutTheorique().'-'.$typeStage->getDateFinTheorique().']';
   echo "<br/>";
  
   }
   ?>
            
<br />


<br/><center><input type="button" value="Continuer" onclick="verif_ChampFormu();" /></center>
<br />
<div id="erreur_entreprise">Vous n'avez pas renseign&eacute; les champs concernant l'entreprise. Merci de le faire avant de continuer.</div>
<div id="erreur_type">Vous n'avez pas selectionn&eacute; de niveau pour la proposition. Merci de le faire avant de continuer.</div>
</form>


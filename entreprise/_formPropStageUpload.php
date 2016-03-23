<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");


?>

<left><h2>Uploader une proposistion de stage</h2></left>
<!-- Upload proposition -->

<fieldset>
  <legend>Entreprise</legend>
  <form method="post" name="formu" action="formPropStageUpload.php"> 
  <br />

	  <select name="entreprise" onchange="submit()">
	  
	 
	  <?php

  	  if($entrep=="")
	{   echo '<option selected value="raisonSociale">Choisissez une entreprise</option>';
  	 }
	   else{
		echo '<option selected value="$entp">'.$entp.'</option>';
		echo '<option value="raisonSociale">Choisissez une entreprise</option>';
	}
       $requete = mysql_query("SELECT  raisonsociale_entreprise FROM entreprise ORDER BY raisonsociale_entreprise ASC"); //sélection des données
       while($tri = mysql_fetch_assoc($requete))//tri des données
       {
      echo '<option value="' .$tri['raisonsociale_entreprise']. '">' .$tri['raisonsociale_entreprise']. '</option>'; //affichage de chaque ligne
      }
    ?>
	  </select>
</form>
<form method="post" name="test" action="formPropStageUploadSuite.php"> 
  <?php
  	  if(isset($_POST['entreprise'])){
      $entp=$_POST['entreprise'];
      if($entp!="raisonSociale")
	  {
	  $rq=mysql_query("select type_entreprise from entreprise where raisonsociale_entreprise='$entp'");
	  while($act = mysql_fetch_assoc($rq))//tri des données
       {$acti=$act['type_entreprise'];}
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
	  <span><b>Nom de l'entreprise :</b></span>
	  <input type="text" name="autreRS" size="60" value="<?php echo "$entp" ?>"/>
	  <br />
      <br />
	  <span><b>Activit&#233 :</b></span>
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
	  
	  <span><b>ou Autre activit&#233 :</b></span>
	  <input type="text" name="autreActivite" size="60" value=""/>
	  <br />
	  <br />
	  <span><b>T&#233l&#233phone :</b></span>
	  <input type="text" name="tel" value="<?php echo "$tel" ?>"/>
	  <span><b>Fax :</b></span>
	  <input type="text" name="fax" value="<?php echo "$fax" ?>"/>
	  <br />
	  <br />
	  <span><b>Adresse :</b></span>
	  <input type="text" name="adresse" size="60" value="<?php echo "$adr" ?>"/>
	  <br />
	  <br />
	  <span><b>Code Postal :</b></span>
	  <input type="text" name="cp" value="<?php echo "$cp" ?>"/>
	  <span><b>Ville :</b></span>
	  <input type="text" name="ville" value="<?php echo "$ville" ?>"/>
	  <br />
	  <br />
	  <span><b>URL de l'entreprise :</b></span>
	  <input type="text" name="url" value="<?php echo "$url" ?>"/>
	  <br />
 

</fieldset>
<fieldset>
  <legend>Type de stage</legend>
  <?php 
  
  $typesStage = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"));
foreach($typesStage as $typeStage)
{
   echo '<input type="checkbox" name="types[]" value="'.$typeStage->getLibelleTypeStage().'" />'.$typeStage->getLibelleTypeStage().'-  [Dates : '. $typeStage->getDateDebutTheorique().'-'.$typeStage->getDateFinTheorique().']';
   echo "<br/>";
  
   }
   ?>
            
</fieldset>

<br/><center><input type="submit" value="Continuer" /></center>
</form>


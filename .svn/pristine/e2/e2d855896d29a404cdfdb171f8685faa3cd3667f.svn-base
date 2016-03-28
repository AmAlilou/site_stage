<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

$javascript="function verif(){\n"
			."	var err=\"\";\n"
			."	if(isNaN(parseInt(document.getElementById('tel').value))){\n"
			."		if (err == \"\")\n"
			."			err += \"Veuillez saisir des chiffres pour: \";\n"
			."		err += \" - Le numero de tel \";\n"
			."	}\n"	
			."	if(isNaN(parseInt(document.getElementById('fax').value ))){\n"
			."		if(document.getElementById('fax').value!=\"\"){\n"
			."			if (err == \"\")\n"
			."				err += \"Veuillez saisir des chiffres pour: \";\n"
			."			err += \" - Le numero de fax \";\n"
			."		}\n"
			."	}\n"
			."	if(isNaN(parseInt(document.getElementById('cp').value))){\n"
			."		if (err == \"\")\n"
			."			err += \"Veuillez saisir des chiffres pour: \";\n"
			."		err += \" - Le code postal \";\n"
			."	}\n"
			."	if(document.getElementById('autreRS').value==\"\"){\n"
			."		if (err == \"\")\n"
			."			err += \"Veuillez saisir la raison sociale.\";\n"
			."	}\n"
			."	if(document.getElementById('adr').value==\"\"){\n"
			."		if (err == \"\")\n"
			."			err += \"Veuillez saisir l adresse.\";\n"
			."	}\n"
			."	if(document.getElementById('cp').value==\"\"){\n"
			."		if (err == \"\")\n"
			."			err += \"Veuillez saisir le code postal.\";\n"
			."	}\n"
			."	if(document.getElementById('ville').value==\"\"){\n"
			."		if (err == \"\")\n"
			."			err += \"Veuillez saisir la ville.\";\n"
			."	}\n"
		//	."if ((document.forms[\"test\"].types[0].checked==false && (document.forms[\"test\"].types[1].checked==false) && (document.forms[\"test\"].types[2].checked==false)))\n"
			."if ((document.getElementById('idType0').checked==false) && (document.getElementById('idType1').checked==false) && (document.getElementById('idType2').checked==false))\n"
			."{if (err == \"\")\n"
			."			err += \"Veuillez saisir le type de stage.\";}\n"
			."	if (err != \"\")\n"
			."		alert(err)\n"
			."	else\n"
			."		document.getElementById('form2').submit();\n"
			."	}\n";

XHTMLBuilder::getInstance()->addJavascript($javascript);

			
?>



<left><h2>Uploader une proposistion de stage</h2></left>
<!-- Upload proposition -->


<fieldset>
  <legend>Entreprise</legend>
  <form method="post" name="formu" id="form1" action="formPropStageUpload.php"> 
  <br />

	  <select name="entreprise" onchange="submit()">
	  
	 
	  <?php

  	  if(!isset($entrep) || $entrep="")
	{   echo '<option selected value="raisonSociale">Choisissez une entreprise</option>';
		$tel='';$fax='';$ville='';$cp='';$url='';$adr='';$entp='';
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
<form method="post" name="test" id="form2" action="formPropStageUploadSuite.php"> 
  <?php
  	
      
    if (isset($_REQUEST["entreprise"])){
      $entp=$_POST['entreprise'];
      if($entp!="raisonSociale") 
	  {	$entpAffich= addslashes($entp);
	  	$rq=mysql_query("select * from entreprise where raisonsociale_entreprise='$entpAffich'");
		  while($act = mysql_fetch_assoc($rq))//tri des données
	       {$acti=$act['type_entreprise'];
		    $tel=$act['tel_entreprise']; 
		    $fax=$act['fax_entreprise'];
		    $cp=$act['code_postal_entreprise'];
		    $adr=$act['adresse_entreprise'];
		    $ville=$act['ville_entreprise'];
		    $url=$act['url_site_entreprise'];
		   }	   
		   //gestion de l'affichage du code postal: ne rien afficher si $cp=0
		   if(isset($cp) && ($cp==0)){$cp="";}
	      	  	
   		}
   	}
	  ?>

      
	  <br />
	  <span><b>Nom de l'entreprise :</b></span>
	  <input type="text" name="autreRS" id="autreRS" size="60" value="<?php echo "$entp" ?>"/>
	  <br />
      <br />
	  <span><b>Activit&#233 :</b></span>
  	  <select name="typeEntp">
  	  <?php
  	  
  	  if(!isset($acti) || $acti=="")
	{  echo '<option selected value="activite">Choisissez l\'activit&#233</option>';
  	 }
	   else{
		echo '<option selected value="'.$acti.'">'.$acti.'</option>';
		echo '<option value="activite">Choisissez l\'activit&#233</option>';
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
	  <input type="text" name="tel" id="tel" value="<?php echo "$tel" ?>"/>
	  <span><b>Fax :</b></span>
	  <input type="text" name="fax" id="fax" value="<?php echo "$fax" ?>"/>
	  <br />
	  <br />
	  <span><b>Adresse :</b></span>
	  <input type="text" name="adresse" id="adr" size="60" value="<?php echo "$adr" ?>"/>
	  <br />
	  <br />
	  <span><b>Code Postal :</b></span>
	  <input type="text" name="cp"id="cp" value="<?php echo "$cp" ?>"/>
	  <span><b>Ville :</b></span>
	  <input type="text" name="ville" id="ville" value="<?php echo "$ville" ?>"/>
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
  $ids = 0;
foreach($typesStage as $typeStage)

{ 
	
   echo '<input type="checkbox" id="idType'.$ids.'" name="types'.$ids.'" value="'.$typeStage->getLibelleTypeStage().'" />'.$typeStage->getLibelleTypeStage().'-  [Dates : '. $typeStage->getDateDebutTheorique().'-'.$typeStage->getDateFinTheorique().']';
   echo "<br/>";
   $ids++;
   }
   ?>
            
</fieldset>

<br/><center><input type="button" onClick="verif()" value="Continuer" /></center>
</form>
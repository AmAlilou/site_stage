<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

$idEtu =  SessionManager::getEtudiant()->getIdEtudiant();
$nomEtu = SessionManager::getEtudiant()->getNomEtudiant();
$prenomEtu = SessionManager::getEtudiant()->getPrenomEtudiant();
$mailstableEtudiant =  SessionManager::getEtudiant()->getMailstableEtudiant();
$miageEtu =  SessionManager::getEtudiant()->getMiageEtudiant(); // exemple : M2
$promoEtu =  SessionManager::getEtudiant()->getPromoEtudiant(); // exemple : 2006

$operation = 1;

$rq = "SELECT * FROM fiche_devenir WHERE id_etudiant = ".$idEtu.";";
$result = mysql_query($rq);
if (mysql_num_rows($result)==1){
	$operation = 2;
	$act = mysql_fetch_assoc($result);
	$idDevenir = $act['id_devenir'];
	$mailstableEtudiant = $act['mailstable_etudiant'];
	$nommaritalDevenir = $act['nommarital_devenir'];
	$miageDevenir = $act['miage_devenir'];
	$promoDevenir = $act['promo_devenir'];
	$optionDevenir = $act['option_devenir'];
	$entrepriseStageDevenir = $act['entreprise_stage_devenir'];
	$tailleStageDevenir = $act['taille_stage_devenir'];
	$domaineStageDevenir = $act['domaine_stage_devenir'];
	$situationDevenir= $act['situation_devenir'];
	$formationActuelleDevenir = $act['formation_actuelle_devenir'];
	$metierEmploiDevenir = $act['metier_emploi_devenir'];
	$entrepriseEmploiDevenir = $act['entreprise_emploi_devenir'];
	$domaineEmploiDevenir = $act['domaine_emploi_devenir'];
	$villeEmploiDevenir = $act['ville_emploi_devenir'];
	$telproEmploiDevenir = $act['telpro_emploi_devenir'];
	$emailproEmploiDevenir = $act['emailpro_emploi_devenir'];
	$salaireEmploiDevenir = $act['salaire_emploi_devenir'];
	$cadreEmploiDevenir = $act['cadre_emploi_devenir'];
	$contratEmploiDevenir = $act['contrat_emploi_devenir'];
	$trouveEmploiDevenir = $act['trouve_emploi_devenir'];
	$stageEmploiDevenir = $act['stage_emploi_devenir'];
}

?>
<script type="text/javascript">

function checkSelection( this_){
  var Data = this_.options[this_.selectedIndex].value;
  if( Data =='oui'){
	document.getElementById('formation').value= 'rien';
    document.getElementById('formationAutre').style.display= 'none';
	document.getElementById('metier').value= '';
	document.getElementById('entreprise').value= 'rien';
	document.getElementById('entrepriseAutre').style.display= 'none';
	document.getElementById('ville').value= 'rien';
	document.getElementById('villeEntDevenir').style.display= 'none';
	document.getElementById('villeAutre').style.display= 'none';
	document.getElementById('secteurActivite').value= 'rien';
	document.getElementById('secteurActiviteAutre').style.display= 'none';
	document.getElementById('etudiantOK').style.display ='block';
	document.getElementById('pasEtudiant').style.display = 'none';
	document.getElementById('champFormationAutre').value= '';
	document.getElementById('champContratAutre').value= '';
	document.getElementById('champEntrepriseAutre').value= '';
	document.getElementById('champVilleAutre').value= '';
	document.getElementById('champSecteurActiviteAutre').value= '';
	document.getElementById('telpro').value= '';
	document.getElementById('mailpro').value= '';
	document.getElementById('salaire').value= '';
	document.getElementById('cadre').value= 'rien';
	document.getElementById('typeContrat').value= 'rien';
	document.getElementById('contratAutre').style.display= 'none';
	document.getElementById('dateEmploi').value= '';
	document.getElementById('entrepriseEmploi').value= 'rien';
  }
  else if( Data =='non'){
	document.getElementById('pasEtudiant').style.display = 'block';
	document.getElementById('formation').value= 'rien';
	document.getElementById('metier').value= '';
	document.getElementById('entreprise').value= 'rien';
	document.getElementById('entrepriseAutre').style.display= 'none';
	document.getElementById('ville').value= 'rien';
	document.getElementById('villeEntDevenir').style.display= 'none';
	document.getElementById('villeAutre').style.display= 'none';
	document.getElementById('secteurActivite').value= 'rien';
	document.getElementById('secteurActDevenir').style.display= 'none';
	document.getElementById('secteurActiviteAutre').style.display= 'none';
	document.getElementById('etudiantOK').style.display ='none';
	document.getElementById('champFormationAutre').value= '';
	document.getElementById('champContratAutre').value= '';
	document.getElementById('champEntrepriseAutre').value= '';
	document.getElementById('champVilleAutre').value= '';
	document.getElementById('champSecteurActiviteAutre').value= '';
	document.getElementById('telpro').value= '';
	document.getElementById('mailpro').value= '';
	document.getElementById('salaire').value= '';
	document.getElementById('cadre').value= 'rien';
	document.getElementById('typeContrat').value= 'rien';
	document.getElementById('contratAutre').style.display= 'none';
	document.getElementById('dateEmploi').value= '';
	document.getElementById('entrepriseEmploi').value= 'rien';
  }
  else{
	document.getElementById('etudiantOK').style.display ='none';
	document.getElementById('formation').value= 'rien';
	document.getElementById('metier').value= '';
	document.getElementById('entreprise').value= 'rien';
	document.getElementById('entrepriseAutre').style.display= 'none';
	document.getElementById('ville').value= 'rien';
	document.getElementById('villeEntDevenir').style.display= 'none';
	document.getElementById('villeAutre').style.display= 'none';
	document.getElementById('secteurActivite').value= 'rien';
	document.getElementById('secteurActDevenir').style.display= 'none';
	document.getElementById('secteurActiviteAutre').style.display= 'none';
	document.getElementById('pasEtudiant').style.display = 'none';
	document.getElementById('champFormationAutre').value= '';
	document.getElementById('champContratAutre').value= '';
	document.getElementById('champEntrepriseAutre').value= '';
	document.getElementById('champVilleAutre').value= '';
	document.getElementById('champSecteurActiviteAutre').value= '';
	document.getElementById('telpro').value= '';
	document.getElementById('mailpro').value= '';
	document.getElementById('salaire').value= '';
	document.getElementById('cadre').value= 'rien';
	document.getElementById('typeContrat').value= 'rien';
	document.getElementById('contratAutre').style.display= 'none';
	document.getElementById('dateEmploi').value= '';
	document.getElementById('entrepriseEmploi').value= 'rien';
  }
}

function masquerFormation(this_){
	var Data = this_.options[this_.selectedIndex].value;
	if( Data =='autre') {
	document.getElementById('formationAutre').value= 'null';
		document.getElementById('formationAutre').style.display= 'block';
		document.getElementById('champFormationAutre').value= '';
	}
	else {
		document.getElementById('formationAutre').style.display= 'none';	
		document.getElementById('champFormationAutre').value= '';
	}
} 

function selectionContrat(this_){
	var Data = this_.options[this_.selectedIndex].value;
	if( Data =='autre') {
		document.getElementById('contratAutre').style.display= 'block';
		document.getElementById('champContratAutre').value= '';
	}
	else {
		document.getElementById('contratAutre').style.display= 'none';
		document.getElementById('champContratAutre').value= '';
	}
} 

function selectionEntreprise(this_){
	var Data = this_.options[this_.selectedIndex].value;
	if( Data =='autre') {
		document.getElementById('entrepriseAutre').style.display= 'block';
		document.getElementById('villeEntDevenir').style.display= 'block';
		document.getElementById('secteurActDevenir').style.display= 'block';
		document.getElementById('champEntrepriseAutre').value= '';
	}
	else {
		document.getElementById('entrepriseAutre').style.display= 'none';
		document.getElementById('villeEntDevenir').style.display= 'none';
		document.getElementById('secteurActDevenir').style.display= 'none';
		document.getElementById('villeAutre').style.display= 'none';
		document.getElementById('secteurActiviteAutre').style.display= 'none';
		document.getElementById('champEntrepriseAutre').value= '';
	}
}


function selectionVille(this_){
	var Data = this_.options[this_.selectedIndex].value;
	if( Data =='autre') {
		document.getElementById('villeAutre').style.display= 'block';
		document.getElementById('champVilleAutre').value= '';
	}
	else {
		document.getElementById('villeAutre').style.display= 'none';
		document.getElementById('champVilleAutre').value= '';
	}
}

function selectionSecteur(this_){
	var Data = this_.options[this_.selectedIndex].value;
	if( Data =='autre') {
		document.getElementById('secteurActiviteAutre').style.display= 'block';
		document.getElementById('champSecteurActiviteAutre').value= '';
	}
	else {
		document.getElementById('secteurActiviteAutre').style.display= 'none';
		document.getElementById('champSecteurActiviteAutre').value= '';
	}
}


</script>


<?php
echo "<center><h2>Espace &#233;tudiant $prenomEtu $nomEtu</h2></center>";
echo "<h1>Saisie d'une fiche devenir</h1>";
?>

<form method="post" name="test" id="form" action="traitementFicheDevenir.php?operation=<?php echo $operation;?>">
<?php
  	
	$rq=mysql_query("SELECT * FROM fiche_stage WHERE id_etudiant='$idEtu'");
	
	if (mysql_num_rows($rq)>0)
		{
			while($act = mysql_fetch_assoc($rq))//tri des données
			    {
				    $raisonSocialeEnt=$act['raison_sociale_entreprise']; 
				    $idEnt=$act['id_entreprise'];
				}
			$rq2=mysql_query("select * from entreprise where id_entreprise='$idEnt'");
			while($act2 = mysql_fetch_assoc($rq2))//tri des données
			    {
				    $villeEnt=$act2['ville_entreprise'];
					$activiteEnt=$act2['type_entreprise']; 
				}
	}
	else
	{
		$raisonSocialeEnt='';
		$villeEnt='';
		$activiteEnt='';
	}
?>

<!--  -->
	<input type="hidden" name=<?php echo "\"".FOFicheDevenir::$CHAMP_FORM_ID_DEVENIR."\""; if(isset($idDevenir)and($idDevenir!="")){echo " value='".$idDevenir."' ";}?> readonly="readonly" />

<!--NOM - PRENOM - NOM MARITAL - E-MAIL-->
	<h3>Informations sur l'&#233;tudiant</h3>
	<?php $etudiant = SessionManager::getEtudiant();?>
	<fieldset>
	<table><tr><td width='50%' align='left'>Nom : <?php echo $nomEtu;?> </td><td width='50%' align='left'>Pr&#233;nom : <?php echo $prenomEtu;?> </td></tr>
	<tr><td colspan=2>
	</td></tr><tr><td colspan='2' align='left'> Email : <?php echo $mailstableEtudiant;?></td><td align='right'>
	</td></tr>
	<tr><td> Nom marital : <input type='text' name=<?php echo "\"".FOFicheDevenir::$CHAMP_FORM_NOMMARITAL_DEVENIR."\""; if(isset($nommaritalDevenir)and($nommaritalDevenir!="")){echo " value='".$nommaritalDevenir."' ";}?> /></td></tr></table>
	</fieldset>
	
<!--INFORMATIONS SUR L'ANNEE PRECEDENTE-->
	<h3>Informations sur l'ann&#233;e pr&#233;c&#233;dente</h3>
	<fieldset>
	<table width='80%'><tr>
		<td align='left'> Votre situation en <?php echo "$promoEtu";?></td>
		<td align='left'> Promotion : <?php echo "$miageEtu";?>
		</td>
	</tr>
	</table>
	<br><br>
	<table>
		<tr><td align='left'> Entreprise de votre stage : <?php echo "$raisonSocialeEnt";?></td></tr>
		<tr><td align='left'> Ville : <?php echo "$villeEnt";?></td></tr>
		<tr><td align='left'> Secteur d'activit&#233 : <?php echo "$activiteEnt";?></td></tr>
		<tr><td align='left'> Taille de l'entreprise : <input type="text" name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_TAILLE_STAGE_DEVENIR."\""; if(isset($tailleStageDevenir)and($tailleStageDevenir!="")){echo " value='".$tailleStageDevenir."' ";}?> /> 	</td></tr>
	</table>
			
	</fieldset>
	<br><br>
	
<!--INFORMATIONS SUR L'ANNEE EN COURS-->
	<h3>Informations sur l'ann&#233;e en cours</h3>
	<table width='80%'><tr>
		<td align='left'> Est-vous encore &#233tudiant(e) cette ann&#233e ? 
				<select id="etu" name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_SITUATION_DEVENIR."\"";?>  onchange="checkSelection(this)">
					<option value="rien" <?php if(isset($situationDevenir)and($situationDevenir=="rien")){echo "selected='selected'";}?>>--</option>
				    <option value="oui" <?php if(isset($situationDevenir)and($situationDevenir=="oui")){echo "selected='selected'";}?>>OUI</option>
				    <option value="non" <?php if(isset($situationDevenir)and($situationDevenir=="non")){echo "selected='selected'";}?>>NON</option>
				</select>
		</td></tr>
	</table>
	<br>

<!--SI IL EST ENCORE ETUDIANT-->
	<fieldset id='etudiantOK' style=<?php if (isset($situationDevenir)and($situationDevenir=="oui")){echo "'display:block'";}else{echo "'display:none'";}?>>
	<legend><i>Si vous etes etudiant </i></legend>
	<table width='80%'>
		<tr><td align='left'> Votre formation actuelle : 
		<select id="formation" name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_FORMATION_ACTUELLE_DEVENIR."\"";?>  onchange="masquerFormation(this)">
				<option value="rien" <?php $trouveFA=false; if(isset($formationActuelleDevenir)and($formationActuelleDevenir=="rien")){echo "selected='selected'";$trouveFA=true;}?>>--</option>
				<option value="L3" <?php if(isset($formationActuelleDevenir)and($formationActuelleDevenir=="L3")){echo "selected='selected'";$trouveFA=true;}?>>L3 MIAGe</option>
				<option value="M1" <?php if(isset($formationActuelleDevenir)and($formationActuelleDevenir=="M1")){echo "selected='selected'";$trouveFA=true;}?>>M1 MIAGe</option>
				<option value="M2" <?php if(isset($formationActuelleDevenir)and($formationActuelleDevenir=="M2")){echo "selected='selected'";$trouveFA=true;}?>>M2 MIAGe</option>
				<option value="autre" <?php if(!$trouveFA){echo "selected='selected'";}?>>Autre</option>
		</select>
		<div id='formationAutre' style=<?php if (!$trouveFA){echo "'display:block'";}else{echo "'display:none'";}?>> Autre formation <input id='champFormationAutre' type='text' name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_AUTRE_FORMATION_ACTUELLE_DEVENIR."\""; if(isset($formationActuelleDevenir)and($formationActuelleDevenir!="")){echo " value='".$formationActuelleDevenir."' ";}?>  /> </div>
		</td></tr>
	</table>
	</fieldset>
	
<!--SI IL N'EST PLUS ETUDIANT-->
	<fieldset id='pasEtudiant' style=<?php if(isset($situationDevenir)and($situationDevenir=="non")){echo "'display:block'";}else{echo "'display:none'";}?>> <legend><i>Si vous n'etes pas etudiant </i></legend>
	<table width='80%'>
		<tr><td align='left'> Votre m&#233tier: <input id='metier' type='text' name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_METIER_EMPLOI_DEVENIR."\"";if(isset($metierEmploiDevenir)and($metierEmploiDevenir!="")){echo " value='".$metierEmploiDevenir."' ";}?>  /></td></tr>
		</table>
		<table>
		<tr><td align='left'> Entreprise de votre emploi : 
			<select id="entreprise" name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_ENTREPRISE_EMPLOI_DEVENIR."\"";?>  onchange="selectionEntreprise(this)" >
				<option value="rien" <?php $trouveEnt=false; if(isset($entrepriseEmploiDevenir)and($entrepriseEmploiDevenir=="rien")){echo "selected='selected'";$trouveFA=true;}?>>---</option>
				<?php
					$requete = mysql_query("SELECT  DISTINCT raisonsociale_entreprise, ville_entreprise FROM entreprise WHERE NOT ville_entreprise='' ORDER BY raisonsociale_entreprise ASC"); //sélection des données
					while($tri = mysql_fetch_assoc($requete))//tri des données
					{
						echo '<option value="' .$tri['raisonsociale_entreprise']. '" ';
						if(isset($entrepriseEmploiDevenir)and($entrepriseEmploiDevenir==$tri['raisonsociale_entreprise'])){echo "selected='selected'";$trouveEnt=true;}
						echo ' >'.$tri['raisonsociale_entreprise'].'   ----   '.$tri['ville_entreprise']. '</option>'; //affichage de chaque ligne    
					}
					echo '<option value="autre"'; if(!$trouveEnt){echo "selected='selected'";} echo '>Autre</option>';
				?>
			</select>
		</td></tr>
		<tr><td>
			<div id='entrepriseAutre' style=<?php if(!$trouveEnt){echo "'display:block'";}else{echo "'display:none'";}?>> Autre entreprise : 
				<input id='champEntrepriseAutre' type='text' name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_AUTRE_ENTREPRISE_EMPLOI_DEVENIR."\""; if(isset($entrepriseEmploiDevenir)and($entrepriseEmploiDevenir!="")){echo " value='".$entrepriseEmploiDevenir."' ";}?>  />
			</div>
		</td></tr>
		</table>
		<table>
		<tr><td align='left' id='villeEntDevenir' style=<?php if(!$trouveEnt){echo "'display:block'";}else{echo "'display:none'";}?>> Ville : 
			<select id="ville" name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_VILLE_EMPLOI_DEVENIR."\"";?> onchange="selectionVille(this)">
				<option value="rien" <?php $trouveVille=false; if(isset($villeEmploiDevenir)and($villeEmploiDevenir=="rien")){echo "selected='selected'";$trouveVille=true;}?>>---</option>
				<?php $requete = mysql_query("SELECT DISTINCT ville_entreprise FROM entreprise WHERE NOT ville_entreprise='' ORDER BY ville_entreprise ASC"); //sélection des données
					while($tri = mysql_fetch_assoc($requete))//tri des données
					{
						echo '<option value="' .$tri['ville_entreprise']. '" ';
						if(isset($villeEmploiDevenir)and($villeEmploiDevenir==$tri['ville_entreprise'])){echo "selected='selected'";$trouveVille=true;}
						echo ' >'.$tri['ville_entreprise']. '</option>'; //affichage de chaque ligne    
					}
					echo '<option value="autre"'; if(!$trouveVille){echo "selected='selected'";} echo '>Autre</option>';
				?>
			</select>   
		</td></tr>
		</table>
		<table>
		<tr><td>	
			<div id='villeAutre' style=<?php if(!$trouveVille and !$trouveEnt){echo "'display:block'";}else{echo "'display:none'";}?>> Autre ville : 
				<input id='champVilleAutre' type='text' name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_AUTRE_VILLE_EMPLOI_DEVENIR."\""; if(isset($villeEmploiDevenir)and($villeEmploiDevenir!="")){echo " value='".$villeEmploiDevenir."' ";}?> />
			</div>
		</td></tr>
		</table>
		<table>
		<tr><td align='left' id='secteurActDevenir' style=<?php if(!$trouveEnt){echo "'display:block'";}else{echo "'display:none'";}?>> Secteur d'activit&#233 : 
			<select id="secteurActivite" name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_DOMAINE_EMPLOI_DEVENIR."\"";?> onchange="selectionSecteur(this)">
				<option value="rien" <?php $trouveSecteur=false; if(isset($domaineEmploiDevenir)and($domaineEmploiDevenir=="rien")){echo "selected='selected'";$trouveSecteur=true;}?>>---</option>
				<?php $requete = mysql_query("SELECT DISTINCT type_entreprise FROM entreprise WHERE NOT type_entreprise='' ORDER BY type_entreprise ASC"); //sélection des données
					while($tri = mysql_fetch_assoc($requete))//tri des données
					{
						echo '<option value="' .$tri['type_entreprise']. '" ';
						if(isset($domaineEmploiDevenir)and($domaineEmploiDevenir==$tri['type_entreprise'])){echo "selected='selected'";$trouveSecteur=true;}
						echo ' >'.$tri['type_entreprise']. '</option>'; //affichage de chaque ligne    
					}
					echo '<option value="autre"'; if(!$trouveSecteur){echo "selected='selected'";} echo '>Autre</option>';
				?>
			</select>  
		</td></tr>
		</table>
		<table>
		<tr><td>
			<div id='secteurActiviteAutre' style=<?php if(!$trouveSecteur and !$trouveEnt){echo "'display:block'";}else{echo "'display:none'";}?>> Autre secteur d'activit&#233 : 
				<input id='champSecteurActiviteAutre' type='text' name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_AUTRE_DOMAINE_EMPLOI_DEVENIR."\"";if(isset($domaineEmploiDevenir)and($domaineEmploiDevenir!="")){echo " value='".$domaineEmploiDevenir."' ";}?> />
			</div>
		</td></tr>
		</table>
		<table>
		<tr><td align='left'> T&#233l&#233phone pro : <input id='telpro' type='text' name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_TELPRO_EMPLOI_DEVENIR."\"";if(isset($telproEmploiDevenir)and($telproEmploiDevenir!="")){echo " value='".$telproEmploiDevenir."' ";}?>  /></td></tr>
		<tr><td align='left'> Mail pro : <input id='mailpro' type='text' name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_EMAILPRO_EMPLOI_DEVENIR."\"";if(isset($emailproEmploiDevenir)and($emailproEmploiDevenir!="")){echo " value='".$emailproEmploiDevenir."' ";};?> /></td></tr>
		<tr><td align='left'> Salaire &#224 la sortie de la MIAGe : <input id='salaire' type='text' name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_SALAIRE_EMPLOI_DEVENIR."\"";if(isset($salaireEmploiDevenir)and($salaireEmploiDevenir!="")){echo " value='".$salaireEmploiDevenir."' ";}?>  /></td></tr>
		<tr><td align='left'> Cadre :
			<select id="cadre" name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_CADRE_EMPLOI_DEVENIR."\"";?> >
				<option value="rien" <?php if(isset($cadreEmploiDevenir)and($cadreEmploiDevenir=="rien")){echo "selected='selected'";}?>>--</option>
				<option value="oui" <?php if(isset($cadreEmploiDevenir)and($cadreEmploiDevenir=="oui")){echo "selected='selected'";}?>>OUI</option>
				<option value="non" <?php if(isset($cadreEmploiDevenir)and($cadreEmploiDevenir=="non")){echo "selected='selected'";}?>>NON</option>
			</select>
		</td></tr>
		<tr><td align='left'> Type de contrat : 
			<select id="typeContrat" name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_CONTRAT_EMPLOI_DEVENIR."\"";?>  onchange="selectionContrat(this)">
				<option value="rien" <?php $trouveContrat=false; if(isset($contratEmploiDevenir)and($contratEmploiDevenir=="rien")){echo "selected='selected'";$trouveContrat=true;}?>>--</option>
				<option value="cdd" <?php if(isset($contratEmploiDevenir)and($contratEmploiDevenir=="cdd")){echo "selected='selected'";$trouveContrat=true;}?>>CDD</option>
				<option value="cdi" <?php if(isset($contratEmploiDevenir)and($contratEmploiDevenir=="cdi")){echo "selected='selected'";$trouveContrat=true;}?>>CDI</option>
				<option value="stage" <?php if(isset($contratEmploiDevenir)and($contratEmploiDevenir=="stage")){echo "selected='selected'";$trouveContrat=true;}?>>STAGE</option>
				<option value="autre" <?php if(!$trouveContrat){echo "selected='selected'";}?>>Autre</option>
			</select>
			<div id='contratAutre' style=<?php if(!$trouveContrat){echo "'display:block'";}else{echo "'display:none'";}?>> Autre contrat : 
				<input id='champContratAutre' type='text' name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_AUTRE_CONTRAT_EMPLOI_DEVENIR."\"";if(isset($contratEmploiDevenir)and($contratEmploiDevenir!="")){echo " value='".$contratEmploiDevenir."' ";}?> />
			</div>
		</td></tr>
		<tr><td align='left'> Quand avez-vous trouv&#233 ce travail : <input id='dateEmploi' type='text' name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_TROUVE_EMPLOI_DEVENIR."\"";if(isset($trouveEmploiDevenir)and($trouveEmploiDevenir!="")){echo " value='".$trouveEmploiDevenir."' ";}?> /></td></tr>
		<tr><td align='left'> Est-vous dans l'entreprise o&#249 vous avez effectu&#233 votre stage : 
			<select id="entrepriseEmploi" name= <?php echo "\"".FOFicheDevenir::$CHAMP_FORM_STAGE_EMPLOI_DEVENIR."\"";?> >
				<option value="rien" <?php if(isset($stageEmploiDevenir)and($stageEmploiDevenir=="rien")){echo "selected='selected'";}?>>--</option>
				<option value="oui" <?php if(isset($stageEmploiDevenir)and($stageEmploiDevenir=="oui")){echo "selected='selected'";}?>>OUI</option>
				<option value="non" <?php if(isset($stageEmploiDevenir)and($stageEmploiDevenir=="non")){echo "selected='selected'";}?>>NON</option>
			</select></td></tr>
	</table>	
	</fieldset>
    
<br/><center><input type="button" onClick="submit()" value="Valider" /><input type="reset" value="Annuler" /></center>
</form>
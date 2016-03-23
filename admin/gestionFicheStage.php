<?php
set_include_path ( "." . PATH_SEPARATOR . ".." );
require_once ("inc/main.inc.php");
require_once ("../impression.php");

//require_once ("class/PHPMailer/sendMailTest.php");

PagePermission::verifyPagePermission ( new PagePermission ( PagePermission::$CONSTRAINT_ADMIN_LOGGED ) );

$fb = new FormBuilder ( "traitementGestionFicheStage.php", "post" );
echo "<center><h2>Validation des fiches de stage</h2></center>";

$fb->beginForm ();

$idtype = isset ( $_GET [FOGestionFicheStage::$CHAMP_FORM_ID_TYPE_STAGE] ) ? $_GET [FOGestionFicheStage::$CHAMP_FORM_ID_TYPE_STAGE] : "";

$liste_types_stage = DBTypeStage::getRecords ( "", "", DBConfig::getConfigValue ( "ANNEE PROMO" ) );

echo "<table><tr><td align='right'>";

$fb->addSelectMenuField ( "Type de stage", FOGestionFicheStage::$CHAMP_FORM_ID_TYPE_STAGE, true, Enumeration::getSelectablesArrayFromObject ( $liste_types_stage, '$a->getIdTypeStage()', '$a->getLibelleTypeStage()' ), "Type", "", "", false, "onChange=\"document.getElementById('idfiche').value=''; refreshPage();\"" );

echo "</td></tr><tr><td>&nbsp;</td></tr><tr><td align='right'>";

$ficheavalider = DBFicheStage::getRecords ( "", $idtype, "", DBConfig::getConfigValue ( "ANNEE PROMO" ), "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION );

$fb->addSelectMenuField ( "Etudiant", FOGestionFicheStage::$CHAMP_FORM_ID_FICHE, true, Enumeration::getSelectablesArrayFromObject ( $ficheavalider, '$a->getIdStage()', '$a->getNomEtudiant()." ".$a->getPrenomEtudiant()." (".$a->getRaisonSocialeEntreprise().")"' ), "Etudiants", "", "", false, "onChange=\"refreshPage();\"" );

echo "</td></tr></table>";
echo "<br/>";

if (isset ( $_GET [FOGestionFicheStage::$CHAMP_FORM_ID_FICHE] ) and $_GET [FOGestionFicheStage::$CHAMP_FORM_ID_FICHE] != "") {
	// afficher fiche
	echo "<hr>";
	$fiches = DBFicheStage::getRecords ( $_GET [FOGestionFicheStage::$CHAMP_FORM_ID_FICHE] );
	$fiche = $fiches [0];
	$etudiant = $fiche->getEtudiant ();
	$entreprise = $fiche->getEntreprise ();
	$signataire = $fiche->getSignataireStage ();
	$maitreStage = $fiche->getMaitreStage ();
	
	$template = new Template ( $GLOBALS ['ROOT_PATH'] . "/templates", 0, $GLOBALS ['ROOT_PATH'] . "/templates/affichageFicheStage.tpl" );
	
	$template->set_file ( "gestionFicheStage", "../templates/affichageFicheStage.tpl" );
	
	$template->set_var ( "nomETUDIANT", $etudiant->getNomEtudiant () );
	$template->set_var ( "prenomETUDIANT", $etudiant->getPrenomEtudiant () );
	$template->set_var ( "adresseETUDIANT", $etudiant->getAdresseStageEtudiant () );
	$template->set_var ( "cpETUDIANT", $etudiant->getCpstageEtudiant () );
	$template->set_var ( "villeETUDIANT", $etudiant->getVillestageEtudiant () );
	$template->set_var ( "mailETUDIANT", $etudiant->getMailstageEtudiant () );
	$template->set_var ( "telETUDIANT", $etudiant->getTelstageEtudiant () );
	
	$typeStage = $fiche->getTypeStage ();
	$template->set_var ( "typeStageSTAGE", $typeStage->getLibelleTypeStage () );
	
	$template->set_var ( "nomENTREPRISE", $entreprise->getRaisonsocialeEntreprise () );
	$template->set_var ( "adresseENTREPRISE", $entreprise->getAdresseEntreprise () );
	$template->set_var ( "cpENTREPRISE", $entreprise->getCodePostalEntreprise () );
	$template->set_var ( "villeENTREPRISE", $entreprise->getVilleEntreprise () );
	$template->set_var ( "telENTREPRISE", $entreprise->getTelEntreprise () );
	$template->set_var ( "faxENTREPRISE", $entreprise->getFaxEntreprise () );
	
	$template->set_var ( "nomSIGNATAIRE", $signataire != NULL ? $signataire->getNomContact () : " - " );
	$template->set_var ( "prenomSIGNATAIRE", $signataire != NULL ? $signataire->getPrenomContact () : " - " );
	$template->set_var ( "fonctionSIGNATAIRE", $signataire != NULL ? $signataire->getFonctionContact () : " - " );
	$template->set_var ( "debutSTAGE", $fiche->getDateDebutStage () );
	$template->set_var ( "finSTAGE", $fiche->getDateFinStage () );
	
	$template->set_var ( "nomMAITRESTAGE", $maitreStage != NULL ? $maitreStage->getNomContact () : " - " );
	$template->set_var ( "prenomMAITRESTAGE", $maitreStage != NULL ? $maitreStage->getPrenomContact () : " - " );
	$template->set_var ( "fonctionMAITRESTAGE", $maitreStage != NULL ? $maitreStage->getFonctionContact () : " - " );
	$template->set_var ( "mailMAITRESTAGE", $maitreStage != NULL ? $maitreStage->getEmailContact () : " - " );
	$template->set_var ( "telMAITRESTAGE", $maitreStage != NULL ? $maitreStage->getTelContact () : " - " );
	
	$template->set_var ( "nomSTAGE", $fiche->getIntituleStage () );
	$template->set_var ( "sujetSTAGE", $fiche->getSujetStage () );
	$template->set_var ( "domaineSTAGE", $fiche->getDomaineStage () );
	$template->set_var ( "technoSTAGE", $fiche->getTechnoStage () );
	
	$template->parse ( "parse", "gestionFicheStage" );
	// Affichage des donn&#233;es
	$template->p ( "parse" );
	echo "<br/><hr>";
	$mails = array ();
	if ($etudiant->getMailfacEtudiant () != NULL)
		$mails [count ( $mails )] = $etudiant->getMailfacEtudiant ();
	if ($etudiant->getMailstableEtudiant () != NULL)
		$mails [count ( $mails )] = $etudiant->getMailstableEtudiant ();
	if ($etudiant->getMailstageEtudiant () != NULL)
		$mails [count ( $mails )] = $etudiant->getMailstageEtudiant ();
	$chaine = implode ( $mails, ',' );
	// echo "<h3>En cas de refus du stage, saisir le motif.</h3>";
	$fb->addTextAreaField ( "Motif de refus du stage (obligatoire en cas de refus)", FOGestionFicheStage::$CHAMP_FORM_MOTIF_REFUS, false, "", "", 50, 10 );
	echo "<br/><center><input type='submit' value='Valider' name='action'' />";
	echo "<input type='submit' value='Refuser' name='action' />";
	echo "<form>";
	echo "<input type='button' value=\"Mailer l'&#233;tudiant pour modifications\" name='action' onClick=\"location.href='mailto:" . $chaine . "?subject=fiche de stage'\"></center>";
	echo "</form>";
} // Aucune fiche de stage n'est choisie on affiche une liste de fiches
else {
	
	echo "<br/><br/>";
	echo "<table border='1' width='98%'>";
	echo "<tr>";
	
	echo '<th width="12%" align="center"><a href="?idtype_stage=' . $idtype . '&order=type">Type de stage</a></th>';
	echo '<th width="20%" align="center"><a href="?idtype_stage=' . $idtype . '&order=etudiant">Etudiant</a></th>';
	echo '<th width="30%" align="center"><a href="?idtype_stage=' . $idtype . '&order=intitule">Intitul&#233; du stage</a></th>';
	echo '<th width="25%" align="center"><a href="?idtype_stage=' . $idtype . '&order=entreprise">Entreprise</a></th>';
	echo '<th width="3%" align="center"></a>';
	
	echo "</tr>";
	
	// Tri du tableau en fonction du parametre de 'order' de l'url
	if (isset ( $_GET ['order'] )) {
		switch ($_GET ['order']) {
			case 'type' :
				$ficheavalider = Enumeration::sort ( $ficheavalider, '$a->getIdTypeStage()' );
				break;
			
			case 'etudiant' :
				$ficheavalider = Enumeration::sort ( $ficheavalider, '$a->getNomEtudiant()." ".$a->getPrenomEtudiant()' );
				break;
			
			case 'intitule' :
				$ficheavalider = Enumeration::sort ( $ficheavalider, '$a->getIntituleStage()' );
				break;
			
			case 'entreprise' :
				$ficheavalider = Enumeration::sort ( $ficheavalider, '$a->getRaisonSocialeEntreprise()' );
				break;
		}
		;
	} else {
		$ficheavalider = Enumeration::sort ( $ficheavalider, '$a->getIdTypeStage()' );
	}
	
	// sort($propositionsStagesRetenues);
	foreach ( $ficheavalider as $key => $fiche ) {
		echo "<tr>";
		
		echo '<td><a href="../popups/popUpTypeStage.php?idTypeStage=' . $fiche->getIdTypeStage () . '" target="blank">' . $fiche->getLibelleTypeStage () . '</a></td>';
		
		echo '<td><a href="../popups/popUpEtudiant.php?idEtudiant=' . $fiche->getIdEtudiant () . '" target="blank">' . strtoupper ( $fiche->getNomEtudiant () ) . ' ' . $fiche->getPrenomEtudiant () . '</a></td>';
		
		echo '<td><a href="?idtype_stage=' . $fiche->getIdTypeStage () . '&idfiche=' . $fiche->getIdStage () . '">' . $fiche->getIntituleStage () . '</a></td>';
		
		echo '<td><a href="../popups/popUpEntreprise.php?idEntreprise=' . $fiche->getIdEntreprise () . '" target="blank">';
		$entreprises = DBEntreprise::getRecords ( $fiche->getIdEntreprise () );
		echo $entreprises [0]->getRaisonsocialeEntreprise ();
		echo '</a></td>';
		
		echo '<td><a href="../admin/formModifFicheStage.php?idFicheStage=' . $fiche->getIdStage () . '&chgFiche=true&"><img alt="' . XHTMLBuilder::getText ( 'imgModifFicheStage' ) . '" src="../image/b_edit.png" title="' . XHTMLBuilder::getText ( 'Modifier la fiche de stage' ) . '"></a></td>';
		
		echo "</tr>";
	}
	
	echo "</table>";
}

$fb->endForm ();
$fb->generateXHTML ();
?>

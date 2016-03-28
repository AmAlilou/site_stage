<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

$value_AutreDomaineStage=isset($_GET[FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE])?$_GET[FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE]:"";
$value_AutreTechnoStage=isset($_GET[FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE])?$_GET[FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE]:"";
$value_AutreFctMaitreStage=isset($_GET[FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE])?$_GET[FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE]:"";
$value_AutreFctSignataire=isset($_GET[FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE])?$_GET[FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE]:"";
$nomEtu = SessionManager::getEtudiant()->getNomEtudiant();
$prenomEtu = SessionManager::getEtudiant()->getPrenomEtudiant();

echo "<center><h2>Espace &#233;tudiant $prenomEtu $nomEtu</h2></center>";

if (isset($_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE]) && ($_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE]!="Autre" and $_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE]!="")){
	$liste_entreprises = DBEntreprise::getRecords($_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE]);
	$entreprise = count($liste_entreprises)>0?$liste_entreprises[0]:NULL;
	$value_AutreRSEntreprise = "";
	$value_AdrEntreprise = $entreprise!=NULL?$entreprise->getAdresseEntreprise():"";
	$value_CPEntreprise = $entreprise!=NULL?$entreprise->getCodePostalEntreprise():"";
	$value_VilleEntreprise = $entreprise!=NULL?$entreprise->getVilleEntreprise():"";
	$value_TelEntreprise = $entreprise!=NULL?$entreprise->getTelEntreprise():"";
	$value_AutreTypeEntreprise=DBConfig::isTypeEntreprise($entreprise->getTypeEntreprise())?"":$entreprise->getTypeEntreprise();
	$value_TypeEntreprise=DBConfig::isTypeEntreprise($entreprise->getTypeEntreprise())?$entreprise->getTypeEntreprise():"Autre";
} else {
	$value_AutreRSEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE])?$_GET[FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE]:"";
	if ($value_AutreRSEntreprise == ""){
		$value_AdrEntreprise = "";
		$value_CPEntreprise = "";
		$value_VilleEntreprise = "";
		$value_TelEntreprise = "";
		$value_TypeEntreprise = "";
		$value_AutreTypeEntreprise="";
	} else {
	$value_AdrEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE]:"";
	$value_CPEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE]:"";
	$value_VilleEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE]:"";
	$value_TelEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE]:"";
	$value_AutreTypeEntreprise=isset($_GET[FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE]:"";
	$value_TypeEntreprise=isset($_GET[FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE]:"";
	}
}	

$javascript= "
function updateAutreDomaineField(){
    if((document.getElementById(\"".FOFicheStage::$CHAMP_FORM_DOMAINE_STAGE."\").value != \"Autre\")){
        setHidden(\"div_".FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\");
	document.getElementById(\"".FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\").value=\"\";
    } else {
		setVisible(\"div_".FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\");
	}
}
function updateAutreTechnoField(){
     if((document.getElementById(\"".FOFicheStage::$CHAMP_FORM_TECHNO_STAGE."\").value != \"Autre\")){
       	setHidden(\"div_".FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\");
       	document.getElementById(\"".FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value=\"\";
     } else {
	setVisible(\"div_".FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\");
     }
}
function updateAutreFonctionMaitreStageField(){
    if((document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE."\").value != \"Autre\")){
		setHidden(\"div_".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\");
		document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\").value=\"\";
    } else {
		setVisible(\"div_".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\");
	}
}
function updateAutreFonctionSignataireField(){
    if((document.getElementById(\"".FOSignataireStage::$CHAMP_FORM_FONCTION_SIGNATAIRE_STAGE."\").value != \"Autre\")){
        setHidden(\"div_".FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE."\");
		document.getElementById(\"".FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE."\").value=\"\";
    } else {
		setVisible(\"div_".FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE."\");
    }
}            
function updateEntrepriseFieldsDisplay(){
    if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE."\").value != \"Autre\")){
		setHidden(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\");
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE."\").disabled=true;
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE."\").disabled=true;
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE."\").disabled=true;
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE."\").disabled=true;
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").disabled=true;
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").disabled=true;
    } else {
		setVisible(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\");
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE."\").disabled=false;
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE."\").disabled=false;
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE."\").disabled=false;
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE."\").disabled=false;
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").disabled=false;
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").disabled=false;
    }
    if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").value != \"Autre\")){
        setHidden(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\");
    } else {
		setVisible(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\");
	}
}
function updateFieldsValues(){
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\").value=\"".$value_AutreRSEntreprise."\";
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE."\").value=\"".str_replace("\n", "\\n", str_replace("\r\n", "\\n", $value_AdrEntreprise))."\";
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE."\").value=\"".$value_CPEntreprise."\";
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE."\").value=\"".$value_VilleEntreprise."\";
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE."\").value=\"".$value_TelEntreprise."\";
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").value=\"".$value_TypeEntreprise."\";
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").value=\"".$value_AutreTypeEntreprise."\";
    
    document.getElementById(\"".FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\").value=\"".$value_AutreDomaineStage."\";
    document.getElementById(\"".FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value=\"".$value_AutreTechnoStage."\";
    document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\").value=\"".$value_AutreFctMaitreStage."\";
    document.getElementById(\"".FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE."\").value=\"".$value_AutreFctSignataire."\";
}
function changeFiche(){
    document.getElementById('chgFiche').value='true';
    refreshPage();
}
";
            
$javascriptOnLoad="";
if (!isset($_GET['chgFiche']) or $_GET['chgFiche']!='true'){            	  
	$javascriptOnLoad.="
	updateFieldsValues();
	";
}

$javascriptOnLoad .="
    updateAutreDomaineField();
    updateAutreTechnoField();
    updateAutreFonctionMaitreStageField();
    updateAutreFonctionSignataireField();
    updateEntrepriseFieldsDisplay();
    document.getElementById('chgFiche').value='false';
";

$javascriptCheckForm = "	
	if ((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE."\").value == \"Autre\")){
		if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\").value == '')){
 		   	alert('Le champ <".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."> est obligatoire !');
    		return false;
		}
		if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE."\").value == '')){
 		   	alert('Le champ <".FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE."> est obligatoire !');
    		return false;
		}
		if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE."\").value == '')){
 		   	alert('Le champ <".FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE."> est obligatoire !');
    		return false;
		}
		if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE."\").value == '')){
 			alert('Le champ <".FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE."> est obligatoire !');
    		return false;
		}
		if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE."\").value == '')){
 			alert('Le champ <".FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE."> est obligatoire !');
    		return false;
		}
		if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").value == \"Autre\")){
			if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").value == '')){
 		   		alert('Le champ <".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."> est obligatoire si <".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."> est &#233;gal &#224; Autre !');
    			return false;
			}
		}
	}	
	if((document.getElementById(\"".FOFicheStage::$CHAMP_FORM_DOMAINE_STAGE."\").value == \"Autre\")){
		if((document.getElementById(\"".FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\").value == '')){
 	   		alert('Le champ <".FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."> est obligatoire si <".FOFicheStage::$CHAMP_FORM_DOMAINE_STAGE."> est &#233;gal &#224; Autre !');
    		return false;
		}	
	}
	if((document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE."\").value == \"Autre\")){
		if((document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\").value == '')){
 	   		alert('Le champ <".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."> est obligatoire si <".FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE."> est &#233;gal &#224; Autre !');
    		return false;
		}
	}	
	if((document.getElementById(\"".FOSignataireStage::$CHAMP_FORM_FONCTION_SIGNATAIRE_STAGE."\").value == \"Autre\")){
		if((document.getElementById(\"".FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE."\").value == '')){
 	   		alert('Le champ <".FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE."> est obligatoire si <".FOSignataireStage::$CHAMP_FORM_FONCTION_SIGNATAIRE_STAGE."> est &#233;gal &#224; Autre !');
    		return false;
		}
	}
";

XHTMLBuilder::getInstance()->addJavascript($javascript);
XHTMLBuilder::getInstance()->addOnLoadJavascript($javascriptOnLoad);

$etudiant = SessionManager::getEtudiant();
$stage=NULL;
if (isset($_GET[FOFicheStage::$CHAMP_FORM_ID_FICHE_STAGE]) and $_GET[FOFicheStage::$CHAMP_FORM_ID_FICHE_STAGE]!=""){
    $stages = DBFicheStage::getRecords($_GET[FOFicheStage::$CHAMP_FORM_ID_FICHE_STAGE]);
    $stage = $stages[0];
}
$fb = new FormBuilder("traitementFicheStage.php?operation=2", "post");
$fb->beginForm();
$stages = DBFicheStage::getFichesStageNonValides($etudiant);
$liste_fiches = Enumeration::getSelectablesArrayFromObject($stages,'$a->getIdStage()','"[".$a->getLibelleTypeStage()."] ".$a->getEntreprise()->getRaisonsocialeEntreprise()." : ".$a->getEtatStage()','"[".$a->getLibelleTypeStage()."]".$a->getEtatStage()." - ".$a->getEntreprise()->getRaisonsocialeEntreprise()');
$fb->addSelectMenuField("Vos fiches",FOFicheStage::$CHAMP_FORM_ID_FICHE_STAGE,true,$liste_fiches," -- FICHE DE STAGE -- ",isset($_GET['ficheEnCours'])?$_GET['ficheEnCours']:"","",true,"OnChange = \"changeFiche();\"");
$fb->addHiddenField("chgFiche");
  echo "<hr/>";



if ($stage!=NULL){
	$entreprise = $stage->getEntreprise();
	$maitreStage = $stage->getMaitreStage();
	$signataire = $stage->getSignataireStage();
	$typeStage = $stage->getTypeStage();
	
	$fb->addAdditionnalJavascriptTest($javascriptCheckForm);	
	echo "<center><h1>Modification d'une fiche de stage</h1></center>";	
	//$fb->addHiddenField(FOFicheStage::$CHAMP_FORM_ID_FICHE_STAGE,"",$stage->getIdStage());
	echo "<h3>Informations sur l'&#233;tudiant pendant le stage</h3>";
	echo "<table><tr><td align='right'><strong>Nom    : </strong>".$etudiant->getNomEtudiant()."</td><td align='right'><strong>Pr&#233;nom : </strong>".$etudiant->getPrenomEtudiant()."</td></tr>";
	echo "<tr><td colspan=2>";
	$fb->addTextField("Adresse",FODonneesStageEtudiant::$CHAMP_FORM_ADRESSESTAGE_ETUDIANT, false, true, "80%", "","", $etudiant->getAdressestageEtudiant());
	echo "</td></tr><tr><td align='right'>";
	$fb->addTextField("Code postal",FODonneesStageEtudiant::$CHAMP_FORM_CPSTAGE_ETUDIANT, false, true, "", "","", $etudiant->getCpstageEtudiant());
	echo "</td><td align='right'>";
	$fb->addTextField("Ville",FODonneesStageEtudiant::$CHAMP_FORM_VILLESTAGE_ETUDIANT, false, true, 30, "","", $etudiant->getVillestageEtudiant());
	echo "</td></tr><tr><td align='right'>";
	$fb->addTextField("Email",FODonneesStageEtudiant::$CHAMP_FORM_MAILSTAGE_ETUDIANT, false, true, 30, "","", $etudiant->getMailstageEtudiant());
	echo "</td><td align='right'>";
	$fb->addTextField("T&#233;l&#233;phone",FODonneesStageEtudiant::$CHAMP_FORM_TELSTAGE_ETUDIANT, false, true, "", "","", $etudiant->getTelstageEtudiant());
	echo "</td></tr></table>";
	
	echo "<h3>Informations sur le type du stage</h3>";
	echo "<table><tr><td align='right'>";
	$liste_types_stage = DBTypeStage::getRecords("","",$etudiant->getPromoEtudiant(),$etudiant->getMiageEtudiant());
	if (count($liste_types_stage)>1)
		$fb->addRadioGroup("Type de stage",FOFicheStage::$CHAMP_FORM_ID_TYPE_STAGE,true,Enumeration::getSelectablesArrayFromObject($liste_types_stage,'$a->getIdTypeStage()','$a->getLibelleTypeStage()'));
	else {
		$fb->addHiddenField(FOFicheStage::$CHAMP_FORM_ID_TYPE_STAGE,"",$liste_types_stage[0]->getIdTypeStage());
		echo $liste_types_stage[0]->getLibelleTypeStage(); 	
	}
	echo "</td></tr></table>";
	
	echo "<h3>Informations sur l'entreprise</h3>";
	echo "<table><tr><td align='right'>";
	$fb->addSelectMenuField("Entreprise",FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE,true,DBEntreprise::getEnumeration(),"","",$entreprise->getIdEntreprise(),"","onChange=\"refreshPage();\"");
	echo "</td><td align='right'>";
	$fb->addTextField("Autre Entreprise",FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE,false,true, "", "","", $entreprise->getRaisonsocialeEntreprise());
	echo "</td></tr></table><table><tr><td>";
	$fb->addSelectMenuField("Secteur d'activit&#233;",FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE,true,DBConfig::getEnumeration("TYPE ENTREPRISE"),"-- ENTREPRISE --",DBConfig::inEnumeration("TYPE ENTREPRISE",$entreprise->getTypeEntreprise())?$entreprise->getTypeEntreprise():"Autre","",true,"onChange=\"refreshPage();\"");
	echo "</td></tr><tr><td>";
	$fb->addTextField("Autre Secteur",FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE,false,true,"","","",DBConfig::inEnumeration("TYPE ENTREPRISE",$entreprise->getTypeEntreprise())?"":$entreprise->getTypeEntreprise());
	echo "</td></tr></table><table><tr><td colspan=2>";
	$fb->addTextField("Adresse",FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE,false,true,"80%","","",$entreprise->getAdresseEntreprise());
	echo "</td></tr><tr><td align='right'>";
	$fb->addTextField("CP",FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE,false,true,"","","",$entreprise->getCodePostalEntreprise());
	echo "</td><td align='right'>";
	$fb->addTextField("Ville",FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE,false,true, 30,"","",$entreprise->getVilleEntreprise());
	echo "</td></tr><tr><td align='right'>";
	$fb->addTextField("T&#233;l&#233;phone",FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE,false,true,"","","",$entreprise->getTelEntreprise());
	echo "</td></tr></table>";
	
	echo "<h3>Informations sur le maitre de stage</h3>";
	echo "<table><tr><td align='right'>";
	$fb->addTextField("Nom",FOMaitreStage::$CHAMP_FORM_NOM_MAITRE_STAGE,true,true, "", "","", $maitreStage==NULL?"":$maitreStage->getNomContact());
	echo "</td><td align='right'>";
	$fb->addTextField("Pr&#233;nom",FOMaitreStage::$CHAMP_FORM_PRENOM_MAITRE_STAGE,true,true, "", "","", $maitreStage==NULL?"":$maitreStage->getPrenomContact());
	echo "</td></tr><tr><td align='right'>";
	$first_fctMaitreStage = "";
	$first_autreFctMaitreStage = "";
	if ($maitreStage!=NULL){
	$first_fctMaitreStage = DBConfig::inEnumeration("FONCTION",$maitreStage->getFonctionContact())?$maitreStage->getFonctionContact():"Autre";
	$first_autreFctMaitreStage = DBConfig::inEnumeration("FONCTION",$maitreStage->getFonctionContact())?"":$maitreStage->getFonctionContact();
	}
	$fb->addSelectMenuField("Fonction",FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE,true,DBConfig::getEnumeration("FONCTION"),"",$first_fctMaitreStage,"","","onChange=\"updateAutreFonctionMaitreStageField();\"");
	echo "</td><td align='right'>";
	$fb->addTextField("Autre Fonction",FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE,false,true,"","","",$first_autreFctMaitreStage);
	echo "</td></tr><tr><td align='right'>";
	$fb->addTextField("Mail",FOMaitreStage::$CHAMP_FORM_EMAIL_MAITRE_STAGE,true,true, "", "","", $maitreStage==NULL?"":$maitreStage->getEmailContact());
	echo "</td><td align='right'>";
	$fb->addTextField("T&#233;l&#233;phone",FOMaitreStage::$CHAMP_FORM_TEL_MAITRE_STAGE,false,true, "", "","", $maitreStage==NULL?"":$maitreStage->getTelContact());
	echo "</td></tr></table>";
	
	echo "<h3>Informations sur le signataire</h3>";
	echo "<table><tr><td align='right'>";
	$fb->addTextField("Nom",FOSignataireStage::$CHAMP_FORM_NOM_SIGNATAIRE_STAGE,true,true, "", "","", $signataire==NULL?"":$signataire->getNomContact());
	echo "</td><td align='right'>";
	$fb->addTextField("Pr&#233;nom",FOSignataireStage::$CHAMP_FORM_PRENOM_SIGNATAIRE_STAGE,true,true, "", "","", $signataire==NULL?"":$signataire->getPrenomContact());
	echo "</td></tr><tr><td align='right'>";
	$first_fctSignataireStage = "";
	$first_autreFctSignataireStage = "";
	if ($signataire!=NULL){
		$first_fctSignataireStage = DBConfig::inEnumeration("FONCTION",$signataire->getFonctionContact())?$signataire->getFonctionContact():"Autre";
		$first_autreFctSignataireStage = DBConfig::inEnumeration("FONCTION",$signataire->getFonctionContact())?"":$signataire->getFonctionContact();
	}
	$fb->addSelectMenuField("Fonction",FOSignataireStage::$CHAMP_FORM_FONCTION_SIGNATAIRE_STAGE,true,DBConfig::getEnumeration("FONCTION"),"",$first_fctSignataireStage,"","","onChange=\"updateAutreFonctionSignataireField();\"");
	echo "</td><td align='right'>";
	$fb->addTextField("Autre Fonction",FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE,false,true,"","","",$first_autreFctSignataireStage);
	echo "</td></tr></table>";
	
	echo "<h3>Informations sur le stage</h3>";
	echo "<table width='94%'><tr><td width='50%' align='right'>";
	$fb->addDateField("Date de d&#233;but",FOFicheStage::$CHAMP_FORM_DATE_DEBUT_STAGE, true, "jj/mm/aaaa",$stage==NULL?"":$stage->getDateDebutStage());
	echo "</td></tr><tr><td width='50%'  align='right'>";
	$fb->addDateField("Date de fin",FOFicheStage::$CHAMP_FORM_DATE_FIN_STAGE, true, "jj/mm/aaaa",$stage==NULL?"":$stage->getDateFinStage());
	echo "</td></tr><tr><td width='50%' align='right'>";
	$fb->addTextField("Intitul&#233;",FOFicheStage::$CHAMP_FORM_INTITULE_STAGE, true, true, 40, "","",$stage==NULL?"":$stage->getIntituleStage());
	echo "</td></tr><tr><td colspan=2>";
	$fb->addTextAreaField("Sujet",FOFicheStage::$CHAMP_FORM_SUJET_STAGE, true,"",$stage==NULL?"":$stage->getSujetStage(),80,7);
	echo "</td></tr><tr><td width='50%' align='right'>";
	
	$first_domaineStage = DBConfig::inEnumeration("DOMAINE",$stage->getDomaineStage())?$stage->getDomaineStage():"Autre";
	$first_autreDomaineStage = DBConfig::inEnumeration("DOMAINE",$stage->getDomaineStage())?"":$stage->getDomaineStage();
	$fb->addSelectMenuField("Domaine",FOFicheStage::$CHAMP_FORM_DOMAINE_STAGE,true,DBConfig::getEnumeration("DOMAINE"),"-- DOMAINE --",$first_domaineStage,"","","onChange=\"updateAutreDomaineField();\"");
	echo "</td><td width='50%' align='right'>";
	$fb->addTextField("Autre Domaine",FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE,false,true,"","","",$first_autreDomaineStage);
	echo "</td></tr><tr><td width='50%' align='right'>";
	
	$first_technoStage = DBConfig::inEnumeration("TECHNOLOGIE",$stage->getTechnoStage())?$stage->getTechnoStage():"Autre";
	$first_autreTechnoStage = DBConfig::inEnumeration("TECHNOLOGIE",$stage->getTechnoStage())?"":$stage->getTechnoStage();
	$fb->addSelectMenuField("Technologie",FOFicheStage::$CHAMP_FORM_TECHNO_STAGE,true,DBConfig::getEnumeration("TECHNOLOGIE"),"-- TECHNOLOGIE --",$first_technoStage,"",true,"onChange=\"updateAutreTechnoField();\"");
	echo "</td><td width='50%' align='right'>";
	$fb->addTextField("Autre Technologie", FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE, false, true,"","","",$first_autreTechnoStage);
	echo "</td></tr><tr><td colspan=2>";
	$fb->addTextAreaField("Description des technologies utilis&#233;es",FOFicheStage::$CHAMP_FORM_DESC_TECHNO_STAGE,true,"", $stage==NULL?"":$stage->getDescTechnoStage(),80,7);
	echo "</td></tr>";
	echo "</table>";
	
	echo '<br/><center><input type="submit" value="Valider" />';
	echo '<input type="reset" value="Annuler" /></center>';
	
}else echo "Aucune fiche selectionn&#233;e.";
	$fb->endForm();
	$fb->generateXHTML();
?>




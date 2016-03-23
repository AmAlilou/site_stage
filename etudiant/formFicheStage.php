<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
//(([0-9]{2}[.-/[:blank:]]?){4}[0-9]{2})|(([0-9]{2}[.-/[:blank:]]?){2}[0-9]{3}[.-/[:blank:]]?[0-9]{3})
$value_AutreDomaineStage=isset($_GET[FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE])?$_GET[FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE]:"";
$value_AutreTechnoStage=isset($_GET[FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE])?$_GET[FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE]:"";
$value_AutreFctMaitreStage=isset($_GET[FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE])?$_GET[FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE]:"";
$value_AutreFctSignataire=isset($_GET[FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE])?$_GET[FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE]:"";
$nomEtu = SessionManager::getEtudiant()->getNomEtudiant();
$prenomEtu = SessionManager::getEtudiant()->getPrenomEtudiant();
$idEtu =  SessionManager::getEtudiant()->getIdEtudiant();
$fichesEtu  = DBFicheStage::getFichesStageValides(SessionManager::getEtudiant());
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
        	document.getElementById(\"".FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\").value=\"".$value_AutreDomaineStage."\";
	}
}
function updateAutreTechnoField(){
	if((document.getElementById(\"".FOFicheStage::$CHAMP_FORM_TECHNO_STAGE."\").value != \"Autre\")){
        	setHidden(\"div_".FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\");
        	document.getElementById(\"".FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value=\"\";
	} else {
		setVisible(\"div_".FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\");
        	document.getElementById(\"".FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value=\"".$value_AutreTechnoStage."\";
	}
}
function updateAutreFonctionMaitreStageField(){
    if((document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE."\").value != \"Autre\")){
		setHidden(\"div_".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\");
		document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\").value=\"\";
    } else {
		setVisible(\"div_".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\");
        	document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\").value=\"".$value_AutreFctMaitreStage."\";
    }
}
function updateAutreFonctionSignataireField(){
    if((document.getElementById(\"".FOSignataireStage::$CHAMP_FORM_FONCTION_SIGNATAIRE_STAGE."\").value != \"Autre\")){
        	setHidden(\"div_".FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE."\");
		document.getElementById(\"".FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE."\").value=\"\";
    } else {
		setVisible(\"div_".FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE."\");
        	document.getElementById(\"".FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE."\").value=\"".$value_AutreFctSignataire."\";
	}
}   
function updateAutreTypeEntrepriseField(){
    if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").value != \"Autre\")){
        	setHidden(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\");
		document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").value=\"\";
    } else {
		setVisible(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\");
        	document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").value=\"".$value_AutreTypeEntreprise."\";
	}
}         
function updateEntrepriseFields(){
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
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\").value=\"".$value_AutreRSEntreprise."\";
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE."\").value=\"".str_replace("\n", "\\n", str_replace("\r\n", "\\n", $value_AdrEntreprise))."\";
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE."\").value=\"".$value_CPEntreprise."\";
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE."\").value=\"".$value_VilleEntreprise."\";
    document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE."\").value=\"".$value_TelEntreprise."\";
    if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").value != \"Autre\")){
        setHidden(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\");
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").value=\"".$value_TypeEntreprise."\";
		document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").value=\"\";
    } else {
		setVisible(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\");
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").value=\"".$value_TypeEntreprise."\";
        document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").value=\"".$value_AutreTypeEntreprise."\";
	}
}
";

$javascriptOnLoad ="
	updateAutreDomaineField();
	updateAutreTechnoField();
	updateAutreFonctionMaitreStageField();
    	updateAutreFonctionSignataireField();
    	updateEntrepriseFields();
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

$fb = new FormBuilder("traitementFicheStage.php?operation=1", "post");

$fb->addAdditionnalJavascriptTest($javascriptCheckForm);
echo "<h1>Saisie d'une fiche de stage</h1>";

$fb->beginForm();

echo "<h3>Informations sur l'&#233;tudiant pendant le stage</h3>";
$etudiant = SessionManager::getEtudiant();
echo "<table><tr><td align='right'>Nom    : ".$etudiant->getNomEtudiant()."</td><td align='right'>Pr&#233;nom : ".$etudiant->getPrenomEtudiant()."</td></tr>";
echo "<tr><td colspan=2>";
$fb->addTextField("Adresse",FODonneesStageEtudiant::$CHAMP_FORM_ADRESSESTAGE_ETUDIANT, false, true, "80%","","",$etudiant->getAdressestageEtudiant());
echo "</td></tr><tr><td align='right'>";
$fb->addTextField("Code postal",FODonneesStageEtudiant::$CHAMP_FORM_CPSTAGE_ETUDIANT, false, true, "","","",$etudiant->getCpstageEtudiant());
echo "</td><td align='right'>";
$fb->addTextField("Ville",FODonneesStageEtudiant::$CHAMP_FORM_VILLESTAGE_ETUDIANT, false, true, 30,"","",$etudiant->getVillestageEtudiant());
echo "</td></tr><tr><td align='right'>";
$fb->addTextField("Email",FODonneesStageEtudiant::$CHAMP_FORM_MAILSTAGE_ETUDIANT, false, true, 30,"","",$etudiant->getMailstageEtudiant());
echo "</td><td align='right'>";
$fb->addTextField("T&#233;l&#233;phone",FODonneesStageEtudiant::$CHAMP_FORM_TELSTAGE_ETUDIANT, false, true, "","","",$etudiant->getTelstageEtudiant());
//echo "</td></tr><tr><td align='left'>";
echo "</td></tr></table>";

echo "<h3>Informations sur le type de stage</h3>";
echo "<table><tr><td>";
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
$fb->addSelectMenuField("Entreprise",FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE,true,DBEntreprise::getEnumeration(),"-- ENTREPRISE --","","",true,"onChange=\"refreshPage();\"");
echo "</td></tr><tr><td align='right'>";
$fb->addTextField("Autre Entreprise",FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE,false,true);
echo "</td></tr></table><table><tr><td>";
$fb->addSelectMenuField("Secteur d'activit&#233;",FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE,true,DBConfig::getEnumeration("TYPE ENTREPRISE"),"-- ACTIVITE --","","",true,"onChange=\"updateAutreTypeEntrepriseField();\"");
echo "</td></tr><tr><td>";
$fb->addTextField("Autre Secteur",FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE,false,true);
echo "</td></tr></table><table><tr><td colspan=2>";
$fb->addTextField("Adresse",FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE,false,true,"80%");
echo "</td></tr><tr><td align='right'>";
$fb->addTextField("CP",FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE,false,true);
echo "</td><td align='right'>";
$fb->addTextField("Ville",FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE,false,true,30);
echo "</td></tr><tr><td align='right'>";
$fb->addTextField("T&#233;l&#233;phone",FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE,false,true);
echo "</td></tr></table>";

echo "<h3>Informations sur le maitre de stage</h3>";
echo "<table width='75%'><tr><td width='50%' align='right'>";
$fb->addTextField("Nom",FOMaitreStage::$CHAMP_FORM_NOM_MAITRE_STAGE,true,true);
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Pr&#233;nom",FOMaitreStage::$CHAMP_FORM_PRENOM_MAITRE_STAGE,true,true);
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addSelectMenuField("Fonction",FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE,true,DBConfig::getEnumeration("FONCTION"),"-- FONCTION --","","","","onChange=\"updateAutreFonctionMaitreStageField();\"");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Autre Fonction",FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE,false,true);
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addTextField("Mail",FOMaitreStage::$CHAMP_FORM_EMAIL_MAITRE_STAGE,true,true);
echo "</td><td width='50%' align='right'>";
$fb->addTextField("T&#233;l&#233;phone",FOMaitreStage::$CHAMP_FORM_TEL_MAITRE_STAGE,false,true);
echo "</td></tr></table>";

echo "<h3>Informations sur le signataire</h3>";
echo "<table width='75%'><tr><td width='50%' align='right'>";
$fb->addTextField("Nom",FOSignataireStage::$CHAMP_FORM_NOM_SIGNATAIRE_STAGE,true,true);
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Pr&#233;nom",FOSignataireStage::$CHAMP_FORM_PRENOM_SIGNATAIRE_STAGE,true,true);
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addSelectMenuField("Fonction",FOSignataireStage::$CHAMP_FORM_FONCTION_SIGNATAIRE_STAGE,true,DBConfig::getEnumeration("FONCTION"),"-- FONCTION --","","","","onChange=\"updateAutreFonctionSignataireField();\"");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Autre Fonction",FOSignataireStage::$CHAMP_FORM_AUTRE_FONCTION_SIGNATAIRE_STAGE,false,true);
echo "</td></tr></table>";

echo "<h3>Informations sur le stage</h3>";
echo "<table width='94%'><tr><td width='50%' align='right'>";
$fb->addDateField("Date de d&#233;but",FOFicheStage::$CHAMP_FORM_DATE_DEBUT_STAGE, true, "jj/mm/aaaa");
echo "</td></tr><tr><td width='50%'  align='right'>";
$fb->addDateField("Date de fin",FOFicheStage::$CHAMP_FORM_DATE_FIN_STAGE, true, "jj/mm/aaaa");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addTextField("Intitul&#233;",FOFicheStage::$CHAMP_FORM_INTITULE_STAGE, true);
echo "</td></tr><tr><td colspan=2>";
$fb->addTextAreaField("Sujet",FOFicheStage::$CHAMP_FORM_SUJET_STAGE, true);
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addSelectMenuField("Domaine",FOFicheStage::$CHAMP_FORM_DOMAINE_STAGE,true,DBConfig::getEnumeration("DOMAINE"),"-- DOMAINE --","","","","onChange=\"updateAutreDomaineField();\"");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Autre Domaine",FOFicheStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE,false,true);
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addSelectMenuField("Technologie",FOFicheStage::$CHAMP_FORM_TECHNO_STAGE,true,DBConfig::getEnumeration("TECHNOLOGIE"),"-- TECHNOLOGIE --","","",true,"onChange=\"updateAutreTechnoField();\"");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Autre Technologie", FOFicheStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE, false, true);
echo "</td></tr><tr><td colspan=2>";
$fb->addTextAreaField("Description des technologies utilis&#233;es",FOFicheStage::$CHAMP_FORM_DESC_TECHNO_STAGE,true);
echo "</td></tr>";
echo "</table>";

echo '<br/><center><input type="submit" value="Valider" />';
echo '<input type="reset" value="Annuler" /></center>';

$fb->endForm();
$fb->generateXHTML();

?>




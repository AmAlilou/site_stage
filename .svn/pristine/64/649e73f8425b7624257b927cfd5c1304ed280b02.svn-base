<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

$value_AutreDomaineStage=isset($_GET[FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE])?$_GET[FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE]:"";
$value_AutreFctMaitreStage=isset($_GET[FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE])?$_GET[FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE]:"";
$value_AutreFctContactEntreprise=isset($_GET[FOContactEntreprise::$CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE])?$_GET[FOContactEntreprise::$CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE]:"";
$value_AutreTypeEntreprise=isset($_GET[FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE]:"";
$value_AutreTechnoStage=isset($_GET[FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE])?$_GET[FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE]:"";

if (isset($_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE]) && $_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE]!="Autre"){
    $liste_entreprises = DBEntreprise::getRecords($_GET[FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE]);
    $entreprise = count($liste_entreprises)>0?$liste_entreprises[0]:NULL;
    $value_AutreRSEntreprise = "";
    $value_AdrEntreprise = $entreprise!=NULL?$entreprise->getAdresseEntreprise():"";
    $value_CPEntreprise = $entreprise!=NULL?$entreprise->getCodePostalEntreprise():"";
    $value_VilleEntreprise = $entreprise!=NULL?$entreprise->getVilleEntreprise():"";
    $value_TelEntreprise = $entreprise!=NULL?$entreprise->getTelEntreprise():"";
    $value_TypeEntreprise = $entreprise!=NULL?$entreprise->getTypeEntreprise():"";
    $value_UrlEntreprise = $entreprise!=NULL?$entreprise->getUrlSiteEntreprise():"";
}
else {
    $value_AutreRSEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE])?$_GET[FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE]:"";
    if ($value_AutreRSEntreprise == ""){
        $value_AdrEntreprise = "";
        $value_CPEntreprise = "";
        $value_VilleEntreprise = "";
        $value_TelEntreprise = "";
        $value_FaxEntreprise = "";
        $value_TypeEntreprise="";
        $value_UrlEntreprise="";
    }
    else {
         $value_AdrEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE]:"";
         $value_CPEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE]:"";
         $value_VilleEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE]:"";
         $value_TelEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE]:"";
         $value_FaxEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_FAX_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_FAX_ENTREPRISE]:"";
         $value_TypeEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE]:"";
         $value_UrlEntreprise = isset($_GET[FOEntreprise::$CHAMP_FORM_URL_ENTREPRISE])?$_GET[FOEntreprise::$CHAMP_FORM_URL_ENTREPRISE]:"";
    }
}   



$javascript= "function updateAutreDomaineField(){\n"
            ."if((document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE."\").value != \"Autre\")){\n"
            //."if((document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE."\").value != '')){\n"
            ."\tsetHidden(\"div_".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\");\n"
            ."\tdocument.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\").value=\"\";}\n"
            ."else {setVisible(\"div_".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\");\n"
            ."\tdocument.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\").value=\"".$value_AutreDomaineStage."\";}\n"
            ."}\n"
            ."function updateAutreFonctionMaitreStageField(){\n"
            ."if((document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE."\").value != \"Autre\")){\n"
            //."if((document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE."\").value != '')){\n"
            ."\tsetHidden(\"div_".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\");\n"
            ."\tdocument.getElementById(\"".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\").value=\"\";}\n"
            ."else {setVisible(\"div_".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\");\n"
            ."\tdocument.getElementById(\"".FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE."\").value=\"".$value_AutreFctMaitreStage."\";}\n"
            ."}\n"
            ."function updateAutreFonctionContact(){\n"
            ."if((document.getElementById(\"".FOContactEntreprise::$CHAMP_FORM_FONCTION_CONTACT_ENTREPRISE."\").value != \"Autre\")){\n"
            //."if((document.getElementById(\"".FOContactEntreprise::$CHAMP_FORM_FONCTION_CONTACT_ENTREPRISE."\").value != '')){\n"
            ."\tsetHidden(\"div_".FOContactEntreprise::$CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE."\");\n"
            ."\tdocument.getElementById(\"".FOContactEntreprise::$CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE."\").value=\"\";}\n"
            ."else {setVisible(\"div_".FOContactEntreprise::$CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE."\");\n"
            ."\tdocument.getElementById(\"".FOContactEntreprise::$CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE."\").value=\"".$value_AutreFctContactEntreprise."\";}\n"
            ."}\n"
            ."function updateAutreTypeEntreprise(){\n"
            ."if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").value != \"Autre\")){\n"
            //."if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").value != '')){\n"
            ."\tsetHidden(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\");\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").value=\"\";}\n"
            ."else {setVisible(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\");\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").value=\"".$value_AutreTypeEntreprise."\";}\n"
            ."}\n"            
            ."function updateAutreTechnoStage(){\n"
            ."if((document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_TECHNO_STAGE."\").value != \"Autre\")){\n"
            //."if((document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value != '')){\n"
            ."\tsetHidden(\"div_".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\");\n"
            ."\tdocument.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value=\"\";}\n"
            ."else {setVisible(\"div_".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\");\n"
            ."\tdocument.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value=\"".$value_AutreTechnoStage."\";}\n"
            ."}\n"            
            /*."function updateEntrepriseFields(){\n"
            ."\tif((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE."\").value != \"Autre\")){\n"
            ."\tsetHidden(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\");\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE."\").disabled=true;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE."\").disabled=true;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE."\").disabled=true;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE."\").disabled=true;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_FAX_ENTREPRISE."\").disabled=true;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").disabled=true;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_URL_ENTREPRISE."\").disabled=true;\n"
            ."} else {setVisible(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\");\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE."\").disabled=false;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE."\").disabled=false;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE."\").disabled=false;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE."\").disabled=false;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_FAX_ENTREPRISE."\").disabled=false;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").disabled=false;\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_URL_ENTREPRISE."\").disabled=false;\n"
            ."}}\n"*/
            ."function updateAutreRaisonSocialeField(){"
            ."\tif((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE."\").value != \"Autre\")){\n"
            ."\tsetHidden(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\");\n"
            ."} else {setVisible(\"div_".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\");\n"
            ."}}\n"
            ."function updateEntrepriseFieldsValue(){"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\").value=\"".$value_AutreRSEntreprise."\";\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE."\").value=\"".str_replace("\n", "\\n", str_replace("\r\n", "\\n", $value_AdrEntreprise))."\";\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE."\").value=\"".$value_CPEntreprise."\";\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE."\").value=\"".$value_VilleEntreprise."\";\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE."\").value=\"".$value_TelEntreprise."\";\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_FAX_ENTREPRISE."\").value=\"".$value_TelEntreprise."\";\n"
            ."\tif((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE."\").value != \"Autre\")){document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").value=\"".$value_TypeEntreprise."\";}\n"
            ."\tdocument.getElementById(\"".FOEntreprise::$CHAMP_FORM_URL_ENTREPRISE."\").value=\"".$value_UrlEntreprise."\";\n"
            ."}\n";
            
            
$javascriptOnLoad ="\tupdateAutreDomaineField();\n"
                  ."\tupdateAutreFonctionMaitreStageField();\n"
                  ."\tupdateAutreFonctionContact();\n"
                  ."\tupdateAutreRaisonSocialeField();\n"
                  ."\tupdateEntrepriseFieldsValue();\n"
                  ."\tupdateAutreTypeEntreprise();\n"
                 ."\tupdateAutreTechnoStage();\n";
            
XHTMLBuilder::getInstance()->addJavascript($javascript);
XHTMLBuilder::getInstance()->addOnLoadJavascript($javascriptOnLoad);


$fb = new FormBuilder("traitementFormPropStage.php", "post");

echo "<h1>Formulaire de proposition de stage</h1>";

$fb->beginForm();

echo "<br/>";
$fb->addTextField("Email responsable de la proposition", FOCreationPropositionStage::$CHAMP_FORM_EMAIL_RESP_PROP_STAGE, true, true, "", "", "");
echo "<br/>";

//---------------------- Type de stage -----------------------------------------------------
echo "<h2>Type de stage</h2>";
// on affiche la liste des types de stage

$typesStage = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"));
foreach($typesStage as $typeStage)
{
   echo "<br/>";
   $fb->addCheckbox($typeStage->getLibelleTypeStage()." [Dates : " . $typeStage->getDateDebutTheorique()."-".$typeStage->getDateFinTheorique()."]", FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE."__".$typeStage->getIdTypeStage(), false);
}
echo "<br/>";
//---------------------- Infos entreprise --------------------------------------------------

echo "<h2>Entreprise</h2>";

$fb->addSelectMenuField("Raison sociale", FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE, true, DBEntreprise::getEnumeration(),"Choisissez une entreprise","","","","onChange=\"refreshPage();\"");
echo "<table width='75%'>";
echo "<tr><td colspan=2 align='right'>";
$fb->addTextField("Autre raison sociale", FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE, false, true, "67%", "", "");
echo "</td></tr><tr><td colspan=2 align='right'>";
$fb->addSelectMenuField("Activit&#233;", FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE, false, DBConfig::getEnumeration("TYPE ENTREPRISE"),"Choisissez le type entreprise","","","","onChange=\"updateAutreTypeEntreprise();\"");
echo "</td></tr><tr><td colspan=2 align='right'>";
$fb->addTextField("Autre activit&#233;", FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE, false, true, "67%", "", "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addTextField("T&#233;l&#233;phone", FOEntreprise::$CHAMP_FORM_TEL_ENTREPRISE, false, true, "", "", "");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Fax", FOEntreprise::$CHAMP_FORM_FAX_ENTREPRISE, false, true, "", "", "");
echo "</td></tr><tr><td colspan=2 align='right'>";
$fb->addTextField("Adresse", FOEntreprise::$CHAMP_FORM_ADRESSE_ENTREPRISE, false, true, "67%", "", "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addTextField("Code postal", FOEntreprise::$CHAMP_FORM_CP_ENTREPRISE, false, true, "", "", "");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Ville", FOEntreprise::$CHAMP_FORM_VILLE_ENTREPRISE, false, true, "", "", "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addTextField("Url de l'entreprise", FOEntreprise::$CHAMP_FORM_URL_ENTREPRISE, false, true, "", "", "");
echo "</td></tr>";
echo "</table>";
//---------------------- Maitre de stage ---------------------------------------------
echo "<h2>Maitre de stage</h2>";

echo "<table width='75%'>";
echo "<tr><td width='50%' align='right'>";
$fb->addTextField("Nom", FOMaitreStage::$CHAMP_FORM_NOM_MAITRE_STAGE, false, true, "", "", "");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Pr&#233;nom", FOMaitreStage::$CHAMP_FORM_PRENOM_MAITRE_STAGE, false, true, "", "", "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addSelectMenuField("Fonction", FOMaitreStage::$CHAMP_FORM_FONCTION_MAITRE_STAGE, false, DBConfig::getEnumeration("FONCTION"),"Choisissez la fonction","","","","onChange=\"updateAutreFonctionMaitreStageField();\"");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Autre fonction", FOMaitreStage::$CHAMP_FORM_AUTRE_FONCTION_MAITRE_STAGE, false, true, "", "", "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addTextField("T&#233;l&#233;phone", FOMaitreStage::$CHAMP_FORM_TEL_MAITRE_STAGE, false, true, "", "", "");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Email", FOMaitreStage::$CHAMP_FORM_EMAIL_MAITRE_STAGE, false, true, "", "", "");
echo "</td></tr>";
echo "</table>";
//---------------------- Contact en entreprise ---------------------------------------
echo "<h2>Contact</h2>";

echo "<table width='75%'>";
echo "<tr><td width='50%' align='right'>";
$fb->addTextField("Nom", FOContactEntreprise::$CHAMP_FORM_NOM_CONTACT_ENTREPRISE, true, true, "", "", "");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Pr&#233;nom", FOContactEntreprise::$CHAMP_FORM_PRENOM_CONTACT_ENTREPRISE, true, true, "", "", "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addSelectMenuField("Fonction", FOContactEntreprise::$CHAMP_FORM_FONCTION_CONTACT_ENTREPRISE, true, DBConfig::getEnumeration("FONCTION"),"Choisissez la fonction","","","","onChange=\"updateAutreFonctionContact();\"");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Autre fonction", FOContactEntreprise::$CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE, false, true, "", "", "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addTextField("T&#233;l&#233;phone", FOContactEntreprise::$CHAMP_FORM_TEL_CONTACT_ENTREPRISE, false, true, "", "", "");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Email", FOContactEntreprise::$CHAMP_FORM_EMAIL_CONTACT_ENTREPRISE, true, true, "", "", "");
echo "</td></tr>";
echo "</table>";
//---------------------- Descriptif du stage ------------------------------------------
echo "<h2>Descriptif du stage</h2>";

echo "<table width='94%'>";
echo "<tr><td width='50%' align='right'>";
$fb->addDateField("Date de d&#233;but", FOCreationPropositionStage::$CHAMP_FORM_DATE_DEBUT_STAGE, true, "jj/mm/aaaa");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addDateField("Date de fin", FOCreationPropositionStage::$CHAMP_FORM_DATE_FIN_STAGE, true, "jj/mm/aaaa");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addTextField("Intitul&#233; du stage", FOCreationPropositionStage::$CHAMP_FORM_INTITULE_STAGE, true, true, "30", "", "");
echo "</td></tr><tr><td colspan=2>";
$fb->addTextareaField("Sujet du stage", FOCreationPropositionStage::$CHAMP_FORM_SUJET_STAGE, true, "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addSelectMenuField("Domaine", FOCreationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE, true, DBConfig::getEnumeration("DOMAINE"),"Choisissez le domaine","","","","onChange=\"updateAutreDomaineField();\"");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Autre domaine", FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE, false, true, "", "", "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addSelectMenuField("Technologie", FOCreationPropositionStage::$CHAMP_FORM_TECHNO_STAGE, true, DBConfig::getEnumeration("TECHNOLOGIE"),"Choisissez la technologie","","",true,"onChange=\"updateAutreTechnoStage();\"");
echo "</td><td width='50%' align='right'>";
$fb->addTextField("Autre Technologie", FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE, false, true, "", "", "");
echo "</td></tr><tr><td colspan=2>";
$fb->addTextareaField("Description de la technologie", FOCreationPropositionStage::$CHAMP_FORM_DESC_TECHNO_STAGE, false, "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addTextField("Nb &#233;tudiants", FOCreationPropositionStage::$CHAMP_FORM_NB_ETUDIANT_STAGE, true, true, "", "", "");
echo "</td></tr><tr><td width='50%' align='right'>";
$fb->addTextField("Indemnit&#233;(texte)", FOCreationPropositionStage::$CHAMP_FORM_INDEMNITE_STAGE, false, true, "", "", "");
echo "</td></tr></table>";

echo '<br/><center><input type="submit" value="Valider" />';
echo '<input type="reset" value="Annuler" /></center>';

$fb->endForm();

$javascriptTest="if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_ID_ENTREPRISE."\").value == \"Autre\") && (document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_RAISON_SOCIALE."\").value == '')){
                    alert('La <raison_sociale> est obligatoire !');
                    return false;
                 }
                 if((document.getElementById(\"".FOEntreprise::$CHAMP_FORM_TYPE_ENTREPRISE."\").value == \"Autre\") && (document.getElementById(\"".FOEntreprise::$CHAMP_FORM_AUTRE_TYPE_ENTREPRISE."\").value == '')){
                    alert('Le <type_entreprise> est obligatoire !');
                    return false;
                 }
                 if((document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE."\").value == \"Autre\") && (document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\").value == '')){
                      alert('Le <le_domaine_stage> est obligatoire !');
                      return false;
                 }
                 if((document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_TECHNO_STAGE."\").value == \"Autre\") && (document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value == '')){
                      alert('La <la_technologie_stage> est obligatoire !');
                      return false;
                 }
                 if((document.getElementById(\"".FOContactEntreprise::$CHAMP_FORM_NOM_CONTACT_ENTREPRISE."\").value !='') || (document.getElementById(\"".FOContactEntreprise::$CHAMP_FORM_PRENOM_CONTACT_ENTREPRISE."\").value != '')){
                   if((document.getElementById(\"".FOContactEntreprise::$CHAMP_FORM_FONCTION_CONTACT_ENTREPRISE."\").value == \"Autre\") && (document.getElementById(\"".FOContactEntreprise::$CHAMP_FORM_AUTRE_FONCTION_CONTACT_ENTREPRISE."\").value == '')){
                      alert('La <fonction_maitre_stage> est obligatoire !');
                      return false;
                   }
                 }
                 if((document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_NOM_MAITRE_STAGE."\").value !='') || (document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_PRENOM_MAITRE_STAGE."\").value != '')){
                   if((document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_NOM_MAITRE_STAGE."\").value == \"Autre\") && (document.getElementById(\"".FOMaitreStage::$CHAMP_FORM_NOM_MAITRE_STAGE."\").value == '')){
                      alert('La <fonction_contact> est obligatoire !');
                      return false;
                   }
                 }";
$fb->addAdditionnalJavascriptTest($javascriptTest);
$fb->generateXHTML();
?>

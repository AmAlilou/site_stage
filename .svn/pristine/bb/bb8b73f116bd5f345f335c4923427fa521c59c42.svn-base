<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

$value_AutreDomaineStage=isset($_GET[FOModificationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE])?$_GET[FOModificationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE]:"";
$value_AutreTechnoStage=isset($_GET[FOModificationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE])?$_GET[FOModificationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE]:"";


$javascript= "function updateAutreDomaineField(){\n"
            ."if((document.getElementById(\"".FOModificationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE."\").value != \"Autre\")){\n"
            //."if((document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE."\").value != '')){\n"
            ."\tsetHidden(\"div_".FOModificationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\");\n"
            ."\tdocument.getElementById(\"".FOModificationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\").value=\"\";}\n"
            ."else {setVisible(\"div_".FOModificationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\");\n";
            if($value_AutreDomaineStage!=NULL && $value_AutreDomaineStage!="")
            {
                $javascript=$javascript."\tdocument.getElementById(\"".FOModificationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\").value=\"".$value_AutreDomaineStage."\";}\n";
                $javascript=$javascript."}\n";
            }
            else
                $javascript=$javascript."}}\n";

            $javascript=$javascript."function updateAutreTechnoStage(){\n"
            ."if((document.getElementById(\"".FOModificationPropositionStage::$CHAMP_FORM_TECHNO_STAGE."\").value != \"Autre\")){\n"
            //."if((document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value != '')){\n"
            ."\tsetHidden(\"div_".FOModificationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\");\n"
            ."\tdocument.getElementById(\"".FOModificationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value=\"\";}\n"
            ."else {setVisible(\"div_".FOModificationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\");\n";
            if($value_AutreTechnoStage!=NULL && $value_AutreTechnoStage!="")
            {
                $javascript=$javascript."\tdocument.getElementById(\"".FOModificationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value=\"".$value_AutreTechnoStage."\";}\n";
                $javascript=$javascript."}\n";
            }
            else
                $javascript=$javascript."}}\n";
            
$javascriptOnLoad ="\tupdateAutreDomaineField();\n"
                  ."\tupdateAutreTechnoStage();\n";
            
XHTMLBuilder::getInstance()->addJavascript($javascript);
XHTMLBuilder::getInstance()->addOnLoadJavascript($javascriptOnLoad);



$fb = new FormBuilder("traitementFormModificationPropositionStage.php", "post");

echo "<h1>Formulaire de proposition de stage!</h1>";

$fb->beginForm();

if(isset($_GET["idProposition"]))
{


   $props = DBPropositionStage::getRecords($_GET['idProposition']);
   if(isset($props[0]))
   {
      echo XHTMLBuilder::getText("<center><h2>Modification de la proposition de stage</h2></center>");
      echo "<br/>";
      $fb->addHiddenField(FOModificationPropositionStage::$CHAMP_FORM_ID_PROPOSITION_STAGE,"", $props[0]->getIdPropositionStage());

      $fb->addTextField("Intitul&#233;", FOModificationPropositionStage::$CHAMP_FORM_INTITULE_STAGE, false, true, "", "", "",$props[0]->getIntitule());
      $fb->addTextareaField("Sujet", FOModificationPropositionStage::$CHAMP_FORM_SUJET_STAGE, false, "",$props[0]->getSujet());
      echo "<br/>";
      echo XHTMLBuilder::getText("<strong>Cr&#233;&#233;e le : </strong> ".$props[0]->getDateCreation());
      echo "<br/>";
      
      echo XHTMLBuilder::getText("<strong>Type de stage : </strong> <br/>");
      $concernes = DBConcerne::getRecords("",$props[0]->getIdPropositionStage());
      $listeTypeStage=array();
      $i=0;
      foreach ($concernes as $concerne)
      {
         $listeTypeStage[$i]=$concerne->getIdTypeStage();
         $i++;
      }

      $typesStage = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"));
      foreach($typesStage as $typeStage)
      {
             //on regarde si ce type de stage avait &#233;t&#233; s&#233;lectionn&#233; par l'enteprise
             if(in_array($typeStage->getIdTypeStage(),$listeTypeStage))
                 $fb->addCheckbox($typeStage->getLibelleTypeStage()." [Dates : " . $typeStage->getDateDebutTheorique()."-".$typeStage->getDateFinTheorique()."]", FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE."__".$typeStage->getIdTypeStage(), true);
             else
                 $fb->addCheckbox($typeStage->getLibelleTypeStage()." [Dates : " . $typeStage->getDateDebutTheorique()."-".$typeStage->getDateFinTheorique()."]", FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE."__".$typeStage->getIdTypeStage(), false);

             echo "<br/>";
      }
      if(DBConfig::inEnumeration("DOMAINE",$props[0]->getDomaine()))
      {
        $fb->addSelectMenuField("Domaine d'activit&#233;", FOModificationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE, true, DBConfig::getEnumeration("DOMAINE"),"Choisissez le domaine","",$props[0]->getDomaine(),"","onChange=\"updateAutreDomaineField();\"");
        $fb->addTextField("Autre domaine", FOModificationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE, false, true, "", "", "");
      }
      else
      {
        //$value_AutreDomaineStage=$props[0]->getDomaine();
        $fb->addSelectMenuField("Domaine d'activit&#233;", FOModificationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE, true, DBConfig::getEnumeration("DOMAINE"),"Choisissez le domaine","","Autre","","onChange=\"updateAutreDomaineField();\"");
        $fb->addTextField("Autre domaine", FOModificationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE, false, true, "", "","" ,$props[0]->getDomaine());

      }

      echo "<br/>";
      if(DBConfig::inEnumeration("TECHNOLOGIE",$props[0]->getTechno()))
      {
        $fb->addSelectMenuField("Technologies", FOModificationPropositionStage::$CHAMP_FORM_TECHNO_STAGE, true, DBConfig::getEnumeration("TECHNOLOGIE"),"Choisissez la technologie","",$props[0]->getTechno(),"","onChange=\"updateAutreTechnoStage();\"");
        $fb->addTextField("Autre technologie", FOModificationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE, false, true, "", "", "");
      }
      else
      {
        $fb->addSelectMenuField("Technologies", FOModificationPropositionStage::$CHAMP_FORM_TECHNO_STAGE, true, DBConfig::getEnumeration("TECHNOLOGIE"),"Choisissez la technologie","","Autre","","onChange=\"updateAutreTechnoStage();\"");
        $fb->addTextField("Autre technologie", FOModificationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE, false, true, "", "", "",$props[0]->getTechno());
      }

      echo "<br/>";
      $fb->addTextareaField("Description technologies", FOModificationPropositionStage::$CHAMP_FORM_DESC_TECHNO_STAGE, false, "",$props[0]->getDescTechnoProp());
      echo "<br/>";
      $fb->addDateField("Date Debut", FOModificationPropositionStage::$CHAMP_FORM_DATE_DEBUT_STAGE, true, "jj/mm/aaaa",$props[0]->getDateDebut());
      echo "<br/>";
      $fb->addDateField("Date Fin", FOModificationPropositionStage::$CHAMP_FORM_DATE_FIN_STAGE, true, "jj/mm/aaaa",$props[0]->getDateFin());
      echo "<br/>";
      $fb->addTextField("Nombre d'&#233;tudiants", FOModificationPropositionStage::$CHAMP_FORM_NB_ETUDIANT_STAGE, false, true, "", "", "",$props[0]->getNbEtudiantProp());
      echo "<br/>";
      $fb->addTextField("Indemnit&#233;s", FOModificationPropositionStage::$CHAMP_FORM_INDEMNITE_STAGE, false, true, "", "", "",$props[0]->getIndemniteProp());
      echo "<br/>";
      $fb->addTextField("Mail responsable", FOModificationPropositionStage::$CHAMP_FORM_EMAIL_RESP_PROP_STAGE, false, true, "", "", "",$props[0]->getMailResponsableProposition());
      echo "<br/>";
      $ents = DBEntreprise::getRecords($props[0]->getIdEntreprise());
      echo XHTMLBuilder::getText("<strong>Entreprise :</strong> <a href=\"#\" onclick=\"window.open('../popups/popUpEntreprise.php?idEntreprise=".$props[0]->getIdEntreprise()."','','menubar=no,toolbar=no,location=no,scrollbars=yes')\">".$ents[0]->getRaisonsocialeEntreprise()." (".$ents[0]->getVilleEntreprise() .")</a>"); 
      echo "<br/>";
      if($props[0]->getIdMaitreStage()!=-1)
      {
          $tuts = DBContactEtp::getRecords($props[0]->getIdMaitreStage());
          echo XHTMLBuilder::getText("<strong>Maitre de stage :</strong> <a href=\"#\" onclick=\"window.open('../popups/popUpContact.php?idContact=".$props[0]->getIdMaitreStage()."','','menubar=no,toolbar=no,location=no,scrollbars=yes')\">".$tuts[0]->getNomContact()." ".$tuts[0]->getPrenomContact() ."</a>"); 
          echo "<br/>";
      }
      if($props[0]->getIdContact()!=-1)
      {
        $conts = DBContactEtp::getRecords($props[0]->getIdContact());
        echo XHTMLBuilder::getText("<strong>Contact :</strong> <a href=\"#\" onclick=\"window.open('../popups/popUpContact.php?idContact=".$props[0]->getIdContact()."','','menubar=no,toolbar=no,location=no,scrollbars=yes')\">".$conts[0]->getNomContact()." ".$conts[0]->getPrenomContact() ."</a>");
      }
      echo '<br/><br/>';

      echo '<input type="submit" value="Valider" />';
      echo '<input type="reset" value="Annuler" />';


   }
   else
   {
     echo "Aucune proposition de stage trouv&#233;e";
   }
}


$javascriptTest="if((document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_DOMAINE_STAGE."\").value == \"Autre\") && (document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_DOMAINE_STAGE."\").value == '')){
                      alert('Le <le_domaine_stage> est obligatoire !');
                      return false;
                 }
                 if((document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_TECHNO_STAGE."\").value == \"Autre\") && (document.getElementById(\"".FOCreationPropositionStage::$CHAMP_FORM_AUTRE_TECHNO_STAGE."\").value == '')){
                      alert('La <la_technologie_stage> est obligatoire !');
                      return false;
                 }";
$fb->addAdditionnalJavascriptTest($javascriptTest);

$fb->endForm();

$fb->generateXHTML();
?>
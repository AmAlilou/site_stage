<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_ETUDIANT_LOGGED));

// ----- Fonction Precedente Suivante ----- //
function displayNextPreviousButtons($limite,$total,$nb) {
$limiteSuivante = $limite + $nb;
$limitePrecedente = $limite - $nb;
echo  '<br/><table><tr>'."\n";
if($limite != 0) {
        echo  '<td valign="top">'."\n";
        echo  '<form action="consultationOffrePDF.php" method="post">'."\n";
        echo  '<input type="submit" value="<< Pr&eacute;c&eacute;dent">'."\n";
        echo  '<input type="hidden" value="'.$limitePrecedente.'" name="limite">'."\n";
        echo  '</form>'."\n";
        echo  '</td>'."\n";
}
if($limiteSuivante < $total) {
        echo  '<td valign="top">'."\n";
        echo  '<form action="consultationOffrePDF.php" method="post">'."\n";
        echo  '<input type="submit" value="Suivant >>">'."\n";
        echo  '<input type="hidden" value="'.$limiteSuivante.'" name="limite">'."\n";
        echo  '</form>'."\n";
        echo  '</td>'."\n";
            
}
echo  '</tr></table>'."\n";
}

echo "<br/><h2>PDF envoy&#233s par les entreprises:</h2>";

// ----- Rechercher une proposition -----//
$promotion = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"),SessionManager::getEtudiant()->getMiageEtudiant());

//R�cup�ration des types de stage qui ne concernent pas l'�tudiant logu�
$promotionsNonConcernees = DBTypeStage::getNonConcernes(DBConfig::getConfigValue("ANNEE PROMO"),SessionManager::getEtudiant()->getMiageEtudiant());

echo "<fieldset>
  <legend>Recherche</legend>

    <form action=\"consultationOffrePDF.php\" method=\"post\" enctype=\"multipart/form-data\">
          <span><b>Mots cl&#233s :</b></span>
          <input type=\"text\" name=\"mots\" size=\"40\">
          <input type=\"hidden\" name=\"action\" value=\"recherche\" />
          <input type=\"submit\" value=\"Valider\">
  </form>
</fieldset>
<br />
<!-- Liste propositions -->
<fieldset>
  <legend>Liste des propositions</legend>
  <br />";

 // ---- variables ---- //
$nombre = 10;  // on va afficher 2 r�sultats par page.
if (!isset($_POST['limite'])) $limite = 0; else $limite=$_POST['limite']; // si on arrive sur la page pour la premi�re fois on met a 0.
  
// ----- Requete SQL de base pour compter le nombre de ligne a traiter ----- //
$sql_nbre = 'SELECT propositions.id_proposition_pdf, n_file, n_proposition, d_upload, nb_click, resume, mail_resp_prop_pdf, raisonsociale_entreprise,type_stage, ville_entreprise FROM propositions, entreprise WHERE entreprise.id_entreprise=propositions.id_entreprise and etat=\'validee\'';
$resultat_ligne =  mysql_query($sql_nbre) or die ('Erreur : '.mysql_error() );
$total_ligne = mysql_num_rows($resultat_ligne);

// ----- Requete SQL de base pour obtenir la liste des propositions disponibles ----- //
$sql = 'SELECT propositions.id_proposition_pdf, n_file, n_proposition, d_upload, nb_click, resume, mail_resp_prop_pdf, raisonsociale_entreprise,type_stage, ville_entreprise FROM propositions, entreprise WHERE entreprise.id_entreprise=propositions.id_entreprise and etat=\'validee\' ORDER BY propositions.d_upload desc limit '.$limite.','.$nombre;
$fin = "";

//------ Si une recherche non vide est demandee on change la requete sql-----//
if(isset($_REQUEST["action"]) && ($_REQUEST["action"]=="recherche") && ($_REQUEST["mots"]!="")){
$mots = addslashes($_REQUEST["mots"]);
echo "<span><b>R&#233sultat pour \"".stripslashes($mots)."\":</b></span><br/>";
$sql = "SELECT propositions.id_proposition_pdf, n_file, n_proposition, d_upload, nb_click, resume,mail_resp_prop_pdf, raisonsociale_entreprise,type_stage,ville_entreprise FROM propositions, entreprise WHERE entreprise.id_entreprise=propositions.id_entreprise AND etat='validee' AND (n_proposition like \"%$mots%\" OR resume like \"%$mots%\" OR raisonsociale_entreprise like \"%$mots%\") ORDER BY propositions.d_upload desc;";
$fin = "<br/><span><a href=\"consultationOffrePDF.php\"><b>Retour &#224 la liste compl&#232te.</b></a></span>";
$total_ligne=1; // on met total_ligne a 1 ce qui desactive l affichage limite a 20 par page. La requete sql n est pas non plus gere pour afficher un nombre defini de valeur.
}

// ----- On lance la requete sql et on recupere le nombre de ligne a afficher dans $total_ligne ----- //
$resultat =  mysql_query($sql) or die ('Erreur : '.mysql_error() );

// ----- On affiche les resultats de la requete ----- //
if ($total_ligne==0) echo "<span>Aucune proposition de disponible pour le moment.</span>";
else{
 echo "<table cellspacing=\"12\" border=\"0\">";
        echo "<tr>";
        echo "<td><b>Entreprise</b></td>";
        echo "<td><b>Proposition</b></td>";
		echo "<td><b>Lieu</b></td>";
        echo "<td><b>Mots cl&#233s</b></td>";
        echo "<td><b>Upload&#233 le</b></td>";
        echo "<td><b>Contact</b></td>";
        echo "<td><b>Type de stage</b></td>";
        echo "</tr>";
        while($propositions = mysql_fetch_array($resultat, MYSQL_ASSOC)){
                echo "<tr>";
                echo "<td>".$propositions['raisonsociale_entreprise']."</td>";
                echo "<td><a href=\"traitementPropositionsPdf.php?a=dl&f=".$propositions['n_file']."\" target=\"_blank\">".$propositions['n_proposition']."</a></td>";
				echo "<td>".$propositions['ville_entreprise']."</td>";
                echo "<td>".$propositions['resume']."</td>";
                echo "<td>".$propositions['d_upload']."</td>";
                echo "<td>".$propositions['mail_resp_prop_pdf']."</td>";
                echo "<td>".$propositions['type_stage']."</td>";                
                echo "</tr>";
        }
        echo "</table>";
		displayNextPreviousButtons($limite,$total_ligne,$nombre);
}
echo $fin;
?>
                   

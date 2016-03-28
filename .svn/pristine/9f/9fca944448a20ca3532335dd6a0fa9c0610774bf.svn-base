<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

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

echo "<br/><h2>PDF envoy&#233s par les entreprises:</h2>

<br />
<!-- Liste propositions -->
<fieldset>
  <legend>Liste des propositions</legend>
  <br />";

 // ---- variables ---- //
$nombre = 10;  // on va afficher 2 résultats par page.
if (!isset($_POST['limite'])) $limite = 0; else $limite=$_POST['limite']; // si on arrive sur la page pour la première fois on met a 0.
  
// ----- Requete SQL de base pour compter le nombre de ligne a traiter ----- //
$sql_nbre = 'SELECT propositions.id_proposition_pdf, n_file, n_proposition, nb_click, mail_resp_prop_pdf, raisonsociale_entreprise,type_stage, ville_entreprise,etat FROM propositions, entreprise WHERE entreprise.id_entreprise=propositions.id_entreprise and etat=\'En attente de validation\'';
$resultat_ligne =  mysql_query($sql_nbre) or die ('Erreur : '.mysql_error() );
$total_ligne = mysql_num_rows($resultat_ligne);

// ----- Requete SQL de base pour obtenir la liste des propositions disponibles ----- //
$sql = 'SELECT propositions.id_proposition_pdf, n_file, n_proposition, nb_click, mail_resp_prop_pdf, raisonsociale_entreprise,type_stage, ville_entreprise,etat FROM propositions, entreprise WHERE entreprise.id_entreprise=propositions.id_entreprise and etat=\'En attente de validation\' ORDER BY propositions.d_upload desc limit '.$limite.','.$nombre;
$fin = "";

//------ Si une recherche non vide est demandee on change la requete sql-----//
if(isset($_REQUEST["action"]) && ($_REQUEST["action"]=="recherche") && ($_REQUEST["mots"]!="")){
$mots = addslashes($_REQUEST["mots"]);
echo "<span><b>R&#233sultat pour \"".stripslashes($mots)."\":</b></span><br/>";
$sql = "SELECT propositions.id_proposition_pdf, n_file, n_proposition, nb_click,mail_resp_prop_pdf, raisonsociale_entreprise,type_stage,ville_entreprise,etat FROM propositions, entreprise WHERE entreprise.id_entreprise=propositions.id_entreprise AND etat='En attente de validation' AND (n_proposition like \"%$mots%\" OR resume like \"%$mots%\" OR raisonsociale_entreprise like \"%$mots%\") ORDER BY propositions.d_upload desc;";
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
        echo "<td><b>Contact</b></td>";
        echo "<td><b>Type de stage</b></td>";
		echo "<td><b>Etat</b></td>";
        echo "</tr>";
        while($propositions = mysql_fetch_array($resultat, MYSQL_ASSOC)){
				$key = $propositions['id_proposition_pdf'];
                echo "<tr>";
                echo "<td>".$propositions['raisonsociale_entreprise']."</td>";
                echo "<td><a href=\"../etudiant/traitementPropositionsPdf.php?a=dl&f=".$propositions['n_file']."\" target=\"_blank\">".$propositions['n_proposition']."</a></td>";
				echo "<td>".$propositions['ville_entreprise']."</td>";
                echo "<td>".$propositions['mail_resp_prop_pdf']."</td>";
                echo "<td>".$propositions['type_stage']."</td>";   
                echo "<td><td><a href=\"#\" onclick='if(confirm(\"Confirmez vous la validation?\"))document.location.href=\"validerPropStagePdf.php?idProposition=".$key."\"'>Valider</a><br/>".
            "<a href=\"formRefuserPropStagePdf.php?idProposition=". $key ."\">Refuser</a>
			</td>";			
                echo "</tr>";
        }
        echo "</table>";
		displayNextPreviousButtons($limite,$total_ligne,$nombre);
}
echo $fin;
?>
                   

<?php

$adresse = "./upload/"; //Adresse du dossier.
$dir = '' ;
if(isset($_GET['dir'])){
	if(strstr($_GET['dir'], '..') == '')
		$dir = $_GET['dir'] ;
}
	
if(isset($_GET['nom'])) //Si $_GET['nom'] existe, on supprime le fichier...
{
	if ($Fichier != "." && $Fichier != "..")
	{
		$nom = $adresse . $dir . '/' . $_GET['nom'].'';
		if (unlink($nom))
			echo 'Le fichier "'.$_GET['nom'].'" a &eacute;t&eacute; effac&eacute; !<br>';
		else
			echo 'Le fichier "'.$_GET['nom'].'"n\'a pas &eacute;t&eacute; effac&eacute; !<br>';
	}
}
$dossier = opendir($adresse); //Ouverture du dossier.
echo '<fieldset><legend>Liste des fichiers</legend><br />'; //Ouverture de fieldset
echo '<table width=\"100%\">
	<tr>
		<td width=\"50px\">' ;
// affichage des répertoires
while ($Fichier = readdir($dossier)) //Affichage...
{
	if ($Fichier != "." && $Fichier != ".." && substr($Fichier, 0, 1) != '.')
	{
		echo '<a href="?dir='.$Fichier.'">'.$Fichier.'</a><BR />';
	}
}
echo '		</td>
		<td>';
// affichage des fichiers
if($dir != ''){
	$dossier = opendir($adresse.$dir); //Ouverture du dossier.
	$vide = true ;
	while ($Fichier = readdir($dossier)) //Affichage...
	{
		$lefichier = $adresse . $dir . '/' . $Fichier ;
		if ($Fichier != "." && $Fichier != ".." && substr($Fichier, 0, 1) != '.' && is_file($lefichier))
		{
			$vide = false ;
			echo '<a href="' . $lefichier . '">' . $Fichier . '</a> ';
			echo '<a href="?nom=' . $Fichier.'&dir=' . $dir . '">
			<img src="../image/b_drop.png" title="Supprimer" ></a><BR />';
		}
	}
	if ($vide)
		echo 'Le r&#233;pertoire est vide' ;
} else 
	echo 'Veuillez s&#233;lectionner un r&#233;pertoire' ;
echo '		</td>
	</tr>
</table>' ;
//(Fieldset permet de faire des cadres avec légende intégrée en haut a gauche.
//C'est très simple à utiliser et ça permet de répartir les formulaires en plusieurs parties et donc d'accroître leur lisibilité !).
closedir($dossier); //Fermeture du dossier.
echo '<br /></fieldset>'; //Fermeture du fieldset.

?>
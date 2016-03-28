<?php
	set_include_path(".".PATH_SEPARATOR."..");
	require_once("inc/main.inc.php");

	
	echo 'Statut actif : '.DBEnseignant::$STATUT_ENSEIGNANT_ACTIF ;
	echo '<br>Statut passif : '.DBEnseignant::$STATUT_ENSEIGNANT_PASSIF ;
	
	echo utf8_encode('<br>Test de la méthode getRecords sans paramètre : ') ;
	if(is_array(DBEnseignant::getRecords()))
		echo 'OK' ;
	else 
		echo 'KO' ;
	
	echo utf8_encode('<br>Test de la méthode getRecords (récupération prof M Pecher) : ') ;
	$pecher = DBEnseignant::getRecords(null, 'M Pecher') ;
	print_r($pecher) ;
	
	echo utf8_encode('<br>Test de la méthode getRecords (récupération profs actif) : ') ;
	if(is_array(DBEnseignant::getRecords(null, null, null, null, null, null, null, 'actif')))
		echo 'OK' ;
	else 
		echo 'KO' ;
		
	echo utf8_encode('<br>Test de la méthode getStatutEnseignant : ') ;
	echo $pecher[0]->getStatutEnseignant() ;
	
	echo utf8_encode('<br>Test de la méthode createRecord nomTest, prenomTest, mailTest, loginTest, 666, null, passif: ') ;
	$ensAdd = DBEnseignant::createRecord('nomTest', 'prenomTest', 'mailTest', 'loginTest', 666, null, DBEnseignant::$STATUT_ENSEIGNANT_PASSIF) ;
	print_r($ensAdd) ;
	
	echo utf8_encode('<br>Test de la méthode updateRecord sur la ligne juste ajouté loginTest => loginTestModif, ajout de la date, passage en statut actif: ') ;
	$ensAdd->updateRecord('nomTest', 'prenomTest', 'mailTest', 'loginTestModif', 666, time(), DBEnseignant::$STATUT_ENSEIGNANT_ACTIF) ;
	print_r($ensAdd) ;
	
	
	$ensAdd->deleteRecord() ;
	
	
?>
<?php
set_include_path(".".PATH_SEPARATOR."..");
$SKIP_OB_START=true;
require_once("inc/main.inc.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_SOMEBODY_LOGGED));


if(isset($_GET["idProposition"])) {
	$idProp = $_GET['idProposition'] ;
	$props = DBPropositionStage::getRecords($idProp);
   
	if(isset($props[0])) {
	
		//Action si on a cliqué sur le lien candidature
		if(isset($_GET['candidature'])) {
			$props[0]->incrementeNbCandidature() ;
			$props[0]->updatePropositionAvecAttr() ;
		}
		//Action si on a cliqué sur le lien fiche
		elseif(isset($_GET['fiche'])) {
			$props[0]->incrementeNbFiche() ;
			$props[0]->setEtatProposition('Pourvue') ;
			$props[0]->updatePropositionAvecAttr() ;
		}
		//Action si on a cliqué sur le lien Non_Pourvue
		elseif(isset($_GET['etat'])) {
			$props[0]->setEtatProposition('Validee') ;
			$props[0]->updatePropositionAvecAttr() ;
		}
	    echo XHTMLBuilder::getText("<center><h2>Visualisation de la proposition de stage</h2></center>");
	    echo "<br />";
		
		//La fonction est à la fin de ce fichier
		echo affLien($props[0]) ;
		echo "<br /><br />";
		
	    echo XHTMLBuilder::getText("<strong>Intitulé :</strong>".$props[0]->getIntitule());
		echo "<br />";
	    echo XHTMLBuilder::getText("<strong>Sujet :</strong> <br />".Displayer::text($props[0]->getSujet()));
	    echo "<br />";
	    echo XHTMLBuilder::getText("<strong>Créée le : </strong> ".$props[0]->getDateCreation());
	    echo "<br />";
	      
	    echo XHTMLBuilder::getText("<strong>Type de stage : </strong>");
	    $concernes = DBConcerne::getRecords("",$props[0]->getIdPropositionStage());
	   
		foreach ($concernes as $concerne) {
			$types = DBTypeStage::getRecords($concerne->getIdTypeStage());
			echo $types[0]->getLibelleTypeStage()." (".$types[0]->getMiage().")<br />";
		}
			
	    echo XHTMLBuilder::getText("<strong>Domaine d'activité :</strong> ".$props[0]->getDomaine());
	    echo "<br />";
	    echo XHTMLBuilder::getText("<strong>Technologies :</strong> ".$props[0]->getTechno());
	    echo "<br />";
	    echo XHTMLBuilder::getText("<strong> Description technologies :</strong> ".Displayer::text($props[0]->getDescTechnoProp()));
	    echo "<br />";
	    echo XHTMLBuilder::getText("<strong>Date Début :</strong> ".$props[0]->getDateDebut());
	    echo "<br />";
	    echo XHTMLBuilder::getText("<strong>Date Fin :</strong> ".$props[0]->getDateFin());
	    echo "<br />";
	    echo XHTMLBuilder::getText("<strong>Nombre d'étudiants :</strong> ".$props[0]->getNbEtudiantProp());
	    echo "<br />";
	    echo XHTMLBuilder::getText("<strong>Indemnités :</strong> ".$props[0]->getIndemniteProp());
	    echo "<br />";
	    echo XHTMLBuilder::getText("<strong>Mail responsable :</strong> ".$props[0]->getMailResponsableProposition());
	    echo "<br />";
	    $ents = DBEntreprise::getRecords($props[0]->getIdEntreprise());
	    echo XHTMLBuilder::getText('<strong>Entreprise :</strong> <a href="../popups/popUpEntreprise.php?idEntreprise='.$props[0]->getIdEntreprise().'" target="blank">'.$ents[0]->getRaisonsocialeEntreprise().'</a>'); 
	    echo "<br />";
	    $tuts = DBContactEtp::getRecords($props[0]->getIdMaitreStage());
	    if(isset($tuts[0]))
	        echo XHTMLBuilder::getText('<strong>Maitre de stage :</strong> <a href="../popups/popUpContact.php?idContact='.$props[0]->getIdMaitreStage().'" target="blank">'.$tuts[0]->getNomContact().' '.$tuts[0]->getPrenomContact() .'</a>'); 
	    else
	        echo XHTMLBuilder::getText("<strong>Maitre de stage : </strong> aucun");
		
		echo "<br />";
	     
	    $conts = DBContactEtp::getRecords($props[0]->getIdContact());
	    if(isset($conts[0]))
	        echo XHTMLBuilder::getText('<strong>Contact :</strong> <a href="../popups/popUpContact.php?idContact='.$props[0]->getIdContact().'" target="blank">'.$conts[0]->getNomContact().' '.$conts[0]->getPrenomContact().'</a>'); 
	    else
	        echo XHTMLBuilder::getText("<strong>Contact : </strong> aucun");
	      
	    echo "<br />";
	      
	    if(($props[0]->getMotifRefus() != "") && (SessionManager::isAdminLogged()))
	        echo XHTMLBuilder::getText("<strong>Motif de refus :</strong><br />".Displayer::text($props[0]->getMotifRefus())); 
		
		echo '<br /><br />' ;
		echo affLien($props[0]) ;
	}
	else {
		echo "Aucune fiche de stage trouvée";
	}
}

//Cette fonction permet d'afficher des liens pour l'étudiant (il dit qu'il à déjà ou va répondre à la proposition) ou pour l'admin qui précise que cette proposition fait déjà l'objet d'une fiche de stage
function affLien($prop) {

	//Si la proposition n'est pas refusée, que c'est un admin qui est connecté et qu'il ne vient pas de cliquer sur le lien fiche
	if(($prop->getMotifRefus() == "") && (SessionManager::isAdminLogged()) && (!isset($_GET['fiche']))) {	
		//Affichage du lien pour dire que cette proposition fait déjà l'objet d'une fiche de stage
		return XHTMLBuilder::getText('<a href="?idProposition='.$prop->getIdPropositionStage().'&fiche=1">Cette proposition fait l\'objet d\'une fiche de stage?</a>') ;
	}
	// Si l'etat actuel de la proposition est à Pourvue		
	if(($prop->getEtat() == "Pourvue") && (SessionManager::isAdminLogged()) && (!isset($_GET['etat']))) {
		//Affichage du lien pour dire que cette proposition fait déjà l'objet d'une fiche de stage
		return XHTMLBuilder::getText('<a href="?idProposition='.$prop->getIdPropositionStage().'&etat=1">Cette proposition n\'est pas pourvue !</a>') ;
	}
	//Si c'est un étudiant qui visionne la proposition et qu'il ne vient pas de cliquer sur le lien candidature
	elseif(SessionManager::isEtudiantLogged() && (!isset($_GET['candidature']))) {
		//Affichage du lien pour la candidature potentielle de l'étudiant
		return XHTMLBuilder::getText('<a href="?idProposition='.$prop->getIdPropositionStage().'&candidature=1">Avez vous ou allez vous envoyer votre candidature?</a>') ;
	}
}

?>
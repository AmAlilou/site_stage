<?php
set_include_path(".".PATH_SEPARATOR."..");
$SKIP_OB_START=true;
require_once("inc/main.inc.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_SOMEBODY_LOGGED));


if(isset($_GET["idStage"])) {
	$fiches = DBFicheStage::getRecords($_GET['idStage']);
	if(isset($fiches[0])) {
		echo XHTMLBuilder::getText("<center><h2>Visualisation du sujet de stage </h2> </center>");
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Etudiant :</strong> <a href=\"#\" onclick=\"window.open('../popups/popUpEtudiant.php?idEtudiant=".$fiches[0]->getIdEtudiant()."','','menubar=no,toolbar=no,location=no,scrollbars=yes')\">".$fiches[0]->getPrenomEtudiant()." ".$fiches[0]->getNomEtudiant() ."</a>"); 
	    echo "<br/>";
	    echo XHTMLBuilder::getText("<strong>Intitulé :</strong>".$fiches[0]->getIntituleStage());
	    echo "<br/>";
	    echo XHTMLBuilder::getText("<strong>Sujet de stage :</strong> <br/>".$fiches[0]->getSujetStage());
	    echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Domaine d'activité :</strong> ".$fiches[0]->getDomaineStage());
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Technologies :</strong> ".$fiches[0]->getTechnoStage());
		echo "<br/>";
		echo "-----------------------------------------------";
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Entreprise :</strong> <a href=\"#\" onclick=\"window.open('../popups/popUpEntreprise.php?idEntreprise=".$fiches[0]->getIdEntreprise()."','','menubar=no,toolbar=no,location=no,scrollbars=yes')\">".$fiches[0]->getRaisonSocialeEntreprise()."</a>"); 
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Maitre Stage :</strong> <a href=\"#\" onclick=\"window.open('../popups/popUpContact.php?idContact=".$fiches[0]->getIdMaitreStage()."','','menubar=no,toolbar=no,location=no,scrollbars=yes')\">".$fiches[0]->getNomMaitreStage()."</a>"); 
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Signataire :</strong> <a href=\"#\" onclick=\"window.open('../popups/popUpContact.php?typeContact=signataire&idContact=".$fiches[0]->getIdSignataireStage()."','','menubar=no,toolbar=no,location=no,scrollbars=yes')\">".$fiches[0]->getNomSignataireStage()."</a>");  
     
	}
	else {
		echo "Aucune fiche de stage trouvée";
	}
}

?>
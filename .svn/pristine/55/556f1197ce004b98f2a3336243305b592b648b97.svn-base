<?php
set_include_path(".".PATH_SEPARATOR."..");
$SKIP_OB_START=true;
require_once("inc/main.inc.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_SOMEBODY_LOGGED));


if(isset($_GET["idEtudiant"])) {
	$etus= DBEtudiant::getRecords($_GET['idEtudiant']);
	if(isset($etus[0])) {
		echo XHTMLBuilder::getText("<center><h2>Visualisation des informations de l'étudiant ".$etus[0]->getPrenomEtudiant()." ".$etus[0]->getNomEtudiant()."</h2></center>");
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Coordonnées stage :</strong> <br/>");
		echo XHTMLBuilder::getText($etus[0]->getAdressestageEtudiant());
		echo "<br/>";
		echo XHTMLBuilder::getText($etus[0]->getCpstageEtudiant());
		echo XHTMLBuilder::getText(" ".$etus[0]->getVillestageEtudiant());
		echo "<br/>";
		echo XHTMLBuilder::getText("mail :".$etus[0]->getMailstageEtudiant());
		echo "<br/>";
		echo XHTMLBuilder::getText("tel :".$etus[0]->getTelstageEtudiant());
      
		echo "<p/>";
		echo XHTMLBuilder::getText("<strong>Coordonnées fac :</strong> <br/>");
		echo XHTMLBuilder::getText($etus[0]->getAdressefacEtudiant());
		echo "<br/>";
		echo XHTMLBuilder::getText($etus[0]->getCpfacEtudiant());
		echo XHTMLBuilder::getText(" ".$etus[0]->getVillefacEtudiant());
		echo "<br/>";
		echo XHTMLBuilder::getText("mail :".$etus[0]->getMailfacEtudiant());

		echo "<p/>";
		echo XHTMLBuilder::getText("<strong>Coordonnées stables :</strong> <br/>");
		echo XHTMLBuilder::getText($etus[0]->getAdressestableEtudiant());
		echo "<br/>";
		echo XHTMLBuilder::getText($etus[0]->getCpstableEtudiant());
		echo XHTMLBuilder::getText(" ".$etus[0]->getVillestableEtudiant());
		echo "<br/>";
		echo XHTMLBuilder::getText("mail :".$etus[0]->getMailstableEtudiant());

		if (SessionManager::isAdminLogged()) {
			echo "<br/>";
			echo XHTMLBuilder::getText("derniere connexion :".$etus[0]->getDateDerniereConnexion());
			echo "<br/>";
			echo XHTMLBuilder::getText("derniere connexion :".$etus[0]->getDateDerniereRecuperationPass());
		}
      
	}
	else {
		echo "Aucun étudiant trouvé";
	}
}

?>
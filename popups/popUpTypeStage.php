<?php
set_include_path(".".PATH_SEPARATOR."..");
$SKIP_OB_START=true;
require_once("inc/main.inc.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_SOMEBODY_LOGGED));


if(isset($_GET["idTypeStage"])) {
	$types = DBTypeStage::getRecords($_GET['idTypeStage']);
	if(isset($types[0])) {
		echo XHTMLBuilder::getText("<center><h2>Visualisation du type de stage".$types[0]->getLibelleTypeStage()."</h2></center>");
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Date début théorique :</strong>".$types[0]->getDateDebutTheorique());
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Date fin théorique :</strong> ".$types[0]->getDateFinTheorique());
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Date Rapport :</strong> ".$types[0]->getDateRapport());
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Date Soutenance 1 :</strong> ".$types[0]->getDateSoutenance1());
		echo "<br/>";
		echo XHTMLBuilder::getText("<strong>Date Soutenance 2 :</strong> ".$types[0]->getDateSoutenance2());
	}
	else {
		echo "Aucune fiche de stage trouvée";
	}
}

?>
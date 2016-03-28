<?php
set_include_path(".".PATH_SEPARATOR."..");
$SKIP_OB_START=true;
require_once("inc/main.inc.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_SOMEBODY_LOGGED));


if(isset($_GET["idEntreprise"]))
{
   $ents = DBEntreprise::getRecords($_GET['idEntreprise']);
   if(isset($ents[0]))
   {
      echo XHTMLBuilder::getText("<center><h2>Visualisation de l'entreprise ".$ents[0]->getRaisonsocialeEntreprise()."</h2></center>");
      echo XHTMLBuilder::getText("<strong>Type :</strong>".$ents[0]->getTypeEntreprise());
       echo "<br/>";
      echo XHTMLBuilder::getText("<strong>Site :</strong>".$ents[0]->getUrlSiteEntreprise());
      echo "<br/> <strong>Adresse :</strong><br/> ";
      echo XHTMLBuilder::getText($ents[0]->getAdresseEntreprise());
      echo XHTMLBuilder::getText("<br/>".$ents[0]->getCodePostalEntreprise());
      echo XHTMLBuilder::getText(" ".$ents[0]->getVilleEntreprise());
      echo "<br/>";
      echo XHTMLBuilder::getText("<strong>Tel :</strong> ".$ents[0]->getTelEntreprise());
      echo XHTMLBuilder::getText("<br/> <strong>Fax :</strong>".$ents[0]->getFaxEntreprise());
       echo XHTMLBuilder::getText("<br/> <strong>Responsable Taxe Apprentissage :</strong>".$ents[0]->getNomRespTaxeApprentissage());
   }
   else
   {
     echo "Aucune entreprise trouvée";
   }
}


?>



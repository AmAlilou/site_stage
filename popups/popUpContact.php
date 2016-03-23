<?php
set_include_path(".".PATH_SEPARATOR."..");
$SKIP_OB_START=true;
require_once("inc/main.inc.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_SOMEBODY_LOGGED));


if(isset($_GET["idContact"]))
{
   $maitres = DBContactEtp::getRecords($_GET['idContact']);
   if(isset($maitres[0]))
   {
      echo XHTMLBuilder::getText("<center><h2>Visualisation des infos du contact ".$maitres[0]->getPrenomContact()." ".$maitres[0]->getNomContact()."</h2></center>");
      echo "<br/>";
      echo XHTMLBuilder::getText("<strong>Mail :</strong> ".$maitres[0]->getEmailContact());
      echo "<br/>";
      echo XHTMLBuilder::getText("<strong>Tel:</strong> ".$maitres[0]->getTelContact());
      echo "<br/>";
      echo XHTMLBuilder::getText("<strong>Fonction :</strong> ".$maitres[0]->getFonctionContact());
   
   }
   else
   {
     echo "Aucun maitre de stage trouvé";
   }
}


?>
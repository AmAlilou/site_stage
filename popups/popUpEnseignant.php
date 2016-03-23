<?php
set_include_path(".".PATH_SEPARATOR."..");
$SKIP_OB_START=true;
require_once("inc/main.inc.php");

PagePermission::verifyPagePermission( new PagePermission(PagePermission:: $CONSTRAINT_SOMEBODY_LOGGED));


if(isset($_GET["idEnseignant"]))
{
   $ens = DBEnseignant::getRecords($_GET['idEnseignant']);
   if(isset($ens[0]))
   {
      echo XHTMLBuilder::getText("<center><h2>Visualisation des infos de l'enseignant ".$ens[0]->getPrenomEnseignant()." ".$ens[0]->getNomEnseignant()."</h2></center>");
      echo "<br/>";
      echo XHTMLBuilder::getText("<strong>Mail :</strong> ".$ens[0]->getMailEnseignant());
   
   }
   else
   {
     echo "Aucun maitre de stage trouvé";
   }
}


?>
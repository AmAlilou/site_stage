<?php
set_include_path(".");
require_once("inc/main.inc.php");

$TRIS_POSSIBLES = array(
"libelle" => '$a->getLibelleTypeStage()',
"miage" => '$a->getPromoStage()',
"dateDeb" => '$a->getDateDebutTheorique()',
"dateFin" => '$a->getDateFinTheorique()', 
"dateRapport" => '$a->getDateRapport()',
"dateSout1" => '$a->getDateSoutenance1()', 
"dateSout2" => '$a->getDateSoutenance2()',
"duree" => '$a->getDureeSoutenance()'
);

$promo = DBConfig::getConfigValue("ANNEE PROMO");
echo "<h1>Les stages de $promo - ".($promo+1)."</h1>\n";

$types = DBTypeStage::getRecords("","",$promo);
if((isset($_GET['OrderBy'])) && (array_key_exists($_GET['OrderBy'], $TRIS_POSSIBLES)))
    $types = Enumeration::sort($types, $TRIS_POSSIBLES[$_GET['OrderBy']]);

echo" <table border='1' width='98%'>
<tr> 
<th align='center'> <a href='stages.php?OrderBy=libelle'>Libelle</a></th>
<th align='center'> <a href='stages.php?OrderBy=miage'>Miage</a></th>
<th align='center'> Date Debut</th>  
<th align='center'> Date Fin</th> 
<th align='center'> Date rapport</th>
<th align='center'> Date soutenance 1</th>
<th align='center'> Date soutenance 2</th>
<th align='center'> <a href='stages.php?OrderBy=duree'>Duree soutenance (min)</a></th>
</tr>";

foreach ($types as $type)
{
   echo "<tr> 
   <td>". $type->getLibelleTypeStage() ."</td> 
   <td>". $type->getMiage() ."</td> 
   <td>". $type->getDateDebutTheorique() ."</td> 
   <td>". $type->getDateFinTheorique() ."</td> 
   <td>". $type->getDateRapport() ."</td> 
   <td>". $type->getDateSoutenance1() ."</td> 
   <td>". $type->getDateSoutenance2() ."</td> 
   <td>". $type->getDureeSoutenance() ."</td> 
   </tr>";
}
echo "</table> <br/>"; 

?>
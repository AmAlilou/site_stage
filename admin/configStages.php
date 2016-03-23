<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ADMIN_LOGGED));

echo "<table><tr><td width = '20%'>";
echo "<a href='configContacts.php'>Contacts</a>";
echo "</td><td  width = '20%'>";
echo "<a href='configStages.php'>Stages</a>";
echo "</td><td  width = '20%'>";
echo "<a href='configEnumerations.php'>Enumerations</a>";
echo "</td><td  width = '20%'>";
echo "<a href='configSite.php'>Site</a>";
echo "</td></tr></table>";
echo "<hr/><br/>";
echo "<center><h2>Gestion des types de stage</h2></center>";

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

$types = DBTypeStage::getRecords("","",DBConfig::getConfigValue("ANNEE PROMO"));
if((isset($_GET['OrderBy'])) && (array_key_exists($_GET['OrderBy'], $TRIS_POSSIBLES)))
    $types = Enumeration::sort($types, $TRIS_POSSIBLES[$_GET['OrderBy']]);

echo" <table border='1' width='98%'>
<tr> 
<th width='15%' align='center'> <a href='configStages.php?id_type_stage=&OrderBy=libelle'>Libelle</a></th>
<th width='5%' align='center'> <a href='configStages.php?id_type_stage=&OrderBy=miage'>Miage</a></th>
<th width='15%' align='center'> Date Debut</th>  
<th width='15%' align='center'> Date Fin</th> 
<th width='15%' align='center'> Date rapport</th>
<th width='15%' align='center'> Date soutenance 1</th>
<th width='15%' align='center'> Date soutenance 2</th>
<th width='10%' align='center'> <a href='configStages.php?id_type_stage=&OrderBy=duree'>Duree</a></th>
<th width='10%' align='center'> Actions </th>
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
   <td><a href='formModifierTypeStage.php?id_type_stage=".$type->getIdTypeStage()."'>modifier</a> <br/>
   <a href='formSupprimerTypeStage.php?id_type_stage=".$type->getIdTypeStage()."'>supprimer</a></td> 
   </tr>";
}
echo "</table> <br/>"; 


echo "<a href='formCreerTypeStage.php'>Cr&#233;er un type de stage</a>";

?>
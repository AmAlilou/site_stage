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

echo "
<div>&nbsp;</div>
<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
    
        <tr>
            <td valign=\"top\">
            <div style=\"float:right;margin-left:5px;\"></div><h1><center>Soutenance de stage</center></h1>
            <p>&nbsp;</p>
            <p>Informations et conseils : </p>

            <p>&nbsp;</p>
            <div>
            <ul>
                <li>Dur&eacute;e de la soutenance : 20 minutes + 5 minutes consacr&eacute;es aux &eacute;ventuelles questions </li>
                <li>Nombre de transparents conseill&eacute;s : 12 &agrave; 15 maximum. </li>

                <li>Cette dur&eacute;e assez courte n&eacute;cessite une bonne gestion du temps. N'h&eacute;sitez pas &agrave; faire quelques r&eacute;p&eacute;titions orales, cela vous permettra, entres autres, de cadrer votre timing. </li>
                <li>Vous disposez d'un vid&eacute;o-projecteur, utilisez-le pour donner rythme et dynamisme &agrave; votre expos&eacute;. Cependant pr&eacute;voyez &agrave; la fois une pr&eacute;sentation powerpoint et des transparents pour palier tout al&eacute;a. </li>

                <li>En terme de pr&eacute;sentation, r&eacute;digez vos transparents, en vous rappelant qu'ils sont l&agrave; pour appuyer et illustrer votre discours, mais ne constituent en aucune mani&egrave;re des aides m&eacute;moires : on n'y trouvera pas de phrase construite, citations mises &agrave; part. </li>
                <li>Attention le point pr&eacute;c&eacute;dent est une erreur courante...</li>
                <li>En terme de contenu, la pr&eacute;sentation orale doit reprendre les points essentiels de votre rapport de stage, en particulier la probl&eacute;matique de votre projet et vos diff&eacute;rentes conclusions. Pour pr&eacute;parer votre soutenance, d&eacute;gagez quelques th&egrave;mes int&eacute;ressants issus de votre carnet de bord et accordez-leur un temps de pr&eacute;sentation en fonction de leur importance. Construisez ensuite votre plan. </li>

                <li>Et surtout vous veillerez absolument &agrave; ne pas lire vos transparents ou de quelconques notes. Cela appauvrit votre prestation... voire elle deviendra tr&eacute;s vite ennuyeuse !! </li>
                <li>N'oubliez pas de faire un plan.. et de le pr&eacute;senter </li>
                <li>Montrez ce que vous avez fait.. et notamment un planning </li>
            </ul>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;Soutenances</p>
            <p>Toutes les soutenances ont lieu dans le b&acirc;timent A29<br />
            </p>";
			$types = DBTypeStage::getRecords("","",$promo);
			if((isset($_GET['OrderBy'])) && (array_key_exists($_GET['OrderBy'], $TRIS_POSSIBLES)))
			$types = Enumeration::sort($types, $TRIS_POSSIBLES[$_GET['OrderBy']]);
			$date_rapp = "";
			foreach ($types as $type)
			{	
				echo "
				<p>Les soutenances se d&eacute;rouleront entre le ".$type->getDateSoutenance1()." et le ".$type->getDateSoutenance2() ." pour les ". $type->getMiage().".</p>
				";
				if ($type->getMiage() == "M2")
				{
					$date_rapport = $type->getDateRapport();
				}
			}
			echo "
            <p>Les dates pr&eacute;cises sont disponibles dans votre espace personnel.</p>
            <p>Vous n'&ecirc;tes pas oblig&eacute; d'assister &agrave; toutes les soutenances. Par contre vous pouvez assister notamment aux soutenances de vos demi- journ&eacute;es, les soutenances &eacute;tant ouvertes aux publics sauf confidentialit&eacute; demand&eacute;e par l'entreprise.</p>

            <br />
            <p>La date de remise du rapport pour les M2 est fix&eacute;e au ".$date_rapport. " matin au secr&eacute;tariat de la Miage<br />
            </p>
            <p><strong><font color=\"#ffff00\"></font></strong></p>
            </td>
        </tr>

    
</table>
<div>
<div>&nbsp;</div>
</div>

";
?>
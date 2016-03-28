<?php

set_include_path(".");
require_once("inc/main.inc.php");
?>
<h1>Migration de l'ancienne base vers la nouvelle</h1>
Vérifiez bien que :
<ul>
  <li>Vous avez bien renseigné le inc/config.inc.php avec les données de cette arborescence</li>
  <li>Vous avez bien spécifié les "coordonnées" des deux bases de données (source et destination) dans le inc/dbconfig.inc.php</li>
  <li>Votre base de destination est "saine" (c'est à dire qu'a part les enregistrements "statiques", il n'y a aucun enregistrement dans la base de destination)</li>
  <li><strong>IMPORTANT :</strong>Vous avez changé l'interclassement en utf8 de la base source (cliquer sur le nom de la base, faire opération, et changer l'interclassement en 'utf8_unicode_ci')</li>
</ul>
<button onclick="window.location.href='migration.php';">Migrer la base de données</button>

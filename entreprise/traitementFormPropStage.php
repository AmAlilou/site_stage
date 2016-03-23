<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

$pfm = new PostFormManager(array(
                                    new FOEntreprise(),
                                    new FOMaitreStage(),
                                    new FOContactEntreprise(),
                                    new FOCreationPropositionStage(),
                                    new FOConcerne()
                                ));
echo $pfm->manageAndGenerateContent();
?>
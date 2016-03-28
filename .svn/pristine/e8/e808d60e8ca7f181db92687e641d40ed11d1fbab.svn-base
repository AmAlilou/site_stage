<?php
set_include_path(".");
require_once("inc/main.inc.php");

if(isset($_GET['idEtudiant'])){
    $etudiants = DBEtudiant::getRecords($_GET['idEtudiant'], "", "", "", "", "", "", "", DBConfig::getConfigValue("ANNEE PROMO"));
    if(count($etudiants) == 0)
        echo "Erreur : Etudiant inconnu !";
    else{
        $etd = $etudiants[0];
        $erreur = $etd->sendPass();
        if($erreur == ""){
            echo XHTMLBuilder::getText("Mot de passe envoyé avec succès !");
        } else {
            echo XHTMLBuilder::getText($erreur);
        }
    }
    echo "<br/>";
}

if(isset($_GET['idEnseignant'])){
    $enseignants = DBEnseignant::getRecords($_GET['idEnseignant']);
    if(count($enseignants) == 0)
        echo "Erreur : Enseignant inconnu !";
    else{
        $ens = $enseignants[0];
        $erreur = $ens->sendPass();
        if($erreur == ""){
            echo XHTMLBuilder::getText("Mot de passe envoyé avec succès !");
        } else {
            echo XHTMLBuilder::getText($erreur);
        }
    }
    echo "<br/>";
}
?>
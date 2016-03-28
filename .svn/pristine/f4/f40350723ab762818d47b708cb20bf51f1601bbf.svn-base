<?php
set_include_path(".");
require_once("inc/main.inc.php");

// Fonction qui sera appelé sur chaque champs texte lors de la migration
// Permet de centraliser ici les traitements à appliquer a un champ texte (suppression des \ notamment !)
function traitementText($txt){
    return stripslashes($txt);
}


// On sait qu'on va devoir faire plein de requêtes ... donc on "active" la persistance
DBConnector::getDBConnector()->forceConnexionPersistance(true);
DBConnector::getDBConnectorSource()->forceConnexionPersistance(true);
?>
<h1>Migration des données ...</h1>

<strong>Paramètres de configuration ...
<?php
$paramsPersonne = DBOLDParamPersonne::getRecords();
$paramsPersonne = $paramsPersonne[0];
DBConfig::updateRecord("MAIL ADMINISTRATEURS", $paramsPersonne->getEmail());
DBConfig::updateRecord("LOGIN ADMIN", $paramsPersonne->getLogin());
DBConfig::updateRecord("PASSWORD ADMIN", md5($paramsPersonne->getPassword()));
echo "OK</strong><br/>\n";
?>



<strong>Enseignants ...
<?php
$oldEnseignants = DBOLDEnseignant::getRecords();
$ensMigres = 0;
$correspondanceEnseignant = array();
foreach($oldEnseignants as $ens){
    
    $ensAjoute = DBEnseignant::createRecord(
                                traitementText($ens->getNom()),
                                traitementText($ens->getPrenom()),
                                $ens->getEmail(),
                                $ens->getLogin(),
                                $ens->getPassword(),
                                "" // Date de derniere demande de mot de passe
                            );
    $ensMigres += (($ensAjoute == null)?0:1);
    $correspondanceEnseignant[$ens->getId()] = $ensAjoute;
}
echo "OK</strong> -> migrés : $ensMigres / ".count($oldEnseignants)."<br/>\n";
?>



<strong>Etudiants ...
<?php
$oldEtudiants = DBOLDEtudiant::getRecords();
$etdMigres = 0;
$correspondanceEtudiant = array();
$correspondanceEtudiantDonnees = array();
foreach($oldEtudiants as $etd){

    $adresseFac = "";
    $codePostalFac = "";
    $villeFac = "";
    $adresseStable = "";
    $codePostalStable = "";
    $villeStable = "";
    $adresseStage = "";
    $codePostalStage = "";
    $villeStage = "";
    $telStage = "";

    $etdDonnee = $etd->getEtudiantDonnees();
    
    if($etdDonnee != null){
        $adresse = extractAdresseCodePVilleFrom($etdDonnee->getAdresseFac());
        $adresseFac = $adresse[0];
        $codePostalFac = $adresse[1];
        $villeFac = $adresse[2];
        unset($adresse);
        
        $adresse = extractAdresseCodePVilleFrom($etdDonnee->getAdresseStable());
        $adresseStable = $adresse[0];
        $codePostalStable = $adresse[1];
        $villeStable = $adresse[2];
        unset($adresse);
    }
    
    // On remplit l'adresse stage si l'étudiant a au moins un stage
    $stages = DBOLDStage::getRecords("", "", "", $etd->getId());
    if(count($stages) > 0){
        // Quelle est l'adresse ?
        $i=count($stages)-1;
        while(($i >= 0) && ($stages[$i]->getAdresseStage() == ""))
            $i--;
        
        if($i >= 0){
            $adresse = extractAdresseCodePVilleFrom($stages[$i]->getAdresseStage());
            $adresseStage = $adresse[0];
            $codePostalStage = $adresse[1];
            $villeStage = $adresse[2];
            $telStage = $stages[$i]->getTelStage();
            unset($adresse);
        }
    }

    $etdAjoute = DBEtudiant::createRecord(
                                traitementText($etd->getNom()),
                                traitementText($etd->getPrenom()),
                                (($etdDonnee != null)?$etdDonnee->getEmailFac():""),
                                (($etdDonnee != null)?$etdDonnee->getEmailStable():""),
                                $etd->getMIAGe(),
                                "",
                                $etd->getSexe(),
                                $etd->getPromo(),
                                $telStage,
                                $etd->getLogin(),
                                $etd->getPassword(),
                                traitementText(trim($adresseStage)),
                                trim($codePostalStage),
                                traitementText(trim($villeStage)),
                                traitementText(trim($adresseFac)),
                                trim($codePostalFac),
                                traitementText(trim($villeFac)),
                                traitementText(trim($adresseStable)),
                                trim($codePostalStable),
                                traitementText(trim($villeStable)),
                                "", // Date derniere connexion
                                "" // Date dernière récupération du pass
                            );
    $etdMigres += (($etdAjoute == null)?0:1);
    if($etdDonnee != null)
        $correspondanceEtudiantDonnees[$etdDonnee->getId()] = $etdAjoute;
    $correspondanceEtudiant[$etd->getId()] = $etdAjoute;
}
echo "OK</strong> -> migrés : $etdMigres / ".count($oldEtudiants)."<br/>\n";
?>



<strong>Entreprises ...
<?php
$oldEntreprises = DBOLDEntreprise::getRecords();
$entMigres = 0;
$entSansType = 0;
$correspondanceEntreprise = array();
foreach($oldEntreprises as $ent){
    $adresse = extractAdresseCodePVilleFrom($ent->getAdresse());
    $adresseEnt = $adresse[0];
    $codePostalEnt = $adresse[1];
    $villeEnt = $adresse[2];
    unset($adresse);

    $raisonSociale = $ent->getRaisonSociale();
    if($codePostalEnt == ""){
        // Extraction du code postal/ville du nom de l'entreprise
        if(ereg("([^(]*)\(([^0-9]*)?([0-9]{5})?([^\)]*)?\)", $ent->getRaisonSociale(), $eregs)){
            if($eregs[1] != "")
                $raisonSociale = $eregs[1];
            if($eregs[2] != "")
                $villeEnt = $eregs[2];
            if($eregs[4] != "")
                $villeEnt = $eregs[4];
            if($eregs[3] != "")
                $codePostalEnt = $eregs[3];
        }
    }
    $typeEntreprise = $ent->getTypeEntreprise();
    $entSansType += (($typeEntreprise == null)?1:0);
    
    $entAjoutee = DBEntreprise::createRecord(
                                (($typeEntreprise == null)?"":$typeEntreprise->getLibelleTypeEntreprise()),
                                traitementText(str_replace("\n", "", str_replace("\r\n", "", $raisonSociale))),
                                $ent->getUrlSite(),
                                traitementText($adresseEnt),
                                $codePostalEnt,
                                traitementText($villeEnt),
                                $ent->getTel(),
                                $ent->getFax(),
                                ""
                            );
    $entMigres += (($entAjoutee == null)?0:1);
    $correspondanceEntreprise[$ent->getIdEntreprise()] = $entAjoutee;
}

// "Uniformisation" de chaque type d'entreprise
DBEntreprise::uniformiseTypes();

$warningEntreprise = "";
if($entSansType != 0) $warningEntreprise = " ... Attention toutefois : ".$entSansType." enregistrements n'ont pas de 'type' existant (NULL) !";
echo "OK</strong> -> migrés : $entMigres / ".count($oldEntreprises).$warningEntreprise."<br/>\n";
?>



<strong>Types de stages ...
<?php
// On a rien a faire d'autre que d'associer les id de la source aux enregistrements existants
// (car les types de stages sont initialisées dans le DBTypeStage)
$stage2004EntM2 = DBTypeStage::getRecords("", "Stages en entreprises M2", 2004);
$stage2004EntM2 = $stage2004EntM2[0];
$stage2004EntM1 = DBTypeStage::getRecords("", "Stages en entreprises M1", 2004);
$stage2004EntM1 = $stage2004EntM1[0];
$stage2004EntL3 = DBTypeStage::getRecords("", "Stages en entreprises L3", 2004);
$stage2004EntL3 = $stage2004EntL3[0];
$stage2004AnM1 = DBTypeStage::getRecords("", "Projet d'analyse M1", 2004);
$stage2004AnM1 = $stage2004AnM1[0];

$stage2005EntM2 = DBTypeStage::getRecords("", "Stages en entreprises M2", 2005);
$stage2005EntM2 = $stage2005EntM2[0];
$stage2005EntM1 = DBTypeStage::getRecords("", "Stages en entreprises M1", 2005);
$stage2005EntM1 = $stage2005EntM1[0];
$stage2005EntL3 = DBTypeStage::getRecords("", "Stages en entreprises L3", 2005);
$stage2005EntL3 = $stage2005EntL3[0];
$stage2005AnM1 = DBTypeStage::getRecords("", "Projet d'analyse M1", 2005);
$stage2005AnM1 = $stage2005AnM1[0];

$correspondanceTypeStage[1] = $stage2004EntL3;
$correspondanceTypeStage[3] = $stage2004AnM1;
$correspondanceTypeStage[4] = $stage2004EntM2;
$correspondanceTypeStage[5] = $stage2004EntM1;

$correspondanceTypeStage[6] = $stage2005EntM2;
$correspondanceTypeStage[7] = $stage2005EntM1;
$correspondanceTypeStage[8] = $stage2005EntL3;
$correspondanceTypeStage[9] = $stage2005AnM1;

echo "OK</strong><br/>\n";
?>



<strong>Contacts entreprise ...
<?php
$oldContacts = DBOLDPersonne::getRecords();
$contactsMigres = 0;
$contactSansFonction = 0;
$contactSansEntreprise = 0;
$correspondanceContact = array();
foreach($oldContacts as $contact){
    
    $fonction = $contact->getFonction();

    $entreprise = null;
    $entrepriseTmp = $contact->getEntreprise();
    if($entrepriseTmp != null){
        $entreprise = $correspondanceEntreprise[$entrepriseTmp->getIdEntreprise()];
    }
    
    $contactAjoute = DBContactEtp::createRecord(
                                traitementText($contact->getNom()),
                                traitementText($contact->getPrenom()),
                                $contact->getEmail(),
                                $contact->getTel(),
                                traitementText((($fonction == null)?"":$fonction->getLibelleFonction())),
                                $entreprise
                            );
    $contactsMigres += (($contactAjoute == null)?0:1);
    $contactSansFonction += (($fonction == null)?1:0);
    $contactSansEntreprise += (($entreprise == null)?1:0);
    $correspondanceContact[$contact->getIdPersonne()] = $contactAjoute;
}

$warningContact = "";
if(($contactSansFonction != 0) || ($contactSansEntreprise != 0)){
    $warningContact = " ... Attention toutefois : ";
    if($contactSansFonction != 0){
        $warningContact .= $contactSansFonction." contact(s) n'ont pas de fonction (NULL)";
        if($contactSansEntreprise != 0)
            $warningContact .= " et ";
    }
    if($contactSansEntreprise != 0)
        $warningContact .= $contactSansEntreprise." contact(s) ne sont pas associés à une entreprise (-1)";
}

echo "OK</strong> -> migrés : $contactsMigres / ".count($oldContacts).$warningContact."<br/>\n";
?>



<strong>Propositions de stage ...
<?php
$oldPropStage = DBOLDPropositionStage::getRecords();
$propStageMigrees = 0;
$propStageSansEntreprise = 0;
$propStageSansDomaine = 0;
$correspondancePropStage = array();
foreach($oldPropStage as $propStage){
        
    $mds = null;
    $tmpMDS = $propStage->getPersonneMaitreDeStage();
    if($tmpMDS != null)
        $mds = $correspondanceContact[$tmpMDS->getIdPersonne()];
        
    $contact = null;
    $tmpContact = $propStage->getPersonneContact();
    if($tmpContact != null)
        $contact = $correspondanceContact[$tmpContact->getIdPersonne()];

    $domaine = $propStage->getDomaine();
    $libelleDomaine = "";
    if($domaine != null)
        $libelleDomaine = $domaine->getLibelleDomaine();
    
    $propStageSansDomaine += (($domaine == null)?1:0);
    
    
    $technos = $propStage->getTechnos();
    $technoPrincipale = "";
    if(count($technos) > 0)
        $technoPrincipale = $technos[0]->getLibelleTechnologie();
    
    $descriptionTechnos = "";
    if(count($technos) > 1){
        $firstTime = true;
        $descriptionTechnos = "Utilisation également de ";
        for($i=1; $i<count($technos); $i++){
            if(!$firstTime)
                $descriptionTechnos .= ", ";
            $descriptionTechnos .= $technos[$i]->getLibelleTechnologie();
        }
    }
    
    $etat = "";
    $motifRefus = "";
    $dateRefus = "";
    $dateValidation = "";
    $oldValide = $propStage->getValide();
    if($oldValide == 0){ // Proposition refusée ...
        $etat = DBPropositionStage::$ETAT_PROPOSITION_STAGE_REFUSEE;
        $motifRefus = $propStage->getMotifRefus();
    }
    else if($oldValide == 2){ // Proposition "validée"
        $etat = DBPropositionStage::$ETAT_PROPOSITION_STAGE_VALIDEE;
    }
    else{ // Proposition "en cours"
        $etat = DBPropositionStage::$ETAT_PROPOSITION_STAGE_ATTENTE_VALIDATION;
    }
    
    // Pour le mail du responsable de la proposition, on va regarder s'il y a un maitre de stage ou un contact.. et si c'est le cas, on utilisera le mail
    $mailResponsable="non_renseigné@nowhere.com";
    if($contact != null)
        $mailResponsable = $contact->getEmailContact();
    if($mds != null)
        $mailResponsable = $mds->getEmailContact();
        
    
    // La promo est déduite de kla date de début de stage
    $dateDebut = $propStage->getDateDebut();
    $dates = split("/", $dateDebut);
    $promo = $dates[2]-1;
        
    $entreprise = null;
    $entrepriseTmp = $propStage->getEntreprise();
    if($entrepriseTmp != null){
        $entreprise = $correspondanceEntreprise[$entrepriseTmp->getIdEntreprise()];
    }

    $propStageSansEntreprise += (($entreprise == null)?1:0);

    $propStageAjoutee = DBPropositionStage::createRecord(
                                $mds,
                                $contact,
                                traitementText($libelleDomaine),
                                traitementText($propStage->getIntitule()),
                                traitementText($propStage->getSujet()),
                                $propStage->getDateDebut(),
                                $propStage->getDateFin(),
                                traitementText($technoPrincipale),
                                $propStage->getNbEtudiant(),
                                (($propStage->getIndemnite() == 0)?"":"Indemnité de ".$propStage->getIndemnite()." euros"),
                                $etat,
                                traitementText($motifRefus),
                                $mailResponsable,
                                $promo,
                                $propStage->getDateCreation(),
                                "", // Date derniere modification "null" (n'existait pas)
                                $dateValidation,
                                $dateRefus,
                                "", // Date terminaison "null" (n'existait pas)
                                $descriptionTechnos,
                                $entreprise
                            );
    $propStageMigrees += (($propStageAjoutee == null)?0:1);
    $correspondancePropStage[$propStage->getIdPropositionStage()] = $propStageAjoutee;
}

$warningPropStage = "";
if(($propStageSansEntreprise != 0) || ($propStageSansDomaine != 0)){
    $warningPropStage = " ... Attention toutefois : ";
    if($propStageSansEntreprise != 0){
        $warningPropStage .= $propStageSansEntreprise." proposition(s) n'ont pas d'entreprise (-1)";
        if($propStageSansDomaine != 0)
            $warningPropStage .= " et ";
    }
    if($propStageSansDomaine != 0)
        $warningPropStage .= $propStageSansDomaine." proposition(s) n'ont pas de domaine ('')";
}

echo "OK</strong> -> migrés : $propStageMigrees / ".count($oldPropStage).$warningPropStage."<br/>\n";
?>



<strong>Relation "concerne" entre Proposition et Type de stage ...
<?php
// NOTE IMPORTANTE : on prend le parti de ne pas migrer les Propositions dont les "concerne" sont incohérents !! (on les supprime carrément !)
// A COMPLETER
$oldConcerne = DBOLDCaractProp::getRecords();
$concerneMigres = 0;
foreach($oldConcerne as $concerne){
    $paramStageId = $concerne->getIdParamStage();
    $oldProp = $concerne->getPropositionStage();
    if((array_key_exists($paramStageId, $correspondanceTypeStage)) && ($oldProp != null)){
        $typeStage = $correspondanceTypeStage[$paramStageId];
        $propositionStage = $correspondancePropStage[$oldProp->getIdPropositionStage()];
        $concerneAjoutee = DBConcerne::createRecord(
                                    $typeStage,
                                    $propositionStage
                                );
        $concerneMigres += (($concerneAjoutee == null)?0:1);
    }
}

$propositionsSupprimees = DBPropositionStage::supprimerPropositionsSansTypeDeStage();

$warningConcerne = "";
if($concerneMigres != count($oldConcerne)) 
    $warningConcerne = " ... Les ".(count($oldConcerne) - $concerneMigres)." migration(s) manquante(s) sont dûes à "
                        ."des Types de stage ou des Propositions qui n'existaient pas ($propositionsSupprimees proposition(s) incohérente(s) ont donc été supprimées) !";
echo "OK</strong> -> migrés : $concerneMigres / ".count($oldConcerne).$warningConcerne."<br/>\n";
?>



<strong>Fiches de stage ...
<?php
// NOTE IMPORTANTE : on prend le parti de ne pas migrer les Fiches de stage dont les types de stage n'existent pas !!
$oldFicheStage = DBOLDStage::getRecords();
$fichesStageMigrees = 0;
$ficheSansDomaine = 0;
foreach($oldFicheStage as $ficheStage){

    $idParamStage = $ficheStage->getIdParamStage();
    $entrepriseTMP = $ficheStage->getEntreprise();
    
    // On ne migre pas si :
    //  - le type de stage est invalide (inexistant)
    //  - l'entreprise est invalide (inexistante)
    if(array_key_exists($idParamStage, $correspondanceTypeStage)
        && ($entrepriseTMP != null)){
        $typeStage = $correspondanceTypeStage[$ficheStage->getIdParamStage()];
        $etudiant = $correspondanceEtudiant[$ficheStage->getEtudiant()->getId()];
        $entreprise = $correspondanceEntreprise[$entrepriseTMP->getIdEntreprise()];

        $mds = $ficheStage->getMaitreDeStage();
        if($mds != null)
            $mds = $correspondanceContact[$mds->getIdPersonne()];
        
        $signataire = $ficheStage->getSignataire();
        if($signataire != null)
            $signataire = $correspondanceContact[$signataire->getIdPersonne()];
            
        $contact = $ficheStage->getContact();
        if($contact != null)
            $contact = $correspondanceContact[$contact->getIdPersonne()];

        $technos = $ficheStage->getTechnos();
        $technoPrincipale = "";
        if(count($technos) > 0)
            $technoPrincipale = $technos[0]->getLibelleTechnologie();
        
        $descriptionTechnos = "";
        if(count($technos) > 1){
            $firstTime = true;
            $descriptionTechnos = "Utilisation également de ";
            for($i=1; $i<count($technos); $i++){
                if(!$firstTime)
                    $descriptionTechnos .= ", ";
                $descriptionTechnos .= $technos[$i]->getLibelleTechnologie();
            }
        }
        
        $etat = "";
        $motifRefus = "";
        $dateRefus = "";
        $dateValidation = "";
        $dateCreation = "";
        $dateDerniereModif = "";
        $dateConventionnement = "";
        $dateFinale = "";
        $oldValide = $ficheStage->getValide();
        if($oldValide == 0){ // Proposition refusée ...
            $etat = DBFicheStage::$ETAT_STAGE_REFUSEE;
            $motifRefus = $ficheStage->getMotifRefusStage();
        }
        else if($oldValide == 2){ // Proposition "validée"
            $etat = DBFicheStage::$ETAT_STAGE_VALIDEE;
        }
        else{ // Proposition "en cours"
            $etat = DBFicheStage::$ETAT_STAGE_ATTENTE_VALIDATION;
        }
        
        $tuteur = $ficheStage->getTuteur();
        if($tuteur != null)
            $tuteur = $correspondanceEnseignant[$tuteur->getId()];

        $relecteur = $ficheStage->getRelecteur();
        if($relecteur != null)
            $relecteur = $correspondanceEnseignant[$relecteur->getId()];

        $visite = null;
        $visites = $ficheStage->getVisites();
        if(count($visites) != 0)
            $visite = $visites[0];
        
        $libelleDomaine = "";
        $domaine = $ficheStage->getDomaine();
        if($domaine != null)
            $libelleDomaine = $domaine->getLibelleDomaine();
        else
            $ficheSansDomaine++;
            
        $ficheStageAjoutee = DBFicheStage::createRecord(
                                    $typeStage,
                                    $etudiant,
                                    $entreprise,
                                    $mds,
                                    $signataire,
                                    traitementText($ficheStage->getIntitule()),
                                    traitementText($ficheStage->getSujet()),
                                    $ficheStage->getDateDebut(),
                                    $ficheStage->getDateFin(),
                                    traitementText($libelleDomaine),
                                    traitementText($technoPrincipale),
                                    $descriptionTechnos,
                                    $etat,
                                    $dateCreation,
                                    $dateDerniereModif,
                                    $dateValidation,
                                    $dateConventionnement,
                                    $dateFinale,
                                    $dateRefus,
                                    traitementText($motifRefus),
                                    $tuteur,
                                    $relecteur,
                                    $ficheStage->getDateSoutenance(),
                                    $ficheStage->getLieuSoutenance(),
                                    "", // Date de visite inexistante
                                    traitementText((($visite == null)?"":$visite->getCorrespSujetTravail())),
                                    traitementText((($visite == null)?"":$visite->getAvisEtudiant())),
                                    traitementText((($visite == null)?"":$visite->getAvisRespRencontre())),
                                    traitementText((($visite == null)?"":$visite->getAvisEnseignant())),
                                    null // Aucune proposition de stage liée (on ne les liait pas avant)
                                );
                                
        $correspondanceFicheTest[$ficheStageAjoutee->getIdStage()] = $ficheStageAjoutee;
        $fichesStageMigrees += (($ficheStageAjoutee == null)?0:1);
    }
}

$warningFicheStage = "";
if($fichesStageMigrees != count($oldFicheStage))
    $warningFicheStage = " ... Les ".(count($oldFicheStage) - $fichesStageMigrees)." fiche(s) non migrée(s) correspondent à des fiches dont le type ou l'entreprise était invalide !";
if($ficheSansDomaine != 0)
    $warningFicheStage .= (($warningFicheStage=="")?" ... Attention : ":"... et (re)attention : ").$ficheSansDomaine." fiche(s) sont sans domaine !";
echo "OK</strong> -> migrés : $fichesStageMigrees / ".count($oldFicheStage).$warningFicheStage."<br/>\n";


DBConnector::getDBConnector()->forceConnexionPersistance(false);
DBConnector::getDBConnectorSource()->forceConnexionPersistance(false);
?>
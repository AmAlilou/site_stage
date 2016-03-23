
Modification :
ALTER TABLE `fiche_stage` CHANGE `etat_stage` `etat_stage` ENUM( 'En attente de validation', 'Validee', 'Refusee', 'Signature Entreprise', '
Signature Universite', 'Terminee' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'En attente de validation';

Ajout statut enseignant :
ALTER TABLE `enseignant` ADD `statut_enseignant` ENUM( 'actif', 'passif' ) NOT NULL DEFAULT 'actif';

Ajout colonne fiche stage :
ALTER TABLE `fiche_stage` ADD `nb_candidature` TINYINT( 3 ) UNSIGNED NOT NULL DEFAULT '0';

Ajout colonne fiche stage :
ALTER TABLE `fiche_stage` ADD `nb_fiche` TINYINT( 3 ) UNSIGNED NOT NULL DEFAULT '0';

ALTER TABLE `fiche_stage` CHANGE `date_conventionnement_suivi` `date_signature_entreprise_suivi` DATETIME NULL DEFAULT NULL ;

ALTER TABLE `fiche_stage` ADD `date_signature_universite_suivi` DATETIME NULL AFTER `date_signature_entreprise_suivi` ;

Mis a jour :
UPDATE fiche_stage SET etat_stage = 'Signature Entreprise' WHERE etat_stage = '';


<?php

function aideAdmin() {

	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/tableauBordStages.php">Tableau de bord des Fiches/Propositions</a> : '.XHTMLBuilder::getText('Ceci est le tableau de bord des fiches de stage et des propositions de stage') ;

	$retour .= '<br /><hr /><br />' ;

	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionFiche.php">Gestion des fiches de stage</a> : </h3>' ;
	$retour .= aideAdminGestionFiche() ;

	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionSuivi.php">Gestion des fiches de Suivi</a> : </h3>' ;
	$retour .= aideAdminGestionSuivi() ;

	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilPropositionStage.php">Gestion des propositions de stage</a> : </h3>' ;
	$retour .= aideGestionProposStage() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/listeRapports.php">Gestion des rapports</a> : '.XHTMLBuilder::getText('Cette partie permet de mettre à disposition des rapports de stage sur le site.') ;

	$retour .= '<br /><hr /><br />' ;
	
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionSoutenance.php">Gestion des soutenances</a> : </h3>' ;
	$retour .= aideGestionSoutenance() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionTuteur.php">Gestion des Tuteurs/Relecteurs</a> : </h3>' ;
	$retour .= aideGestionTuteur() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionEtudiant.php">'.XHTMLBuilder::getText('Gestion des étudiants').'</a> : </h3>' ;
	$retour .= aideGestionEtudiant() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionEnseignant.php">Gestion des enseignants</a> : </h3>' ;
	$retour .= aideGestionEnseignant() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionEntreprise.php">Gestion des entreprises</a> : </h3>' ;
	$retour .= aideGestionEntreprise() ;

	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/configContacts.php">Configuration du site</a> : '.XHTMLBuilder::getText('La partie de configuration ce présente en 4 parties : <br />Contacts : Présente les informations sur l\'administrateur et le secrétariat. Il est possible de modifier la liste de diffusion de ces deux partis. De plus, pour l\'administration, les permanences peuvent être modifiées. Il est également possible de modifier les login et mot de passe administrateur et secrétariat.<br />Stages : Présente un tableau avec les différents type de stage de l\année en cours. Il est possible d\accéder à un formulaire de modification ou de supprimer le type de stage de la ligne en cliquant sur le lien de la dernière colonne. Il est également possible de créer un nouveau type de stage.<br />Enumérations : Les énumérations sont les listes utilisées principalement dans les listes déroulantes du site. Il est possible de modifier ou supprimer des éléments existant de ces listes ou d\'en ajouter de nouveaux.') ;
	
	
	return $retour ;
}

function aideGestionProposStage() {
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionPropositionStage.php?action=avalider">'.XHTMLBuilder::getText('Propositions de stage à valider').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de gérer les propositions de stage en attente de validation. Vous pouvez affiner votre rechercher en choisissant un type de stage et une entreprise. Vous accédez à un tableau présentant l\'intitulé du stage, l\'entreprise et deux actions possibles sur cette proposition de stage.<br /> - Valider : Permet de valider la proposition (elle passe à l\'état validé) par l\'intermédiaire d\'une boite de message. \'OK\' poursuit la validation et \'Annuler\' stop le processus.<br /> -Refuser : Ce lien vous dirige vers le formulaire de saisie du motif du refus de la proposition. Ce motif est obligatoirement saisie. Validez ce formulaire pour finaliser le passage à l\'état refusé de la proposition.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionPropositionStage.php?action=valider">'.XHTMLBuilder::getText('Propositions de stage validées').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de gérer les propositions de stage déjà validées. Vous pouvez affiner votre rechercher en choisissant un type de stage et une entreprise. Vous accédez à un tableau présentant l\'intitulé du stage, l\'entreprise, le nombre d\'étudiants ayant candidaté pour ce stage (attention: ce chiffre est le fruit d\'un sondage et ne reflête donc pas forcément le nombre réel de candidatures) et le nombre de fiches de stages issues de cette proposition.') ;
	
	$retour .= '<br /><br />' ;

	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionPropositionStage.php?action=pourvue">'.XHTMLBuilder::getText('Propositions de stage pourvues').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de gérer les propositions de stage déjà pourvues. Une proposition à laquelle vous affectez une fiche de stage est automatiquement pourvue, en vous rendant sur cette proposition, vous pouvez la rendre non-pourvue.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionPropositionStage.php?action=refuser">'.XHTMLBuilder::getText('Propositions de stage refusées').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de visualiser les propositions de stage refusées. Vous pouvez affiner votre recherche en choisissant un type de stage et une entreprise.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/modifierPropositionStage.php">'.XHTMLBuilder::getText('Modifier des propositions de stage').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de visualiser les propositions de stage. Vous pouvez affiner votre rechercher en choisissant un type de stage et une entreprise. Visualisez le sujet du stage en cliquant sur son intitulé. <br />Le lien \'Modifier\' de la seconde colonne permet d\'accéder au formulaire de modification de la proposition de stage. Il n\'est pas possible de modifier les données de l\'entreprise, du maitre de stage ou du contact.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formPropStageUpload.php">'.XHTMLBuilder::getText('Uploader des propositions de stage').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de charger sur le serveur des propositions de stage au format pdf. Elles sont visible par les étudiants, mais elles ne sont pas liées à la base de données. Aucune gestion n\'est possible dessus en dehors de leur ajout et leur suppression.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionPropositionStagePdf.php">'.XHTMLBuilder::getText('Propositions de stage PDF à valider').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de gérer les propositions de stage Pdf en attente de validation. Vous accédez à un tableau présentant l\'entreprise, l\'intitulé de la proposition, le lieu du stage, l\'email de la personne responsable, le type de stage et deux actions possibles sur cette proposition de stage Pdf.<br /> - Valider : Permet de valider la proposition (elle passe à l\'état validé) par l\'intermédiaire d\'une boite de message. \'OK\' poursuit la validation et \'Annuler\' stop le processus.<br /> -Refuser : Ce lien vous dirige vers le formulaire de saisie du motif du refus de la proposition. Ce motif est obligatoirement saisie. Validez ce formulaire pour finaliser le passage à l\'état refusé de la proposition.') ;
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/listePropositionsPdfRefusee.php">'.XHTMLBuilder::getText('Propositions de stage PDF refusées').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de visualiser les propositions de stage Pdf refusées.') ;
	$retour .= '<br /><br />' ;	
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/listePropositionsPdf.php">'.XHTMLBuilder::getText('Statistiques et gestion des uploads').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de modifier ou supprimer une proposition Pdf. La modification de la proposition ne concerne que l\'intitulé de la proposition ainsi que les mots clés.') ;
	
	return $retour ;
}

function aideGestionSoutenance() {
	
	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formConsulterCalendrier.php">Consulter le calendrier</a> : '.XHTMLBuilder::getText('Cette partie présente un tableau contenant les étudiants avec leur date et lieu de soutenance ainsi que leur tuteur et leur relecteur. Si vous n\'avez pas fait les affectations, ces données sont vides. Vous pouvez trier le tableau en cliquant sur les entêtes de colonnes.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formAffecterSoutenance.php">Affecter une soutenance</a> : '.XHTMLBuilder::getText('Ce formulaire permet de choisir un type de stage puis un étudiant et de lui affecter une date, un horaire et un lieu de soutenance.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formModifierSoutenance.php">Modifier une soutenance</a> : '.XHTMLBuilder::getText('Ce formulaire permet de choisir un type de stage puis un étudiant dont la soutenance est déjà affectée et de modifier la date, l\'horaire et/ou le lieu de soutenance.') ;
	
	return $retour ;
}

function aideGestionTuteur() {

	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/consulterAffectationsTuteur.php">Consulter les affectations des tuteurs et relecteurs</a> : '.XHTMLBuilder::getText('Cette partie présente un tableau contenant les étudiants avec leur tuteur et leur relecteur. Si vous n\'avez pas fait les affectations, ces données sont vides. Vous pouvez trier le tableau en cliquant sur les entêtes de colonnes.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formAffecterTuteur.php">Affecter un tuteur et un relecteur</a> : '.XHTMLBuilder::getText('Ce formulaire permet de choisir un type de stage puis un étudiant et de lui affecter un tuteur et un relecteur.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formModifierTuteur.php">Modifier un tuteur et un relecteur</a> : '.XHTMLBuilder::getText('Ce formulaire permet de choisir un type de stage puis un étudiant dont le tuteur et le relecteur sont déjà affectés et de les modifier.') ;
	
	return $retour ;
}

function aideGestionEtudiant() {

	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/afficheEtudiant.php">'.XHTMLBuilder::getText('Liste des étudiants').'</a> : '.XHTMLBuilder::getText('Cette partie présente un tableau contenant tous les étudiants avec leurs informations. Vous pouve<z trier le tableau en cliquant sur les entêtes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' à gauche des entêtes.<br />Choisissez un étudiant grâce au bouton radio à gauche de son nom et cliquez sur le bouton \'Afficher\' ou \'Modifier\' pour accéder à sa fiche détaillée ou au formulaire de modification de l\'étudiant (seuls son mot de passe et son login sont modifiables).') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/L3/MIAGeScolarite/phpMyEdit/Etudiants.php\" target="blank">Ajouter un L3</a> : '.XHTMLBuilder::getText('Lien vers la base scolarité pour ajouter un étudiant en L3.<br />ATTENTION : Ce n\'est pas votre rôle d\'ajouter des étudiants dans la base scolarité. Demander à l\'administrateur de cette base de faire l\'ajout pour vous.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/M1/MIAGeScolarite/phpMyEdit/Etudiants.php\" target="blank">Ajouter un M1</a> : '.XHTMLBuilder::getText('Lien vers la base scolarité pour ajouter un étudiant en M1.<br />ATTENTION : Ce n\'est pas votre rôle d\'ajouter des étudiants dans la base scolarité. Demander à l\'administrateur de cette base de faire l\'ajout pour vous.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/M2/MIAGeScolarite/phpMyEdit/Etudiants.php\" target="blank">Ajouter un M2</a> : '.XHTMLBuilder::getText('Lien vers la base scolarité pour ajouter un étudiant en M2.<br />ATTENTION : Ce n\'est pas votre rôle d\'ajouter des étudiants dans la base scolarité. Demander à l\'administrateur de cette base de faire l\'ajout pour vous.') ;
	
	
	return $retour ;
}

function aideGestionEnseignant() {

	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/afficheEnseignant.php">'.XHTMLBuilder::getText('Liste des enseignants').'</a> : '.XHTMLBuilder::getText('Cette partie présente un tableau contenant tous les enseignants avec leurs informations. Vous pouvez trier le tableau en cliquant sur les entêtes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' à gauche des entêtes.<br />Choisissez un enseignant grâce au bouton radio à gauche de son nom et cliquez sur le bouton \'Afficher\' ou \'Modifier\' pour accéder à sa fiche détaillée ou au formulaire de modification de l\'enseignant (seul son statut vis à vis des stage est modifiable).') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/L3/MIAGeScolarite/phpMyEdit/Etudiants.php\"  target="blank">Ajouter un enseignant</a> : '.XHTMLBuilder::getText('Lien vers la base scolarité pour ajouter un enseignant.<br />ATTENTION : Ce n\'est pas votre rôle d\'ajouter des enseignants dans la base scolarité. Demander à l\'administrateur de cette base de faire l\'ajout pour vous.') ;
	
	
	return $retour ;
}

function aideGestionEntreprise() {
	
	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/afficheEntrepriseResume.php">'.XHTMLBuilder::getText('Liste des entreprises (affichage résumé)').'</a> : '.XHTMLBuilder::getText('Cette partie présente un tableau contenant toutes les entreprises avec leurs informations. Vous pouvez trier le tableau en cliquant sur les entêtes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' à gauche des entêtes.<br />Choisissez une entreprise grâce au bouton radio à gauche de sa raison sociale et cliquez sur le bouton \'Afficher\', \'Modifier\' ou \'Supprimer\'.<br />\'Afficher\' : Affichage des informations.<br />\'Modifier\' : Propose un formulaire permettant de modifier les informations sur l\'entreprise.<br />\'Supprimer\' : Permet de supprimer l\'entreprise.<br />\'Ajouter\' : Ce bouton propose un formulaire d\'ajout d\'une entrpise') ;
	
	$retour .= '<br /><br />' ;

	$retour .=  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/afficheEntrepriseEtendu.php">'.XHTMLBuilder::getText('Liste des entreprises (affichage étendu)').'</a> : '.XHTMLBuilder::getText('Cette partie présente un tableau contenant toutes les entreprises avec leurs informations. Vous pouvez trier le tableau en cliquant sur les entêtes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' à gauche des entêtes.<br />Choisissez une entreprise grâce au bouton radio à gauche de sa raison sociale et cliquez sur le bouton \'Afficher\', \'Modifier\' ou \'Supprimer\'.<br />\'Afficher\' : Affichage des informations.<br />\'Modifier\' : Propose un formulaire permettant de modifier les informations sur l\'entreprise.<br />\'Supprimer\' : Permet de supprimer l\'entreprise.<br />\'Ajouter\' : Ce bouton propose un formulaire d\'ajout d\'une entrpise') ;
	
	$retour .= '<br /><br />' ;

	$retour .=  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/afficheEntrepriseTaxe.php">'.XHTMLBuilder::getText('Liste des entreprises avec la taxe d\'apprentissage').'</a> : '.XHTMLBuilder::getText('Cette partie présente un tableau contenant toutes les entreprises avec leurs informations. Vous pouvez trier le tableau en cliquant sur les entêtes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' à gauche des entêtes.<br />Choisissez une entreprise grâce au bouton radio à gauche de sa raison sociale et cliquez sur le bouton \'Afficher\', \'Modifier\' ou \'Supprimer\'.<br />\'Afficher\' : Affichage des informations.<br />\'Modifier\' : Propose un formulaire permettant de modifier les informations sur l\'entreprise.<br />\'Supprimer\' : Permet de supprimer l\'entreprise.<br />\'Ajouter\' : Ce bouton propose un formulaire d\'ajout d\'une entrpise') ;

	return $retour ;
}



function aideEtudiantPerso() {
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/formDonneesEtudiant.php">'.XHTMLBuilder::getText('Modifier mes données personnelles').'</a> : '.XHTMLBuilder::getText('Ce lien donne accés au formulaire de saisie de vos différentes coordonnées fac, stables et stage. Ces différentes adresses sont importantes pour que l\'on vous envoie les avis de nouvelles propositions de stage déposées sur le site ou lors du procéssus de signature de la convention. Veillez à leur validité.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/formFicheStage.php">'.XHTMLBuilder::getText('Remplir une fiche de stage').'</a> : '.XHTMLBuilder::getText('Ce lien donne accés au formulaire de saisie d\'une fiche de stage. Pensez à vérifier les données préremplies. Les * signifient que le champ doit obligatoirement être renseigné.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/formModifFicheStage.php">'.XHTMLBuilder::getText('Modifier une fiche de stage non validée').'</a> : '.XHTMLBuilder::getText('Ce lien donne accés à une liste déroulante proposant vos fiches de stages non validées par l\'administrateur. Choisissez une fiche dans la liste pour avoir accés au formulaire de modification. Les * signifient que le champ doit obligatoirement être renseigné.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/affichageFicheStage.php">'.XHTMLBuilder::getText('Voir mes fiche de stage').'</a> : '.XHTMLBuilder::getText('Ce lien donne accés à une liste déroulante proposant vos fiches de stages avec leur état d\'évolution dans le processus de signature. Choisissez une fiche dans la liste pour la visualiser.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/voirAffectations.php">'.XHTMLBuilder::getText('Voir infos Tuteur/Relecteur & Soutenance').'</a> : '.XHTMLBuilder::getText('Cela vous permet de visualiser vos différentes soutenances lorsqu\'elles sont programmées. Pour cela vous devez avoir une fiche de stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/voirPropositions.php">'.XHTMLBuilder::getText('Voir les propositions de stage').'</a> : '.XHTMLBuilder::getText('Cela vous permet de visualiser l\'ensemble des propositions de stage en commençant par votre promotion. Cliquez sur le nom de l\'entreprise pour voir ses infos. Cliquez sur l\'intitulé du stage pour voir son détail.<br />IMPORTANT : Pour que la MIAGe est un meilleur suivi avec les entreprises pensez à répondre au sondage sur les candidatures en cliquant sur le lien  \'Allez vous ou avez vous envoyer votre candidature?\'<br />NOTE : Certaines propositions sont marquées comme faisant l\'objet d\'une fiche de stage mais vous pouvez tout de même envoyer votre candidature. Certainres entreprises souhaitent recruter plusieurs stagiaires.') ;
	
	$retour .= '<br /><br />' ;
	

	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/consultationOffrePDF.php">'.XHTMLBuilder::getText('Voir les propositions de stage au format PDF').'</a> : '.XHTMLBuilder::getText('Cela vous permet de consulter ou tÃ©lÃ©charger les offres de stage au format PDF. Les fichiers sont triÃ©s selon l\'annÃ©e d\'envoi de la proposition. Vous pourrez ainsi consulter des offres des annÃ©es prÃ©cÃ©dentes qui seront archivÃ©es.') ;

	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/voirAnciennesPropositions.php">'.XHTMLBuilder::getText('Voir les propositions des années précédentes').'</a> : '.XHTMLBuilder::getText('Affiche un tableau contenant les propositions de stages saisies les années précédentes. Vous pouvez trier le tableau en cliquant sur les entêtes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' à gauche des entêtes.<br />Choisissez une proposition en sélectionnant le bouton radio à sa gauche et cliquez sur \'Afficher\' pour voir son détail. Vous pourrez alors voir le sujet de stage, le domaine d\'application et surtout une adresse mail de contact pour envoyer une candidature spontanée. Les entreprises peuvent reprendre des stagiaires d\'une année sur l\'autre.') ;

	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/formFicheDevenir.php">'.XHTMLBuilder::getText('Remplir une fiche devenir').'</a> : '.XHTMLBuilder::getText('Ce lien donne accès à un formulaire permettant de renseigner le devenir de l\'étudiant Il correspond à la fiche devenir qui était envoyé par mail par le responsable des stages. ') ;

	
	return $retour ;
}

function aideEtudiantGnrl() {	
	$retour = XHTMLBuilder::getText('Cette partie contient des informations générales sur la façon de chercher un stage, la procédure de validation d\'une fiche de stage, le déroulement du stage et comment rédiger le rapport et préparer la soutenance.');
	
	return $retour ;
}



function aideEnseignantPerso() {
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/consulterEtudiantsASuivre.php">'.XHTMLBuilder::getText('Stagiaires à suivre').'</a> : '.XHTMLBuilder::getText('Affiche un tableau contenant l\'ensemble des étudiants que vous devez suivre. Ce tableau présente la promo et le nom de l\'étudiant ainsi que sa société d\'accueil, le nom du maître de stage et son sujet de stage. Vous pouvez trier le tableau en cliquant sur les entêtes de colonnes. Cliquez sur les liens dans les cellules du tableau pour voir le détail.') ;

	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/accueilGestionVisites.php">'.XHTMLBuilder::getText('Gestion des visites').'</a> : </h3>' ;
	
	$retour .= aideEnseignantGestionVisites() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/consulterSoutenances.php">'.XHTMLBuilder::getText('Soutenances à suivre').'</a> : '.XHTMLBuilder::getText('Affiche un tableau contenant l\'ensemble des soutenances auxquelles vous devez assister en tant que tuteur ou relecteur. Le tableau présente le type de stage et le nom de l\'étudiant puis les informations sur la soutenance comme sa date, son lieu, les noms du tuteur et du relecteur. Vous pouvez trier les colonnes en cliquant sur leur entête.') ;
		
	return $retour ;
}

function aideEnseignantGestionVisites() {
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/consulterEtudiantsASuivre.php">'.XHTMLBuilder::getText('Consulter les visites').'</a> : '.XHTMLBuilder::getText('Affiche un tableau contenant l\'ensemble des visites que vous devez effectuer en tant que tuteur. Le tableau présente la promo et le nom de l\'étudiant ainsi que les différents avis sur la correspondance, celui de l\'étudiant, du maître de stage et le votre. Il est possible de trier les colonnes en cliquant sur leur entête.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/formSaisirVisite.php">'.XHTMLBuilder::getText('Saisir une visite').'</a> : '.XHTMLBuilder::getText('Donne accés au formulaire de saisie d\'une visite. Choisissez le type de stage puis l\'étudiant que vous avez visité. Saisissez alors les champs obligatoires signalés par une * et valider') ;

	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/formModifierVisite.php">'.XHTMLBuilder::getText('Modifier une visite').'</a> : '.XHTMLBuilder::getText('Donne accés au formulaire de modification d\'une visite. Choisissez le type de stage puis l\'étudiant que vous avez visité et que vous souhaitez modifier. Saisissez alors les champs obligatoires signalés par une * et valider la modification.') ;

	return $retour ;
}

function aideEnseignantGnrl() {
	$retour = XHTMLBuilder::getText('Cette partie contient des informations générales sur la façon dont l\'encadrement des stagiaires et la visite dans l\'entreprise doivent se passer ainsi que sur l\'évaluation du stagiaire.');
	
	return $retour ;
}



function aideSecretaire() {
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/secretaire/gestionFicheStage.php">'.XHTMLBuilder::getText('Modifier une fiche de stage non validée').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de modifier les fiches de stage en attente de validation. Vous accédez à un tableau que vous pouvez trier en cliquant sur les entêtes des colonnes. Choisissez un type de stage pour affiner votre recherche.<br />Si vous choisissez un étudiant dans la liste déroulante le détail de la fiche de stage s\'affiche en dessous de la liste.<br />Si vous cliquez sur l\'intitulé du stage dans le tableau la fiche de stage s\'ouvre dans une nouvelle fenêtre dans une version imprimable.<br />L\'icone <img alt="imgModifFicheStage" src="'.$GLOBALS['URL_ROOT_PATH'].'/image/b_edit.png" title="Modifier la fiche de stage" /> donne accès au formulaire de modification de la fiche de stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/secretaire/signatureEntrepriseFicheStage.php">'.XHTMLBuilder::getText('Remettre fiche à l\'étudiant').'</a> : '.XHTMLBuilder::getText('Vous accédez à un formulaire permettant de choisir le type de stage puis l\'étudiant. Une fois ce dernier sélectionné sa fiche de stage apparaît ainsi qu\'un bouton \'Remis Etudiant\' qui permet de changer l\'état de la fiche de stage à \'signature entreprise\'. Cela signifie que la convention de stage est remise à l\'étudiant pour la signature de l\'entreprise.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/secretaire/signatureUniversiteFicheStage.php">'.XHTMLBuilder::getText('Signature de l\'université').'</a> : '.XHTMLBuilder::getText('Vous accédez à un formulaire permettant de choisir le type de stage puis l\'étudiant. Une fois ce dernier sélectionné sa fiche de stage apparaît ainsi qu\'un bouton \'Signature Universite\' qui permet de changer l\'état de la fiche de stage à \'Signature universite\'. Cela signifie que la convention de stage est de retour, signée par l\'entreprise, pour la signature de l\'université.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/secretaire/finalisationFicheStage.php">'.XHTMLBuilder::getText('Finaliser une fiche de stage').'</a> : '.XHTMLBuilder::getText('Vous accédez à un formulaire permettant de choisir le type de stage puis l\'étudiant. Une fois ce dernier sélectionné sa fiche de stage apparaît ainsi qu\'un bouton \'Finaliser\' qui permet de changer l\'état de la fiche de stage à \'Terminée\'. Cela signifie que la convention de stage signée par tous les partis et que l\'étudiant peut partir en stage.') ;	
	
	return $retour ;
}

function aideAdminGestionFiche() {
	
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionFicheStage.php">'.XHTMLBuilder::getText('Validation des fiches de stages').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de modifier les fiches de stage en attente de validation. Vous accédez à un tableau que vous pouvez trier en cliquant sur les entêtes des colonnes. Choisissez un type de stage pour affiner votre recherche.<br />Si vous choisissez un étudiant dans la liste déroulante le détail de la fiche de stage s\'affiche en dessous de la liste.<br />Si vous cliquez sur l\'intitulé du stage dans le tableau la fiche de stage s\'ouvre dans une nouvelle fenêtre dans une version imprimable.<br />L\'icone <img alt="imgModifFicheStage" src="'.$GLOBALS['URL_ROOT_PATH'].'/image/b_edit.png" title="Modifier la fiche de stage" /> donne accès au formulaire de modification de la fiche de stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .=  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/modifEtatFiche.php">'.XHTMLBuilder::getText('Etat des fiches de stage').'</a> : '.XHTMLBuilder::getText('Cette partie présente un tableau contenant tous les fiches de stages avec leurs informations. Vous pouvez trier le tableau en cliquant sur les entêtes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' à gauche des entêtes.<br />Choisissez une fiche de stage grâce au bouton radio et cliquez sur le bouton \'Afficher\' pour afficher de plus amples informations. Cliquez sur le bouton \'Modifier\' pour modifier l\'état de la fiche de stage') ;
	
	return $retour ;
}

function aideAdminGestionSuivi() {
	
	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/modifEtatSuivi.php">'.XHTMLBuilder::getText('Etat des fiches de Suivi').'</a> : '.XHTMLBuilder::getText('Cette partie présente un tableau contenant tous les fiches de suivi avec leurs informations. Vous pouvez trier le tableau en cliquant sur les entêtes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' à gauche des entêtes.<br />Choisissez une fiche de suivi grâce au bouton radio et cliquez sur le bouton \'Afficher\' pour afficher de plus amples informations. Cliquez sur le bouton \'Modifier\' pour modifier l\'état de la fiche de suivi.') ;
	
	return $retour ;
}
//modif_wiki : rajout de cette fonction
function aideChercherStage() {
	
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/SourcesInfo.php">'.XHTMLBuilder::getText('Sources d\'informations diverses').'</a> : '.XHTMLBuilder::getText('Cette partie vous liste les différents endroits où vous pourrez trouver un stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Entreprises.php">'.XHTMLBuilder::getText('Liste d\'entreprises').'</a> : '.XHTMLBuilder::getText('Cette partie vous présente l\'aide que peuvent avoir les M1 et M2 durant leur stage.') ;
	
	$retour .= '<br /><br />' ;
	
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/ConseilsCV.php">'.XHTMLBuilder::getText('Conseils pour le CV').'</a> : '.XHTMLBuilder::getText('Cette partie vous conseille sur la rédaction de votre CV ou de votre lettre de motivation.') ;
	
	$retour .= '<br /><br />' ;
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/ConseilsEntretien.php">'.XHTMLBuilder::getText('Conseils pour l\'entretien').'</a> : '.XHTMLBuilder::getText('Cette partie vous explique comment préparer un entretien.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Etranger.php">'.XHTMLBuilder::getText('Informations stages à l\'étranger').'</a> : '.XHTMLBuilder::getText('Cette partie vous informe sur les stages à l\'étranger.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/ValiderStage.php">'.XHTMLBuilder::getText('Validation d\'un stage').'</a> : '.XHTMLBuilder::getText('Cette partie vous montre la démarche à effectuer pour valider votre stage.') ;
	
	$retour .= '<br /><br />' ;
	return $retour ;
}

//modif_wiki : rajout de cette fonction
function aideEntreprises() {

	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/stages.php">'.XHTMLBuilder::getText('Les stages').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de consulter les dates de remises des rapports ains que les dates des soutenances de toutes les promotions.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/partenariat.php">'.XHTMLBuilder::getText('Le partenariat').'</a> : '.XHTMLBuilder::getText('Cette partie présente et résume les différentes possibilités de coopération entre les entreprises et la Miage de Bordeaux.') ;
	
	$retour .= '<br /><br />' ;
	
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Partenaires.php">'.XHTMLBuilder::getText('Les partenaires').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de connaître les partenaires les plus actifs au sein de la MIAGe.') ;
	
	$retour .= '<br /><br />' ;
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Enseigner.php">'.XHTMLBuilder::getText('Enseigner à la Miage').'</a> : '.XHTMLBuilder::getText('Cette partie vous donne des renseignements sur "Comment enseigner à la MIAGe".') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Taxe.php">'.XHTMLBuilder::getText('Verser la taxe d\'apprentissage').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de savoir comment verser la taxe d\'apprentissage. ') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Competences.php">'.XHTMLBuilder::getText('Compétences des miagistes').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de connaître les compétences acquises par les miagistes au cours de leurs cursus.') ;
	
	$retour .= '<br /><br />' ;
	return $retour ;
}
//modif_wiki : rajout de cette fonction
function aideDeroulementStage() {

	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Conseils.php">'.XHTMLBuilder::getText('Conseils').'</a> : '.XHTMLBuilder::getText('Cette partie vous donne quelquels conseils concenrnant le déroulement du stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Outils.php">'.XHTMLBuilder::getText('Outils').'</a> : '.XHTMLBuilder::getText('Cette partie vous informe de la procédure à suivre afin de valider un stage à travers les outils fournis, à savoir APOGEE et le Site des stages de la MIAGe.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Encadrement.php">'.XHTMLBuilder::getText('Encadrement').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de savoir comment est encadrer votre stage.') ;
	
	$retour .= '<br /><br />' ;
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/VisiteStage.php">'.XHTMLBuilder::getText('Visite de stage').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de vous donner des informations sur la visite du tuteur de stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/EvaluationStage.php">'.XHTMLBuilder::getText('Evaluation lors du stage').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de connaître les modalités d\'évaluation du stage.') ;
	
	$retour .= '<br /><br />' ;
	
	return $retour ;
}

//modif_wiki : rajout de cette fonction
function aideSoutenanceStage() {
	
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Rapport.php">'.XHTMLBuilder::getText('Le rapport').'</a> : '.XHTMLBuilder::getText('Cette partie vous conseille les bonnes méthodes à appliquer pour faire un rapport.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Soutenance.php">'.XHTMLBuilder::getText('La soutenance').'</a> : '.XHTMLBuilder::getText('Cette partie vous informe sur la soutenance.') ;
	
	$retour .= '<br /><br />' ;
	
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Exemples.php">'.XHTMLBuilder::getText('Exemples').'</a> : '.XHTMLBuilder::getText('Cette partie vous présente différents exemples de rapport et soutenance de stage.') ;
	
	$retour .= '<br /><br />' ;
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formConsulterCalendrier.php">'.XHTMLBuilder::getText('Calendrier des soutenances').'</a> : '.XHTMLBuilder::getText('Cette partie vous montre le calendrier des soutenances.') ;
	
	$retour .= '<br /><br />' ;
	
	return $retour ;
}

?>

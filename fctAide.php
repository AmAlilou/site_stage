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
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/listeRapports.php">Gestion des rapports</a> : '.XHTMLBuilder::getText('Cette partie permet de mettre � disposition des rapports de stage sur le site.') ;

	$retour .= '<br /><hr /><br />' ;
	
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionSoutenance.php">Gestion des soutenances</a> : </h3>' ;
	$retour .= aideGestionSoutenance() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionTuteur.php">Gestion des Tuteurs/Relecteurs</a> : </h3>' ;
	$retour .= aideGestionTuteur() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionEtudiant.php">'.XHTMLBuilder::getText('Gestion des �tudiants').'</a> : </h3>' ;
	$retour .= aideGestionEtudiant() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionEnseignant.php">Gestion des enseignants</a> : </h3>' ;
	$retour .= aideGestionEnseignant() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/accueilGestionEntreprise.php">Gestion des entreprises</a> : </h3>' ;
	$retour .= aideGestionEntreprise() ;

	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/configContacts.php">Configuration du site</a> : '.XHTMLBuilder::getText('La partie de configuration ce pr�sente en 4 parties : <br />Contacts : Pr�sente les informations sur l\'administrateur et le secr�tariat. Il est possible de modifier la liste de diffusion de ces deux partis. De plus, pour l\'administration, les permanences peuvent �tre modifi�es. Il est �galement possible de modifier les login et mot de passe administrateur et secr�tariat.<br />Stages : Pr�sente un tableau avec les diff�rents type de stage de l\ann�e en cours. Il est possible d\acc�der � un formulaire de modification ou de supprimer le type de stage de la ligne en cliquant sur le lien de la derni�re colonne. Il est �galement possible de cr�er un nouveau type de stage.<br />Enum�rations : Les �num�rations sont les listes utilis�es principalement dans les listes d�roulantes du site. Il est possible de modifier ou supprimer des �l�ments existant de ces listes ou d\'en ajouter de nouveaux.') ;
	
	
	return $retour ;
}

function aideGestionProposStage() {
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionPropositionStage.php?action=avalider">'.XHTMLBuilder::getText('Propositions de stage � valider').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de g�rer les propositions de stage en attente de validation. Vous pouvez affiner votre rechercher en choisissant un type de stage et une entreprise. Vous acc�dez � un tableau pr�sentant l\'intitul� du stage, l\'entreprise et deux actions possibles sur cette proposition de stage.<br /> - Valider : Permet de valider la proposition (elle passe � l\'�tat valid�) par l\'interm�diaire d\'une boite de message. \'OK\' poursuit la validation et \'Annuler\' stop le processus.<br /> -Refuser : Ce lien vous dirige vers le formulaire de saisie du motif du refus de la proposition. Ce motif est obligatoirement saisie. Validez ce formulaire pour finaliser le passage � l\'�tat refus� de la proposition.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionPropositionStage.php?action=valider">'.XHTMLBuilder::getText('Propositions de stage valid�es').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de g�rer les propositions de stage d�j� valid�es. Vous pouvez affiner votre rechercher en choisissant un type de stage et une entreprise. Vous acc�dez � un tableau pr�sentant l\'intitul� du stage, l\'entreprise, le nombre d\'�tudiants ayant candidat� pour ce stage (attention: ce chiffre est le fruit d\'un sondage et ne refl�te donc pas forc�ment le nombre r�el de candidatures) et le nombre de fiches de stages issues de cette proposition.') ;
	
	$retour .= '<br /><br />' ;

	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionPropositionStage.php?action=pourvue">'.XHTMLBuilder::getText('Propositions de stage pourvues').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de g�rer les propositions de stage d�j� pourvues. Une proposition � laquelle vous affectez une fiche de stage est automatiquement pourvue, en vous rendant sur cette proposition, vous pouvez la rendre non-pourvue.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionPropositionStage.php?action=refuser">'.XHTMLBuilder::getText('Propositions de stage refus�es').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de visualiser les propositions de stage refus�es. Vous pouvez affiner votre recherche en choisissant un type de stage et une entreprise.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/modifierPropositionStage.php">'.XHTMLBuilder::getText('Modifier des propositions de stage').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de visualiser les propositions de stage. Vous pouvez affiner votre rechercher en choisissant un type de stage et une entreprise. Visualisez le sujet du stage en cliquant sur son intitul�. <br />Le lien \'Modifier\' de la seconde colonne permet d\'acc�der au formulaire de modification de la proposition de stage. Il n\'est pas possible de modifier les donn�es de l\'entreprise, du maitre de stage ou du contact.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formPropStageUpload.php">'.XHTMLBuilder::getText('Uploader des propositions de stage').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de charger sur le serveur des propositions de stage au format pdf. Elles sont visible par les �tudiants, mais elles ne sont pas li�es � la base de donn�es. Aucune gestion n\'est possible dessus en dehors de leur ajout et leur suppression.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionPropositionStagePdf.php">'.XHTMLBuilder::getText('Propositions de stage PDF � valider').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de g�rer les propositions de stage Pdf en attente de validation. Vous acc�dez � un tableau pr�sentant l\'entreprise, l\'intitul� de la proposition, le lieu du stage, l\'email de la personne responsable, le type de stage et deux actions possibles sur cette proposition de stage Pdf.<br /> - Valider : Permet de valider la proposition (elle passe � l\'�tat valid�) par l\'interm�diaire d\'une boite de message. \'OK\' poursuit la validation et \'Annuler\' stop le processus.<br /> -Refuser : Ce lien vous dirige vers le formulaire de saisie du motif du refus de la proposition. Ce motif est obligatoirement saisie. Validez ce formulaire pour finaliser le passage � l\'�tat refus� de la proposition.') ;
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/listePropositionsPdfRefusee.php">'.XHTMLBuilder::getText('Propositions de stage PDF refus�es').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de visualiser les propositions de stage Pdf refus�es.') ;
	$retour .= '<br /><br />' ;	
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/listePropositionsPdf.php">'.XHTMLBuilder::getText('Statistiques et gestion des uploads').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de modifier ou supprimer une proposition Pdf. La modification de la proposition ne concerne que l\'intitul� de la proposition ainsi que les mots cl�s.') ;
	
	return $retour ;
}

function aideGestionSoutenance() {
	
	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formConsulterCalendrier.php">Consulter le calendrier</a> : '.XHTMLBuilder::getText('Cette partie pr�sente un tableau contenant les �tudiants avec leur date et lieu de soutenance ainsi que leur tuteur et leur relecteur. Si vous n\'avez pas fait les affectations, ces donn�es sont vides. Vous pouvez trier le tableau en cliquant sur les ent�tes de colonnes.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formAffecterSoutenance.php">Affecter une soutenance</a> : '.XHTMLBuilder::getText('Ce formulaire permet de choisir un type de stage puis un �tudiant et de lui affecter une date, un horaire et un lieu de soutenance.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formModifierSoutenance.php">Modifier une soutenance</a> : '.XHTMLBuilder::getText('Ce formulaire permet de choisir un type de stage puis un �tudiant dont la soutenance est d�j� affect�e et de modifier la date, l\'horaire et/ou le lieu de soutenance.') ;
	
	return $retour ;
}

function aideGestionTuteur() {

	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/consulterAffectationsTuteur.php">Consulter les affectations des tuteurs et relecteurs</a> : '.XHTMLBuilder::getText('Cette partie pr�sente un tableau contenant les �tudiants avec leur tuteur et leur relecteur. Si vous n\'avez pas fait les affectations, ces donn�es sont vides. Vous pouvez trier le tableau en cliquant sur les ent�tes de colonnes.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formAffecterTuteur.php">Affecter un tuteur et un relecteur</a> : '.XHTMLBuilder::getText('Ce formulaire permet de choisir un type de stage puis un �tudiant et de lui affecter un tuteur et un relecteur.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formModifierTuteur.php">Modifier un tuteur et un relecteur</a> : '.XHTMLBuilder::getText('Ce formulaire permet de choisir un type de stage puis un �tudiant dont le tuteur et le relecteur sont d�j� affect�s et de les modifier.') ;
	
	return $retour ;
}

function aideGestionEtudiant() {

	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/afficheEtudiant.php">'.XHTMLBuilder::getText('Liste des �tudiants').'</a> : '.XHTMLBuilder::getText('Cette partie pr�sente un tableau contenant tous les �tudiants avec leurs informations. Vous pouve<z trier le tableau en cliquant sur les ent�tes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' � gauche des ent�tes.<br />Choisissez un �tudiant gr�ce au bouton radio � gauche de son nom et cliquez sur le bouton \'Afficher\' ou \'Modifier\' pour acc�der � sa fiche d�taill�e ou au formulaire de modification de l\'�tudiant (seuls son mot de passe et son login sont modifiables).') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/L3/MIAGeScolarite/phpMyEdit/Etudiants.php\" target="blank">Ajouter un L3</a> : '.XHTMLBuilder::getText('Lien vers la base scolarit� pour ajouter un �tudiant en L3.<br />ATTENTION : Ce n\'est pas votre r�le d\'ajouter des �tudiants dans la base scolarit�. Demander � l\'administrateur de cette base de faire l\'ajout pour vous.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/M1/MIAGeScolarite/phpMyEdit/Etudiants.php\" target="blank">Ajouter un M1</a> : '.XHTMLBuilder::getText('Lien vers la base scolarit� pour ajouter un �tudiant en M1.<br />ATTENTION : Ce n\'est pas votre r�le d\'ajouter des �tudiants dans la base scolarit�. Demander � l\'administrateur de cette base de faire l\'ajout pour vous.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/M2/MIAGeScolarite/phpMyEdit/Etudiants.php\" target="blank">Ajouter un M2</a> : '.XHTMLBuilder::getText('Lien vers la base scolarit� pour ajouter un �tudiant en M2.<br />ATTENTION : Ce n\'est pas votre r�le d\'ajouter des �tudiants dans la base scolarit�. Demander � l\'administrateur de cette base de faire l\'ajout pour vous.') ;
	
	
	return $retour ;
}

function aideGestionEnseignant() {

	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/afficheEnseignant.php">'.XHTMLBuilder::getText('Liste des enseignants').'</a> : '.XHTMLBuilder::getText('Cette partie pr�sente un tableau contenant tous les enseignants avec leurs informations. Vous pouvez trier le tableau en cliquant sur les ent�tes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' � gauche des ent�tes.<br />Choisissez un enseignant gr�ce au bouton radio � gauche de son nom et cliquez sur le bouton \'Afficher\' ou \'Modifier\' pour acc�der � sa fiche d�taill�e ou au formulaire de modification de l\'enseignant (seul son statut vis � vis des stage est modifiable).') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/L3/MIAGeScolarite/phpMyEdit/Etudiants.php\"  target="blank">Ajouter un enseignant</a> : '.XHTMLBuilder::getText('Lien vers la base scolarit� pour ajouter un enseignant.<br />ATTENTION : Ce n\'est pas votre r�le d\'ajouter des enseignants dans la base scolarit�. Demander � l\'administrateur de cette base de faire l\'ajout pour vous.') ;
	
	
	return $retour ;
}

function aideGestionEntreprise() {
	
	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/afficheEntrepriseResume.php">'.XHTMLBuilder::getText('Liste des entreprises (affichage r�sum�)').'</a> : '.XHTMLBuilder::getText('Cette partie pr�sente un tableau contenant toutes les entreprises avec leurs informations. Vous pouvez trier le tableau en cliquant sur les ent�tes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' � gauche des ent�tes.<br />Choisissez une entreprise gr�ce au bouton radio � gauche de sa raison sociale et cliquez sur le bouton \'Afficher\', \'Modifier\' ou \'Supprimer\'.<br />\'Afficher\' : Affichage des informations.<br />\'Modifier\' : Propose un formulaire permettant de modifier les informations sur l\'entreprise.<br />\'Supprimer\' : Permet de supprimer l\'entreprise.<br />\'Ajouter\' : Ce bouton propose un formulaire d\'ajout d\'une entrpise') ;
	
	$retour .= '<br /><br />' ;

	$retour .=  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/afficheEntrepriseEtendu.php">'.XHTMLBuilder::getText('Liste des entreprises (affichage �tendu)').'</a> : '.XHTMLBuilder::getText('Cette partie pr�sente un tableau contenant toutes les entreprises avec leurs informations. Vous pouvez trier le tableau en cliquant sur les ent�tes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' � gauche des ent�tes.<br />Choisissez une entreprise gr�ce au bouton radio � gauche de sa raison sociale et cliquez sur le bouton \'Afficher\', \'Modifier\' ou \'Supprimer\'.<br />\'Afficher\' : Affichage des informations.<br />\'Modifier\' : Propose un formulaire permettant de modifier les informations sur l\'entreprise.<br />\'Supprimer\' : Permet de supprimer l\'entreprise.<br />\'Ajouter\' : Ce bouton propose un formulaire d\'ajout d\'une entrpise') ;
	
	$retour .= '<br /><br />' ;

	$retour .=  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/afficheEntrepriseTaxe.php">'.XHTMLBuilder::getText('Liste des entreprises avec la taxe d\'apprentissage').'</a> : '.XHTMLBuilder::getText('Cette partie pr�sente un tableau contenant toutes les entreprises avec leurs informations. Vous pouvez trier le tableau en cliquant sur les ent�tes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' � gauche des ent�tes.<br />Choisissez une entreprise gr�ce au bouton radio � gauche de sa raison sociale et cliquez sur le bouton \'Afficher\', \'Modifier\' ou \'Supprimer\'.<br />\'Afficher\' : Affichage des informations.<br />\'Modifier\' : Propose un formulaire permettant de modifier les informations sur l\'entreprise.<br />\'Supprimer\' : Permet de supprimer l\'entreprise.<br />\'Ajouter\' : Ce bouton propose un formulaire d\'ajout d\'une entrpise') ;

	return $retour ;
}



function aideEtudiantPerso() {
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/formDonneesEtudiant.php">'.XHTMLBuilder::getText('Modifier mes donn�es personnelles').'</a> : '.XHTMLBuilder::getText('Ce lien donne acc�s au formulaire de saisie de vos diff�rentes coordonn�es fac, stables et stage. Ces diff�rentes adresses sont importantes pour que l\'on vous envoie les avis de nouvelles propositions de stage d�pos�es sur le site ou lors du proc�ssus de signature de la convention. Veillez � leur validit�.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/formFicheStage.php">'.XHTMLBuilder::getText('Remplir une fiche de stage').'</a> : '.XHTMLBuilder::getText('Ce lien donne acc�s au formulaire de saisie d\'une fiche de stage. Pensez � v�rifier les donn�es pr�remplies. Les * signifient que le champ doit obligatoirement �tre renseign�.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/formModifFicheStage.php">'.XHTMLBuilder::getText('Modifier une fiche de stage non valid�e').'</a> : '.XHTMLBuilder::getText('Ce lien donne acc�s � une liste d�roulante proposant vos fiches de stages non valid�es par l\'administrateur. Choisissez une fiche dans la liste pour avoir acc�s au formulaire de modification. Les * signifient que le champ doit obligatoirement �tre renseign�.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/affichageFicheStage.php">'.XHTMLBuilder::getText('Voir mes fiche de stage').'</a> : '.XHTMLBuilder::getText('Ce lien donne acc�s � une liste d�roulante proposant vos fiches de stages avec leur �tat d\'�volution dans le processus de signature. Choisissez une fiche dans la liste pour la visualiser.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/voirAffectations.php">'.XHTMLBuilder::getText('Voir infos Tuteur/Relecteur & Soutenance').'</a> : '.XHTMLBuilder::getText('Cela vous permet de visualiser vos diff�rentes soutenances lorsqu\'elles sont programm�es. Pour cela vous devez avoir une fiche de stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/voirPropositions.php">'.XHTMLBuilder::getText('Voir les propositions de stage').'</a> : '.XHTMLBuilder::getText('Cela vous permet de visualiser l\'ensemble des propositions de stage en commen�ant par votre promotion. Cliquez sur le nom de l\'entreprise pour voir ses infos. Cliquez sur l\'intitul� du stage pour voir son d�tail.<br />IMPORTANT : Pour que la MIAGe est un meilleur suivi avec les entreprises pensez � r�pondre au sondage sur les candidatures en cliquant sur le lien  \'Allez vous ou avez vous envoyer votre candidature?\'<br />NOTE : Certaines propositions sont marqu�es comme faisant l\'objet d\'une fiche de stage mais vous pouvez tout de m�me envoyer votre candidature. Certainres entreprises souhaitent recruter plusieurs stagiaires.') ;
	
	$retour .= '<br /><br />' ;
	

	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/consultationOffrePDF.php">'.XHTMLBuilder::getText('Voir les propositions de stage au format PDF').'</a> : '.XHTMLBuilder::getText('Cela vous permet de consulter ou télécharger les offres de stage au format PDF. Les fichiers sont triés selon l\'année d\'envoi de la proposition. Vous pourrez ainsi consulter des offres des années précédentes qui seront archivées.') ;

	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/voirAnciennesPropositions.php">'.XHTMLBuilder::getText('Voir les propositions des ann�es pr�c�dentes').'</a> : '.XHTMLBuilder::getText('Affiche un tableau contenant les propositions de stages saisies les ann�es pr�c�dentes. Vous pouvez trier le tableau en cliquant sur les ent�tes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' � gauche des ent�tes.<br />Choisissez une proposition en s�lectionnant le bouton radio � sa gauche et cliquez sur \'Afficher\' pour voir son d�tail. Vous pourrez alors voir le sujet de stage, le domaine d\'application et surtout une adresse mail de contact pour envoyer une candidature spontan�e. Les entreprises peuvent reprendre des stagiaires d\'une ann�e sur l\'autre.') ;

	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/etudiant/formFicheDevenir.php">'.XHTMLBuilder::getText('Remplir une fiche devenir').'</a> : '.XHTMLBuilder::getText('Ce lien donne acc�s � un formulaire permettant de renseigner le devenir de l\'�tudiant Il correspond � la fiche devenir qui �tait envoy� par mail par le responsable des stages. ') ;

	
	return $retour ;
}

function aideEtudiantGnrl() {	
	$retour = XHTMLBuilder::getText('Cette partie contient des informations g�n�rales sur la fa�on de chercher un stage, la proc�dure de validation d\'une fiche de stage, le d�roulement du stage et comment r�diger le rapport et pr�parer la soutenance.');
	
	return $retour ;
}



function aideEnseignantPerso() {
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/consulterEtudiantsASuivre.php">'.XHTMLBuilder::getText('Stagiaires � suivre').'</a> : '.XHTMLBuilder::getText('Affiche un tableau contenant l\'ensemble des �tudiants que vous devez suivre. Ce tableau pr�sente la promo et le nom de l\'�tudiant ainsi que sa soci�t� d\'accueil, le nom du ma�tre de stage et son sujet de stage. Vous pouvez trier le tableau en cliquant sur les ent�tes de colonnes. Cliquez sur les liens dans les cellules du tableau pour voir le d�tail.') ;

	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<h3><a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/accueilGestionVisites.php">'.XHTMLBuilder::getText('Gestion des visites').'</a> : </h3>' ;
	
	$retour .= aideEnseignantGestionVisites() ;
	
	$retour .= '<br /><hr /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/consulterSoutenances.php">'.XHTMLBuilder::getText('Soutenances � suivre').'</a> : '.XHTMLBuilder::getText('Affiche un tableau contenant l\'ensemble des soutenances auxquelles vous devez assister en tant que tuteur ou relecteur. Le tableau pr�sente le type de stage et le nom de l\'�tudiant puis les informations sur la soutenance comme sa date, son lieu, les noms du tuteur et du relecteur. Vous pouvez trier les colonnes en cliquant sur leur ent�te.') ;
		
	return $retour ;
}

function aideEnseignantGestionVisites() {
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/consulterEtudiantsASuivre.php">'.XHTMLBuilder::getText('Consulter les visites').'</a> : '.XHTMLBuilder::getText('Affiche un tableau contenant l\'ensemble des visites que vous devez effectuer en tant que tuteur. Le tableau pr�sente la promo et le nom de l\'�tudiant ainsi que les diff�rents avis sur la correspondance, celui de l\'�tudiant, du ma�tre de stage et le votre. Il est possible de trier les colonnes en cliquant sur leur ent�te.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/formSaisirVisite.php">'.XHTMLBuilder::getText('Saisir une visite').'</a> : '.XHTMLBuilder::getText('Donne acc�s au formulaire de saisie d\'une visite. Choisissez le type de stage puis l\'�tudiant que vous avez visit�. Saisissez alors les champs obligatoires signal�s par une * et valider') ;

	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/enseignant/formModifierVisite.php">'.XHTMLBuilder::getText('Modifier une visite').'</a> : '.XHTMLBuilder::getText('Donne acc�s au formulaire de modification d\'une visite. Choisissez le type de stage puis l\'�tudiant que vous avez visit� et que vous souhaitez modifier. Saisissez alors les champs obligatoires signal�s par une * et valider la modification.') ;

	return $retour ;
}

function aideEnseignantGnrl() {
	$retour = XHTMLBuilder::getText('Cette partie contient des informations g�n�rales sur la fa�on dont l\'encadrement des stagiaires et la visite dans l\'entreprise doivent se passer ainsi que sur l\'�valuation du stagiaire.');
	
	return $retour ;
}



function aideSecretaire() {
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/secretaire/gestionFicheStage.php">'.XHTMLBuilder::getText('Modifier une fiche de stage non valid�e').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de modifier les fiches de stage en attente de validation. Vous acc�dez � un tableau que vous pouvez trier en cliquant sur les ent�tes des colonnes. Choisissez un type de stage pour affiner votre recherche.<br />Si vous choisissez un �tudiant dans la liste d�roulante le d�tail de la fiche de stage s\'affiche en dessous de la liste.<br />Si vous cliquez sur l\'intitul� du stage dans le tableau la fiche de stage s\'ouvre dans une nouvelle fen�tre dans une version imprimable.<br />L\'icone <img alt="imgModifFicheStage" src="'.$GLOBALS['URL_ROOT_PATH'].'/image/b_edit.png" title="Modifier la fiche de stage" /> donne acc�s au formulaire de modification de la fiche de stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/secretaire/signatureEntrepriseFicheStage.php">'.XHTMLBuilder::getText('Remettre fiche � l\'�tudiant').'</a> : '.XHTMLBuilder::getText('Vous acc�dez � un formulaire permettant de choisir le type de stage puis l\'�tudiant. Une fois ce dernier s�lectionn� sa fiche de stage appara�t ainsi qu\'un bouton \'Remis Etudiant\' qui permet de changer l\'�tat de la fiche de stage � \'signature entreprise\'. Cela signifie que la convention de stage est remise � l\'�tudiant pour la signature de l\'entreprise.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/secretaire/signatureUniversiteFicheStage.php">'.XHTMLBuilder::getText('Signature de l\'universit�').'</a> : '.XHTMLBuilder::getText('Vous acc�dez � un formulaire permettant de choisir le type de stage puis l\'�tudiant. Une fois ce dernier s�lectionn� sa fiche de stage appara�t ainsi qu\'un bouton \'Signature Universite\' qui permet de changer l\'�tat de la fiche de stage � \'Signature universite\'. Cela signifie que la convention de stage est de retour, sign�e par l\'entreprise, pour la signature de l\'universit�.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/secretaire/finalisationFicheStage.php">'.XHTMLBuilder::getText('Finaliser une fiche de stage').'</a> : '.XHTMLBuilder::getText('Vous acc�dez � un formulaire permettant de choisir le type de stage puis l\'�tudiant. Une fois ce dernier s�lectionn� sa fiche de stage appara�t ainsi qu\'un bouton \'Finaliser\' qui permet de changer l\'�tat de la fiche de stage � \'Termin�e\'. Cela signifie que la convention de stage sign�e par tous les partis et que l\'�tudiant peut partir en stage.') ;	
	
	return $retour ;
}

function aideAdminGestionFiche() {
	
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/gestionFicheStage.php">'.XHTMLBuilder::getText('Validation des fiches de stages').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de modifier les fiches de stage en attente de validation. Vous acc�dez � un tableau que vous pouvez trier en cliquant sur les ent�tes des colonnes. Choisissez un type de stage pour affiner votre recherche.<br />Si vous choisissez un �tudiant dans la liste d�roulante le d�tail de la fiche de stage s\'affiche en dessous de la liste.<br />Si vous cliquez sur l\'intitul� du stage dans le tableau la fiche de stage s\'ouvre dans une nouvelle fen�tre dans une version imprimable.<br />L\'icone <img alt="imgModifFicheStage" src="'.$GLOBALS['URL_ROOT_PATH'].'/image/b_edit.png" title="Modifier la fiche de stage" /> donne acc�s au formulaire de modification de la fiche de stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .=  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/modifEtatFiche.php">'.XHTMLBuilder::getText('Etat des fiches de stage').'</a> : '.XHTMLBuilder::getText('Cette partie pr�sente un tableau contenant tous les fiches de stages avec leurs informations. Vous pouvez trier le tableau en cliquant sur les ent�tes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' � gauche des ent�tes.<br />Choisissez une fiche de stage gr�ce au bouton radio et cliquez sur le bouton \'Afficher\' pour afficher de plus amples informations. Cliquez sur le bouton \'Modifier\' pour modifier l\'�tat de la fiche de stage') ;
	
	return $retour ;
}

function aideAdminGestionSuivi() {
	
	$retour =  '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/modifEtatSuivi.php">'.XHTMLBuilder::getText('Etat des fiches de Suivi').'</a> : '.XHTMLBuilder::getText('Cette partie pr�sente un tableau contenant tous les fiches de suivi avec leurs informations. Vous pouvez trier le tableau en cliquant sur les ent�tes de colonnes, afficher un formulaire de recherche en cliquant sur le bouton \'V\' � gauche des ent�tes.<br />Choisissez une fiche de suivi gr�ce au bouton radio et cliquez sur le bouton \'Afficher\' pour afficher de plus amples informations. Cliquez sur le bouton \'Modifier\' pour modifier l\'�tat de la fiche de suivi.') ;
	
	return $retour ;
}
//modif_wiki : rajout de cette fonction
function aideChercherStage() {
	
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/SourcesInfo.php">'.XHTMLBuilder::getText('Sources d\'informations diverses').'</a> : '.XHTMLBuilder::getText('Cette partie vous liste les diff�rents endroits o� vous pourrez trouver un stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Entreprises.php">'.XHTMLBuilder::getText('Liste d\'entreprises').'</a> : '.XHTMLBuilder::getText('Cette partie vous pr�sente l\'aide que peuvent avoir les M1 et M2 durant leur stage.') ;
	
	$retour .= '<br /><br />' ;
	
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/ConseilsCV.php">'.XHTMLBuilder::getText('Conseils pour le CV').'</a> : '.XHTMLBuilder::getText('Cette partie vous conseille sur la r�daction de votre CV ou de votre lettre de motivation.') ;
	
	$retour .= '<br /><br />' ;
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/ConseilsEntretien.php">'.XHTMLBuilder::getText('Conseils pour l\'entretien').'</a> : '.XHTMLBuilder::getText('Cette partie vous explique comment pr�parer un entretien.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Etranger.php">'.XHTMLBuilder::getText('Informations stages � l\'�tranger').'</a> : '.XHTMLBuilder::getText('Cette partie vous informe sur les stages � l\'�tranger.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/ValiderStage.php">'.XHTMLBuilder::getText('Validation d\'un stage').'</a> : '.XHTMLBuilder::getText('Cette partie vous montre la d�marche � effectuer pour valider votre stage.') ;
	
	$retour .= '<br /><br />' ;
	return $retour ;
}

//modif_wiki : rajout de cette fonction
function aideEntreprises() {

	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/stages.php">'.XHTMLBuilder::getText('Les stages').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de consulter les dates de remises des rapports ains que les dates des soutenances de toutes les promotions.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/partenariat.php">'.XHTMLBuilder::getText('Le partenariat').'</a> : '.XHTMLBuilder::getText('Cette partie pr�sente et r�sume les diff�rentes possibilit�s de coop�ration entre les entreprises et la Miage de Bordeaux.') ;
	
	$retour .= '<br /><br />' ;
	
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Partenaires.php">'.XHTMLBuilder::getText('Les partenaires').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de conna�tre les partenaires les plus actifs au sein de la MIAGe.') ;
	
	$retour .= '<br /><br />' ;
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Enseigner.php">'.XHTMLBuilder::getText('Enseigner � la Miage').'</a> : '.XHTMLBuilder::getText('Cette partie vous donne des renseignements sur "Comment enseigner � la MIAGe".') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Taxe.php">'.XHTMLBuilder::getText('Verser la taxe d\'apprentissage').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de savoir comment verser la taxe d\'apprentissage. ') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Competences.php">'.XHTMLBuilder::getText('Comp�tences des miagistes').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de conna�tre les comp�tences acquises par les miagistes au cours de leurs cursus.') ;
	
	$retour .= '<br /><br />' ;
	return $retour ;
}
//modif_wiki : rajout de cette fonction
function aideDeroulementStage() {

	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Conseils.php">'.XHTMLBuilder::getText('Conseils').'</a> : '.XHTMLBuilder::getText('Cette partie vous donne quelquels conseils concenrnant le d�roulement du stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Outils.php">'.XHTMLBuilder::getText('Outils').'</a> : '.XHTMLBuilder::getText('Cette partie vous informe de la proc�dure � suivre afin de valider un stage � travers les outils fournis, � savoir APOGEE et le Site des stages de la MIAGe.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Encadrement.php">'.XHTMLBuilder::getText('Encadrement').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de savoir comment est encadrer votre stage.') ;
	
	$retour .= '<br /><br />' ;
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/VisiteStage.php">'.XHTMLBuilder::getText('Visite de stage').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de vous donner des informations sur la visite du tuteur de stage.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/EvaluationStage.php">'.XHTMLBuilder::getText('Evaluation lors du stage').'</a> : '.XHTMLBuilder::getText('Cette partie vous permet de conna�tre les modalit�s d\'�valuation du stage.') ;
	
	$retour .= '<br /><br />' ;
	
	return $retour ;
}

//modif_wiki : rajout de cette fonction
function aideSoutenanceStage() {
	
	$retour = '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Rapport.php">'.XHTMLBuilder::getText('Le rapport').'</a> : '.XHTMLBuilder::getText('Cette partie vous conseille les bonnes m�thodes � appliquer pour faire un rapport.') ;
	
	$retour .= '<br /><br />' ;
	
	$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Soutenance.php">'.XHTMLBuilder::getText('La soutenance').'</a> : '.XHTMLBuilder::getText('Cette partie vous informe sur la soutenance.') ;
	
	$retour .= '<br /><br />' ;
	
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/Exemples.php">'.XHTMLBuilder::getText('Exemples').'</a> : '.XHTMLBuilder::getText('Cette partie vous pr�sente diff�rents exemples de rapport et soutenance de stage.') ;
	
	$retour .= '<br /><br />' ;
		$retour .= '<a href="'.$GLOBALS['URL_ROOT_PATH'].'/admin/formConsulterCalendrier.php">'.XHTMLBuilder::getText('Calendrier des soutenances').'</a> : '.XHTMLBuilder::getText('Cette partie vous montre le calendrier des soutenances.') ;
	
	$retour .= '<br /><br />' ;
	
	return $retour ;
}

?>

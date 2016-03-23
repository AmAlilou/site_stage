<?php
set_include_path ( "." . PATH_SEPARATOR . ".." );
if (! isset ( $ROOT_PATH ))
	require_once ("inc/main.inc.php");
class MenuBuilder {
	public function __construct() {
	}
	
	
	public function buildTopMenu () {
		
		$menue .= "<li><a title=\"Retourner à l'accueil des Stages\" href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/\"><i class=\"fa fa-home\"></i></a></li>";
		$menue .= "<li><a title=\"Retourner à l'accueil MIAGE\" href=\"" . $GLOBALS ['SITE_MIAGE_ROOT_PATH'] . "\"><i class=\"fa fa-reply\"></i></a></li>";
	//	$menue .= "<li><a onclick=showPopupForm(\"Responsable_des_stages\",'" . $mailsRespStage . "') title=\"Contact us\" ><i class=\"fa fa-envelope\"></i></a></li>";
		$menue .= "<li><a href=\"#myModal\" role=\"button\"  data-toggle=\"modal\" title=\"Contact us\" ><i class=\"fa fa-envelope\"></i></a></li>";
		
			if( SessionManager::isSomeoneLogged ()){
				$menue.="<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/deconnexion.php\"><i class=\"fa fa-user\"></i> Déconnexion</a></li>";
				
			}else{
				$menue.="";
			}
			
			return $menue;
	}
	
	public function buildMenu() {
		$menu = "<ul class=\"h-menue nav navbar-nav\">\n";
		// $menu .= $this->__buildAccueil ();
		// $menu .= $this->__buildContact ();
		$menu .= $this->__buildAjoutProposition ();
		$menu .= $this->__buildAcces ();
		 if (! SessionManager::isSomeoneLogged ())
		 $menu .= $this->__buildInformationsGenerales ();
		
		 else if (SessionManager::isEtudiantLogged ()) {
		 $menu .= $this->__buildInfosGenEtud ();
		 } else if (SessionManager::isEnseignantLogged ()) {
		 $menu .= $this->__buildInfosGenEns ();
	   }
		$menu .= "</ul>";
		
		return $menu;
	}
		
	// <li><a onclick=showPopupForm("Secretariat","' . $mailsSecretariat . '")>Secrétariat</a></li>
	private function __buildContact() {
		$mailsRespStage = DBConfig::getConfigValue ( "MAIL ADMINISTRATEURS" );
		$mailsSecretariat = DBConfig::getConfigValue ( "MAIL SECRETARIAT" );
		// remplacement de la virgule pour l'envoi à plusieurs destinataires'
		$mailsRespStage = str_replace ( ",", ";", $mailsRespStage );
		return '  <li class=\"dropdown\"> 
					<a href=\"javascript:void(0);\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Contact
				    <ul  class=\"dropdown-menu\">
				      <li><a  onclick=showPopupForm("Responsable_des_stages","' . $mailsRespStage . '")>Responsable des stages</a></li>
				      <li><a href="' . $GLOBALS ['URL_ROOT_PATH'] . '/affichePermanences.php">Permanences</a></li>
				    </ul>
  				</li>';
	}
	
	private function __buildAjoutProposition() {
		return "  <li class=\"dropdown\">
				 		<a href=\"javascript:void(0);\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            Déposer une Proposition de stage
                        </a>
    			  		<ul class=\"dropdown-menu\">
							<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/entreprise/formPropStage.php\">Remplir un formulaire</a></li>
							<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/entreprise/formPropStageUpload.php\">Déposer une proposition pdf</a></li>
						</ul>
  				  </li>";
	}
	private function __buildAcces() {
		if (! SessionManager::isSomeoneLogged ())
			return "  <li  class=\"dropdown\">
							<a href=\"javascript:void(0);\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                           		Accès en tant que
                        	</a> 
						    <ul class=\"dropdown-menu\">
						      <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/connexionEtudiant.php\">Etudiant</a></li>
						      <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/connexionEnseignant.php\">Enseignant</a></li>
						      <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/connexionAdmin.php\">Administrateur</a></li>
						      <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/connexionSecretaire.php\">Secrétaire</a></li>
						    </ul>
					  </li>";
		
		else if (SessionManager::isEtudiantLogged ())
			return " <li class=\"dropdown\">
							<a  href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/etudiant/accueilEtudiant.php\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                           		Menu Etudiant
                        	</a> 
							<ul  class=\"dropdown-menu\">		
				      			<li class=\"dropdown-submenu\">
									<a href=\"javascript:void(0);\">
		                           		Informations Personnelles
		                        	</a>
									<ul class=\"dropdown-menu\">
									 <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/etudiant/formDonneesEtudiant.php\">Modifier mes données personnelles</a></li>
							          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/etudiant/formFicheStage.php\">Remplir une fiche de stage</a></li>
							          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/etudiant/formModifFicheStage.php\">Modifier une fiche de stage non validée</a></li>
							          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/etudiant/affichageFicheStage.php\">Voir mes fiches de stages</a></li>
							          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/etudiant/voirAffectations.php\">Voir infos Tuteur/Relecteur & Soutenance</a></li>
							          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/etudiant/voirPropositions.php\">Voir les propositions de stage</a></li>
							          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/etudiant/consultationOffrePDF.php\">Voir les propositions de stage au format PDF</a></li>
									  <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/etudiant/voirAnciennesPropositions.php\">Voir les propositions des années précédentes</a></li>
									  <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/etudiant/formFicheDevenir.php\">Remplir ou modifier une fiche devenir</a></li>
									</ul>
								</li> 
							</ul>
				      </li>";
		
		else if (SessionManager::isEnseignantLogged ()) {
			$res = " <li class=\"dropdown\">
						<a  href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/enseignant/accueilEnseignant.php\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                           		Menu Enseignant
                        </a> 
						<ul  class=\"dropdown-menu\">		
				      			<li class=\"dropdown-submenu\">
									<a href=\"javascript:void(0);\">
		                           		Informations Personnelles
		                        	</a>
									<ul class=\"dropdown-menu\">
										<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/enseignant/consulterEtudiantsASuivre.php\">Stagiaires à suivre</a></li>
                						<li  class=\"dropdown-submenu\">
											<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=GestionVisite\">Gestion des visites</a>";
			
			//if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "GestionVisite" )) {
				$res .= "
								                 <ul class=\"dropdown-menu\">
								                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/enseignant/consulterVisites.php\">Consulter</a></li>
								                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/enseignant/formSaisirVisite.php\">Saisir</a></li>
								                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/enseignant/formModifierVisite.php\">Modifier</a></li>
								                 </ul>
								         </li>";
		//	}
			$res .= "
                						<li>
											<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/enseignant/consulterSoutenances.php\">Soutenances à suivre</a>
										</li>
									 </ul>
								 </li> 
							</ul>
						</li>";
			return $res;
		} else if (SessionManager::isAdminLogged ()) {
			$res = "  <li  class=\"dropdown\">
							<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/accueilAdmin.php\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Menu Administration</a>
					         <ul class=\"dropdown-menu\">
					            <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/tableauBordStages.php\">Tableau de bord des Fiches/Propositions</a></li>
								<li class=\"dropdown-submenu\">
					            	<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=GestionFiche\">Gestion des Fiches de stage</a>";
			// if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "GestionFiche" )) {
			$res .= "
						                 <ul class=\"dropdown-menu\">
						                    <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/gestionFicheStage.php\">Validation des fiches de stage</a></li>
											<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/modifEtatFiche.php\">Etat des fiches de stage</a></li>
						                 </ul>
								</li> 			
              			 </li>";
			// }
			
			$res .= " 	<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=GestionSuivi\">Gestion des Fiches de suivi</a></li>
		 
            			<li  class=\"dropdown-submenu\"><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=GestionProposition\">Gestion des Propositions de stage</a>";
			
			// if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "GestionProposition" )) {
						$res .= "
			                 <ul class=\"dropdown-menu\">
			                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/gestionPropositionStage.php?action=avalider\">Propositions de stage à valider</a></li>
			                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/gestionPropositionStage.php?action=valider\">Propositions de stage validées</a></li>
					   			<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/gestionPropositionStage.php?action=pourvue\">Propositions de stage pourvues</a></li>
			                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/gestionPropositionStage.php?action=refuser\">Propositions de stage refusées</a></li>
			                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/modifierPropositionStage.php\">Modifier des propositions de stage</a></li>";
						// <li><a href=\"".$GLOBALS['URL_ROOT_PATH']."/admin/formUploadProp.php\">Uploader des propositions de stage</a></li>
						$res .= "<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/formPropStageUpload.php\">Uploader une proposition pdf</a></li>
							   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/gestionPropositionStagePdf.php\">Propositions de stage PDF à valider</a></li>
			                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/listePropositionsPdfRefusee.php\">Propositions de stage Pdf refusées</a></li>
							   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/listePropositionsPdf.php\">Statistiques et gestion des uploads</a></li>
			                 </ul>
            
						</li> 
				 </li>";
			// }
			$res .= " <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=GestionRapports\">Gestion des rapports</a>  ";
			$res .= "<li  class=\"dropdown-submenu\">
						<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=GestionSoutenance\">Gestion des soutenances</a>  ";
			
			//if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "GestionSoutenance" )) {
						$res .= "
		                 <ul class=\"dropdown-menu\">
		                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/formConsulterCalendrier.php\">Consulter le calendrier</a></li>
		                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/formAffecterSoutenance.php\">Affecter</a></li>
		                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/formModifierSoutenance.php\">Modifier</a></li>
		                 </ul>
               		</li>";
			//}
			
			$res .= " <li  class=\"dropdown-submenu\">
						<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=GestionTuteur\">Gestion des tuteurs/relecteurs</a>";
			
// 			if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "GestionTuteur" )) {
						$res .= "
		                 <ul class=\"dropdown-menu\">
		                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/consulterAffectationsTuteur.php\">Consulter les affectations</a></li>
		                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/formAffecterTuteur.php\">Affecter</a></li>
		                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/formModifierTuteur.php\">Modifier</a></li>
		                 </ul>
               		</li>";
// 			}
			$res .= "<li class=\"dropdown-submenu\">
						<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=Etudiant\">Gestion des étudiants</a>";
			//	if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "Etudiant" )) {
						$res .= "
		                 <ul class=\"dropdown-menu\">
		                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/afficheEtudiant.php\">Liste des étudiants</a></li>
		                   <li><a href=\"https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/L3/MIAGeScolarite/phpMyEdit/Etudiants.php\" target=\"blank\">Ajout L3</a></li>
		                   <li><a href=\"https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/M1/MIAGeScolarite/phpMyEdit/Etudiants.php\" target=\"blank\">Ajout M1</a></li>
		                   <li><a href=\"https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/M2/MIAGeScolarite/phpMyEdit/Etudiants.php\" target=\"blank\">Ajout M2</a></li>
		                 </ul>
               		</li>";
			//}
			
			$res .= "<li class=\"dropdown-submenu\">
							<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=Enseignant\">Gestion des enseignants</a>";
		// 			if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "Enseignant" )) {
						$res .= "
			                 <ul class=\"dropdown-menu\">
			                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/afficheEnseignant.php\">Liste des enseignants</a></li>
			                   <li><a href=\"https://miage.emi.u-bordeaux1.fr/prod/miageBx/espaceDirection/L3/MIAGeScolarite/phpMyEdit/Enseignants.php\" target=\"blank\">Ajout Enseignant</a></li>
			                 </ul>
               		</li>";
// 			}
			
			$res .= "
            	<li class=\"dropdown-submenu\">
					<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=EntrepriseAdmin\">Gestion des entreprises</a>";
			//if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "EntrepriseAdmin" )) {
				$res .= "
	                 <ul  class=\"dropdown-menu\">
	                   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/afficheEntrepriseResume.php\">Mode résumé</a></li>
					   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/afficheEntrepriseEtendu.php\">Mode étendu</a></li>
					   <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/afficheEntrepriseTaxe.php\">Avec taxe d'apprentissage</a></li>
	                 </ul>
               </li>";
		//	}
		
		
          $res .= 
          "</ul>
        </li>";
          $res .= "
			<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/configContacts.php\">Configuration du site</a></li>";
          $res .= "
			<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/website/\" target=\"_blanc\">Documentation du code</a></li>";
		return $res;
		} else if (SessionManager::isSecretaireLogged ())
			return "<li  class=\"dropdown\">
						<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/secretaire/accueilSecretaire.php\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Menu Secrétaire</a>
					    <ul class=\"dropdown-menu\">
						  <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/secretaire/gestionFicheStage.php\">Modifier une fiche de stage non validée</a></li>
					      <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/secretaire/signatureEntrepriseFicheStage.php\">Remettre fiche à l'étudiant</a></li>
						  <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/secretaire/signatureUniversiteFicheStage.php\">Signature de l'Université</a></li>
					      <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/secretaire/finalisationFicheStage.php\">Finaliser une fiche de stage</a></li>
					    </ul>
  					</li>";
	}
	
	// création du menu Etudiant
	private function __buildInfosGenEtud() {
		$infosGen = "<li class=\"dropdown\">
						 <a href=\"javascript:void(0);\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Informations Générales</a>
					     <ul class=\"dropdown-menu\">
					       	<li class=\"dropdown-submenu\">
								<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=RechercheStandard\">Chercher un stage</a>";
		//if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "RechercheStandard" ))
							$infosGen .= "
						        <ul class=\"dropdown-menu\">
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/SourcesInfo.php\">Sources d'informations diverses</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Entreprises.php\">Entreprises qui recrutent</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/ConseilsCV.php\">Conseils : le CV</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/ConseilsEntretien.php\">Conseils : l'entretien</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Etranger.php\">Faire un stage à l'étranger</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/ValiderStage.php\">Valider un stage</a></li>
						        </ul>
						     </li>";
		
				$infosGen .= "
	      					<li class=\"dropdown-submenu\">
								<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=DeroulementStage\">Déroulement du stage</a>";
		//if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "DeroulementStage" ))
							$infosGen .= "
						        <ul class=\"dropdown-menu\">
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Conseils.php\">Conseils</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Outils.php\">Outils</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Encadrement.php\">Encadrement</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/VisiteStage.php\">Visite de stage</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/EvaluationStage.php\">Evaluation lors du stage</a></li>
						        </ul>
						     </li>";
		
				$infosGen .= "
							<li>
								<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=ListeRapportsEtu\">Consulter un rapport de stage</a> 
							</li>
      						<li class=\"dropdown-submenu\">
								<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=SoutenanceStage\">Rapport et soutenance de stage</a>";
		
		//if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "SoutenanceStage" ))
							$infosGen .= "
							     <ul class=\"dropdown-menu\">
							        <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Rapport.php\">Le rapport</a></li>
							        <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Soutenance.php\">La soutenance</a></li>
							        <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Exemples.php\">Exemples</a></li>
							        <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/formConsulterCalendrier.php\">Calendrier des soutenances</a></li>
							      </ul>
							  </li>";
		
		$infosGen .= "
	  				</ul>
  				</li>";
		return $infosGen;
	}
	// création du menu Enseignant
	private function __buildInfosGenEns() {
		$infosGen = "<li  class=\"dropdown\">
						<a href=\"javascript:void(0);\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Informations Générales</a>
					    <ul class=\"dropdown-menu\">
			                <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/EncadrementEnseignant.php\">Encadrement</a></li>
			                <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/VisiteStage.php\">Visite de stage</a></li>
			                <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/EvaluationStage.php\">Evaluation lors du stage</a></li>
							<li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/enseignant/listeRapports.php\">Consulter un rapport de stage</a></li>
							
						</ul>
					  </li>";
		return $infosGen;
	}
	private function __buildInformationsGenerales() {
		$infosGen = "<li  class=\"dropdown\">
						<a href=\"javascript:void(0);\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Informations Générales</a>
					    <ul class=\"dropdown-menu\">
					      <li class=\"dropdown-submenu\">
							<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=Entreprises\">Entreprises</a>";
							//if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "Entreprises" )) {
								$promo = DBConfig::getConfigValue ( "ANNEE PROMO" );
								$infosGen .= "
						        <ul class=\"dropdown-menu\">
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/stages.php\">Les Stages $promo - " . ($promo + 1) . "</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/partenariat.php\">Le partenariat</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Partenaires.php\">Les partenaires</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Enseigner.php\">Enseigner à la MIAGe</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Taxe.php\">Verser la taxe d'apprentissage</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Competences.php\">Compétences des miagistes</a></li>
						        </ul>
						    </li>";
							//}
		
			   $infosGen .= "<li class=\"dropdown-submenu\">
			   					<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=RechercheStandard\">Chercher un stage</a>";
		
		//if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "RechercheStandard" ))
						$infosGen .= "
						        <ul class=\"dropdown-menu\">
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/SourcesInfo.php\">Sources d'informations diverses</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Entreprises.php\">Entreprises qui recrutent</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/ConseilsCV.php\">Conseils : le CV</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/ConseilsEntretien.php\">Conseils : l'entretien</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Etranger.php\">Faire un stage à l'étranger</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/ValiderStage.php\">Valider un stage</a></li>
						        </ul>
						      </li>";
		
			   $infosGen .= "     
      						<li class=\"dropdown-submenu\">
			   					<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=DeroulementStage\">Déroulement du stage</a>";
		
		//if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "DeroulementStage" ))
						$infosGen .= "
						        <ul class=\"dropdown-menu\">
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Conseils.php\">Conseils</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Outils.php\">Outils</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Encadrement.php\">Encadrement</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/VisiteStage.php\">Visite de stage</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/EvaluationStage.php\">Evaluation lors du stage</a></li>
						        </ul>
						      </li>";
		
				$infosGen .= "
      						<li class=\"dropdown-submenu\">
								<a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/expandInfosGen.php?option=SoutenanceStage\">Rapport et soutenance de stage</a>";
		
		//if (SessionManager::isThereMenuExpanded () && SessionManager::isExpanded ( "SoutenanceStage" ))
						$infosGen .= "
						        <ul class=\"dropdown-menu\">
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Rapport.php\">Le rapport</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Soutenance.php\">La soutenance</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/Exemples.php\">Exemples</a></li>
						          <li><a href=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/admin/formConsulterCalendrier.php\">Calendrier des soutenances</a></li>
						        </ul>
						      </li>";
		
		$infosGen .= "
    </ul>
  </li>
";
		return $infosGen;
	}
}
?>


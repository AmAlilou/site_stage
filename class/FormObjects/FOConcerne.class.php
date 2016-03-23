<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
/**
* @package FormObjects
* @abstract Classe de parametrage du formulaire de modification d'une proposition de stage
* @var String nom du champ pour le type de stage
* @var String nom du champ pour l'entreprise qui a proposé le stage
*/
class FOConcerne extends FormObject{
    public static $CHAMP_FORM_ID_TYPE_STAGE = "id_type_stage";
    public static $CHAMP_FORM_ID_PROPOSITION_STAGE = "id_proposition_stage";

    protected $_idsTypesStage;
    protected $_idPropStage;
	
	/**
	* @abstract Méthode d'initialisation du formulaire de modification ou d'ajout de proposition de stage
	* @access public
	*/
    
    public function init(){
        $typesStage = DBTypeStage::getRecords();
        $listeTypeStage=array();
        foreach($typesStage as $typeStage)
            if((isset($_POST[FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE."__".$typeStage->getIdTypeStage()])?$_POST[FOConcerne::$CHAMP_FORM_ID_TYPE_STAGE."__".$typeStage->getIdTypeStage()]:0))
                $listeTypeStage[count($listeTypeStage)]=$typeStage->getIdTypeStage();

        $this->_idsTypesStage =$listeTypeStage;
    }
    /**
	* @abstract Méthode de vérification de la validité des données saisies dans le formulaire
	* @access public
	* @return boolean True si les données sont valides
	*/
    public function isValid(){
        if(count($this->_idsTypesStage)==0)
              $this->setErrorMessage("Erreur : aucun type de stage n'a été sélectionné !");
        return ($this->getErrorMessage() == "");
    }
	
	/**
	* @abstract Méthode de traitement des données saisies dans le formulaire. Envoie un mail à l'admin si l'ajour ou  la modif se passe bien. Envoie un message d'erreur sinon
	* @access public
	*/
    
    public function process(){
        $propositionStage = $this->getPostFormManager()->getFormObjectResult("Proposition stage");
        for($i=0;$i<count($this->_idsTypesStage);$i++)
        {
            $typeStage=DBTypeStage::getRecords($this->_idsTypesStage[$i]);
            assert(count($typeStage)==1);

            DBConcerne::createRecord($typeStage[0],$propositionStage);
        }

        // Mail à l'administrateur
        if($propositionStage->notificationAdministrateurAjout())
            $this->setOKMessage("L'administrateur a été informé par mail de votre proposition. Cette dernière devra être validé pour être rendue disponible auprès des étudiants. Vous serez informé de cette validation ou, si un refus est effectué par l'administrateur, vous serez informé du motif du refus.");
        else
            $this->setOKMessage("Erreur lors de l'envoi de mail à l'administrateur !");
    }
}
?>
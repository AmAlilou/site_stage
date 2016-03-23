<?php

set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

class FOModificationConcerne extends FOConcerne{

    public function process(){
        //on reccup�re l'id de la proposition de stage
        $propositionStage = $this->getPostFormManager()->getFormObjectResult("Proposition stage");
        $this->_idPropStage=$propositionStage->getIdPropositionStage();
        $propositionStage=DBPropositionStage::getRecords($this->_idPropStage);
        assert(count($propositionStage)==1);
        //on supprime les anciens enregistrements dans la table concerne
        $concernes=DBConcerne::getRecords("",$this->_idPropStage);
        foreach($concernes as $concerne)
            $concerne->deleteRecord();
        //on cr�� les types de stage s�lectionn�
        for($i=0;$i<count($this->_idsTypesStage);$i++)
        {
            $typeStage=DBTypeStage::getRecords($this->_idsTypesStage[$i]);
            assert(count($typeStage)==1);
            DBConcerne::createRecord($typeStage[0],$propositionStage[0]);
        }
//        $this->setOKMessage("donnees modifiees dans la table concerne");
    }
}
?>
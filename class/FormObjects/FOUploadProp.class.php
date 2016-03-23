<?php
set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");

/**
* @package FormObjects
* @abstract Classe permettant de param�trer le formulaire d'envoi de proposition de stage en PDF. H�rite de la classe abstraite FormObject.
* @var String nom du champ contenant la proposition 1
* @var String nom du champ contenant la proposition 2
* @var String nom du champ contenant la proposition 3
* @var String nom du champ contenant la proposition 4
* @var String nom du champ contenant la proposition 5
*/

class FOUploadProp extends FormObject{
    public static $CHAMP_FORM_PROP_1 = "proposition1";
    public static $CHAMP_FORM_PROP_2 = "proposition2";
    public static $CHAMP_FORM_PROP_3 = "proposition3";
    public static $CHAMP_FORM_PROP_4 = "proposition4";
    public static $CHAMP_FORM_PROP_5 = "proposition5";
    
	private $_proposition1;
    private $_proposition2;
    private $_proposition3;
    private $_proposition4;
    private $_proposition5;
    
	/**
	* @abstract Fonction d'initialisation du param�trage des champs d'envoi de fichiers
	* @access public
	*/
    public function init(){
        $this->_proposition1 = $_POST[FOUploadProp::$CHAMP_FORM_PROP_1];
        $this->_proposition2 = $_POST[FOUploadProp::$CHAMP_FORM_PROP_2];
        $this->_proposition3 = $_POST[FOUploadProp::$CHAMP_FORM_PROP_3];
        $this->_proposition4 = $_POST[FOUploadProp::$CHAMP_FORM_PROP_4];
        $this->_proposition5 = $_POST[FOUploadProp::$CHAMP_FORM_PROP_5];
        
    }
    
	/**
	* @abstract M�thode v�rifiant si le fichier � envoyer est bien de type pdf
	* @return boolean True si le fichier est valide (de taille raisonnable et de type pdf
	* @access public
	*/
    public function isValid(){
    	//On fait un tableau contenant les extensions autoris�es.
    	//Comme il s'agit de proposition de stage, on ne veut autoriser que des fichiers PDF
    	$extensions = array('.pdf','');
    	// r�cup�re la partie de la chaine à partir du dernier . pour connaitre l'extension.
    	$extension = array(strrchr($_FILES[FOUploadProp::$CHAMP_FORM_PROP_1]['name'], '.'),strrchr($_FILES[FOUploadProp::$CHAMP_FORM_PROP_2]['name'], '.'),strrchr($_FILES[FOUploadProp::$CHAMP_FORM_PROP_3]['name'], '.'),strrchr($_FILES[FOUploadProp::$CHAMP_FORM_PROP_4]['name'], '.'), strrchr($_FILES[FOUploadProp::$CHAMP_FORM_PROP_5]['name'], '.'));
    	//for ($i=0;$i<5;$i++)
    	//echo "Extensions [$i]:".$extension[$i]."<br />";
    		//Ensuite on teste
    		$taille_maxi = 1000000;
    		//Taille du fichier
    		$taille = array(filesize($_FILES[FOUploadProp::$CHAMP_FORM_PROP_1]['tmp_name']),filesize($_FILES[FOUploadProp::$CHAMP_FORM_PROP_2]['tmp_name']),filesize($_FILES[FOUploadProp::$CHAMP_FORM_PROP_3]['tmp_name']),filesize($_FILES[FOUploadProp::$CHAMP_FORM_PROP_4]['tmp_name']), filesize($_FILES[FOUploadProp::$CHAMP_FORM_PROP_5]['tmp_name']));
		for ($i=0;$i<5;$i++){
			if(!in_array($extension[$i], $extensions) ) //Si l'extension n'est pas dans le tableau
			{
				$this->setErrorMessage ('Vous devez uploader des fichiers de type pdf');
			}		
		
		if(($taille[$i]>$taille_maxi) )
			{
				$this->setErrorMessage('Au moins un fichier est trop volumineux...');
			}
		}
		return ($this->getErrorMessage() == "");
    }
	
    /**
     * @abstract Apr�s validation des champs de saisie du formulaire, cette m�thode effectue l'envoi du fichier au serveur
     * @access public
	*/
    public function process(){
    	$ligneAnneePromo = DBConfig::getRecords("ANNEE PROMO");
    	$anneePromo = $ligneAnneePromo[0]->getValeurVariable(); 
        $path = "./upload/";
        
        $handle = opendir($path);
     	while ($file = readdir($handle)){
     		//if (is_dir($file)){
     			$dossiers[] = $file;
     		//}
     	
     	}
     	
    	closedir($handle);
    	
    	if (!in_array($anneePromo, $dossiers)){
    		mkdir ($path.$anneePromo."/");
    	}
    			
        $path.=$anneePromo."/";
		
        $tmp = array($_FILES[FOUploadProp::$CHAMP_FORM_PROP_1]['tmp_name'],$_FILES[FOUploadProp::$CHAMP_FORM_PROP_2]['tmp_name'],$_FILES[FOUploadProp::$CHAMP_FORM_PROP_3]['tmp_name'],$_FILES[FOUploadProp::$CHAMP_FORM_PROP_4]['tmp_name'],$_FILES[FOUploadProp::$CHAMP_FORM_PROP_5]['tmp_name']);
        $fichier = array(basename($_FILES[FOUploadProp::$CHAMP_FORM_PROP_1]['name']),basename($_FILES[FOUploadProp::$CHAMP_FORM_PROP_2]['name']),basename($_FILES[FOUploadProp::$CHAMP_FORM_PROP_3]['name']),basename($_FILES[FOUploadProp::$CHAMP_FORM_PROP_4]['name']),basename($_FILES[FOUploadProp::$CHAMP_FORM_PROP_5]['name'] ));
        $boolean = array();
        for($i=0;$i<5;$i++){
        	$fichier[$i] = strtr($fichier[$i], 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			$fichier[$i]= preg_replace('/([^.a-z0-9]+)/i', '-', $fichier[$i]);	
			$boolean[$i]=(move_uploaded_file($tmp[$i], $path . $fichier[$i])); //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        }
        $this->setOKMessage("Les fichiers ont bien été envoyés!");
    }
			
			
        
    
}
?>
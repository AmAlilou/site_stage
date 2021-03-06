<?php
set_include_path ( "." . PATH_SEPARATOR . ".." );
// require_once("class/XHTMLBuilder.class.php");

/**
 *
 * @abstract M�thodes utiles:
 *           [M�thodes g�n�rales]
 *           - addAdditionnalJavascriptTest($js)
 *           - generateXHTML()
 *           Toujours terminer le formulaire par cet appel pour g�n�rer les tests Javascript associ�s
 *           [M�thodes de "construction"]
 *           Remarques g�n�rales sur les m�thodes de construction :
 *           "isMandatory" = "obligatoire" (pour les non anglophones :D)
 *           $defaultValue et $currentValue sont diff�rents !.. L'algo d'affichage va proc�der dans cet ordre pour l'affichage de la valeur courante du champ :
 *           * On regarde d'abord la variable $_GET['fieldName'] et si elle est non vide, la valeur du champ prendra cette valeur (c'est pour les "refresh" de formulaires ;))
 *           * On regarde ensuite (si $_GET[fieldName'] est vide) la variable $currentValue et si elle est non vide, la valeur du champ prendra cette valeur (utile pour les formulaires en modification)
 *           * Enfin, si les deux variables pr�c�dentes sont vides, la valeur du champ prendra la valeur de $defaultValue ... mais ATTENTION !.. si le champ est obligatoire
 *           on n'acceptera pas la valeur $defaultValue pour le champ vis� !! (c'est notamment la principale diff�rence qu'il y a entre $currentValue et $defaultValue :
 *           Si le champ est obligatoire, on "acceptera" (lors de la validation du formulaire) la valeur $currentValue alors qu'on n'acceptera pas $defaultValue
 *           Un exemple "concret" : un champ obligatoire "adresse" pour un utilisateur donn� ... on met comme defaultValue "Saisissez votre adresse ici". Si rien n'est chang�
 *           le formulaire ne validera pas. Admettons que l'utilisateur saisissen "20 All�e des pins". Si ensuite, en modification, on met la defaultValue � "20 All�e des pins"
 *           certes c'est ce qui sera affich� "par d�faut" .. cependant le formulaire ne validera pas tant qu'on n'aura pas chang� cette valeur (c'est b�te si on ne veut pas
 *           la changer ... D'o� l'utilisation de $currentValue notamment pour les formulaires de modification
 *          
 *           A Noter �galement : pour chaque champ g�n�r�, le libell� + champ seront entour�s de balises <label></label> de mani�re � obtenir le focus
 *           automatiquement. D'autre part, ces label sont �galement entour�s de <div></div>. Cela permet de sp�cifier une "balise englobante" utile notamment lorsqu'on cherche � "cacher" ou "afficher"
 *           un champ et son libell�. Le label aura comme id "label_%name/id du champ%" et le div "div_%name/id du champ%"
 *          
 *           - beginForm() � appeler avant de faire les add* ! ... Une fois termin�, faire un endForm()
 *           - addSelectMenuField($label, $selectName, $isMandatory, $selectablesArray, $defaultMsg="", $defaultValue="", $currentValue="", $forceDontDisplayMiniSearchField=false, $moreSelectParams="")
 *           Pour ajouter un menu d�roulant en fonction d'un tableau d'�l�ments s�lectionnables ($selectablesArray doit etre un tableau de ISelectable)
 *           A Noter que lorsque le nombre d'�l�ments du tableau d�passe la valeur de configuration "APPARITION RECHERCHE MENU DEROULANT" sp�cifi�e dans la table config
 *           un petit moteur de recherche appara�t � la droite du menu d�roulant pour saisir les premi�res lettres recherch�es (attention ! ce moteur de recherche n'est efficace
 *           QUE si le contenu du menu d�roulant est TRIE par ordre alphab�tique des libell�s)
 *           Il est possible de forcer le "non affichage" de ce menu d�roulant en passant le param�tre $forceDontDisplayMiniSearchField � true
 *           - addDateField($label, $dateFieldName, $isMandatory, $defaultValue="", $currentValue="", $moreDateFieldParams="")
 *           Pour ajouter un champ Date au formulaire ...
 *           - addUploadField($label, $uploadFieldName, $isMandatory, $moreUploadFieldParams="")
 *           Pour ajouter un champ d'upload de fichier
 *           - addHiddenField($hiddenFieldName, $defaultValue="", $currentValue="", $moreHiddenFieldParams="")
 *           Pour ajouter un champ "cach�". A noter que cette m�thode ne g�n�rera pas de javascript de test.
 *           - addTextareaField($label, $textareaName, $isMandatory, $defaultValue="", $currentValue="", $cols=40, $rows=4, $moreTextareaParams="")
 *           Pour ajouter un <textarea>
 *           - addCheckbox($label, $checkboxName, $isCheckedByDefault)
 *           Pour ajouter une checkbox
 *           - addRadioGroup($label, $radioName, $isMandatory, $selectablesArray, $selectedRadioDefaultValue="", $currentValue="", $verticalDisplay=false, $moreRadioParams="")
 *           Pour ajouter un ensemble de <input type="radio"/>
 *           Note: $selectablesArray doit �tre un array de ISelectable
 *           - addTextField($label, $inputName, $isMandatory, $isNotPassword=true, $size="", $maxLength="", $defaultValue="", $currentValue="", $moreInputParams="")
 *           Pour ajouter un <input type="text"/>
 *           Classe se chargeant de construire un formulaire avec, lors de sa validation, une v�rification de chacun des champs ajout�s
 * @package /class
 *         
 */
class FormBuilder {
	private $_formAction;
	private $_formMethod;
	private $_formEnctypeData;
	private $_formMoreParams;
	private $_formBegan;
	private $_additionnalJavascriptTest;
	private $_attributes;
	private $_needSearchMenuJS;
	private $_needDateCalendar;
	private $_needDateVerification;
	private $_dateFieldsArray;
	
	/**
	 *
	 * @abstract instancie la classe
	 * @param
	 *        	String url de redirection du formulaire
	 * @param
	 *        	String methode d'envoie du formulaire
	 * @param
	 *        	bool D�finit le type de document envoy� au serveur lorsque l'attribut method vaut post.
	 * @param
	 *        	Array les parametres compl�mentaires
	 */
	public function __construct($formAction, $formMethod, $formEnctypeData = false, $formMoreParams = "") {
		$this->_formAction = $formAction;
		$this->_formMethod = $formMethod;
		$this->_formEnctypeData = $formEnctypeData;
		$this->_formMoreParams = $formMoreParams;
		
		$this->_formBegan = false;
		$this->_additionnalJavascriptTest = "";
		$this->_attributes = array ();
		
		$this->_needSearchMenuJS = false;
		$this->_needDateCalendar = false;
		$this->_needDateVerification = false;
		$this->_dateFieldsArray = array ();
	}
	
	/**
	 *
	 * @abstract Permet de rajouter des "tests sp�cifiques" (non g�n�r�s automatiquement en fonction des champs du formulaire) sur le formulaire
	 * @param
	 *        	String url du fichier .js
	 */
	public function addAdditionnalJavascriptTest($js) {
		$this->_additionnalJavascriptTest .= $js;
	}
	
	/**
	 *
	 * @abstract A appeler en tout premier lieu avant d'ajouter des champs au formulaire.
	 */
	public function beginForm() {
		echo '<form name="mainForm" action="' . $this->_formAction . '" method="' . $this->_formMethod . '" onSubmit="return checkForm();"' . (($this->_formEnctypeData) ? ' enctype="multipart/form-data"' : '') . (($this->_formMoreParams == "") ? "" : " " . $this->_formMoreParams) . ">\n";
		$this->_formBegan = true;
	}
	
	/**
	 *
	 * @abstract termine le formulaire
	 */
	public function endForm() {
		echo "</form>\n";
		$this->_formBegan = false;
	}
	
	/**
	 *
	 * @abstract Permet de rajouter un champ input au formulaire
	 * @param
	 *        	String libelle du champ
	 * @param
	 *        	String nom du champ
	 * @param
	 *        	bool true le champ doit etre saisi obligatoirement
	 * @param
	 *        	bool d�finit un champ de type password, ilne sera jamais rempli par d�faut
	 * @param
	 *        	String la taille du champ
	 * @param
	 *        	String le nombre maximal de caract�re possible
	 * @param
	 *        	String valeur qui sera affich�e par d�faut (voir le commentaire g�n�ral de la classe)
	 * @param
	 *        	String valeur courante, utilis�e lors des modification et des r�affichage de formulaire (voir le commentaire g�n�ral de la classe)
	 * @param
	 *        	Array parametres suppl�mentaires
	 */
	public function addTextField($label, $inputName, $isMandatory, $isNotPassword = true, $size = "", $maxLength = "", $defaultValue = "", $currentValue = "", $moreInputParams = "") {
		if ($maxLength != "")
			$this->addAdditionnalJavascriptTest ( "if(document.getElementById('" . $inputName . "').value.length > " . $maxLength . "){
    alert('Le champ <" . $inputName . "> ne doit pas exc�der " . $maxLength . " caract�res !');
    return false;
}\n" );
		$maxLength = (($maxLength == "") ? '' : ' maxlenght="' . $maxLength . '"');
		$size = (($size == "") ? '' : ' size="' . $size . '"');
		$onBlur = ((@ereg ( "onblur=", strtolower ( $moreInputParams ) )) ? "" : " onBlur='if(this.value == \"\") this.value=\"$defaultValue\";'");
		$onFocus = ((@ereg ( "onfocus=", strtolower ( $moreInputParams ) )) ? "" : " onFocus='if(this.value == \"$defaultValue\") this.value=\"\";'");
		
		// On ne remplit jamais le password
		
		if (! $isNotPassword) {
			$value = ' value="' . $defaultValue . '"';
			
		} 

		else
			$value = ' value="' . str_replace ( "\"", "\\\"", ((isset ( $_GET [$inputName] ) && $_GET [$inputName] != "") ? $_GET [$inputName] : (($currentValue != "") ? $currentValue : $defaultValue)) ) . '"';
		$type = ' type="' . (($isNotPassword) ? "text" : "password") . '"';
		
		$this->addAttribute ( new FormAttribute ( $inputName, $isMandatory, $defaultValue ) );
		
		echo '<div id="div_' . $inputName . '"><label id="label_' . $inputName . '">' . $this->__generateFieldLabel ( $label, $isMandatory ) . '<input name="' . $inputName . '" id="' . $inputName . '" ' . $type . $maxLength . $size . $onBlur . $onFocus . $moreInputParams . $value . "/></label></div>\n";
	}
	
	/**
	 *
	 * @abstract Permet de rajouter une liste de boutons radio au formulaire
	 * @param
	 *        	String libelle du champ
	 * @param
	 *        	String nom du champ
	 * @param
	 *        	bool true le champ doit etre saisi obligatoirement
	 * @param
	 *        	Array le tableau � afficher
	 * @param
	 *        	String le bouton radio d�fini par d�faut
	 * @param
	 *        	String la valeur courante, le bouton radio s�lectionn� en cas de modification ou de r�affichage
	 * @param
	 *        	bool true les boutons radio sont affich�s les uns en dessous des autres, sinon en ligne
	 * @param
	 *        	Array parametres suppl�mentaires
	 */
	public function addRadioGroup($label, $radioName, $isMandatory, $selectablesArray, $selectedRadioDefaultValue = "", $currentValue = "", $verticalDisplay = false, $moreRadioParams = "") {
		// On v�rifie que tous les objets du selectablesArray sont bien des ISelectable
		foreach ( $selectablesArray as $selectable )
			if (! ($selectable instanceof ISelectable))
				die ( "Erreur : FormBuilder::addRadioGroup() : \$selectablesAttay contient au moins un objet qui n'est pas un ISelectable !" );
		
		$generatedHTML = '<div id="div_' . $radioName . '">' . $this->__generateFieldLabel ( $label, $isMandatory );
		$firstTime = true;
		foreach ( $selectablesArray as $selectable ) {
			$checked = ((($firstTime && ! isset ( $_GET [$radioName] ) && $currentValue == "" && $selectedRadioDefaultValue == "") || (isset ( $_GET [$radioName] ) && $_GET [$radioName] == $selectable->getFormSelectOptionValue ()) || (! isset ( $_GET [$radioName] ) && $currentValue == $selectable->getFormSelectOptionValue ()) || (! isset ( $_GET [$radioName] ) && ($currentValue == "") && $selectedRadioDefaultValue == $selectable->getFormSelectOptionValue ())) ? ' checked="checked"' : '');
			
			$generatedHTML .= '<label><input type="radio" value="' . $selectable->getFormSelectOptionValue () . '" name="' . $radioName . '" id="' . $radioName . '"' . $checked . (($moreRadioParams == "") ? "" : " " . $moreRadioParams) . "/>" . $selectable->getFormSelectOptionLabel () . "</label>" . (($verticalDisplay) ? "<br/>" : "") . "\n";
			
			$firstTime = false;
		}
		
		$generatedHTML .= '</div>';
		
		$this->addAttribute ( new FormAttribute ( $radioName, $isMandatory, $selectedRadioDefaultValue ) );
		
		echo $generatedHTML;
	}
	
	/**
	 *
	 * @abstract Permet de rajouter un champ checkbox au formulaire
	 * @param
	 *        	String libelle du champ
	 * @param
	 *        	String nom du champ
	 * @param
	 *        	bool true la checkbox est coch�e
	 */
	public function addCheckbox($label, $checkboxName, $isCheckedByDefault) {
		$checked = (((! isset ( $_GET [$checkboxName] ) && $isCheckedByDefault) || (isset ( $_GET [$checkboxName] ) && $_GET [$checkboxName] == "on")) ? ' checked="checked"' : '');
		
		$this->addAttribute ( new FormAttribute ( $checkboxName, false, "", true ) );
		
		echo '<div id="div_' . $checkboxName . '" style><label id="label_' . $checkboxName . '"><input type="checkbox" name="' . $checkboxName . '" id="' . $checkboxName . '"' . $checked . '/>' . $this->__generateFieldLabel ( $label, false, false ) . '</label></div>';
	}
	
	/**
	 *
	 * @abstract Permet de rajouter un champ textarea au formulaire
	 * @param
	 *        	String libelle du champ
	 * @param
	 *        	String nom du champ
	 * @param
	 *        	bool true le champ doit etre saisi obligatoirement
	 * @param
	 *        	String valeur qui sera affich�e par d�faut (voir le commentaire g�n�ral de la classe)
	 * @param
	 *        	String valeur courante, utilis�e lors des modification et des r�affichage de formulaire (voir le commentaire g�n�ral de la classe)
	 * @param
	 *        	int le nombre de colonne
	 * @param
	 *        	int le nombre de ligne
	 * @param
	 *        	Array parametres suppl�mentaires
	 */
	public function addTextareaField($label, $textareaName, $isMandatory, $defaultValue = "", $currentValue = "", $cols = 40, $rows = 4, $moreTextareaParams = "") {
		$cols = (($cols == "") ? "" : ' cols="' . $cols . '"');
		$rows = (($rows == "") ? "" : ' rows="' . $rows . '"');
		$onBlur = ((ereg ( "onblur=", strtolower ( $moreTextareaParams ) )) ? "" : " onBlur='if(this.value == \"\") this.value=\"$defaultValue\";'");
		$onFocus = ((ereg ( "onfocus=", strtolower ( $moreTextareaParams ) )) ? "" : " onFocus='if(this.value == \"$defaultValue\") this.value=\"\";'");
		$value = ((isset ( $_GET [$textareaName] ) && $_GET [$textareaName] != "") ? $_GET [$textareaName] : (($currentValue != "") ? $currentValue : $defaultValue));
		
		$this->addAttribute ( new FormAttribute ( $textareaName, $isMandatory, $defaultValue ) );
		
		echo '<div id="div_' . $textareaName . '"><label id="label_' . $textareaName . '">' . $this->__generateFieldLabel ( $label, $isMandatory ) . '<br/><textarea name="' . $textareaName . '" id="' . $textareaName . '" ' . $cols . $rows . $onBlur . $onFocus . $moreTextareaParams . ">$value</textarea></label></div>\n";
	}
	
	/**
	 *
	 * @abstract Permet de rajouter un champ hidden au formulaire
	 * @param
	 *        	String nom du champ
	 * @param
	 *        	String valeur qui sera affich�e par d�faut (voir le commentaire g�n�ral de la classe)
	 * @param
	 *        	String valeur courante, utilis�e lors des modification et des r�affichage de formulaire (voir le commentaire g�n�ral de la classe)
	 * @param
	 *        	Array parametres suppl�mentaires
	 */
	public function addHiddenField($hiddenFieldName, $defaultValue = "", $currentValue = "", $moreHiddenFieldParams = "") {
		$value = 'value="' . ((isset ( $_GET [$hiddenFieldName] ) && $_GET [$hiddenFieldName] != "") ? $_GET [$hiddenFieldName] : (($currentValue != "") ? $currentValue : $defaultValue)) . '"';
		
		$this->addAttribute ( new FormAttribute ( $hiddenFieldName, false, $defaultValue ) );
		
		echo '<div id="div_' . $hiddenFieldName . '"><label id="label_' . $hiddenFieldName . '"><input type="hidden" name="' . $hiddenFieldName . '" id="' . $hiddenFieldName . '" ' . $value . (($moreHiddenFieldParams == "") ? '' : ' ' . $moreHiddenFieldParams) . "/></label></div>";
	}
	
	//
	/**
	 *
	 * @abstract Permet de rajouter un champ d'upload au formulaire
	 * @param
	 *        	String libelle du champ
	 * @param
	 *        	String nom du champ
	 * @param
	 *        	bool true le champ doit etre saisi obligatoirement
	 * @param
	 *        	Array parametres suppl�mentaires
	 */
	public function addUploadField($label, $uploadFieldName, $isMandatory, $moreUploadFieldParams = "") {
		$value = ((isset ( $_GET [$uploadFieldName] ) && $_GET [$uploadFieldName] != "") ? ' value="' . $_GET [$hiddenFieldName] . '"' : '');
		
		$this->addAttribute ( new FormAttribute ( $uploadFieldName, $isMandatory, "" ) );
		
		echo '<div id="div_' . $uploadFieldName . '"><label id="label_' . $uploadFieldName . '">' . $this->__generateFieldLabel ( $label, $isMandatory ) . '<input type="file" name="' . $uploadFieldName . '" id="' . $uploadFieldName . '" ' . $value . (($moreUploadFieldParams == "") ? "" : " " . $moreUploadFieldParams) . "/></label></div>";
	}
	
	/**
	 *
	 * @abstract Permet de rajouter un champ de type date au formulaire
	 * @param
	 *        	String libelle du champ
	 * @param
	 *        	String nom du champ
	 * @param
	 *        	bool true le champ doit etre saisi obligatoirement
	 * @param
	 *        	String valeur qui sera affich�e par d�faut (voir le commentaire g�n�ral de la classe)
	 * @param
	 *        	String valeur courante, utilis�e lors des modification et des r�affichage de formulaire (voir le commentaire g�n�ral de la classe)
	 * @param
	 *        	Array parametres suppl�mentaires
	 */
	public function addDateField($label, $dateFieldName, $isMandatory, $defaultValue = "", $currentValue = "", $moreDateFieldParams = "") {
		$value = 'value="' . ((isset ( $_GET [$dateFieldName] ) && $_GET [$dateFieldName] != "") ? $_GET [$dateFieldName] : (($currentValue != "") ? $currentValue : $defaultValue)) . '"';
		$onBlur = ((@ereg ( "onblur=", strtolower ( $moreDateFieldParams ) )) ? "" : " onBlur='if(this.value == \"\") this.value=\"$defaultValue\";'");
		$onFocus = ((@ereg ( "onfocus=", strtolower ( $moreDateFieldParams ) )) ? "" : " onFocus='if(this.value == \"$defaultValue\") this.value=\"\";'");
		
		$this->addAdditionnalJavascriptTest ( "if(!verifDate(document.getElementById('" . $dateFieldName . "'))){
    alert(\"Le champ <" . $dateFieldName . "> n'est pas une date valide !\");
    return false;
}\n" );
		
		$this->_needDateCalendar = true;
		$this->_needDateVerification = true;
		$this->_dateFieldsArray [count ( $this->_dateFieldsArray )] = $dateFieldName;
		
		$this->addAttribute ( new FormAttribute ( $dateFieldName, $isMandatory, $defaultValue ) );
		
		echo "<div class=\"calend\" id=\"" . $dateFieldName . "_div\">&#160;</div>" . '<div id="div_' . $dateFieldName . '"><label id="label_' . $dateFieldName . '">' . $this->__generateFieldLabel ( $label, $isMandatory ) . '<input type="text" size="8" maxlength="10" name="' . $dateFieldName . '" id="' . $dateFieldName . '" ' . $onBlur . $onFocus . $value . (($moreDateFieldParams == "") ? "" : " " . $moreDateFieldParams) . "/><img src=\"" . $GLOBALS ['URL_ROOT_PATH'] . "/cal.gif\" class=\"boutonCalendrier\" onclick=\"" . $dateFieldName . "_cl.show();\"/></label></div>";
	}
	
	/**
	 *
	 * @abstract Permet de rajouter un champ de menu d�roulant au formulaire
	 * @param
	 *        	String libelle du champ
	 * @param
	 *        	String nom du champ
	 * @param
	 *        	bool true le champ doit etre saisi obligatoirement
	 * @param
	 *        	Array le tableau � afficher
	 * @param
	 *        	String le message par d�faut
	 * @param
	 *        	String le bouton radio d�fini par d�faut
	 * @param
	 *        	String la valeur courante, le bouton radio s�lectionn� en cas de modification ou de r�affichage
	 * @param
	 *        	bool true n'affiche pas le champ d'aide � la recherche dans la liste
	 * @param
	 *        	Array parametres suppl�mentaires
	 */
	public function addSelectMenuField($label, $selectName, $isMandatory, $selectablesArray, $defaultMsg = "", $defaultValue = "", $currentValue = "", $forceDontDisplayMiniSearchField = true, $moreSelectParams = "") {
		// On v�rifie que tous les objets du selectablesArray sont bien des ISelectable
		foreach ( $selectablesArray as $selectable )
			if (! ($selectable instanceof ISelectable))
				die ( "Erreur : FormBuilder::addSelectMenu() : \$selectablesAttay contient au moins un objet qui n'est pas un ISelectable !" );
			
			// On g�n�re le menu d�roulant avec l'option s�lectionn�e en fonction de la valeur de $_GET[$selectName]
			// "Ligne par d�faut"
		$generatedHTML = '<div id="div_' . $selectName . '"><label id="label_' . $selectName . '">' . $this->__generateFieldLabel ( $label, $isMandatory ) . '<select name="' . $selectName . '" id="' . $selectName . '"' . (($moreSelectParams == "") ? "" : " " . $moreSelectParams) . ">\n";
		if ($defaultMsg != "")
			$generatedHTML .= '  <option value="">' . $defaultMsg . "</option>\n";
			
			// Lignes correspondant � chaque ligne du selectablesArray
		foreach ( $selectablesArray as $selectable ) {
			$selected = (((isset ( $_GET [$selectName] ) && $_GET [$selectName] == $selectable->getFormSelectOptionValue ()) || (! isset ( $_GET [$selectName] ) && $currentValue == $selectable->getFormSelectOptionValue ()) || (! isset ( $_GET [$selectName] ) && ($currentValue == "") && $defaultValue == $selectable->getFormSelectOptionValue ())) ? ' selected="selected"' : "");
			$generatedHTML .= '  <option value="' . $selectable->getFormSelectOptionValue () . '"' . $selected . '>' . $selectable->getFormSelectOptionLabel () . "</option>\n";
		}
		
		$generatedHTML .= '</select></label>';
		
		/*
		 * Enlev� car comportement bizarre
		 * // Si le nombre de lignes du menu d�roulant d�passe la valeur de la variable "APPARITION RECHERCHE MENU DEROULANT" dans la table config, on affiche un p'tit moteur de recherche d'aide � la Saisie
		 * if((!$forceDontDisplayMiniSearchField) && count($selectablesArray) >= DBConfig::getConfigValue("APPARITION RECHERCHE MENU DEROULANT")){
		 * $this->_needSearchMenuJS = true;
		 * $generatedHTML .= " -> ?<input size='4' type='text' onkeyup=\"majSelect('$selectName', this.value);\" onblur=\"document.getElementById('$selectName').onchange();\">\n";
		 *
		 */
		
		$generatedHTML .= '</div>';
		
		$this->addAttribute ( new FormAttribute ( $selectName, $isMandatory, $defaultMsg ) );
		
		echo $generatedHTML;
	}
	
	/**
	 *
	 * @abstract ajoute les javascripts du formulaire � la page
	 */
	public function generateXHTML() {
		if ($this->_formBegan)
			$this->endForm ();
		XHTMLBuilder::getInstance ()->addJavascript ( $this->generateJavascript () );
		ob_end_flush ();
	}
	private function generateJavascript() {
		$generatedJS = $this->__buildCheckForm ();
		$generatedJS .= $this->__buildRefresh ();
		$generatedJS .= $this->__buildVisibility ();
		
		if ($this->_needDateCalendar)
			$generatedJS .= $this->__buildDataCalendarInitialisation ();
		
		if ($this->_needSearchMenuJS)
			$generatedJS .= $this->__buildSearchMenuJS ();
		
		if ($this->_needDateVerification)
			$generatedJS .= $this->__buildDateVerification ();
		
		return $generatedJS;
	}
	private function __buildDateVerification() {
		return "
function isNumeric(data){
    flag = true;
    for(i=0;i<data.length;i=i+1){
        if(data.charCodeAt(i)<48 || data.charCodeAt(i)>57) return false;
    }
    return flag;
}

function verifDate(field_id){
        var date_ok = true;
        var data = field_id.value;
    if(data.substr(2,1)!='/' || data.substr(5,1)!='/'){
        date_ok = false;
    }

    var jour = data.substr(0,2);
    var mois = data.substr(3,2) - 1;
    var annee = data.substr(6,4);

    if(!isNumeric(jour) || !isNumeric(mois) || !isNumeric(annee)) date_ok = false;

    test = new Date(annee,mois,jour);
    testAnnee = test.getYear();
    if(testAnnee < 1000) testAnnee = testAnnee + 1900;
    if(jour!=test.getDate() || mois!=test.getMonth() || annee!=testAnnee){
        date_ok = false;
    }

    return date_ok;
}\n\n";
	}
	private function __buildVisibility() {
		$generatedJS = "" . "var ie4=document.all&&navigator.userAgent.indexOf('Opera')==-1\n" . "var ns6=document.getElementById&&!document.all\n" . "var ns4=document.layers\n\n" . "function setVisible(field_id) {\n" . "  var VISIBLE = (ie4||ns6)? 'visible' : 'show';\n" . "  if((obj = document.getElementById(field_id)) != null)\n" . "    if(obj.style)\n" . "      obj.style.visibility=VISIBLE;\n" . "}\n\n" . "function setHidden(field_id){\n" . "  var HIDDEN = (ie4||ns6)? 'hidden' : 'hide';\n" . "  if((obj = document.getElementById(field_id)) != null)\n" . "    if(obj.style)\n" . "      obj.style.visibility=HIDDEN;\n" . "}\n\n";
		return $generatedJS;
	}
	private function __buildRefresh() {
		$generatedJS = "function refreshPage(){
    window.location.href = buildRefreshURL();
}

function buildRefreshURL(){
    var url = '" . substr ( strrchr ( $_SERVER ["PHP_SELF"], "/" ), 1 ) . "?';
";
		foreach ( $this->_attributes as $att )
			$generatedJS .= "   url += " . $att->getRefreshJavascript () . "+\"&\";\n";
		
		$generatedJS .= "   return url;
}\n\n";
		
		return $generatedJS;
	}
	private function __buildCheckForm() {
		$generatedJS = "function checkForm(){\n";
		
		foreach ( $this->_attributes as $att )
			$generatedJS .= $att->generateJSTest ();
		
		$generatedJS .= $this->_additionnalJavascriptTest;
		$generatedJS .= "   return true;
}\n\n";
		
		return $generatedJS;
	}
	private function __buildDataCalendarInitialisation() {
		XHTMLBuilder::getInstance ()->addHeading ( ' <script type="text/javascript" src="' . $GLOBALS ['URL_ROOT_PATH'] . '/gnoocalendar.js"></script>' );
		XHTMLBuilder::getInstance ()->addOnLoadJavascript ( "initCalendriers();" );
		$generatedJS = "";
		
		foreach ( $this->_dateFieldsArray as $dateField )
			$generatedJS .= "var " . $dateField . "_cl = new GnooCalendar(\"" . $dateField . "_cl\", 20, 10);
";
		
		$generatedJS .= "
function initCalendriers(){
";
		foreach ( $this->_dateFieldsArray as $dateField )
			$generatedJS .= "    " . $dateField . "_cl.init(\"" . $dateField . "_div\", document.forms[\"mainForm\"].elements[\"" . $dateField . "\"]);
    " . $dateField . "_cl.isDragable(true);
";
		
		$generatedJS .= "}
";
		
		return $generatedJS;
	}
	private function __buildSearchMenuJS() {
		return "function majSelect(selectId, value)
{
	select = document.getElementById(selectId);
	ind = 1;
	i = 1;
	var changement = true;
	while((ind < select.length) && (i <= value.length) && (changement))
	{
		string_query = value.substring(0, i);
		string_select = select.options[ind].text.substring(0, i);
		changement = false;
		while((((1+ind) < select.length) && (string_query.toUpperCase() > string_select.toUpperCase())) || (string_query.length > string_select.length))
		{
			changement = true;
			ind++;
			string_select = select.options[ind].text.substring(0, i);
		}

		if(string_select == string_query)
		{
			i++;
			changement = true;
		}
	}

	if(ind != select.length)
		select.selectedIndex = ind;
}\n\n";
	}
	private function addAttribute($att) {
		if (! ($att instanceof FormAttribute))
			die ( "Erreur : FormBuilder::addAttribute(\$att) : \$att n'est pas un FormAttribute !!" );
		if ($this->_formBegan)
			$this->_attributes [count ( $this->_attributes )] = $att;
	}
	private function __generateFieldLabel($label, $isMandatory, $doublePoints = true) {
		return XHTMLBuilder::getText ( $label . ($isMandatory ? ' (*)' : '') . (($doublePoints && $label != "") ? ' : ' : '') );
	}
}

/**
 * Classe utilis�e par le FormBuilder .
 * .. pas besoin de l'utiliser autre part
 */
class FormAttribute {
	private $_isMandatory;
	private $_attributeName;
	private $_attributeDefaultValue;
	private $_isCheckbox;
	
	/**
	 *
	 * @abstract instancie la classe
	 * @param
	 *        	String nom du champ
	 * @param
	 *        	bool true le champ est obligatoire
	 * @param
	 *        	String valeur par d�faut
	 * @param
	 *        	bool true c'est une checkbox
	 */
	public function __construct($attributeName, $isMandatory, $attributeDefaultValue = "", $isCheckbox = false) {
		$this->_attributeName = $attributeName;
		$this->_isMandatory = $isMandatory;
		$this->_attributeDefaultValue = $attributeDefaultValue;
		$this->_isCheckbox = $isCheckbox;
	}
	
	/**
	 *
	 * @abstract c'est un champ obligatoire
	 * @return bool true c'est un champ obligatoire sinon false
	 */
	public function isMandatory() {
		return $this->_isMandatory;
	}
	/**
	 *
	 * @abstract le nombre du champ
	 * @return String le nom du champ
	 */
	public function getName() {
		return $this->_attributeName;
	}
	/**
	 *
	 * @abstract la valeur par d�faut
	 * @return String la valeur par d�faut
	 */
	public function getDefaultValue() {
		return $this->_attributeDefaultValue;
	}
	/**
	 *
	 * @abstract g�n�re un javascript qui v�rifie que c'est un champ obligatoire
	 * @return String le script de v�rification
	 */
	public function generateJSTest() {
		$generatedJS = "";
		if ($this->_isMandatory)
			$generatedJS .= "if((document.getElementById('" . $this->_attributeName . "').value == '') || (document.getElementById('" . $this->_attributeName . "').value == '" . $this->_attributeDefaultValue . "')){
    alert('Le champ <" . $this->_attributeName . "> est obligatoire !');
    return false;
}\n\n";
		else
			$generatedJS .= "if(document.getElementById('" . $this->_attributeName . "').value == '" . $this->_attributeDefaultValue . "')
    document.getElementById('" . $this->_attributeName . "').value = '';

";
		
		return $generatedJS;
	}
	public function getRefreshJavascript() {
		if (! $this->_isCheckbox)
			return "\"" . $this->getName () . "=\"+document.getElementById('" . $this->getName () . "').value";
		else
			return "\"" . $this->getName () . "=\"+(document.getElementById('" . $this->getName () . "').checked?\"on\":\"\")";
	}
}
?>
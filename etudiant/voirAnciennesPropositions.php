<?php

set_include_path(".".PATH_SEPARATOR."..");
require_once("inc/main.inc.php");
require_once("inc/configPhpMyEdit.inc.php");
PagePermission::verifyPagePermission( new PagePermission(PagePermission::$CONSTRAINT_ETUDIANT_LOGGED));
$prenomEtu = SessionManager::getEtudiant()->getPrenomEtudiant();
$nomEtu = SessionManager::getEtudiant()->getNomEtudiant();
echo "<center><h2>Espace &#233;tudiant $prenomEtu $nomEtu</h2></center>";
/*
 * IMPORTANT NOTE: This generated file contains only a subset of huge amount
 * of options that can be used with phpMyEdit. To get information about all
 * features offered by phpMyEdit, check official documentation. It is available
 * online and also for download on phpMyEdit project management page:
 *
 * http://platon.sk/projects/main_page.php?project_id=5
 *
 * This file was generated by:
 *
 *                    phpMyEdit version: 5.6
 *       phpMyEdit.class.php core class: 1.188
 *            phpMyEditSetup.php script: 1.48
 *              generating setup script: 1.48
 */

$opts['tb'] = 'proposition_stage';

// Name of field which is the unique key
$opts['key'] = 'id_proposition_stage';

// Type of key field (int/real/string/date etc.)
$opts['key_type'] = 'int';

// Sorting field(s)
$opts['sort_field'] = array('raison_sociale_entreprise');

// Number of records to display on the screen
// Value of -1 lists all records in a table
$opts['inc'] = 15;

// Options you wish to give the users
// A - add,  C - change, P - copy, V - view, D - delete,
// F - filter, I - initial sort suppressed
$opts['options'] = 'V';

// Number of lines to display on multiple selection filters
$opts['multiple'] = '4';

// Navigation style: B - buttons (default), T - text links, G - graphic links
// Buttons position: U - up, D - down (default)
$opts['navigation'] = 'UB';

// Display special page elements
$opts['display'] = array(
	'form'  => true,
	'query' => true,
	'sort'  => true,
	'time'  => true,
	'tabs'  => true
);

// Set default prefixes for variables
$opts['js']['prefix']               = 'PME_js_';
$opts['dhtml']['prefix']            = 'PME_dhtml_';
$opts['cgi']['prefix']['operation'] = 'PME_op_';
$opts['cgi']['prefix']['sys']       = 'PME_sys_';
$opts['cgi']['prefix']['data']      = 'PME_data_';

/* Get the user's default language and use it if possible or you can
   specify particular one you want to use. Refer to official documentation
   for list of available languages. */
$opts['language'] = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

/* Table-level filter capability. If set, it is included in the WHERE clause
   of any generated SELECT statement in SQL query. This gives you ability to
   work only with subset of data from table.
*/

$opts['filters'] = "promo < ".DBConfig::getConfigValue("ANNEE PROMO")." and etat IN ('Validee','Terminee')";

/* Field definitions
   
Fields will be displayed left to right on the screen in the order in which they
appear in generated list. Here are some most used field options documented.

['name'] is the title used for column headings, etc.;
['maxlen'] maximum length to display add/edit/search input boxes
['trimlen'] maximum length of string content to display in row listing
['width'] is an optional display width specification for the column
          e.g.  ['width'] = '100px';
['mask'] a string that is used by sprintf() to format field output
['sort'] true or false; means the users may sort the display on this column
['strip_tags'] true or false; whether to strip tags from content
['nowrap'] true or false; whether this field should get a NOWRAP
['select'] T - text, N - numeric, D - drop-down, M - multiple selection
['options'] optional parameter to control whether a field is displayed
  L - list, F - filter, A - add, C - change, P - copy, D - delete, V - view
            Another flags are:
            R - indicates that a field is read only
            W - indicates that a field is a password field
            H - indicates that a field is to be hidden and marked as hidden
['URL'] is used to make a field 'clickable' in the display
        e.g.: 'mailto:$value', 'http://$value' or '$page?stuff';
['URLtarget']  HTML target link specification (for example: _blank)
['textarea']['rows'] and/or ['textarea']['cols']
  specifies a textarea is to be used to give multi-line input
  e.g. ['textarea']['rows'] = 5; ['textarea']['cols'] = 10
['values'] restricts user input to the specified constants,
           e.g. ['values'] = array('A','B','C') or ['values'] = range(1,99)
['values']['table'] and ['values']['column'] restricts user input
  to the values found in the specified column of another table
['values']['description'] = 'desc_column'
  The optional ['values']['description'] field allows the value(s) displayed
  to the user to be different to those in the ['values']['column'] field.
  This is useful for giving more meaning to column values. Multiple
  descriptions fields are also possible. Check documentation for this.
*/

$opts['fdd']['id_proposition_stage'] = array(
  'name'     => 'ID proposition stage',
  'select'   => 'T',
  'options'  => 'AVCPDR', // auto increment
  'maxlen'   => 11,
  'default'  => '0',
  'sort'     => true,
);
$opts['fdd']['raison_sociale_entreprise'] = array(
  'name'     => 'Raison sociale entreprise',
  'select'   => 'T',
  'maxlen'   => 255,
  'sort'     => true
);
$opts['fdd']['intitule'] = array(
  'name'     => 'Intitule',
  'select'   => 'T',
  'maxlen'   => 255,
  'sort'     => true,
);
$opts['fdd']['sujet'] = array(
  'name'     => 'Sujet',
  'select'   => 'T',
  'maxlen'   => 65535,
  'textarea' => array(
    'rows' => 5,
    'cols' => 50),
  'sort'     => true,
    'options'  => 'LH',
  'options'  => 'ACVD'
);
$opts['fdd']['techno'] = array(
  'name'     => 'Techno',
  'select'   => 'T',
  'maxlen'   => 255,
  'sort'     => true
  );
$opts['fdd']['desc_techno_prop'] = array(
  'name'     => 'Desc techno prop',
  'select'   => 'T',
  'maxlen'   => 65535,
  'textarea' => array(
    'rows' => 5,
    'cols' => 50),
  'sort'     => true,
    'options'  => 'LH',
  'options'  => 'ACVD'
);
$opts['fdd']['domaine'] = array(
  'name'     => 'Domaine',
  'select'   => 'T',
  'maxlen'   => 255,
  'sort'     => true
);
$opts['fdd']['indemnite_prop'] = array(
  'name'     => 'Indemnite prop',
  'select'   => 'T',
  'maxlen'   => 65535,
  'textarea' => array(
    'rows' => 5,
    'cols' => 50),
  'sort'     => true,
  'options'  => 'LH',
  'options'  => 'ACVD'
);
$opts['fdd']['promo'] = array(
  'name'     => 'Promo',
  'select'   => 'T',
  'maxlen'   => 11,
  'default'  => '0',
  'sort'     => true
);
$opts['fdd']['nom_contact'] = array(
  'name'     => 'Nom contact',
  'select'   => 'T',
  'maxlen'   => 255,
  'sort'     => true,
  'options'  => 'LH',
  'options'  => 'ACVD'
);
$opts['fdd']['prenom_contact'] = array(
  'name'     => 'Prenom contact',
  'select'   => 'T',
  'maxlen'   => 255,
  'sort'     => true,
      'options'  => 'LH',
  'options'  => 'ACVD'
);
$opts['fdd']['mail_responsable_proposition'] = array(
  'name'     => 'Mail responsable proposition',
  'select'   => 'T',
  'maxlen'   => 255,
  'sort'     => true,
  'options'  => 'LH',
  'options'  => 'ACVD'
);
// Now important call to phpMyEdit
require_once '../phpMyEdit/phpMyEdit.class.php';
new phpMyEdit($opts);

?>
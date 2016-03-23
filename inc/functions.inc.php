<?php
// Fonction permettant de "catcher" l'affichage de ob_start()
function displayBufferContent($buffer){
    DBConnector::getDBConnector()->forceConnexionPersistance(false);
    XHTMLBuilder::getInstance()->addContent($buffer);
    return XHTMLBuilder::getInstance()->getDisplay();
}

function my_mb_ucfirst($str, $e='utf-8') {
   $fc = mb_strtoupper(mb_substr($str, 0, 1, $e), $e);
   return $fc.mb_substr($str, 1, mb_strlen($str, $e), $e);
}

// Convertit une chaine au format $DATE_FORMAT en millisecondes depuis le 1er janvier 1970
function formattedDateToTime($formattedDate){
    ereg("([0-9]{2})/([0-9]{2})/([0-9]{2})", $formattedDate, $ereg);
    return mktime(0,0,0,$ereg[2], $ereg[1], $ereg[3]);
}

// Convertit un nombre en millisecondes depuis le 1er janvier 1970 en chaine au format $TIME_FORMAT
function timeToFormattedDate($time){
    return date(str_replace("%", "", $GLOBALS['TIME_FORMAT']), $time);
}

// Convertit une chaine au format $TIME_FORMAT en millisecondes depuis le 1er janvier 1970
function formattedTimeToTime($formattedTime){
    ereg("([0-9]{2}):([0-9]{2}):([0-9]{2})", $formattedTime, $ereg);
    return mktime($ereg[1], $ereg[2], $ereg[3], 0, 0, 0);
}

// Convertit un nombre en millisecondes depuis le 1er janvier 1970 en chaine au format $DATE_FORMAT
function timeToFormattedTime($time){
    return date(str_replace("%", "", $GLOBALS['DATE_FORMAT']), $time);
}

// Convertit une chaine au format $DATE_FORMAT." ".$TIME_FORMAT en millisecondes depuis le 1er janvier 1970
function formattedDateTimeToTime($formattedDateTime){
    $explodes = explode(" ", $formattedDateTime);
    assert(count($explodes) == 2);
    //return formattedDateToTime($explodes[0])+formattedDateToTime($explodes[1]);
    return formatTimeAndDate($explodes[0],$explodes[1]);
}

function formatTimeAndDate($date,$time){
ereg ("([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})", $date, $ereg_date);
ereg("([0-9]{2}):([0-9]{2}):([0-9]{2})",$time,$ereg_time);
return mktime($ereg_time[1],$ereg_time[2],$ereg_time[3],$ereg_date[2],$ereg_date[1],$ereg_date[3]);
}

	
// Convertit un nombre en millisecondes depuis le 1er janvier 1970 en chaine au format $DATE_FORMAT." ".$TIME_FORMAT
function timeToFormattedDateTime($time){
    return date(str_replace("%", "", $GLOBALS['DATE_FORMAT']." ".$GLOBALS['TIME_FORMAT']), $time);
}

// Fonction permettant de savoir si une chaine est un entier ou non
// cf http://fr.php.net/manual/fr/function.ctype-digit.php
// "Imitation" du code pour que la fonction puisse être utilisée sous linux
// Source : http://cvs.sourceforge.net/viewcvs.py/*checkout*/wikipedia/phase3/includes/compatability/ctype.php
if(!function_exists("ctype_digit"))
{
    function ctype_digit() {
        $fname = 'ctype_digit';
    
        $args = func_get_args();
        list( $in, $ret ) = wf_ctype_parse_args( $fname, $args );
    
        if ( ! is_null( $ret ) )
            return $ret;
        else
            return (bool)preg_match( '~^[[:digit:]]+$~', $in );
    }
    
    /**
     * PHP does some munging on ctype_*() like converting  -128 <= x <= -1 to x +=
     * 256, 0 <= x <= 255 to chr(x) etc, it'll return true if x < -128 and false if
     * x >= 256, true if the input is an empty string and false if it's of any
     * other datatype than int or string, this function duplicates that behaviour.
     *
     * @param string $fname The name of the caller function
     * @param array $args The return of the callers func_get_args()
     * @return array An array with two items, the first is the munged input the
     *               calling function is supposed to use and a return value it
     *               should return if it's not null, $in will be null if $ret is
     *               not null since there's no point in setting it in that case
     */
    function wf_ctype_parse_args( $fname, $args ) {
        $ret = null;
    
        $cnt = count( $args );
    
        if ( $cnt !== 1 )
            trigger_error( "$fname() expects exactly 1 parameter $cnt given", E_USER_WARNING );
    
        $in = array_pop( $args );
    
        if ( is_int( $in ) ) {
            if ( $in >= 256 )
                return array( null, false );
            else if ( $in >= 0 )
                $in = chr( $in );
            else if ( $in >= -128 )
                $in = ord( $in + 256 );
            else if ( $in < -128 )
                return array( null, true );
        }
    
        if ( is_string( $in ) )
            if ( $in === '' )
                return array( null, true );
            else
                return array( $in, null );
        else
            // Like PHP
            return array( null, false );
    }
}
?>

<?php
// Fonction permettant de "catcher" l'affichage de ob_start()
function displayBufferContent($buffer){
    XHTMLBuilder::getInstance()->addContent($buffer);
    return XHTMLBuilder::getInstance()->getDisplay();
}

// Extrait la chaine de l'adresse, du code postal et de la ville dans une chaine "adresse" concaténée
// Tableau retourné avec [0] = adresse, [1] = code postal et [2] = ville
function extractAdresseCodePVilleFrom($adresse){
    ereg("^(.+)([0-9]{5})(.*)\$", $adresse, $eregAdresseStable);
    if(($eregAdresseStable[1] == "") && ($adresse != ""))
        ereg("^(.+)([0-9]{5})?(.*)?\$", $adresse, $eregAdresseStable);
    return array($eregAdresseStable[1], $eregAdresseStable[2], $eregAdresseStable[3]);
}

function my_mb_ucfirst($str, $e='utf-8') {
   $fc = mb_strtoupper(mb_substr($str, 0, 1, $e), $e);
   return $fc.mb_substr($str, 1, mb_strlen($str, $e), $e);
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
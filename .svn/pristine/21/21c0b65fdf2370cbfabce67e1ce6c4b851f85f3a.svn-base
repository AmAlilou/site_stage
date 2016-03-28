<?php
set_include_path(".");
require_once("inc/main.inc.php");
$url = $URL_ROOT_PATH;
if(SessionManager::isSomeoneLogged()){
    SessionManager::disconnectUsers();
    
    header( "Location: $url" );
    echo "D&#233;connexion effectu&#233;e avec succ&#232;s !";
}
else{
	header( "Location: $url" );
	echo "Vous n'&#234;tes pas connect&#233; !";
	
}
?>
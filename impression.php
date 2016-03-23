<?php
	## IMPRESSION ##############################################################
require_once("inc/main.inc.php");
?>
<script language="javascript">
function PSR_imprimer () {
	var PSR_f1 = null;
	var PSR_content=document.getElementById('PSR_print').parentNode.innerHTML;
	var PSR_title=document.getElementsByTagName('title')[0].innerText;
	if (PSR_f1) {if(!PSR_f1.closed) PSR_f1.close();}
	PSR_f1 = window.open ('',"PSR_f1", "height=500,width=600,menubar=yes,scrollbars=yes,resizable=yes,,left=2,top=5");  ;
	PSR_f1.document.open();
	PSR_f1.document.write("<html><head><title>" + PSR_title + "</title><link href='styles.css' rel='stylesheet' type='text/css'></head><body bgcolor='#FFFFFF' onload='window.print()'>" +PSR_content+"</body></html>");
	PSR_f1.document.close();
	PSR_f1.document.getElementById('PSR_print').style.visibility='hidden';
	PSR_f1.focus();
}
if ( window.name != "PSR_f1" && document.body.parentNode ) {
	document.write ("<div align='left' id='PSR_print'><input onclick='PSR_imprimer();' type='image'  style='font-family:arial; font-size:11px' src='../image/imprime.gif' /></div>");
}
</script>


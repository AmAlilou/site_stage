<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  
  
  <script src="/js/jquery-1.9.1.min.js"></script>
<script src="/js/functions.js"></script>
  {heading_here}
    <script type="text/javascript">
{javascript_here}

function __onload(){
{onload_here}
}
    </script>
  </head>
  <body onload="__onload();">
    <div class="content">
      <table border="0" cellspacing="0" cellpadding="0" width="100%">
        <tr style="background-image: url('{url_root_path}/image/bandeau_top2.png'); background-repeat: no-repeat; background-position: center; background-color: transparent;" height="153">
          <td colspan="2" align="center">&nbsp;</td>
        </tr>

        <tr>
          <td class="menu_content" width="20%" valign="top">
            {menu_here}
          </td>
          <td class="dynamic_content" valign="top">
            {dynamic_content_here}
          </td>
        </tr>
   	  <tr>
          <td colspan="2" align="right">MIAGe Bordeaux 2007</td>
        </tr>
      </table>
    </div>
    <div id="popup1" class="overlay">
	<div class="popup">
		<h2 id="contactType">Contact Responsable</h2>
		<a class="close" onclick="closePopupForm('popup1')">&times;</a>
		<div id="form-main">
			<div id="form-div">
				<form class="form" id="form1">

					<p class="name">
						<input name="name" type="text" autocomplete="off" class="feedback-input"
							placeholder="Nom" id="name" />
					</p>

					<p class="email">
						<input name="email" autocomplete="off" type="text" class="feedback-input" id="email"
							placeholder="Email" />
					</p>
					<p class="subjet">
						<input name="subject" type="text" autocomplete="off" class="feedback-input"
							id="subject" placeholder="sujet" />
					</p>
					<p class="text">
						<textarea name="text" class="feedback-input" id="comment"
							placeholder="Message"></textarea>
					</p>

					<p class="captcha" onClick="getCaptcha('captcha');">
						<input name="captcha" type="text" class="feedback-input"
							id="captcha" disabled />
					</p>
					<p>
						<input name="captchaText" type="text" autocomplete="off" id="captchaText"
							class="feedback-input" />
					</p>

					<div class="submit">
						<input type="button" value="SEND" id="button-blue" />
						<div class="ease"></div>
					</div>
				</form>
			</div>

		</div>
	</div>
	<script type="text/javascript">
getCaptcha('captcha');
</script>
</div>
  </body>
</html>
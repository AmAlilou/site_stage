<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  
  
  <script src="/js/jquery-1.9.1.min.js"></script>
<script src="/js/functions.js"></script>
  {heading_here}
    <script type="text/javascript">
{javascript_here}

/*function __onload(){
{onload_here}
}*/


    </script>
  </head>
  <body>
  <div class="wrapper">
  
  	<!--=== Header ===-->
    <div class="header">
    	  <!-- Topbar -->
        <div class="topbar-v1">
            <div class="container">
                <div class="row">
                	<div class="col-md-6 right">
                        <ul class="list-inline right">
                            {top_menu}
                        </ul>
                    </div>
               	</div>
            </div>
         </div>
        <div class="container">
        	 <div class="row">
                  <div class="col-md-12">
                       <a href="{home_page}"><img class="header-banner img-responsive" src="/image/bandeau_top2.png" width="1000" alt=""></a>
                    </div>
               </div>
            <!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
    	</div><!-- fin container -->
    	<div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
            <div class="container">
            	 {menu_here}
            </div>
        </div>
    </div><!-- fin header -->
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			{dynamic_content_here}
    		</div>
    	</div>
    </div>
  </div><!-- fin wrapper -->
 <!--   <div id="popup1" class="overlay">
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
-->

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <a class="close"  data-dismiss="modal" aria-hidden="true">&times;</a>
        <h3 id="myModalLabel">We'd Love to Hear From You</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal col-sm-12">
          <div class="form-group"><label>Name</label><input class="form-control required" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text"></div>
          <div class="form-group"><label>Message</label><textarea class="form-control" placeholder="Your message here.." data-placement="top" data-trigger="manual"></textarea></div>
          <div class="form-group"><label>E-Mail</label><input class="form-control email" placeholder="email@you.com (so that we can contact you)" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)" type="text"></div>
          <div class="form-group"><label>Phone</label><input class="form-control phone" placeholder="999-999-9999" data-placement="top" data-trigger="manual" data-content="Must be a valid phone number (999-999-9999)" type="text"></div>
          <div class="form-group"><button type="submit" class="btn btn-success pull-right">Send It!</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
    </div>
  </div>
</div>
	<script type="text/javascript">
getCaptcha('captcha');
</script>
</div>
  </body>
</html>
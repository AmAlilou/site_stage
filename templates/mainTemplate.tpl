<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>

  {heading_here}
 <script type="text/javascript">
     var RecaptchaOptions = {
        theme : 'custom',
        custom_theme_widget: 'recaptcha_widget'
     };
</script>               
 
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


<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
  <div class="modal-dialog">
	 <div id="loading">
	 	<img src="/image/ajax-loader.gif" width="50" height="50"/>
	 </div>
    <div class="modal-content">
      <div class="modal-header">
        <a class="close"  data-dismiss="modal" aria-hidden="true">&times;</a>
      </div>
      <div class="modal-body">
         <form class="form-horizontal col-sm-12" id="contact-form">
         <div class="form-group">
              <label class="control-label" for="contact">Contacter</label>
              <select name="contact" class="form-control" id="contactMail" required>
               		{contact_option}
              </select>
              <span class="help-block" style="display: none;">Please enter a valid e-mail address.</span>
          </div>
          <div class="form-group"><label>Nom</label>
			<input class="form-control required" autocomplete="off" id="name" placeholder="Votre nom" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text">
		  </div>
		  <div class="form-group"><label>E-Mail</label>
			<input class="form-control email" placeholder="Votre e-mail" id="email" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address" type="text">
		  </div>
		  <div class="form-group"><label>Sujet</label>
			<input class="form-control required" placeholder="Sujet"  id="subject" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text">
		  </div>
          <div class="form-group"><label>Message</label>
			<textarea class="form-control" placeholder="Message" id="comment" rows="12" data-placement="top" data-trigger="manual"></textarea>
		  </div>
		   
          <div class="form-group">
			
			<button type="button" id="submit" class="btn btn-success pull-right">Envoyer</button>
				 <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
		  </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
	

</div>
  </body>
</html>
/**
 * 
 */



function sendEmail(){
	
	var data = {
			"action" : "sendMessage",
			"name" :$("#name").val(),
			"contactMail" :$("#contactMail").val(),
			"subject" :$("#subject").val(),
			"comment" :$("#comment").val(),
			"email" :$("#email").val()
		};
		data = $(this).serialize() + "&" + $.param(data);
		$.ajax({
			url : '/class/SerialisableUtils.class.php',
			dataType : "json",
			data : data,
			type : "POST",
			success : function(result) {
				
				alert("Votre message a été bien envoyé");
				showLoading(false);
				
			},

			error : function() {
				alert("Un erreur est servenue lors l'envoie d'email");

				return false;

			}

		});

	}

function showLoading(hideLoding){
	
	if(hideLoding){
		   $('#loading').css("display","block");
	}else{
		$('#contact-form').trigger("reset");
		 $('#loading').css("display","none");
		 $('#myModal').css("display","none");
	}
}


$(document).ready(function(){
	
	$.fn.goValidate = function() {
		
		
	    var $form = this,
	        $inputs = $form.find('input:text');
	  
	    var validators = {
	        name: {
	            regex: /^[A-Za-z]{3,}$/
	        },
	        subject: {
	            regex: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/
	        },
	        email: {
	            regex: /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/
	        }
	       
	    };
	    
	    var validate = function(klass, value) {
	        var isValid = true,
	            error = '';
	        if (!value && /required/.test(klass)) {
	        	
	            error = 'This field is required';
	            isValid = false;
	        } else {
	            klass = klass.split(/\s/);
	            $.each(klass, function(i, k){
	                if (validators[k]) {
	                    if (value && !validators[k].regex.test(value)) {
	                        isValid = false;
	                        error = validators[k].error;
	                    }
	                }
	            });
	        }
	        return {
	            isValid: isValid,
	            error: error
	        }
	    };
	    
	    var showError = function($input) {
	        var klass = $input.attr('class'),
	            value = $input.val(),
	            test = validate(klass, value);
	      
	        $input.removeClass('invalid');
	        $('#form-error').addClass('hide');
	        
	        if (!test.isValid) {
	            $input.addClass('invalid');
	            
	            if(typeof $input.data("shown") == "undefined" || $input.data("shown") == false){
	               $input.popover('show');
	            }
	            
	        }
	      else {
	        $input.popover('hide');
	      }
	    };
	   
	    $inputs.keyup(function() {
	        showError($(this));
	    });
	  
	    $inputs.on('shown.bs.popover', function () {
	  		$(this).data("shown",true);
		});
	  
	    $inputs.on('hidden.bs.popover', function () {
	  		$(this).data("shown",false);
		});
	  
	    $("#submit").click(function(e) {
	    		    	
	        $inputs.each(function() { /* test each input */
	        	if ($(this).is('.required') || $(this).hasClass('invalid')) {
	            	showError($(this));
	        	}
	    	});
	        
	        if ($form.find('input.invalid').length) { /* form is not valid */
	        	e.preventDefault();
	            $('#form-error').toggleClass('hide');
	        }else{
	        	showLoading(true);
	        	sendEmail();
	        }
	    });
	    return this;
	};
	$('form').goValidate();                                                             
	
});



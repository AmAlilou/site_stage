/**
 * 
 */
/*
var _contactMail = '';
var _valid = false;
function getCaptcha(id) {
	var chars = "0Aa1Bb2Cc3Dd4Ee5Ff6Gg7Hh8Ii9Jj0Kk1Ll2Mm3Nn4Oo5Pp6Qq7Rr8Ss9Tt0Uu1Vv2Ww3Xx4Yy5Zz";
	var string_length = 8;
	var captchastring = '';
	for (var i = 0; i < string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		captchastring += chars.substring(rnum, rnum + 1);
	}
	document.getElementById(id).value = captchastring;
}



function validerElement(id) {

	jQuery(function($) {

		var valid = true;
		if ($("#" + id).val() == "") {
			$("#" + id).css({
				"background-color" : "#F5A9A9"
			});

			valid = false;
		} else {
			$("#" + id).removeAttr("style");
			valid = true
		}

		if (id == "email") {
			valid = validateEmail($("#" + id).val());
			if (!valid) {
				$("#" + id).css({
					"background-color" : "#F5A9A9"
				});
			} else {
				$("#" + id).removeAttr("style");

			}
		}

		if (id == "captchaText") {
			valid = checkCaptcha();
			if (!valid) {
				$("#" + id).css({
					"background-color" : "#F5A9A9"
				});
			} else {
				$("#" + id).removeAttr("style");

			}
		}

		_valid = valid;

	});

}
*/
/*jQuery(function($) {

	var elements = [ "name", "subject", "comment", "email", "captchaText" ];
	
	$("#button-blue").click(function() {
		for (var i = 0; i < elements.length; i++) {
			validerElement(elements[i]);
		}

		if (_valid) {
			var data = {
				"action" : "sendMessage",
				"name" :$("#name").val(),
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
				//	var objData = jQuery.parseJSON(result);
					alert(result);
					
				},

				error : function() {
					alert("cc");

					return false;

				}

			});

		}
	});

});

function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function checkCaptcha() {
	var d = document.getElementById('captcha').value;
	var c = document.getElementById('captchaText').value;
	if (d == c) {
		return true;
	}
	return false;
}

function showPopupForm(id, contactMail) {
	_contactMail = contactMail;
	var contactTitle = "";
	$("#myModal").css({
		"display" : "block",
		"visibility" : "visible",
		"opacity" : "1"
	});

	switch (id) {
	case "Responsable_des_stages":
		contactTitle = "Contacter responsable des stages";
		break;
	case "Secretariat":
		contactTitle = "Contacter secretariat";
		break;
	}

	$("#contactType").text(contactTitle);

}

function closePopupForm(id) {
	$("#" + id).css({
		"display" : "none",
		"visibility" : "hidden",
		"opacity" : "0"
	});
}

*/

$.fn.goValidate = function() {
	
	
    var $form = this,
        $inputs = $form.find('input:text');
  
    var validators = {
        name: {
            regex: /^[A-Za-z]{3,}$/
        },
        pass: {
            regex: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/
        },
        email: {
            regex: /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/
        },
        phone: {
            regex: /^[2-9]\d{2}-\d{3}-\d{4}$/,
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
  
    $form.submit(function(e) {
     
        $inputs.each(function() { /* test each input */
        	if ($(this).is('.required') || $(this).hasClass('invalid')) {
            	showError($(this));
        	}
    	});
        if ($form.find('input.invalid').length) { /* form is not valid */
        	e.preventDefault();
            $('#form-error').toggleClass('hide');
        }
    });
    return this;
};
$('form').goValidate();


import modal from './modal.min';
import validate from './validation.min';
import swal from 'sweetalert';

function Site($, params) {

	let options = params || {};
	

	$('#callback-form-btn').on('click', function(e) {
		$('#signup-modal').modal({
			fadeDuration: 250,
			fadeDelay: 1
		});
	});


   $("#call-form").validate({
      rules: {
        name: {
          required: true
        },
        phone: {
          required: true
        },
        email: {
          required: true
        }
      },

      messages: {
        name: "Please specify your name.",
        phone: "Please specify your phone number.",
        email: 'Please enter your email address.'
      }
    });

    
    $('#call-me-btn').on('click', function(e) {

      //var $this = $(this);
      var isvalid = $('#call-form').valid();
     
      if(isvalid){
        e.preventDefault();

        var register = {
          action: 'register',
          name: $('#name').val(),
          phone: $('#phone').val(),
          email: $('#email').val()
        }



         //Run Ajax Call
        $.ajax({
          type: 'POST',
          beforeSend: function(x) {
            if (x && x.overrideMimeType) {
             x.overrideMimeType("application/j-son;charset=UTF-8");
            }
          },
          dataType: "json",
          url: "ajax/signup.ajax.php",
          data: { register : JSON.stringify(register) },
          success: function(msg) {
            if (msg.hasOwnProperty('success')) {
              $('#name').val(''),
							$('#phone').val('');
							$('#email').val('');

							$.modal.close();

							swal("Thank you for your interest", "We will be getting back with you shortly");
            }
          }
        });

      }
    });


    $.validator.addMethod("isInteger", function(value, element) {
      return value >= 1;
    }, "This must be a valid zipcode");


    // Handle Size Stuff
    $('.icon-plus3').on('click', function() {
    	let $this = $(this);
    	let $section = $this.parent().parent();
    	$this.fadeOut();

    	$section.find('.copy').addClass('show-copy');

    })




}

export default Site;
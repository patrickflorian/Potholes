<!--
 	This is the feedback form that gets toggles in and out of view
 	based on the user clicking the 'feedback_toggle' div.
 -->
 <!-- **************************************************************  -->

 <div class="feedback feedback-toggle rotate" >Feedback</div>
 <div class="feedback feedback-form-wrapper">
   <form id="feedback-form" class="form-horizontal">  <legend>Please give us feedback .. </legend>
    <div class="alert alert-error" 	style="display:none">
            <h4>Uh-Oh</h4>
            Looks like some of the required fields are not complete!
        </div>
    <div class="alert alert-success" 	style="display:none">
            <h4>Thanks!</h4>
            Your feedback has been submitted, we'll get back to you as soon as we can!
        </div>
    <div class="alert alert-block" 	style="display:none">
            <h4>Warning!</h4>
            Something happened and the form did not get submitted...
        </div>
     <label>Name</label>
     <input type="text" id="username"  	data-validation='{"required":true,"type":"text"}' 	name="username" class="input-block-level"   >
    <label>Email</label>
     <input type="email" 	name="email"  	data-validation='{"required":true,"type":"email"}'  class="input-block-level"  >
     <label>Message</label>
     <textarea id="comment" 	name="comment"  data-validation='{"required":true,"type":"text"}' 	class="input-block-level" style="margin-bottom:10px;"  rows="4" cols="30"></textarea>
           <button class="btn btn-inverse btn-large pull-right"  float="right">Send</button>
       </form></div>
 <!-- **************************************************************  -->


 <script>
    // This is the Feedback toggle functionality it slides the feedback form in and out
    // of view when the user clicks the div with the class .feedback-toggle
    $('.feedback-toggle').click( function(){
            var 	left = parseFloat($('.feedback')[0].style.left.match(/[0-9]+/g)) || 49,
                    tgl	 = '+=390';
            (left > 49)  ? tgl = '-=390' : tgl = '+=390';
            $('.feedback').animate({ left: tgl}, 500);
        });

    /*
      This is the custom validation for the feedback form
      I have left the types open in the switch statement feel free
      to add.
      */
    validate = function(form,element){
            var isValid = false, // Assume that everything starts off invalid
                    fields  = $(form).find('[data-validation]'), //<-- Should return all input elements in that specific form.
                    data,
                    validationProps;
        $.each(fields, function(index, value){
                validationProps 	= $(value).data('validation');
         if(validationProps.required){
                 ($(value).val().length > 0 )? $(value).removeClass("required") : $(value).addClass("required");
             }

         if(!typeof validationProps.minlength === 'undefined' && parseFloat(validationProps.minlength) > 0){
                 ($(value).val().length > parseFloat(validationProps.minlength))? $(value).removeClass("required") : $(value).addClass("required");
             }

         switch(validationProps.type)
             {
                     case "email":
                         var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                         //console.log(validationProps.type);
                         //console.log($(value).val().match(re));
                         ($(value).val().match(re))? $(value).removeClass("required") : $(value).addClass("required");
                         break;
                     case "phone":
                         // add code here
                             break;
                         case "numeric":
                           // add code here
                                         break;
                                     default:
                                 }
                             });
               isValid = ($(form).children().is('.required'))? false : true;
               (isValid)? $(form).find('.alert-error').fadeOut('fast') : $(form).find('.alert-error').fadeIn('fast') ;
               return isValid;
           };
    // This handles the on focus and on focus lost validation
    $('input,textarea').on('blur', function(){
        validate($(this).parent('form'),$(this).attr('id'));
    }).on('focus', function(){
        $(this).removeClass("required");
    });
    // This is the form submission AJAX code which also
    // hides the feednack form.
    $("#feedback-form .btn").click(function() {
            var url  	= "path/to/your/script.php", // the script where you handle the form input.
                           data 	= $("#feedback-form").serialize(),
                            isValid   = validate("#feedback-form");
            if(isValid){
                        $.ajax({
                               type	: "POST",
                               url	: url,
                               data	: data , // serializes the form's elements.
                            success	: function(data){
                                   $('.feedback').find('.alert-error').fadeIn('fast');
                                   $('.feedback').animate({ left: '-=390'}, 500);
                               },
                        error	: function(data){
                                   $('.feedback').find('.alert-block').fadeIn('fast');
                                   return false;
                            }
                         });
                     }
                return false; // avoid to execute the actual submit of the form.
            });

     </script>

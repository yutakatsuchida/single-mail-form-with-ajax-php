$(document).ready(function(){
    
    // define doms
    var $input_fullname = $("input[name='fullname']");
    var $input_email = $("input[name='email']");
    var $input_tel = $("input[name='tel']");
    var $select_province = $("select[name='province']");
    var $input_radio = $("input[type='radio']");
    var $form = $("form");
    var $submitButton = $("button[type='submit']");
    


    $("form").submit(function(event){
        event.preventDefault();
        
        //initialize values
        var error = 0;
        var error_flags = new Array();
        error_flags = [];
        $("form .error").remove();

        // Start Validation

        // Fullname
        if($input_fullname.val() == "") {
             error_flags.push('true');
             if ($input_fullname.next().length != 1){
                $input_fullname.after("<p class='error alert alert-danger' role='alert'>Your full name is empty.</p>");
            }
        } else {
            $input_fullname.next(".error").remove();
        }

        // Email
        if($input_email.val() == "") {
            error_flags.push('true');
            if ($input_email.next().length != 1){
                $input_email.after("<p class='error alert alert-danger' role='alert'>Your email is empty.</p>");
            }
        } else if(!$input_email.val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
            error_flags.push('true');
            $input_email.after("<p class='error alert alert-danger' role='alert'>Wrong Email address format</p>");
        } else {
            $input_email.next(".error").remove();
        }

        // Tel
        if($input_tel.val() == "") {
            error_flags.push('true');
            if ($input_tel.next().length != 1) {
                $input_tel.after("<p class='error alert alert-danger' role='alert'>Your Tel is empty.</p>");
            }
        } else {
            $input_tel.next(".error").remove();
        }

        // Province
        if($select_province.val() == "") {
            error_flags.push('true');
            if ($select_province.next().length != 1) {
                $select_province.after("<p class='error alert alert-danger' role='alert'>Your Province is not choosen.</p>");
            }
        } else {
            $select_province.next(".error").remove();
        }

        // Radio
        if(!$input_radio.is(':checked')) {
            error_flags.push('true');
            if ($("#radio-fieldset").next().length != 1) {
                $("#radio-fieldset").after("<p class='error alert alert-danger' role='alert'>Radio is not choosen.</p>");
            }
        } else {
            $input_radio.next(".error").remove();
        }

        // Checkbox
        if(!$("input[type='checkbox']").is(':checked')) {
            error_flags.push('true');
            
            if ($("#checkbox-field").next().length != 1) {
                $("#checkbox-field").after("<p class='error alert alert-danger' role='alert'>Checkbox is not choosen.</p>");
            }
        } else {
            $("#checkbox-field").next(".error").remove();
        }

        // Textarea
        if($("textarea[name='message']").val() == "") {
            error_flags.push('true');
            if ($("textarea[name='message']").next().length != 1) {
                $("textarea[name='message']").after("<p class='error alert alert-danger' role='alert'>Textarea is empty.</p>");
            }
        } else {
            $("textarea[name='message']").next(".error").remove();
        }
        //console.log(error_flags);
        $.each( error_flags, function( i, val ) {
            if (val == "true") {
                error = 1;
            }
        });

        //if any errors
        if (error == 1) {
        
        // no errors. proceed sending
        } else {

            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: $form.serialize(),
                timeout: 10000,  
                beforeSend: function(xhr, settings) {
                    // disable the submit button prevending from double sending
                    $submitButton.attr('disabled', true);
                },
                complete: function(xhr, textStatus) {
                    // re-activate the submit button
                    $submitButton.attr('disabled', false);
                },
        
                // after success to send
                success: function(result, textStatus, xhr) {
                    $form[0].reset();
                    alert('Your message has been sent successfully.');
                    console.log(result);
                },
        
                // if any sending errors
                error: function(xhr, textStatus, error) {
                    alert('Your message was fail to be sent.');
                }
            });
        }
    });
});
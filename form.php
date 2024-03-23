<?php
$reCAPTCHA_site_key =  variable_get('reCAPTCHA_v3_site_key', '');
?>
<html>

  <head>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js'></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
    <form id='captcha_form' name='captcha_form' method='POST' action='form/submit-form'>
      <input name='first_name' id='first_name' type='text'>
      <label for='first_name'>First Name *</label>
      <input name='last_name' id='last_name' type='text'>
      <label for='last_name'>Last Name *</label>
      <input class='g-recaptcha' 
              data-sitekey='<?php echo $reCAPTCHA_site_key; ?>' 
              data-callback='onValidate' 
              data-action='submit' 
              type='submit' value='Submit' name='submit'>
    </form>

  </body>

  <script>
    function onValidate(token) {
      if ($('#captcha_form').validate()) {
        $('#captcha_form').submit();
      }
    }
    $('#captcha_form').validate({
      rules: {
        first_name: 'required',
        last_name: 'required'
      },
      messages: {
        first_name: 'Please enter first name',
        last_name: 'Please enter last name'
      }
    });
  </script>

</html>
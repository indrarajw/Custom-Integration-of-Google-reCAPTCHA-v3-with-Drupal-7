<?php
if (!empty($_POST)) {
    $threshold_val = 'YOUR THRESHOLD VALUE';
    $captcha = google_recaptcha_v3_validation('SampleCaptchaForm', $_POST, $threshold_val);
    if ($captcha) {
        //Form submission logic goes here
        echo 'Captcha success</br>';
        print_r($_POST);
    } else {
        //do something as failing action here
        echo 'Captcha faild';
    }
}
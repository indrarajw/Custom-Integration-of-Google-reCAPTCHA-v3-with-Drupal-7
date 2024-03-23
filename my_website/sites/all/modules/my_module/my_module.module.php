<?php
function google_recaptcha_v3_validation($form_name, $post_data, $threshold_val = 0)
{
    $validated = false;
    try {
        if (isset($post_data['g-recaptcha-response'])) {
 
            $captcha = $_POST['g-recaptcha-response'];
            $secret_key = variable_get('reCAPTCHA_v3_secret_key', '');
            $threshold_val = ($threshold_val == 1) ? variable_get('reCAPTCHA_v3_threshold_val', '') : floatval($threshold_val);

            $captcharesponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $captcha . '&remoteip=' . $_SERVER['REMOTE_ADDR']);
            // use json_decode to extract json response
            $response = json_decode($captcharesponse);
            $success = $response->success;
            $success = $response->success;
            $score = $response->score;

            if ($success == true && $score >= $threshold_val) {
                $validated = true;
            } else {
                watchdog('recaptchav3', 'Fail to validate captcha | Captcha responce - %success | Captcha Score - %score | Post Data = %body | Form Name = %form_name', array('%score' => $score, '%success' => $captcharesponse, '%body' => json_encode($post_data), '%form_name' => $form_name), WATCHDOG_ERROR);
            }
        } else {
            watchdog('recaptchav3', 'Empty Captcha responce | Post Data = %body | Form Name = %form_name', array('%body' => json_encode($post_data), '%form_name' => $form_name), WATCHDOG_ERROR);
        }
    } catch (Exception $ex) {
        watchdog('recaptchav3', 'Captcha exception | Post Data = %body | Form Name = %form_name | error = %error', array('%body' => json_encode($post_data), '%form_name' => $form_name, '%error' => $ex->getMessage()), WATCHDOG_ERROR);
    }
    return $validated;
}

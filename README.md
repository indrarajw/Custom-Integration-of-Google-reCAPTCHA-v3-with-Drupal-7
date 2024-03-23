# Custom-Integration-of-Google-reCAPTCHA-v3-with-Drupal-7

This repository is solely for showcasing folder structure and sample code for the article [https://medium.com/@indrarajw/guide-custom-integration-of-google-recaptcha-v3-with-drupal-7](https://medium.com/@indrarajw/guide-custom-integration-of-google-recaptcha-v3-with-drupal-7-b1cb272c0028). 

All other Drupal 7 system files and folders have been removed from this repository for simplicity.

To follow along with the guide:

1. Create a new page on your Drupal 7 site.
2. Update the settings.php file with real keys, threshold value.
3. Copy and paste the contents of the "form.php" file into the newly created page.
4. Move "my_module.module" and "my_module.info" to my_website/sites/all/modules/my_module folder.
5. Enable the module from admin panel.
6. Additionally, create a page with the URL "form/submit-form".
7. Copy and paste the contents of the "submit.php" file into the "submit-form" page.

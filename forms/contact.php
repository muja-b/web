<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  $receiving_email_address = 'ragnarlothbrokmmb@gmail.com';

mail (  $receiving_email_address , $_POST['subject'] ,  $_POST['message'] )

?>


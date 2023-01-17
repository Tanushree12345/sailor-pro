<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'tanushreedash1996@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  // $check = new PHPMailer;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  
  $htmlContent = file_get_contents("test.html");

  

 
   


  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'sundramk369@gmail.com',
    'password' => 'bcvubdmkxovqsktb',
    'port' => '587'
  );
  


  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);
  $contact->set_message( $htmlContent);

  
  $contact->add_attachment('resume', 20, array('pdf', 'doc', 'docx', 'rtf',));
  $contact->cc = array('tanushreedash1996@gmail.com', 'goldydash1996@gmail.com');
$contact->bcc = array('sundramkumar773@gmail.com', 'anusha.logisoftit@gmail.com');

  echo $contact->send();
?>

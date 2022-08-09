<?php

if(isset($_POST["submit"])) {
  // Read the form values
  $success = false;
  $fName = isset( $_POST['first'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['first'] ) : "";
  $lName = isset( $_POST['last'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['last'] ) : "";
  $senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
  $phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
  $message = isset( $_POST['contact_message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['contact_message'] ) : "";
  
  //Headers
  $to = "bimbola1995@gmail.com";
  $subject = "New Message from Sell To Palm Coast Property Group website";
  $headers = "From: $senderEmail \r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
  
  //body message
  $message = "Your Name: ". $fName . " ". $lName . "<br> Email: ". $senderEmail . "<br> Phone Number: ". $phone . "<br> Message: " . $message . "";
  
  //Email Send Function
    $send_email = mail($to, $subject, $message, $headers);
      
    echo ($send_email) ? '<div class="success alert alert-success text-center rounded-pill mt-2" style="text-align:center; font-size:40px;">Email has been sent successfully and you will hear<br> from us as soon as possible. Click the button<br> bellow to navigate to the main website</div><a href="index.html" style="font-size:30px; display:flex; justify-content:space-around;">Home</a>' : 'Error: Email did not send.';header('Location: index.html?message=Successfull');
}
else
{
  echo '<div class="failed alert alert-danger text-center rounded-pill mt-2">Failed: Email not Sent.</div>';
}
?>
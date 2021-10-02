<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $to = "ranjusm06@gmail.com";
  $name = $_POST['name'] ? $_POST['name'] : '';
  $mobile = $_POST['mobile'] ? $_POST['mobile'] : '';
  $email = $_POST['email'] ? $_POST['email'] : '';
  $subject = $_POST['subject'] ? wordwrap($_POST['subject'], 100) : '';
  $message = $_POST['message'] ? $_POST['message'] : '';

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // Additional headers 
  $headers .= 'From: ' . $email . '<' . $email . '>' . "\r\n";

  $htmlContent = ' 
    <html> 
    <head> 
        <title>Contact Request</title> 
    </head> 
    <body> 
        <table cellspacing="0" style="width: 100%;"> 
            <tr> 
                <th>Name:</th><td>' . $name . '</td> 
            </tr>
            <tr> 
                <th>Mobile Number:</th><td>' . $mobile . '</td> 
            </tr>
            <tr> 
                <th>Email ID:</th><td>' . $email . '</td> 
            </tr>
            <tr> 
                <th>Message:</th><td>' . $message . '</td> 
            </tr>
        </table> 
    </body> 
    </html>';

  if (mail($to, $subject, $htmlContent, $headers)) {
    echo 'Email has sent successfully.';
  } else {
    echo 'Email sending failed.';
  }
}

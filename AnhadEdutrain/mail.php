<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require 'class.phpmailer.php';

try {
    $mail = new PHPMailer(true); //New instance, with exceptions enabled

    $to = "manish.singh@forestallers.in";
	$mail->AddAddress($to);
	$mail->From       = "www.anhadedutrain.com";
    $mail->FromName   = "AnhadEduTrain";
	$mail->Subject  = "Resume" ;
	
	

	$body             = "<table>
	                         <tr>
							    <th colspan='2'>This Sample Mail</th>
							 </tr>
							 
							 <tr>
							    <td style='font-weight:bold'>Name :</td>
								<td>".$_POST['name']."</td>
							 </tr>
							 
							 <tr>
							  <td style='font-weight:bold'>E-mail : </td>
							  <td>".$_POST['email']."</td>
							</tr>
							<tr>
							  <td style='font-weight:bold'>Message : </td>
							 <br>
							  <td>".$_POST['message']."</td>
							</tr>
	                     <table>";
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
	$mail->MsgHTML($body);
	

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	//$mail->Host       = "mail.yourdomain.com"; // SMTP server
	//$mail->Username   = "name@domain.com";     // SMTP server username
	//$mail->Password   = "password";            // SMTP server password

	$mail->IsSendmail();  // tell the class to use Sendmail
	$mail->AddReplyTo("manish8081@gmail.com");
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap
	
	$mail->AddAttachment($_FILES['file']['tmp_name'],
                         $_FILES['file']['name']);
	$mail->IsHTML(true); // send as HTML
	$mail->Send();
	echo 'Message has been sent.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
?>
<?php

/* Set e-mail recipient */
$myemail  = "manish8081@gmail.com";
$to=$myemail;

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['yname'], "Enter your name");
$phone  = check_input($_POST['yphone'], "enter valid phone number");
$email    = check_input($_POST['yemail']);
$comments    = check_input($_POST['comment']);

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    echo"wrong email";
}

/* If URL is not valid set $website to empty */
if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $website))
{
    $website = '';
} 


/* Let's prepare the message for the e-mail */
$message = "Hello! 

Your contact form has been submitted by: 

Name: $yourname 
E-mail: $email 
Phone Number: $phone 

Message: $comments

End of message
";
if(isset($_POST['yname']) AND isset($_POST['yphone']) AND isset($_POST['yemail']))
{
    mail($to,'Message From AnhadEduTrain.com', $message);
    echo json_encode(array('success' => true));
	    
}
 else {
    echo json_encode(array('error' => true));
    
}
/* Send the message using mail() function */




/* Redirect visitor to the thank you page */

// header('Location: index.html');

exit;
     

/* Functions we used */

function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error();
    }
    return $data;
}

function show_error(){
echo json_encode(array('error' => true));
}
?>
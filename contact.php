<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$message = trim($_POST["message"]);

    if($name == "" OR $email == "" OR $message == "" )
    {
      echo "you must specify a value for name, message and email";
        exit;
        
    }
    foreach( $_POST as $value)
    {
        if( stripos($value,'content-Type:') !== False)
        {
          echo "There was a problem with the information you entered";  
           exit; 
        }
    }
    
    if($_POST["Address"] != "")
    {
       echo "Your form submission has an error";    
        exit;
    }
    require_once("inc/phpmailer/class.phpmailer.php");
    
    $mail = new PHPMailer();
    if(!$mail->ValidateAddress($email))
    {
      echo "You must specify a valid email address";
        exit;
    }
        
        
    
$email_body = "";
$email_body = $email_body . "Name: " . $name . "<br>";
$email_body = $email_body . "Email: ". $email . "<br>";
$email_body = $email_body . "message: " . $message;





$mail->SetFrom('$email', '$name');


$address = "supriya.miki02@gmail.com";
$mail->AddAddress($address, "Pretty in Pink");

$mail->Subject    = "Pretty in Pink contact form submission | " . $name;

$mail->MsgHTML($email_body);



if(!$mail->Send()) {
  echo "There was a problem sending the email:" . $mail->ErrorInfo;
    exit;
} else {
  echo "Message sent!";
}


header("Location: contact.php?status=thanks");
    exit;
}
?>

<?php 
$pageTitle = "Contact Mike";
$section = "contact";

include('inc/header.php'); 
?>
 <div class="section page">
<div class="wrapper">
<h1>contact</h1>
    
    <?php 
if(isset($_GET["status"]) AND $_GET["status"] == "thanks")
{
    ?>
<p>Thanks for the email !. I&rsquo;il be in touch shortly.</p>
    <?php }
    else{
    ?>
    <p>I&rsquo;d love to hear from you.Please complete the form to send me an email</p>
    
    <form method="post" action="contact.php">
        <table>
            <tr>
                <th> 
                    <label for="name">Name</label> 
                </th> 
                
                
                <td>
                    <input type="text" name="name" id="name">
                </td>
        
            </tr>
            
            
            <tr>
                <th> 
                    <label for="email">Email</label> 
                </th> 
                
                
                <td>
                    <input type="text" name="email" id="email">
                </td>
        
            </tr>
            
            
            
            <tr>
                <th> 
                    <label for="message">Message</label> 
                </th> 
                
                
                <td>
                    <textarea name="message" id="Message"></textarea>
                </td>
        
            </tr>
            
            <tr style="display : none;">
                <th> 
                    <label for="Address">Address</label> 
                </th> 
                
                
                <td>
                    <input type="text" name="Address" id="Address">
                </td>
        
            </tr>
        </table>  
        
        <input type="submit" value="send">
    </form>
    
    <?php } ?>
</div>


</div>
<?php include('inc/footer.php'); ?>

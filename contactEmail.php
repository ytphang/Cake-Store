<?php

session_start();

if (!empty($_POST['contact-submit'])) 
{
  
    $email=$_POST['email'];
  
    $phoneNo=$_POST['phoneNo'];

    $name=$_POST['name'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    /* Regular expression check */
   
    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
 
    $phoneNo_check = preg_match('~^[0-9!_]{2}+-[0-9!_]{8}$~i', $phoneNo);

   
        if(!$email_check){
            $_SESSION['message-updateProfile'] = "email require @  .com";
            header("Location:". $_SERVER['HTTP_REFERER']);

            
        }

    

        if(!$phoneNo_check){
            $_SESSION['message-updateProfile'] = "phone no require 2 digit number, follow by a -, follow by 8 digit number";
            header("Location:". $_SERVER['HTTP_REFERER']);
           
        }
        if( $email_check && $phoneNo_check) 
        {

        try 
            {
        $to = "buyowlcakebruh@gmail.com"; // this is your Email address
        $from = $_POST['email']; // this is the sender's Email address
        $name = $_POST['name'];
        $mobile = $_POST['phoneNo'];
        $subject = $_POST['subject'];
        $subject2 = "Form submission:" . " " . $subject;

        
        $message = "From: " . $name . "\n" . "Mobile number: " . $mobile ."\n" . "Wrote the following:" . "\n\n" . $_POST['message'];
        $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        @mail($to,$subject2,$message,$headers);
        @mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
       
        $var =( "Mail Sent. Thank you " . $name . ", we will contact you shortly.");
        //header("Location:". $_SERVER['HTTP_REFERER']);
        header("refresh:0; url=contact.php");
        //echo  'email success' ;
        echo "<script type='text/javascript'>alert('$var');</script>";
       
        
        

    } catch (Exception $e) {
            echo 'please try again';
    }


}






}
else
{

}
?>


          

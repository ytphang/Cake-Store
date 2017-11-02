<?php

include("functions.php");
include ("session2.php");


if(isset($_POST['forgetPassword-submit'])){

/* Login Form */

     $email=$_POST['email'];
    if($email!="")
    {
        $checkUser=sendPasswordEmail($email);
    
        
        //var_dump($checkUser);
        
      
        if($checkUser=="error")
        {
            //var_dump($checkUser);
            $_SESSION['message-forgetPassword'] = 'Error, please contact us at buyowlcake@gmail.com';
            $url=BASE_URL.'forgetPass.php';
            header("Location: $url");
            
        }
        elseif($checkUser=="nonexist")
        {
            $_SESSION['message-forgetPassword'] = 'Email not found';
            $url=BASE_URL.'forgetPass.php';
            header("Location: $url");
            
        }
        else
        {
            //var_dump($checkUser);
            $_SESSION['message-forgetPassword'] = 'An email has been send to the above email to recover password';
            $url=BASE_URL.'forgetPass.php';
            header("Location: $url");

        }
        
    }else{
        $_SESSION['message-forgetPassword'] = 'No email entered, please enter an email';
            $url=BASE_URL.'forgetPass.php';
            header("Location: $url");

    }

    
}





?>


<?php
include("session2.php");
include("userClass.php");
session_start();

$userClass = new userClass();


if(isset($_POST['login-submit'])){

/* Login Form */

	$username=$_POST['username'];
	$password=$_POST['password'];
   

    if(isset($_REQUEST["destination"])){
        if(strlen(trim($username))>1 && strlen(trim($password))>1 )
            {
                $uid=$userClass->check_login($username,$password);
                if($uid)
                {
                
                        //$_SESSION['message-login'] = "You are now logged in";
                        $url=BASE_URL.'checkout.php';
                        header("Location: $url"); // Page redirecting to checkout.php
                    
                }else{
                    $_SESSION['message-login'] = "The two password does not match";
                    $_SESSION['modaltoggle'] = 1;
                    $url=BASE_URL.'catalogue.php';
                    header("Location: $url");		
      
                }
        }
    }
    else{
            if(strlen(trim($username))>1 && strlen(trim($password))>1 )
            {
                $uid=$userClass->check_login($username,$password);
                if($uid)
                {
                
                        //$_SESSION['message-login'] = "You are now logged in";
                        $url=BASE_URL.'index.html';
                        header("Location: $url"); // Page redirecting to home.php
                    
                }else{
                    $_SESSION['message-login'] = "The two password does not match";
                    $url=BASE_URL.'account.php';
                    header("Location: $url");		
                
                }
        }
    }


	


}



?>
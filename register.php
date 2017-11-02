<?php

include("session2.php");
include("userClass.php");
session_start();

$userClass = new userClass();

//$userClass = new userclass();
//if(isset($_POST['register-form'])){
//	header('Location:account.html');	
//}

if (!empty($_POST['register-submit'])) 
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];
	$phoneNo=$_POST['mobile'];

	/* Regular expression check */
	$username_check = preg_match('~^[A-Za-z0-9_]{3,30}$~i', $username);
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
	$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{5,30}$~i', $password);
	$phoneNo_check = preg_match('~^[0-9!_]{2}+-[0-9!_]{8}$~i', $phoneNo);


    if(isset($_REQUEST["destination_register"])){
        	if($password!==$confirm_password){
                //$errorMsgReg="password mismatch.";
                $_SESSION['message-register'] = "The two password does not match";
                $_SESSION['modaltoggle'] = 1;
                $url=BASE_URL.'catalogue.php';
                header("Location: $url");

	            }
            else
            {
                if(!$username_check){
                    $_SESSION['message-register'] = "username require 4 - 30 charater";
                    $url=BASE_URL.'catalogue.php';
                    $_SESSION['modaltoggle'] = 1;
                    header("Location: $url");
                }

                if(!$email_check){
                    $_SESSION['message-register'] = "email require @  .com";
                    $url=BASE_URL.'catalogue.php';
                    $_SESSION['modaltoggle'] = 1;
                    header("Location: $url");
                }

                if(!$password_check){
                    $_SESSION['message-register'] = "password require 6-30 character";
                    $url=BASE_URL.'catalogue.php';
                    $_SESSION['modaltoggle'] = 1;
                    header("Location: $url");
                }

                if(!$phoneNo_check){
                    $_SESSION['message-register'] = "phone no require 2 digit number, follow by a -, follow by 8 digit number";
                    $url=BASE_URL.'catalogue.php';
                    $_SESSION['modaltoggle'] = 1;
                    header("Location: $url");
                }

                if($username_check && $email_check && $password_check && $phoneNo_check) 
                {
                    $uid=$userClass->create_user($username,$password,$email,$phoneNo);

                    if($uid)
                    {
                        $_SESSION['message-register'] = "You are now logged in";
                        $_SESSION['username'] = $username;
                        $url=BASE_URL.'checkout.php';
                        header("Location: $url"); 
                    }
                    else
                    {
                        $_SESSION['message-register'] = "Username or Email already exists.";
                        $url=BASE_URL.'catalogue.php';
                        $_SESSION['modaltoggle'] = 1;
                        header("Location: $url");                 
                    }
                }


            }
    }//end of isset
    else{

    

	if($password!==$confirm_password){
		//$errorMsgReg="password mismatch.";
		$_SESSION['message-register'] = "The two password does not match";
		header("Location: registeracc.php");

	}
	else
	{
            if(!$username_check){
                $_SESSION['message-register'] = "username require 4 - 30 charater";
                $url=BASE_URL.'registeracc.php';
                header("Location: $url");
            }

            if(!$email_check){
                $_SESSION['message-register'] = "email require @  .com";
                $url=BASE_URL.'registeracc.php';
                header("Location: $url");
            }

            if(!$password_check){
                $_SESSION['message-register'] = "password require 6-30 character";
                $url=BASE_URL.'registeracc.php';
                header("Location: $url");
            }

            if(!$phoneNo_check){
                $_SESSION['message-register'] = "phone no require 2 digit number, follow by a -, follow by 8 digit number";
                $url=BASE_URL.'registeracc.php';
                header("Location: $url");
            }

            if($username_check && $email_check && $password_check && $phoneNo_check) 
            {
                $uid=$userClass->create_user($username,$password,$email,$phoneNo);

                if($uid)
                {
                    $_SESSION['message-register'] = "You are now logged in";
                    $_SESSION['username'] = $username;
                    $url=BASE_URL.'index.html';
                    header("Location: $url"); // Page redirecting to home.php 
                }
                else
                {
                    $_SESSION['message-register'] = "Username or Email already exists.";
                    $url=BASE_URL.'registeracc.php';
                    header("Location: $url");
                    //$errorMsgReg="Username or Email already exists.";
                }
            }

        }//end of else
    }//end of big else
}


//register-submit

//header('Location:account.html');	

?>



<?php

include("session.php");

if (!empty($_POST['updateProfile-submit'])) 
{
	//$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];
	$phoneNo=$_POST['mobile'];

	/* Regular expression check */
	//$username_check = preg_match('~^[A-Za-z0-9_]{3,30}$~i', $username);
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
	$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{5,30}$~i', $password);
	$phoneNo_check = preg_match('~^[0-9!_]{2}+-[0-9!_]{8}$~i', $phoneNo);

	if($password!==$confirm_password){
		//$errorMsgReg="password mismatch.";
		$_SESSION['message-updateProfile'] = "The two password does not match";
		header("Location:". $_SERVER['HTTP_REFERER']);
			//$url=BASE_URL.'account.php';
			//header("Location: $url");

	}
	else
	{
		//if(!$username_check){
		//	$_SESSION['message-updateProfile'] = "username require 4 - 30 charater";
		//	header("Location:". $_SERVER['HTTP_REFERER']);
			//$url=BASE_URL.'account.php';
			//header("Location: $url");
		//}

		if(!$email_check){
			$_SESSION['message-updateProfile'] = "email require @  .com";
			header("Location:". $_SERVER['HTTP_REFERER']);
			//$url=BASE_URL.'account.php';
			//header("Location: $url");
		}

		if(!$password_check){
			$_SESSION['message-updateProfile'] = "password require 6-30 character";
			header("Location:". $_SERVER['HTTP_REFERER']);
			//$url=BASE_URL.'account.php';
			//header("Location: $url");
		}

		if(!$phoneNo_check){
			$_SESSION['message-updateProfile'] = "phone no require 2 digit number, follow by a -, follow by 8 digit number";
			header("Location:". $_SERVER['HTTP_REFERER']);
			//$url=BASE_URL.'account.php';
			//header("Location: $url");
		}

		if( $email_check && $password_check && $phoneNo_check) 
		{
			$result=$userClass->updateUserDetails($email,$password,$phoneNo);

			if($result)
			{
				$_SESSION['message-updateProfile'] = "Profile updated";
				header("Location:". $_SERVER['HTTP_REFERER']);
				//header("Location: $url"); // Page redirecting to home.php 
			}
			else
			{
				$_SESSION['message-updateProfile'] = "Username or Email already exists.";
				header("Location:". $_SERVER['HTTP_REFERER']);
			//$url=BASE_URL.'account.php';
			//header("Location: $url");
				//$errorMsgReg="Username or Email already exists.";
			}
		}

	}
}




?>

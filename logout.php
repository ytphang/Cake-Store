<?php

include("userClass.php");
session_start();
/**
*Clear session and redirect user back to index page
**/


	$session_uid='';
	$_SESSION['uid']=''; 
    $_SESSION['username'] ='';
    $session_uid=NULL;
	unset($_SESSION['uid']); 
    unset($_SESSION['username']);


    unset($_SESSION['is_logged_in']);
	if(empty($session_uid) && empty($_SESSION['uid']))
	{
		$url=BASE_URL.'index.html';
		header("Location: $url");
		//echo "<script>window.location='$url'</script>";
	}


    /*
    try {
        session_unset();
    } catch (Exception $e) {
        return false;
    }
    return true;
	*/


?>
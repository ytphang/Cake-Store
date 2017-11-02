<?php
session_start();
//uid exist
if(isset($_SESSION['uid'])== true)
{
	$url='index.html';
	header("Location: $url");
}
/**
if(empty($session_uid))
{

}
**/
?>

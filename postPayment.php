<?php
include("session.php");


if($_POST['backToCatalogue-submit']){
	
	$url='catalogue.php';
	header("Location: $url");
				
}


if($_POST['backToIndex-submit']){
	
	$url='index.html';
	header("Location: $url");

}


if($_POST['cancelOrder-submit']){
	
    $_SESSION["cart_item"]="";
    $_SESSION["item_total"]="";
    unset($_SESSION["cart_item"]);
    unset($_SESSION["item_total"]);
    $url='index.html';
	header("Location: $url");
}


if($_POST['backToCheckOut-submit']){
	
	$url='checkout.php';
	header("Location: $url");

}






?>
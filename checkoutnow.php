<?php
include('checkoutFunction.php');
session_start();
if( isset($_POST['checkout-submit']) || isset($_POST['paypal-submit']))
{
		
		
		//echo  '<pre>'; print_r($_SESSION["cart_item"]); echo '</pre>';;
		
		echo"Please do not close this window or click the Back button on your browser.";

		//foreach ($_SESSION["cart_item"] as $item) {
    	//	echo $item['name'];
    	//									}
		$collectionDate = $_POST['collectionDate'];
		
		//echo $_POST['collectionDate'];
		//echo " ";
		//echo $_SESSION['item_total'];
		
		//$orderFormat = mktime(date("m") , date("d"), date("Y"));
    	//$orderDate = date("Y-m-d",$orderFormat);
    	
    	//echo " ";
    	//echo $orderDate;
		
		$var =$_SESSION["cart_item"];
		//var_dump($_SESSION["cart_item"]);

		//var_dump($_SESSION["cart_item"]["name"]);

		$email = $_POST['email'];
		$result = confirmOrder(($_SESSION["cart_item"]), $collectionDate);
		//var_dump($result);
		echo "Processing Payment... ";


		//echo " confirmOrder";
		
		if($result){
			$sent = sendPurchasedEmail($var,$collectionDate,$email);
			echo "Processing Order... ";

			if ($sent)
			{
				echo " Order Complete. ";
				//sleep(15); 
				
				
				$url=BASE_URL.'paymentComplete.php';
				header("Location: $url");
				
				
			}else{

				$url=BASE_URL.'paymentFail.php';
				header("Location: $url");

				//echo "Process Fail, Please retry.";
				//header("Location:". $_SERVER['HTTP_REFERER']);
			}
		}

	if(isset($_POST['checkout-submit']))
	{

	}

	if(isset($_POST['paypal-submit']))
	{

	}



}


?>
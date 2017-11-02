<?php

include("init.php"); 
//session_start();

function confirmOrder($var,$collectionDate)
{
	$db = connect_database();
	$inserted=0;
	$orderFormat = mktime(date("m") , date("d"), date("Y"));
    $orderDate = date("Y-m-d",$orderFormat);
	//var_dump($var);
	//var_dump($orderDate);
	foreach ($var as $item) {

		try {
			//	echo "////////////////////////////////////////////////////////////";
				$cake = $item["name"];
				$quan = $item["quantity"];
			//	var_dump($cake);


				$query= $db->prepare("INSERT INTO orders(username,orderDate,cakeName,quantity,collectionDate) VALUES (:username,:orderDate,:cakeName,:quantity,:collectionDate)");
				$query->bindParam("username", $_SESSION["username"],PDO::PARAM_STR) ;
				$query->bindParam("orderDate", $orderDate,PDO::PARAM_STR) ;
				$query->bindParam("cakeName", $cake,PDO::PARAM_STR) ;
				$query->bindParam("quantity", $quan,PDO::PARAM_INT);
				$query->bindParam("collectionDate", $collectionDate,PDO::PARAM_STR);
				$query->execute();
				$inserted++;
			
		} catch (Exception $e) {
			$db=null;
			return $e;
		}

	}
	$db=null;
	if ($inserted>0){
		return true;
	}else{
		return "smtg wrong";
	}
}

function sendPurchasedEmail($var,$collectionDate,$email)
{
	$username = $_SESSION["username"];
	$orderFormat = mktime(date("m") , date("d"), date("Y"));
	$orderDate = date("Y-m-d");
 	try 
   	{

	    $recieptln1 = "Dear $username,"."<?php echo '</br>'; ?>"." Thank you for the pruchasing at BuyOwlCakeBruh. \r\n Attached below is the reciept for the order.\r\n Order made for date: $collectionDate can be collected from 1pm onward. \r\n Please bring this reciept along as a proof of purchase during collection\r\n "; 
	    $recieptln2 = "<thead><tr id='table'><th>Cake name</th><th>Quantity</th></tr></thead>\r\n";
	    $recieptln3= "<tbody>";

	 	foreach ($var as $item) 
	 	{
	 		$recieptln3 .="<tr><td>{$item['name']}</td><td>{$item['quantity']}</td></tr>\n";
	    }
	    $recieptln3 .= "</tbody>";

	    $htmlContent = '
    		<html>
    		<head>
        	<title></title>
    		</head>
    		<body>';
        $htmlContent .= $recieptln1; 
        $htmlContent .= '<table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">';
        $htmlContent .= $recieptln2; 
		$htmlContent .= $recieptln3; 
       	$htmlContent .='     
        	</table>
    		</body>
    		</html>';

		// Set content-type header for sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// Additional headers
	    $headers .= "From: BuyOwlCakeBruh Team <buyowlcakebruh@gmail.com> \n";
        $headers .= "To-Sender: \n";
        //$headers .= "X-Mailer: PHP\n"; // mailer
        $headers .= "Reply-To: buyowlcakebruh@gmail.com\n"; // Reply address
        $headers .= "Return-Path: buyowlcakebruh@gmail.com\n"; //Return Path for errors
        $headers .= "Content-Type: text/html; charset=iso-8859-1"; //Enc-type
        $subject = "Purchase Order @ BuyOwlCakeBruh <3";
        $to = "$email";
        @mail($email,$subject,$htmlContent,$headers);
        $_SESSION['cDate']=$collectionDate;
        return true;
            
    } catch (Exception $e) {
            return $error; 
    }
    return $error; 
}



?>
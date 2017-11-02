<?php

include("session.php");
 // if (($_SESSION['is_logged_in'] != "") && ($_SESSION['username'] != "")){       
        $result = $userClass->userDetails($_SESSION['uid']);
    	$email=$result->email;
    	$phoneNo=$result->phoneNo;
   // 	$history = $userClass->userOrderHistory();
  //  }else{   	
   // 	$url='index.html';
   //     header("Location: $url");
   // }
    
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>BuyOwlCakeBruh My Profile</title>
	<meta name="description" content="BuyOwlCakeBruh">
	<meta name="keywords" content="bakery, cake, pastries, fancy bakery goods">
	<script src="js/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">


	<script>
		$(function () {
			$("#header").load("../buyowlcakebruh/header.php");
			$("#footer").load("footer.html");
		});
	</script>
</head>

<body id="top" data-spy="scroll">

    <!--Header-->
	<div id="header"></div>

    <!--Heading-->
    <hr class="hr">

    <div class="background-myprofile">
        <div class="container">
            <div class="transbox">
                <p>MY PROFILE</p>
            </div>
        </div>
    </div>
    <hr class="hr">
    

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <H2>Update Profile</H2>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="UpdateProfile-form" action="updateProfile.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                    <p>Email:</p>
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $email ?>">
                                    </div>
                                    <div class="form-group">
                                    <p>Phone Number:</p>
                                        <input type="text" required pattern="\d{2}[\-]\d{8}" name="mobile" id="mobile" tabindex="1" class="form-control" placeholder="xx-xxxxxxxx" value="<?php echo $phoneNo ?>" >
                                    </div>
                                    <div class="form-group">
                                    <p>Password:</p>
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" >
                                    </div>

                                    <div class="form-group">
                                    <p>Confirm Password:</p>
                                        <input type="password" name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password" >
                                    </div>
                                    <div class="form-group">
                                        <div class="row center">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="updateProfile-submit" id="updateProfile-submit" tabindex="4" class="form-control btn btn-success" value="Update Profile">
                                            
                                                <div class="error-display">
                                                    <?php
                                                        if(isset($_SESSION['message-updateProfile'])){
                                                            echo $_SESSION['message-updateProfile']; 
                                                            unset($_SESSION['message-updateProfile']);      
                                                        }  
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <H2>Purchase History</H2>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table>
                                	<thead>
										<tr id="table">
									    	<th>Order Date</th>
									    	<th>Cake name</th>
									    	<th>Quantity</th>
									    	<th>Collection Date</th>
									  	</tr>
									</thead>

  									<tbody>
  										<?php 
                                        $order = $userClass->userOrderHistory();

      									if(($order) == Array() ){
        										echo 'No order made yet. ';
        										$table = 'table';
        										echo "<script type=\"text/javascript\">document.getElementById('".$table."').style.display = 'none';</script>";

      									}else{                            
                                            foreach ($order as $row) {
    											echo "<tr><td>{$row['orderDate']}</td><td>{$row['cakeName']}</td><td>{$row['quantity']}</td><td>{$row['collectionDate']}</td></tr>\n";
    										}
    								//		echo  '<pre>'; print_r($order); echo '</pre>';;
    										
    								//		echo (empty($order));

  										}
    									?>
  									</tbody>
								</table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>









    
    <!--Footer--> 
    <div id="footer"></div>







	<!-- jQuery -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/jquery.inview.js"></script>
	<script src="js/script.js"></script>
	<script src="contactform/contactform.js"></script>


</body>
</html>
<?php

session_start();
 
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
                                <H2>Contact</H2>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="panel-body">
                   
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="contact-form" action="contactEmail.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                    <p>Name:</p>
                                        <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="name" >
                                    </div>
                                    <div class="form-group">
                                    <p>Email:</p>
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" >
                                    </div>
                                    <div class="form-group">
                                    <p>Phone Number:</p>
                                        <input type="text" required pattern="\d{2}[\-]\d{8}" name="phoneNo" id="phoneNo" tabindex="1" class="form-control" placeholder="xx-xxxxxxxx" >
                                    </div>
                                    <div class="form-group">
                                    <p>Subject</p>
                                        <input type="text" name="subject" id="subject" tabindex="1" class="form-control" placeholder="Subject" >
                                    </div> 	
                                    <div class="form-group">
                                   <p>Message</p>
                                        <textarea type="text" name="message" id="message" tabindex="1" class="form-control" placeholder="Message" row="7" maxlength="140" ></textarea>
                                    </div>    
                                                   
                                    <div class="form-group">
                                        <div class="row center">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="contact-submit" id="contact-submit" tabindex="4" class="form-control btn btn-success" value="Submit">
                                            
                                                <div class="error-display">
                                                    <?php
                                                        if(isset($_SESSION['message-contact'])){
                                                            echo $_SESSION['message-contact']; 
                                                            unset($_SESSION['message-contact']);      
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
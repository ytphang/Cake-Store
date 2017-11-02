<?php

include ("session2.php");
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>BuyOwlCakeBruh Product Details</title>
    <meta name="description" content="BuyOwlCakeBruh">
    <meta name="keywords" content="bakery, cake, pastries, fancy bakery goods">
    <script src="js/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/account.css">

</head>


<body id="top" data-spy="scroll">


      <header id="home">

        <section class="top-nav hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top-left">

                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="top-right">
                           
                            <a href="../buyowlcakebruh/account.php"><p>My Account</p></a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!--main-nav-->

        <div id="main-nav">

            <nav class="navbar">
                <div class="container">

                    <!--For mobile nav displays-->
                    <div class="navbar-header">                   
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
							<span class="sr-only">Toggle</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
                    </div>

                    <div class="navbar-collapse collapse" id="ftheme">

                        <ul class="nav">
                            <li></li>
                            <li></li>
                            <li></li>
                            <a href="index.html"><img src="images/footer/BakeryLogo.png" height="120" width="140"></a>
                            <li></li>
                            <li></li>
                            <li></li>
                      
                        </ul>

                    </div>

    
                </div>
            </nav>
        </div>

    </header>



    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-forgetPassword">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <H2>forgetPassword<H2>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="forgetPassword-form" action="forgetPassword.php" method="post" role="form" style="display: block;">
                                   <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="row center">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="forgetPassword-submit" id="forgetPassword-submit" tabindex="4" class="form-control btn btn-primary" value="Submit">
                                              
                                                <div class="error-display">
                                                <?php
                                                    if(isset($_SESSION['message-forgetPassword'])){
                                                        echo $_SESSION['message-forgetPassword']; 
                                                        unset($_SESSION['message-forgetPassword']);  
                                                    }
                                                   
                                                ?>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                        <h3> Trading Hours </h3>
                        <ul>
                            <li> Monday - Friday: 7am - 7pm</li>
                            <li> Saturday - Sunday: 7am - 5pm</li>
                        </ul>
                    </div>
                    <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                        <h3> Happy Hours </h3>
                        <ul>
                            <li> Follow our facebook page for weekly discount baked goods </li>
                        </ul>
                    </div>

                    <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                        <h3> Follow Us </h3>

                        <ul class="social">
                            <li>
                                <a href="#"> <i class="fa fa-facebook">   </i> </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fa fa-twitter">   </i> </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fa fa-rss">   </i> </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fa fa-instagram">   </i> </a>
                            </li>
                            <li>
                                <a href="#"> <i class="fa fa-linkedin">   </i> </a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                        <h3> Contact Us </h3>
                        <ul class="contactus">
                            <li> <i class="fa fa-phone"></i> +61402772737 </li>
                            <li> <i class="fa fa-location-arrow"></i> 21 Creek Street, Brisbane CBD </li>
                            <li> <i class="fa fa-envelope"></i> buyowlcakebruh@gmail.com</li>
                            <li> <i class="fa fa-globe"></i> www.buyowlcakebruh.com </li>
                        </ul>
                    </div>

                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div>
        <!--/.footer-->

        <div class="footer-bottom">
            <div class="container">
                <p class=> 2017 All rights reserved. By BuyOwlCakeBruh </p>
            </div>
        </div>
        <!--/.footer-bottom-->
    </footer>


    <!-- jQuery -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/jquery.inview.js"></script>
    <!--<script src="https://maps.google.com/maps/api/js?sensor=true"></script>-->
    <script src="js/script.js"></script>
    <script src="contactform/contactform.js"></script>

    <script>
        $(function () {

            $('#forgetPassword-link').click(function (e) {
                $("#forgetPassword-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function (e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#forgetPassword-form").fadeOut(100);
                $('#forgetPassword-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

        });
    </script>
</body>


</html>
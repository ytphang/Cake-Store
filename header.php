<?php
    session_start();

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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/jquery.inview.js"></script>
    <!--<script src="https://maps.google.com/maps/api/js?sensor=true"></script>-->
    <script src="js/script.js"></script>
    <script src="contactform/contactform.js"></script>
</head>

<body>
    <header id="home">

        <section class="top-nav hidden-xs">
            <div class="container">
                <div class="row">
                    <?php if(isset($_SESSION['is_logged_in'])) : ?>

                    
                    <div class="col-md-6">
                        <div class="top-left">
                            <p>Hello,<b><?php echo $_SESSION['username'] ?></b></p>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="top-right">
                            <a href="../buyowlcakebruh/myprofile.php"><p>My Profile</p></a> 
                            <a href="../buyowlcakebruh/logout.php">Logout</a>
                        </div>
                    </div>

                    <?php else :?>
                    <div class="col-md-6"></div>          
                    <div class="col-md-6">
                        <div class="top-right">
                            <a href="../buyowlcakebruh/account.php"><p>My Account</p></a>
                        </div>
                    </div>

                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!--main-nav-->

        <div id="main-nav">

            <nav class="navbar">
                <div class="container">

                    <!--For mobile nav display-->
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
                            <li><a href="index.html">HOME</a></li>
                            <li><a href="../buyowlcakebruh/about.php">ABOUT</a></li>
                            <li><a href="../buyowlcakebruh/portfolio.php">PORTFOLIO</a></li>                          
                            <a href="index.html"><img src="images/footer/BakeryLogo.png" height="120" width="140"></a>
                            <li><a href="../buyowlcakebruh/catalogue.php">SERVICE</a></li>
                            <li><a href="../buyowlcakebruh/contact.php">CONTACT</a></li>
                            <li><a href="../buyowlcakebruh/career.php">CAREER</a></li>
                      
                        </ul>

                    </div>

           

                </div>
            </nav>
        </div>

    </header>



    <body>

</html>
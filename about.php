<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>BuyOwlCakeBruh</title>
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

    <div class="background-about">
        <div class="container">
            <div class="transbox">
                <p>ABOUT</p>
            </div>
        </div>
    </div>
    <hr class="hr">

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4 text-center border">
                <img src="images/about/about01.png" width="200" height="300" alt="about-cake01">

            </div>
            <div class="col-lg-8 col-sm-8">
                <h3>OUR BUSINESS</h3>
                <p>Since 2014, BuyOwlCakeBruh has been producing its high quality product at BrisbaneCBD. Owner WeiTing Amos,
                    felt that BrisbaneCBD was the perfect location to continue their centuries old trade while keeping their
                    product current and exciting. What makes BuyOwlCakeBruh unique is that every item is crafted by hand
                    and in the traditional methods that were common to the trade before the modernization of factories and
                    big box outlets. They whip their eggs and cream their butter and sugar following recipes that are timeless
                    and unforgettable. They offer a full line of cakes, cookies and pastries all made with the finest local
                    ingredients available.</p>
                <h3></h3>
            </div>

        </div>
        <br>

        <div class="row">
            <div class="col-lg-8 col-sm-8">
                <h3>SPECIAL ENQUIRIES</h3>
                <p>At BuyOwlCakeBruh's we take pride in our locally owned Bakeries. We believe in allowing them to be autonomous with
                    selecting the best and brightest staff who are part of the community. To find out more about careers
                    at BuyOwlCakeBruh, please get in touch via career section. We also open to sponsorship, franchising and
                    catering enquiries, kindly get in touch with our staff via contact section.</p>
                <h3></h3>
            </div>
            <div class="col-lg-4 col-sm-4 text-center border">
                <img src="images/about/about02.png" width="200" height="300" alt="about-cake02">

            </div>
        </div>
        <br>

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
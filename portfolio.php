<!DOCTYPE html>
<html lang="en">
<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databseName = "buyowlcakebruh";

    $connect = mysqli_connect($hostname, $username, $password, $databseName);
    $name = "SELECT portname FROM `Portfolio`";
    $link = "SELECT portlink FROM `Portfolio`";

    $result1 = mysqli_query($connect,$name);
    $result2 = mysqli_query($connect,$link);


    require_once("dbcontroller.php");
    $db_handle = new DBController();
    $allportimg = $db_handle->runQuery("SELECT * FROM Portfolio");


?>
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
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
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

    <div class="background-portfolio">
        <div class="container">
            <div class="transbox">
                <p>PORTFOLIO</p>
            </div>
        </div>
    </div>
    <hr class="hr">

    <?php 
            $portfolioName = mysqli_fetch_array($result1);
            $portfolioLink = mysqli_fetch_array($result2);     
            
              
                             
    ?>

    <div class="container">
    <div class="row"> 
   
            <?php 
                    foreach($allportimg as $a){    
            ?>
                
                
                <div class='col-lg-3 col-sm-6 col-xs-12 col-md-4 '>
               
                    <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $a['portlink'] ?>"/>

                        <img class="img-responsive" src="<?php echo $a['portsource'] ?>" style="width:300px; height:300px;"/>
                        <div class="text-center">
                            <small class="text-muted"><?php echo $a['portname'] ?></small>
                        </div>
                    
                    </a>
                
                </div> <!-- col-6 / end -->
             
                
            
            <?php
                }
            ?>
             <!--  list-group / end -->
        </div><!--End of row-->
        
    </div><!-- container / end -->
    
  



    <!--Footer-->
    <div id="footer"></div>







    <!-- jQuery -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider.js"></script>
    <script src="js/jquery.inview.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function () {

            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });
    </script>

</body>

</html>
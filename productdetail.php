<?php
    session_start();
   
    require_once("dbcontroller.php");
    //$val = isset($_POST["val"]);
    $val = $_POST['val'];
    //$var = $_GET["var"];
    //echo $val;
  
    $db_handle = new DBController();
 
    //$itemByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["var"] . "'");
    $itemByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $val . "'");
   
  
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

     <?php
                         
            foreach($itemByCode as $key=>$value){

    ?>  

    <!--Heading-->
    <!--<hr class="hr">

    <div class="background-myprofile">
        <div class="container">
            <div class="transbox">
                <p><?php echo $itemByCode[$key]['name'] ."<br>"; ?></p>
            </div>
        </div>
    </div>
    <hr class="hr">-->

   
         
   
    <div class="modal-dialog">
         
        <div class="row">

            <div class="col-lg-3 border-right"></div>
            <div class="col-lg-2 col-sm-12 text-center border size">
                <?php echo '<img src="'.$itemByCode[$key]['image'].'" style="width:300px; height: 320px;">';?>
            </div>
        </div><br>
        <div class="row">
        <div class="col-lg-2"></div>
            <div class="col-lg-8 col-sm-12">
                <h3 class="text-center"><?php echo $itemByCode[$key]['name'] ."<br>"; ?></h3>     
                <h3 class="text-center"><?php echo $itemByCode[$key]['price'] ."<br>"; ?></h3>
                <p><?php echo $itemByCode[$key]['material'] ."<br>"; ?></p>
                <p>Category: <?php echo $itemByCode[$key]['category'] ."<br>"; ?></p>
            
            </div>
            <div class="col-lg-2"></div>
         <!--   <div class="col-lg-2 col-sm-3">
                <form action="../buyowlcakebruh/catalogue.php">
                    <input type="submit" value="Go back" class="btn btn-primary" />
                </form>
                
          
            </div>-->
     
        </div><!--End of row-->
    </div><!--End of container-->
    

 <br>
    <?php
           }
    ?>




    <!--Footer--> 
    <div id="footer"></div>



	<!-- jQuery -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/jquery.inview.js"></script>
	<script src="js/script.js"></script>


</body>
</html>
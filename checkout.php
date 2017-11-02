<?php
    include("session.php");
    //include_once('modalAuth.php');
    $itemID = 1;
    
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
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <script src="js/bootstrap-datepicker.js"></script>

	<script src="js/flexsliderfix.js"></script>

	
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
                        <p>CHECKOUT</p>
                    </div>
                </div>
            </div>
            <hr class="hr">
            
        <div class="container">  
            <form action="checkoutnow.php" method="post" role="form" style="display: block;"> 
            <table class="table table-striped custab"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item</th>
                        <th>Product Code</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                <thead>

                
                <?php
                        
                        foreach($_SESSION["cart_item"] as $a){
                ?>  

                    <tr>
                           <td class="col-lg-1"><?php echo $itemID ."<br>"; ?></td>
                           <td class="col-lg-3"><?php echo $a['name'] ."<br>"; ?></td>
                           <td class="col-lg-3"><?php echo $a['code'] ."<br>"; ?></td>
                           <td class="col-lg-3"><?php echo $a['price'] ."<br>"; ?></td>                          
                           <td class="col-lg-2"><?php echo $a['quantity']."<br><br>"; ?></td>
                           
                    </tr>
                <?php
                
                    $itemID++;
                        }

                        $userDetail = $userClass->userDetails($_SESSION['uid']);
                        $email=$userDetail->email;


                   //     echo  '<pre>'; print_r($_SESSION["cart_item"]); echo '</pre>';;
                   //     var_dump($_SESSION["cart_item"]);
                ?>
                <tr>
                    <td colspan="5"><div class="text-right"><h4>Collect date: </h4><p class="red">Please be noted that you can only preorder 2 weeks in advance.</p>  
                        
                            <div class="form-group pull-right">
                                <div class="input-group date" id="datetimepicker1" data-date-format="yyyy-mm-dd" data-provide="datepicker"  >
                                    <input type='text' name="collectionDate" id="collectionDate" class="form-control" value="">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div> 
                            </div>
                        <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $email ?>" style="display: none;">
                        </div>
                    
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="form-group text-right">
                            <h3>Total: AUD <?php echo $_SESSION['item_total'] ."<br>"; ?> </h3>    
                            <input type="submit" name="checkout-submit" id="checkout-submit" tabindex="4" class="form-control btn btn-success" value="Buy Now">
                            <input type="submit" name="paypal-submit" id="paypal-submit" tabindex="4" class="form-control btn btn-primary" value="PayPal">          
                        </div>
                    </td>
               </tr>
               <tr>
                   <td>
                        
                   </td>
               </tr>
            </table><!--End of table-->
            </form>
        </div><!--End of container-->



        <!--Footer--> 
        <div id="footer"></div>


        <!-- jQuery -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/jquery.inview.js"></script>
        <script src="js/script.js"></script>  
        <script type="text/javascript">
        $(function(){

            $('#datetimepicker1').datepicker({
                startDate: '+2d'
            });
        });



          //  $('#datetimepicker1').datepicker({




           //     var startDate = new Date(); d.setDate( d.getDate() + 1 );
             //   $('#datetimepicker1').datepicker('setDate', d); 
           //     endDate = new Date(); d.setDate( d.getDate() + 14 );
             //   $('#txtEndDate').datepicker('setDate', d);
             
           //     beforeShowDay: function (date) 
            //    {
            //        debugger
           //         if (date >= startDate && date <= endDate) 
             //       {
           //             return [true, 'ui-state-error', ''];
            //        }
             //       return [true, '', ''];
        //        }
         //   });
      //  });
          
        </script>

    </body>



</html>
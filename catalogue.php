<?php
session_start();
require_once("dbcontroller.php");
require('cart.php');

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
    <!--<link rel="stylesheet" href="css/cart.css">-->


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

        <div class="background-catalogue">
            <div class="container">
                <div class="transbox">
                    <p>CATALOGUE</p>
                </div>
            </div>
        </div>
        <hr class="hr">


                
        <div class="container">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                    
                    <div class="text-center"><h3>Shopping Cart</h3> <a id="btnEmpty" href="catalogue.php?action=empty">Empty Cart</a></div>
                    <?php
                    if(isset($_SESSION["cart_item"])){
                        $_SESSION['item_total'] = 0;
                    ?>	
                    <!--<table class="cellpadding="20" cellspacing="1"">-->
                    <form action="checkout.php" method="post">
                        <table class="table table-striped">
                            <tbody>
                                    <tr>
                                        <th style="text-align:left;"><strong>Name</strong></th>
                                        <th style="text-align:left;"><strong>Code</strong></th>
                                        <th style="text-align:right;"><strong>Quantity</strong></th>
                                        <th style="text-align:right;"><strong>Price</strong></th>
                                        <th style="text-align:center;"><strong>Action</strong></th>
                                    </tr>	
                                    <?php		
                                        foreach ($_SESSION["cart_item"] as $item){
                                            ?>
                                                    <tr>
                                                    <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
                                                    <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
                                                    <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                                                    <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
                                                    <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="catalogue.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
                                                    </tr>
                                                    <?php
                                            (float)$_SESSION['item_total'] += ($item["price"]*$item["quantity"]);
                                            }
                                            ?>

                                    <tr>
                                    
                                        <td colspan="5" align=right>
                                                <strong>Total:</strong> <?php echo "$". $_SESSION['item_total']; ?>
                                                <?php
                                                    /*If user*/
                                                    if(isset($_SESSION['is_logged_in'])) : ?>
                                                    &nbsp;&nbsp;<input type="submit" value="Checkout" class="btn-primary btn-xs" />
                                                <?php
                                                     /*If not user*/
                                                    else:                       
                                                ?>               
                                                    &nbsp;&nbsp;<a data-toggle="modal" data-target="#myModal" class="btn-primary btn-xs">Checkout</a>                                     
                                            
                                                <?php endif; ?>
                                                
                                        </td>
                                    </tr>
                            </tbody>
                        </table>	
                    </form>	
                    <?php
                    }
                    ?>

                    <!--Modal-->
                    <div class="container">
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog" value="<?php $_SESSION['modaltoggle']?>>">
                            <div class="modal-dialog">
                            
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body">
                                    <div class="row">
                                    <h4 class="text-center"> Please login or register to proceed checkout <span class="red">&#10084;</span></h4>
                                    <hr>
                                       <div class="col-lg-6">

                                            <form id="login-form" action="login.php" method="post" role="form" style="display: block;">
                                                <input type="hidden" name="destination" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
                                                <h3>Login</h3>
                                                <div class="form-group">
                                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group text-center">
                                                    
                                                    <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row center">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-primary" value="Log In">
                                                        
                                                            <div class="error-display">
                                                            <?php
                                                                if(isset($_SESSION['message-login'])){
                                                                    echo $_SESSION['message-login']; 
                                                                    unset($_SESSION['message-login']);  
                     
                                                               }
                                                            
                                                            ?>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                </div>

                                              

                                            </form>
                                        </div><!--end of col-->
                                        <div class="col-lg-6 verticalLine">
                                            <form id="register-form" action="register.php" method="post" role="form" style="display: block;">
                                            <input type="hidden" name="destination_register" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
                                                <h3>Register</h3>
                                                <div class="form-group">
                                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="mobile" id="mobile" tabindex="1" class="form-control" placeholder="mobile number" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row center">
                                                            <div class="col-sm-6 col-sm-offset-3">
                                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-success" value="Register Now">
                                                            
                                                                    <div class="error-display">
                                                                        <?php
                                                                            if(isset($_SESSION['message-register'])){
                                                                                echo $_SESSION['message-register']; 
                                                                                unset($_SESSION['message-register']);  
                                                                                
                                                                            }                                                              
                                                                        ?>
                                                                    </div>
                                                            </div>
                                                      </div>
                                                 </div>
                                            </form >
                                        </div><!--end of col-->


                                    </div><!--end of row-->
                                    </div><!--end of modal body-->


                                                    
                                </div>
                            </div><!--end of modal dialog-->
                        </div><!--end of class modal-->
                    </div><!--End of modal container-->



                <div id="product-grid">
                    <div class="row">
                    <div class="text-center"><h3>PRODUCTS</h3></div>
                    <?php
                    $product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY prodid ASC");
                    if (!empty($product_array)) { 
                        foreach($product_array as $key=>$value){
                    ?>
                        <div class="col-lg-4 col-xs-6 text-center product-item">
                            <form id="thisform" method="post" action="catalogue.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                              
                                <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="200" height="200"></div>                            
                                <hr>                                           
                                <div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
                                <div><a data-toggle="modal" data-target="#myProdModal" data-id="<?php echo $product_array[$key]["code"]?>" ><i class="fa fa-eye black" aria-hidden="true"></i></a></div>
                                <!--<a href="../buyowlcakebruh/productdetail.php?var=<?php echo $product_array[$key]["code"] ?> "><i class="fa fa-eye black" aria-hidden="true"></i></a>-->
           
                                <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
                                <div>
                                    <input type="text" name="quantity" value="1" size="2" />
                                    &nbsp;&nbsp;<input type="submit" value="Add to cart" class="btn-success btn-xs" />
                                </div>
                                <br>

                            </form>
                        </div><!--end of class product-item-->
                       
                    <?php
                            }
                    }
                    ?>
                    </div><!--end of row-->

                    
                </div><!--end of product-grid-->

                </div><!--col-lg-10-->
                <div class="col-lg-1"></div>
                
        </div><!--end of container-->
        <br>


            <!--Footer-->
            <div id="footer"></div>

            <!-- Modal -->
            <div id="myProdModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                       
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>
                         <h4 class="fetched-data-head"></h4>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div><!--End of modal content-->

                </div>
            </div><!--End of Modal-->



            <!-- jQuery -->
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.flexslider.js"></script>
            <script src="js/jquery.inview.js"></script>
            <script src="js/script.js"></script>
            
         <script type="text/javascript">
            $(function () { 
               $('#myModal').appendTo("body");
               
            });     
            
        </script>
        <?php
            if(isset($_SESSION['modaltoggle']))
            {
        ?>
        <script>
            $(function () { 
               $('#myModal').appendTo("body").modal("show");
               
            });     
            
        </script>
        <?php
            unset($_SESSION['modaltoggle']); 
            }
       ?>
        
       <script>
       $(document).ready(function(){
            $('#myProdModal').on('show.bs.modal', function (e) {
                
                var rowid = $(e.relatedTarget).data('id');
                //var id = $(this).attr("data-value");
               
                $.ajax({
                    type : 'POST',
                    url : 'productdetail.php?',//val='+ id, //Here you will fetch records  
                    cache:false,
                    //data :  'val='+ id, //Pass $id  
                    data:{'val': rowid}, 
                    async:true,        
                    success : function(data){
                        console.log(data);
                    $('.fetched-data').html(data);//Show fetched data from database
                    //$('.fetched-data-head').html(data.name);//Show fetched data from database
                    }
                });
            });
        });
       </script>
          


    </body>

</html>
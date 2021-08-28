<?php include('b_server.php'); 
?>
<?php include('login_server.php'); 

 if (isset($_SESSION['username'])) {

   $login=$_SESSION['username'];
   $data="SELECT * FROM tbl_register WHERE username='$login'";

  $qry=mysqli_query($db,$data) or die ("Could not execute Query.".mysql_error());
  $data2=mysqli_fetch_array($qry);
 
}


?>

<?php
if (!isset($_SESSION['username'])) {
   echo "<script>alert('You must login before viewing this page.'); location.href='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pick-A-Plant</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,500,500i">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">
           <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/icon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
<style type="text/css">
/* Global settings */

 #count{
    border-radius: 40%;
    position: relative;
    top: -10px;
    left: -10px;
}
 
.product-image {
  float: left;
  width: 20%;
}
 
.product-details {
  float: left;
  width: 37%;
}
 
.product-price {
  float: left;
  width: 12%;
}
 
.product-quantity {
  float: left;
  width: 10%;
}
 
.product-removal {
  float: left;
  width: 9%;
}
 
.product-line-price {
  float: left;
  width: 12%;
  text-align: right;
}
 
/* This is used as the traditional .clearfix class */
.group:before, .shopping-cart:before, .column-labels:before, .product:before, .totals-item:before,
.group:after,
.shopping-cart:after,
.column-labels:after,
.product:after,
.totals-item:after {
  content: '';
  display: table;
}
 
.group:after, .shopping-cart:after, .column-labels:after, .product:after, .totals-item:after {
  clear: both;
}
 
.group, .shopping-cart, .column-labels, .product, .totals-item {
  zoom: 1;
}
 

label {
  color: #aaa;
}
 
.shopping-cart {
  margin-top: -45px;
}
 
/* Column headers */
.column-labels label {
  padding-bottom: 15px;
  margin-bottom: 15px;
  border-bottom: 1px solid #eee;
}
.column-labels .product-image, .column-labels .product-details, .column-labels .product-removal {
  text-indent: -9999px;
}
 
/* Product entries */
.product {
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}
.product .product-image {
  text-align: center;
}
.product .product-image img {
  width: 100px;
}
.product .product-details .product-title {
  margin-right: 20px;
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
}
.product .product-details .product-description {
  margin: 5px 20px 5px 0;
  line-height: 1.4em;
}
.product .product-quantity input {
  width: 40px;
}
.product .remove-product {
  border: 0;
  padding: 4px 8px;
  background-color: #c66;
  color: #fff;
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
  font-size: 12px;
  border-radius: 3px;
}
.product .remove-product:hover {
  background-color: #a44;
}
 
/* Totals section */
.totals .totals-item {
  float: right;
  clear: both;
  width: 100%;
  margin-bottom: 10px;
}
.totals .totals-item label {
  float: left;
  clear: both;
  width: 79%;
  text-align: right;
}
.totals .totals-item .totals-value {
  float: right;
  width: 21%;
  text-align: right;
}
.totals .totals-item-total {
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
}
 
.checkout {
  float: right;
  border: 0;


}
 
.checkout:hover {
  background-color: #494;
}
 
/* Make adjustments for tablet */
@media screen and (max-width: 650px) {
  .shopping-cart {
    margin: 0;
    padding-top: 20px;
    border-top: 1px solid #eee;
  }
 
  .column-labels {
    display: none;
  }
 
  .product-image {
    float: right;
    width: auto;
  }
  .product-image img {
    margin: 0 0 10px 10px;
  }
 
  .product-details {
    float: none;
    margin-bottom: 10px;
    width: auto;
  }
 
  .product-price {
    clear: both;
    width: 70px;
  }
 
  .product-quantity {
    width: 100px;
  }
  .product-quantity input {
    margin-left: 20px;
  }
 
  .product-quantity:before {
    content: 'x';
  }
 
  .product-removal {
    width: auto;
  }
 
  .product-line-price {
    float: right;
    width: 70px;
  }

}
/* Make more adjustments for phone */
@media screen and (max-width: 350px) {
  .product-removal {
    float: right;
  }
 
  .product-line-price {
    float: right;
    clear: left;
    width: auto;
    margin-top: 10px;
  }
 
  .product .product-line-price:before {
    content: 'Item Total: $';
  }
 
  .totals .totals-item label {
    width: 60%;
  }
  .totals .totals-item .totals-value {
    width: 40%;
  }
}

</style>


    </head>

    <body>
    
    <!-- Top menu -->
    <nav class="navbar navbar-inverse" role="navigation"  ><!-- style="background-color: #64ca87; -->
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="b_index.php"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
          <ul class="nav navbar-nav navbar-right navbar-search-button">
                     <li class="dropdown"><a href="b_profile.php"><img src="<?php
                                 if($data2['profile'] !== '') { 
                                    echo 'profile/'.$data2['profile']; 
                                } else { 
                                    echo 'assets/ico/logo web.png';
                                }?>" class="img-radius" style="border-radius: 50%; width: 18px;" alt="User-Profile-Image">
                            <span class="dropbtn"><?php
                                                    //display username from db
                                                    echo $data2['username'];
                                                    ?></span>
                        </a></li>

                  <li class="notif">
                  
                        <a class="dropdown-toggle"  id="menu1" type="button" data-toggle="dropdown" style="cursor: pointer;"><i class="fa fa-bell" aria-hidden="true"></i>
                            <small><span class="badge" id="count"> 
                                  <?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result5=mysqli_query($con,$query);
                    $row=mysqli_fetch_array($result5);
                    $id = $row['id'];



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='1'";
                    $result5=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result5);

                    $num_rows5=$values['total'];
                   



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='2'";
                    $result6=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result6);

                    $num_rows6=$values['total'];
                  

                    $totalnum=($num_rows5+$num_rows6);
                
                    echo "<small>",$totalnum,"</small>";



                ?></span></small>
                        </a>

                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a href="b_profile_confirmed.php" role="menuitem" tabindex="-1" href="#">
                            <center>Confirmed (<?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['id'];



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='1'";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);

                    $num_rows=$values['total'];
                    echo "<small>",$num_rows,"</small>"; 


                ?>) </center></a></li>
                          <li role="presentation"><a href="b_profile_cancelled.php" role="menuitem" tabindex="-1" href="#">
                            <center>Cancelled (<?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['id'];



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='2'";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);

                    $num_rows=$values['total'];
                    echo "<small>",$num_rows,"</small>"; 


                ?>)</center></a></li></ul>
                     
                </li>   
            <li><a href="b_checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true" style="color: #64ca87;"></i><samll>
              <span class="badge" id="count">
              <?php
                     $con=mysqli_connect('localhost','root','','pick_a_plant');

                     $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['id'];


                    $sql="SELECT count(id) AS total FROM tbl_check WHERE buyer_id=$id";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values['total'];

                    echo "<small>",$num_rows,"</small>";
                ?></span></samll></a>
<!--Chat feature part-->
                   <?php
                   $user = $data2['unique_id'];
                   $sql2="SELECT * FROM tbl_register WHERE not unique_id='$user' ORDER BY id DESC";
                   $find=mysqli_query($db,$sql2);
                   $data=mysqli_fetch_assoc($find);

                   ?>
                <li><a href="chat/chat.php?user_id=<?php echo $data['unique_id']?>" id="message" onclick='changeStatus(<?php echo $data2['unique_id']?>)'><i class="fa fa-envelope" aria-hidden="true" ></i><small><span class="badge" id="count">
            <?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                     $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['unique_id'];
                    $query="SELECT * FROM tbl_register WHERE unique_id = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['unique_id'];


                    $sql="SELECT count(incoming_msg_id) AS total FROM messages WHERE  incoming_msg_id=$id AND status='1'";
                    $result=mysqli_query($con,$sql);
                   
                    $values=mysqli_fetch_assoc($result);
                   $num_rows=$values['total'];
                    
                    ?>
                  <small id=''><?php echo $num_rows?></small></span></small></a>
               
<script>
    function changeStatus($id){
      
        $.ajax({
            
            url: "update.php",
            data: {id : $id},
            type: "POST",  
            
        });
    }
</script>

             <li class="dropdown"><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
          </ul>
          <form class="navbar-form navbar-right navbar-search-form disabled wow fadeInLeft" role="form" action="" method="post">
            <div class="form-group">
              <input type="text" name="search" placeholder="Search..." class="search form-control">
            </div>
          </form>
          <ul class="nav navbar-nav navbar-right navbar-menu-items wow fadeIn">
            <li><a href="b_index.php">Home</a></li>
            <li><a href="b_dictionary.php">Dictionary</a></li>
            <li><a href="b_shop.php">Shop</a></li>
          </ul>
        </div>


      </div>
    </nav>

        <!-- Top content -->


        <!-- Features -->
         <div class="features-container section-container">
          <div class="container">
            
              <div class="row">
                  <div class="col-sm-12 features section-description wow fadeIn">
                      <h2>Check out Method</h2>
                      <div class="divider-1 wow fadeInUp"><span></span></div>
                  </div>
              </div>


<div class="shopping-cart" style="width: 80%; margin: auto;">
  <div class="column-labels" style="background-color: #64ca87; height: 50px; margin-top: 35px; padding: 10px; ">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price" style="color: white;">Price</label>
    <label class="product-quantity" style="color: white;">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price" style="color: white;">Total</label>
  </div>
 
  <?php  
    $connection=mysqli_connect('localhost','root','','pick_a_plant');
      $buyer = $data2['username'];
      $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
      $result=mysqli_query($connection,$query);
      $row=mysqli_fetch_array($result);
      $id = $row['id'];

  $query1="SELECT * FROM tbl_check WHERE buyer_id=$id ";
  $result1=mysqli_query($connection,$query1);
  $rowcount=mysqli_num_rows($result1);

      for($i=1; $i <= $rowcount; $i++)
      {

        $row1=mysqli_fetch_array($result1);
      ?>

              <?php

                                        
  echo'  
  <form method="post" action="b_server.php" enctype="multipart/form-data">
  <input type="checkbox" name="is_checked[]" value="'.$i.'" style="float: left; width: 18px;">
<input type="hidden" name="order_id[]" value="'.("Order ".rand(1000,10000)).'">
  <input type="hidden" name="buyer_id[]" value="'.$data2['id'].'">

   <input type="hidden" name="category[]" value="'.$row1['category'].'">

   <input type="hidden" name="address[]" value="'.$row1['address'].'">

   <input type="hidden" name="stocks[]" value="'.$row1['stocks'].'">

   <input type="hidden" name="product_id[]" value="'.$row1['product_id'].'">

   <input type="hidden" name="seller_id[]" value="'.$row1['seller_id'].'">
    
  <input type="hidden" name="buyer_name[]" value="'.$row1['buyer_name'].'">

  <input type="hidden" name="phone_number[]" value="'.$row1['phone_number'].'">
  <input type="hidden" name="deliv_address[]" value="'.$row1['deliv_address'].'">

   <input type="hidden" name="numbers" value="'.$rowcount.'">
  <div class="product">
    <input type="hidden" name="id" value="'.$row1['id'].'">
    <div class="product-image">

    <input type="hidden" name="photo[]" value="'.$row1['photo'].'">
     <img id="myimage" src="seller/pages/'.$row1['photo'].'">

    </div>
    <div class="product-details" style="text-align: left;">

   

      <input type="hidden" name="name[]" value="'.$row1['name'].' ">
      <div class="product-title"><h3>'.$row1['name'].'</h3></div>

      <input type="hidden" name="description[]" value="'.$row1['description'].'">
      <p class="product-description">'.$row1['description'].'</p>
      <hr>

      <input type="hidden" name="product_number[]" value="'.$row1['product_number'].'">
      <small><p class="product-description" >Product #: <span><strong>'.$row1['product_number'].'</strong></span></p></small>

      


      <div style="display: inline-flex;">
           <input type="hidden" name="location[]" value="'.$row1['location'].'">
           <small><p class="product-description" >Location: <span><strong>'. $row1['location'].'</strong></span></p></small>


         



      </div>

        
        
    </div>
    <input type="hidden" name="price[]" value="'.$row1['price'].'">
    <div class="product-price">₱'.$row1['price'].'</div>

    <input type="hidden" name="quantity[]" value="'. $row1['quantity'].'">
  <div class="product-quantity">'. $row1['quantity'] .'</div>

    <div class="product-removal">
        <a  onclick="javascript:confirmationDelete($(this));return false;" href="b_server.php?del='. $row1['id'].'"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
    </div>

    <input type="hidden" name="total_price[]" value="'. $row1['total_price'] .'">
    <div class="product-line-price" style="width: 90px;">₱<b>'.$row1['total_price'].'</b> |

    </div>

  </div>

  <input type="hidden" name="seller_name[]" required="" value="'.$row1['seller_name'].'">

  


    <div class="form-group" hidden>
             <textarea name="order_time[]">
             
              '.$current_time=date('h:i:s a m/d/Y').'

              </textarea>
    </div>


        '; 
  ?>   
  
 <?php  
           }
       ?>

<div>
<div style="float: left; display: inline-block; text-align: left;"> 
<p><b>Payment Method:</b></p>
<small>Cash on Delivery</small>
</div>

<div style="float: right; display: inline-block; text-align: right;"> 
<p><b>Total:</b></p>
<h4>  <?php
                   


                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $id = $data2['id'];

                    $sql="SELECT SUM(total_price) AS total FROM tbl_check WHERE buyer_id = $id LIMIT 1";
                    $result=mysqli_query($con,$sql);

                    if (mysqli_num_rows($result) > 0) {
                    $values=mysqli_fetch_assoc($result);
                    $subtotal=$values['total'];

                    if ($subtotal == null) {
                        $peso="";
                      
                    }
                      if ($subtotal > 1) {
                       $peso="&#8369;";
                    }


                    echo "<p>", $peso, $subtotal,"</p>";
                    echo '<input type="hidden" name="subtotal[]" value= '.$subtotal.'>';
                    }
                    else{
                    echo "hello";
                    }

                ?></h4>
<br>

 <input type="submit" name="btncheck" class="btn btn-success checkout" style="border-radius: 0px; outline: none;" value="Checkout">
</div>

</div>
</div>

<hr>


</form>
       

          </div>
        </div>

       <!-- Footer -->

<style type="text/css">
.site-footer
{
  background-color: #dcc59a;
  padding:45px 0 20px;
  font-size:15px;
  line-height:24px;
  color:#777777;
}
.site-footer hr
{
  border-top-color:#bbb;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;
  margin-top:5px;
  letter-spacing:2px
}
.site-footer a
{
  color:#737373;
}
.site-footer a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links a
{
  color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links.inline li
{
  display:inline-block
}
.site-footer .social-icons
{
  text-align:right
}
.site-footer .social-icons a
{
  width:40px;
  height:40px;
  line-height:40px;
  margin-left:6px;
  margin-right:0;
  border-radius:100%;
  background-color: #FFFFFF;
}
.copyright-text
{
  margin:0
}
@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:30px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}
.social-icons
{
  padding-left:0;
  margin-bottom:0;
  list-style:none
}
.social-icons li
{
  display:inline-block;
  margin-bottom:4px
}
.social-icons li.title
{
  margin-right:15px;
  text-transform:uppercase;
  color:#96a2b2;
  font-weight:700;
  font-size:13px
}
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:16px;
  display:inline-block;
  line-height:44px;
  width:44px;
  height:44px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:14px
}
.social-icons a.facebook:hover
{
  background-color:#3b5998
}
.social-icons a.twitter:hover
{
  background-color:#00aced
}
.social-icons a.linkedin:hover
{
  background-color:#007bb6
}
.social-icons a.dribbble:hover
{
  background-color:#ea4c89
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}
</style>

  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Pick-A-Plant is an e-commerce website that offers different variety of plants. It is a way to lessen the time of customers going outside to travel, only to buy a various plant from different places or locations. Pick-A-Plant also wants to meet the expectations of the users in using an online-based shopping of plants for it can save time for both the buyer and retailer, reducing phone calls about availability, specifications, hours of operation or other information found from different pages. It provides a very comfortable service, by being able to save the item in the cart, and buy or checkout it later on.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
               <ul class="footer-links">
              <li>Plant Shop</li>
              <li>Buy Plants</li>
              <li>Sell PLants</li>
              <li>Know about Plants</li>
               <li>Fast Service</li>
              <li>Legit Sellers</li>
               <li>Secure Payment</li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="b_index.php">Home</a></li>
              <li><a href="b_dictionary.php">Dictionary</a></li>
              <li><a href="b_shop.php">Shop</a></li>
           
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2020-2021 All Rights Reserved by 
         <a href="#">3BSIT02</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>

  <footer class="site-footer" style="background-color: #57c27e;">

      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text"><i class="fa fa-envelope-square" aria-hidden="true"></i> | @planitas@gmail.com
         <a href="#"></a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="d-inline-flex p-3">
                     <span><a href="" data-toggle="modal" data-target="#terms">Terms & Condition</a> &nbsp;|</span> 

              <span>  &nbsp;  &nbsp;<a href="" data-toggle="modal" data-target="#privacy">Privacy Policy &nbsp;|</a></span>
                  <span>  &nbsp;  &nbsp;<a href="" data-toggle="modal" data-target="#information">Contact Us</a></span>
              </div>
          </div>
        </div>
      </div>
</footer>


    


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>
  <!-- START MODAL -->
  <div class="modal fade" role="dialog" id="information">
    <div class="modal-dialog">
      <div class="modal-content">

        <!--MODAL HEADER-->
            <div class="modal-header"  style="background-color:  #dcc59a;  text-align: center;">
          <h2 class="modal-title" style="color: white;">Contact us</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!--MODAL HEADER-->
        
        <!--MODAL BODY-->
        <div class="modal-body">
        <form method="post" name="report_form"  action="b_server.php">

            <div class="form-group">
              <p style="float: left;">Name</p>
              <input type="text" name="name" class="form-control" readonly="" value="<?php echo $data2['username']; ?>">
            </div>

            <div class="form-group">
              <p style="float: left;">Subject</p>
              <input type="text" name="subject" class="form-control">
            </div>

            <div class="form-group">
              <p style="float: left;">Message</p>
              <textarea name="message" class="form-control" maxlength="255" style="resize: none; height: 100px;"></textarea>
            </div>


               <div class="form-group" hidden="">
             <textarea name="reported_time">
              <?php 
              date_default_timezone_set('Asia/Manila');
              $current_time=date('h:i:s a m/d/Y');

              echo $current_time;
              ?>
                
              </textarea>
            </div>
                    <div class="form-group">
                        <button type="submit" name="send_message" class="btn btn-success form-control" style="outline: none;">send</button>
                     
                    </div>
          </form>
      </div>
    </div>
  </div>
</div>      
        <!-- END MODAL BODY-->

<!-- privacy modal START-->
<style type="text/css">
  #privacy{

    text-align: justify;
    margin: 30px;

  }
</style>
<div class="modal fade" role="dialog" id="privacy">
    <div class="modal-dialog">
      <div class="modal-content">

        <!--MODAL HEADER-->
        <div class="modal-header" style="background-color:  #dcc59a; text-align: center;">
          <h2 class="modal-title" id="tophead" style="color: white">Privacy Policy</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!--MODAL HEADER-->
      <p id="privacy">
        Last updated: January 09, 2021<br><br>
This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.
We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy. This Privacy Policy has been created with the help of the Privacy Policy Generator.

      </p>
        
    </div>
  </div>
</div>

<!-- TERMS modal -->
<div class="modal fade" role="dialog" id="terms" >
    <div class="modal-dialog">
      <div class="modal-content">

        <!--MODAL HEADER-->
        <div class="modal-header" style="background-color:  #dcc59a;  text-align: center;">
          <h2 class="modal-title" id="tophead" style="color: white;">Terms & Condition</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!--MODAL HEADER-->
      <p id="privacy">
        Last updated: 01/09/2021
<br>
<br>
Please read this Terms of Condition carefully before using this site operated by Block 2-Group 2(“us”,”we”,or “our”).
Your access to use and of the website is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all users and others who access or use this website.
By accessing or using the website you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the website.

Termination
We may terminate or suspend access to our site immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
All provisions of the Terms which by their nature should survive  termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.

  <br><br>
        His/Her Account will be terminated once he/she <strong>violates or receive 20 consecutive reports</strong> to his/her buyer.
      </p>
        
    </div>
  </div>
</div>      
<script type="text/javascript">
function confirmationDelete(anchor){
    var conf = confirm("Are you sure you want to delete the record?");
if (conf)
     window.location=anchor.attr("href");
}
</script>

</html>
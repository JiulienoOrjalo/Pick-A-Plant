


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

<?php
$product_id=0;
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

        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>




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
               <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
<style type="text/css">
  .separator {
  display: flex;

  align-items: center;
  text-align: center;
}

.separator::before,
.separator::after {
  content: '';
  flex: 1;

  border-bottom: 1px solid gray;
}

.separator:not(:empty)::before {
  margin-right: .25em;
}

.separator:not(:empty)::after {
  margin-left: .25em;
}

/* CSS Document */
.swiper-slide{
  width:250px !important;
}
    
.slider-box{
  margin-top: 20px;
  height:350px;
  width:250px;
  position:relative;
  background-color:#FFFFFF;
  border-radius:5px;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  text-align:center;
  border:1px solid rgba(187,187,187,0.40);
}
.slider-box a{
  text-decoration:none;
  text-align:center;
}
.img-box{
  height:200px;
}
.img-box img{
  height:auto;
  max-width:100%;
  max-height:100%;
}
.time{
  position:absolute;
  top:0px;
  right:20px;
  color:#f16007;
}
.detail{
  display:flex;
  flex-direction:column;
  align-items:center;
  box-sizing:border-box;
  font-size:13px;
  line-height:35px;
}
.price{
  color:black;            
}
.cart{
  position:absolute;
  bottom:0px;
  height:45px;
  background-color:#ff696e;
  width:100%;
  display:flex;
  justify-content:center;
  align-items:center;}
.cart a{
   color:#FFFFFF;
}
.slider-box:hover{
  box-shadow:2px 2px 12px rgba(47,47,47,0.40);
}
.slider-box:hover .img-box img{
  transform:scale(1.07);
  transition:all ease 0.3s;
}
.cart:hover{
  transform:scale(1.1);
  background-color:#fe9048;
  box-shadow:2px 2px 12px rgba(47,47,47,0.40);
  transition:all ease 0.1s;
}
.heading{
  display:flex;
  justify-content:center;
}
.heading h1{
  border-left:2px solid #000000;
  Border-right:2px solid #000000;
  background-color:#f05656;
  text-shadow:2px 2px 12px rgba(69,66,66,0.3);
  padding:0px 10px;
  color:#FFFFFF;
  margin:20px;
  font-size:30px;
  font-family:calibri;
}
.heading {
  display:flex;
  justify-content:center;
  }
  .heading h1{
  border-left:2px solid #000000;
  Border-right:2px solid #000000;
  background-color:#f05656;
  text-shadow:2px 2px 12px rgba(69,66,66,0.3);
  padding:0px 10px;
  color:#FFFFFF;
  margin:20px;
  font-size:30px;
  font-family:calibri;
  }
  .dropdown {
    position: relative;
    display: inline-block;
  }
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  .dropdown-content a {
    color: black;
    padding: 5px 16px;
    text-decoration: none;
    display: block;
  }
  .dropdown-content a:hover {background-color: #ddd;}
  .dropdown:hover .dropdown-content {display: block;}
  #count{
            border-radius: 40%;
            position: relative;
            top: -10px;
            left: -10px;
 }
 #button{
   position: relative;
  background-color: #4CAF50;
  border: none;
  font-size: 15px;
  color: #FFFFFF;
  padding: 5px;
  width: 200px;
  text-align: center;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
  outline: none;
  height: 40px;
  margin: 5px;
}

/*------ zoom bootstrap -----*/


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
            <li><a href="b_checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true" ></i><samll>
              <span class="badge" id="count">
                <?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $sql="SELECT count(id) AS total FROM tbl_check";
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
            
 
              
   <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background-color: white">
              <li class="breadcrumb-item"><a href="b_shop.php">Shop</a></li>
              <li class="breadcrumb-item">Order Details</li>

            </ol>
        </nav>


<?php 


  while ($row=mysqli_fetch_array($rec)) {
    
?>

<div class="container-fluid" >
  <section class="row">
  <form method="post" action="b_checkout.php" enctype="multipart/form-data">

    <input type="hidden" name="order_id" value="<?php echo("Order ".rand(1000,10000)); ?>">

    <input type="hidden" name="address" value="<?php echo $data2['address']; ?>">

  <input type="hidden" name="buyer_id" value="<?php echo $data2['id']; ?>">

 <input type="hidden" name="buyer_name" value="<?php echo $data2['username']; ?>">

  <input type="hidden" name="phone_number" value="<?php echo $data2['phoneno']; ?>">

<input type="hidden" name="deliv_address" value="<?php echo $data2['delivaddress']; ?>">

 <input type="hidden" name="category" value="<?php echo $row['category']; ?>">
                    
<input type="hidden" name="seller_id" value="<?php echo $row['seller_id']; ?>">
                     
<input type="hidden" name="product_number" value="<?php echo $row['product_number']; ?>">



 <div class="col-sm-6">
    <input type="hidden" name="photo" value="<?php echo $row['photo']; ?>">
    <img id="myimage" src="seller/pages/<?php echo $row['photo'];?>" style="width: 70%; height: auto;">
 </div>



  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

      <div class="container">
    <div class="row">
      <div class="col-sm-6 center-block text-left">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
        <h1><strong><?php echo $row['name']; ?></strong></h1>
         <div class="d-inline-flex p-3"><strong>Location:</strong> 
          <input type="hidden" name="location" value="<?php echo $row['location']; ?>">
          <span>  &nbsp;  &nbsp;<?php echo $row['location']; ?></span>
        </div>

       

<!-- START REPORT SELLER MODAL HERE-->

<!-- END REPORT SELLER MODAL HERE-->



        <hr>
                    <p>
                      <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
                      <?php echo $row['description']; ?>
                    </p>


        <form method="post">
        <div class="d-inline-flex p-3"><strong>Quantity:</strong> 
            &nbsp;&nbsp;<input type="number" name="quantity" required="" value="1" min="1" max="<?php echo $row['stocks']; ?>" 
            style="outline: none; width: 120px;">
            <span>&nbsp; Availability:</span><span style="color: red">&nbsp; &nbsp;<span>
                <input type="hidden" name="stocks" value="<?php echo $row['stocks']; ?>">
              <?php echo $row['stocks']; ?></span> stocks</span> 
        </div>
       </form>

                              <?php
                                if (!empty($row['sale'])) {
                            ?>
                                  <div class="p-3" style="display: inline-flex;">
                                  <h3 style="color: #00cc99">₱<span style="text-decoration: line-through;"><?php echo $row['price']; ?></span></h3> 
                                  &nbsp; &nbsp; &nbsp;
                                  <input type="hidden" name="price" value="<?php echo $row['new_price']; ?>">
                                  <h1>₱<span><?php echo $row['new_price']; ?></span></h1>
                                  <hr>
                                </div>
                                                    
                              <?php 
                                }

                              ?>

                              <?php
                                if (empty($row['sale'])) {

                            ?>
                                <div class="d-inline-flex p-3" style="text-decoration: none;">
                                  <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                  <h1>₱<span><?php echo $row['price']; ?></span></h1>
                                  <hr>
                                </div>
                                                    
                              <?php 
                                }

                              ?>


            <?php
            $stocks=$row['stocks'];
            if ($stocks==0) {
              echo ' <a >
                      <input type="submit"  name="check"  class="form-control" value="This item is out of stock" style="outline: none; border-radius: 0;background-color: lightgray;color:green;">
                    </a>';
            
            }else
            {
              echo ' <a href="b_checkout.php?checkout='.$row['id'].'">
                      <input type="submit" name="check"  class="form-control btn btn-success" value="ADD TO CART" style="outline: none; border-radius: 0">
                    </a>';
             }       
            ?>          
          
           <hr>

              <div class="d-inline-flex p-3"><strong>Seller name:</strong> 
          <input type="hidden" name="seller_name" value="<?php echo $row['seller_name']; ?>">
          <span>  &nbsp;  &nbsp;<?php echo $row['seller_name']; ?> 
            <small style="float: right; color: red"><a href=""  data-toggle="modal" data-target="#report" style="color: red;">Report Seller &nbsp;<i class="fa fa-exclamation-circle" aria-hidden="true"></i></a></small></span>
        </div>


 <div class="modal fade" id="report" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><b>Report Seller</b></h3>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="b_server.php">
            <div class="row">
              <input type="hidden" name="id[]" value="<?php echo $row['id']; ?>">
              <input type="hidden" name="seller_id" value="<?php echo $row['seller_id']; ?>">
              <div class="col-sm-6">
                <div class="form-group">
            <strong>Seller Name</strong>
            <input type="text" readonly name="seller_name" class="form-control" value="<?php echo $row['seller_name']?>">
            <input type="hidden" readonly name="product_id" class="form-control" value="<?php echo $row['id']?>">
          </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
           <strong>Buyer Name</strong>
            <input type="text" readonly name="name" class="form-control" value="<?php echo $data2['username']?>">
          </div>
              </div>
            </div>
            <hr>
            <div class="form-group">
        <label>Select Reason</label><br>
          <div class="row">


            <div class="col-sm-6">
             
             <tr>
              <input type="checkbox" name="prodid[]" value="Prohibited Items">
              <input type="hidden" name="reason[]" value="Prohibited Items">Prohibited Items<br>


              <input type="hidden" name="seller_id[]" value="<?php echo $row['seller_id']; ?>">
              <input type="hidden" name="sellername[]" value="<?php echo $row['seller_name']?>">
              <input type="hidden" name="buyername[]" value="<?php echo $data2['username']?>">

                 <textarea hidden="" name="reported_time[]">
                <?php 
                date_default_timezone_set('Asia/Manila');
                $current_time=date('h:i:s a m/d/Y');

                echo $current_time;
                ?>
                  
                </textarea>
            </tr>


 
             <tr>
              <input type="checkbox" name="prodid[]" value="Scam">
              <input type="hidden" name="reason[]" value="Scam">Scam<br>

              <input type="hidden" name="seller_id[]" value="<?php echo $row['seller_id']; ?>">
              <input type="hidden" name="sellername[]" value="<?php echo $row['seller_name']?>">
              <input type="hidden" name="buyername[]" value="<?php echo $data2['username']?>">

                 <textarea hidden="" name="reported_time[]">
                <?php 
                date_default_timezone_set('Asia/Manila');
                $current_time=date('h:i:s a m/d/Y');

                echo $current_time;
                ?>
                  
                </textarea>
            </tr>


             <tr>
              <input type="checkbox" name="prodid[]" value="Directing transaction outside Pick-a-Plant">
              <input type="hidden" name="reason[]" value="Directing transaction outside Pick-a-Plant">Directing transaction outside Pick-a-Plant<br>

               <input type="hidden" name="seller_id[]" value="<?php echo $row['seller_id']; ?>">
              <input type="hidden" name="sellername[]" value="<?php echo $row['seller_name']?>">
              <input type="hidden" name="buyername[]" value="<?php echo $data2['username']?>">

                 <textarea hidden="" name="reported_time[]">
                <?php 
                date_default_timezone_set('Asia/Manila');
                $current_time=date('h:i:s a m/d/Y');

                echo $current_time;
                ?>
                  
                </textarea>
            </tr>
            </div>
            <div class="col-sm-6">
                     <tr>
              <input type="checkbox" name="prodid[]" value="Counterfeit">
              <input type="hidden" name="reason[]" value="Counterfeit">Counterfeit<br>

               <input type="hidden" name="seller_id[]" value="<?php echo $row['seller_id']; ?>">
              <input type="hidden" name="sellername[]" value="<?php echo $row['seller_name']?>">
              <input type="hidden" name="buyername[]" value="<?php echo $data2['username']?>">

                 <textarea hidden="" name="reported_time[]">
                <?php 
                date_default_timezone_set('Asia/Manila');
                $current_time=date('h:i:s a m/d/Y');

                echo $current_time;
                ?>
                  
                </textarea>
            </tr>

            <tr>
              <input type="checkbox" name="prodid[]" value="Offensive Chat Messages/Images">
              <input type="hidden" name="reason[]" value="Offensive Chat Messages/Images">Offensive Chat Messages/Images<br>

              <input type="hidden" name="seller_id[]" value="<?php echo $row['seller_id']; ?>">
              <input type="hidden" name="sellername[]" value="<?php echo $row['seller_name']?>">
              <input type="hidden" name="buyername[]" value="<?php echo $data2['username']?>">

                 <textarea hidden="" name="reported_time[]">
                <?php 
                date_default_timezone_set('Asia/Manila');
                $current_time=date('h:i:s a m/d/Y');

                echo $current_time;
                ?>
                  
  
                </textarea>

            </tr>


            <br>
  

            </div>



          </div>
      </div>

       <hr> 

        <div class="form-group">
          <center><input type="submit" name="report" value="Report" class="btn btn-danger form-control" style="width: 30vh; border-radius: 0px;"></center>
        </div>


     
          </form>
        </div>
        
      </div>
      
    </div>
  </div>

           
      </div>
    </div>
  </div>
</form>
    </section>
</div>

      </div>
      </div>



<hr>
<div class="container">
  <div class="row">
    <div class="col-sm-12 text-left">
      <h2>Reviews</h2> 

      
      <a href="b_buy_ratings.php?ratings=<?php echo $row['id']; ?>">
        <button id="button"><span>Review this product</span></button>
      </a>

<?php 
} 
?>

    </div>
  </div>
</div>

<div class="container" style="background-color: white;">
  <div class="row">
    <div class="col-sm-6 text-center" >
       <div class="green-tab p-2 px-3 mx-2" style="padding: 5px; margin: 5px; border: 1px solid #00c853;">
          <p class="sm-text mb-0">OVERALL RATING</p>
            <strong><h4>
              <?php
             while ($row=mysqli_fetch_array($rec4)) {

              if ($row['product_id'] != null) {
                $product_id=$row['product_id'];              
              }
        

           
         }
          $sql="SELECT count(one) AS total FROM tbl_comment WHERE product_id=$product_id and one=1";
                    $resultone=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resultone);
                    $num_rows1=$values['total'];

          $sql="SELECT count(two) AS total FROM tbl_comment WHERE product_id=$product_id and two=1";
                    $resulttwo=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resulttwo);
                    $num_rows2=$values['total'];
                    
          $sql="SELECT count(three) AS total FROM tbl_comment WHERE product_id=$product_id and three=1";
                    $resultthree=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resultthree);
                    $num_rows3=$values['total'];

          $sql="SELECT count(four) AS total FROM tbl_comment WHERE product_id=$product_id and four=1";
                    $resultfour=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resultfour);
                    $num_rows4=$values['total'];

          $sql="SELECT count(five) AS total FROM tbl_comment WHERE product_id=$product_id and five=1";
                    $resultfive=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resultfive);
                    $num_rows5=$values['total'];


                    $totalrate=($num_rows1+$num_rows2+$num_rows3+$num_rows4+$num_rows5);

                    if ($totalrate==0) {
                        $totalrate = 1;
                    }


                  $add=(5*$num_rows5 + 4*$num_rows4 + 3*$num_rows3 + 2*$num_rows2 + 1*$num_rows1) / $totalrate;

                  $totaladd=round($add,1);

                


                    echo "<small>",$totaladd,"</small>";

                
                              if ($totaladd >= 2 && $totaladd <= 2.4) {
                                  echo '<div">
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold; margin-top: 13px;"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         
                                        <div>';
                              }
                              elseif ($totaladd>= 2.4 && $totaladd <= 3.4) {
                                  echo '<div>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold; margin-top: 13px;"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          
                                        <div>';
                              }
                              elseif ($totaladd>= 3.4 && $totaladd <= 4) {
                                  echo '<div>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold; margin-top: 13px;"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                        <div>';
                              }

                               elseif ($totaladd >= 4 && $totaladd <= 5) {
                                  echo '<div>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold; margin-top: 13px;"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>

                                        <div>';
                              }

                            

                              else{
                                 echo '<div>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold; margin-top: 13px;"></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                        <div>';
                              }
                    
         ?>



            </h4></strong>

       
       </div>
    </div>

    <div class="col-sm-6 text-center">
       <div class="white-tab p-2 mx-2 text-muted" style="padding: 5px; margin: 5px; border: 1px solid #00c853;">
          <p class="sm-text mb-0">ALL REVIEWS</p>
           <h4>  

            <?php
             while ($row=mysqli_fetch_array($rec4)) {

              if ($row['product_id'] != null) {
                $product_id=$row['product_id'];              
              }
        

           
         }
         $sql="SELECT count(id) AS total FROM tbl_comment WHERE product_id=$product_id";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values['total'];


                    echo "<small>",$num_rows,"</small>";
         ?>

                      
              </h4>
           <i class="fa fa-user" aria-hidden="true"></i>
        </div>   
    </div>


  </div>
</div>
<br>
<!-- COMMENT PART -->
<div class="container">
  <div class="row">
    <div class="col-sm-12 text-left">
      <h4><strong>Comments</strong></h4>
      <hr>
    </div>
  </div>
</div>

<!-- ============================================== COMMENT HERE ========================================-->
<!-- Style for comment -->
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);


.card-no-border .card {
    border: 0px;
    border-radius: 4px;
    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem
}

.comment-widgets .comment-row:hover {
    background: rgba(0, 0, 0, 0.02);
    cursor: pointer
}

.comment-widgets .comment-row {
    border-bottom: 1px solid rgba(120, 130, 140, 0.13);
    padding: 15px
}


.label {
    padding: 3px 10px;
    line-height: 13px;
    color: #ffffff;
    font-weight: 400;
    border-radius: 4px;
    font-size: 75%
}

.round img {
    border-radius: 100%
}

.label-info {
    background-color: #1976d2
}

.label-success {
    background-color: green
}

.label-danger {
    background-color: #ef5350
}

.action-icons a {
    padding-left: 7px;
    vertical-align: middle;
    color: #99abb4
}

.action-icons a:hover {
    color: #1976d2
}

.mt-100 {
    margin-top: 100px
}

.mb-100 {
    margin-bottom: 100px
}

.reply{
  border-color: transparent;
  outline: none;
  background-color: transparent;
  font-style: italic;

}
.stars{
  background-color: green;
}

</style>




<div class="container" style="line-height: normal; ">
  <div class="row">
   

<div class="container d-flex justify-content-center mb-100" style="text-align: left;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="comment-widgets m-b-20" > 
              

                    <?php 
                        while ($row=mysqli_fetch_array($rec2)) {
                          
                      ?>


                    <div class="d-flex flex-row comment-row" style=" box-shadow: 2px 2px 5px;">
                        <div class="p-2"><span class="round">
                        <img src="<?php
                                 if($row['profile'] !== '') { 
                                    echo 'profile/'.$row['profile']; 
                                } else { 
                                    echo 'assets/ico/logo web.png';
                                }?>"width="40"></span></div>

                        <div class="comment-text w-100">
                            <h5><?php echo $row['name']; ?></h5>
                              <div class="comment-footer"> <span class="date"><small><?php echo $row['comment_time']; ?></small></span> </div>
                            <h5>
                              <?php

                              if ($row['ratings'] >= 2 && $row['ratings'] <= 2.4) {
                                  echo '<div">
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         
                                        <div>';
                              }
                              elseif ($row['ratings'] >= 2.4 && $row['ratings'] <= 3.4) {
                                  echo '<div>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          
                                        <div>';
                              }
                              elseif ($row['ratings'] >= 3.4 && $row['ratings'] <= 4) {
                                  echo '<div>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                        <div>';
                              }

                               elseif ($row['ratings'] >= 4 && $row['ratings'] <= 5) {
                                  echo '<div>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>

                                        <div>';
                              }

                            

                              else{
                                 echo '<div>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                        <div>';
                              }



                             ?>
                                




                            </h5>

                          
                            <p class="m-b-5 m-t-10" style="margin-top: 15px;"><?php echo $row['comment']; ?></p>



                        </div>

                    </div>
<br>
                        <?php
                  }
                  ?>


</div>
</div>
</div>
</div>
</div>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        
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


<!-- REPORT SELLER -->
    
</html>
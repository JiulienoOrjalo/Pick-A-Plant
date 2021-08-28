<?php include('b_server.php');
?>
<?php include('login_server.php');

if (isset($_SESSION['username'])) {

    $login = $_SESSION['username'];
    $data = "SELECT * FROM tbl_register WHERE username='$login'";

    $qry = mysqli_query($db, $data) or die("Could not execute Query." . mysql_error());
    $data2 = mysqli_fetch_array($qry);
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
      <link rel="stylesheet" href="assets/style/stylefooter.css">

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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

    <style type="text/css">
        #list{
        }
        #up{
            color: gray;
        }
        #up:hover{
            color: #64ca87;
        }
        #wish{
            color: gray
        }
        #wish:hover{
            color: #64ca87; 
        }
         #count{
             border-radius: 40%;
            position: relative;
            top: -10px;
            left: -10px;
}
    </style>

</head>

<body>

    <!-- Top menu -->
    <nav class="navbar navbar-inverse" role="navigation">
        <!-- style="background-color: #64ca87; -->
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
                           <center> Confirmed (<?php
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
                    <li><a href="b_checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            <samll><span class="badge" id="count"> 
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
s

                    <li class="dropdown"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
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
                    <h2>Profile</h2>
                    <div class="divider-1 wow fadeInUp"><span></span></div>
                </div>
            </div>



            <div class="container">
                <div class="row" style=" line-height: 80%;">
                    <div class="col-sm-6">
                        <small>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb" style="background-color: white; ">
                                    <li class="breadcrumb-item"><a href="b_profile.php"><span id="up">List of Orders</span></a></li>
                                    <li class="breadcrumb-item"><a href="b_profile2.php"><span id="up">Update Account</span></a></li>
                                </ol>
                            </nav>
                        </small>
                    </div>

                    <div class="col-sm-6">
                        <small>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb" style="background-color: white; ">
                                    <li class="breadcrumb-item"><a href="b_profile_confirmed.php">
                                        <span id="list">Confirmed <i class="fa fa-thumbs-up" aria-hidden="true"></i></span></a></li>
                                    <li class="breadcrumb-item"><a href="b_profile_delivered.php">
                                        <span id="up">Delivered <i class="fa fa-check-circle" aria-hidden="true"></i></span></a></li>
                                    <li class="breadcrumb-item"><a href="b_profile_cancelled.php">
                                        <span id="up">Cancelled <i class="fa fa-ban" aria-hidden="true"></i></span></a></li>
                                </ol>
                            </nav>
                        </small>
                    </div>
                    
                </div>
                
            </div>



            <div class="tab-content" style=" overflow-x: auto;">
                <div class="tab-pane active" id="home">
                    <form action="#" method="post">
                        <table cellspacing="" class="table table-striped table-bordered table-hover" id="example" style="font-size:12px;">
                               <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product #</th>
                                    <th>Date Oredered</th>
                                    <th>TotalPrice</th>
                                    <th>PaymentMethod</th>
                                    <th>Status</th>
                                    <th >Remarks</th>
                                   
                                </tr>
                            </thead>

                            <tbody>
                                  <?php  
                                $connection=mysqli_connect('localhost','root','','pick_a_plant');
                                  $buyer = $data2['username'];
                                  $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                                  $result=mysqli_query($connection,$query);
                                  $row=mysqli_fetch_array($result);
                                  $id = $row['id'];

                              $query1="SELECT * FROM tbl_buy WHERE buyer_id=$id ";
                              $result1=mysqli_query($connection,$query1);
                              $rowcount=mysqli_num_rows($result1);

                                for($i=1; $i <= $rowcount; $i++){

                                  $row1=mysqli_fetch_array($result1);

                                            $Cancel = "Cancel";
                                            $status = $row1['status'];

                                                // if ($status == 0) {
                                                //     $diable="<a href=s_order.php?userID=".$row1['id']." class='cancel'>Cancel</a>"; 
                                                //     $diable1="<a href=s_order.php?userIDD=".$row1['id']." class='confirm'>Confirm</a>"; 
                                                // }
                                                // elseif ($status == 1) {
                                                //     $diable="<a href=s_order.php?userID=".$row1['id']." class='cancel'>Cancel</a>"; 
                                                //     $diable1="<a href=s_order.php?userIDD=".$row1['id']." class='confirm'>Confirm</a>"; 
                                                // }
                                                // elseif ($status == 2) {
                                                //     $diable="<a href=s_order.php?userID=".$row1['id']." class='cancel'>Cancel</a>"; 
                                                //     $diable1="<a href=s_order.php?userIDD=".$row1['id']." class='confirm'>Confirm</a>"; 
                                                // }




                                        
                                            if ($status == 1) {
                                                $action = '<span style="color: #3CB371; font-weight: bold;">Confirmed</span>';
                                                $remark = " Your order has been confirmed.";
                                                $process ="Your order is on its way! As you have ordered via Cash on Delivery, please have the exact amount of cash for our deliverer." ;   

                                                        echo '  
                                        <tr>
                                            <td width="10%"  class="orderid "  data-target="#' . $row1['id'] . '" data-toggle="modal" data-id="105">
                                            <a href="#" title="View list Of ordered products"  class="orderid "  data-target="#myOrdered"><i class="fa fa-info-circle fa-fw"></i> view orders</a> </td>


                                           <td>' . $row1['product_number'] . '</td>  
                                            <td>' . $row1['order_time'] . '</td>  
                                            <td>' . '&#8369;' . $row1["total_price"] . '</td>
                                            <td>' . 'Cash on Delivery' . '</td>
                                            <td>' . $action . '</td>  

                                            <td>' . $remark . '</td>


                                           
                                            </tr> 
                                        

                                            ';
                                            }
                                     
                                        }

                                  ?>

                                          

                              
                                          



                            </tbody>

                        </table>
                    </form>
                </div>
                <!--/table-resp-->
            </div>
            <!--/tab-pane-->

        </div>
    </div>

<!-- Button trigger modal -->


 <!-- MODAL PART -->
  <?php  
                                $connection=mysqli_connect('localhost','root','','pick_a_plant');
                                  $buyer = $data2['username'];
                                  $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                                  $result=mysqli_query($connection,$query);
                                  $row=mysqli_fetch_array($result);
                                  $id = $row['id'];

                              $query1="SELECT * FROM tbl_buy WHERE buyer_id=$id ";
                              $result1=mysqli_query($connection,$query1);
                              $rowcount=mysqli_num_rows($result1);

                                for($i=1; $i <= $rowcount; $i++){

                                  $row1=mysqli_fetch_array($result1);

                                            $Cancel = "Cancel";
                                            $status = $row1['status'];




                                            if ($status == 0) {
                                                $action = '<span style="color: #FFCC99; font-weight: bold;">Pending</span>';
                                                $remark = " Your order is on process.";
                                                $process ="Your order is on process. Please check your profile always for notification." ;   

                                            }
                                            if ($status == 1) {
                                                $action = '<span style="color: #3CB371; font-weight: bold;">Confirmed</span>';
                                                $remark = " Your order has been confirmed.";
                                             
                                                $process ="Your order is on its way! As you have ordered via Cash on Delivery, please have the exact amount of cash for our deliverer." ;   
                                            
                                            }
                                            if ($status == 2) {
                                                $action = '<span style="color: #FF6347; font-weight: bold;">Cancelled</span>';
                                                $remark = " Your order has been cancelled due to lack of communication";
                                                $process ="Your order has been cancelled due to lack of communication and incomplete information." ;   
                                            }
                                            if ($status == 3) {
                                                $action = '<span style="color: #87CEEB; font-weight: bold;">Delivered</span>';
                                                $remark = "Thank you for Ordering";
                                                $process ="Thank you for Ordering. We hope you enjoy your purchased products." ; 
                                                 
                                            }


                                  ?>


<div class="modal fade" role="dialog" id="<?php echo $row1['id']?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div id="print">
      <!-- Modal Header -->
      <div class="modal-header">

        <h4 class="modal-title" style="text-align: left;"><img src="assets/img/Order logo.png" height="auto" width="230px;"></h4>
      
        <hr>
         <?php
        $status = $row1['status'];
        $process1 = "Your order has been confirmed and it well be delivered soon!";
        $process2 = "Your order has been Delivered";

            if ($status == 1) {
                 echo '
                    <h4 style="text-align: left; color: black; margin-left: 15px;">'.$process1.'</h4><br>
                 ';
            }
             if ($status == 3) {
                 echo '
                    <h4 style="text-align: left; color: black; margin-left: 15px;">'.$process2.'</h4><br>
                 ';
            }
     

        ?>


       <div style="text-align: left;  color: black; margin-left: 15px; ">
        <h5>DEAR Ma'am/Sir<br><br>
        <?php echo $process ?></h5>


        </div>


      </div>    
        <?php
        $status = $row1['status'];

        $process ="Your order is on its way! As you have ordered via Cash on Delivery, please have the exact amount of cash for our deliverer." ;   
        $process2 = "Delivery Information";
        $process3= "Product Number: "."<strong>".$row1['product_number']."</strong>";
        $process4= "Pick-A-Plant username: "."<strong>".$row1['buyer_name']."</strong>";
        $process5= "Items to be delivered : "."<strong>".$row1['quantity']."</strong>";
        $process6= "Order ID: "."<strong>".$row1['order_id']."</strong>";

            if ($status == 1) {
                 echo '
                    <h4 style="text-align: left; color: black; margin-left: 30px;">'.$process2.'</h4>
                    <span style="color: black; float: left;margin-left: 30px;">'.$process3.'</span>
                    <span style="color: black; float: right margin-right: auto;">'.$process4.'</span>

                     <br>
                    <span style="color: black; float: left;margin-left: 30px;">'.$process5.'</span>
                    <span style="color: black; float: right margin-right: auto;">'.$process6.'</span>

                 ';
            }

            if ($status == 3) {
                 echo '
                    <h4 style="text-align: left; color: black; margin-left: 30px;">'.$process2.'</h4>
                    <span style="color: black; float: left;margin-left: 30px;">'.$process3.'</span>
                    <span style="color: black; float: right margin-right: auto;">'.$process4.'</span>
                     <br>
                    <span style="color: black; float: left;margin-left: 30px;">'.$process5.'</span>

                 ';
            }
            if ($status == 0) {
                 echo '
                    <h4 style="text-align: left; color: black; margin-left: 30px;">'.$process2.'</h4>
                    <span style="color: black; float: left;margin-left: 30px;">'.$process3.'</span>
                    <span style="color: black; float: right margin-right: auto;">'.$process4.'</span>

                     <br>
                    <span style="color: black; float: left;margin-left: 30px;">'.$process5.'</span>
                    <span style="color: black; float: right margin-right: auto;">'.$process6.'</span>

                 ';
            }


        ?>

     

      <!-- Modal body -->
      <div class="modal-body" style="">

    <hr>
          <table class="table table-striped">
    <thead>
      <tr>
        <th>PRODUCT</th>
        <th>DESCRIPTION</th>
        <th>PRICE</th>
        <th>QUANTITY</th>
        <th>TOTAL PRICE</th>
        <th>STATUS</th>
      </tr>
    </thead>
    <tbody>
      <tr style="text-align: left;">
        <td><img width="70" class="img-portfolio" height="auto" alt="" src="seller/pages/<?php echo $row1['photo'] ?>"></td>
        <td class="b"><?php echo $row1['description']; ?></td>
        <td><?php echo $row1['price']; ?></td>
        <td><?php echo $row1['quantity']; ?> </td>
        <td> &#8369;<?php echo $row1['total_price']; ?></td>
        <td><?php echo $action ; ?> </td>
      </tr>


    </tbody>

  </table>
  <div style="text-align: left;">
<div style="text-align: left; display: inline-block;">
    <h5><b>Ordered Date:</b> <?php echo $row1['order_time']; ?></h5>
    <h5><b>Payment Method:</b> Cash on Delivery</h5>
</div>
<div style="display: inline-block; float: right; margin-right: 10px;">
    <h5><b>Total Price:</b>  &#8369;<?php echo $row1['total_price'] ?> </h5>
   
</div>
</div>
<hr>
<style type="text/css">
    #bottom{
        text-align: left;
        float: left;

        
    }
</style>
     <?php
        $status = $row1['status'];
        $process ="Please print or have a screenshot of this as a proof of purchased" ;   
        $process2 = "We hope you enjoy your purchased products. Have a nice day!";


            if ($status == 1) {
                 echo '
                      <small><span style="color: black; float: left;margin-left: 15px;">'.$process.'</span><br><br>
                      <span style="color: black; float: left;margin-left: 15px;">'.$process2.'</span><br></small>
                      <span  style="color: black; float: left;margin-left: 15px;">Sincerely.</span><br>
                       <span  style="color: #64ca87; float: left;margin-left: 15px;"><strong> - Pick-A-Plant</strong> <i class="fa fa-leaf" aria-hidden="true"></i></span><br><br>
                    
                 ';
            }

             if ($status == 3) {
                 echo '
                      <small><span style="color: black; float: left;margin-left: 15px;">'.$process.'</span><br><br>
                      <span style="color: black; float: left;margin-left: 15px;">'.$process2.'</span><br></small>
                      <span  style="color: black; float: left;margin-left: 15px;">Sincerely.</span><br>
                       <span  style="color: #64ca87; float: left;margin-left: 15px;"><strong> - Pick-A-Plant</strong> <i class="fa fa-leaf" aria-hidden="true"></i></span><br><br>
                    
                 ';
            }

        ?>

  </div>

</div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius: 0; outline: none;">Close</button>
        <button onclick="printContent('print');" class="btn btn-info" style="border-radius: 0; outline: none;"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
      </div>

 
  </div>
</div>
    </div>
<?php
}
?>






<br><br><br><br><br><br><br><br>


    <!-- Footer -->
  

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

                        <span> &nbsp; &nbsp;<a href="" data-toggle="modal" data-target="#privacy">Privacy Policy &nbsp;|</a></span>
                        <span> &nbsp; &nbsp;<a href="" data-toggle="modal" data-target="#information">Contact Us</a></span>
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
    <script src="../js/dataTables/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        function printContent(el){
          var restorepage = document.body.innerHTML;
          var printcontent = document.getElementById(el).innerHTML;

          document.body.innerHTML = printcontent;
          window.print();
          document.body.innerHTML= restorepage;
}

    </script>


    <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>
<!-- START MODAL -->
<div class="modal fade" role="dialog" id="information">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--MODAL HEADER-->
            <div class="modal-header" style="background-color:  #dcc59a;  text-align: center;">
                <h2 class="modal-title" style="color: white;">Contact us</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!--MODAL HEADER-->

            <!--MODAL BODY-->
            <div class="modal-body">
                <form method="post" name="report_form" action="b_server.php">

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
                $current_time = date('h:i:s a m/d/Y');

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
    #privacy {

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
<div class="modal fade" role="dialog" id="terms">
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
                All provisions of the Terms which by their nature should survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.

                  <br><br>
        His/Her Account will be terminated once he/she <strong>violates or receive 20 consecutive reports</strong> to his/her buyer.
            </p>

        </div>
    </div>
</div>

</html>
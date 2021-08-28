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
          color: gray;
        }
        #list:hover{
          color: #64ca87;
        }
        #up{
            color: #64ca87;
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
                                }?>" class="img-radius" style="border-radius: 50%; width: 20px;" alt="User-Profile-Image">
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
                ?></span></samll></a></li>

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

                    <li class="dropdown"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
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
                                    <li class="breadcrumb-item"><a href="b_profile.php"><span id="list">List of Orders</span></a></li>
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
                                        <span id="list">Delivered <i class="fa fa-check-circle" aria-hidden="true"></i></span></a></li>
                                    <li class="breadcrumb-item"><a href="b_profile_cancelled.php">
                                        <span id="list">Cancelled <i class="fa fa-ban" aria-hidden="true"></i></span></a></li>
                                </ol>
                            </nav>
                        </small>
                    </div>
                    
                </div>
                
            </div>


<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                
                    <div class="row m-l-0 m-r-0">

                        <div class="col-sm-4 bg-c-lite-green user-profile" style="color: white;">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> 

                                <!--INSERT THE VALUE OF PROFILE HERE-->
                                <img src="<?php
                                 if($data2['profile'] !== '') { 
                                    echo 'profile/'.$data2['profile']; 
                                } else { 
                                    echo 'assets/ico/logo web.png';
                                }?>" class="img-radius" style="border-radius: 50%; width: 90px; height: 90px;" alt="User-Profile-Image">

                                </div>
                                <h3 style="color: white;"><?php echo $data2['username']?></h3>
                                <p><small>Buyer</small></p>
                            </div>
                        </div>


                        <div class="col-sm-8" style="text-align: left;">
                            <div class="card-block">
                                <div style="display: inline-block;">
                                    <h2>Information</h2>
                                </div>
                                <div style="display: inline-block; float: right;">
                                    <button type="button" class="btn btn-success btn-sm" style="outline: none;" 
                                    data-toggle="modal" data-target="#edit">Edit <i class="fa fa-align-justify" aria-hidden="true"></i></button>
                                </div>

                                <input type="hidden" name="" value="<?php echo $data2['username']?>">
                                
                                <div class="row">
                                    <div class="col-sm-3" >
                                        <p class="m-b-10">First Name</p>
                                        <h6 class="text-muted f-w-400"><?php echo $data2['firstname']?></h6>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="m-b-10">Last Name</p>
                                        <h6 class="text-muted f-w-400"><?php echo $data2['lastname']?></h6>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="m-b-10">Contact Number</p>
                                        <h6 class="text-muted f-w-400"><?php echo $data2['phoneno']?></h6>
                                    </div>
                                </div>
                                <hr>
                                 <div class="row">
                                    <div class="col-sm-3">
                                        <p class="m-b-10">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $data2['email']?></h6>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="m-b-10">Address</p>
                                        <h6 class="text-muted f-w-400"><?php echo $data2['address']?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10">Address where to deliver</p>
                                        <h6 class="text-muted f-w-400"><?php echo $data2['delivaddress']?></h6>
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
    </div>

<!-- MODAL EDIT -->
    <div class="modal fade"  id="edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title"><b>Edit your profile</b></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
     
                <div class="modal-body">
                    <form method="post" name="profile" enctype="multipart/form-data" action="b_server.php">


                                <div class="form-group">
                                    <img src="<?php
                                 if($data2['profile'] !== '') { 
                                    echo 'profile/'.$data2['profile']; 
                                } else { 
                                    echo 'assets/ico/logocaps.jpg';
                                }?>"  onclick="triggerClick()" id="imgcard" style="border-radius: 50%; width: 200px; height: 200px;"><br>
                                    <input type="file" name="file" onchange="displayImage(this)" id="profileImage" style="display: none;">
                                    <input type="hidden" name="oldimage" onchange="displayImage(this)" id="profileImage" style="display: none;">
                                    <input type="hidden" name="ooldimage" value="<?phpif($data2['profile'] !== '') { 
                                    echo $data2['profile']; 
                                } else { 
                                    echo 'assets/ico/logocaps.jpg'; ?>">
                                    <span>File Size: Maximum 2MB</span><br>
                                    <span>File Extension: .JPG, .PNG</span>
                                </div>

                                <hr>
                                <div class="form-group">
                                <label class="def" style="float: left;"><h5>Username</h5></label>
                                <input type="text" readonly name="username" class="form-control" value="<?php echo $data2['username']?>">
                                </div>

                        
        <div class="row">
          <div class="col-sm-6">
            <div class="panel panel-pink">
            <label class="def" style="float: left;"><h5>First Name</h5></label>
            
            <input type="text" name="firstname" class="form-control" value="<?php echo $data2['firstname']?>"></div>
          </div>
           <div class="col-sm-6">
             <div class="panel panel-pink">
                <label class="def" style="float: left;"><h5>Last Name</h5></label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $data2['lastname']?>"></div>
           </div>
        </div> 

        <div class="row">
          <div class="col-sm-6">
            <div class="panel panel-pink">
            <label class="def" style="float: left;"><h5>Contact Number</h5></label>
            <input type="text" name="contact" class="form-control" value="<?php echo $data2['phoneno']?>"></div>
          </div>
           <div class="col-sm-6">
             <div class="panel panel-pink">
                <label class="def" style="float: left;"><h5>Email</h5></label>
                <input type="text" name="email" class="form-control" value="<?php echo $data2['email']?>"></div>
           </div>
        </div> 

         <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-pink">
            <label class="def" style="float: left;"><h5>Address</h5></label>
            <input type="text" name="address" class="form-control" value="<?php echo $data2['address']?>"></div>
          </div>

           <div class="col-sm-12">
            <div class="panel panel-pink">
            <label class="def" style="float: left;"><h5>Address where to deliver</h5></label>
            <input type="text" name="delivaddress" class="form-control" value="<?php echo $data2['delivaddress']?>"></div>
          </div>

        </div> 
        <a href='' type='button' style="text-decoration: none;color: #64ca87;"data-toggle="modal" data-target="#password">Change your password</a>
                            
                  
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="outline: none;">Close</button>
                    <input type="submit" name="update_profile" value="Save Changes" class="btn btn-success save" style="outline: none;">
                </div>
   </form>
                <!--MODAL FOOTER-->
            </div>
        </div>
    </div>

<!--PASSWORD MODAL EDIT -->
    <div class="modal fade" role="dialog" id="password">
        <div class="modal-dialog ">
            <div class="modal-content">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title"><b>Change password</b></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
     
                <div class="modal-body">
                    <form method="post" name="profile" enctype="multipart/form-data" action="b_server.php">
                        <input type="hidden" name="hidden_current_password" value="<?php echo $data2['password']?>">
                        <input type="hidden" name="user_unique_id" value="<?php echo $data2['unique_id']?>">

                  <div class="row">
                    <div class="col-sm-12">
                        
                        <label class="def" style="float: left;margin: 0px;"><h5>Current Password</h5></label>
                        <input type="password" name="current_password" class="form-control"  style="margin: 0px;" required>
                  </div>

                    <div class="col-sm-12">
                        
                        <label class="def" style="float: left;margin: 0px;"><h5>New Password</h5></label>
                    <input type="password" name="new_password" class="form-control"  style="margin: 0px;"id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>

                
                 
                     <div class="col-sm-12">
                        
                        <label class="def" style="float: left;margin: 0px;"><h5>Confirm Password</h5></label>
                    <input type="password" name="confirm_password" class="form-control"  style="margin: 0px;"required>
                    </div>

                  </div>           
          
                  
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="outline: none;">Close</button>
                    <input type="submit" name="submit_password" value="Save Changes" class="btn btn-success save" style="outline: none;">
                </div>
   </form>
                <!--MODAL FOOTER-->
            </div>
        </div>
    </div>
<!-- FUNCTION FOR PROFILE PHOTO-->
    <script>
  function triggerClick(){
  document.querySelector('#profileImage').click();
}

function displayImage(e){
  if (e.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e){
      document.querySelector('#imgcard').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>





  <!-- FOOTER AREA-->

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
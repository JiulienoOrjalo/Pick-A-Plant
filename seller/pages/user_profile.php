<?php include('s_server.php'); ?>
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
        $con=mysqli_connect('localhost','root','','pick_a_plant');

        $connection=mysqli_connect('localhost','root','','pick_a_plant');
        $buyer = $data2['username'];
        $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
        $result=mysqli_query($connection,$query);
        $row=mysqli_fetch_array($result);
        $id = $row['id'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <link rel="shortcut icon" href="assets/ico/icon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Pick A Plants - Seller</title>
           <style type="text/css">

    </style>
        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="assets/css/style1.css">
       

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
 
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation" >
                <div >
                    <a class="navbar-brand" href="index.php">Pick A Plant</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding: 10px">
                            <i class="fa fa-user fa-fw"></i> <?php echo $data2['username'];
                                ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation" >
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <img src="logo.png">
     
                            </li>

                            <li>
                                <a href="index.php" class="active" style="color: #64ca87;"><i class="fa fa-dashboard fa-fw"></i> Dashboard </a>
                            </li>

                            <li>
                                <a href="s_products.php" style="color: #64ca87;">
                                <i class="fa fa-leaf" aria-hidden="true"></i> Products</a>
                            </li>

                            <li>
                                <a href="s_order.php" style="color: #64ca87;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Orders
                                    <small>
                                    <span class="badge badge-primary" style="background-color: #64ca87;"> 
                                        <?php
                                        $sql="SELECT count(*) AS total FROM tbl_buy WHERE status='0' AND seller_id=$id;";
                                       
                                        $result=mysqli_query($con,$sql);
                                        $values=mysqli_fetch_assoc($result);
                                        $num_rows=$values['total'];

                                        echo "<small>",$num_rows,"</small>";
                                    ?>
                    
                                </span></small> </a>
                            </li>

                           

                            <li>
                                 <?php
                   $user = $data2['unique_id'];
                   $sql2="SELECT * FROM tbl_register WHERE not unique_id='$user' ORDER BY id DESC";
                   $find=mysqli_query($db,$sql2);
                   $data=mysqli_fetch_assoc($find);

                   ?>
                   <!--CHAT FEATURE-->
                    <a href="chat/chat.php?user_id=<?php echo $data['unique_id']?>" onclick='changeStatus(<?php echo $data2['unique_id']?>)' style="color: #64ca87;" ><i class="fa fa-comments" aria-hidden="true"></i></i>&nbsp; Messages 
                     <span class="badge badge-primary" style="background-color: #64ca87;">  <?php
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
                  <small id=''><?php echo $num_rows?></small></span></small></a></a>
                            </li>
<script>
    function changeStatus($id){
      
        $.ajax({
            
            url: "update.php",
            data: {id : $id},
            type: "POST",  
            
        });
    }
</script>
                        </ul>
                    </div>
                </div>
            </nav>

            <br>
            <br>
            <br>
            <br>
            <br>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container-fluid d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                
                    <div class="row m-l-0 m-r-0">

                        <div class="col-sm-4 bg-c-lite-green user-profile" style="color: white;background-color: lightgreen">
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
                                <p><small>Seller</small></p>
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
            <div class="modal-content" style="text-align: center;color: #888888;font-family: 'Roboto', sans-serif;font-size:16px">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title"><b>Edit your profile</b></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
     
                <div class="modal-body">
                    <form method="post" name="profile" enctype="multipart/form-data" action="s_update_profile.php">


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
            <div class="modal-content" style="text-align: center;color: #888888">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title"><b>Change password</b></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
     
                <div class="modal-body">
                    <form method="post" name="profile" enctype="multipart/form-data" action="s_update_profile.php">
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

                </div>
            </div>
        
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>

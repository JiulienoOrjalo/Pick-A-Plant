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
   echo "<script>alert('You must login before viewing this page.'); location.href='sa_login.php';</script>";
}
?>   


<?php
$connection=mysqli_connect("localhost","root","","pick_a_plant");

$resultSet = mysqli_query($connection, "SELECT * FROM tbl_category");

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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

         <link rel="shortcut icon" href="assets/ico/icon.png">

        <title>Pick A Plants - Seller</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/css/style1.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style type="text/css">
        #dic{
            width: 50px;
            height: auto;

        }

    </style>


    </head>
    <body style="outline: none;">

        <div id="wrapper">

               <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
                <div class="navbar-header">
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
                            <i class="fa fa-user fa-fw"></i><?php
                                    //display username from db
                                echo $data2['username'];
                                ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="user_profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <img src="logo.png">
     
                            </li>

                            <li>
                                <a href="index.php" style="color: #64ca87;"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="s_products.php" class="active"  style="color: #64ca87;">
                                    <i class="fa fa-leaf" aria-hidden="true"></i> Products</a>
                            </li>
                            <li>
                                <a href="#" style="color: #64ca87;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Orders <small><span class="badge badge-primary" style="background-color: #64ca87;"> 
                                        <?php
                                        $sql="SELECT count(*) AS total FROM tbl_buy WHERE status='0' AND seller_id=$id;";
                                       
                                        $result=mysqli_query($con,$sql);
                                        $values=mysqli_fetch_assoc($result);
                                        $num_rows=$values['total'];

                                        echo "<small>",$num_rows,"</small>";
                                    ?>
                    
                                </span></small></a>
                            </li>

                            <li>
                                <a href="#" style="color: #64ca87;"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a>
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

         
            <div id="page-wrapper">
                <div class="container-fluid">

                       
        
                    <div class="row">

                        <div class="col-lg-12">
                         
                        <nav aria-label="breadcrumb" style="margin-top: 40px;">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a href="s_products.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add</li>

                            </ol>
                        
                        </nav>     
                              <h1 >Add New Products</h1>
                              <small>write N/A if not applicable</small>
                              <hr>
                             
                        </div>

                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                
    <form method="post" class="form-horizontal span6" name="plant_form" enctype="multipart/form-data" action="s_server.php">
        <div class="row">
          <!-- /.col-lg-12 -->
       </div>   
          <input type="hidden" name="product_number" value="<?php echo("Prod ".rand(10000,100000)); ?>">

              <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="name_of_plants">Name of Product:</label>
                      <div class="col-md-8">
                        <input class="form-control input-sm" id="name_of_plants" name="name_of_plants" placeholder="Name of Plants" type="text" value="" required="">
                      </div>
                    </div>
                  </div>  

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "meaning">Description:</label>

                      <div class="col-md-8"> 
                      <textarea class="form-control input-sm" id="meaning" name="description" cols="1" rows="3" required=""></textarea>
                      </div>
                    </div>
                  </div>  

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="name_of_plants">Location:</label>
                      <div class="col-md-8">
                        <input class="form-control input-sm" id="name_of_plants" name="location" placeholder="Location" type="text" value="" required="">
                      </div>
                    </div>
                  </div>


                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="name_of_plants">Categories:</label>
                      <div class="col-md-8">
                        <select class="form-control" name="category">
                          <option readonly>-- Select Category --</option>
                       <?php  
                                  while($row = mysqli_fetch_array($resultSet))  
                                  { 
                                    $pick_category = $row['category'];
                                    echo "<option value='$pick_category'>$pick_category</option>";

                                      }  
                                  ?>  
                        </select>
                      </div>
                    </div>
                  </div>


<!--           
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="family">Family:</label>

                      <div class="col-md-3">
                         <input class="form-control input-sm" id="family" name="family" placeholder="Plant Family" type="text" value=""  step="any" required="" data-toggle="tooltip" data-placement="right" title="Write N/A if not applicable">
                      </div>

                       <label class="col-md-2 control-label" for="origin">Origin:</label>

                      <div class="col-md-3">
                         <input class="form-control input-sm" id="origin"  step="any" name="origin" placeholder="Origin of the PLants" type="text" value="" required="" data-toggle="tooltip" data-placement="right" title="Write N/A if not applicable">
                      </div>
                    </div>
                  </div> -->
                   

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="name_of_plants">Available Stocks:</label>
                      <div class="col-md-8">
                        <input class="form-control input-sm" id="name_of_plants" name="stocks" placeholder="Stocks" type="number" value="" required="">
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="family">Sale (Discount):</label>

                      <div class="col-md-3">
                         <input class="form-control input-sm" id="family" name="sale" placeholder="Discount" type="number" min="0" value=""  step="any" >
                      </div>

                       <label class="col-md-2 control-label" for="origin">Price</label>

                      <div class="col-md-3">
                         <input class="form-control input-sm" id="origin"  step="any" name="price" placeholder="Price" type="number" value="" required="">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" align = "right"for=
                      "file">Upload Image:</label>

                      <div class="col-md-8">
                      <input type="file" name="file" value="" id="file" required="" />
                      </div>
                      
                    </div>
                  </div>

              <input type="hidden" name="selname" value="<?php echo $data2['username']; ?>">  
              <input type="hidden" name="seller_id" value="<?php echo $data2['id']; ?>">  
            
                <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="add_plants" type="submit" ><span class="fa fa-save fw-fa">
                          
                        </span>  Add</button>
                      </div>
                    </div>
                  </div>

               
        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
          </div>
          
        </form>


                    
                   

                </div>
            </div>
        </div>
    </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->



    </body>
</html>

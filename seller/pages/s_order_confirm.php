<?php include('s_server.php'); ?>
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
    echo "<script>alert('You must login before viewing this page.'); location.href='sa_login.php';</script>";
}
?>


<?php
$connection = mysqli_connect('localhost', 'root', '', 'pick_a_plant');
$seller = $data2['username'];
$query = "SELECT * FROM tbl_register WHERE username = '$seller'";
$result = mysqli_query($connection, $query);
// $row=mysqli_fetch_array($result);

// echo $row['id'];

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

    <title>Pick A Plants - Accounts</title>

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
        body{
            text-decoration: none;
        }

        #dic {
            width: 50px;
            height: auto;
        }

        .btn-small {
            border-radius: 0px;
            padding: 3px;
            outline: none;
            padding-right: 5px;
        }

        .cancel {
            border-radius: 0px;
            font-size: 12px;
            padding-top: 0px;
            padding-bottom: 0px;
            padding: 5px;
            background-color: #f44336;
            color: white;
            outline: none;


        }
        
        .cancel:focus {
            outline: none !important;
        }

        .cancel:hover {
            text-decoration: none;
            color: white;
            background-color: red;
            outline: none;
        }

        .confirm {
            border-radius: 0px;
            font-size: 12px;
            padding-top: 0px;
            padding-bottom: 0px;
            padding: 5px;

            background-color: #008CBA;
            color: white;
            text-align: center;
            justify-content: center;
            text-decoration: none;
        }

        .confirm:hover {
            text-decoration: none;
            color: white;
            background-color: #187bcd;
        }

        .disconfirm {
            border-radius: 0px;
            font-size: 12px;
            padding-top: 0px;
            padding-bottom: 0px;
            padding: 3px;

        }

        .discancel {
            border-radius: 0px;
            font-size: 12px;
            padding-top: 0px;
            padding-bottom: 0px;
            padding: 3px;

        }
        
      
    </style>


</head>

<body style="outline: none;">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                        <i class="fa fa-user fa-fw"></i> <?php
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
                            <a href="s_products.php" style="color: #64ca87;">
                                <i class="fa fa-leaf" aria-hidden="true"></i> Products</a>
                        </li>

                        <li>
                            <a href="#" class="active" style="color: #64ca87;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Orders <small><span class="badge badge-primary" style="background-color: #64ca87;"> 
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
                                <li class="breadcrumb-item active" aria-current="page"><a href="s_order.php">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="s_order_confirm.php"><u>Confirm
                                    <small><span class="badge badge-primary" style="background-color: #64ca87;"> 
                                          <?php
                                         $con=mysqli_connect('localhost','root','','pick_a_plant');

                                         $connection=mysqli_connect('localhost','root','','pick_a_plant');
                                        $buyer = $data2['username'];
                                        $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                                        $result=mysqli_query($connection,$query);
                                        $row=mysqli_fetch_array($result);
                                        $id = $row['id'];

                            

                                        $sql="SELECT count(*) AS total FROM tbl_buy WHERE status='1' AND seller_id=$id;";
                                       
                                        $result=mysqli_query($con,$sql);
                                        $values=mysqli_fetch_assoc($result);
                                        $num_rows=$values['total'];

                                        echo "<small>",$num_rows,"</small>";
                                    ?>
                    
                </span></small></u></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="s_order_cancel.php">Cancelled <small><span class="badge badge-primary"> 
                                          <?php
                                         $con=mysqli_connect('localhost','root','','pick_a_plant');

                                         $connection=mysqli_connect('localhost','root','','pick_a_plant');
                                        $buyer = $data2['username'];
                                        $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                                        $result=mysqli_query($connection,$query);
                                        $row=mysqli_fetch_array($result);
                                        $id = $row['id'];


                                        $sql="SELECT count(*) AS total FROM tbl_buy WHERE status='2' AND seller_id=$id;";
                                       
                                        $result=mysqli_query($con,$sql);
                                        $values=mysqli_fetch_assoc($result);
                                        $num_rows=$values['total'];

                                        echo "<small>",$num_rows,"</small>";
                                    ?>
                    
                </span></small></a></li>

                            </ol>
                        </nav>
                        <h1 class="page-header">List of Orders</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Order Products
                            </div>
                            <!-- /.panel-heading -->
                            <form method="post" action="s_server.php">
                                <div class="panel-body">
                                    <div class="table-responsive">

                                        <table id="employee_data" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <td style="width: 5px;"><small><strong>#</strong></small></td>
                                                     <td style="width: 5px;"><small><strong>#</strong></small></td>
                                                    <td style="width: 50px;"><small><strong>Product ID</strong></small></td>
                                                    <td style="width: 100px;"><small><strong>Order ID</strong></small></td>

                                                    <td><small><strong>Customer</strong></small></td>
                                                    <td style="width: 140px;"><small><strong>DateOrdered</strong></small></td>
                                                    <td style="width: 50px;"><strong><small>Price</strong></small></td>
                                                    <td style="width: 100px;"><strong><small>Payment Method</strong></small></td>
                                                    <td style="width: 60px;"><small><strong>Status</strong></small></td>
                                                    <td style="width: 100px;"><small><strong>Action</strong></small></td>
                                                    <td style="width: 100px;"><small><strong>Delivery Status</strong></small></td>



                                                </tr>
                                            </thead>

                                            <?php
                                            $connection = mysqli_connect('localhost', 'root', '', 'pick_a_plant');
                                            $seller = $data2['username'];
                                            $query = "SELECT * FROM tbl_register WHERE username = '$seller'";
                                            $result = mysqli_query($connection, $query);
                                            $row = mysqli_fetch_array($result);
                                            $id = $row['id'];

                                            $query1 = "SELECT * FROM tbl_buy WHERE seller_id=$id";
                                            $result1 = mysqli_query($connection, $query1);
                                            $rowcount = mysqli_num_rows($result1);



                                            for ($i = 1; $i <= $rowcount; $i++) {

                                                $row1 = mysqli_fetch_array($result1);

                                                $Cancel = "Cancel";
                                                $status = $row1['status'];
                                                $stocks= $row1['stocks'];
                                                $quantity = $row1['quantity'];;

                            
                                                 

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
                                                 $order= "<a href=s_order.php?userreceive=" . $row1['id'] . " class='confirm'>Receive</a>";


                                                 if ($status == 1) {
                                                    $action = "Confirmed";
                                                    $diable1 = ' <button class="btn btn-success disconfirm" disabled="">Confirmed</button>';
                                                    $disable1= ' <button class="btn btn-success disconfirm" disabled="">Confirmed</button>';
                                                 

                                                echo '  
                                            <tr style="font-size: small;">
                                            <td><input type="checkbox" name="choose[]" value=' . $row1["id"] . '></td>

                                              <td>'.$i.'</td>

                                              <form action="#" method="post">  
                                              
                                            <td>'.$row1["product_number"].'</td>   


                                            <td>' . '<center>

                                            <a class="userinfo" style= "color:sky blue; cursor: pointer;" data-toggle="modal" 
                                            data-target="#' . $row1['id'] . '">' . $row1["order_id"] . '</a></center>' . '</td> 

                                            <td><a href=s_buyer_profile.php?profilebuyer=' . $row1["buyer_id"] . '>' . $row1["buyer_name"] . '</a></td>  

                                            <td>' . $row1["order_time"] . '</td>  

                                            <td>' . '&#8369;' . $row1["total_price"] . '</td>

                                            <td>' . 'Cash on Delivery' . '</td>
            
                                            <td>' . $action . '</td>  

                                            <form action="#" method="post">

                                            <td><center>'.$disable1.'</center></td>
                 
              

                                            <td><center>' . $order . '</center></td> 
                                             </form> 
                                            </tr> 
                                        

                                            ';
                                                }elseif ($status == 3) {
                                                     $action = "Delivered ";
                                                    $diable1 = ' <button class="btn btn-success discancel" disabled="">Delivered <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
                                                    $order= ' <button class="btn btn-success discancel" disabled="">Delivered <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
                                                    $disable1=' <button class="btn btn-success discancel" disabled="">Delivered <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
                                                    
                                                     echo '  
                                            <tr style="font-size: small;">
                                            <td><input type="checkbox" name="choose[]" value=' . $row1["id"] . '></td>

                                              <td>'.$i.'</td>

                                              <form action="#" method="post">  
                                                 <td>'.$row1['product_number'] .'</td>   

                                                <td>' . '<center>

                                            <a class="userinfo" style= "color:sky blue; cursor: pointer;" data-toggle="modal" 
                                            data-target="#' . $row1['id'] . '">' . $row1["order_id"] . '</a></center>' . '</td> 


                                            <td><a href=s_buyer_profile.php?profilebuyer=' . $row1["buyer_id"] . '>' . $row1["buyer_name"] . '</a></td>  

                                            <td>' . $row1["order_time"] . '</td>  

                                            <td>' . '&#8369;' . $row1["total_price"] . '</td>

          

                                            <td>' . 'Cash on Delivery' . '</td>
            
                                            <td>' . $action . '</td>  

                                            <form action="#" method="post">

                                            <td><center>'.$disable1.'</center></td>
                 
              

                                            <td><center>' . $order . '</center></td> 
                                             </form> 
                                            </tr> 
                                        

                                            ';
                                                }  

                                            }
                                         ?>

                                            


                                            

                                        </table>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default" name="deleteorders" style="outline: none;"><i class="fa fa-trash fw-fa"></i> Delete Selected</button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- /#wrapper -->

    <!-- MODAL PART -->

   <?php
        $connection = mysqli_connect('localhost', 'root', '', 'pick_a_plant');
        $seller = $data2['username'];
        $query = "SELECT * FROM tbl_register WHERE username = '$seller'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
        $id = $row['id'];

        $query1 = "SELECT * FROM tbl_buy WHERE seller_id=$id";
        $result1 = mysqli_query($connection, $query1);
        $rowcount = mysqli_num_rows($result1);



        for ($i = 1; $i <= $rowcount; $i++) {

            $row1 = mysqli_fetch_array($result1);

            $Cancel = "Cancel";
            $status = $row1['status'];

                                    

            if ($status == 0) {
                $action = "Pending";
                $diable1 =
                    "<a href=s_order.php?userID=" . $row1['id'] . " class='cancel'>Cancel</a>" . " " .
                    "<a href=s_order.php?userIDD=" . $row1['id'] . " class='confirm'>Confirm</a>";
            }
            if ($status == 1) {
                $action = "Confirmed";
                $diable1 = ' <button class="btn btn-success disconfirm" disabled="">Confirmed</button>';
            }
       

        ?>


<!-- START MODAL-->
<!-- css for table in modal -->
<style type="text/css">
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: auto;
  overflow: auto;
  
}


td.b{
  width: 30px;
  overflow: auto;

}

</style>

<div class="modal fade" role="dialog" id="<?php echo $row1['id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Product Information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>Name: </b><?php echo $row1['buyer_name']?></h5>
            </div>

            <div class="col-sm-6">
                <h5><b>Address: </b><?php echo $row1['address_deliver']?></h5>
            </div>

             <div class="col-sm-6">
                <h5><b>Phone Number: </b><?php echo $row1['phone_number']?></h5>
            </div>
            
        </div>
    
    </div>
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
      <tr>
        <td><img width="70" class="img-portfolio" height="auto" alt="" src="<?php echo $row1['photo'] ?>"></td>
        <td class="b"><?php echo $row1['description']; ?></td>
        <td><?php echo $row1['price']; ?></td>
        <td><?php echo $row1['quantity']; ?> </td>
        <td><?php echo $row1['total_price']; ?></td>
        <td><?php echo $action ; ?> </td>
      </tr>


    </tbody>

  </table>
<div style="display: inline-block;">
    <h5><b>Ordered Date:</b> <?php echo $row1['order_time']; ?></h5>
    <h5><b>Payment Method:</b> Cash on Delivery</h5>
</div>
<div style="display: inline-block; float: right; margin-right: 10px;">
    <h5><b>Total Price:</b> <?php echo $row1['total_price'] ?> </h5>
   
</div>


  </div>



      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

 
  </div>
</div>
    </div>


 <?php
 }
?>














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
    <script>
        $(document).ready(function() {
            $('#employee_data').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#superadmin').DataTable();
        });
    </script>

    <script type="text/javascript">
        function confirmationDelete(anchor) {
            var conf = confirm("Are you sure you want to delete the record?");
            if (conf)
                window.location = anchor.attr("href");
        }
    </script>

    <script type="text/javascript">
        function cancelorder(anchor) {
            var conf = confirm("Are you sure you want to cancel this order?");
            if (conf)
                window.location = anchor.attr("href");
        }

        function confirmorder(anchor) {
            var conf = confirm("Are you sure you want to confirm this order?");
            if (conf)
                window.location = anchor.attr("href");
        }
    </script>






</body>

</html>
<?php include('sa_server.php'); ?>
<?php include('sa_login_server.php'); 

 if (isset($_SESSION['username'])) {

   $login=$_SESSION['username'];
   $data="SELECT * FROM tbl_superadmin WHERE username='$login'";

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
$query = "SELECT * FROM tbl_contact ORDER BY id DESC";
$result = mysqli_query($connection, $query);
 ?>

 

 <?php
$query = "SELECT *,count(*) FROM tbl_reportbuyer GROUP BY buyer_name";
$result1 = mysqli_query($connection, $query);
 ?>


 <?php
$query = "SELECT *,count(*) FROM tbl_reportbuyer GROUP BY buyer_name";
$result11 = mysqli_query($connection, $query);
 ?>


 <?php
$query = "SELECT *,count(*) FROM tbl_reportbuyer GROUP BY buyer_name";
$result12 = mysqli_query($connection, $query);
 ?>

      
 <?php
$query = "SELECT * FROM tbl_report ";
$result2 = mysqli_query($connection, $query);
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

        <title>Pick A Plants - Reports</title>

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
         .btn-sm{
            border-radius: 0px;
            height: auto;
        }
        #below{
          color: black;
        }
        #warning{
            color: red;
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
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i><?php
                                    //display username from db
                                echo $data2['username'];
                                ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="sa_profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="sa_logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                                <a href="sa_dictionary.php"  style="color: #64ca87;"><i class="fa fa-book" aria-hidden="true"></i> Dictionary</a>
                            </li>
                            <li>
                                <a href="sa_products.php" style="color: #64ca87;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Products</a>
                            </li>
                            
                             <li>
                                <a href="sa_categories.php" style="color: #64ca87;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp; Categories</a>
                            </li>

                            <li>
                                <a href="sa_accounts.php"  style="color: #64ca87;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; User Accounts</a>
                            </li>
                            <li>
                                <a href="sa_concern.php" style="color: #64ca87;"><i class="fa fa-comments" aria-hidden="true"></i></i>&nbsp; 
                                User Concerns 
                            </a>
                            </li>


                            <li>
                                <a href="sa_concern_seller.php" class="active"  style="color: #64ca87;"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Seller Concerns</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

             <div id="page-wrapper">
                <div class="container-fluid">
                    
        
                          
                    



                      <div class="row">
                        <div class="col-lg-12">
                          <h1 class="page-header">Seller Reports</h1>
                           <nav aria-label="breadcrumb" style="margin-top: 0px;">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a href="sa_concern_seller.php"><u>Home</u></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="sa_seller_warning.php">Warning Accounts <small>
                                    <span class="badge badge-primary" style="background-color: #64ca87;"> 
                                     <?php
                                        $con=mysqli_connect('localhost','root','','pick_a_plant');
                                        $sql="SELECT count(*) AS total FROM tbl_register WHERE status3='1' and u_type='Buyer'";
                                       
                                        $resulttt=mysqli_query($con,$sql);
                                        $values=mysqli_fetch_assoc($resulttt);
                                        $num_rows=$values['total'];

                                        echo "<small>",$num_rows,"</small>";
                                    ?>

                    
                                </span></small> 
                                <li class="breadcrumb-item active" aria-current="page"><a href="sa_seller_ban.php">Banned Accounts  

                                    <small>
                                    <span class="badge badge-primary" style="background-color: #64ca87;"> 
                                     <?php
                                        $con=mysqli_connect('localhost','root','','pick_a_plant');
                                        $sql="SELECT count(*) AS total FROM tbl_register WHERE status='1'  and u_type='Buyer' ";
                                       
                                        $resultt=mysqli_query($con,$sql);
                                        $values=mysqli_fetch_assoc($resultt);
                                        $num_rows=$values['total'];

                                        echo "<small>",$num_rows,"</small>";
                                    ?>

                    
                                </span></small></a></li>
                            </ol>


                        </nav>
                            <div class="panel panel-default">

                                <div class="panel-heading" style="background-color: #00A4EF;">
                                   <strong> Reports </strong>
                                </div>
                                <!-- /.panel-heading -->
                                 <form action="sa_server.php" method="post">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                <table id="superadmin" class="table table-striped table-bordered">  
                                          <thead>  
                                               <tr>  
                                                    
                                                    <td style="width: 100px"><b>Customer</b></td>  
                                                    <td><b>Number of Reports</b></td>  
                                                    <td style="width: 50px"><b>Issue</b></td>
                                                    <td style="width: 50px"><b>Account</b></td>
                                                     
                                               </tr>  
                                          </thead>  
                                  <?php  
                                  while($row = mysqli_fetch_array($result1))  

                                  { 

                                


                                      $reaches=$row["count(*)"];
                                      $below = "below";
                                        if ($reaches  < 15) {
                                              $notif= '<strong id="'.$below.'">'.$row["count(*)"] .'</strong> ';
                                              $strStatus='<a href=sa_concern_sellerprof.php?reportview='.$row["buyer_id"].'>
                                            <center><button type="button" class="btn btn-danger btn-sm" style="outline:none;">
                                            View</button></center></a>';

                                            $warning='<a  onclick="javascript:confirmwarning($(this));return false;" href=sa_concern.php?warning='.$row['id'].'>
                                            <center><button type="button" class="btn btn-danger btn-sm" style="outline:none;">
                                            Warning</button></center></a>';

                                    echo '  
                                        <tr>  
                                              
                                            <td>'.$row["buyer_name"].'</td> 
                                            <td>'. $notif.'</td> 
                                            <td>
                                             <a href=sa_concern_sellerview.php?concernview='.$row["buyer_id"].'>
                                            <center><button type="button" class="btn btn-primary btn-sm" style="outline:none;">
                                            View</button></center></a></td>

                                            <td>'.$strStatus.'</td>
                                        </tr>  
                                            ';    
                                        }




 
                                  

                                  ?>  

<!-- MODAL FOR REPORT VIEWING -->
 <div class="modal fade" role="dialog" id="<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title">Plant Information</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
     
                <div class="modal-body">

                  <h2><?php echo $row['seller_name']; ?></h2>
                   <h2><?php echo $row['reason']; ?>

               
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="outline: none;">Close</button>
                </div>
                <!--MODAL FOOTER-->
            </div>
        </div>
    </div>

    <?php
  }
  ?>
                                     </table> 
                            
                                      </form>
                                    </div>
                                </div>
                            </div>
                          
                <!-- WARNING ACCOUNT-->
                <!-- WARNING ACCOUNT-->
                <!-- WARNING ACCOUNT-->
                <!-- WARNING ACCOUNT-->
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <div class="panel-heading" style="background-color: #7FBA00;">
                                    <strong>Warning Accounts</strong>
                                </div>
                                <!-- /.panel-heading -->
                                 <form action="sa_server.php" method="post">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                <table id="warningtable" class="table table-striped table-bordered">  
                                          <thead>  
                                               <tr>  
                                                    
                                                    <td style="width: 100px"><b>Customer</b></td>  
                                                    <td><b>Number of Reports</b></td>  
                                                    <td style="width: 50px"><b>Issue</b></td>
                                                    <td style="width: 50px"><b>Account</b></td>
                                                     
                                               </tr>  
                                          </thead>  
                                  <?php  
                                  while($row = mysqli_fetch_array($result11))  

                                  { 

                               


                                      $reaches=$row["count(*)"];
                                       $warning = "warning";
                                        if ($reaches  >= 15 and $reaches < 20) {
                                              $notif= '<strong id ="'.$warning.'">'.$row["count(*)"] .'</strong>'.'<small><strong id ="'.$warning.'"> (Warning) </strong></small>';
                                              $strStatus='<a href=sa_concern_sellerprof.php?reportview='.$row["buyer_id"].'>
                                            <center><button type="button" class="btn btn-danger btn-sm" style="outline:none;">
                                            View</button></center></a>';

                                            $warning='<a  onclick="javascript:confirmwarning($(this));return false;" href=sa_concern.php?warning='.$row['id'].'>
                                            <center><button type="button" class="btn btn-danger btn-sm" style="outline:none;">
                                            Warning</button></center></a>';

                                    echo '  
                                        <tr>  
                                              
                                            <td>'.$row["buyer_name"].'</td> 
                                            <td>'. $notif.'</td> 
                                            <td>
                                             <a href=sa_concern_sellerview.php?concernview='.$row["buyer_id"].'>
                                            <center><button type="button" class="btn btn-primary btn-sm" style="outline:none;">
                                            View</button></center></a></td>

                                            <td>'.$strStatus.'</td>
                                        </tr>  
                                            ';    
                                        }




 
                                  

                                  ?>  

<!-- MODAL FOR REPORT VIEWING -->
 <div class="modal fade" role="dialog" id="<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title">Plant Information</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
     
                <div class="modal-body">

                  <h2><?php echo $row['seller_name']; ?></h2>
                   <h2><?php echo $row['reason']; ?>

               
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="outline: none;">Close</button>
                </div>
                <!--MODAL FOOTER-->
            </div>
        </div>
    </div>

    <?php
  }
  ?>
                                     </table> 
                            
                                      </form>
                                    </div>
                                </div>
                            </div>


                <!-- NEED TO BANNED ACCOUNT-->
                <!-- NEED TO BANNED ACCOUNT-->
                <!-- NEED TO BANNED ACCOUNT-->
                <!-- NEED TO BANNED ACCOUNT-->
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <div class="panel-heading" style="background-color: #F25022;">
                                   <strong>Need to Ban Account</strong>
                                </div>
                                <!-- /.panel-heading -->
                                 <form action="sa_server.php" method="post">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                <table id="banned" class="table table-striped table-bordered">  
                                          <thead>  
                                               <tr>  
                                                    
                                                    <td style="width: 100px"><b>Customer</b></td>  
                                                    <td><b>Number of Reports</b></td>  
                                                    <td style="width: 50px"><b>Issue</b></td>
                                                    <td style="width: 50px"><b>Account</b></td>
                                                     
                                               </tr>  
                                          </thead>  
                                  <?php  
                                  while($row = mysqli_fetch_array($result12))  

                                  { 

                               


                                      $reaches=$row["count(*)"];
                                        $warning = "warning";
                                        if ($reaches  >= 20) {
                                            $notif= '<strong id ="'.$warning.'">'.$row["count(*)"] .'</strong>'.'<small><strong id ="'.$warning.'"> (Need to Ban this Account) </strong></small>';
                                              $strStatus='<a href=sa_concern_report.php?reportview='.$row["buyer_id"].'>
                                            <center><button type="button" class="btn btn-danger btn-sm" style="outline:none;">
                                            View</button></center></a>';

                                            $warning='<a  onclick="javascript:confirmwarning($(this));return false;" href=sa_concern.php?warning='.$row['id'].'>
                                            <center><button type="button" class="btn btn-danger btn-sm" style="outline:none;">
                                            Warning</button></center></a>';

                                    echo '  
                                        <tr>  
                                              
                                            <td>'.$row["buyer_name"].'</td> 
                                            <td>'. $notif.'</td> 
                                            <td>
                                             <a href=sa_concern_sellerview.php?concernview='.$row["buyer_id"].'>
                                            <center><button type="button" class="btn btn-primary btn-sm" style="outline:none;">
                                            View</button></center></a></td>

                                            <td>'.$strStatus.'</td>
                                        </tr>  
                                            ';    
                                        }




 
                                  

                                  ?>  

<!-- MODAL FOR REPORT VIEWING -->
 <div class="modal fade" role="dialog" id="<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title">Plant Information</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
     
                <div class="modal-body">

                  <h2><?php echo $row['seller_name']; ?></h2>
                   <h2><?php echo $row['reason']; ?>

               
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="outline: none;">Close</button>
                </div>
                <!--MODAL FOOTER-->
            </div>
        </div>
    </div>

    <?php
  }
  ?>
                                     </table> 
                            
                                      </form>
                                    </div>
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
<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#superadmin').DataTable();  
 });  
 </script>

 <script>  
 $(document).ready(function(){  
      $('#warningtable').DataTable();  
 });  

  $(document).ready(function(){  
      $('#banned').DataTable();  
 });
 </script>



<script type="text/javascript">
    function confirmationDelete(anchor){
        var conf = confirm("Are you sure you want to delete the record?");
    if (conf)
        window.location=anchor.attr("href");
    }
</script>

<script type="text/javascript">
    function confirmationEdit(anchor){
        var conf = confirm("Are you sure you want to Edit this Record");
    if (conf)
        window.location=anchor.attr("href");
    }
       function confirmwarning(anchor) {
            var conf = confirm("Are you sure you want to give warning to this Account?");
            if (conf)
                window.location = anchor.attr("href");
        }
</script>

    </body>
</html>

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
$query = "SELECT * FROM tbl_register ORDER BY id DESC";
$result = mysqli_query($connection, $query);
 ?>

 <?php
$query1 = "SELECT * FROM tbl_superadmin ORDER BY id DESC";
$result1 = mysqli_query($connection, $query1);
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

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
                                <a href="sa_dictionary.php" style="color: #64ca87;"><i class="fa fa-book" aria-hidden="true"></i> Dictionary</a>
                            </li>
                            <li>
                                <a href="sa_products.php" style="color: #64ca87;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Products</a>
                            </li>

                            
                             <li>
                                <a href="sa_categories.php" style="color: #64ca87;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp; Categories</a>
                            </li>

                            <li>
                                <a href="sa_accounts.php" class="active" style="color: #64ca87;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; User Accounts</a>
                            </li>
                            <li>
                                <a href="sa_concern.php" style="color: #64ca87;"><i class="fa fa-comments" aria-hidden="true"></i></i>&nbsp; User Concerns</a>
                            </li>
                            <li>
                                <a href="sa_concern_seller.php" style="color: #64ca87;"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Seller Concerns</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                         

                            <h1 class="page-header">Accounts</h1>

                        </div>

                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">

                        <div class="col-lg-12">
                        <nav aria-label="breadcrumb" style="margin-top: 0px;">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a href="sa_accounts.php">Home</a></li>
                                 <li class="breadcrumb-item active" aria-current="page"><a href="sa_accounts_reportview.php"><u>Banned Accounts</u> <small>
                                    <span class="badge badge-primary" style="background-color: #64ca87;"> 
                                     <?php
                                        $con=mysqli_connect('localhost','root','','pick_a_plant');
                                        $sql="SELECT count(*) AS total FROM tbl_register WHERE status='1'";
                                       
                                        $resultt=mysqli_query($con,$sql);
                                        $values=mysqli_fetch_assoc($resultt);
                                        $num_rows=$values['total'];

                                        echo "<small>",$num_rows,"</small>";
                                    ?>

                    
                                </span></small></a></li>
                            </ol>
                        </nav>

                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    Registered Accounts

                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                <table id="employee_data" class="table table-striped table-bordered">  
                                          <thead>  
                                               <tr>  
                                                    <td><b>Firstname</b></td>  
                                                    <td><b>Lastname</b></td>  
                                                    <td><b>Username</b></td>  
                                                    <td><b>Address</b></td>  
                                                    <td><b>Email</b></td>  
                                                    <td><b>Usertype</b></td>
                                                    <td><b>Status</b></td>   
                                                
                                                     
                                               </tr>  
                                          </thead>  
                                  <?php  
                                  while($row = mysqli_fetch_array($result))  

                                  { 
                                        $status=$row['status'];



                                        if ($status == 0) $strStatus=
                                            '<a  onclick="javascript:confirmorder($(this));return false;" href=sa_accounts.php?userID='.$row['id'].'>Deactivate User</a>'; 
                                        if ($status == 1) $strStatus='<a onclick="javascript:confirmactive($(this));return false;" href=sa_accounts.php?userIDD='.$row['id'].'>Activate User</a>'; 
                                            
                                        if ($status == 1) {
                                              
                                       echo '  
                                        
                                       <tr>  
                                        <form method="sa_server.php">

                                            <input type="hidden" name="id" value="'.$row['id'].'">
                                            <td>'.$row["firstname"].'</td> 
                                            <td>'.$row["lastname"].'</td>
                                            <td>'.$row["username"].'</td>  
                                            <td>'.$row["address"].'</td>  
                                            <td>'.$row["email"].'</td>
                                            <td>'.$row["u_type"].'</td>  
                                            <td>'.$strStatus.'</td>
                                       </tr>
                                        </form>  
                                       ';  

                                        }

                                  }  
                                  ?>  


                          
                                     </table> 
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                        
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

 <script type="text/javascript">
       function confirmationDelete(anchor){
            var conf = confirm("Are you sure you want to delete the record?");
                if (conf)
                    window.location=anchor.attr("href");
       }

        function confirmorder(anchor) {
            var conf = confirm("Are you sure you want to Deactivate this Account?");
            if (conf)
                window.location = anchor.attr("href");
        }

        function confirmactive(anchor) {
            var conf = confirm("Are you sure you want to Activate this Account?");
            if (conf)
                window.location = anchor.attr("href");
        }
</script>

    </body>
</html>

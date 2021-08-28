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
                                <a href="sa_concern.php" class="active" style="color: #64ca87;"><i class="fa fa-comments" aria-hidden="true"></i></i>&nbsp; User Concerns</a>
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

                        <nav aria-label="breadcrumb" style="margin-top: 40px;">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a href="sa_concern.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View reports</li>
                            </ol>
                        </nav>

                            <h1 class="page-header">Reports</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
     
                  
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Report Details
                                </div>
                                <!-- /.panel-heading -->
                                 <form action="sa_server.php" method="post">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                <table id="superadmin" class="table table-striped table-bordered">  
                                          <thead>  
                                               <tr>  
                                                    <td style="width: 10px"><b>#</b></td>
                                                    <td style="width: 110px"><strong>Reporter</strong></td>  
                                                    <td><b>Reason</b></td>  
                                                    <td style="width: 150px"><b>Reported Time</b></td>
                                                     
                                               </tr>  
                                          </thead>  
                                  <?php  
                                    if (isset($_GET['concernview'])) {

                                    $id = $_GET['concernview'];
                                    $query = "SELECT * FROM tbl_report WHERE  seller_id='$id'";
                                    $query_run = mysqli_query($connection, $query);


                                    while($row = mysqli_fetch_array($query_run))  

                                  { 
                                               
                                                

                                       echo '  
                                       <tr>  
                                            <td><input type="checkbox" name="choose[]" value='.$row["id"].'></td>    
                                            <td>'.$row["name"].'</td>  
                                            <td>'.$row["reason"].'</td> 
                                            <td>'.$row["reported_time"].'</td> 
                                            
                                       </tr>  
                                       ';  
                                  } 
                                  } 
                                  ?>  


                          
                                     </table> 
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-default" name="deletereport" style="outline: none;"><i class="fa fa-trash fw-fa"></i> Delete Selected</button>
                                      </div>
                                      
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
</script>

    </body>
</html>

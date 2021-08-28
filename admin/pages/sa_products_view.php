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
                                <a href="sa_products.php" class="active" style="color: #64ca87;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Products</a>
                            </li>
                            
                             <li>
                                <a href="sa_categories.php" style="color: #64ca87;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp; Categories</a>
                            </li>

                            <li>
                                <a href="sa_accounts.php"  style="color: #64ca87;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; User Accounts</a>
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

                        <nav aria-label="breadcrumb" style="margin-top: 40px;">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><a href="sa_products.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View products</li>
                            </ol>
                        </nav>

                            <h1 class="page-header"><?php ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
     
                  
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Product Details
                                </div>
                                <!-- /.panel-heading -->
                                 <form action="sa_server.php" method="post">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                <table id="superadmin" class="table table-striped table-bordered">  
                                          <thead>  
                                               <tr>  
                                                   
                                                    <td style="width: 110px"><strong>Category</strong></td>  
                                                    <td style="width: 110px"><strong>Product ID</strong></td>
                                                    <td style="width: 110px"><b>Name of Plants</b></td>   
                                                    <td style="width: 30px;"><b>Location</b></td> 
                                                     <td style="width: 10px;"><b>Discount</b></td>  
                                                    <td style="width: 40px;"><b>Price</b></td>  
                                                    <td style="width: 100px;"><b>Discounted Price</b></td>  
                                                    <td style="width: 20px;"><b>stocks</b></td>
                                                    
                                                     
                                               </tr>  
                                          </thead>  
                                  <?php  
                                    if (isset($_GET['productview'])) {

                                    $id = $_GET['productview'];
                                    $query = "SELECT * FROM tbl_product WHERE  seller_id='$id'";
                                    $query_run = mysqli_query($connection, $query);


                                    while($row = mysqli_fetch_array($query_run))  

                                  { 
                                               
                                                    
                                         $discount=$row['sale'];
                                            if ($discount == null){
                                                $discount="";
                                            }
                                            if ($discount > 1) {
                                                $discount="&percnt;";
                                            }
                                       echo '  
                                       <tr>  
                                              
                                              
                                            <td>'.$row["category"].'</td> 
                                            <td>'.'<center>
                                            <a class="userinfo" style= "color:sky blue; cursor: pointer;" data-toggle="modal" 
                                            data-target="#'.$row['id'].'">'.$row["product_number"].'</a></center>'.'</td> 

                                            <td>'.$row["name"].'</td>  
                                            <td>'.$row["location"].'</td>  
                                            <td>'.$row["sale"].'&nbsp;'.$discount.'</td>
                                            <td>'.'&#8369;'.$row["price"].'</td>
                                            <td>'.'&#8369;'.$row["new_price"].'</td>
                                            <td>'.$row["stocks"].'</td>
                                            <form method="sa_edit_dictionary.php" method="post">  
                                            <input type="hidden" name="id" value="'.$row['id'].'">
                                            
                                            
                                             </form> 
                                            
                                            
                                       </tr>  
                                       ';  

                                       ?>
                                         <!-- START MODAL-->
    <div class="modal fade" role="dialog" id="<?php echo $row['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title">Product Information</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
     
                <div class="modal-body">

<form  method="POST" action="#">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-m-12">
                    <div class="col-md-8 responsive">
                          <img width="250" class="img-portfolio" height="300" alt="" src="../../seller/pages/<?php echo $row['photo']?>">
                    </div>
                </div>
                
            </div>
        </div>
    <div class="col-md-6">
              <input type="hidden" name="PROPRICE" value="">
              <input type="hidden" id="PROQTY" name="PROQTY" value="">

              <input type="hidden" name="PROID" value="<?php echo $row['id']?>">

              <h3>Category</h3><h4><?php echo $row['category']?></h4><hr>
                <p></p>
             <div class="d-inline-flex p-3"><strong>Product name:</strong>
              <span>  &nbsp;  &nbsp;<?php echo $row['name']; ?> </span>
            </div>

            <div class="d-inline-flex p-3"><strong>Description:</strong>
              <span>  &nbsp;  &nbsp;<?php echo $row['description']; ?> </span>
            </div>

             <div class="d-inline-flex p-3"><strong>Location:</strong>
              <span>  &nbsp;  &nbsp;<?php echo $row['location']; ?> </span>
            </div>

             <div class="d-inline-flex p-3"><strong>Discount:</strong>
              <span>  &nbsp;  &nbsp;<?php echo $row['sale']; ?>%</span>
            </div>

             <div class="d-inline-flex p-3"><strong>Discounted Price:</strong>
              <span>  &nbsp;  &nbsp; &#8369; <?php echo $row['new_price'];?> </span>
            </div>

            <div class="d-inline-flex p-3"><strong>Stocks:</strong>
              <span>  &nbsp;  &nbsp;<?php echo $row['stocks'];?> </span>
            </div>
            <hr>
    </div>
</div>

</form>
                </div>
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                <!--MODAL FOOTER-->
            </div>
        </div>
    </div>
    <?php
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

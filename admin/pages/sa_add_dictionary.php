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
$query = "SELECT * FROM dictionary ORDER BY id DESC";
$result = mysqli_query($connection, $query);
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

        <title>Pick A Plants - Dictionary</title>

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
                                <a href="sa_dictionary.php" class="active" style="color: #64ca87;"><i class="fa fa-book" aria-hidden="true"></i> Dictionary</a>
                            </li>
                            <li>
                                <a href="#" style="color: #64ca87;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Products</a>
                            </li>

                              
                             <li>
                                <a href="sa_categories.php" style="color: #64ca87;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp; Categories</a>
                            </li>

                            <li>
                                <a href="sa_accounts.php" style="color: #64ca87;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; User Accounts</a>
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
                                <li class="breadcrumb-item active" aria-current="page"><a href="sa_dictionary.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add</li>
                            </ol>
                        </nav>     
                            <h1 class="page-header">Add New Dictionary</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                
    <form method="post" class="form-horizontal span6" name="plant_form" enctype="multipart/form-data" action="sa_server.php">
        <div class="row">
          <!-- /.col-lg-12 -->
       </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label">Scientific Name:</label>
                      <div class="col-md-8">
                        <input class="form-control input-sm" name="scientific_name" placeholder="Scientific Name" type="text" value="">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label">Common Name:</label>
                      <div class="col-md-8">
                        <input class="form-control input-sm" name="common_name" placeholder="Common Name" type="text" value="">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label">Plant Type:</label>

                      <div class="col-md-3">
                         <input class="form-control input-sm"  name="plant_type" placeholder="Plant Type" type="text" value=""  step="any">
                      </div>

                       <label class="col-md-2 control-label">Family:</label>

                      <div class="col-md-3">
                         <input class="form-control input-sm"  step="any" name="family" placeholder="Family" type="text" value="">
                      </div>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label">Region of Origin:</label>
                      <div class="col-md-8">
                        <input class="form-control input-sm" name="region" placeholder="Region of Origin" type="text" value="">
                      </div>
                    </div>
                  </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "meaning">Description:</label>

                      <div class="col-md-8"> 
                      <textarea class="form-control input-sm" id="meaning" name="description" cols="1" rows="3" ></textarea>
                      </div>
                    </div>
                  </div>



                    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "trivia">Trivia:</label>

                      <div class="col-md-8"> 
                      <textarea class="form-control input-sm" id="trivia" name="trivia" cols="1" rows="3" ></textarea>
                      </div>
                    </div>
                  </div>

  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" align = "right"for=
                      "file">Upload Image:</label>

                      <div class="col-md-8">
                      <input type="file" name="file" value="" id="file"/>
                      </div>
                    </div>
                  </div>
            
                <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="add_plants" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
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

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
        .Cus-info {
  max-width: 100%;
  /*float: left;*/
  margin-bottom: 20px;
  background-color: #f5f5f5;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
          box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
 }
.Cus-info .header {
  padding-bottom: 9px;
  margin: 20px 6px 20px;
  border-bottom: 1px solid #eeeeee;
  font-size: 30px; 
  font-weight: bold; 
  font-variant: small-caps;
  font-family: arial black;
 
  /*background-color: lightblue;*/
  }
 
.Cus-info p {
    border-bottom: solid 1px gray;
    width:100%;
    font-style: bold 1px;
    color: lightgray ;
    background-color: gray;
    /*line-height: 10px;*/

}

.Cus-info label {
 /* background-color: gray;
  width: 100%;*/
  font-size: 17px;
  font-weight: bold;  

} 
.Cus-info label:hover {
  text-transform: uppercase;
  outline-color: blue;

  /*color:white;*/
  }

  .Cus-info .pic > img {
    height: 100px;
  }

  .Cus-info .Stretch > img {
    width: 100px;
    height: 100px; 

  }
  span{
    color: white;
    text-decoration: none;
  }


@media (min-width: 768px) {
  .Cus-info {
    position: inherit;
    padding: 0;
    margin: 0;
    vertical-align: center;
  }
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



                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
        
                    <?php  
                                    if (isset($_GET['reportview'])) {

                                    $id = $_GET['reportview'];
                                    $query = "SELECT * FROM tbl_register WHERE id='$id'";
                                    $query_run = mysqli_query($connection, $query);


                                    while($row = mysqli_fetch_array($query_run))  

                                  { 
                                       $status=$row['status'];
                                       $status3=$row['status3'];
                                        if ($status == 0) $strStatus=
                                            '<a onclick="javascript:confirmreport($(this));return false;" href=sa_accounts.php?userdeac='.$row['id'].' >
                                            <span>Deactivate User</span></a>'; 
                                        if ($status == 1) $strStatus=
                                            '<a onclick="javascript:confirmact($(this));return false;" href=sa_accounts.php?useract='.$row['id'].' >
                                        <span>Activate User</span></a>'; 


                                         if ($status3 == 0) $strStatus3=
                                            '<a onclick="javascript:warning($(this));return false;" href=sa_accounts.php?warning='.$row['id'].' >
                                            <span>Warning Account</span></a>'; 
                                        if ($status3 == 1) $strStatus3=
                                            '<a onclick="javascript:removewarning($(this));return false;" href=sa_accounts.php?removewarning='.$row['id'].' >
                                        <span>Remove Warning Account</span></a>'; 


                                                  
                                        if ($status == 0)
                                        {
                                            $statusIden="<span style='color: orange;'><strong>Active Account</strong></span>";
                                        }
                                        else{
                                            $statusIden="<span style='color: red;'><strong>Banned</strong> <small><i class='fa fa-times fa-sm'></i></small></span>";
                                        }  

                                         if ($status3 == 1)
                                        {
                                            $statuswarning="<i style='color: orange;' class='fa fa-exclamation-triangle'></i> "."<span style='color: red;'><strong>Warning Account</strong></span>";
                                        }
                                        else{
                                          $statuswarning="";
                                        }
     

                                       echo '  
                                     
<div class="col-md-12 Cus-info">
 <div class="header"  style="display: inline-block;">Seller Information</div>
<div  style="display: inline-block;">/ '.$statusIden.'</div>
<div  style="display: inline-block;">/ '.$statuswarning.'</div>
 <form class="form-horizontal span6" action="sa_server.php?action=edit" method="POST">

          <fieldset>

                   
          
                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_NAME">Firstname:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" name="name" placeholder=
                            "Firstname" type="text" readonly value="'.$row['firstname'].'">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_USERNAME">Lastname:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" name="username" placeholder=
                            "Lastname" type="text" readonly value="'.$row['lastname'].'">
                      </div>
                    </div>
                  </div>

                    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_USERNAME">Username:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" name="username" placeholder=
                            "Username" type="text" readonly value="'.$row['username'].'">
                      </div>
                    </div>
                  </div>

                    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_USERNAME">Address:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" name="username" placeholder=
                            "Address" type="text" readonly value="'.$row['address'].'">
                      </div>
                    </div>
                  </div>

                    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "U_USERNAME">Phone Number:</label>

                      <div class="col-md-8">
                        <input name="deptid" type="hidden" value="">
                         <input class="form-control input-sm" name="username" placeholder=
                            "Phone Number" type="text"  readonly value="'.$row['phoneno'].'">
                      </div>
                    </div>
                  </div>




              
          </fieldset> 


        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   
                       <div class="col-md-12">
           <button type="button" class="btn btn-danger"  style="outline:none;border-radius: 0; float:right">'.$strStatus.'</button> 
           <button type="button" class="btn btn-primary"  style="outline:none;border-radius: 0; float:right">'.$strStatus3.'</button>
     
    </div>
                   </div>
                  
              </div>
              </div>
          

        </form>



 
     
  </div>
</div>     
                                       ';  
                                  } 
                                  } 
                                  ?> 

                     

                          
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
    function confirmact(anchor){
        var conf = confirm("Are you sure you want to Activate this Account?");
    if (conf)
        window.location=anchor.attr("href");
    }
</script>

<script type="text/javascript">
    function warning(anchor){
        var conf = confirm("Are you sure you want to give warning to this Account?");
    if (conf)
        window.location=anchor.attr("href");
    }
</script>

<script type="text/javascript">
    function removewarning(anchor){
        var conf = confirm("Are you sure you want to remove warning to this Account?");
    if (conf)
        window.location=anchor.attr("href");
    }
</script>



<script type="text/javascript">
    function confirmreport(anchor){
        var conf = confirm("Are you sure you want to Deactivate this Account");
    if (conf)
        window.location=anchor.attr("href");
    }
</script>

    </body>
</html>

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
              <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                <a href="s_products.php" style="color: #64ca87;">
                  <i class="fa fa-leaf" aria-hidden="true"></i> Products</a>
                </li>
                <li>
                  <a href="s_order.php" class="active"  style="color: #64ca87;"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Orders  <small>
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
                    <a href="#" style="color: #64ca87;"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp; Settings</a>
                  </li>
                  <li>
                    <a href="#" style="color: #64ca87;"><i class="fa fa-comments" aria-hidden="true"></i></i>&nbsp; Messages</a>
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
                      <li class="breadcrumb-item active" aria-current="page"><a href="s_order.php">Order</a></li>

                      <?php 
                      if (isset($_GET['profilebuyerreport'])) {

                        $id = $_GET['profilebuyerreport'];
                        $query = "SELECT * FROM tbl_register WHERE  id='$id'";
                        $query_run = mysqli_query($connection, $query);


                        foreach ($query_run as $row) 
                        {
                          ?>
                          <?php
                          echo 
                          '<li class="breadcrumb-item active" aria-current="page"><a href="s_buyer_profile.php?profilebuyer='.$row['id'].'">Customer Details</a></li>'
                          ?>




                          <?php
                        }
                      }
                      ?>


                      <li class="breadcrumb-item active" aria-current="page">Customer Details</li>
                    </ol>
                  </nav>     
                  <style type="text/css"> 
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

@media (min-width: 768px) {
  .Cus-info {
    position: inherit;
    padding: 0;
    margin: 0;
    vertical-align: center;
  }
}
</style>

<?php 
if (isset($_GET['profilebuyerreport'])) {

  $id = $_GET['profilebuyerreport'];
  $query = "SELECT * FROM tbl_register WHERE  id='$id'";
  $query_run = mysqli_query($connection, $query);


  foreach ($query_run as $row) 
  {
    ?>


    <form class="form-horizontal span6" action="s_buyer_report.php" method="POST">

      <fieldset>
        <legend> Report Buyer</legend>


        <input type="hidden" name="buyerid" value="<?php  echo $row['id'];?>">

       
        <div class="form-group">
          <div class="col-md-8">
            

            <div class="col-md-3">
            
           </div>

           <label class="col-md-4 control-label" for="origin">Customer Name</label>

           <div class="col-md-4">
             <input class="form-control input-sm" id="origin" readonly=""  step="any" name="buyername" placeholder="Price" type="text" 
             value="<?php echo $row['username'] ?>">
           </div>
         </div>
       </div>

        <br>

<!-- REPORT CONTENT -->
<!-- REPORT CONTENT -->
<!-- REPORT CONTENT -->
<tr>
        <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label" >
               
            </label>

            <div class="col-md-8">
              <input type="checkbox" name="prodid[]" value="Prohibited Item">
              <input type="hidden" name="reason[]" value="Prohibited Item">Prohibited Item
            </div>

          </div>
        </div>
            <input type="hidden" name="sellername[]" value="<?php echo $data2['username']?>">
            <input type="hidden" name="buyer_id[]" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="buyername[]" value="<?php echo $row['username']?>">
</tr>

<tr>
        <div class="form-group">
          <div class="col-md-8">
           <label class="col-md-4 control-label" >
             
            </label>

            <div class="col-md-8">
              <input type="checkbox" name="prodid[]" value="Directing transaction outside Pick-a-Plant">
              <input type="hidden" name="reason[]" value="Directing transaction outside Pick-a-Plant">Directing transaction outside Pick-a-Plant
            </div>
          </div>
        </div>

            <input type="hidden" name="sellername[]" value="<?php echo $data2['username']?>">
            <input type="hidden" name="buyer_id[]" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="buyername[]" value="<?php echo $row['username']?>">
</tr>

<tr>
        <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label" >
             
            </label>

             <div class="col-md-8">
              <input type="checkbox" name="prodid[]" value="Offensive Chat Messages/Images">
              <input type="hidden" name="reason[]" value="Offensive Chat Messages/Images">Offensive Chat Messages/Images
            </div>
          </div>
        </div>

          <input type="hidden" name="sellername[]" value="<?php echo $data2['username']?>">
            <input type="hidden" name="buyer_id[]" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="buyername[]" value="<?php echo $row['username']?>">
</tr>

<tr>
        <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label" >
              
            </label>

             <div class="col-md-8">
              <input type="checkbox" name="prodid[]" value="Scam">
              <input type="hidden" name="reason[]" value="Scam">Scam
            </div>
          </div>
        </div>

          <input type="hidden" name="sellername[]" value="<?php echo $data2['username']?>">
            <input type="hidden" name="buyer_id[]" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="buyername[]" value="<?php echo $row['username']?>">
</tr>

<tr>
        <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label" >
             
            </label>

             <div class="col-md-8">
              <input type="checkbox" name="prodid[]" value="Counterfeit">
              <input type="hidden" name="reason[]" value="Counterfeit">Counterfeit
            </div>
          </div>
        </div>

          <input type="hidden" name="sellername[]" value="<?php echo $data2['username']?>">
            <input type="hidden" name="buyer_id[]" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="buyername[]" value="<?php echo $row['username']?>">
</tr>

<tr>
        <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label"></label>

            <div class="col-md-8">
              <input name="deptid" type="hidden" value="">
              <input class="form-control input-sm btn-primary" name="name"  type="button"  value="Others" data-toggle="modal" 
              data-target="#other">


            </div>
          </div>
        </div>
</tr>
        <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4" style="float: right;">
              <input name="deptid" type="hidden" value="">
              <button class="form-control input-sm btn-danger" name="report"><i class="fa fa-share-square-o" aria-hidden="true"></i> Submit</button>
            </div>
          </div>
        </div>

<!-- REPORT END -->
<!-- REPORT END -->
<!-- REPORT END -->
<!-- REPORT END -->

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


          </div>

        </div>
      </div>

    </form>  

<!-- modal part -->
<!-- modal part -->
<!-- modal part -->
<!-- modal part -->
<!-- modal part -->
<div class="modal fade" role="dialog" id="other">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title">Others</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
     
                <div class="modal-body">

<form  method="POST" action="s_server.php">
 <label style="font-weight: normal;">Please write the other issue. </label>
<textarea class="form-control" style="resize: none; height: 80px;" required="" name="others">
  
</textarea>
            <input type="hidden" name="buyerid" value="<?php echo $row['id']?>">
            <input type="hidden" name="sellername" value="<?php echo $data2['username']?>">
            <input type="hidden" name="buyer_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="buyername" value="<?php echo $row['username']?>">

<br>
 <button class="form-control input-sm btn-danger" name="reportothers"><i class="fa fa-share-square-o" aria-hidden="true"></i> Submit</button>
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






</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->











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

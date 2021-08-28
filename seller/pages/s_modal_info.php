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
$connection=mysqli_connect('localhost','root','','pick_a_plant');
$seller = $data2['username'];
$query="SELECT * FROM tbl_register WHERE username = '$seller'";
$result=mysqli_query($connection,$query);
// $row=mysqli_fetch_array($result);

// echo $row['id'];

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

<style type="text/css">

</style>

    </head>
    <body style="outline: none;">

<!-- START MODAL-->
    <div class="modal fade" role="dialog" id="empModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--MODAL HEADER-->
                <div class="modal-header">
                    <h3 class="modal-title">Product Information</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!--MODAL HEADER-->
                
                <!--MODAL BODY-->

         
<div class="modal-body">

       <form  method="POST" action="#">
        
        <div class="row">

            <div class="col-md-6">
            <div class="row">
                <div class="col-m-12">
                    <div class="col-md-8 responsive">
                          <img width="250" class="img-portfolio " height="200"   alt="">
               
                    </div>
                    </div>
                
            </div>
            
      
            </div>

     
            <div class="col-md-6">
              <input type="hidden" name="PROPRICE" value="">
              <input type="hidden" id="PROQTY" name="PROQTY" value="">

              <input type="text" name="PROID" value="<?php echo $row['name']?>">
             
                <p></p>
                
                <ul>
                   
                    <li>Type - Category</li>
                    <li>Price - &#8369 150 </li>
                    <li>Discount -  50% </li> 
                    <li>Discounted Price - &#8369 790 </li> 
                </ul>

                

                 <!-- <button  type="submit"  class="btn btn-primary btn-sm"  name="btnorder">Order Now!</button> -->
            </div>
</div>
<div class="row">
        <div class="col-md-12">
        <h3 class="page-header">Set Discount</h3>
        <div class="col-md-6">
 
             <div class="form-group">
                <label>Discount:</label>

                
                <div class="input-group">

                <input type="hidden" class="form-control " name="PROPRICE" id="PROPRICE" value=" ">
                <input type="hidden" class="form-control " name="PROID" id="PROID" value=" ">

              
                  <input type="input" class="form-control disper" name="PRODISCOUNT" id="PRODISCOUNT" placeHolder="0">

                  <div class="input-group-addon">
                    <i>%</i>
                  </div>
                </div>
                <!-- /.input group -->
              </div>

             
        </div>
          <div class="col-md-6">
             <div class="form-group">
                <label>Discounted Price:</label>

               
                <div class="input-group">
                  <div class="input-group-addon">
                    <i> &#8369 </i>
                  </div>
                  <input type="text"  class="form-control" name="PRODISPRICE" id="PRODISPRICE" placeHolder="0.0" readonly="true">
                </div>
                <!-- /.input group -->
              </div>
               
          </div>
         <div class="col-md-10">
             <div class="form-group">  
                  <input type="submit"  class="btn btn-sm btn-primary " name="submit"  value="Submit" > 
              </div>
               
          </div>
              
        </div>
         </div>
    
       
        <!-- /.row -->
</form>



                </div>
          
                <!--MODAL BODY-->



                <!--MODAL FOOTER-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                <!--MODAL FOOTER-->
                
            </div>
        </div>
    </div>



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
</body>
</html>

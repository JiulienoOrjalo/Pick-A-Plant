<?php include('b_server.php');
?>
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
    echo "<script>alert('You must login before viewing this page.'); location.href='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pick-A-Plant</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,500,500i">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/style/stylefooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="assets/ico/icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

    <style type="text/css">
        #list{
        }
        #up{
            color: gray;
        }
        #up:hover{
            color: #64ca87;
        }
        #wish{
            color: gray
        }
        #wish:hover{
            color: #64ca87; 
        }
             #count{
             border-radius: 40%;
            position: relative;
            top: -10px;
            left: -10px;
        }
  
    </style>

</head>

<body>

    <!-- Top menu -->
    <nav class="navbar navbar-inverse" role="navigation">
        <!-- style="background-color: #64ca87; -->
        <div class="container">
         
                <a class="navbar-brand" href="index.html"></a>
            
            <!-- Collect the nav links, forms, and other content for toggling -->



        </div>

    </nav>
<br>

<form method="post" action="b_server.php">
<?php

 while ($row=mysqli_fetch_array($rec)) {
    
?><br>
 <div class="container">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<input type="hidden" name="plant" value="<?php echo $row['name']; ?>">
<input type="hidden" name="profile" value="<?php echo $data2['profile']; ?>">


</div>
<div class="container">
  <div class="row">
  <div class="col-sm-6 " style="margin: 5px;">
    <input type="hidden" name="photo" value="<?php echo $row['photo']; ?>">
    <img id="myimage" src="seller/pages/<?php echo $row['photo'];?>" style="width: 60%; height: auto;">
 </div>

<div class="col-sm-5">
  <h2 style="float: left; position: absolute;"><?php echo $row['name']?></h2><br><hr>
 
 
  <small style="text-align: left; float: left;">R A T I N G S</small>
  <br>
  <div class="rateyo" id= "rating" style="height: 15px; margin-right: auto; margin-left: auto; display: block;  float: left;"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
  </div>
 <br>
<span class='result' style=" display: none; justify-content: center;">0</span>
 <input type="hidden" name="rating">
<br>
<div class="form-group text-left">

    <input type="text" class="form-control" name="user" style="border-radius: 0;" value="<?php echo $data2['username']?>" readonly >
    <br>
    <textarea name="exp" class="form-control" style="resize: none; height: 200px; border-radius: 0;" placeholder="Describe your Experience"></textarea>
    <br>

      <textarea name="com_time" hidden="">
              <?php 
              date_default_timezone_set('Asia/Manila');
              $current_time=date('h:i:s a m/d/Y');

              echo $current_time;
              ?>
       </textarea>

    <div class="row" style="margin: 0; padding: 0">
       <input type="submit" name="back" class=" btn btn-primary" value="BACK" style="outline: none; border-radius: 0">
       <input type="submit" name="postcomment"  class=" btn btn-success" value="POST" style="outline: none; border-radius: 0;">
    </div>
    
</div>
</div>
    


  </div>
</div>

<?php 
} 
?>
 
  </form>

    





    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="../js/dataTables/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
</script>


    <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>


</html>
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
  <link rel="shortcut icon" href="assets/ico/icon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,500,500i">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/style2.css">
     <script defer src="script.js"></script>
  <script src="script.js"></script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->



</head>

<body>

  <!-- Top menu -->
  <nav class="navbar navbar-inverse" role="navigation">
    <!-- style="background-color: #64ca87; -->
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../b_index.php"></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="top-navbar-1">
        <ul class="nav navbar-nav navbar-right navbar-search-button">

             <li class="dropdown"><a href="../b_profile.php"><img src="<?php
                                 if($data2['profile'] !== '') { 
                                    echo $data2['profile']; 
                                } else { 
                                    echo 'assets/ico/logo web.png';
                                }?>" class="img-radius" style="border-radius: 50%; width: 18px;" >
                            <span class="dropbtn"><?php
                                                    //display username from db
                                                    echo $data2['username'];
                                                    ?></span>
                        </a></li>

             <li class="notif">
                  
                        <a class="dropdown-toggle"  id="menu1" type="button" data-toggle="dropdown" style="cursor: pointer;"><i class="fa fa-bell" aria-hidden="true"></i>
                            <small><span class="badge" id="count"> 
                    <?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result5=mysqli_query($con,$query);
                    $row=mysqli_fetch_array($result5);
                    $id = $row['id'];



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='1'";
                    $result5=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result5);

                    $num_rows5=$values['total'];
                   



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='2'";
                    $result6=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result6);

                    $num_rows6=$values['total'];
                  

                    $totalnum=($num_rows5+$num_rows6);
                
                    echo "<small>",$totalnum,"</small>";



                ?></span></small>
                        </a>

                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                          <li role="presentation"><a href="../b_profile_confirmed.php" role="menuitem" tabindex="-1" href="#">
                           <center>Confirmed (<?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['id'];



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='1'";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);

                    $num_rows=$values['total'];
                    echo "<small>",$num_rows,"</small>"; 


                ?>)</center></a></li>
                          <li role="presentation"><a href="../b_profile_cancelled.php" role="menuitem" tabindex="-1" href="#">
                             <center>Cancelled (<?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['id'];



                    $sql="SELECT count(status) AS total FROM tbl_buy WHERE buyer_id=$id and status='2'";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);

                    $num_rows=$values['total'];
                    echo "<small>",$num_rows,"</small>"; 


                ?>)</center></a></li>
                        </ul>
                     
                </li>  
          <li><a href="../b_checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
            <small><span class="badge" id="count">
            <?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                     $connection=mysqli_connect('localhost','root','','pick_a_plant');
                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $result=mysqli_query($connection,$query);
                    $row=mysqli_fetch_array($result);
                    $id = $row['id'];


                    $sql="SELECT count(id) AS total FROM tbl_check WHERE buyer_id=$id";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values['total'];

                    echo "<small>",$num_rows,"</small>";
                ?></span></small></a>
                   <!--Chat feature part-->
                   <?php
                   $user = $data2['unique_id'];
                   $sql2="SELECT * FROM tbl_register WHERE not unique_id='$user' ORDER BY id DESC";
                   $find=mysqli_query($db,$sql2);
                   $data=mysqli_fetch_assoc($find);

                   ?>
                <li><a href="../chat/chat.php?user_id=<?php echo $data['unique_id']?>" id="message" onclick='changeStatus(<?php echo $data2['unique_id']?>)'><i class="fa fa-envelope" aria-hidden="true" style="color:#76EE00; "></i><small><span class="badge" id="count">
            <?php
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
                  <small id=''><?php echo $num_rows?></small></span></small></a>
               
<script>
    function changeStatus($id){
      
        $.ajax({
            
            url: "update.php",
            data: {id : $id},
            type: "POST",  
            
        });
    }
</script>
          <li class="dropdown"><a href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        </ul>

        <form class="navbar-form navbar-right navbar-search-form disabled wow fadeInLeft" role="form" action="" method="post">
          <div class="form-group">
            <input type="text" name="search" placeholder="Search..." class="search form-control">
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right navbar-menu-items wow fadeIn">
          <li><a href="../b_index.php">Home</a></li>
          <li><a href="../b_dictionary.php">Dictionary</a></li>
          <li><a href="../b_shop.php">Shop</a></li>

        </ul>
      </div>

    </div>
  </nav>
  <!-- Javascript -->
  <script src="assets/js/jquery-1.11.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.backstretch.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/scripts.js"></script>

  
</body>
</html>
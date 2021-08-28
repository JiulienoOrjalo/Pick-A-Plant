<?php include('b_server.php'); 
?>
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
   echo "<script>alert('You must login before viewing this page.'); location.href='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pick-A-Plant</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,500,500i">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">
          <link rel="stylesheet" href="assets/style/stylefooter.css">
             <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

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
       <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700;900&display=swap');

:root{
    --white-light: rgba(255, 255, 255, 0.5);
    --alice-blue: #f8f9fa;
    --carribean-green: #40c9a2;
    --gray: #ededed;
}


/* Utility stylings */


.sm-title{
    font-weight: 300;
    font-size: 15px;
    text-transform: uppercase;
    margin-left: 20px;
}
.text-light{
    font-size: 1rem;
    font-weight: 600;
    line-height: 1.5;
    opacity: 0.5;
    margin: 0.4rem 0;
}

/* product section */

.product{
    position: relative;
}

.product-content{
    background-color: white;
    padding: 15px;
    height: 390px;
    cursor: pointer;
}
.product-content:hover{
   box-shadow:2px 2px 12px rgba(47,47,47,0.40);
    transform:scale(1.02);
    transition:all ease 0.3s;

}

.product-img{
    background: var(--white-light);
    box-shadow: 0 0 20px 10px var(--white-light);
    width: 200px;
    height: 200px;
    margin: 0 auto;
    transition: background 0.5s ease;
}
.product-btns{
    outline: none;
    margin-top: 120px;
}
.btn-cart, .btn-buy{
    background: transparent;
    padding: 8px;
    width: 230px;
    font-family: inherit;
    text-transform: uppercase;
    cursor: pointer;
    border: none;
    transition: all 0.6s ease;
}
.btn-cart{
    background: black;
    color: white;
}
.btn-cart:hover{
    background: var(--carribean-green);
}
.btn-buy{
    background: #ff696e;
    color: #fff;
    outline: none;
}
.btn-buy:hover{
  color: white;
  background-color: #fe9048;
}

.product-info{
    background: white;

    height:120px;
    padding: 1rem;
}
.prices{
    background: white;
    height:60px;
    padding: 1rem;
    margin-bottom: 20px;
    color: black;
   
    font-weight: bold;
}
.product-info-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.rating span{
    color: #fe9048;
    letter-spacing: -5px;
}
.rating{
  margin-right: 5px;
}

.product-name{
    color: gray;
    display: block;
    text-decoration: none;
    font-size: 13px;
    text-align: center;
    text-transform: uppercase;
   font-weight: 600;
    line-height: normal;
}
.product-price{
    display: inline-block;
    position: relative;
    margin-top: 10px;
}
.product-price:first-of-type{
    text-decoration: line-through;
    color: var(--carribean-green);
}

.off-info .sm-title{
    background: var(--carribean-green);
    color: white;
    display: inline-block;
    position: absolute;
    top: 0;
    left: 0;
    writing-mode: vertical-lr;
    transform: rotate(180deg);
    z-index: 1;
    letter-spacing: 3px;
    cursor: pointer;
}

/* product collection */
.product-collection{
    padding: 3.2rem 0;
}
.product-collection-wrapper{
    padding: 3.2rem 0;
}
.product-col-left{
    background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3)), url("images/fashion-img-1.jpg") center/cover no-repeat;
}
.product-col-r-top{
    background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3)), url("images/fashion-img-2.png") center/cover no-repeat;
}
.flex{
    display: flex;
    justify-content: center;
    align-items: flex-end;
    height: 50vh;
    padding: 2rem 1.5rem 3.2rem;
    margin: 5px;
}

.product-col-content{
    text-align: center;
    color: white;
}
.product-collection .text-light{
    opacity: 1;
    font-size: 0.8;
    font-weight: 400;
    line-height: 1.7;
}
.btn-dark{
    background: black;
    color: white;
    outline: 0;
    border-radius: 25px;
    padding: 0.7rem 1rem;
    border: 0;
    margin-top: 1rem;
    cursor: pointer;
    transition: all 0.6s ease;
    font-size: 1rem;
    font-family: inherit;
}
.btn-dark:hover{
    background: var(--carribean-green);
}
 #count{
             border-radius: 40%;
            position: relative;
            top: -10px;
            left: -10px;
}




/* Media Queries */
@media screen and (min-width: 992px){
    .product-items{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
    .product-col-r-bottom{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
    .btn-cart, .btn-buy{
        width: 230px;
    }
      .product{
        margin-right: 1rem;
        margin-left: 1rem;
    }
}
@media screen and (min-width: 1200px){
    .product-items{
        grid-template-columns: repeat(3, 1fr);
    }
    .product{
        margin-right: 1rem;
        margin-left: 1rem;
    }
    .products .text-light{
        width: 50%;
    }
     .btn-cart, .btn-buy{
        width: 230px;
    }
}

@media screen and (min-width: 1336px){
    .product-items{
        grid-template-columns: repeat(4, 1fr);
    }
   
    .flex{
        height: 60vh;
    }
    .product-col-left{
        height: 121.5vh;
    }
     .btn-cart, .btn-buy{
        width: 230px;
    }
      .product{
        margin-right: 1rem;
        margin-left: 1rem;
    }
}

</style>


    </head>

    <body style="background-color: #f8f9fa;">
    
    <!-- Top menu -->
    <nav class="navbar navbar-inverse" role="navigation"  ><!-- style="background-color: #64ca87; -->
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="b_index.php"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="top-navbar-1">
          <ul class="nav navbar-nav navbar-right navbar-search-button">
            
                      <li class="dropdown"><a href="b_profile.php"><img src="<?php
                                 if($data2['profile'] !== '') { 
                                    echo 'profile/'.$data2['profile']; 
                                } else { 
                                    echo 'assets/ico/logo web.png';
                                }?>" class="img-radius" style="border-radius: 50%; width: 18px;" alt="User-Profile-Image">
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
                          <li role="presentation"><a href="b_profile_confirmed.php" role="menuitem" tabindex="-1" href="#">
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
                          <li role="presentation"><a href="b_profile_cancelled.php" role="menuitem" tabindex="-1" href="#">
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


                ?>)</center></a></li></ul>
                     
                </li>   
            <li><a href="b_checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i><samll><span class="badge" id="count">
             <?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $buyer = $data2['username'];
                    $query="SELECT * FROM tbl_register WHERE username = '$buyer'";
                    $resulttt=mysqli_query($con,$query);
                    $row=mysqli_fetch_array($resulttt);
                    $id = $row['id'];


                    $sql="SELECT count(id) AS total FROM tbl_check WHERE buyer_id=$id";
                    $resultt=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resultt);
                    $num_rows=$values['total'];

                    echo "<small>",$num_rows,"</small>";
                ?></span></samll></a>
<!--Chat feature part-->
                   <?php
                   $user = $data2['unique_id'];
                   $sql2="SELECT * FROM tbl_register WHERE not unique_id='$user' ORDER BY id DESC";
                   $find=mysqli_query($db,$sql2);
                   $data=mysqli_fetch_assoc($find);

                   ?>
                <li><a href="chat/chat.php?user_id=<?php echo $data['unique_id']?>" id="message" onclick='changeStatus(<?php echo $data2['unique_id']?>)'><i class="fa fa-envelope" aria-hidden="true" ></i><small><span class="badge" id="count">
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

          <li class="dropdown"><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
          </ul>
          <form class="navbar-form navbar-right navbar-search-form disabled wow fadeInLeft" role="form" action="" method="post">
          
          </form>
          <ul class="nav navbar-nav navbar-right navbar-menu-items wow fadeIn">
            <li><a href="b_index.php">Home</a></li>
            <li><a href="b_dictionary.php">Dictionary</a></li>
            <li style="background-color: #eaeae8"><a href="b_shop.php">Shop</a></li>

          </ul>
        </div>

      </div>
    </nav>

        <!-- Top content -->
        <div class="top-content">
            <div class="container">
              
                <div class="row">
                    <div class="col-sm-12 text wow fadeInLeft">
                    
                            <h1 style="color: black; font-size: 70px">Shop</h1>
                          <i class="fa fa-leaf" style="color: #64ca87;" ></i>
                              <p class="medium-paragraph" style="color: black">
                              The Gardening that matters
                            </p>
                            
                      
                    </div>
                </div>
                
            </div>
        </div>

          <!-- Style for search -->
               <style type="text/css">
                 #search{
                  margin-top: 15px; 
                  height: 40px; 
                  width: 90%; 
                  justify-content: center;
                  outline: none;
                  border: none;
                  border-bottom: 1px solid black;
                 }
                 #filter{
                    margin-top: 15px; 
                    height: 40px; 
                    width: 100%;
                    outline: none;
                  border: none;
                  border-bottom: 1px solid black;
                 }
                

               </style>

              <!-- END -->
              <style type="text/css">
            #search{
              outline: none;
              width: 85%;
              border-color: transparent;
            }
            #plant{
                background-color: #40c9a2;
            }

            #plant:hover{
                box-shadow:2px 2px 12px rgba(47,47,47,0.40);
            
            }
             #all:hover{
                box-shadow:2px 2px 12px rgba(47,47,47,0.40);
            }
             #seeds:hover{
                box-shadow:2px 2px 12px rgba(47,47,47,0.40);
            }
             #gardening:hover{
                box-shadow:2px 2px 12px rgba(47,47,47,0.40);
            }
            #firtelizer:hover{
                box-shadow:2px 2px 12px rgba(47,47,47,0.40);
            }

          </style>
            <div class="container" >
              <div class="row">

                <div class="col-sm-12">
                <form action=" " onsubmit="return false">
                    <i class="fa fa-search" aria-hidden="true"></i>&nbsp; &nbsp;<input type="text" id="search" placeholder="Search Plants...."  >
                </form>
                </div>
                
              </div>
            </div>
            <br>
             <div class="container" style="text-align: center;">
              <div class="row"  style="text-align: center;">
                <div class="col-sm-2" id="sale">
                    <a href="b_shop_sale.php"><input type="submit" name="" value="Sale" style="width: 100%; border: none; background-color: transparent;"></a>
                </div>
                 <div class="col-sm-2" id="all">
                   <a href="b_shop.php"><input type="submit" name="" value="All" style="width: 100%; border: none; background-color: transparent; "></a>
                </div>

                <div class="col-sm-2" id="plant">
                   <a href="b_shop_plants.php"><input type="submit" name="" value="Plant" style="width: 100%; border: none; background-color: transparent; color: white;"></a>
                </div>
                 <div class="col-sm-2" id="seeds">
                    <a href="b_shop_seeds.php"><input type="submit" name="" value="Seeds" style="width: 100%; border: none; background-color: transparent; "></a>
                </div>
                 <div class="col-sm-2" id="gardening">
                    <a href="b_shop_gardeningtools.php"><input type="submit" name="" value="Gardening tools" style="width: 100%; border: none; background-color: transparent; "></a>
                </div>
                 <div class="col-sm-2" id="firtelizer">
                   <a href="b_shop_fertilizer.php"><input type="submit" name="" value="Fertilizer" style="width: 100%; border: none; background-color: transparent;"></a>
                </div>
                <div class="col-sm-2" >
                  
                </div>
              </div>
            </div>


            <hr>

        <!-- Features -->
         <div class="features-container section-container">
          <div class="container">
            
                <div class = "product-items">
          <?php
                  $query = "SELECT * FROM tbl_product WHERE category = 'Plants' ORDER BY ratings DESC";
                  $query_run = mysqli_query($connection, $query);
                  $product = mysqli_num_rows($query_run) > 0;


                  if ($product) {
                    while ($row = mysqli_fetch_assoc($query_run)) 
                    {
                      

                      ?>
                   
                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                  <img src="seller/pages/<?php echo $row['photo'];?>">


                            </div>
                            <div class = "product-btns">
                                <a href="b_buy.php?buy=<?php echo $row['id']; ?>"><button type = "button" class = "btn-buy">buy now
                                    <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                </button></a>
                            </div>
                        </div>

                           <div class = "product-info">
                            <div class = "product-info-top">
                                <h2 class = "sm-title"><i class="fa fa-map-marker fa-xs" aria-hidden="true"></i> &nbsp;<?php echo $row['location']; ?></h2>
                                
                        <!--         <div class = "rating">
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "far fa-star fa-xs"></i></span>
                                </div> -->

                            </div>
                            
                            <a href = "#" class="product-name"><?php echo $row['name']; ?>
                                
                            </a>
                    

                        </div>

                          <div class = "rating">
                                  <strong><h4>
              <?php
             

              if ($row['id'] != null) {
                $product_id=$row['id'];              
              }
        

           
         
          $sql="SELECT count(one) AS total FROM tbl_comment WHERE product_id=$product_id and one=1";
                    $resultone=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resultone);
                    $num_rows1=$values['total'];

          $sql="SELECT count(two) AS total FROM tbl_comment WHERE product_id=$product_id and two=1";
                    $resulttwo=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resulttwo);
                    $num_rows2=$values['total'];
                    
          $sql="SELECT count(three) AS total FROM tbl_comment WHERE product_id=$product_id and three=1";
                    $resultthree=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resultthree);
                    $num_rows3=$values['total'];

          $sql="SELECT count(four) AS total FROM tbl_comment WHERE product_id=$product_id and four=1";
                    $resultfour=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resultfour);
                    $num_rows4=$values['total'];

          $sql="SELECT count(five) AS total FROM tbl_comment WHERE product_id=$product_id and five=1";
                    $resultfive=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($resultfive);
                    $num_rows5=$values['total'];


                    $totalrate=($num_rows1+$num_rows2+$num_rows3+$num_rows4+$num_rows5);

                    if ($totalrate==0) {
                        $totalrate = 1;
                    }


                  $add=(5*$num_rows5 + 4*$num_rows4 + 3*$num_rows3 + 2*$num_rows2 + 1*$num_rows1) / $totalrate;

                  $totaladd=round($add,1);

                


                   

                
                              if ($totaladd >= 2 && $totaladd <= 2.4) {
                                  echo '<div">
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold;"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         
                                        <div>';
                              }
                              elseif ($totaladd>= 2.4 && $totaladd <= 3.4) {
                                  echo '<div>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold;"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          
                                        <div>';
                              }
                              elseif ($totaladd>= 3.4 && $totaladd <= 4) {
                                  echo '<div>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold;"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                        <div>';
                              }

                               elseif ($totaladd >= 4 && $totaladd <= 5) {
                                  echo '<div>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold;"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>

                                        <div>';
                              }
                              elseif ($totaladd >= 1 && $totaladd <= 1.4) {
                                  echo '<div>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" style="color: gold"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true"></i>
                                          <i class="fa fa-star fa-sm" aria-hidden="true"></i>

                                        <div>';
                              }

                            

                              else{
                                 echo '<div>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                         <i class="fa fa-star fa-sm" aria-hidden="true" ></i>
                                        <div>';
                              }
                    
         ?>



            </h4></strong>
                            </div> 

                             <?php
                                if (!empty($row['sale'])) {

                                  
                            ?>
                              <div class="prices"> 
                            <p class = "product-price">&#8369; <?php echo $row['price']; ?></p> &nbsp;
                            <p class = "product-price">&#8369; <?php echo $row['new_price']; ?></p>
                            </div>
                            
                              <?php 
                                }

                              ?>

                              <?php
                                if (empty($row['sale'])) {

                            ?>
                              <div class="prices"> 
                            <p class = "product-price"></p> 
                            <p class = "product-price">&#8369; <?php echo $row['price']; ?></p>
                            </div>
                            
                              <?php 
                                }

                              ?>

                            <?php
                                if ($row['sale'] > 0) {
                                  
                            ?>
                             <div class = "off-info">
                               <h2 class = "sm-title" style="margin-top: 5px; padding-bottom: 5px;">&nbsp; <?php echo $row['sale']; ?>% off</h2>
                            </div>
                            
                              <?php 
                                }
                              ?>

                    </div>

                  
                                  
                      <?php

                    
                    }
                  }

                  else
                  {
                    echo "No Avaible plants";
                  }

                ?>
               
  </div>


<!--Function of Search -->
<script type="text/javascript">
  // SEARCH FILTER
const search = document.getElementById("search");
const productName = document.querySelectorAll(".product-info a");

// A BETTER WAY TO FILTER THROUGH THE PRODUCTS
search.addEventListener("keyup", filterProducts);


function filterProducts(e) {
    const text = e.target.value.toLowerCase();
    // console.log(productName[0]);
    productName.forEach(function(product) {
        const item = product.firstChild.textContent;
        if (item.toLowerCase().indexOf(text) != -1) {
            product.parentElement.parentElement.style.display = "block"
        } else {
            product.parentElement.parentElement.style.display = "none"
            
        }
    })
}
</script>
<!--END -->


<!--Function of Search -->
<script type="text/javascript">
  // SEARCH FILTER
const filter = document.getElementById("filter");
const filterlocation = document.querySelectorAll(".product-content a");

// A BETTER WAY TO FILTER THROUGH THE PRODUCTS
filter.addEventListener("keyup", locationfilter);


function locationfilter(e) {
    const loc = e.target.value.toLowerCase();
    // console.log(productName[0]);
    filterlocation.forEach(function(locationproduct) {
        const location = locationproduct.firstChild.textContent;
        if (location.toLowerCase().indexOf(loc) != -1) {
            locationproduct.parentElement.parentElement.style.display = "block"
        } else {
            locationproduct.parentElement.parentElement.style.display = "none"
            
        }
    })
}

</script>
<!--END -->



                         
          </div>
        </div>

<!-- Footer -->


  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Pick-A-Plant is an e-commerce website that offers different variety of plants. It is a way to lessen the time of customers going outside to travel, only to buy a various plant from different places or locations. Pick-A-Plant also wants to meet the expectations of the users in using an online-based shopping of plants for it can save time for both the buyer and retailer, reducing phone calls about availability, specifications, hours of operation or other information found from different pages. It provides a very comfortable service, by being able to save the item in the cart, and buy or checkout it later on.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
                 <ul class="footer-links">
              <li>Plant Shop</li>
              <li>Buy Plants</li>
              <li>Sell PLants</li>
              <li>Know about Plants</li>
               <li>Fast Service</li>
              <li>Legit Sellers</li>
               <li>Secure Payment</li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="b_index.php">Home</a></li>
              <li><a href="b_dictionary.php">Dictionary</a></li>
              <li><a href="b_shop.php">Shop</a></li>
           
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2020-2021 All Rights Reserved by 
         <a href="#">3BSIT02</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>

  <footer class="site-footer" style="background-color: #57c27e;">

      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text"><i class="fa fa-envelope-square" aria-hidden="true"></i> | @planitas@gmail.com
         <a href="#"></a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="d-inline-flex p-3">
                     <span><a href="" data-toggle="modal" data-target="#terms">Terms & Condition</a> &nbsp;|</span> 

              <span>  &nbsp;  &nbsp;<a href="" data-toggle="modal" data-target="#privacy">Privacy Policy &nbsp;|</a></span>
                  <span>  &nbsp;  &nbsp;<a href="" data-toggle="modal" data-target="#information">Contact Us</a></span>
              </div>
          </div>
        </div>
      </div>
</footer>


    


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>
  <!-- START MODAL -->
  <div class="modal fade" role="dialog" id="information">
    <div class="modal-dialog">
      <div class="modal-content">

        <!--MODAL HEADER-->
              <div class="modal-header"  style="background-color:  #dcc59a;  text-align: center;">
          <h2 class="modal-title" style="color: white;">Contact us</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!--MODAL HEADER-->
        
        <!--MODAL BODY-->
        <div class="modal-body">
          <form method="post" name="report_form"  action="b_server.php">

            <div class="form-group">
              <p style="float: left;">Name</p>
              <input type="text" name="name" class="form-control" readonly="" value="<?php echo $data2['username']; ?>">
            </div>

            <div class="form-group">
              <p style="float: left;">Subject</p>
              <input type="text" name="subject" class="form-control">
            </div>

            <div class="form-group">
              <p style="float: left;">Message</p>
              <textarea name="message" class="form-control" maxlength="255" style="resize: none; height: 100px;"></textarea>
            </div>


               <div class="form-group" hidden="">
             <textarea name="reported_time">
              <?php 
              date_default_timezone_set('Asia/Manila');
              $current_time=date('h:i:s a m/d/Y');

              echo $current_time;
              ?>
                
              </textarea>
            </div>
                    <div class="form-group">
                        <button type="submit" name="send_message" class="btn btn-success form-control" style="outline: none;">send</button>
                     
                    </div>
          </form>
      </div>
    </div>
  </div>
</div>      
        <!-- END MODAL BODY-->

<!-- privacy modal START-->
<style type="text/css">
  #privacy{

    text-align: justify;
    margin: 30px;

  }
</style>
<div class="modal fade" role="dialog" id="privacy">
    <div class="modal-dialog">
      <div class="modal-content">

        <!--MODAL HEADER-->
        <div class="modal-header" style="background-color:  #dcc59a; text-align: center;">
          <h2 class="modal-title" id="tophead" style="color: white">Privacy Policy</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!--MODAL HEADER-->
      <p id="privacy">
        Last updated: January 09, 2021<br><br>
This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.
We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy. This Privacy Policy has been created with the help of the Privacy Policy Generator.

      </p>
        
    </div>
  </div>
</div>

<!-- TERMS modal -->
<div class="modal fade" role="dialog" id="terms" >
    <div class="modal-dialog">
      <div class="modal-content">

        <!--MODAL HEADER-->
        <div class="modal-header" style="background-color:  #dcc59a;  text-align: center;">
          <h2 class="modal-title" id="tophead" style="color: white;">Terms & Condition</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!--MODAL HEADER-->
      <p id="privacy">
        Last updated: 01/09/2021
<br>
<br>
Please read this Terms of Condition carefully before using this site operated by Block 2-Group 2(“us”,”we”,or “our”).
Your access to use and of the website is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all users and others who access or use this website.
By accessing or using the website you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the website.

Termination
We may terminate or suspend access to our site immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
All provisions of the Terms which by their nature should survive  termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.
  <br><br>
        His/Her Account will be terminated once he/she <strong>violates or receive 20 consecutive reports</strong> to his/her buyer.
      </p>
        
    </div>
  </div>
</div>      
</html>
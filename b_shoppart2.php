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
    background: var(--gray);
    padding: 15px;
    height: 390px;
    cursor: pointer;
    margin-left: 15px;
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
    background: white;
}
.btn-buy:hover{
    background: var(--carribean-green);
    color: #fff;
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
    color: var(--carribean-green);
}
.rating{
  margin-right: 5px;
}

.product-name{
    color: black;
    display: block;
    text-decoration: none;
    font-size: 13px;
    text-align: left;
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
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
    padding: 0.5rem;
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
          <a class="navbar-brand" href="index.html"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="top-navbar-1">
          <ul class="nav navbar-nav navbar-right navbar-search-button">
            <li><a class="search-button" href="#"><i class="fa fa-search"></i></a></li>
            <li class="dropdown"><a href="b_profile.php" ><i class="fa fa-user-circle-o" aria-hidden="true"></i> 
                <span class="dropbtn"><?php
                  //display username from db
                echo $data2['username'];
                ?></span>

<!--                <div class="dropdown-content">
                  <a href="b_profile.php">Profile</a>
                  <a href="b_checkout.php">Check out</a>
                  <a href="logout.php"> Log out</a>
                </div> -->
                </a></li>
            <li><a href="b_checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i><samll><span class="badge"><?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');

                    $sql="SELECT count(id) AS total FROM tbl_check";
                    $result=mysqli_query($con,$sql);
                    $values=mysqli_fetch_assoc($result);
                    $num_rows=$values['total'];
                    echo "<small>",$num_rows,"</small>";
                ?></span></samll></a>


             <li class="dropdown"><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
          </ul>
          <form class="navbar-form navbar-right navbar-search-form disabled wow fadeInLeft" role="form" action="" method="post">
            <div class="form-group">
              <input type="text" name="search" placeholder="Search..." class="search form-control">
            </div>
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

            <div class="container" >
              <div class="row">
                <div class="col-sm-4">

                  
                <form action=" " onsubmit="return false">
                    <i class="fa fa-search" aria-hidden="true"></i>&nbsp; &nbsp;<input type="text" id="search" placeholder="Search Plants...."  >
                </form>

                </div>
                <div class="col-sm-4">

               <form action=" " onsubmit="return false" id="searchh">
                      <?php
                    $con=mysqli_connect('localhost','root','','pick_a_plant');
                    $query=mysqli_query($con,"SELECT DISTINCT location FROM tbl_product");
                    ?>
                  <select name="location" id="filter">
                     <option value="volvo" id="filter">Select Location</option>
                  <?php 
                    while ($rows = mysqli_fetch_array($query)) 
                    {

                  ?>
               
                    <option id="filter"><?php echo $rows['location'];?></option>
                  
                  <?php
                    }
                  ?>

                    
                  </select> 
                </form>

                </div>
                <div class="col-sm-4">
                filter
                </div>
              </div>
            </div>


            <hr>

        <!-- Features -->
         <div class="features-container section-container">
          <div class="container">
            


        
      <center>

           <div class = "product-items" style=" font-family: 'Quicksand', sans-serif;">
                   

<!-- if SALE YUNG PRODUCT =================================

                     <!-- single product 
                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img src = "images/plant 8.jpg" alt = "product image">
                            </div>
                            <div class = "product-btns">
                                <button type = "button" class = "btn-buy"> buy now
                                    <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                </button>
                            </div>
                        </div>

                           <div class = "product-info">
                            <div class = "product-info-top">
                                <h2 class = "sm-title"><i class="fa fa-map-marker fa-xs" aria-hidden="true"></i> &nbsp;lifestyle</h2>
                                <div class = "rating">
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "far fa-star fa-xs"></i></span>
                                </div>
                            </div>
                            <a href = "#" class = "product-name">womens shoes womens shoes  womens shoes </a>

                        </div>
                            <div class="prices"> 
                            <p class = "product-price">&#8369; 150.00</p> &nbsp;
                            <p class = "product-price">&#8369; 133.00</p>
                            </div>

                        <div class = "off-info">
                            <h2 class = "sm-title">35% off</h2>
                        </div>
                    </div>
                    end of single product -->

                       <!-- single product -->

                    <div class = "product">
                        <div class = "product-content">
                            <div class = "product-img">
                                <img src = "images/plant 8.jpg" alt = "product image">
                            </div>
                            <div class = "product-btns">
                                <button type = "button" class = "btn-buy"> buy now
                                    <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                </button>
                            </div>
                        </div>

                           <div class = "product-info">
                            <div class = "product-info-top">
                                <h2 class = "sm-title"><i class="fa fa-map-marker fa-xs" aria-hidden="true"></i> &nbsp;lifestyle</h2>
                                <div class = "rating">
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "fas fa-star fa-xs"></i></span>
                                    <span><i class = "far fa-star fa-xs"></i></span>
                                </div>
                            </div>
                            <a href = "#" class = "product-name">womens shoes womens shoes  womens shoes </a>

                        </div>
                            <div class="prices"> 
                            <p class = "product-price">&#8369; 150.00</p> &nbsp;
                            <p class = "product-price">&#8369; 133.00</p>
                            </div>
                    </div>
                    <!-- end of single product -->
                </div>
<!--Function of Search -->

<script type="text/javascript">
  // SEARCH FILTER
const search = document.getElementById("search");
const productName = document.querySelectorAll(".slider-box h3");

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

<!-- FUNTION FOR FILTER -->
<script type="text/javascript">
  // SEARCH FILTER
const searchh = document.getElementById("searchh");
const productNamee = document.querySelectorAll(".slider-box h5");

// A BETTER WAY TO FILTER THROUGH THE PRODUCTS
searchh.addEventListener("keyup", filterProducts);


function filterProducts(e) {
    const textt = e.target.value.toLowerCase();
    // console.log(productName[0]);
    productNamee.forEach(function(product) {
        const itemm = product.firstChild.textContent;
        if (itemm.toLowerCase().indexOf(textt) != -1) {
            product.parentElement.parentElement.style.display = "block"
        } else {
            product.parentElement.parentElement.style.display = "none"
            
        }
    })
}


</script>


<!-- END -->
                         

                               


</center>

              
      

          </div>
        </div>

       <!-- Footer -->




<style type="text/css">
.site-footer
{
  background-color: #dcc59a;
  padding:45px 0 20px;
  font-size:15px;
  line-height:24px;
  color:#777777;
}
.site-footer hr
{
  border-top-color:#bbb;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;
  margin-top:5px;
  letter-spacing:2px
}
.site-footer a
{
  color:#737373;
}
.site-footer a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links a
{
  color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links.inline li
{
  display:inline-block
}
.site-footer .social-icons
{
  text-align:right
}
.site-footer .social-icons a
{
  width:40px;
  height:40px;
  line-height:40px;
  margin-left:6px;
  margin-right:0;
  border-radius:100%;
  background-color: #FFFFFF;
}
.copyright-text
{
  margin:0
}
@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:30px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}
.social-icons
{
  padding-left:0;
  margin-bottom:0;
  list-style:none
}
.social-icons li
{
  display:inline-block;
  margin-bottom:4px
}
.social-icons li.title
{
  margin-right:15px;
  text-transform:uppercase;
  color:#96a2b2;
  font-weight:700;
  font-size:13px
}
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:16px;
  display:inline-block;
  line-height:44px;
  width:44px;
  height:44px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:14px
}
.social-icons a.facebook:hover
{
  background-color:#3b5998
}
.social-icons a.twitter:hover
{
  background-color:#00aced
}
.social-icons a.linkedin:hover
{
  background-color:#007bb6
}
.social-icons a.dribbble:hover
{
  background-color:#ea4c89
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}
</style>

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
      </p>
        
    </div>
  </div>
</div>      
</html>
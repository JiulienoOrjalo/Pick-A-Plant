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
<style type="text/css">

/* CSS Document */
.swiper-slide{
	width:250px !important;
}
		
.slider-box{
	margin-top: 20px;
	height:350px;
	width:250px;
	position:relative;
	background-color:#FFFFFF;
	border-radius:5px;
	display:flex;
	flex-direction:column;
	justify-content:center;
	align-items:center;
	text-align:center;
	border:1px solid rgba(187,187,187,0.40);
}
.slider-box a{
	text-decoration:none;
	text-align:center;
}
.img-box{
	height:200px;
}
.img-box img{
	height:auto;
	max-width:100%;
	max-height:100%;
}
.time{
	position:absolute;
	top:0px;
	right:20px;
	color:#f16007;
}
.detail{
	display:flex;
	flex-direction:column;
	align-items:center;
	box-sizing:border-box;
	font-size:13px;
	line-height:35px;
}
.price{
	color:black;						
}
.cart{
 	position:absolute;
	bottom:0px;
	height:45px;
	background-color:#ff696e;
	width:100%;
	display:flex;
	justify-content:center;
	align-items:center;}
.cart a{
	 color:#FFFFFF;
}
.slider-box:hover{
	box-shadow:2px 2px 12px rgba(47,47,47,0.40);
}
.slider-box:hover .img-box img{
 	transform:scale(1.07);
 	transition:all ease 0.3s;
}
.cart:hover{
	transform:scale(1.1);
	background-color:#fe9048;
	box-shadow:2px 2px 12px rgba(47,47,47,0.40);
	transition:all ease 0.1s;
}
.heading{
	display:flex;
	justify-content:center;
}
.heading h1{
	border-left:2px solid #000000;
	Border-right:2px solid #000000;
	background-color:#f05656;
	text-shadow:2px 2px 12px rgba(69,66,66,0.3);
	padding:0px 10px;
	color:#FFFFFF;
	margin:20px;
	font-size:30px;
	font-family:calibri;
}
.heading {
	display:flex;
	justify-content:center;
	}
	.heading h1{
	border-left:2px solid #000000;
	Border-right:2px solid #000000;
	background-color:#f05656;
	text-shadow:2px 2px 12px rgba(69,66,66,0.3);
	padding:0px 10px;
	color:#FFFFFF;
	margin:20px;
	font-size:30px;
	font-family:calibri;
	}
	.dropdown {
	  position: relative;
	  display: inline-block;
	}
	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f1f1f1;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}
	.dropdown-content a {
	  color: black;
	  padding: 5px 16px;
	  text-decoration: none;
	  display: block;
	}
	.dropdown-content a:hover {background-color: #ddd;}
	.dropdown:hover .dropdown-content {display: block;}

</style>


    </head>

    <body>
		
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

<!-- 							  <div class="dropdown-content">
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
                    
                       	 		<h1 style="color: black; font-size: 70px">Analyze Report</h1>
                        	<i class="fa fa-leaf" style="color: #64ca87;" ></i>
                        			<p class="medium-paragraph" style="color: black">
                         			The Gardening that matters
                        			</p>
                       			
                    	
                    </div>
                </div>
                
            </div>
        </div>

      <div class="row">
                  <div class="col-sm-3 features section-description wow fadeIn">
                      <h2><?php
                  //display username from db
                echo $data2['username'];
                ?></h2>
                <h4>Location: <span>Hello</span></h4>
                      <h4>Plants</h4>
                      <div class="divider-1 wow fadeInUp"><span></span></div>
                  </div>
              </div>
              
        <!-- Features -->
         <div class="features-container section-container">
	        <div class="container">
	        	
	            <div class="row">
	                <div class="col-sm-12 features section-description wow fadeIn">
	                    <h2>Plants</h2>
	                    <div class="divider-1 wow fadeInUp"><span></span></div>
	                </div>
	            </div>
	            
	      
			<center>

	            	<?php
	            		$query = "SELECT * FROM tbl_product";
	            		$query_run = mysqli_query($connection, $query);
	            		$product = mysqli_num_rows($query_run) > 0;


	            		if ($product) {
	            			while ($row = mysqli_fetch_assoc($query_run)) 
	            			{
	            				

	            				?>


							    <div class="col-md-3 col-sm-6">
                                    <div class="product-grid">
                                        <div class="swiper-slide">
                                             <div class="slider-box">
                                            <p class="time">
                                            	<i class="fa fa-map-marker" aria-hidden="true"> <?php echo $row['location']; ?></i></p>
                                            <div class="img-box">
                                            <img src="<?php echo $row['photo'];?>">
                                            </div>
                                            <p class="detail"><?php echo $row['name']; ?>
                                            <p class="price">₱<?php echo $row['price']; ?></p>
                                            </p>
                                            <div class="cart">



                                              	<a  href="b_buy.php?buy=<?php echo $row['id']; ?>"><i class="fa fa-shopping-cart" aria-hidden="true">  Buy</i></a>
                               

                                            </div>
                                            </div>
                                                </div>


                                        </div>
                                    </div>
                                  
	            				<?php

	            			
	            			}
	            		}

	            		else
	            		{
	            			echo "No Avaible plants";
	            		}

	            	?>





                         

                               


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
            <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
              <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
              <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
              <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
              <li><a href="http://scanfcode.com/category/android/">Android</a></li>
              <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
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

        			<span>	&nbsp;	&nbsp;<a href="" data-toggle="modal" data-target="#privacy">Privacy Policy &nbsp;|</a></span>
        					<span>	&nbsp;	&nbsp;<a href="" data-toggle="modal" data-target="#information">Send Report</a></span>
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
				<div class="modal-header">
					<h3 class="modal-title">Send Reports</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
				
				<!--MODAL BODY-->
				<div class="modal-body">
					<form method="post" name="report_form" enctype="multipart/form-data" >

						<div class="form-group">
							<p style="float: left;">Name</p>
							<input type="text" name="name_of_plants" class="form-control" required="">
						</div>

						<div class="form-group">
							<p style="float: left;">Name of the Seller</p>
							<input type="text" name="name_of_plants" class="form-control" required="">
						</div>


						<div class="form-group">
							<p style="float: left;">Description</p>
							<textarea name="description" class="form-control" maxlength="255" style="resize: none; height: 100px;"></textarea>
						</div>


               <div class="form-group" hidden="">
             <textarea name="uploaddate">
              <?php 
              date_default_timezone_set('Asia/Manila');
              $current_time=date('h:i:s a m/d/Y');

              echo $current_time;
              ?>
                
              </textarea>
            </div>

                    <div class="form-group">
                        <button type="submit" name="sen_reports" class="btn btn-success form-control" style="outline: none;">send</button>
                     
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
				<div class="modal-header">
					<h2 class="modal-title" id="tophead">Privacy Policy</h2>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			<p id="privacy">
				What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?
			</p>
				
		</div>
	</div>
</div>

<!-- TERMS modal -->
<div class="modal fade" role="dialog" id="terms">
		<div class="modal-dialog">
			<div class="modal-content">

				<!--MODAL HEADER-->
				<div class="modal-header">
					<h2 class="modal-title" id="tophead">Terms & Condition</h2>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!--MODAL HEADER-->
			<p id="privacy">
				What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?
			</p>
				
		</div>
	</div>
</div>			



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

</html>
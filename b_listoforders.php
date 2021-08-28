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
    <!-- DataTables CSS -->
    <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">


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
                <a class="navbar-brand" href="index.html"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="top-navbar-1">
                <ul class="nav navbar-nav navbar-right navbar-search-button">
                    <li><a class="search-button" href="#"><i class="fa fa-search"></i></a></li>
                    <li class="dropdown"><a href="b_profile.php"><i class="fa fa-user-circle-o" aria-hidden="true" style="color: #64ca87;"></i>
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
                    <li><a href="b_checkout.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            <samll><span class="badge"><?php
                                                        $con = mysqli_connect('localhost', 'root', '', 'pick_a_plant');

                                                        $sql = "SELECT count(id) AS total FROM tbl_check";
                                                        $result = mysqli_query($con, $sql);
                                                        $values = mysqli_fetch_assoc($result);
                                                        $num_rows = $values['total'];
                                                        echo "<small>", $num_rows, "</small>";
                                                        ?></span></samll>
                        </a>


                    <li class="dropdown"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                </ul>
                <form class="navbar-form navbar-right navbar-search-form disabled wow fadeInLeft" role="form" action="" method="post">
                    <div class="form-group">
                        <input type="text" name="search" placeholder="Search..." class="search form-control">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right navbar-menu-items wow fadeIn">
                    <li><a href="b_index.php">Home</a></li>
                    <li><a href="b_dictionary.php">Dictionary</a></li>
                    <li><a href="b_shop.php">Shop</a></li>
                </ul>
            </div>


        </div>
    </nav>

    <!-- Top content -->


    <!-- Features -->
    <div class="features-container section-container">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 features section-description wow fadeIn">
                    <h2>Profile</h2>
                    <div class="divider-1 wow fadeInUp"><span></span></div>
                </div>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: white">
                    <li class="breadcrumb-item">List of Orders</li>
                    <li class="breadcrumb-item"><a href="#">Update Account</a></li>
                    <li class="breadcrumb-item"><a href="#">Wish List</a></li>
                </ol>
            </nav>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <form action="#" method="post">
                        <table cellspacing="0" class="table table-striped table-bordered table-hover" id="example" style="font-size:12px">
                            <thead>
                                <tr>
                                    <th width="50px;">#</th>
                                    <th>Order#</th>
                                    <th>Date Oredered</th>
                                    <th>TotalPrice</th>
                                    <th>PaymentMethod</th>
                                    <th>Status</th>
                                    <th width="150px">Remarks</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td width="10%"  class="orderid   "  data-target="#myOrdered" data-toggle="modal" data-id="105">
                                    <a href="#"  title="View list Of ordered products"  class="orderid   "  data-target="#myOrdered" data-toggle="modal" data-id="105"><i class="fa fa-info-circle fa-fw"></i> view orders</a> </td>

                                    <td>107</td>
                                    <td>Apr/12/2021 12:46:17</td>
                                    <td>&#8369 300</td>
                                     <td>Cash on Delivery</td>
                                    <td>Confirmed</td>
                                    <td>Your order has been confirmed.</td>

                                     <td class="tooltip-demo">
                                        <a class="orderid btn btn-pup btn-xs" data-id="107" data-target="#myOrdered" data-toggle="modal" href="#" title="View list Of ordered products">
                                          <i class="fa fa-info-circle fa-fw" data-placement="left" data-toggle="tooltip" title="View Order"></i> <span class="tooltip tooltip.top">view</span></a>

                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <!--/table-resp-->
            </div>
            <!--/tab-pane-->

        </div>
    </div>







    <!-- Footer -->
    <style type="text/css">
        .site-footer {
            background-color: #dcc59a;
            padding: 45px 0 20px;
            font-size: 15px;
            line-height: 24px;
            color: #777777;
        }

        .site-footer hr {
            border-top-color: #bbb;
            opacity: 0.5
        }

        .site-footer hr.small {
            margin: 20px 0
        }

        .site-footer h6 {
            color: #fff;
            font-size: 16px;
            text-transform: uppercase;
            margin-top: 5px;
            letter-spacing: 2px
        }

        .site-footer a {
            color: #737373;
        }

        .site-footer a:hover {
            color: #3366cc;
            text-decoration: none;
        }

        .footer-links {
            padding-left: 0;
            list-style: none
        }

        .footer-links li {
            display: block
        }

        .footer-links a {
            color: #737373
        }

        .footer-links a:active,
        .footer-links a:focus,
        .footer-links a:hover {
            color: #3366cc;
            text-decoration: none;
        }

        .footer-links.inline li {
            display: inline-block
        }

        .site-footer .social-icons {
            text-align: right
        }

        .site-footer .social-icons a {
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin-left: 6px;
            margin-right: 0;
            border-radius: 100%;
            background-color: #FFFFFF;
        }

        .copyright-text {
            margin: 0
        }

        @media (max-width:991px) {
            .site-footer [class^=col-] {
                margin-bottom: 30px
            }
        }

        @media (max-width:767px) {
            .site-footer {
                padding-bottom: 0
            }

            .site-footer .copyright-text,
            .site-footer .social-icons {
                text-align: center
            }
        }

        .social-icons {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none
        }

        .social-icons li {
            display: inline-block;
            margin-bottom: 4px
        }

        .social-icons li.title {
            margin-right: 15px;
            text-transform: uppercase;
            color: #96a2b2;
            font-weight: 700;
            font-size: 13px
        }

        .social-icons a {
            background-color: #eceeef;
            color: #818a91;
            font-size: 16px;
            display: inline-block;
            line-height: 44px;
            width: 44px;
            height: 44px;
            text-align: center;
            margin-right: 8px;
            border-radius: 100%;
            -webkit-transition: all .2s linear;
            -o-transition: all .2s linear;
            transition: all .2s linear
        }

        .social-icons a:active,
        .social-icons a:focus,
        .social-icons a:hover {
            color: #fff;
            background-color: #29aafe
        }

        .social-icons.size-sm a {
            line-height: 34px;
            height: 34px;
            width: 34px;
            font-size: 14px
        }

        .social-icons a.facebook:hover {
            background-color: #3b5998
        }

        .social-icons a.twitter:hover {
            background-color: #00aced
        }

        .social-icons a.linkedin:hover {
            background-color: #007bb6
        }

        .social-icons a.dribbble:hover {
            background-color: #ea4c89
        }

        @media (max-width:767px) {
            .social-icons li.title {
                display: block;
                margin-right: 0;
                font-weight: 600
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

                        <span> &nbsp; &nbsp;<a href="" data-toggle="modal" data-target="#privacy">Privacy Policy &nbsp;|</a></span>
                        <span> &nbsp; &nbsp;<a href="" data-toggle="modal" data-target="#information">Contact Us</a></span>
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
    <script src="../js/dataTables/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>


    <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>
<!-- START MODAL -->
<div class="modal fade" role="dialog" id="information">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--MODAL HEADER-->
            <div class="modal-header" style="background-color:  #dcc59a;  text-align: center;">
                <h2 class="modal-title" style="color: white;">Contact us</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!--MODAL HEADER-->

            <!--MODAL BODY-->
            <div class="modal-body">
                <form method="post" name="report_form" action="b_server.php">

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
                $current_time = date('h:i:s a m/d/Y');

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
    #privacy {

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
<div class="modal fade" role="dialog" id="terms">
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
                All provisions of the Terms which by their nature should survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.
            </p>

        </div>
    </div>
</div>

</html>
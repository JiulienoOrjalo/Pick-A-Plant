<?php include 'sendemail.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../assets/ico/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
     <title>Contact Pick-a-Plant</title>

  </head>
  <body>
   <?php echo $alert; ?>

  <div class="content">
    
    <div class="container">
      <div class="row">
        <div class="col-md-5 mr-auto">
          <h2>Pick A Plant <img src="images/logo web.png" style="width: 50px; margin-bottom: 10px;"></h2>
          <p class="mb-5">We're ready to lead you into the future of online shopping of plants. Having trouble or problem? Get in touch with us</p>

          <ul class="list-unstyled pl-md-5 mb-5">
            <li class="d-flex text-black mb-2">
              <span class="mr-3"><span class="icon-map"></span></span> PHINMA University of Pangasinan, <br> Arellano Street, Dagupan City, 2400 Pangasinan
            </li>
            <li class="d-flex text-black mb-2"><span class="mr-3"><span class="icon-phone"></span></span> (0961) 478 1740</li>
            <li class="d-flex text-black"><span class="mr-3"><span class="icon-envelope-o"></span></span> pick.aplant2021@gmail.com </li>

            
          </ul>
        </div>


        <div class="col-md-6">
           <form class="contact" action="" method="post">
            <div class="row">
              
              <div class="col-md-12 form-group">
                <label for="name" class="col-form-label">Name</label>
                <input type="text" class="form-control text-box" name="name" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="email" class="col-form-label">Email</label>
                <input type="text" class="form-control text-box" name="email" required="">
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 form-group">
                <label for="message" class="col-form-label">Message</label>
                <textarea class="form-control" name="message"  cols="30" rows="7" required=""></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <a href="../s_profile.php"><input type="button" class="send-btn btn btn-success rounded-0 py-2 px-4" value="Back" style="cursor: pointer;"></a>
                <input type="submit" name="submit" class="send-btn btn btn-primary rounded-0 py-2 px-4 " value="Send" style="width: 250px">
     
              </div>
            </div>
          </form>



        </div>
      </div>

      
      <!-- <div class="row justify-content-center">
        <div class="col-md-10">
          
          <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0">

              <h2 class="mb-5">Fill the form. <br> It's easy.</h2>

              <form class="border-right pr-5 mb-5" method="post" id="contactForm" name="contactForm">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="First name">
                  </div>
                  <div class="col-md-6 form-group">
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last name">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <textarea class="form-control" name="message" id="message" cols="30" rows="7" placeholder="Write your message"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                  </div>
                </div>
              </form>

              <div id="form-message-warning mt-4"></div> 
              <div id="form-message-success">
                Your message was sent, thank you!
              </div>

            </div>
            <div class="col-lg-4 ml-auto">
              <h3 class="mb-4">Let's talk about everything.</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil deleniti itaque similique magni. Magni, laboriosam perferendis maxime!</p>
              <p><a href="#">Read more</a></p>
            </div>
          </div>
        </div>  
        </div>
      </div> -->
  </div>
    
    
  <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
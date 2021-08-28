<?php include('b_server.php'); 
?>




<!DOCTYPE html>
<html>
<head>
  <title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body>
 <style type="text/css">
   #post{
  position: relative;
  background-color: #4CAF50;
  border: none;
  font-size: 15px;
  color: #FFFFFF;
  text-align: center;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
  outline: none;
   }
   .modal-dialog{
    max-width: 800px;
   }
   #ratings{
    background-color:rgba(0, 0, 0, 0.5);

   }

 </style>

<div class="modal fade" role="dialog" id="ratings" style="border-radius: none;">
    <div class="modal-dialog">
      <div class="modal-content">

            <!--MODAL HEADER-->
            <!--
        <div class="modal-header" style="background-color:  #dcc59a; text-align: center; height: 50px;">
          <h2 class="modal-title" id="tophead" style="color: white">How do you like this Plants</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div> -->
        <!--MODAL BODY-->
        <div class="modal-body">

       

        <form method="post" name="report_form" action="b_server.php">
             <?php 
            while ($row=mysqli_fetch_array($rec)) {
              
          ?>

           <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
           <input type="hidden" name="plant" value="<?php echo $row['name']; ?>">
          
 

         <div class="rateyo" id= "rating" style="height: 15px; margin-right: auto; margin-left: auto; display: block;"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>
         <br>
          <span class='result' style=" display: flex; justify-content: center;">0</span>
          <input type="hidden" name="rating">
          <hr>

          <div class="form-group">
            <input type="text" name="user" class="form-control" placeholder="Name" required="">
          </div>


            <div class="form-group">
              <textarea name="exp" class="form-control" style="resize: none; height: 100px;" placeholder="Describe your Experience"></textarea>
            </div>


               <div class="form-group" hidden="">
             <textarea name="com_time">
              <?php 
              date_default_timezone_set('Asia/Manila');
              $current_time=date('h:i:s a m/d/Y');

              echo $current_time;
              ?>
                
              </textarea>
            </div>
                <div class="form-group" style="border-radius: 0;">
                         <a href="b_buy.php?ratings=<?php echo $row['id']; ?>"><button type="submit" name="send_rate" id="post" class="btn btn-success form-control" style="outline: none;">POST</button>
                </div>


          </form>
<?php } ?>
      </div>
    </div>
  </div>
</div> 

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
</body>
</html>


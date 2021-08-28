<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
   if (isset($_SESSION['username'])) {

   $login=$_SESSION['username'];
   $data="SELECT * FROM tbl_register WHERE username='$login'";

  $qry=mysqli_query($conn,$data) or die ("Could not execute Query.".mysql_error());
  $data2=mysqli_fetch_array($qry);
 
}

?>

<?php include_once "header.php"; ?>
<body>
    <nav class="navbar navbar-inverse " role="navigation" >
                <div class="navbar-header">
                    <a class="navbar-brand" href="../index.php">Pick A Plant</a>
                </div>

              </nav>

  <div class="container-fluid">
    <div class="row no-pad">
      <div class="col-sm-3" >
  <div class="wrapper-side ">
    <section class="users">
     
      <header>

        <div class="content">
          <?php 
            $username=$_SESSION['unique_id'];
            $sql = mysqli_query($conn, "SELECT * FROM tbl_register WHERE unique_id = '$username' ");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="<?php
                                 if($row['profile'] !== '') { 
                                    echo 'profile/'.$row['profile']; 
                                } else { 
                                    echo 'assets/ico/logo web.png';
                                }?>" alt="">
          <div class="details">
            <span><?php echo $row['firstname']. " " . $row['lastname'] ." ". "(".$row['u_type'].")"?></span>
           <p ><?php echo $row['status2']; ?></p>

          </div>
        </div>
       
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

</div><!--END OF COL_SM_3-->
  <div class="col-sm-9" id="col2">
  <div class="wrapper">
    <section class="chat-area">
      <header>
       <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM tbl_register WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            
          }
        ?>

        
        <img src="<?php
                                 if($row['profile'] !== '') { 
                                    echo 'profile/'.$row['profile']; 
                                } else { 
                                    echo 'assets/ico/logo web.png';
                                }?>" alt="">
        <div class="details">
          <span><?php echo $row['firstname']. " " . $row['lastname']." ". "(".$row['u_type'].")" ?></span>

          <p><?php echo $row['status2']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>

      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button ><i class="fab fa-telegram-plane" style="color: #fff;"></i></button>
      </form>
    </section>
  </div>
</div><!--END OF COL_SM_9-->
</div>
</div>

</div><!--END OF ROW-->
</div><!--END OF CONTAINER-->

  <script src="javascript/chat.js"></script>

  <script src="javascript/users.js"></script>

</body>
</html>

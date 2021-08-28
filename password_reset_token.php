<?php

$servername='localhost';
$username='root';
$password='';
$dbname = "pick_a_plant";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';
if(isset($_POST['password_reset_token'])&&$_POST['email'])
{
    $email = $_POST['email'];
    $result = mysqli_query($conn,"SELECT * FROM tbl_register where email='" . $_POST['email'] . "'");
    $row = mysqli_fetch_assoc($result);
    if ($row) {
    $token=md5($email).rand(10,9999);
    $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
    $expDate = date("Y-m-d H:i:s",$expFormat);
    $update = mysqli_query($conn,"UPDATE tbl_register set  password='$password', reset_link_token='$token' ,exp_date='$expDate' WHERE email='" . $email . "'");
    $link = "<a href='http://localhost/pick_a_plantv2/reset_password.php?key=".$email."&token=".$token."'>Click To Reset password</a>";
 
    
  $fetch_user_id=$row['email'];
  $firstname=$row['firstname'];
  $lastname=$row['lastname'];
  $password=$row['password'];
  if($email==$fetch_user_id) {
       
        try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pick.aplant2021@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Adminpick123'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom($email); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Reset Password';
    $mail->Body = '<h3>Click on this link to reset your password:'.$link.'</h3>';

    if ($mail->send()) {
      echo ("<script LANGUAGE='JavaScript'>
    window.alert('We Sent an email to you please check and click the link to reset your password');
    window.location.href='index.php';
    </script>");
        
    }
   
  } catch (Exception $e){
    echo '$e->getMessage()';
    
  }
}
}
}
?>
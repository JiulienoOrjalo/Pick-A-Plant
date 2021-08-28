<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN tbl_register ON tbl_register.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">

                                <div class="details">
                                   <p>'. $row['msg'] .'</p>
                                </div>
                                <img src="'.(($row['profile']!=""?'profile/'.$row['profile']:" assets/ico/logo web.png")).'" style="margin-left:5px;height:45px;width:45px;">
                                </div>';
                }
                else{
                    $output .= '<div class="chat incoming">
                                 <img src="'.(($row['profile']!=""?'profile/'.$row['profile']:" assets/ico/logo web.png")).'" style="margin-right:5px;height:45px;width:45px;">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>
<!--<img src="php/images/'.$row['img'].'" alt=""> INSERT CODE IN LINE 23-->
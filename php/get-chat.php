<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id})  ORDER BY msg_id" ;
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){

                if($row['outgoing_msg_id'] === $outgoing_id){
                    $datedata = $row['timeSent'];
                    $time = explode(" ", $datedata);
                     
                    $output .= '  
                             <li class="odd">
                             
                               <div class="message-list">
                                <div  onclick="sendtoModalRight('.$message_id.',\''.$row['incoming_msg_id'].'\' , \' '.$time[1].' \'  );"  style="cursor: pointer;" aria-controls="offcanvasRight"s data-bs-target="#offcanvasRight" href="#offcanvasMessage" data-bs-toggle="offcanvas"  > 
                                  <div class="conversation-text" style="max-width: 70%;" >
                                    
                                    <div style="font-size: 15px !important;" class="ctext-wrap">
                                       <p style="font-weight: 300;" >'. $row['msg'] .'</p>
                                       
                                    </div>                                     
                                 <span class="time">'.$time[1].'</span> 
                                </div>

                                </div> 
                               </div>

                            </li> 
                            ';
                }else{

                       
                      
                    $message_id=$row['msg_id'];
                    $output .= '

                                <li>
                                 <div class="message-list">
                                     <div class="chat-avatar">
                                    <img src="php/images/'.$row['img'].'" alt="">
                                    </div>
                                <div  onclick="sendtoModal('.$message_id.',\''.$row['incoming_msg_id'].'\' , \' '.$time[1].' \'  );"  style="cursor: pointer;" href="#offcanvasMessage" data-bs-toggle="offcanvas"  > 
                                 <div  class="conversation-text "  >
                                  <div style="font-size: 15px !important;" class="ctext-wrap">
                                    <p style="font-weight: 300;" >'. $row['msg'] .'</p>
                                  </div> 
                                  <span class="time">'.$time[1].'</span> 
                                </div>
                            </div>

                            </div>
                            </li>  
                            ';
                }
            }

        }else{
            $user=$incoming_id;

            $_SESSION['senderID'] = $outgoing_id;

            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = $user");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
              $name = $row['fname'];
            }

           
            $_SESSION['receriverID'] = $incoming_id;
            

            $output .= '<div style="text-align: center;" class="text"> 

           
            
               Send a chat resuest to  '.$name.'
               

               <form method="POST" action="sendRequest.php"> 
                <br>
                   
                   <input type="submit" class="btn btn-danger btn-rounded waves-effect waves-light" value="Send">

               </form>
               <style> #messageForm{opacity:0} </style>
               <br>

               if you had previously sent a chat request please wait for the user\'s response

            </div>';

        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>
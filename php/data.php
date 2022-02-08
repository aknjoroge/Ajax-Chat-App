<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = "..." : $result ="Connect to user";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " :  $not ="<span style='margin-right: 10px;margin-top:3px;' class='badge badge-success badge-pill float-left '> <i class='mdi mdi-email'></i> </span>";
           
        }else{
            $you = "";
            $not="<span style='margin-right: 10px;margin-top:3px;' class='badge badge-info badge-pill float-left '> <i class='mdi mdi-facebook-messenger'></i> </span>";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
                               
        $output .= ' <li> <a href="home.php?user_id='. $row['unique_id'] .'">
                                                <div class="media">
                                                        <div class="chat-user-img align-self-center mr-2">
                                                          <img class="rounded-circle avatar-sm" src="php/images/'. $row['img'] .'" alt="">
                                                        </div>
                                                         
                                                    <div style="font-size: 15px;" class="media-body overflow-hidden">
                                                      <h5 style="font-size: 16px;" class="text-truncate  mt-0 mb-1" >'. $row['fname']. " " . $row['lname'] .'</h5>
                                                      '.$not.'
                                                      <p class="text-truncate mb-0" >'. $you . $msg .'</p>
                                                    </div>

                                                    <div class="font-11">'.$offline.'</div>
                                                   
                                                </div>
                                                

                                                    </a>  
                                                </li>';
    }
?>
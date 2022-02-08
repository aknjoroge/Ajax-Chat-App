<div class="row">
                          
                   <div class="col-xl-3 col-lg-4">
      <br>
                                <div style="margin:0 2px;" class="card chat-list-card mb-xl-0">
                                    <div  class="card-body">
                                      
                                        
                                        <div  class="media"  >
                                            <div class="mr-2 align-self-center">
                                                <img src="php/images/<?php echo $row['img']; ?>" alt="" class="rounded-circle avatar-sm">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1"><?php echo $row['fname']; ?></h5>
                                                <p class="font-13 text-muted mb-0"> <?php echo $row['email']; ?></p>
                                            </div>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <!-- item-->
                                                    <a href="profile.php" class="dropdown-item">Edit Profile </a>
                                                    <!-- item-->
                                                  
                                                </div>
                                            </div>
                                        </div>
                                     <br>

                                        <div style="border-top: 1px solid hsl(218deg 24% 40%)  ;"  class="">
                                            <ul class="list-unstyled chat-list slimscroll mb-0" style="min-height: 340px;">
                                              
                                           
                                                
                                                <li>
                                                    <div id="users-list" > </div>
                                                </li>

                                            </ul>
                                           
                                        </div>
                                    </div>
                                </div>


                            </div>
                            
                            <?php 
                            if( !(isset($_GET['user_id'])) ){
                                $name ="No chat Selected";
                                $notice=" <i class='mdi mdi-human-male-female'></i> Connect to more  users by sending them chat requests 
                                 <br> Click on a user to start. <i class='mdi mdi-facebook-messenger'></i>
                                 ";
                                
                                echo"
                                
                                <style> 
                                #messageForm{ visibility: hidden }
                                #chat-box{visibility: hidden}
                                
                                </style>


                                ";
                                
                            }
                            else{
                                
                                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                                if(mysqli_num_rows($sql) > 0){
                                    $row = mysqli_fetch_assoc($sql);
                                }else{
                                    header("location: users.php");
                                }
                                $name =$row['fname'];
                                $_SESSION['currentUserProfileName'] = $row['fname'];
                                $_SESSION['currentUserProfileBio'] = $row['bio'];
                                $_SESSION['currentUserProfiledate'] = $row['registered'];
                                
                                $status =$row['status'];

                            }
                            
                            ?>
                            
                            <div  class="col-xl-9 col-lg-8">


                                <!--edit-->
                                
                                <!--end of edit-->



                                <br>
                                <div style="margin:0 1px;" class="conversation-list-card card">
                                    <div style="padding-bottom: 0;" class="card-body">
                                       

                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 text-truncate"><?php echo $name; ?></h5>
                                                <p class="font-13 text-muted mb-0"><i class="mdi mdi-circle text-success mr-1 font-11"></i><?php echo $status; ?></p>
                                            </div>
                                            <div>
                                                 <!-- <a   onclick="scroll_down()" ><i class="fe-chevrons-down"></i></a> -->
                                            </div>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop font-20" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                             <!-- item data-toggle="modal" data-target="#staticBackdrop"  -->
                                                    <a  href="javascript:void(0);" data-toggle="modal" onclick="add_blur();" data-target="#userinfo"   class="dropdown-item">User profile</a>
                                                    <!-- item-->
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div >
                                            <ul id="chat-box2"  class="conversation-list custom-bar" style="height: 345px; overflow: auto; border-top: 1px solid rgba(53, 52, 52, 0.382);  "   >
                                             <br>
                                                <li>
                                                    <div class="chat-day-title">
                                                        <span class="title">  <?php echo $notice;   ?> </span>
                                                    </div>
                                                </li>

                                                <!--Start of Chat-->

                                                <div    id="chat-box"  >

                                                

                                              </div>

                                                <!--End of chat-->
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div style="padding: 0 20px 0 20px;" class=" conversation-input border-top">
                                        <div class="row">

                                            

                                            <div class="col">
                                                <form action="#" id="messageForm" class="typing-area">

                                                    <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                                                    <input style="opacity: 0; position: absolute; " checked   type="radio"  name="sendmessageinputValue" id="sendmessageinputValue" >
                                                  <!--Form text inpute-->
                                                    <input  type="text" name="message" id="sendmessageinput"  class="test-field input-field form-control " placeholder="Type a message here..." autocomplete="off">
                                               
                                                </input>
                               
                                                   
                                                
                                            </div>
                                            <div  id="messageForm" class="col-auto">
                                                <ul class="nav nav-pills profile-pills mt-1">
                                                   
                                                    <li>
                                                        <a   ><i class=" fa fa-camera"></i></a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>

                                            <div  id="messageForm" class="col-auto">
                                                
                                               
                                                <button id="sendMessage" style="transition: all .8s;"  type="submit" class="active-state btn btn-primary chat-send width-md waves-effect waves-light"><span class="d-none d-sm-inline-block mr-2">Send</span> <i class="mdi mdi-send"></i></button>
                                            
                                            </form>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
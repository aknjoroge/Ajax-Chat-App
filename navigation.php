<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>
<!-- Navigation Bar-->
 <header class="topNavigation" id="topnav">

<!-- Topbar Start -->
<div class="navbar-custom">
    <div style="padding-right: 14px; padding-left: 14px;" class="container-fluid">
        
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

            <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" id="search_input" class="form-control" placeholder="Search for a user...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fe-search" id="search_icon"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

            <?php
            
            $notify = mysqli_query($conn, "SELECT * FROM notifications WHERE touser = {$_SESSION['unique_id']} AND active = 1 ");
            if(mysqli_num_rows($notify) > 0){
                $notifydata = mysqli_fetch_assoc($sql);    
                $noticemessage = $notifydata['message']; 
                $noticedate = $notifydata['date'];   

                $notificationPresent=true;     
            }


            ?>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <?php if($notificationPresent){
                       echo " <span class='badge badge-danger rounded-circle noti-icon-badge'>1+</span>";
                     } else{
                        // echo " <span class='badge badge-danger rounded-circle noti-icon-badge'>0</span>";
                     }
                    ?>
                    

                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-right">
                                <a href="" class="text-dark">
                                   
                                </a>
                            </span>System Notification
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">

                    <?php
                    if($notificationPresent){

                        $notifyQuery = "SELECT * FROM notifications WHERE touser = {$_SESSION['unique_id']} AND active = 1";

                         $notifyresult =$conn -> query($notifyQuery);

                        if($notifyresult-> num_rows > 0){ 
                            while($noti =$notifyresult -> fetch_assoc() ){

                                $noti_date =$noti['date'];
                                $noti_message =$noti['message'];
                                $noti_link_id=$noti['fromid'];
                                echo "
                                
                                <a style='padding: 2px 5px;' href='home.php?user_id=$noti_link_id ' class='dropdown-item notify-item active'>
                                <div class='notify-icon'>
                                    
                                <img style='height: 50px !important;width: 50px;' src='php/images/defaultUser.png' class='img-fluid rounded-circle' alt=' /> 
                                
                                
                                </div>
                                 
                                 
                                <p class='text-muted mb-0 user-msg'>
                                <small>  $noti_message  <p style='margin-left:55px'> $noti_date</p> </small>
                                </p>
                            </a>
                                <br>                                
                                ";

                            }
                        } 
                        
                       
                    }
                    
                    if($notificationPresent){
                        echo"
                        
                        <a href='clearNotification.php' class='dropdown-item text-center text-primary notify-item notify-all'>
                            Clear All Notifications
                            <i class='fi-arrow-right'></i>
                        </a>
                        ";
                    }
                    else{
                        echo "
                        
                        <a href='javascript:void(0);' class='dropdown-item text-center text-primary notify-item notify-all'>
                            No Notifications
                            <i class='fi-arrow-right'></i>
                        </a>

                        ";
                    }
                    
                    
                    ?>

                   

                    <!-- All-->
                    

                </div>
            </li>
            <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);             

            }

            

          ?>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="php/images/<?php echo $row['img']; ?>" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                    <?php echo $row['fname']; ?> <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                                                      

                    <!-- item-->
                    <a href="profile.php" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Settings</span>
                    </a>

                    

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>"  class="dropdown-item notify-item logout">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                       
                    </a>

                </div>
            </li>

            

           

            

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="home.php" class="logo logo-light">
                <span class="logo-lg">
                    <img src="assets/images/techkey.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/techkey.png" alt="" height="24">
                </span>
            </a>
            <a href="home.php" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/techkey.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/techkey.png" alt="" height="24">
                </span>
            </a>
        </div>

        <div class="clearfix"></div>
    </div> <!-- end container-fluid-->
</div>
<!-- end Topbar -->

<div class="topbar-menu">
    <div style="padding-right: 12px; padding-left: 12px;" class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu">
                    <a  ><i style="width: 1rem;height: 1rem;" class="spinner-grow text-success "></i> <?php echo $row['status']; ?></a>
                </li>

                <li class="has-submenu">
                    <a href="home.php"><i class="mdi mdi-android-messages"></i>Conversations</a>
                </li>

                <?php 
            $sql2 = mysqli_query($conn, "SELECT * FROM requests WHERE toID = {$_SESSION['unique_id']} AND active=1 ");
            if(mysqli_num_rows($sql2) > 0){
              $rowno = mysqli_fetch_assoc($sql2);
              
             

                $_SESSION['hasChatRequest']=true;
                
                echo "
                <li class='has-submenu'>                
                <a href='chatRequest.php'><i class='mdi mdi-bell'></i> <span class='badge badge-danger rounded-circle noti-icon-badge'>1+</span> Chat Request</a>
            </li>                 
                ";

            }else{
                $_SESSION['hasChatRequest']=false;

                echo "
                <li class='has-submenu'>                
                <a href='chatRequest.php'><i class='mdi mdi-bell'></i>   Chat Request</a>
            </li>                 
                ";
            }

          ?>

          

               
                <li class="has-submenu">
                    <a href="#"> <i class="mdi mdi-information"></i> Techkey  <div class="arrow-down"></div></a>
                    <ul class="submenu megamenu">
                        <li>
                            <ul>
                                <li>
                                    <a data-animation="contentscale" data-plugin="custommodal" data-overlayColor="#36404a" href="#custom-modal"  > Contact Us </a>
                                </li>
                                <li>
                                    <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasinfo" aria-controls="offcanvasinfo" href="#"> Chat System info </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li>
                                    <a target="_blank" href="https://techkey.co.ke">View Website</a>
                                </li>
                                <li>
                                    <a class="right-bar-toggle" href="#">Other Systems</a>
                                </li>
                               
                            </ul>
                        </li>

                        
                        
                    </ul>
                </li>

               

                

               

                


            </ul>
            <!-- End navigation menu -->

            <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>
<!-- end navbar-custom -->

</header>
<!-- End Navigation Bar-->
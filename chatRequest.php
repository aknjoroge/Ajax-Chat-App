<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: index.php");
  }

  
  $Accepted=$_POST['acceptChat'];
  $declined=$_POST['declineChat'];



  if(isset($Accepted)){
      $sendername=$row['fname'];
      $sendernoticeid=$_SESSION['unique_id'];

     $notification_message= "Chat request Accepted";
      //create a system notification table, tables = id To , date, active, message 
   $insertQuery = "INSERT INTO `notifications`(`touser`,`fromid`, `message` ) VALUES ('$Accepted','$sendernoticeid' , '$notification_message' )";
 if ($conn->query($insertQuery) === TRUE) {
    $_SESSION['chatRequestNotification']= "Chat request Accepted :) ";
    $_SESSION['mode']= "success";

    $sqlupdate = "UPDATE requests SET active= 2 WHERE `fromID` = $Accepted";
    if ($conn->query($sqlupdate) === TRUE) {  
    }

    //add a conenction message

    $welcomingMessage= "chat request sent";
    $messageQuery1 = "INSERT INTO `messages`(`incoming_msg_id`, `outgoing_msg_id`,`msg` ) VALUES ('$sendernoticeid','$Accepted' , '$welcomingMessage' )";
    if ($conn->query($messageQuery1) === TRUE) { }


    $welcomingMessage= "chat request accepted";
    $messageQuery2 = "INSERT INTO `messages`(`incoming_msg_id`, `outgoing_msg_id`,`msg` ) VALUES ('$Accepted','$sendernoticeid' , '$welcomingMessage' )";
    if ($conn->query($messageQuery2) === TRUE) {}

    //update relationship tables
    $messageQuery2 = "INSERT INTO `relations`(`SenderID`, `ReceiverID` ) VALUES ('$Accepted','$sendernoticeid')";
    if ($conn->query($messageQuery2) === TRUE) {}




   } else {
    
    $_SESSION['chatRequestNotification'] =  "Error: Could not Accept the Chat request Try again later ";
    $_SESSION['mode']= "warning";
    
   }
  

  }
  if(isset($declined)){

    $sendername=$row['fname'];
    $sendernoticeid=$_SESSION['unique_id'];
    $notification_message= "Chat request Declined";
        //create a system notification table, tables = id To , date, active, message 
    $insertQuery = "INSERT INTO `notifications`(`touser`,`fromid`, `message` ) VALUES ('$declined','$sendernoticeid' , '$notification_message' )";
    if ($conn->query($insertQuery) === TRUE) {
    $_SESSION['chatRequestNotification']= "Chat request Declined :) ";
    $_SESSION['mode']= "warning";
    $sqlupdate = "UPDATE requests SET active= 2 WHERE `fromID` = $declined";
    if ($conn->query($sqlupdate) === TRUE) {  
    }
    } else {   
    $_SESSION['chatRequestNotification'] =  "Error: Could not Declined the Chat request Try again later ";
    $_SESSION['mode']= "warning";
    
    }


 

  }

   


?>

<!DOCTYPE html>
<html lang="en">
   
    <?php include_once"header.php" ?>

    <body data-layout="horizontal" style="padding-bottom: 2px !important;" data-topbar="dark">

        <!-- Begin page -->
        <div id="wrapper">

        <?php include_once"navigation.php" ?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page" id="content_start" >
                <div class="content">

                    <!-- Start Content-->
                    <div style="padding-left: 12px;padding-right: 12px;" class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="page-title">Chat Requests</h4>
                                    <p>Accept or decline chat Requests</p>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                            <li class="breadcrumb-item active">Requests</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div style="margin-bottom: 10px;" class="row">
                            <div class="col-xl-12">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Decine all</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Accept all</a>
                                            <!-- item-->
                                          
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Latest Requests</h4>
                                   

                                    <div class="table-responsive">
                                       
                                        <table class="table table-hover mb-0">
                                        <?php
                                                $fromID=$_SESSION['hasChatRequest'];
                                                $no=1;
                                                if( $fromID ){
                                            echo"
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Bio</th>
                                                <th>Date</th>
                                                <th>Accept</th>
                                                <th>Decline</th>
                                                
                                            </tr>

                                            </thead>
                                            ";
                                                }
                                            ?>
                                            <tbody>

                                                <?php
                                                $fromID=$_SESSION['hasChatRequest'];
                                                $no=1;
                                                if( $fromID ){
                                                    //get request
                                                    
                                                    $tsql= "SELECT * FROM requests WHERE toID = {$_SESSION['unique_id']} AND active=1";
                                                    $intake=$conn -> query($tsql);
                                                    if($intake-> num_rows > 0){ 
                                                        
                                                        while($trow =$intake -> fetch_assoc() ){
                                                            $_SESSION['userSql_id']=$trow['fromID'];
                                                            //loop to get user data
                                                            $userSql= "SELECT * FROM users WHERE unique_id = {$_SESSION['userSql_id']}";
                                                            $userintake=$conn -> query($userSql);
                                                            if($userintake-> num_rows > 0){ 
                                                                while($userrow =$userintake -> fetch_assoc() ){
                                                                    echo "
                                                       <tr>
                                                           <td> ". $no ."</td> 
                                                           <td> ". $userrow['fname'] ."</td>
                                                           <td> ". $userrow['bio'] ."</td>
                                                           <td> ". $trow['date'] ."</td>
                                                            <form method='POST' action='?' >
                                                           <td> <button name='acceptChat' type='submit' class='btn btn-icon waves-effect waves-light btn-success' value='$userrow[unique_id]'  > <i class='fas fa-check' ></i> </button> </td>
                                                           <td> <button name='declineChat' type='submit' class='btn btn-icon waves-effect waves-light btn-danger' value='$userrow[unique_id]' > <i class='fas fa-times' ></i> </button> </td>
                                                           </form>                                                    
                                                       </tr>
                                                       ";
                                                                }
                                                            }  
                                                            $no++;      
                                                                
                                                           


                                                          
                                                        }
                                                    }        
                                    
                                                }else{
                                                    echo "
                                                    <tr>
                                                        <td style='text-align: center;' colspan='6' > NO CHAT REQUEST  </td> 
                                                                                                          
                                                    </tr>
                                                    ";
                                                    
                                                }
                                                
                                                ?>
       

                                                
                                                
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- end col -->

                           
                            <div style="padding-right: 12px; padding-left: 12px;" class="col-xl-6">
                                <div class="card-box">
                                    <?php

                                    //get total users in the chat

                                    $tsql= "SELECT * FROM users " ;
                                    $intake=$conn -> query($tsql);
                                    $users_no=0;
                                    if($intake-> num_rows > 0){ 
                                        while($trow =$intake -> fetch_assoc() ){
                                    $users_no++;
                                        }
                                    }

                                    //get user connections
                                    $tsql= "SELECT * FROM relations WHERE ReceiverID = {$_SESSION['unique_id']} OR SenderID = {$_SESSION['unique_id']} " ;
                                    $intake=$conn -> query($tsql);
                                    $connection_no=0;
                                    if($intake-> num_rows > 0){ 
                                        while($trow =$intake -> fetch_assoc() ){
                                    $connection_no++;
                                        }
                                    } 
                                    
                                    $raw_percent = number_format((($connection_no/$users_no)*100), 1); 


                                    ?>

                        
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Connect To more users</a>
                                            <!-- item-->
                                           
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-4">Connection Ratings</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1 float-left" dir="ltr">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#10c469 "
                                                   data-bgColor="#F9B9B9" value="<?php echo $raw_percent; ?>"
                                                   data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                   data-thickness=".15"/>
                                        </div>

                                        <div class="widget-detail-1 text-right">
                                            <h2 class="font-weight-normal pt-2 mb-1"> <?php echo $connection_no ?> connection</h2>
                                            <p class="text-muted mb-1">of <?php echo $users_no ?> total users </p>
                                        </div>
                                    </div>

                             


                                </div>
                            </div>   

                            <div style="padding-right: 12px; padding-left: 12px; margin-bottom: 50px;" class="col-xl-6">
                                <div class="card-box">
                                    <?php
                                    $tsql= "SELECT * FROM messages WHERE incoming_msg_id = {$_SESSION['unique_id']} OR outgoing_msg_id = {$_SESSION['unique_id']} " ;
                                    $intake=$conn -> query($tsql);
                                    $connection_no=0;
                                    if($intake-> num_rows > 0){ 
                                        while($trow =$intake -> fetch_assoc() ){
                                    $connection_no++;
                                        }
                                    } 
                                    echo "$connection_no MEssages ";         
                                    ?>
        

                                    <h4 class="header-title mt-0 mb-3">Message Analytics</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-right">
                                            <span class="badge badge-success badge-pill float-left mt-3"> count <i class="mdi mdi-message-tex"></i> </span>
                                            <h2 class="font-weight-normal mb-1"> <?php echo "$connection_no ";  ?> </h2>
                                            <p class="text-muted mb-3">Total Messages </p>
                                        </div>
                                        <div class="progress progress-bar-alt-success progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                    aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 100%;">
                                                <span class="sr-only">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>   
                        
       
                         </div>       
                    
                      
                     
                        <!-- end row -->       
                        
                    </div> <!-- container-fluid -->
                    <?php include "internetcheck.php"; ?> 
                </div> <!-- content -->
                <?php include_once"footer.php" ?>
               

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <?php include"RightsideBar.php" ?>
        
        <!-- /Right-bar -->

        <?php include"modals.php";?>


        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/libs/custombox/custombox.min.js"></script>
        <script src="javascript/helper.js"></script>
        <!-- knob plugin -->
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <!--Morris Chart-->
         
        <script src="assets/libs/raphael/raphael.min.js"></script>
        <!-- Dashboard init js-->
         
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        <script src="assets/libs/toastr/toastr.min.js"></script>
        <script src="custom.js"></script>
        <!--EMOJI-->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        <script type="text/javascript" src="assets/emoji/emoji.js"></script>


        <?php
$update_message=$_SESSION['chatRequestNotification'];
if( isset( $update_message) ){
    $message = $_SESSION['chatRequestNotification'];
    $result =$_SESSION['mode'];
    $mode;
    switch ($result) {
        case 'success':
            $mode="success";
            break;
            case 'warning':
                $mode="error";
                break;
    }
 

    echo " <script>


   var k, f = -1,
    m = 0;
    var duration ='500';
    var HideDuration ='1000';
    var timeout ='10000';
    var extendedTimeout ='1000';
    var showEasing= 'swing';
    var hideEasing= 'linear';
    var showMethod= 'fadeIn';
    var hideMethod= 'fadeOut';
    
        //code start
        var t, o, e = '$mode', //info - success - warning - error
        a = '$message',
        n = '$result',
        s = duration,
        i = HideDuration,
        r = timeout,
        l = extendedTimeout,
        c = showEasing,
        p = hideEasing,
        d = showMethod,
        h = hideMethod,
        u = m++,
        g = $('#addClear').prop('checked');

        toastr.options = {
        closeButton: $('#closeButton').prop('checked'),
        debug: $('#debugInfo').prop('checked'),
        newestOnTop: $('#newestOnTop').prop('checked'),
        progressBar: true,
        positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
        preventDuplicates: $('#preventDuplicates').prop('checked'),
        onclick: null
        }
        , $('#addBehaviorOnToastClick').prop('checked') && (toastr.options.onclick = function() {
        alert('You can perform some custom action after a toast goes away')
        }), 300 && (toastr.options.showDuration = duration), HideDuration && (toastr.options.hideDuration = HideDuration), timeout && (toastr.options.timeOut = g ? 0 : timeout), extendedTimeout && (toastr.options.extendedTimeOut = g ? 0 : extendedTimeout), showEasing && (toastr.options.showEasing = showEasing), hideEasing && (toastr.options.hideEasing = hideEasing), showMethod && (toastr.options.showMethod = showMethod), hideMethod && (toastr.options.hideMethod = hideMethod), g && (t = (t = a) || '', a = t += '', toastr.options.tapToDismiss = !1), a || (++f === (o = ['', '', 'aq!', '', '']).length && (f = 0), a = o[f]), $('#toastrOptions').text('hi');
        var v = toastr[e](a, n);
        void 0 !== (k = v) && (v.find('#okBtn').length && v.delegate('#okBtn', 'click', function() {
        alert('you clicked me. i was toast #' + u + '. goodbye!'), v.remove()
        }), v.find('#surpriseBtn').length && v.delegate('#surpriseBtn', 'click', function() {
        alert('Surprise! you clicked me. i was toast #' + u + '. You could perform an action here.')
        }), v.find('.clear').length && v.delegate('.clear', 'click', function() {
        toastr.clear(v, {
            force: !0
        })
        }))

        //code End
       
  
  </script> ";
}

$_SESSION['chatRequestNotification'] =  null;
$_SESSION['mode']= null;




?>
       
    </body>
</html>
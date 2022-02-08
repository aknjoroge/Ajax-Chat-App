<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: index.php");
  }


?>

<!DOCTYPE html>
<html lang="en">
<?php include_once"header.php" ?>

    <body  data-layout="horizontal" data-topbar="dark">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Navigation Bar-->
            <?php include_once"navigation.php" ?>
            <!-- End Navigation Bar-->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div style="padding-right: 12px; padding-left: 12px;" class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="page-title">Profile Settings</h4>

                                   
                                    
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">

                            <div style="padding-right: 12px; padding-left: 12px;" class="col-sm-6">
                                <div class="card-box">
                                    <div style="text-align: center;" class=" ">
                                        <br>
                                        <img style="object-fit: cover ;height: 250px;width: 270px;"  src="php/images/<?php echo $row['img']; ?>"
                                                class="rounded-circle  img-thumbnail  mr-3" alt="profile-image">
                                       <br>
                                        <div style="text-align: center;" class=" ">
                                            <h4 class=" "><?php echo $row['fname']; ?></h4>
                                            <p   class="text-muted"><i> <?php echo $row['email']; ?></i> <br>
                                                 <a style="text-align: center;display: inline-block;" data-toggle="modal" data-target="#account" onclick="add_blur();"  class="social-list-item border-blue text-blue">
                                                    <i class="mdi mdi-pen"></i> </a> </p>
                                            <div >
                                        <div class="clearfix"></div>
                                    </div>
                                    </div>
                                    <!--/ meta -->

                                 </div>
                             </div> 
                          </div>    

                          <!---col two-->
                            <div style="padding-right: 12px; padding-left: 12px;" class="col-sm-6">
                             <div class="  card-box">
                                    Bio
                                    <br>
                                    <br>     
                                    <div class="form-control" >
                                    
                                        <p class="font-13"> <?php echo $row['bio']; ?> </p>
                                    </div>
                          
                                <div style="text-align: center;" >
                                
                                    <a   data-target="#bio" data-toggle="modal" onclick="add_blur();"  href="javascript: void(0);" class="social-list border-purple text-blue"><i
                                        class="mdi mdi-pen"></i>Edit bio </a>
                                </div>
                                </div>
                            </div>  
                        
                         <!--Row threee-->
                        
                         <div style="padding-right: 12px; padding-left: 12px;" class="col-sm-12">
                            <div class=" card-box">
                                <div class="profile-info-name">
                                    <div class="profile-info-detail overflow-hidden">
                                        <div >
                                            <form class="" method="POST" enctype="multipart/form-data" action="profile_changes.php">
                                                
                                                <label for="image">Upload a profile Picture </label>

                                                <input  id="image" class="form-control" name="image" type="file"  >
                                                &nbsp;&nbsp;
                                        </div>
                                        <br>
                                        <div class="form-control" >
                                                <label  for="notify">Enable Web Notification  &nbsp; <i class="mdi mdi-bell"></i> </label>
                                                &nbsp;
                                                <input   id="notify" name="notify" type="checkbox">
                                        </div>
                                        <div class="form-button">
                                            <br>
                                            <input type="submit" class="btn btn-success btn-rounded width-md waves-effect waves-light" value="Save">
                                        </form>
                                        </div>
                                        <br>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!--/ meta -->
                          </div> 
                         </div> 

                            <div style="padding-right: 12px; padding-left: 12px;" class="col-sm-12">
                                <div class="card-box">
                                    <div >
                                            <div style="text-align: left;" class="form-button">
                                                <button onclick="add_blur();" type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#staticBackdrop">
                                                    Delete Account
                                                </button>     
                                    </div>
                                </div>
                                </div>
                            </div>
                        
                       </div> <!--end of row -->

                   </div> <!-- container-fluid -->

                <!-- Footer Start -->
                <?php include_once"footer.php" ?>
                <!-- end Footer -->

            </div>
             <!--end of content-->
           </div>
            <!--end of page content-->
        </div> 
        <!-- END wrapper -->
        <!--  Modal -->
        <?php include"modals.php";?>
        <?php include"RightsideBar.php";?>
        <?php include "internetcheck.php"; ?> 
        
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/libs/custombox/custombox.min.js"></script>
        <script src="javascript/internet.js"></script>
        <script src="assets/js/app.min.js"></script>
        <script src="assets/libs/toastr/toastr.min.js"></script>
        <script src="custom.js"></script>
        <script src="javascript/main.js"></script>
        <!-- knob plugin -->

       


        <?php
$update_message=$_SESSION['userUpdate'];
if( isset( $update_message) ){
    $message = $_SESSION['userUpdate'];
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
    var duration ='300';
    var HideDuration ='1000';
    var timeout ='5000';
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

$_SESSION['userUpdate'] =  null;
$_SESSION['mode']= null;

?>

      
        
    </body>
</html>



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
                    <div class="container-fluid">

                     

                        <?php include"users.php" ?>


                       


                    
                        <?php include "internetcheck.php"; ?> 
                     
                        <!-- end row -->       
                        
                    </div> <!-- container-fluid -->
                
                </div> <!-- content -->

        
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
 

        <?php include"scripts.php";?>

      


        <?php
    
    $update_message=$_SESSION['chatRequest'];
    if( isset( $update_message) ){
        $message = $_SESSION['chatRequest'];
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
    
    $_SESSION['chatRequest'] =  null;
    $_SESSION['mode']= null;
    
    ?>
        
        
    </body>
</html>
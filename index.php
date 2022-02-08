<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: home.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techkey Support system</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme22.css">
   
</head>
<body>
    <div class="form-body without-side">

        <div class="website-logo">
            <a href="index.html">
                <div class="logo">
                    <img class="logo-size img_tk" src="images/techkey.png" alt="">
                </div>
            </a>
        </div>

        <div class="row">

            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/phone.png" alt="">
                </div>
                
            </div>

            <div class="img-holder2">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/phone2.png" alt="">
                </div>
                
            </div>

            <div class="form-holder ">
                <div class="form-content">

                    <div class="form-items">
                        <h3>Login</h3>
                        
                        <p>Chat App Solution for you and your clients.</p>
                        
                        <form  action="#" method="POST" enctype="multipart/form-data" autocomplete="off" id="form_one" >
                        <div id="1error-text" style="margin-left: 15px;color: red;" ></div>
                        
                            <input class="form-control" type="text" name="email" placeholder="E-mail Address" required>
                            <p class="  privacy">We'll never share your email with anyone else.</p>
                            <input class="form-control " id="password_field" type="password" name="password" placeholder="Password" required>
                            <i class="fas fa-eye" id="pass_reveal" ></i>
                            
                            <div class="form-button ">
                                <button id="submit" onclick="Verify_login()" class="ibtn js_btn">Login</button> <a href="password.php" class="forgot-text" > Forgot password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Or </div>
                            
                            <a href="#" class="register-btn ibtn btn-forget" >Register new account</a>
                        </div>
                        <p>&copy;   <a  target="_blank" class="copy-text">Techkey</a> </p>
                        <div class="page-links">
                          
                        </div>
                    </div>


                    <!--Registration Form-->

                    <div class="form-sent" >
                        
                        <h3>Register new account</h3>
                        <p>Access our Free, No adds, Private Message system .</p>

                        
                       
                        <form method="POST" action="php/register.php"  enctype="multipart/form-data2" autocomplete="off" id="form_two" >
                        <?php
                        if(isset($_SESSION['Sigup_error'] )){
                            $error=$_SESSION['Sigup_error'];

                            echo "
                            <div id='error-text2' style='margin-left: 15px;color: red;' >$error </div>
                            ";
                        }else{

                        }
                        
                        ?>
                        
                            <input class="form-control" type="text" name="lname" placeholder="Full Name" required>

                            <input class="form-control" type="text" name="fname" placeholder="App Username" required>
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address" required >
                            <p  style="text-align: left;" class="privacy">We'll never share your email with anyone else.</p>

                            <input class="form-control"  id="password_field2" type="password" name="password" placeholder="Password" required>
                            <i style="text-align: left;margin: 10px;display: block;" class="fas fa-eye" id="pass_reveal2" ></i>


                            <div class="form-button">
                               
                                <!--onclick="signup()"-->
                                <button id="register"  type="register" class="ibtn">Register</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Support</div>
                            <a href="mailto:info@techkey.co.ke"><i class="fab fa-facebook-messenger"></i>Mail Us</a>
                        </div>
                        <br>
                        <div class="page-links">
                           
                            <a  onclick="re_login()" class="register-btn ibtn btn-login" style="font-size: 18px;" > <strong>Back to Login</strong> </a>
                            
                        </div>
                        
                        <p class="add"> Want your own chat system? Contact us to get a Quote  .</p>

                            
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
        <br>
           <br>
           <br>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!--imported-->

<script src="javascript/login.js"></script>
<script src="javascript/password_reveal.js"></script>
<!-- <script src="javascript/signup.js"></script> -->

</body>
</html>
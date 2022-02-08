
<!--DElete Account-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Account?</h5>
                    <button onclick="remove_blur();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This Action cannot be reversed, all your data will be lost.</p>
                    <form action="profile_changes.php" method="POST">
                        <label for=""> Password</label>
                        <input class="form-control" type="password" name="password" id="password">
                   
                </div>
                <div class="modal-footer">
                    <button onclick="remove_blur();" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input onclick="remove_blur();" class="btn btn-danger" type="submit" value="Delete">
                    
                    </form>
                </div>
            </div>
            </div>
        </div>

 <!--Edit Bio-->
 <div class="modal fade" id="bio" data-backdrop="static" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalScrollableTitle">Bio Edit</h4>
                                                    <button onclick="remove_blur();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Add a bio</p>
                                                   <form action="profile_changes.php" method="POST">

                                                    <input class="form-control" type="text" name="bio" id="bio" value=" <?php echo $row['bio']; ?>" >
                                                    
                                                       
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button onclick="remove_blur();" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    
                                                <input onclick="remove_blur();" type="submit"  class="btn btn-success" value="Save">   
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>       

<!--Account Detail-->
  <div class="modal fade" style="z-index: 10000;" id="account" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Email | Name Edit</h5>
                    <button onclick="remove_blur();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Update Username and Email</p>
                    <form action="profile_changes.php" method="POST">
                        <label for=""> Username</label>
                        <input class="form-control" type="text" name="name" id="name"  value="<?php echo $row['fname']; ?>" >
                        <label for=""> Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?php echo $row['email']; ?>"> 
                   
                </div>
                <div class="modal-footer">
                    <button onclick="remove_blur();" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input onclick="remove_blur();"  class="btn btn-success" type="submit" value="Save">
                    
                    </form>
                </div>
            </div>
            </div>
        </div>                                   

 
 <!--User data-->

 <div class="modal fade" style="z-index: 10000;" id="userinfo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">User</h5>
            <button type="button" onclick="remove_blur();" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Public info</p>
            <form >
                <label for=""> Name  <?php echo $_SESSION['currentUserProfileName']; ?> </label>
                <br>
                <label for=""> Bio  <?php echo $_SESSION['currentUserProfileBio']; ?> </label>
                <br>
                <label for=""> Registered  <?php echo $_SESSION['currentUserProfiledate']; ?> </label>
                
           
        </div>
        <div class="modal-footer">

        <button name='block' disabled onclick="remove_blur();" type='submit' class='btn btn-icon waves-effect waves-light btn-danger' value='$userrow[unique_id]' >  Block <i class='fas fa-times' ></i> </button>
        &nbsp;&nbsp;
            <input onclick="remove_blur();" data-dismiss="modal"  class="btn btn-success" type="submit" value="Done">
            
            </form>
        </div>
    </div>
    </div>
</div>      



<!--Message info -->

<div class="modal fade" style="z-index: 10000;" id="messageinfo" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Email | Name Edit</h5>
                    <button onclick="remove_blur();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Update Username and Email</p>
                    <form action="profile_changes.php" method="POST">
                        <label for=""> Username</label>
                        <input class="form-control" type="text" name="name" id="name"  value="<?php echo $row['fname']; ?>" >
                        <label for=""> Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?php echo $row['email']; ?>"> 
                   
                </div>
                <div class="modal-footer">
                    <button onclick="remove_blur();" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input onclick="remove_blur();"  class="btn btn-success" type="submit" value="Save">
                    
                    </form>
                </div>
            </div>
            </div>
        </div>   


 <!--MAIL modal-->
 <div id="custom-modal" class="modal-demo text-left">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h5 class="custom-modal-title">Compose Mail</h5>
            <div class="card-box mb-0">

                <form action="php/Mail/" method="POST" role="form" >
                    <div class="form-group">
                        To:
                        <select class="form-control" name="email_contact" id="email">
                            <option value="info@techkey.co.ke">info@techkey.co.ke (Default)</option>
                            <option value="alex@techkey.co.ke">alex@techkey.co.ke</option>
                            <option value="martin@techkey.co.ke">martin@techkey.co.ke</option>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="padding-right: 12px; padding-left: 12px;" class="col-md-6">
                                <input type="number" name="user_phone" class="form-control" placeholder="Your Phone">
                            </div>
                            <div style="padding-right: 12px; padding-left: 12px;" class="col-md-6">
                                <input type="text" name="user_name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_subject" placeholder="Subject">
                    </div>

                    <div class="form-group">

                        <textarea name="send_message" class="form-control" id="send_message" cols="30" rows="10" placeholder="message"></textarea>
                        
                    </div>

                    <div class="btn-toolbar form-group mb-0">
                        <div class="float-right">
                            <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i
                                    class="far fa-save"></i></button>
                            <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i
                                    class="far fa-trash-alt"></i></button>
                            <button class="btn btn-purple waves-effect waves-light"><span>Send</span> <i
                                    class="fas fa-paper-plane ml-1"></i></button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
 <!--end of mail modal-->


<!--Message info OFF canvas-->
<div  style="background-color: #282e38" class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMessage" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasMessageLabel" >Message ID </h5>
      <button  data-bs-dismiss="offcanvas" aria-label="Close" class='btn btn-icon waves-effect waves-light btn-info' > <i class='fas fa-times' ></i> </button>
       
    </div>
    <div class="offcanvas-body">
      <div>
       <h4  >USER ID </h4>
      </div>
      <h2 id="OffcanvasMessageText"  >Hi how are you</h2>
      <hr>
      <p id="OffcanvasDate"  >tue / 3</p>
      <form action="php/messageDelete.php" method="post">
          <input style="opacity: 0;" checked   type="radio"  name="deleteID" id="deleteID" >
          <input style="opacity: 0;" checked   type="radio"  name="messageTXT" id="messageTXT" >
      <button disabled data-bs-dismiss="offcanvas"  class='btn btn-icon waves-effect waves-light btn-danger' > <i class='mdi mdi-delete' ></i> Delete message </button>
      <br> <small style="margin-left: 33px;" >Deleted Messages cannot be recovered</small>
  </form>
  
    </div>
  </div>
  

<!-- Message From Right off canvas-->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="RightoffcanvasMessageLabel" >Message ID </h5>
        <button  data-bs-dismiss="offcanvas" aria-label="Close" class='btn btn-icon waves-effect waves-light btn-info' > <i class='fas fa-times' ></i> </button>
     
    </div>
    <div class="offcanvas-body">
        <div>
            <h4  >USER ID </h4>
           </div>
           <h2 id="RightOffcanvasMessageText"  >Hi how are you</h2>
           <hr>

           <p id="RightOffcanvasDate"  >tue / 3</p>
      <form action="php/messageDelete.php" method="post">
          <input style="opacity: 0;" checked   type="radio"  name="RightdeleteID" id="RightdeleteID" >
          <input style="opacity: 0;" checked   type="radio"  name="RightmessageTXT" id="RightmessageTXT" >
      <button disabled data-bs-dismiss="offcanvas"  class='btn btn-icon waves-effect waves-light btn-danger' > <i class='mdi mdi-delete' ></i> Delete message </button>
      <br> <small style="margin-left: 33px;" >Deleted Messages cannot be recovered</small>
  </form>

    </div>
  </div>


<!--CHAT SYSTEM INFO MODALS-->



<div class="offcanvas offcanvas-top"  tabindex="-1" id="offcanvasinfo" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasTopLabel">Chat Support system info</h5>
    <button type="button"  class='btn btn-icon waves-effect waves-light btn-info' data-bs-dismiss="offcanvas" aria-label="Close"><i class='mdi mdi-window-close' ></i></button>
  </div>
  <div class="offcanvas-body">
    Php version  : 7.x.x <br>
    Mysqlnd      : 7.x.x <br>
    Tracing      : n/a  <br>
    Session      : Enabled <br>
    cURL         : Enabled <br>
    JavaScript   : ES6  <br>
    XHR          : Enabled  <br>
    jQuery       : 3.3   <br>
    emojionearea : 3.4.x <br>
    Bootstrap    : 4.5.x  <br>

   <strong>App Version: 1.0.0</strong>  <br>
   <p> <strong> System Updates will be released periodically </strong>  </p> 
   &copy;Techkey
  </div>
</div>
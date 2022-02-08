
<?php

session_start();
include_once "php/config.php";
if(!isset($_SESSION['unique_id'])){
  header("location: index.php");
}


$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if(mysqli_num_rows($sql) > 0){
$row = mysqli_fetch_assoc($sql);
}else{
    $_SESSION['userUpdate']= "SQL error";
    $_SESSION['mode']= "warning";
    header("location: profile.php");
}

$email=$_POST['email'];
$bio=$_POST['bio'];
$password=$_POST['password'];
$name=$_POST['name'];


 

if ( !(empty($email)) ){
    $id=$_SESSION['unique_id'];
    $sql = "UPDATE users SET fname= '$name' , email= '$email' WHERE `unique_id` = $id";
    // mysqli_query($conn,$sql);

     if ($conn->query($sql) === TRUE) {
        $_SESSION['userUpdate']= "Updated successfully";
        $_SESSION['mode']= "success";

        header("location: profile.php");
       } else {
        $_SESSION['userUpdate'] =  "Error: Details Update Failed ";
        $_SESSION['mode']= "warning";
        header("location: profile.php");
       }
}

if(!(empty($bio)) ){

    $id=$_SESSION['unique_id'];
    $sql = "UPDATE users SET bio= '$bio'  WHERE `unique_id` = $id";
    // mysqli_query($conn,$sql);

     if ($conn->query($sql) === TRUE) {
        $_SESSION['userUpdate']= "Updated successfully";
        $_SESSION['mode']= "success";
        header("location: profile.php");
       } else {
        $_SESSION['userUpdate'] =  "Error: Bio Update Failed ";
        $_SESSION['mode']= "warning";
        header("location: profile.php");
       }
}

if( !(empty($password))){
    //check password
    $receivedPass = md5($password);
    echo $row['password']."<br>";

    if($row['password']==$receivedPass){

        $id=$_SESSION['unique_id'];
        $sql = "UPDATE users SET active= '2'  WHERE `unique_id` = $id";
        
        if ($conn->query($sql) === TRUE) {

            session_destroy();
            header("location: index.php");

           } else {
            $_SESSION['userUpdate'] =  "Error: Try Again Later ";
            $_SESSION['mode']= "warning";
            header("location: profile.php");
           }
    
    }
    else{
        $_SESSION['userUpdate'] =  "incorrect Password  ";
        $_SESSION['mode']= "warning";
        header("location: profile.php");
    
    }    


}else{
    $_SESSION['userUpdate'] =  " . ";
    $_SESSION['mode']= "success";
    header("location: profile.php");

}

//START profile image
if(isset($_FILES['image'])){

    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $img_explode = explode('.',$img_name);
    $img_ext = end($img_explode);
    $extensions = ["jpeg", "png", "jpg"];
    if(in_array($img_ext, $extensions) === true){
        $types = ["image/jpeg", "image/jpg", "image/png"];
        if(in_array($img_type, $types) === true){

            $time = time();
            $new_img_name = $time.$img_name;

            if(move_uploaded_file($tmp_name,"php/images/".$new_img_name)){

             $id=$_SESSION['unique_id'];
            $sql = "UPDATE users SET img= '$new_img_name'  WHERE `unique_id` = $id";
            
            if ($conn->query($sql) === TRUE) {

                $_SESSION['userUpdate']= "Updated successfully";
                $_SESSION['mode']= "success";
                header("location: profile.php");

            } else {
                $_SESSION['userUpdate'] =  "Error: Try Again Later ";
                $_SESSION['mode']= "warning";
                header("location: profile.php");
            }


            }else{
                echo "LOOP FAIL";
                exit;
            }

        }else{
            $_SESSION['userUpdate'] =  "Please upload an image file - jpeg, png, jpg  ";
            $_SESSION['mode']= "warning";
            header("location: profile.php");
        }
    }else{
        $_SESSION['userUpdate'] =  "Please upload an image file - jpeg, png, jpg  ";
        $_SESSION['mode']= "warning";
        header("location: profile.php");

       
    }



}

//END profile image






?>




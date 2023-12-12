<?php
session_start();
error_reporting(E_ALL);
include_once"../classes/Register.php";
include_once"../utilities/sanitizer.php";


$sanitizer = new Sanitize();
            //validation
if($_POST){
    if(isset($_POST["register"])){
        $name=$sanitizer->sanitizeString($_POST["name"]);
        $phone=$sanitizer->sanitizeString($_POST["phone"]);
        $email=$sanitizer->sanitizeEmail($_POST["email"]);
        $dob=$sanitizer->sanitizeString($_POST["dob"]);
        $address=$sanitizer->sanitizeString($_POST["address"]);
        $upload=($_FILES["upload"]);
        $password=$sanitizer->sanitizeString($_POST["password"]);

        if(empty($name)||empty($phone)||empty($email)||empty($dob)||empty($address)||empty($upload)||empty($password)){
            //keep error message inside session
            $_SESSION["reg_error"]="All fields are required";
            // header("location:../admin.php");
            // echo "its from this side";
            exit();
         }

         //upload_file
         $allowed=["pdf","doc","docx"];
         $filename=$upload["name"];
         $arrfilename=explode(".",$filename);
         $file_ext= end($arrfilename);
         if(!in_array($file_ext,$allowed)){
              echo "pleasse upload an image with file pdf,doc or docx";
              exit();
         }
             $final_file="user" . time() . "." . $file_ext;
             $final_file = $sanitizer->sanitizeString($final_file); ;
             $destination="../Upload/$final_file";
             $tempo=$upload["tmp_name"];
            $fileUploaded=move_uploaded_file($tempo,$destination);
 
         //passsword length
         if(strlen($password)<5){
             $_SESSION["reg_error"]="Password legth must be at least 5 character";
            header("location:../admin.php");
            // echo "its from that side";
            exit();
         }
         $pass= password_hash($password,PASSWORD_DEFAULT); 
         
        
         $user1=new User();
         $response=$user1->register($name,$phone,$email,$dob,$address,$final_file,$pass);
        if($response){
           
            $_SESSION["add_user"]="Staff added successfully";
            header("location:../login.php");
            // echo "its from last side";
        }else{
            echo"user not add ";
        }
    }
}

?>
<?php
session_start();
error_reporting(E_ALL);
include_once"../classes/Register.php";
include_once"../utilities/sanitizer.php";


$sanitizer = new Sanitize();
 


            
if($_POST){
    if(isset($_POST["update"])){
        $name=$sanitizer->sanitizeString($_POST["name"]);
        $phone=$sanitizer->sanitizeString($_POST["phone"]);
        $email=$sanitizer->sanitizeEmail($_POST["email"]);
        $dob=$sanitizer->sanitizeString($_POST["dob"]);
        $address=$sanitizer->sanitizeString($_POST["address"]);
        $upload=($_FILES["upload"]);
        $id=$_POST["id"];
        

        if(empty($name)||empty($phone)||empty($email)||empty($dob)||empty($address)||empty($upload)){
            $_SESSION["reg_error"]="All fields are required";
            header("location:../main.php");
           
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
             $final_file=$sanitizer->sanitizeString($final_file);
             $destination="../Upload/$final_file";
             $tempo=$upload["tmp_name"];
             $fileUploaded=move_uploaded_file($tempo,$destination);
            
         $user1=new User();
         $response=$user1->update($name,$phone,$email,$dob,$address,$final_file,$id);
        if($response === true){
           
            $_SESSION["add_user"]="Staff added successfully";
            header("location:../main.php");
            // echo "its from last side";
        }else{
            echo"user not add ";
        }
    }
}

?>
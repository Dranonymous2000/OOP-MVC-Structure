<?php
    session_start();
    error_reporting(E_ALL);
    require_once"../classes/register.php";
    if(isset($_POST["delete_btn"])){
       
        $user_id=$_POST["id"];

        $user= new User;
        $deleted_user=$user->delete($user_id);
        if($deleted_user){
            $_SESSION["deleted_user"]="User deleted succesfully";
            exit();
        }else{
                    echo "user deleted successfully";
        }

    }

?>
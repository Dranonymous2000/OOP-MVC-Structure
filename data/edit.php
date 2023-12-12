<?php
session_start();

$user = null; // Initialize user variable

if (isset($_SESSION['id'])) {
    $id = $_SESSION["id"];
}else{
  header('location:login.php');
}

require_once "classes/register.php";
$userr = new User();
$user = $userr->get_user_detail($id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="Assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="fontawesome/css/all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="Assets/css/animate.css" type="text/css">
    <link rel="stylesheet" href="Assets/css/mainpage.css" type="text/css">
</head>
<body>
    <div class="row frameone">
        <div class="col">
                <div class="row">
                    <div class="col">
                        <h5 class="text-center test">TEST INTERVIEW</h5> 
                    </div>
                </div>
        </div>
    </div>
    <!-- alert message for add department -->
    <?php 
if(isset($_SESSION["reg_error"])){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?php echo $_SESSION["reg_error"];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    unset($_SESSION["reg_error"]);
}
?>

     <!-- alert for deleteing department -->

    <div class="row">
        <div class="col-lg-8 col-md-6 col-sm-12 px-5">
        <form action="Process/edit_process.php" method="post" class="" enctype="multipart/form-data">
                    <label for="Username" style="color:black;">Name</label>
                    <input type="text" name="name" value="<?php echo $user["name"] ?>" class="form-control " required>
                    <label for="Username" style="color:black;">Phone Number</label>
                    <input type="text" name="phone" value="<?php echo $user["phone"] ?>"  class="form-control " required>
                    <label for="Username" style="color:black;">Email</label>
                    <input type="email" name="email" value="<?php echo $user["email"] ?>"  class="form-control " required>
                    <label for="Username" style="color:black;">Date Of Birth</label>
                    <input type="date" name="dob" value="<?php echo $user["dob"] ?>"  class="form-control " required>
                    <label for="Username" style="color:black;">Address</label>
                    <input type="text" name="address" value="<?php echo $user["address"] ?>" class="form-control " required>
                    <label for="Username" style="color:black;">Upload CV</label>
                    <input type="file" name="upload" value="<?php echo $user["upload"] ?>" class="form-control" required>
                    <input type="hidden" name="id" class="form-control enter" value="<?php echo $user["id"]; ?>">
                    <a href=""> <button type="submit" name="update" class="btn btn-success"> update</button></a>
                </form>
        </div>

    </div>
    
</body>
</html>
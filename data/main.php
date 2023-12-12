
<?php
session_start();
include_once  "guards/user_guard.php";
$user = null; 

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
    <title>test</title>
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

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">
                <h1>User Profile</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">D.O.B</th>
                    <th scope="col">Address</th>
                    <th scope="col">Upload</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php  $sn = 1; ?>
                                                                        
                  <tr>
                    <th scope="row"><?php echo $sn++; ?></th>
                    <td><?php echo $user["name"] ?></td>
                    <td><?php echo $user["phone"] ?></td>
                    <td><?php echo $user["email"] ?></td>
                    <td><?php echo $user["dob"] ?></td>
                    <td><?php echo $user["address"] ?></td>
                    <td><?php echo $user["upload"] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $user["id"];?>"> <button class="btn btn-primary" type="submit">Edit</button></a>
                        <form action="process/delete.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo$user["id"]; ?>">
                                                    <button type="submit" class="btn btn-sm btn-danger" name="delete_btn" style="padding-right:5px;">Delete</button>
                        </form> 

                    </td>
                  </tr>
                  
                </tbody>
              </table>

        
        </div>

    </div>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payswift</title>
    <link href="Assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="fontawesome/css/all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="Assets/css/animate.css" type="text/css">
    <link rel="stylesheet" href="Assets/css/main.css" type="text/css">
</head>
<body>
    <div class="row">
        <div class="col-md-5 frameone">
            <h2 class="text-center one"> REGISTER HERE</h2>
            <p class=" text-center two">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae laborum necessitatibus blanditiis doloribus dolor nulla nam ipsa illo at, id invent</p>

        </div>
        <div class="offset-md-1 col-md-5">

            <div id="reg2">
                <form action="Process/registration_process.php" method="post" class="filler" enctype="multipart/form-data">
                   
                    <label for="Username">Name</label>
                    <input type="text" name="name" class="form-control" required>
                    <label for="Username">Phone Number</label>
                    <input type="text" name="phone"  class="form-control" required>
                    <label for="Username">Email</label>
                    <input type="email" name="email"  class="form-control " required>
                    <label for="Username">Date Of Birth</label>
                    <input type="date" name="dob"  class="form-control " required>
                    <label for="Username">Address</label>
                    <input type="text" name="address"  class="form-control " required>
                    <label for="Username">Upload CV</label>
                    <input type="file" name="upload"  class="form-control"required >
                    <label for="password"> Password</label>
                    <input type="password" name="password"  class="form-control mb-3 " required>
                    <a href=""> <button type="submit" name="register" class="btn btn-success"> Register</button></a> Already Have an Account?<a href="login.php"> Sign In</a>
                </form>
            </div>
          
        </div>
    </div>
<!-- Modal -->



                        

                   
                    <script src="jquery.js" type="text/javascript">
		
                    </script>
                
                    <script type="text/javascript">
                    $(document).ready(function(){
                        $('#test').click(function(){
                        $('#signup').show();
                       
                    })
                      })
                    </script>
                    <script src="bootstrap/js/bootstrap.bundle.min.js" type="text/javascript">

                    </script>
</body>
</html>
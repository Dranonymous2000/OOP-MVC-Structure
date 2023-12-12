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
            <h2 class="text-center one"> LOGIN HERE</h2>
            <p class=" text-center two">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore doloremque iure quam ipsam saepe recusandae cumque velit sint nesciunt molestias architecto ipsa, libero soluta officia eaque magnam dolorum. Accusamus, laborum.</p>

        </div>
        <div class="offset-md-1 col-md-5">

            <div id="reg2">
                <form action="process/login_process.php" method="post" class="fill" >
                    <h2 class="text-center">Test Page</h2>
                    <p class="text-center" style="color: white;">Enter your Phone Number and password</p>
                    <label for="Username">Email</label>
                    <input type="text" name="email" class="form-control enter">
                    <label for="password"> Password</label>
                    <input type="password" name="password" class="form-control enter">
                    <input type="submit"  class="btn btn-success form-control enter" name="login_submit" value="Log in">

                    
                    <h6 class="text-center"> Dont have an account?<a href="index.php"> Sign Up</a> 

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
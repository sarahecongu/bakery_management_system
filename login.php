<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
    <title>End Of year project</title>
</head>
<?php
// include("navbar.php");
?>
<body>
    <div class="container mt-5 w-50 ">
        <div class="row justify-content-center wrapper" id="login-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card rounded-left p-4">
                        <h1 class="text-center font-weight-bold text-primary">Login In</h1>
                        <hr class="my-3">
                        <form action="" class="px-3" method="POST" id="login-form">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email address"
                                    name="email" required>
                            </div>
                            <!-- password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                    name="pwd" required>
                            </div>
                            <!-- button -->
                            <div class="form-group d-flex">
                                <div class="custom-control custom-checkbox flex-grow-1">
                                    <input type="checkbox" name="rem" class="custom-control-input" id="customCheck">
                                    <label for="customCheck" class="custom-control-label">Remember Me</label>

                                </div>
                            
                           
                            <!-- forgot password -->
                            <div class="forgot ml-auto">
                                <a href="#" id="forgot-link">Forgot Password</a>
                            </div>
                            </div>
                            <div class="no account ">
                                <a href="register.php" id="account-link">No Account?</a>
                            </div>
                            
                           
                          
                            <!-- submit button -->
                            <div class="form-group mt-3 ">
                                <input type="submit" value="Login" id="login-btn"
                                    class="btn btn-primary w-100">
                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    <!-- forgot password reset -->



    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
        <!-- script -->
        <!-- <script>
        $(document).ready(function(){
            alert('hello');
        });
        </script> -->
</body>

</html>
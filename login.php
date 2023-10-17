<?php
include('includes/core.php');
$user = new User();
$error = '';

try {
    if (isset($_POST['login']))
        ;
    $user->email = $_POST['email'];
    $user->pwd = $_POST['pwd'];
    $error = $user->Login();

} catch (PDOException $e) {
    echo $e->getMessage();

}
?>


<?php
include('partials/header.php');
?>
<div class="container mt-5 w-50 ">
    <div class="row justify-content-center wrapper" id="login-box">
        <div class="col-lg-10 my-auto">
            <div class="card-group">
                <div class="card rounded-left p-4">
                    <h1 class="text-center font-weight-bold text-primary">Login In</h1>
                    <hr class="my-3">
                    <form action="login.php" class="px-3" method="POST" id="login-form">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email address">
                        </div>
                        <!-- password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="pwd" placeholder="Enter password">
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
                            <input type="submit" value="Login" id="login-btn" name="login"
                                class="btn btn-primary w-100">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

</div>
<!-- forgot password reset -->



<?php
include('partials/footer.php');
?>
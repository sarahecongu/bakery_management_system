<?php
include("includes/core.php");
$user = new User();
$register_message = '';


try {
    if (isset($_POST['register'])) {

        
        // Picking Data from session
        $first_name = trim(htmlspecialchars($_POST['first_name']));
        $last_name = trim(htmlspecialchars($_POST['last_name']));
        $email = trim($_POST['email']);
        $password = trim($_POST['pwd']);

        // Setting Attributes
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->user_type_id = 4;
        $user->pwd = $password;

       
        // Validate 
       $register_message =  $user->Register();

       
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<?php
    include('partials/header.php');
    ?>
    <div class="container mt-4 w-50">
        <div class="row justify-content-center wrapper">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card rounded-left p-4">
                        <h1 class="text-center font-weight-bold text-primary">Register</h1>
                        <hr class="my-3">
                        <form action="register.php" class="px-3" method="POST">
                        <?= $register_message ?>
                            <!-- name -->
                        <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="firstname" class="form-control"  name="first_name" placeholder="Enter firstname ">
                            </div>
                            <!-- second -->
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="lastname" class="form-control" name="last_name" placeholder="Enter lastname address"
                                    >
                            </div>
                            <!-- email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email address"
        >
                            </div>
                            <!-- password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="pwd" placeholder="Enter password" >
                            </div>
                            
                            <div class="have account float-right">
                                <a href="login.php" name="have account-link">Have Account?</a>
                            </div>
                         
                            <!-- submit button -->
                            <div class="form-group">
                                <input type="submit" value="Sign Up" name="register"
                                    class="btn btn-primary btn-md w-100 mt-4 btn-block myBtn">
                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>



    <?php
    include('partials/footer.php');
    ?>
<?php
require_once('includes/autoload_custom.php');
$session = new SessionManager;
$session->start();

$user = new User();
$error = '';


try {
    
    if (isset($_POST['login'])){
     $user->email = trim($_POST['email']);
     $user->pwd = trim($_POST['pwd']);
    $user->Login();
    }
   

} catch (PDOException $e) {
 $error =  $e->getMessage();

}
?>

<style>
      
body {
    background-image: url("images/slice.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
}

.login{
    color: rgb(76, 9, 9);
}
#login-btn{
    background: rgb(76, 9, 9);
    border-color: rgb(76, 9, 9);
}
</style>
<?php
    include('partials/header.php');
    ?>

    <div class="container mt-5 w-50 ">
        <div class="row justify-content-center wrapper" id="login-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card rounded-left p-4">
                        <h1 class="text-center font-weight-bold login">Log In</h1>
                        <hr class="my-3">
                        
                        <form action="login.php" class="px-3" method="POST">
                        <?php
                        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                            echo '<div class="error-container">';
                            foreach ($_SESSION['error'] as $error) {
                                echo '<div class="message">' . $error . '</div>';
                            }
                            echo '</div>';
                           
                        }
                        unset($_SESSION['error']);
                        ?>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" placeholder="Enter email address" name="email">
                            </div>
                            <!-- password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Enter password" name="pwd" >
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
                                <input type="submit" value="Login" id="login-btn" name= "login"
                                    class="btn btn-primary w-100">
                            </div>

                        </form>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>

</div>
<?php
include("alert.php");
?>



<script>
    // Live toast action
  // var toastTrigger = document.getElementById('liveToastBtn')
  // var toastLiveExample = document.getElementById('liveToast')
  // if (toastTrigger) {
  //   toastTrigger.addEventListener('click', function () {
  //     var toast = new bootstrap.Toast(toastLiveExample)

  //     toast.show()
  //   })

  function toastDisplay(){ 

    
    let sessionMessage = sessionStorage.getItem('message');
    console.log(sessionMessage);

  if (sessionMessage) {

    // Show the toast
    var toast = new bootstrap.Toast(document.getElementById('liveToast'));
    toast.show();
    
    // Clear the session_message to avoid showing the same message again
    sessionStorage.removeItem('message');

  }
  }

  </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>


<script>
  // Trigger toast
 toastDisplay();
<?php 

// Clear from Session
 if(isset($_SESSION['message'])){
 unset($_SESSION['message']);
  }
?>

</script>

</body>

</html>
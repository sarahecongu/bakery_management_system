
<?php
require_once('includes/autoload_custom.php');
$session = new SessionManager;
$session->start();

$user = new User();
$error = '';
try {
    if (isset($_POST['register'])) {

        // Set User Parameters
        $user->first_name = trim(htmlspecialchars($_POST['first_name']));
        $user->last_name = trim(htmlspecialchars($_POST['last_name']));
        $user->email = trim($_POST['email']);
        $user->user_type_id = 4;
        $user->pwd = trim($_POST['pwd']);
        
        $user->Register();
       
     }
       
} catch (PDOException $e) {
    $error = $e ->getMessage();

}

?>
<style>
    body {
        background-image: url("images/slice.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
    }

    .register {
        color: rgb(76, 9, 9);
    }

    #reg {
        background: rgb(76, 9, 9);
        border-color: rgb(76, 9, 9);
    }

    .container {
        margin-top: 4vh;
        width: 700px !important;
    }

    @media only screen and (max-width: 768px) {
        .wrapper {
            width: 90%;
        }

        .card-group {
            flex-direction: column;
        }

        .card {
            border-radius: 0;
        }
    }

    @media only screen and (max-width: 600px) {
        .wrapper {
            width: 100%;
        }
        .container {
        width: 70%;  
    }
    }
</style>

<?php
    include('partials/header.php');
    ?>
    
    <div class="container mt-4">
        <div class="row justify-content-center wrapper">
            <div class="col-lg-10 my-auto">
                <div class="card-group">
                    <div class="card rounded-left p-4">

                        <h1 class="text-center font-weight-bold register">Register</h1>
                        <hr class="my-3">
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
                        <form action="register.php" class="px-3" method="POST">
                        
                            <!-- name -->
                        <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control"  name="first_name" placeholder="Enter firstname">
                            </div>
                            <!-- second -->
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter lastname address"
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
                                <input type="password" class="form-control" name="pwd" placeholder="Enter password">
                            </div>
                            
                            <div class="have account float-right">
                                <a href="login.php" name="have account-link">Have Account?</a>
                            </div>

                            <?php if(isset( $_POST['cart_token'])): ?>
                            <input type="hidden" name="cart_token" value="<?php echo $_POST['cart_token'] ?>">
                            <?php endif ?>
                         
                            <!-- submit button -->
                            <div class="form-group">
                                <input type="submit" value="Register" id="reg" name="register"
                                    class="btn btn-primary btn-md w-100 mt-4 btn-block myBtn">
                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    <?php
include("alert.php");

?>


    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
<script src="main.js"></script>

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
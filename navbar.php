<style>
  .form-control{
    width: 300px;
    border-radius: 50px;
    border: none;
    margin-bottom: .2rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-left: 100px;
    
}

</style>
<?php
include('includes/core.php');

$user = new User();
?>
<nav class="navbar navbar-expand-lg navbar-dark">
  <!-- Logo on the left -->
  <a class="navbar-brand" href="">
    <img src="images/logos.png" alt="">
  </a>

  <!-- Toggler button for collapsed menu on small screens -->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

      <!-- search  -->
      <div class="form-group text-center">
              <input class="form-control mx-auto mt-5"placeholder="Search for Products...">
      </div>

      <!-- Navigation links on the right -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  font-weight-bold" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  font-weight-bold" href="sub_categories.php">Menus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="#"> Contact Us</i></a>

      </li>
      <?php

        // else {
          ?>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="login.php">Login</i></a>

          </li>
          <li class="nav-item">
            <a class="nav-link font-weight-bold" href="register.php">Register</i></a>

          </li>
        <?php
      //   }
      // } catch (PDOException $e) {
      //   echo $e->getMessage();
      // }
      ?>

      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
      </li>
    </ul>
  </div>
</nav>
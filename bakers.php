<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./css/dashboard.css">
    <title>Dashboard</title>
    <style>
  
  .navbar-brand img{
    height: 70px; 
    width: 100px;
    
    
  }
  
  .nav-link {
    color: white; 
 
  }
  
  .nav-link:hover {
    color: #be6a0b; 
  }
  
  .navbar-toggler-icon {
    background-color: white; 
  }
  
  .navbar-toggler:focus {
    outline: none;
  }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <!-- Logo on the left -->
      
        <a class="navbar-brand" href="#">
          <img src="images/logos.png" alt="">
        </a>

        <!-- Toggler button for collapsed menu on small screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation links on the right -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link text-white font-weight-bold" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="#"> <i class="fas fa-bell"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<!-- sidebar -->
<div class="container-fluid fixed-top mb-3">
    <div class="row">
    <div class="admin-nav p-0 col-3">
    <img src="https://lh3.googleusercontent.com/a/ACg8ocKAKz4uG8EXeKwzlQ7lju4lwoVqXWCUqX3Oi6WVexokeDk=s432-c-no" alt="Admin Profile" class="profile-image">
        <p class="text-center">Sarah A.Econgu</p>
        <h4 class="text-center text-warning">Admin Dashboard</h4>
        <hr>
    <div class="list-group ">
            <!-- dashboard -->
            <a href="admin-dashboard.php" class="list-group-item admin-link">
            <i class="fas fa-chart-line"></i>Baker's Dashboard
            </a>
            <!-- branch -->



 <!--order -->
 <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseOrder" role="button" aria-expanded="false" aria-controls="collapseOrder">
 <i class="fas fa-shopping-cart"></i> Order Management
  </a>
  <div class="collapse" id="collapseOrder">
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i> View Orders</a></li>
  </ul>
</div>

    
    <!-- sales -->
    <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseSale" role="button" aria-expanded="false" aria-controls="collapseSale">
    <i class="fas fa-chart-bar"></i> Sales Management
  </a>

 <!-- schedule -->
 <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseSchedule" role="button" aria-expanded="false" aria-controls="collapseSchedule">
 <i class="fas fa-calendar-alt"></i> Schedule Management
  </a>
  <div class="collapse" id="collapseSchedule">
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i> View schedule</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-plus"></i> Add schedule</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-edit"></i> Edit schedule</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-trash"></i> Delete schedule</a></li>
  </ul>
</div>
 <!-- payment -->
 <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapsePayment" role="button" aria-expanded="false" aria-controls="collapsePayment">
    <i class="fas fa-credit-card"></i> Payment Management
  </a>
  <div class="collapse" id="collapsePayment">
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i>View Payment Method</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-plus"></i>Add Payment Method</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-edit"></i>Edit Payment Method</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-trash"></i>Delete Payment Method</a></li>

  </ul>
</div>
     <!-- promotions -->
     <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapsePromotion" role="button" aria-expanded="false" aria-controls="collapsePromotion">
     <i class="fas fa-gift"></i> Promotions Management
  </a>
  <div class="collapse" id="collapsePromotion">
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i> View promotions</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-plus"></i> Add promotions</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-edit"></i> Edit promotions</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-trash"></i> Delete promotions</a></li>
  </ul>
</div>
    <!-- settings -->
    <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseSetting" role="button" aria-expanded="false" aria-controls="collapseSetting">
    <i class="fas fa-cogs"></i> Settings
  </a>
  <div class="collapse" id="collapseSetting">
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i>profile</a></li>
  </ul>
</div>
  
    <!-- logout -->
    <a href="admin-products.php" class="list-group-item admin-link">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
</div>

    </div>

    <!-- cards -->
   
    <div class="col-lg-9 mt-5 p-4">
    <h1 class="text-center mt-5">Summary</h1>
        <div class="card-deck mt-3 gap-4 text-center font-weight-bold justify-content-center d-flex">

            <div class="card bg-warning text-white">
                <div class="card-header">Total sales</div>
                <div class="card-body">
                    <h4>5</h4>
                </div>
            </div>
           
            <div class="card bg-info text-white">
                <div class="card-header">Total Orders</div>
                <div class="card-body">
                    <h4>20</h4>
                </div>
            </div>
  
        </div>
    </div>
    </div>

           
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
    




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
            <i class="fas fa-chart-line"></i> Dashboard
            </a>
            <!-- branch -->
<a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseBranch" role="button" aria-expanded="false" aria-controls="collapseBranch">
    <i class="fas fa-cogs"></i> Branch Management
  </a>
  <div class="collapse" id="collapseBranch">
  <ul class="list-group ">
    <li><a class="list-group-item" href="#"><i class="fas fa-eye"></i> View Branch</a></li>
    <li><a class="list-group-item" href="#"><i class="fas fa-edit"></i> Edit Branch</a></li>
    <li><a class="list-group-item" href="#"><i class="fas fa-trash"></i> Delete Branch</a></li>
  </ul>
</div>

<!-- user -->
<a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseUser" role="button" aria-expanded="false" aria-controls="collapseUser">
<i class="fas fa-users"></i> User Management
  </a>
  <div class="collapse" id="collapseUser">
    <hr>
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-users"></i> Manage Customers</a></li>
    <!-- cashiers -->
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-users"></i> Manage Cashiers</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-users"></i> Manage Bakers</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-users"></i> Manage Deliverymen</a></li>

  </ul>
  <hr>
</div>
   <!-- products -->
   <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseProduct" role="button" aria-expanded="false" aria-controls="collapseProduct">
   <i class="fas fa-cubes"></i> Product Management
  </a>
  <div class="collapse" id="collapseProduct">
    <hr>
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i>Manage Products</a></li>


  </ul>
  <hr>
</div>
    <!-- categories -->
    <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseCategory">
    <i class="fas fa-list-alt"></i> Category Management
  </a>
  <div class="collapse" id="collapseCategory">
    <hr>
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="categories.php"><i class="fas fa-eye"></i> Manage Categories</a></li>

  </ul>
  <hr>
</div>
 <!--order -->
 <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseOrder" role="button" aria-expanded="false" aria-controls="collapseOrder">
 <i class="fas fa-shopping-cart"></i> Order Management
  </a>
  <div class="collapse" id="collapseOrder">
    <hr>
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i>Manage Orders</a></li>
  </ul>
  <hr>
</div>
    <!-- vendor -->
    <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseVendor" role="button" aria-expanded="false" aria-controls="collapseVendor">
    <i class="fas fa-truck"></i> Vendor Management
  </a>
  <div class="collapse" id="collapseVendor">
    <hr>
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i>Manage Vendor</a></li>
  </ul>
  <hr>
</div>
    <!-- inventory  -->
    <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseInventory" role="button" aria-expanded="false" aria-controls="collapseInventory">
    <i class="fas fa-cogs"></i> Inventory Management
  </a>
  <div class="collapse" id="collapseInventory">
    <hr>
  <ul class="list-group text-gray">
  <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i>Manage Ingredients</a></li>
    <li><a class="list-group-item text-gray" href="recipes.php"><i class="fas fa-plus"></i>Manage Recipes</a></li>
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-edit"></i>Manage Equipments</a></li>
    <!-- <li><a class="list-group-item text-gray" href="#"><i class="fas fa-trash"></i>Delete ingredients</a></li> -->
  </ul>
  <hr>
</div>
    
    <!-- sales -->
    <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseSale" role="button" aria-expanded="false" aria-controls="collapseSale">
    <i class="fas fa-chart-bar"></i> Sales Managementt
  </a>

 <!-- schedule -->
 <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseSchedule" role="button" aria-expanded="false" aria-controls="collapseSchedule">
 <i class="fas fa-calendar-alt"></i> Schedule Management
  </a>
  <div class="collapse" id="collapseSchedule">
    <hr>
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="schedule.php"><i class="fas fa-eye"></i> Manage schedule</a></li>
    
  </ul>
  <hr>
</div>
<!-- shifts -->
<a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseShift" role="button" aria-expanded="false" aria-controls="collapseShift">
 <i class="fas fa-calendar-alt"></i> Shift Management
  </a>
  <div class="collapse" id="collapseShift">
    <hr>
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="shift.php"><i class="fas fa-eye"></i>Manage Shifts</a></li>

  </ul>
  <hr>
</div>
 <!-- payment -->
 <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapsePayment" role="button" aria-expanded="false" aria-controls="collapsePayment">
    <i class="fas fa-credit-card"></i> Payment Management
  </a>
  <div class="collapse" id="collapsePayment">
    <hr>
  <ul class="list-group text-gray">

    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i>Manage Payments</a></li>


  </ul>
  <hr>
</div>
  <!-- feedback -->
  <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapseFeedback" role="button" aria-expanded="false" aria-controls="collapseFeedback">
  <i class="fas fa-comment"></i> Feedback Management
  </a>
  <div class="collapse" id="collapseFeedback">
    <hr>
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i>Manage Feedback</a></li>
  </ul>
  <hr>
</div>
     <!-- promotions -->
     <a class="list-group-item admin-link" data-bs-toggle="collapse" href="#collapsePromotion" role="button" aria-expanded="false" aria-controls="collapsePromotion">
     <i class="fas fa-gift"></i> Promotions Management
  </a>
  <div class="collapse" id="collapsePromotion">
    <hr>
  <ul class="list-group text-gray">
    <li><a class="list-group-item text-gray" href="#"><i class="fas fa-eye"></i>Manage promotions</a></li>
  </ul>
  <hr>
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
    </div>
    </div>



<?php
include("includes/core.php");
?>
<?php
$checkout = new CheckOut;
$users = new User;
if (isset($_POST['user_delete'])) {
  $user_id = $_POST['user_delete'];
  $users->delete($user_id);
  header("Location: checkout.php");
  exit();
}
?>

<?php
include("partials/header.php");
?>

<body>
  <?php
  include("sidebar.php");
  ?>
  <!-- heasder -->
  <div class="main-content">
    <div class="header-wrapper">
      <div class="header-title">
        <span>Welcome</span>
        <?php
         if (isset($_SESSION['last_name'])) {
          echo $_SESSION['last_name'];
        } else {
          echo "Guest"; 
        }
        ?>
      </div>
      <div class="user-info">
        <div class="search-box">
          <!-- <li>
          <a href="">
            <span>Home</span>
          </a>
        </li> -->
        </div>
        <img src="https://lh3.googleusercontent.com/a/ACg8ocKAKz4uG8EXeKwzlQ7lju4lwoVqXWCUqX3Oi6WVexokeDk=s432-c-no"
          alt="pp">
          <li>
            <a href="login.php" class="logout-link">logout</a>
          </li>
      </div>
    </div>
    <!-- cards -->
    <?php
// include("cards.php");

    ?>
 <!-- tabular -->
 <div class="tabular-wrapper">
  <div class="table-container">
  <div class="search-box">
    <form action="customers.php" method="GET" class="d-flex">
        <input type="text" class="form-control me-2" name="search" placeholder="Search Customers" style="width:350px; margin-right:10px;">
        <button class="bt" type="submit">Search</button>
    </form>
</div>

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Tel</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($checkout->all() as $user): 
      $checked_user = $users->getParentAttributesFromChild('checkout', 'users', $user->id, 'users_id');
        ?>
        <tr>
          <td>
            <?php echo $checked_user->id; ?>
          </td>
          <td style="width:8%">
            <img src="images/<?php echo $checked_user->image; ?>" alt="dp" class="rounded-circle w-50 h-50">

          </td>
          <td>
            <?php echo $checked_user->first_name; ?>
          </td>
          <td>
            <?php echo $checked_user->last_name; ?>
          </td>
          <td>
            <?php echo $checked_user->email; ?>
          </td>
          <td>
            <?php echo $checked_user->address; ?>
          </td>
          <td>
            <?php echo $checked_user->tel; ?>
          </td>
          <td>
            <?php  echo Helper::date($checked_user->created_at); ?>
          </td>
          <td>
            <?php echo Helper::date($checked_user->created_at); ?>
          </td>
          <td>
            <a href="customers.php" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_customer.php?id=<?php echo $checked_user->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="customers.php" method="POST" class="d-inline-block">
              <button type="submit" name="customer_delete" value="<?php echo $checked_user->id;?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete user?')">
                <i class="bi bi-trash3">del</i>
              </button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>


  </div>
 </div>

  </div>
<?php 
include('partials/footer.php');
?>

<?php
include("includes/core.php");
?>
<?php
$types = new UserType();
if (isset($_POST['add_user_type'])) {
    $data = [
      'user_type' => $_POST['user_type']
    ];
    $types->create($data);
    header("Location: user_type.php");
}  
// Delete
if (isset($_POST['user_type_delete'])) {
  $user_id = $_POST['user_type_delete'];
  $types->delete($user_id);
  header("Location: user_type.php");
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
  <div class="text-center m-3">
    <button type="button" class="btns" data-bs-toggle="modal" data-bs-target="#completeModal">
      ADD UserType
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">orders</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="order_table.php" method="POST" enctype="multipart/form-data">
               <!-- health-->
               <div class="mb-3">
              <label class="form-label">user type</label>
              <input type="text" class="form-control" name="user_type" placeholder="user type">
            </div>
                      
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="bt" name = "add_order">Add UserType</button>
            </div>
        </div>
      </div>
    </div>
    </form>
</div>
  <div class="search-box">
    <form action="categories.php" method="GET" class="d-flex">
        <input type="text" class="form-control me-2" name="search" placeholder="Search Categories">
        <button class="bt" type="submit">Search</button>
    </form>
</div>

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">UserType</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($types->all() as $user): ?>
        <tr>
          <td>
            <?php echo $user->id; ?>
          </td>
          <td>
            <?php echo $user->user_type; ?>
          </td>
          <td>
            <a href="user_type.php" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="user_type.php?id=<?php echo $user->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="user_type.php" method="POST" class="d-inline-block">
              <button type="submit" name="user_type_delete" value="<?php echo $user->id;?>" class="btn btn-danger btn-sm"
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
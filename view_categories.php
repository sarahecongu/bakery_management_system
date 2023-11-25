<?php
include("includes/core.php");
$categories = new Category();
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $category_id = $_GET['id'];
  $category = $categories->find($category_id);
}
?>
<?php include('partials/header.php');?>

<body>
  <?php include("sidebar.php"); ?>

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
        <!-- <div class="search-box">
                    <form action="categories.php" method="GET" class="d-flex">
                        <input type="text" class="form-control me-2" name="search" placeholder="Search Categories">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div> -->
        <img src="https://lh3.googleusercontent.com/a/ACg8ocKAKz4uG8EXeKwzlQ7lju4lwoVqXWCUqX3Oi6WVexokeDk=s432-c-no"
          alt="pp">
        <li>
          <a href="login.php" class="logout-link">Logout</a>
        </li>
      </div>
    </div>

   

    <div class="tabular-wrapper text-center">
      <div class="table-container">
        <div class="mb-3">
          <img src="images/<?php echo $category->image; ?>" alt="<?php echo $category->name; ?>" class="w-50%">
        </div>
        <div class="mb-3">
          <strong>Category Name:</strong> <?php echo $category->name; ?>
        </div>
        <div class="mb-3">
        <a href="update_categories.php?id=<?php echo $category->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="categories.php" method="POST" class="d-inline-block">
              <button type="submit" name="category_delete" value="<?php echo $category->id;?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete user?')">
                <i class="bi bi-trash3">del</i>
              </button>
            </form>
        </div>
        
      </div>
    </div>
  

  






    
    </div>
  </div>

  <?php include('partials/footer.php'); ?>

</body>

</html>
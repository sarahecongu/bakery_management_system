
<?php
include("includes/core.php");
?>
<?php
$features = new Feature;

// Create
if (isset($_POST['add_feature'])) {
  $data = [
    'name' => $_POST['name'],
    'description'=> $_POST['description'],
  ];
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);
    $data['image'] = $image_name;
  }
  $features->create($data);
  header("Location: features_table.php");
}
// Delete
if (isset($_POST['feature_delete'])) {
  $feature_id = $_POST['feature_delete'];
  $features->delete($feature_id);
  header("Location: features_table.php");
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
        <h1>Dashboard</h1>
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
      ADD FEATURE
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">features</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="features_table.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Image</label>
              <input type="file" class="form-control" name="image" placeholder="Enter image">
            </div>
            <!-- name -->
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" placeholder="feature name">
            </div>
               <!-- description -->
               <div class="mb-3">
              <label class="form-label">description</label>
              <input type="text" class="form-control" name="description" placeholder="feature description">
            </div>
                      
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="bt" name = "add_feature">ADD SEVRICE</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="search-box">
    <form action="categories.php" method="GET" class="d-flex">
        <input type="text" class="form-control" name="search" placeholder="Search Categories">
        <button class="bt" type="submit">Search</button>
    </form>
</div>

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">description</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($features->all() as $feature): ?>

        <tr>
          <td>
            <?php echo $feature->id; ?>
          </td>
          <td style="width:15%">
            <img src="images/<?php echo $feature->image; ?>" alt="dp" class="w-50 h-50 rounded-circle">

          </td>
          <td title="<?php echo $feature->name; ?>" class="text-md-truncate" style="max-width:150px">
            <?php echo $feature->name; ?>
          </td>
          <td> 
            <?php echo $feature->description; ?>
          </td>
          <td>
            <a href="features_table.php" class="btn btn-primary btn-sm mr-2 m-1" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_features_table.php?id=<?php echo $feature->id; ?>" class="btn btn-success btn-sm mr-2" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="features_table.php" method="POST" class="d-inline-block">
              <button type="submit" name="feature_delete" value="<?php echo $feature->id;?>" class="btn btn-danger btn-sm m-2"
                onclick="return confirm('Are you sure you want to delete feature?')">
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
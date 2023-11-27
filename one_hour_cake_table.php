
<?php
include("includes/core.php");
?>
<?php
$one_hour_cakes = new OneHourCake;
$cake_categories = new CakeCategory;
$health_benefits = new HealthBenefit;

// Create
if (isset($_POST['add_one_hour_cake'])) {
  $data = [
    'name' => $_POST['name'],
    'price'=> $_POST['price'],
    'quantity'=> $_POST['quantity'],
    'cake_category_id'=> $_POST['cake_category_id'],
    'health_benefit_id'=> $_POST['health_benefit_id'],
    

  ];
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_name, "images/" . $image_name);
    $data['image'] = $image_name;
  }
  if ($one_hour_cakes->create($data)) {
    // Set success message
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'one_hour_cake successfully added';
  } else {
    // Set error message
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'Error adding cake_category';
  }

  header("Location: one_hour_cake_table.php");
  exit();

}
// Delete
if (isset($_POST['one_hour_cake_delete'])) {
  $one_hour_cake_id = $_POST['one_hour_cake_delete'];
  if($one_hour_cakes->delete($one_hour_cake_id)){
    
    Helper::statusMessage('success','one_hour_cake Deleted');
  }else{
   Helper::statusMessage('error','cake_category Not Deleted');
  }
  header("Location: one_hour_cake_table.php");
  exit();
}
$searched_one_hour_cakes = [];

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searched_one_hour_cakes = $one_hour_cakes->where(['name' => $searchTerm])->orderBy('id', 'DESC')->all();
} else {
    $searched_one_hour_cakes = $one_hour_cakes->orderBy('id', 'DESC');
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

  <div class="text-end m-3 d-flex justify-content-end">
    <button type="button" class="btns" data-bs-toggle="modal" data-bs-target="#completeModal">
        ADD one_hour_cake
    </button>
</div>


  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">one_hour_cakes</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="one_hour_cake_table.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Image</label>
              <input type="file" class="form-control" name="image" placeholder="Enter image">
            </div>
            <!-- name -->
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" placeholder="one_hour_cake name">
            </div>
              <!-- price -->
             <!-- cake_category dropdown -->
                <div class="mb-3">
                <label class="form-label">Cake Category</label>
                <select class="form-select" name="cake_category_id">
                    <option value="" selected disabled>Select a Category</option>
                    <?php foreach ($cake_categories->all() as $cake): ?>
                    <option value="<?php echo $cake->id; ?>"><?php echo $cake->name; ?></option>
                   
                    <?php endforeach; ?>
                </select>
                </div>

               <!-- price -->
               <div class="mb-3">
              <label class="form-label">Price</label>
              <input type="text" class="form-control" name="price" placeholder="one_hour_cake price">
            </div>
               <!-- quantity-->
               <div class="mb-3">
              <label class="form-label">Quantity</label>
              <input type="number" class="form-control" name="quantity" placeholder="one_hour_cake quantity">
            </div>
               <!-- health-->
               <div class="mb-3">
              <label class="form-label">health</label>
              <input type="text" class="form-control" name="health_benefit_id" placeholder="one_hour_cake name">
            </div>
                      
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="bt" name = "add_one_hour_cake">Add one_hour_cake</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="search-box">
  <form action="one_hour_cake_table.php" method="GET" class="d-flex">
    <input type="text" class="form-control text-center" name="search" placeholder="Search one_hour_cakes" style="width:350px; margin-right: 10px; ">
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
        <th scope="col">cake_category</th>
        <th scope="col">Price</th>
        <th scope="col">Qtty</th>
        <th scope="col">Health</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($searched_one_hour_cakes as $one_hour_cake): 
                $cake_category_details = $cake_categories->getParentAttributesFromChild('one_hour_cakes', 'cake_categories', $one_hour_cake->id, 'cake_category_id');
                $health_details = $health_benefits->getParentAttributesFromChild('one_hour_cakes', 'health_benefits', $one_hour_cake->id, 'health_benefit_id');

        ?>

        <tr>
          <td>
            <?php echo $one_hour_cake->id; ?>
          </td>
          <td style="width:15%">
            <img src="images/<?php echo $one_hour_cake->image; ?>" alt="dp" class="w-50 h-50 rounded-circle">

          </td>
        <td title="<?php echo $one_hour_cake->name; ?>" class="text-md-truncate" style="max-width:150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            <?php echo $one_hour_cake->name; ?>
        </td>
            <td>
            <?php echo $cake_category_details->name; ?>
            </td>
          <td> 
            <?php echo $one_hour_cake->price; ?>
          </td>
        
          <td>
            <?php echo $one_hour_cake->quantity; ?>
          </td>
          <td>
            <?php echo $health_details->name ?? NULL; ?>
          </td>
          <td>
            <?php  echo Helper::date($one_hour_cake->created_at); ?>
          </td>
          <td>
            <?php  echo Helper::date($one_hour_cake->created_at); ?>
          </td>
          <td>
            <a href="one_hour_cake_table.php" class="btn btn-primary btn-sm mr-2 m-1" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_one_hour_cake_table.php?id=<?php echo $one_hour_cake->id; ?>" class="btn btn-success btn-sm mr-2" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="one_hour_cake_table.php" method="POST" class="d-inline-block">
              <button type="submit" name="one_hour_cake_delete" value="<?php echo $one_hour_cake->id;?>" class="btn btn-danger btn-sm m-2"
                onclick="return confirm('Are you sure you want to delete one_hour_cake?')">
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
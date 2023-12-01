
<?php
include("includes/core.php");
?>
<?php
$products = new Product();
$promotions = new Promotion();

// Create
if (isset($_POST['add_promotion'])) {
  $data = [
    'start_date' => $_POST['start_date'],
    'end_date'=> $_POST['end_date'],
    'description'=> $_POST['description'],
    'product_id'=> $_POST['product_id'],

  ];
  $promotions->create($data);
  header("Location: promotion_table.php");
}
// Delete
if (isset($_POST['promotion_delete'])) {
  $promotion_id = $_POST['promotion_delete'];
  $promotions->delete($promotion_id);
  header("Location: promotion_table.php");
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

  <div class="text-end m-3 d-flex justify-content-end">
    <button type="button" class="btns" data-bs-toggle="modal" data-bs-target="#completeModal">
        ADD A PROMOTION
    </button>
</div>

  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">promotions</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="promotion_table.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
            <select class="form-select" name="image">
                    <option value="" selected disabled>Select an image</option>
                    <?php foreach ($products->all() as $product): ?>
                    <option value="<?php echo $product->id; ?>"><?php echo $product->image; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- name -->
            <div class="mb-3">
            <select class="form-select" name="product_id">
                    <option value="" selected disabled>Select a Product</option>
                    <?php foreach ($products->all() as $product): ?>
                    <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                   
                    <?php endforeach; ?>
                </select>
                </div>
              <!-- price -->
              <div class="mb-3">
              <label class="form-label">start date</label>
              <input type="date" class="form-control" name="start_date" placeholder="promotion price">
            </div>
               <!-- price -->
               <div class="mb-3">
               <select class="form-select" name="price">
                    <option value="" selected disabled>Select a Product</option>
                    <?php foreach ($products->all() as $product): ?>
                    <option value="<?php echo $product->id; ?>"><?php echo $product->price; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
               <!-- quantity-->
               <div class="mb-3">
              <label class="form-label">End date</label>
              <input type="date" class="form-control" name="end_date" placeholder="promotion quantity">
            </div>
               <!-- quantity-->
               <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="text" class="form-control" name="description" placeholder="Description">
            </div>
                      
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="bt" name = "add_promotion">Add promotion</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="search-box">
    <form action="promotion_table.php" method="GET" class="d-flex">
        <input type="text" class="form-control me-2" name="search" placeholder="Search Promotion" style="width:350px;margin-right:10px;">
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
        <th scope="col">start date</th>
        <th scope="col">End date</th>

        <th scope="col">Price</th>
        <!-- <th scope="col">Discount</th> -->
        <th scope="col">Description</th>
      
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($promotions->all() as $promotion): 
                $promotions_details = $products->getParentAttributesFromChild('promotions', 'products', $promotion->id, 'product_id');
        ?>

        <tr>
          <td>
            <?php echo $promotion->id; ?>
          </td>
          <td style="width:15%">
            <img src="<?php echo $promotions_details->image; ?>" alt="dp" class="w-50 h-50 rounded-circle">

          </td>
          <td title="<?php echo $promotions_details->name; ?>" class="text-md-truncate" style="max-width:150px">
            <?php echo $promotions_details->name; ?>
          </td>
          <td>
            <?php echo $promotion->start_date ?? NULL; ?>
          </td>
          <td>
            <?php echo $promotion->end_date ?? NULL; ?>
          </td>
          <td>
            <?php echo $promotions_details->price ?? NULL; ?>
          </td>
          <td>
            <?php echo $promotion->description ?? NULL; ?>
          </td>
         
          <td>
            <?php  echo Helper::date($promotion->created_at); ?>
          </td>
          <td>
            <?php  echo Helper::date($promotion->created_at); ?>
          </td>
          <td>
            <a href="promotion_table.php" class="btn btn-primary btn-sm mr-2 m-1" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_promotion_table.php?id=<?php echo $promotion->id; ?>" class="btn btn-success btn-sm mr-2" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="promotion_table.php" method="POST" class="d-inline-block">
              <button type="submit" name="promotion_delete" value="<?php echo $promotion->id;?>" class="btn btn-danger btn-sm m-2"
                onclick="return confirm('Are you sure you want to delete promotion?')">
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
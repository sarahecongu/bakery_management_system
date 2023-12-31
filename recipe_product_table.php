
<?php
include("includes/core.php");
?>
<?php
$recipe_products = new RecipeProduct();

$products = new Product();
$recipes = new Recipe();

// Create
if (isset($_POST['add_recipe_product'])) {
  $data = [
    'recipe_id' => $_POST['recipe_id'],
    'product_id' => $_POST['product_id']
  ];
  $recipe_products->create($data);
  header("Location: recipe_product_table.php");
}
// Delete
if (isset($_POST['recipe_product_delete'])) {
  $recipe_product_id = $_POST['recipe_product_delete'];
  $recipe_products->delete($recipe_product_id);
  header("Location: recipe_product_table.php");
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
        </div>
        <img src="https://lh3.googleusercontent.com/a/ACg8ocKAKz4uG8EXeKwzlQ7lju4lwoVqXWCUqX3Oi6WVexokeDk=s432-c-no"
          alt="pp">
          <li>
            <a href="login.php" class="logout-link">logout</a>
          </li>
      </div>
    </div>
 
 <!-- tabular -->
 <div class="tabular-wrapper">
  <div class="table-container">
  <div class="text-end m-3 d-flex justify-content-end">
    <button type="button" class="btns" data-bs-toggle="modal" data-bs-target="#completeModal">
        ADD Recipe Product
    </button>
</div>

  <!-- Modal -->
  <div class="modal fade" id="completeModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">recipe_products</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- form -->
          <!-- firstname -->
          <form action="recipe_product_table.php" method="POST">
          <div class="mb-3">
               <select class="form-select" name="recipe_id">
                    <option value="" selected disabled>recipe</option>
                    <?php foreach ($recipes->all() as $prod): ?>
                    <option value="<?php echo $prod->id; ?>"><?php echo $prod->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
               <select class="form-select" name="product_id">
                    <option value="" selected disabled>Product</option>
                    <?php foreach ($products->all() as $prod): ?>
                    <option value="<?php echo $prod->id; ?>"><?php echo $prod->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- name -->

            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn" name = "add_recipe_product">Add Recipe</button>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>
  <div class="search-box">
    <form action="recipe_product_table.php" method="GET" class="d-flex">
        <input type="text" class="form-control me-2" name="search" placeholder="Search Recipe product" style="width:350px; margin-right:10px;">
        <button class="bt" type="submit">Search</button>
    </form>
</div>

  <!-- <table> -->
  <table class="table table-striped mt-3">
    <thead class="text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Recipe Name</th>
        <th scope="col">Product Name</th>
        <th scope="col">Instructions</th>


        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($recipe_products->all() as $recipe_product): 
       $details = $products->getParentAttributesFromChild('recipe_product', 'products', $recipe_product->id, 'product_id');
      //  var_dump($details);die;
       $recipe_details = $recipes->getParentAttributesFromChild('recipe_product', 'recipes', $recipe_product->id, 'recipe_id');
        ?>
        <tr>
          <td>
          <?php 
            echo $recipe_product->id; ?>
          </td>
          <td>
            <?php echo $recipe_details->name; ?>
          </td>
          <td>
            <?php echo $details->name;?>
          </td>
           <td>
            <?php echo $recipe_details->instructions; ?>
          </td>
       
          <td>
            <a href="recipe_product.php" class="btn btn-primary btn-sm mr-3" title="view"><i class="fas fa-eye"></i></a>
            <a href="update_recipe_product.php?id=<?php echo $recipe_product->id; ?>" class="btn btn-success btn-sm mr-3" title="edit">
              <i class="fas fa-edit"></i>
            </a>
            <form action="recipe_product.php" method="POST" class="d-inline-block">
              <button type="submit" name="recipe_product_delete" value="<?php echo $recipe_product->id;?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete delete recipe_product?')">
                <i class="bi bi-trash3">del</i>
              </button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
  <?php
	include("partials/footer.php");
	?>



























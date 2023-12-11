<?php
include("includes/core.php");
?>
<?php
$products = new Product();
$recipes = new RecipeProduct;
$product_categories = new Category;

// Check if 'category_id' is set in the URL parameters
if (isset($_GET['sub_category_id']))
  $products = $products->where(['product_sub_category_id' => $_GET['sub_category_id']]);
else
  // $products = $products->where(['product_category_id'=> $_GET['category_id']]
  $products = $products->getProductsByCategory($_GET['category_id'])
    ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">

    <title>Menu Page</title>
  </head>

  <body>
    <?php
include("navbar.php");
?>
  <?php
  include("menu_buttons.php");
  ?>
  <section class="product" id="product">
    <h4 class="titles">Our PRODUCTS</h4>
    <div class="box-container">
      <?php
      $count = 0;

      foreach ($products as $product):
        ?>
        <div class="box">
          <div class="img">
            <img src="<?php echo $product->image ?>" alt="">
            <!-- <a class="bd-cake-tag" href="#"><?php echo $product->category_id ?></a> -->
          </div>
          <div class="content">
            <h3 title="<?php echo $product->name; ?>" class="text-md-truncate"
              style="max-width:250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
              <?php echo $product->name; ?>
            </h3>

            <a href="details.php?id=<?php echo $product->id; ?>" class="btn1">Calories</a>
            <a href="details.php" class="btn1">Ingredients</a>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
            <span class="price">shs
              <?php echo $product->price; ?>
            </span>


            <button class="add_cart" data-id="<?php echo $product->id; ?>" data-name="<?php echo $product->name; ?>"
              data-image="<?php echo $product->image; ?>"  >

              Add to Cart
            </button>
          </div>

        </div>
        <?php
        // }
        $count++;
      endforeach;
      ?>


    </div>
  </section>
  <!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->

  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast bg-success" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="fas fa-check-double"></i>
        <strong class="me-auto">Success</strong>
        <small>Now</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white">

      </div>
    </div>
  </div>



  <!-- Toast Structure -->
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Notification</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <!-- Message content will be inserted here -->
    </div>
  </div>

  
  <?php
  include 'footer.php';
  ?>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>

    /**
     * JS for toast
     */
    // Get or create the toast instance
    const toastBootstrap = new bootstrap.Toast(document.getElementById('liveToast'));

    function toastDisplay(message) {
      // Set the message content
      document.querySelector('.toast-body').innerHTML = message;

      // Show the toast
      toastBootstrap.show();
    }

    //----END


    $(document).ready(function () {
      $(document).on("click", ".add_cart", function (e) {
        e.preventDefault();

        var product = $(this).closest(".box").find(".content");
        var id = $(this).data("id");
        var name = $(this).data("name");
        var image = $(this).data("image");
        var price = $(this).data("price");

        $.ajax({
          url: "action.php",
          type: "post",
          data: {
            add_to_cart: 1,
            product_id: id,
            product_name: name,
            product_image: image,
            product_price: price,
            quantity: 10
          },
          success: function (response) {
            // alert(response);
            $(".cart-counter").text(response);
            // Optionally, update a cart icon or counter
            toastDisplay('Item added to cart!');
          }
        });
      });
    });
  </script>
  <script src="main.js"></script>
</body>

</html>
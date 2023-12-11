<?php
include("includes/core.php");
?>
<?php
$products = new Product();
$recipes = new RecipeProduct;
$categories = new Category;
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
  <style>
    .man{
      min-height: 10vh;
    }
  </style>
</head>

<body>
  <?php
  include("navbar.php");
  ?>
  <?php
  // include("menu_buttons.php");
  ?>
  <div class="man"></div>
  <section class="category">
    <h4 class="title">OUR<span> CATEGORIES</span><a href="sub_categories.php" class="btn">VIEW ALL</a></h4>
    <div class="box-container">
      <?php foreach ($categories->all() as $index => $category): ?>
        <div class="box">
          <a href="menu_specific.php?category_id=<?php echo $category->id ?>">
            <img src="images/<?php echo $category->image; ?>" alt="dp">
            <h3>
              <?php echo $category->name ?>
            </h3>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  
  <?php
  include 'footer.php';
  ?>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    function toastDisplay(message) {
      // Set the message content
      document.querySelector('.toast-body').innerHTML = message;

      // Show the toast
      var toast = new bootstrap.Toast(document.getElementById('liveToast'));
      toast.show();
    }

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
            // Display a toast message
            toastDisplay('Item added to cart!');
          });
      });
    });
  </script>
  <script src="main.js"></script>
</body>

</html>
<?php
$products = new Product();
?>
<div class="space"></div>
<section class="product">
<h4 class="title">Our<span>Products</span><a href="menu.php" class="btn">View All</a></h4>
    <div class="box-container">
        <?php foreach ($products->limit(3) as $product): ?>
            <div class="box">
                <div class="img">
                    <a href="details.php"><img src="<?php echo $product->image; ?>" alt="dp"></a>
                    <p class="bd-cake-tag" href="#"><?php echo $product->discount ?></p>
                </div>
                <div class="content">
                    <h3><?php echo $product->name ?></h3>
                    <span class="price">shs <?php echo $product->price; ?></span>
                    <button class="add_cart" data-id="<?php echo $product->id; ?>"
                            data-name="<?php echo $product->name; ?>"
                            data-image="<?php echo $product->image; ?>"
                            data-price="<?php echo $product->price; ?>">
                        Add to Cart
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
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
                }
            });
        });
    });
</script>

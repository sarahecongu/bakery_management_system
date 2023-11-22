<style>
  .cart-counter {
    position: absolute;
    top: 10;
    right: 10;
    background-color: #ff0000;
    /* Red background */
    color: #ffffff;
    /* White text */
    padding: 3px 6px;
    border-radius: 50%;
    font-size: 12px;
  }
</style>
<header class="header">
  <div class="marquee">
    <marquee behavior="" direction="left">

      <span id="marqueeText">BLACK FRIDAY DEALS COMING SOON</span>
    </marquee>
  </div>
  <a href="" class="logo">
    <!-- <img src="images/anita.png"  alt="" srcset=""> -->
    BAKE PAL
  </a>

  <nav class="navbar">
    <a href="index.php">Home</a>
    <a href="menu.php">Menu</a>
    <a href="aboutus.php">AboutUs</a>
    <a href="services.php">Services</a>
    <a href="contactus.php">Contact</a>
  </nav>
  <div class="icons">
    <div id="menu-btn" class="fas fa-bars"></div>
    <div id="search-btn" class="fas fa-search"></div>
    <a href="cart.php" style="margin:0px 12px ">
      <div id="cart-btn" class="fas fa-shopping-cart"> <span class="cart-counter">
          <?php
          $cart = new Cart;
          // If user is logged in: Get from database, else get from session
          if ($session->checkLoginStatus()) {
            try {
              $cart_id = $cart->getUserCart($session->get('id'));
              echo $cart->countRelated('cart_items', $cart_id, 'cart_id');
            } catch (\Throwable $th) {
              echo 0;
            }
          }?>
        </span></div>
    </a>
    <div id="login-btn" class="fas fa-user"></div>
<a href="action.php?logout=1">
    <div id="logout" class="fas fa-sign-out-alt .logout"></div></a>
  </div>
</header>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var marqueeText = document.getElementById('marqueeText');

    var startDate = new Date('2023-11-03');
    var endDate = new Date('2023-11-15');

    function updateMarqueeText() {
      var currentDate = new Date();
      if (currentDate >= startDate && currentDate <= endDate) {
        var formattedStartDate = startDate.toDateString();
        var formattedEndDate = endDate.toDateString();
        marqueeText.innerHTML = 'BLACK FRIDAY DEALS from ' + formattedStartDate + ' to ' + formattedEndDate;
      } else {
        marqueeText.innerHTML = 'BLACK FRIDAY DEALS COMING SOON';
      }
    }
    setInterval(updateMarqueeText, 1000);
  });
</script>


<script>
    $(document).ready(function () {
        $(document).on("click", ".logout", function (e) {
            e.preventDefault();
            $.ajax({
                url: "action.php",
                type: "post",
                data: {
                    logout: 1,
                },
                success: function (response) {
                }
            });
        });
    });
</script>



















































<script src="main.js"></script>

<header class="header">
  <div class="marquee">
    <marquee behavior="" direction="left">
      <span id="marqueeText">BLACK FRIDAY DEALS COMING SOON</span>
    </marquee>
  </div>
  <a href="" class="logo">
    BAKE PAL
  </a>
  <nav class="navbar">
    <a href="index.php">Home</a>
    <a href="menu.php">Menu</a>
    <a href="aboutus.php">AboutUs</a>
    <a href="services.php">Services</a>
    <a href="contactus.php">Contact</a>
    
      <a href="cart.php">
        <div id="cart-btn" class="fas fa-shopping-cart">
          <span class="cart-counter">
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
            } else {
              if (isset($_SESSION['cart']))
                echo count($_SESSION['cart']);
              else echo 0;
            }
            ?>
          </span>
        </div>
      </a>
      <div class="icons">
      <div class="dropdown">
        <div class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user user-icon"></i>
          </div>
        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item" href="#">
              <div id="login-btn">
                <?php
                $user = new User;
                if ($session->checkLoginStatus()) {
                  echo strtolower($user->find($session->get('id'))->last_name);
                } else {
                  echo '--';
                }
                ?>
              </div>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <a href="action.php?logout=1">
                <div id="logout" class="fas fa-sign-out-alt .logout"></div>
              </a>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
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
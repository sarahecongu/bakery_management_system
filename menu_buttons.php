<style>
  .spaces {
    min-height: 25vh;
  }

  .titles {
    text-align: center;
    font-size: 2.5rem;
  }
  .menu-container {
    overflow-y: hidden; 
    position: relative;
    
    }
  .menu-buttons {
    overflow: hidden; 
    white-space: nowrap; 
    display: flex;
    gap: 10px;
    padding: 10px;
    font-size: 15px;
    overflow-x: scroll ; 
    scrollbar-color: wheat rgb(76, 9, 9); 
    scrollbar-width: thin;
   
  }

  .menu-button {
    display: inline-block;
    padding: 10px 20px;
    color: #000;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
   
  }

  .menu-button:hover {
    background-color: rgb(76, 9, 9);
    color: white;

  }
  .active-menu-button {
    background-color: wheat;
    color: rgb(76, 9, 9);
  }

  .active-menu-button:hover {
    color: white;
    background-color: rgb(76, 9, 9);
  }
  
  .menu-buttons::-webkit-scrollbar {
 
  }

  .menu-buttons::-webkit-scrollbar-thumb {
    background-color: rgb(76, 9, 9);
  }

  .menu-buttons::-webkit-scrollbar-track {
    background-color: wheat;
  }

  /* Animation keyframes for sliding effect */
  @keyframes slide {
    from {
      transform: translateX(100%);
    }

    to {
      transform: translateX(0);
    }
  }
  .arrow {
    position: absolute;
    top: 30%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 20px;
    color: rgb(76, 9, 9);
  }

  .prev-arrow {
    left: 10px;
  }

  .next-arrow {
    right: 10px;
  }
</style>


  <?php
  include("navbar.php");
  $currentPage = basename($_SERVER['PHP_SELF']);
  ?>
  <div class="spaces"></div>
  <div class="menu-container">

  <div class="menu-buttons">
  <a href="cakes_hour.php" class="menu-button <?php echo ($currentPage == 'cakes_hour.php') ? 'active-menu-button' : ''; ?>">One Hour Cakes</a>
  <a href="menu.php" class="menu-button <?php echo ($currentPage == 'menu.php') ? 'active-menu-button' : ''; ?>">Birthday Cakes</a>
  <a href="wedding_cakes.php" class="menu-button <?php echo ($currentPage == 'wedding_cakes.php') ? 'active-menu-button' : ''; ?>">Wedding Cakes</a>
<a href="christmas.php" class="menu-button <?php echo ($currentPage == 'christmas.php') ? 'active-menu-button' : ''; ?>">Christmas Cakes</a>
<a href="Fatless_menu.php" class="menu-button <?php echo ($currentPage == 'Fatless_menu.php') ? 'active-menu-button' : ''; ?>">Fatless Cakes</a>
<a href="vegan_menu.php" class="menu-button <?php echo ($currentPage == 'vegan_menu.php') ? 'active-menu-button' : ''; ?>">Vegan Cakes</a>
<a href="slices.php" class="menu-button <?php echo ($currentPage == 'slices.php') ? 'active-menu-button' : ''; ?>">Slices</a>
<a href="cupcakes_menu.php" class="menu-button <?php echo ($currentPage == 'cupcakes_menu.php') ? 'active-menu-button' : ''; ?>">Cup Cakes</a>
<a href="muffins.php" class="menu-button <?php echo ($currentPage == 'muffins.php') ? 'active-menu-button' : ''; ?>">Muffins</a>
<a href="doughnuts_menu.php" class="menu-button <?php echo ($currentPage == 'doughnuts_menu.php') ? 'active-menu-button' : ''; ?>">Doughnuts</a>
<a href="bans_menu.php" class="menu-button <?php echo ($currentPage == 'bans_menu.php') ? 'active-menu-button' : ''; ?>">Bans</a>
<a href="biscuits.php" class="menu-button <?php echo ($currentPage == 'biscuits.php') ? 'active-menu-button' : ''; ?>">Biscuits</a>
<a href="cookie_menu.php" class="menu-button <?php echo ($currentPage == 'cookie_menu.php') ? 'active-menu-button' : ''; ?>">Cookies</a>
<a href="pizza.php" class="menu-button <?php echo ($currentPage == 'pizza.php') ? 'active-menu-button' : ''; ?>">Pizza</a>
</div>

</div>

<script>
    // JavaScript for scrolling menu
    document.addEventListener("DOMContentLoaded", function () {
      // Get the menu container
      var menuContainer = document.querySelector('.menu-container');

      // Function to scroll the menu
      function scrollMenu(direction) {
        var scrollAmount = direction === 'left' ? -300 : 300;
        menuContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
      }

      // Add event listeners for the arrow buttons
      document.querySelector('.prev-arrow').addEventListener('click', function () {
        scrollMenu('left');
      });

      document.querySelector('.next-arrow').addEventListener('click', function () {
        scrollMenu('right');
      });
    });
  </script>
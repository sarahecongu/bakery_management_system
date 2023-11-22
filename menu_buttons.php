
<style>
    .spaces{
      min-height: 25vh;
    }
    .titles {
      text-align: center;
      font-size: 2.5rem;
    }
    .menu-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    padding: 10px;
    font-size: 1.1rem;
  }

  .menu-button {
    display: inline-block;
    padding: 10px 20px;
    background:rgb(76, 9, 9);
    color: #fff; 
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .menu-button:hover {
  color: wheat;
  }
  </style>

  <?php
  include("navbar.php");
  ?>
  <div class="spaces"></div>
  <div class="menu-buttons">
    <a href="cake_menu.php" class="menu-button">One Hour Cakes</a>
    <a href="slices.php" class="menu-button">Slices</a>
    <a href="birthday.php" class="menu-button">Birthday Cakes</a>
    <a href="wedding_cakes.php" class="menu-button">Wedding Cakes</a>
    <a href="christmas.php" class="menu-button">Christmas Cakes</a>
    <a href="bans_menu.php" class="menu-button">Bans</a>
    <a href="bread_menu.php" class="menu-button">Loaves</a>
    <a href="doughnuts_menu.php" class="menu-button">Doughnuts</a>
    <a href="cupcakes.php" class="menu-button">Muffins</a>
    <a href="biscuits.php" class="menu-button">Biscuits</a>
    <a href="cookie_menu.php" class="menu-button">Cookies</a>
    <a href="pizza.php" class="menu-button">Pizza</a>
   


</div>
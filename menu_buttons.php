<?php
$product_category = new Category;
$product_sub_category = new ProductSubCategory;

// Check if 'category_id' is set in the URL parameters
if (!isset($_GET['category_id'])) {
  echo "Error: 'category_id' not set in URL parameters.";
  exit;
}

?>

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
    overflow-x: scroll;
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

  .menu-buttons::-webkit-scrollbar {}

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
?>
<div class="spaces"></div>
<div class="menu-container">
  <div class="menu-buttons">
    <a href="menu_specific.php?category_id=<?php echo $_GET['category_id'] ?>"
      class="menu-button <?php echo !isset($_GET['sub_category_id']) ? 'active-menu-button' : ''; ?>">All</a>
    <?php foreach ($product_sub_category->where(['product_category_id' => $_GET['category_id']]) as $sub_category):
      ?>
      <a href="menu_specific.php?category_id=<?php echo $_GET['category_id'] ?>&sub_category_id=<?php echo $sub_category->id ?>"
        class="menu-button <?php echo isset($_GET['sub_category_id']) && $_GET['sub_category_id'] == $sub_category->id ? 'active-menu-button' : ''; ?>">
        <?php echo $sub_category->name ?>
      </a>
    <?php endforeach ?>

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
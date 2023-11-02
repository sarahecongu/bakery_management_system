<?php
include("includes/core.php");
?>
<?php
$categories = new Category();

?>
<section class="category">
    <h4 class="title">Our<span>Categories</span><a href="sub_categories.php">View All >>></a></h4>
    <div class="box-container">
        <?php
     foreach ($categories->limit(4) as $category):
    ?>
       <div href="" class="box">
      <a href="bans_menu.php"><img src="images/<?php echo $category->image;?>" alt="dp"></a>
      <h3><?php echo $category->name?></h3>
     </div>
<?php
  endforeach;
?>
     </div>
  </section>

         
       

    
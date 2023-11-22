
<?php
$categories = new Category();

?>
<div class="space"></div>
<section class="category">
    <h4 class="title">Our<span>Categories</span><a href="sub_categories.php" class="btn">View All</a></h4>
    <div class="box-container">
        <?php foreach ($categories->limit(4) as $category): ?>
            <div class="box">
                <a href="bans_menu.php">
                    <img src="images/<?php echo $category->image;?>" alt="dp">
                    <h3><?php echo $category->name?></h3>
                </a>
               
            </div>
        <?php endforeach; ?>
    </div>
</section>


         
       

    
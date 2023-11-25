<?php
$categories = new Category();
?>

<div class="space"></div>
<section class="category">
    <h4 class="title">OUR<span> CATEGORIES</span><a href="sub_categories.php" class="btn">VIEW ALL</a></h4>
    <div class="box-container">
        <?php foreach ($categories->limit(4) as $index => $category): ?>
            <div class="box">
                <?php
                $targetPages = ['cake_categories.php', 'cookies.php', 'daddies.php', 'doughnuts.php'];
                $targetPage = isset($targetPages[$index]) ? $targetPages[$index] : '#'; // Default to '#' if index is out of bounds
                ?>
                <a href="<?php echo $targetPage; ?>">
                    <img src="images/<?php echo $category->image;?>" alt="dp">
                    <h3><?php echo $category->name?></h3>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php
	include("includes/core.php");
	?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/index.css">
  <title>Menu Page</title>
  <style>
    .spae{
      min-height: 25vh;
    }
    .titles{
      text-align: center;
      font-size: 2.5rem;
      font-weight: bold;
    }
    span{
      color: rgb(79, 6,6);
    
    }
  </style>
</head>

<body>
    <?php
    include("navbar.php");
    ?>
    <div class="spae"></div>
<?php
 $categories = new Category();
?>
<section class="category">
    <h4 class="titles">OUR<span>  CATEGORIES</span><a href=""></a></h4>
    <div class="box-container">
        <?php
     foreach ($categories->all() as $category):
    ?>
       <a href="" class="box">
      <img src="images/<?php echo $category->image;?>" alt="dp">
      <h3><?php echo $category->name ?></h3>
      </a>
   
          
<?php
  endforeach;
?>
     </div>
  </section>
 <?php
 include("footer.php");
 ?>


         
       


  

  
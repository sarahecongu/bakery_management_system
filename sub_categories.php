<?php
	include("includes/core.php");
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./css/index.css">
  <title>SUB CATEGORIES</title>
  <style>
    .footer {
  background-color: #361401;
  color: #fff;
  padding: 20px 0;
  margin-top: 40px;
}

.footer h4 {
  color: #fff;
}

.footer p {
  margin-bottom: 10px;
}

.social-icons {
  list-style: none;
  padding: 0;
}

.social-icons li {
  display: inline-block;
  margin-right: 10px;
}

.social-icons a {
  color: #fff;
  text-decoration: none;
  font-size: 1.5em;
}

.social-icons a:hover {
  color: #f8d53e;
}

  </style>
</head>
<body>
  <div class="fixed-top">
    <!-- Promotions -->
    <?php
    include('promotions.php');
    ?>

    <!-- Navbar -->
    <?php
    include('navbar.php');
    ?>
  </div>
<!-- categories -->
<?php $categories = new Category();
?>
  <div id="subControls" class="carousel-slide-content-sub mx-auto">
  <h6 class="text-center mt-5">Our Categories</h6>
    <div class="carousel-inner-content-sub">
      <div class="carousel-item-content-sub active">
        <div class="row mt-5">
        <?php
      
     foreach ($categories->all() as $category):
    ?>
    <div class="col-md-2 mt-5 g-4 ">
  <div class="card-content">
    <div class="image-wrapper">
      <img src="images/<?php echo $category->image;?>" alt="dp">
    </div>
    <div class="caption">
      <h6><?php echo $category->name ?></h6>
      <h5><?php echo $category->description ?></h5>
    </div>
  </div>
  </div>
<?php
  endforeach;
?>


         
       
        </div>
      </div>
    </div>
  </div>
  <?php
  include('footer.php');

  ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>
</html>

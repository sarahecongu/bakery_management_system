<style>
 
 .carousel-caption {
    /* background-color: rgba(0, 0, 0, 0.7); */
    border-radius: 0 0 15px 15px;
    padding: 20px;
    margin-bottom: 300px;
  }

  .carousel-caption h5 {
    color: white;
    font-size: 105px;
    margin-bottom: 5px; 
  }

  .carousel-caption p {
    color: #000;
    font-size: 30px;
    margin: 0 10px;
  }

  /* Style the carousel controls */
  .carousel-control-prev,
  .carousel-control-next {
    width: 5%;
    font-size: 2rem;
    color: #fff;
    /* background-color: rgba(0, 0, 0, 0.5); */
    border-radius: 50%;
    padding: 10px;
  }

  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    background-color: #333;
    border-radius: 50%;
    padding: 10px;
  }

  /* Style the carousel indicators (dots) */
  .carousel-indicators button {
    background-color: #999;
    border-radius: 50%;
    margin: 0 5px;
  }

  .carousel-indicators .active {
    background-color: #333;
  }

</style>



<!-- <div class="sp"></div> -->





<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/cupcake.jpg" class=" w-100 align-items-center mt-2" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text">CupCakes For Christmas</h5>
        <p>Christmas comes with Yummy</p>
        <a href="menu.php" class="btn">Shop Now</a>

      </div>
    </div>
    <div class="carousel-item w-100">
      <img src="images/slice.jpg" class="w-100 align-items-center roundeds  mt-2" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text">Christmas comes with cake</h5 >
        <p>Cake it always</p>
        <a href="menu.php" class="btn">Shop Now</a>

      </div>
    </div>
    <div class="carousel-item">
      <img src="images/pizza-hut.jpg" class="w-100 align-items-center rounded mt-2" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text">One Lage</h5 >
        <p>Share A pizza share a smile.</p>
        <a href="menu.php" class="btn">Shop Now</a>

      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

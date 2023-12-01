
<div class="sp"></div>
<div class="home" id="home">
  <div class="slides-container">
    <div class="slide active">
      <div class="content">
        <span>Have A slice</span>
        <h3>Upto 50% off</h3>
        <a href="" class="btn">Shop Now</a>
      </div>
      <div class="img">
      <img src="images/cake1.jpg">
      <div class="overlay"></div>
      </div>
    </div>

    <!-- two -->
    <div class="slide">
      <div class="content">
        <span>Have A slice</span>
        <h3>Upto 50% off</h3>
        <a href="" class="btn">Shop Now</a>
      </div>
      <!-- image -->
      <div class="img">
        <img src="images/cake3.jpg"  alt="">
        <div class="overlay"></div>
      </div>
    </div>

    <!-- three -->
    <div class="slide">
      <div class="content">
        <span>Have A slice</span>
        <h3>Upto 50% off</h3>
        <a href="" class="btn">Shop Now</a>
      </div>
      <!-- image -->
      <div class="img">
        <img src="images/cake5.jpg"  alt="">
        <div class="overlay"></div>
      </div>
    </div>



    <!-- Navigation buttons -->
  <div id="next-slide" class="fas fa-angle-right" onclick="plusSlides(1)"></div>
  <div id="prev-slide" class="fas fa-angle-left" onclick="plusSlides(-1)"></div>

  <!-- Dot navigation -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
  </div>
  </div>

  
</div>

<script>
  let slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }    
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "flex";  
    dots[slideIndex-1].className += " active";
  }

  setInterval(function() {
    plusSlides(1);
  }, 3000);
</script>
